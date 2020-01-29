### KOPANO-TRIAL VERSION
```python

UTILS NOT DEPENDS KOPANO:
    |=>: kopano-archiver
    |=>: kopano-migration-imap
    |=>: kopano-migration-pst
    |=>: kopano-monitor

PACKAGES NOT DEPENDS KOPANO:
    |=>: python3-kopano-search
    |=>: kopano-meet-packages
    |=>: php-kopano-smime

SERVICES NOT DEPENDS KOPANO:
    |=>: kopano-kapid
    |=>: kopano-konnectd
    |=>: kopano-kwebd
    |=>: kopano-kwmserverd
    |=>: kopano-meet
    |=>: kopano-search

PLUGINS kopano-webapp:
    kopano-webapp-plugin-filepreviewer
    kopano-webapp-plugin-files
    kopano-webapp-plugin-meetings
    kopano-webapp-plugin-smime

|=>: kopano-server - 
    --|=>: kopano-client
    --------------------|=>: kopano-lang
    --------------------|=>: libgsoap-kopano
    --------------------------------------|=>: libvmime-kopano3
    --|=>: kopano-common
    --------------------|=>: libgsoap-kopano


|=> kopano-server-packages
    --|=>: kopano-backup
    -------------------|=>: kopano-common-uv
    -------------------|=>: python3-kopano
    --|=>: kopano-dagent
    -------------------|=>: kopano-client
    -------------------|=>: kopano-lang
    -------------------|=>: libgsoap-kopano
    -------------------|=>: kopano-common
    -------------------|=>: kopano-dagent-pytils-uv
    -------------------|=>: libvmime-kopano3
    --|=>: kopano-dagent-pytils
    --------------------------|=>: python3-kopano
    --------------------------|=>: python3-kopano-util
    --------------------------------------------------|=>: python3-kopano
    --|=>: kopano-gateway
    ---------------------|=>: kopano-client
    ---------------------|=>: kopano-common
    --|=>: kopano-ical
    ------------------|=>: kopano-client
    ------------------|=>: kopano-common
    --|=>: kopano-monitor
    ---------------------|=>: kopano-client
    ---------------------|=>: kopano-common
    --|=>: kopano-python-utils
    --------------------------|=>: kopano-client-uv
    --------------------------|=>: python3-kopano
    --|=>: kopano-search
    --------------------|=>: python-kopano-search
    --------------------|=>: python3-kopano-search
    --|=>: kopano-server
    --------------------|=>: kopano-client
    --------------------|=>: kopano-common
    --------------------|=>: libgsoap-kopano
    --|=>: kopano-spooler
    --------------------|=>: kopano-client
    --------------------|=>: kopano-common
    --------------------|=>: kopano-dagent-pytils-uv


|=>: kopano-webapp -
    --|=>: kopano-client
    --------------------|=>: kopano-lang
    --------------------|=>: libgsoap-kopano
    --|=>: libgsoap-kopano


|=>: z-push-kopano
    --|=>: z-push-backend-kopano
    ---------------------------|=>: kopano-client


|=>: kopano-grapi
    ---|=>: kopano-common-uv
    ---|=>: kopano-python3-extras
    ---|=>: python3-kopano-rest
    ---------------------------|=>: kopano-python3-extras
    ---------------------------|=>: python3-kopano


```


