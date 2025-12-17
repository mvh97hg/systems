FROM debian:${DEBIAN_VERSION} AS runtime

ARG FREESWITCH_UID=499
ARG FREESWITCH_GID=499

RUN groupadd -r freeswitch --gid=${FREESWITCH_GID} \
 && useradd -r -g freeswitch --uid=${FREESWITCH_UID} freeswitch

RUN apt-get update -qq \
    && apt-get install -y --no-install-recommends gosu ca-certificates locales \
    && localedef -i en_US -c -f UTF-8 -A /usr/share/locale/locale.alias en_US.UTF-8 \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

ENV LANG en_US.utf8


COPY docker-entrypoint.sh /
COPY build/freeswitch.limits.conf /etc/security/limits.d/
 
EXPOSE 8021/tcp \
    5060/tcp 5060/udp 5080/tcp 5080/udp \
    5061/tcp 5061/udp 5081/tcp 5081/udp \
    5066/tcp \
    7443/tcp \
    8081/tcp 8082/tcp \
    10000-65535/udp

VOLUME ["/etc/freeswitch"]
VOLUME ["/tmp"]

SHELL ["/bin/bash", "-c"]
HEALTHCHECK --interval=15s --timeout=5s \
  CMD fs_cli -x status | grep -q ^UP || exit 1

ENTRYPOINT ["/docker-entrypoint.sh"]
CMD ["freeswitch"]