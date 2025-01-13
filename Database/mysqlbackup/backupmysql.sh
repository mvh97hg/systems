#! /bin/bash

# Hungmv
# fork from https://github.com/ameir.git
# 
# 

#----------------------Start of Script------------------#
install_sshpass() {
    if ! command -v sshpass &> /dev/null; then
        echo "sshpass not installed. Installing..."

        if [ -x "$(command -v apt-get)" ]; then  
            sudo apt-get update
            sudo apt-get install -y sshpass
        elif [ -x "$(command -v yum)" ]; then
            
            sudo yum install -y sshpass
        elif [ -x "$(command -v brew)" ]; then
            
            brew install sshpass
        else
            echo "Error installing sshpass. Please install sshpass manually."
            exit 1
        fi
    else
        echo "sshpass is installed."
    fi   
}

send_telegram_message() {
    local MESSAGE="$1"
    curl -s -X POST "https://api.telegram.org/bot$BOTTOKEN/sendMessage" \
        -d chat_id="$CHATID" \
        -d text="$MESSAGE" \
        -d parse_mode="HTML"
}

function die () {
    echo >&2 "$@"
    exit 1
}

CONFIG=${1:-`dirname $0`/backupmysql.conf}
[ -f "$CONFIG" ] && . "$CONFIG" || die "Could not load configuration file ${CONFIG}!"
BACKDIR="$DIR/$(date +'%Y')-$(date +'%m')-$(date +'%d')"
# check of the backup directory exists
# if not, create it
if  [ ! -d $BACKDIR ]; then
    echo -n "Creating $BACKDIR..."
    mkdir -p $BACKDIR
    echo "done!"
fi

for KEY in "${!DBHOST[@]}"; do
    echo "Backing up MySQL database on ${DBHOST[$KEY]}..."

    if [ -z "${DBNAMES[$KEY]}" ]; then
        echo -n "Creating list of all your databases..."
        DBS=`mysql -h ${DBHOST[$KEY]} --user=${DBUSER[$KEY]} --password=${DBPASS[$KEY]} -Bse "show databases;"`
        echo "done!"
    else
        DBS=${DBNAMES[$KEY]}
    fi

    # filter out the tables to backup
    if [ -n "${DBTABLES[$KEY]}" ]; then
        if  [ ${DBTABLESMATCH[$KEY]} = "exclude" ]; then
        TABLES=''
        for table in ${DBTABLES[$KEY]}; do
            TABLES="$TABLES --ignore-table=$table "
        done
        else
        TABLES=${DBTABLES[$KEY]}
        fi
    fi

    for database in $DBS; do
        DATE=$(date +'%Y_%m_%d-%H_%M_%S')
        echo -n "Backing up database $database..."
        test ${DBHOST[$KEY]} = "localhost" && SERVER=`hostname -f` || SERVER=${DBHOST[$KEY]}
        mysqldump --host ${DBHOST[$KEY]} --port ${DBPORT[$KEY]} --user=${DBUSER[$KEY]} --password=${DBPASS[$KEY]} \
        ${DBOPTIONS[$KEY]} $database $TABLES > $BACKDIR/$SERVER-$database-$DATE.sql
        $COMPRESSION_COMMAND $BACKDIR/$SERVER-$database-$DATE.sql
        echo "done!"
    done
done

# if you have the mail program 'mutt' installed on
# your server, this script will have mutt attach the backup
# and send it to the email addresses in $EMAILS

if  [ $MAIL = "y" ]; then
    BODY="Your backup is ready! Find more useful scripts and info at http://www.ameir.net. \n\n"
    BODY=$BODY`cd $BACKDIR; for file in *.sql.$COMPRESSION_EXTENSION; do md5sum ${file};  done`
    ATTACH=`for file in $BACKDIR/*.sql.$COMPRESSION_EXTENSION; do echo -n "-a ${file} ";  done`

    echo -e "$BODY" | mutt -s "$SUBJECT" $ATTACH -- $EMAILS
    if [[ $? -ne 0 ]]; then
        echo -e "ERROR:  Your backup could not be emailed to you! \n";
    else
        echo -e "Your backup has been emailed to you! \n"
    fi
fi

if  [ $DELETE = "y" ]; then
    DAYS=$((DAYS + 1))
    MONTHS=$((MONTHS + 1))

    # Find and delete daily backups, keep monthly backups
    find $DIR -type d -name "[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]" ! -name "*-*-01" | sort -r | sed -n "${DAYS},\$p" | xargs -I {} rm -rf {}
    # Find and delete monthly backups
    find $DIR -type d -name "[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]" \( -name "*-*-01" \) | sort -r | sed -n "${MONTHS},\$p" | xargs -I {} rm -rf {}

    if  [ $DAYS = "1" ]; then
        echo "Yesterday's backup has been deleted."
    else
        echo "The backups from $((DAYS - 1)) days ago and earlier have been deleted."
    fi
fi

if  [ $DUPLICITY = "y" ]; then
    duplicity full --progress $DUPLICITY_OPTIONS $BACKDIR $DUPLICITY_TARGET_URL
fi

if  [ $S3_UPLOAD = "y" ]; then
    aws $AWS_CLI_OPTIONS s3 sync $BACKDIR s3://$S3_PATH $S3_OPTIONS
fi

if  [ $RSYNC = "y" ]; then
    install_sshpass
    for KEY in "${!RSYNCHOST[@]}"; do

        sshpass -p "${RSYNCPASS[$KEY]}" rsync -auz --delete -e "ssh -p ${RSYNCPORT[$KEY]} -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null"  "${DIR}" "${RSYNCUSER[$KEY]}@${RSYNCHOST[$KEY]}:${RSYNCDIR[$KEY]}"
    done
fi

if  [ $TELEGRAM = "y" ]; then
    MESSAGE="<b>Database backup finished [$(date +'%d/%m/%Y %T')].</b>"
    BACKUPS=$(find $BACKDIR -type f)
    FORMATTED_BACKUPS=$(echo "$BACKUPS" |  echo -e "\n<code>$(xargs -I {} basename {})</code>")
    MESSAGE+="$(echo -e "$FORMATTED_BACKUPS")"
    MESSAGE+="$(echo -e "\n")"
    send_telegram_message "$MESSAGE"

    if [[ $? -ne 0 ]]; then
        echo -e "\nERROR: Notification not sent to telegram! \n";
    else
        echo -e "\nNotification has been sent to telegram! \n"
    fi
    
fi

echo "Your backup is complete!"
