#!/bin/bash

systemctl is-active --quiet kamailio || exit 1

timeout 1 sipsak -s sip:127.0.0.1:5090 >/dev/null 2>&1 || exit 1

exit 0
