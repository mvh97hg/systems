#! /bin/bash

# Hungmv
# fork from https://github.com/ameir.git
# 
# 
SERVER=`hostname -f`

# directory to backup to
DIR=~/backups/mysql/
LOGFILE="/var/log/backup_database.log"
#----------------------MySQL Settings--------------------#

DBNAMES[0]="db1 db2" # databases you want to backup, separated by a space; leave empty to backup all databases on this host
DBUSER[0]="root"  # MySQL username
DBPASS[0]="password"  # MySQL password
DBHOST[0]="localhost"  # your MySQL server's location (IP address is best)
DBPORT[0]="3306"  # MySQL port
DBTABLES[0]="db1.table1 db1.table2 db2.table1" # tables you want to backup or exclude, separated by a space; leave empty to back up all tables
DBTABLESMATCH[0]="include" # include will backup ONLY the tables in DBTABLES, exclude will backup all tables BUT those in DBTABLES
DBOPTIONS[0]="--quick --single-transaction --skip-lock-tables --max-allowed-packet=64M"

#----------------------Mail Settings--------------------#

# set to 'y' if you'd like to be emailed the backup (requires mutt)
MAIL=n

# email addresses to send backups to, separated by a space
EMAILS="address@yahoo.com address@usa.com"

SUBJECT="MySQL backup on $SERVER ($DATE)"

#----------------------Duplicity Settings--------------------#

DUPLICITY=n
DUPLICITY_OPTIONS="--no-encryption -v8 --s3-use-new-style"
DUPLICITY_TARGET_URL="s3+http://my-backups/db/"

#----------------------S3 Settings--------------------#

S3_UPLOAD=n
S3_PATH="my-backups/db/"
S3_OPTIONS=""
AWS_CLI_OPTIONS="--region us-east-1"

#----------------------RSYNC Settings--------------------#
RSYNC=n

RSYNCHOST[0]="rsynchost"
RSYNCUSER[0]="username"
RSYNCPASS[0]="password"
RSYNCDIR[0]="backups"
RSYNCPORT[0]="22"

#----------------------Telegram Settings--------------------#
TELEGRAM=n

BOTTOKEN="BOT_TOKEN"
CHATID="CHAT_ID"

#-------------------Deletion Settings-------------------#

# delete old files?
DELETE=n

# how many days of backups do you want to keep?
DAYS=30
# how many months of backups do you want to keep? The backup of day 01 will be kept.
MONTHS=3
#-------------------Compression Settings-------------------#

COMPRESSION_COMMAND="gzip -f"
COMPRESSION_EXTENSION="gz"
#----------------------End of Settings------------------#
#########################################################
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
    echo "Creating $BACKDIR..."
    mkdir -p $BACKDIR
    echo "done!"
fi

for KEY in "${!DBHOST[@]}"; do
    echo "Backing up MySQL database on ${DBHOST[$KEY]}..."

    if [ -z "${DBNAMES[$KEY]}" ]; then
        echo "Creating list of all your databases..."
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
        
        test ${DBHOST[$KEY]} = "localhost" && SERVER=`hostname -f` || SERVER=${DBHOST[$KEY]}
        {
            echo "$(date +'%F %T'): Backing up database $database..."
            mysqldump --host ${DBHOST[$KEY]} --port ${DBPORT[$KEY]} --user=${DBUSER[$KEY]} --password=${DBPASS[$KEY]} \
                ${DBOPTIONS[$KEY]} $database $TABLES > $BACKDIR/$SERVER-$database-$DATE.sql

            if [ $? -eq 0 ]; then
                $COMPRESSION_COMMAND $BACKDIR/$SERVER-$database-$DATE.sql
                echo "$(date +'%F %T'): Backup for database $database completed successfully"
            else
                echo "$(date +'%F %T'): Backup for database $database failed"
            fi
            #$COMPRESSION_COMMAND $BACKDIR/$SERVER-$database-$DATE.sql
            echo "done!"
        } >> $LOGFILE 2>&1
    done
done

# if you have the mail program 'mutt' installed on
# your server, this script will have mutt attach the backup
# and send it to the email addresses in $EMAILS

if  [ $MAIL = "y" ]; then
    BODY="Your backup is ready! Find more useful scripts and info at http://www.ameir.net. \n\n"
    BODY=$BODY`cd $BACKDIR; for file in *.sql.$COMPRESSION_EXTENSION; do md5sum ${file};  done`
    ATTACH=`for file in $BACKDIR/*.sql.$COMPRESSION_EXTENSION; do echo "-a ${file} ";  done`

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
