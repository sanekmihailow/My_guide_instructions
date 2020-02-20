 
 правила следует в следующем порадке :
 1) smtpd_client_restrictions      (client)
 2) smtpd_helo_restrictions        (helo)
 3) smtpd_etrn_restrictions        (etrn)
 4) smtpd_sender_restrictions      (sender)
 5) smtpd_recipient_restrictions   (recipient)
 6) smtpd_data_restrictions        (data)
 7) smtpd_end_of_data_restrictions (end_data)
 
 
 ```bash
 telnet 192.168.0.2 25                           # Comments
Trying 192.168.0.2...
Connected to 192.168.0.2 (192.168.0.2).
Escape character is '^]'.
220 mail.example.com ESMTP Postfix              # <-smtp_client_restrictions
HELO mail.example.com                           # <-smtp_helo_restrictions
250 mail.example.com                            #
MAIL FROM:<ned@example.com>                     # <-smtp_sender_restrictions
250 2.1.0 Ok                                    #
RCPT TO:<nerd@example.com>                      # <-smtp_recipient_restrictions
250 2.1.5 Ok                                    #
DATA                                            # <-smtp_data_restrictions
354 End data with <CR><LF>.<CR><LF>             #
To:<nerd@example.com>                           # <-header_checks
From:<ned@example.com>                          #
Subject:SMTP Test                               #
This is a test body message                     # <-body_checks
.                                               #
250 2.0.0 Ok: queued as 301AE20034
QUIT
221 2.0.0 Bye
Connection closed by foreign host.
```
