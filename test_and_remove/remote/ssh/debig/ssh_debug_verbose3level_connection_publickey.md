### ssh verbose

#### Поиск проблем

1. проверка прав и владельеца рекурсивно на **~/.ssh** директорию
1. проверка поддержки ssh-rsa и прочих ключей в конфиге **/etc/ssh/sshd_config** **_`HostKey /etc/ssh/ssh_host_rsa_key`_**
1. проверка пути к шеллу в **/etc/passwd**
1. проверка поддержки алгоритма, например ssh-rsa в debug подключении

- `debug2: host key algorithms: ssh-rsa-cert-v01@openssh.com,ssh-rsa,ecdsa-sha2-nistp256-cert-v01@openssh.com,ssh-dss-cert-v01@openssh.com,ssh-dss,ecdsa-sha2-nistp384-cert-v01@openssh.com,ecdsa-sha2-nistp521-cert-v01@openssh.com,ssh-ed25519-cert-v01@openssh.com,ecdsa-sha2-nistp256,ecdsa-sha2-nistp384,ecdsa-sha2-nistp521,ssh-ed25519 ......`
- `debug2: host key algorithms: ssh-rsa,rsa-sha2-512,rsa-sha2-256,ecdsa-sha2-nistp256,ssh-ed25519`

#### На что обращать внимание

```ioke
debug2: fd 3 setting O_NONBLOCK
debug1: Authenticating to 1.1.1.1:22 as 'user'
debug3: send packet: type 20
....
```

```ioke
debug2: host key algorithms: ssh-rsa-cert-v01@openssh.com,ssh-rsa,ecdsa-sha2-nistp256-cert-v01@openssh.com,ssh-dss-cert-v01@openssh.com,ssh-dss,ecdsa-sha2-nistp384-cert-v01@openssh.com,ecdsa-sha2-nistp521-cert-v01@openssh.com,ssh-ed25519-cert-v01@openssh.com,ecdsa-sha2-nistp256,ecdsa-sha2-nistp384,ecdsa-sha2-nistp521,ssh-ed25519
....
```

```ioke
debug2: host key algorithms: ssh-rsa,rsa-sha2-512,rsa-sha2-256,ecdsa-sha2-nistp256,ssh-ed25519
....
```

```ioke
debug1: kex: algorithm: curve25519-sha256
debug1: kex: host key algorithm: ssh-rsa
....
debug1: Server host key: ssh-rsa SHA256:NEHE8/axtyOYvfcjpWoaZf0sW50ukzRGwg13GWMcEPw
....
debug3: load_hostkeys: loaded 1 keys from [1.1.1.1]:22
debug1: Host '[1.1.1.1]:22' is known and matches the RSA host key.
....
debug1: pubkey_prepare: ssh_fetch_identitylist: agent refused operation
debug2: key: .ssh/id_rsa (0x0), explicit
....
```

```ioke
debug1: Authentications that can continue: publickey,password
....
debug3: authmethod_is_enabled publickey
debug1: Next authentication method: publickey
debug1: Trying private key: .ssh/id_rsa
debug3: sign_and_send_pubkey: RSA
```

#### Wrong authenticate puublickey - full

1. Здесь была проблема в /etc/passwd

<details>

```bash
OpenSSH_7.5p1, OpenSSL 1.0.2o  27 Mar 2018
#debug1: Reading configuration data /home/mobaxterm/.ssh/config
#debug1: Reading configuration data /etc/ssh_config
debug1: /etc/ssh_config line 14: Deprecated option "useroaming"
#debug2: resolving "1.1.1.1" port 22
#debug2: ssh_connect_direct: needpriv 0
debug1: Connecting to 1.1.1.1 [1.1.1.1] port 22.
debug1: Connection established.
#debug1: key_load_public: No such file or directory
#debug1: identity file .ssh/id_rsa type -1
#debug1: key_load_public: No such file or directory
debug1: identity file .ssh/id_rsa-cert type -1
#debug1: Enabling compatibility mode for protocol 2.0
#debug1: Local version string SSH-2.0-OpenSSH_7.5
debug1: Remote protocol version 2.0, remote software version OpenSSH_7.4
#debug1: match: OpenSSH_7.4 pat OpenSSH* compat 0x04000000
#debug2: fd 3 setting O_NONBLOCK
debug1: Authenticating to 1.1.1.1:22 as 'user'
debug3: send packet: type 20
debug1: SSH2_MSG_KEXINIT sent
debug3: receive packet: type 20
debug1: SSH2_MSG_KEXINIT received
debug2: local client KEXINIT proposal
#debug2: KEX algorithms: curve25519-sha256,curve25519-sha256@libssh.org,ecdh-sha2-nistp256,ecdh-sha2-nistp384,ecdh-sha2-nistp521,diffie-hellman-group-exchange-sha256,diffie-hellman-group16-sha512,diffie-hellman-group18-sha512,diffie-hellman-group-exchange-sha1,diffie-hellman-group14-sha256,diffie-hellman-group14-sha1,ext-info-c
debug2: host key algorithms: ssh-rsa-cert-v01@openssh.com,ssh-rsa,ecdsa-sha2-nistp256-cert-v01@openssh.com,ssh-dss-cert-v01@openssh.com,ssh-dss,ecdsa-sha2-nistp384-cert-v01@openssh.com,ecdsa-sha2-nistp521-cert-v01@openssh.com,ssh-ed25519-cert-v01@openssh.com,ecdsa-sha2-nistp256,ecdsa-sha2-nistp384,ecdsa-sha2-nistp521,ssh-ed25519
#debug2: ciphers ctos: aes128-ctr,aes192-ctr,aes256-ctr,arcfour256,arcfour128,aes256-gcm@openssh.com,aes128-cbc,3des-cbc,arcfour,aes128-gcm@openssh.com,chacha20-poly1305@openssh.com,blowfish-cbc,cast128-cbc,aes192-cbc,aes256-cbc,rijndael-cbc@lysator.liu.se
#debug2: ciphers stoc: aes128-ctr,aes192-ctr,aes256-ctr,arcfour256,arcfour128,aes256-gcm@openssh.com,aes128-cbc,3des-cbc,arcfour,aes128-gcm@openssh.com,chacha20-poly1305@openssh.com,blowfish-cbc,cast128-cbc,aes192-cbc,aes256-cbc,rijndael-cbc@lysator.liu.se
#debug2: MACs ctos: hmac-md5,hmac-sha1,umac-64@openssh.com,umac-128@openssh.com,hmac-sha2-256,hmac-sha2-512,hmac-ripemd160,hmac-sha1-96,hmac-md5-96,umac-64-etm@openssh.com,umac-128-etm@openssh.com,hmac-sha2-256-etm@openssh.com,hmac-sha2-512-etm@openssh.com,hmac-md5-etm@openssh.com,hmac-sha1-etm@openssh.com,hmac-ripemd160-etm@openssh.com,hmac-sha1-96-etm@openssh.com,hmac-md5-96-etm@openssh.com,hmac-ripemd160@openssh.com
#debug2: MACs stoc: hmac-md5,hmac-sha1,umac-64@openssh.com,umac-128@openssh.com,hmac-sha2-256,hmac-sha2-512,hmac-ripemd160,hmac-sha1-96,hmac-md5-96,umac-64-etm@openssh.com,umac-128-etm@openssh.com,hmac-sha2-256-etm@openssh.com,hmac-sha2-512-etm@openssh.com,hmac-md5-etm@openssh.com,hmac-sha1-etm@openssh.com,hmac-ripemd160-etm@openssh.com,hmac-sha1-96-etm@openssh.com,hmac-md5-96-etm@openssh.com,hmac-ripemd160@openssh.com
#debug2: compression ctos: zlib@openssh.com,zlib,none
#debug2: compression stoc: zlib@openssh.com,zlib,none
#debug2: languages ctos:
#debug2: languages stoc:
#debug2: first_kex_follows 0
#debug2: reserved 0
#debug2: peer server KEXINIT proposal
#debug2: KEX algorithms: curve25519-sha256,curve25519-sha256@libssh.org,ecdh-sha2-nistp256,ecdh-sha2-nistp384,ecdh-sha2-nistp521,diffie-hellman-group-exchange-sha256,diffie-hellman-group16-sha512,diffie-hellman-group18-sha512,diffie-hellman-group-exchange-sha1,diffie-hellman-group14-sha256,diffie-hellman-group14-sha1,diffie-hellman-group1-sha1
debug2: host key algorithms: ssh-rsa,rsa-sha2-512,rsa-sha2-256,ecdsa-sha2-nistp256,ssh-ed25519
#debug2: ciphers ctos: chacha20-poly1305@openssh.com,aes128-ctr,aes192-ctr,aes256-ctr,aes128-gcm@openssh.com,aes256-gcm@openssh.com,aes128-cbc,aes192-cbc,aes256-cbc,blowfish-cbc,cast128-cbc,3des-cbc
#debug2: ciphers stoc: chacha20-poly1305@openssh.com,aes128-ctr,aes192-ctr,aes256-ctr,aes128-gcm@openssh.com,aes256-gcm@openssh.com,aes128-cbc,aes192-cbc,aes256-cbc,blowfish-cbc,cast128-cbc,3des-cbc
#debug2: MACs ctos: umac-64-etm@openssh.com,umac-128-etm@openssh.com,hmac-sha2-256-etm@openssh.com,hmac-sha2-512-etm@openssh.com,hmac-sha1-etm@openssh.com,umac-64@openssh.com,umac-128@openssh.com,hmac-sha2-256,hmac-sha2-512,hmac-sha1
#debug2: MACs stoc: umac-64-etm@openssh.com,umac-128-etm@openssh.com,hmac-sha2-256-etm@openssh.com,hmac-sha2-512-etm@openssh.com,hmac-sha1-etm@openssh.com,umac-64@openssh.com,umac-128@openssh.com,hmac-sha2-256,hmac-sha2-512,hmac-sha1
#debug2: compression ctos: none,zlib@openssh.com
#debug2: compression stoc: none,zlib@openssh.com
#debug2: languages ctos:
#debug2: languages stoc:
#debug2: first_kex_follows 0
#debug2: reserved 0
debug1: kex: algorithm: curve25519-sha256
debug1: kex: host key algorithm: ssh-rsa
#debug1: kex: server->client cipher: aes128-ctr MAC: hmac-sha1 compression: zlib@openssh.com
#debug1: kex: client->server cipher: aes128-ctr MAC: hmac-sha1 compression: zlib@openssh.com
#debug3: send packet: type 30
#debug1: expecting SSH2_MSG_KEX_ECDH_REPLY
#debug3: receive packet: type 31
debug1: Server host key: ssh-rsa SHA256:NEHE8/axtyOYvfcjpWoaZf0sW50ukzRGwg13GWMcEPw
#debug3: put_host_port: [1.1.1.1]:22
#debug3: put_host_port: [1.1.1.1]:22
#debug3: hostkeys_foreach: reading file "/home/mobaxterm/.ssh/known_hosts"
#debug3: record_hostkey: found key type RSA in file /home/mobaxterm/.ssh/known_hosts:232
debug3: load_hostkeys: loaded 1 keys from [1.1.1.1]:22
debug1: Host '[1.1.1.1]:22' is known and matches the RSA host key.
debug1: Found key in /home/mobaxterm/.ssh/known_hosts:232
debug3: send packet: type 21
debug2: set_newkeys: mode 1
debug1: rekey after 4294967296 blocks
debug1: SSH2_MSG_NEWKEYS sent
debug1: expecting SSH2_MSG_NEWKEYS
debug3: receive packet: type 21
debug1: SSH2_MSG_NEWKEYS received
debug2: set_newkeys: mode 0
debug1: rekey after 4294967296 blocks
debug1: pubkey_prepare: ssh_fetch_identitylist: agent refused operation
debug2: key: .ssh/id_rsa (0x0), explicit
#debug3: send packet: type 5
#debug3: receive packet: type 7
#debug1: SSH2_MSG_EXT_INFO received
#debug1: kex_input_ext_info: server-sig-algs=<rsa-sha2-256,rsa-sha2-512>
#debug3: receive packet: type 6
#debug2: service_accept: ssh-userauth
#debug1: SSH2_MSG_SERVICE_ACCEPT received
#debug3: send packet: type 50
#debug3: receive packet: type 51
debug1: Authentications that can continue: publickey,password
#debug3: start over, passed a different list publickey,password
#debug3: preferred hostbased,publickey,password,keyboard-interactive
debug3: authmethod_lookup publickey
#debug3: remaining preferred: password,keyboard-interactive
debug3: authmethod_is_enabled publickey
debug1: Next authentication method: publickey
debug1: Trying private key: .ssh/id_rsa
debug3: sign_and_send_pubkey: RSA SHA256:FLMbwfSZ9oGjddz8CqKssuSPakEjqUDENBZO509awpQ
debug3: send packet: type 50
debug2: we sent a publickey packet, wait for reply
debug3: receive packet: type 51
debug1: Authentications that can continue: publickey,password
debug2: we did not send a packet, disable method
debug3: authmethod_lookup password
debug3: remaining preferred: keyboard-interactive
debug3: authmethod_is_enabled password
debug1: Next authentication method: password
user@1.1.1.1's password:
```

</details>

2. Пример где на серверу не включен rsa

<details>

```bash
#OpenSSH_7.5p1, OpenSSL 1.0.2o  27 Mar 2018
#debug1: Reading configuration data /home/mobaxterm/.ssh/config

#debug1: Reading configuration data /etc/ssh_config
#debug1: /etc/ssh_config line 13: Deprecated option "useroaming"
#debug2: resolving "1.1.1.1" port 22
#debug2: ssh_connect_direct: needpriv 0
debug1: Connecting to 1.1.1.1 [1.1.1.1] port 22.
debug1: Connection established.
#debug1: key_load_public: No such file or directory
#debug1: identity file /home/mobaxterm/.ssh/id_rsa type -1
#debug1: key_load_public: No such file or directory
#debug1: identity file /home/mobaxterm/.ssh/id_rsa-cert type -1
#debug1: key_load_public: No such file or directory
#debug1: identity file /home/mobaxterm/.ssh/id_dsa #type -1
#debug1: key_load_public: No such file or directory
#debug1: identity file /home/mobaxterm/.ssh/#id_dsa-cert type -1
#debug1: key_load_public: No such file or directory
#debug1: identity file /home/mobaxterm/.ssh/id_ecdsa #type -1
#debug1: key_load_public: No such file or directory
#debug1: identity file /home/mobaxterm/.ssh/#id_ecdsa-cert type -1
#debug1: key_load_public: No such file or directory
#debug1: identity file /home/mobaxterm/.ssh/id_ed25519 #type -1
#debug1: key_load_public: No such file or directory
#debug1: identity file /home/mobaxterm/.ssh/#id_ed25519-cert type -1
#debug1: Enabling compatibility mode for protocol 2.0
#debug1: Local version string SSH-2.0-OpenSSH_7.5
#debug1: Remote protocol version 2.0, remote software #version OpenSSH_6.6.1
#debug1: match: OpenSSH_6.6.1 pat OpenSSH_6.6.1* #compat 0x04000000
#debug2: fd 3 setting O_NONBLOCK
debug1: Authenticating to 1.1.1.1:22 as 'user'
#debug3: send packet: type 20
#debug1: SSH2_MSG_KEXINIT sent
#debug3: receive packet: type 20
#debug1: SSH2_MSG_KEXINIT received
#debug2: local client KEXINIT proposal
#debug2: KEX algorithms: curve25519-sha256,curve25519-sha256@libssh.org,ecdh-sha2-nistp256,ecdh-sha2-nistp384,ecdh-sha2-nistp521,diffie-hellman-group-exchange-sha256,diffie-hellman-group16-sha512,diffie-hellman-group18-sha512,diffie-hellman-group-exchange-sha1,diffie-hellman-group14-sha256,diffie-hellman-group14-sha1,ext-info-c
debug2: host key algorithms: ecdsa-sha2-nistp256-cert-v01@openssh.com,ecdsa-sha2-nistp384-cert-v01@openssh.com,ecdsa-sha2-nistp521-cert-v01@openssh.com,ssh-ed25519-cert-v01@openssh.com,ssh-rsa-cert-v01@openssh.com,ecdsa-sha2-nistp256,ecdsa-sha2-nistp384,ecdsa-sha2-nistp521,ssh-ed25519,rsa-sha2-512,rsa-sha2-256,ssh-rsa
#debug2: ciphers ctos: aes128-ctr,aes192-ctr,aes256-ctr,arcfour256,arcfour128,aes256-gcm@openssh.com,aes128-cbc,3des-cbc,arcfour,aes128-gcm@openssh.com,chacha20-poly1305@openssh.com,blowfish-cbc,cast128-cbc,aes192-cbc,aes256-cbc,rijndael-cbc@lysator.liu.se
#debug2: ciphers stoc: aes128-ctr,aes192-ctr,aes256-ctr,arcfour256,arcfour128,aes256-gcm@openssh.com,aes128-cbc,3des-cbc,arcfour,aes128-gcm@openssh.com,chacha20-poly1305@openssh.com,blowfish-cbc,cast128-cbc,aes192-cbc,aes256-cbc,rijndael-cbc@lysator.liu.se
#debug2: MACs ctos: hmac-md5,hmac-sha1,umac-64@openssh.com,umac-128@openssh.com,hmac-sha2-256,hmac-sha2-512,hmac-ripemd160,hmac-sha1-96,hmac-md5-96,umac-64-etm@openssh.com,umac-128-etm@openssh.com,hmac-sha2-256-etm@openssh.com,hmac-sha2-512-etm@openssh.com,hmac-md5-etm@openssh.com,hmac-sha1-etm@openssh.com,hmac-ripemd160-etm@openssh.com,hmac-sha1-96-etm@openssh.com,hmac-md5-96-etm@openssh.com,hmac-ripemd160@openssh.com
#debug2: MACs stoc: hmac-md5,hmac-sha1,umac-64@openssh.com,umac-128@openssh.com,hmac-sha2-256,hmac-sha2-512,hmac-ripemd160,hmac-sha1-96,hmac-md5-96,umac-64-etm@openssh.com,umac-128-etm@openssh.com,hmac-sha2-256-etm@openssh.com,hmac-sha2-512-etm@openssh.com,hmac-md5-etm@openssh.com,hmac-sha1-etm@openssh.com,hmac-ripemd160-etm@openssh.com,hmac-sha1-96-etm@openssh.com,hmac-md5-96-etm@openssh.com,hmac-ripemd160@openssh.com
#debug2: compression ctos: zlib@openssh.com,zlib,none
#debug2: compression stoc: zlib@openssh.com,zlib,none
#debug2: languages ctos:
#debug2: languages stoc:
#debug2: first_kex_follows 0
#debug2: reserved 0
#debug2: peer server KEXINIT proposal
#debug2: KEX algorithms: curve25519-sha256@libssh.org,ecdh-sha2-nistp256,ecdh-sha2-nistp384,ecdh-sha2-nistp521,diffie-hellman-group-exchange-sha256,diffie-hellman-group-exchange-sha1,diffie-hellman-group14-sha1,diffie-hellman-group1-sha1
debug2: host key algorithms: ssh-rsa,ecdsa-sha2-nistp256,ssh-ed25519
#debug2: ciphers ctos: aes128-ctr,aes192-ctr,aes256-ctr,arcfour256,arcfour128,aes128-gcm@openssh.com,aes256-gcm@openssh.com,chacha20-poly1305@openssh.com,aes128-cbc,3des-cbc,blowfish-cbc,cast128-cbc,aes192-cbc,aes256-cbc,arcfour,rijndael-cbc@lysator.liu.se
#debug2: ciphers stoc: aes128-ctr,aes192-ctr,aes256-ctr,arcfour256,arcfour128,aes128-gcm@openssh.com,aes256-gcm@openssh.com,chacha20-poly1305@openssh.com,aes128-cbc,3des-cbc,blowfish-cbc,cast128-cbc,aes192-cbc,aes256-cbc,arcfour,rijndael-cbc@lysator.liu.se
#debug2: MACs ctos: hmac-md5-etm@openssh.com,hmac-sha1-etm@openssh.com,umac-64-etm@openssh.com,umac-128-etm@openssh.com,hmac-sha2-256-etm@openssh.com,hmac-sha2-512-etm@openssh.com,hmac-ripemd160-etm@openssh.com,hmac-sha1-96-etm@openssh.com,hmac-md5-96-etm@openssh.com,hmac-md5,hmac-sha1,umac-64@openssh.com,umac-128@openssh.com,hmac-sha2-256,hmac-sha2-512,hmac-ripemd160,hmac-ripemd160@openssh.com,hmac-sha1-96,hmac-md5-96
#debug2: MACs stoc: hmac-md5-etm@openssh.com,hmac-sha1-etm@openssh.com,umac-64-etm@openssh.com,umac-128-etm@openssh.com,hmac-sha2-256-etm@openssh.com,hmac-sha2-512-etm@openssh.com,hmac-ripemd160-etm@openssh.com,hmac-sha1-96-etm@openssh.com,hmac-md5-96-etm@openssh.com,hmac-md5,hmac-sha1,umac-64@openssh.com,umac-128@openssh.com,hmac-sha2-256,hmac-sha2-512,hmac-ripemd160,hmac-ripemd160@openssh.com,hmac-sha1-96,hmac-md5-96
#debug2: compression ctos: none,zlib@openssh.com
#debug2: compression stoc: none,zlib@openssh.com
#debug2: languages ctos:
#debug2: languages stoc:
#debug2: first_kex_follows 0
#debug2: reserved 0
debug1: kex: algorithm: curve25519-sha256@libssh.org
debug1: kex: host key algorithm: ecdsa-sha2-nistp256
#debug1: kex: server->client cipher: aes128-ctr MAC: hmac-md5 compression: zlib@openssh.com
#debug1: kex: client->server cipher: aes128-ctr MAC: hmac-md5 compression: zlib@openssh.com
#debug3: send packet: type 30
#debug1: expecting SSH2_MSG_KEX_ECDH_REPLY
#debug3: receive packet: type 31
debug1: Server host key: ecdsa-sha2-nistp256 SHA256:2yuQ34OeSybFk23oOJaznjhsqq3hsZ4ed+Mm+nDUZ70
#debug3: hostkeys_foreach: reading file "/home/mobaxterm/.ssh/known_hosts"
#debug3: record_hostkey: found key type ECDSA in file /home/mobaxterm/.ssh/known_hosts:225
debug3: load_hostkeys: loaded 1 keys from 1.1.1.1
debug1: Host '1.1.1.1' is known and matches the ECDSA host key.
#debug1: Found key in /home/mobaxterm/.ssh/known_hosts:225
#debug3: send packet: type 21
#debug2: set_newkeys: mode 1
#debug1: rekey after 4294967296 blocks
#debug1: SSH2_MSG_NEWKEYS sent
#debug1: expecting SSH2_MSG_NEWKEYS
#debug3: receive packet: type 21
#debug1: SSH2_MSG_NEWKEYS received
#debug2: set_newkeys: mode 0
#debug1: rekey after 4294967296 blocks
#debug1: pubkey_prepare: ssh_fetch_identitylist: agent refused operation
debug2: key: /home/mobaxterm/.ssh/id_rsa (0x0)
debug2: key: /home/mobaxterm/.ssh/id_dsa (0x0)
debug2: key: /home/mobaxterm/.ssh/id_ecdsa (0x0)
debug2: key: /home/mobaxterm/.ssh/id_ed25519 (0x0)
#debug3: send packet: type 5
##debug2: service_accept: ssh-userauth
#debug1: SSH2_MSG_SERVICE_ACCEPT received
#debug3: send packet: type 50
#debug3: receive packet: type 51
debug1: Authentications that can continue: publickey,password
#debug3: start over, passed a different list publickey,password
#debug3: preferred hostbased,publickey,password,keyboard-interactive
debug3: authmethod_lookup publickey
#debug3: remaining preferred: password,keyboard-interactive
debug3: authmethod_is_enabled publickey
debug1: Next authentication method: publickey
debug1: Trying private key: /home/mobaxterm/.ssh/id_rsa
debug3: sign_and_send_pubkey: RSA SHA256:FLMbwfSZ9oGjddz8CqKssuSPakEjqUDENBZO509awpQ
debug3: send packet: type 50
debug2: we sent a publickey packet, wait for reply
debug3: receive packet: type 51
debug1: Authentications that can continue: publickey,password
debug1: Trying private key: /home/mobaxterm/.ssh/id_dsa
debug3: no such identity: /home/mobaxterm/.ssh/id_dsa: No such file or directory
debug1: Trying private key: /home/mobaxterm/.ssh/id_ecdsa
debug3: no such identity: /home/mobaxterm/.ssh/id_ecdsa: No such file or directory
debug1: Trying private key: /home/mobaxterm/.ssh/id_ed25519
debug3: no such identity: /home/mobaxterm/.ssh/id_ed25519: No such file or directory
debug2: we did not send a packet, disable method
debug3: authmethod_lookup password
debug3: remaining preferred: keyboard-interactive
debug3: authmethod_is_enabled password
debug1: Next authentication method: password
user@1.1.1.1's password:
```

</details>

#### Success connect

<details>

```bash
#OpenSSH_7.4p1, OpenSSL 1.0.2k-fips  26 Jan 2017
#debug1: Reading configuration data /etc/ssh/ssh_config
#debug1: /etc/ssh/ssh_config line 58: Applying options for *1.1.1.1
#debug2: resolving "1.1.1.1" port 22
#debug2: ssh_connect_direct: needpriv 0
debug1: Connecting to 1.1.1.1 [1.1.1.1] port 22.
debug1: Connection established.
debug1: identity file Ansible-remote/credentials/user type 1
#debug1: key_load_public: No such file or directory
debug1: identity file Ansible-remote/credentials/user-cert type -1
#debug1: Enabling compatibility mode for protocol 2.0
#debug1: Local version string SSH-2.0-OpenSSH_7.4
#debug1: Remote protocol version 2.0, remote software version OpenSSH_8.0
#debug1: match: OpenSSH_8.0 pat OpenSSH* compat 0x04000000
#debug2: fd 3 setting O_NONBLOCK
debug1: Authenticating to 1.1.1.1:22 as 'user'
#debug3: hostkeys_foreach: reading file "/home/mikhA/.ssh/known_hosts"
debug3: record_hostkey: found key type ECDSA in file /home/mikhA/.ssh/known_hosts:6
#debug3: load_hostkeys: loaded 1 keys from 1.1.1.1
#debug3: order_hostkeyalgs: prefer hostkeyalgs: ecdsa-sha2-nistp256-cert-v01@openssh.com,ecdsa-sha2-nistp384-cert-v01@openssh.com,ecdsa-sha2-nistp521-cert-v01@openssh.com,ecdsa-sha2-nistp256,ecdsa-sha2-nistp384,ecdsa-sha2-nistp521
#debug3: send packet: type 20
#debug1: SSH2_MSG_KEXINIT sent
#debug3: receive packet: type 20
#debug1: SSH2_MSG_KEXINIT received
#debug2: local client KEXINIT proposal
#debug2: KEX algorithms: curve25519-sha256,curve25519-sha256@libssh.org,ecdh-sha2-nistp256,ecdh-sha2-nistp384,ecdh-sha2-nistp521,diffie-hellman-group-exchange-sha256,diffie-hellman-group16-sha512,diffie-hellman-group18-sha512,diffie-hellman-group-exchange-sha1,diffie-hellman-group14-sha256,diffie-hellman-group14-sha1,diffie-hellman-group1-sha1,ext-info-c
debug2: host key algorithms: ecdsa-sha2-nistp256-cert-v01@openssh.com,ecdsa-sha2-nistp384-cert-v01@openssh.com,ecdsa-sha2-nistp521-cert-v01@openssh.com,ecdsa-sha2-nistp256,ecdsa-sha2-nistp384,ecdsa-sha2-nistp521,ssh-ed25519-cert-v01@openssh.com,ssh-rsa-cert-v01@openssh.com,ssh-dss-cert-v01@openssh.com,ssh-ed25519,rsa-sha2-512,rsa-sha2-256,ssh-rsa,ssh-dss
#debug2: ciphers ctos: chacha20-poly1305@openssh.com,aes128-ctr,aes192-ctr,aes256-ctr,aes128-gcm@openssh.com,aes256-gcm@openssh.com,aes128-cbc,aes192-cbc,aes256-cbc
#debug2: ciphers stoc: chacha20-poly1305@openssh.com,aes128-ctr,aes192-ctr,aes256-ctr,aes128-gcm@openssh.com,aes256-gcm@openssh.com,aes128-cbc,aes192-cbc,aes256-cbc
#debug2: MACs ctos: umac-64-etm@openssh.com,umac-128-etm@openssh.com,hmac-sha2-256-etm@openssh.com,hmac-sha2-512-etm@openssh.com,hmac-sha1-etm@openssh.com,umac-64@openssh.com,umac-128@openssh.com,hmac-sha2-256,hmac-sha2-512,hmac-sha1
#debug2: MACs stoc: umac-64-etm@openssh.com,umac-128-etm@openssh.com,hmac-sha2-256-etm@openssh.com,hmac-sha2-512-etm@openssh.com,hmac-sha1-etm@openssh.com,umac-64@openssh.com,umac-128@openssh.com,hmac-sha2-256,hmac-sha2-512,hmac-sha1
#debug2: compression ctos: none,zlib@openssh.com,zlib
#debug2: compression stoc: none,zlib@openssh.com,zlib
#debug2: languages ctos:
#debug2: languages stoc:
#debug2: first_kex_follows 0
#debug2: reserved 0
#debug2: peer server KEXINIT proposal
#debug2: KEX algorithms: curve25519-sha256,curve25519-sha256@libssh.org,ecdh-sha2-nistp256,ecdh-sha2-nistp384,ecdh-sha2-nistp521,diffie-hellman-group-exchange-sha256,diffie-hellman-group14-sha256,diffie-hellman-group16-sha512,diffie-hellman-group18-sha512,diffie-hellman-group-exchange-sha1,diffie-hellman-group14-sha1
debug2: host key algorithms: rsa-sha2-512,rsa-sha2-256,ssh-rsa,ecdsa-sha2-nistp256,ssh-ed25519
#debug2: ciphers ctos: aes256-gcm@openssh.com,chacha20-poly1305@openssh.com,aes256-ctr,aes256-cbc,aes128-gcm@openssh.com,aes128-ctr,aes128-cbc
#debug2: ciphers stoc: aes256-gcm@openssh.com,chacha20-poly1305@openssh.com,aes256-ctr,aes256-cbc,aes128-gcm@openssh.com,aes128-ctr,aes128-cbc
#debug2: MACs ctos: hmac-sha2-256-etm@openssh.com,hmac-sha1-etm@openssh.com,umac-128-etm@openssh.com,hmac-sha2-512-etm@openssh.com,hmac-sha2-256,hmac-sha1,umac-128@openssh.com,hmac-sha2-512
#debug2: MACs stoc: hmac-sha2-256-etm@openssh.com,hmac-sha1-etm@openssh.com,umac-128-etm@openssh.com,hmac-sha2-512-etm@openssh.com,hmac-sha2-256,hmac-sha1,umac-128@openssh.com,hmac-sha2-512
#debug2: compression ctos: none,zlib@openssh.com
#debug2: compression stoc: none,zlib@openssh.com
#debug2: languages ctos:
#debug2: languages stoc:
#debug2: first_kex_follows 0
#debug2: reserved 0
#debug1: kex: algorithm: curve25519-sha256
debug1: kex: host key algorithm: ecdsa-sha2-nistp256
#debug1: kex: server->client cipher: chacha20-poly1305@openssh.com MAC: <implicit> compression: none
#debug1: kex: client->server cipher: chacha20-poly1305@openssh.com MAC: <implicit> compression: none
#debug1: kex: curve25519-sha256 need=64 dh_need=64
#debug1: kex: curve25519-sha256 need=64 dh_need=64
#debug3: send packet: type 30
#debug1: expecting SSH2_MSG_KEX_ECDH_REPLY
#debug3: receive packet: type 31
debug1: Server host key: ecdsa-sha2-nistp256 SHA256:jgq/muqCKq8W8qJLQ6S1ZDZr/2ISPLpLVL/kniTPr+c
#debug3: hostkeys_foreach: reading file "/home/mikhA/.ssh/known_hosts"
#debug3: record_hostkey: found key type ECDSA in file /home/mikhA/.ssh/known_hosts:6
#debug3: load_hostkeys: loaded 1 keys from 1.1.1.1
#debug1: Host '1.1.1.1' is known and matches the ECDSA host key.
#debug1: Found key in /home/mikhA/.ssh/known_hosts:6
#debug3: send packet: type 21
#debug2: set_newkeys: mode 1
#debug1: rekey after 134217728 blocks
#debug1: SSH2_MSG_NEWKEYS sent
#debug1: expecting SSH2_MSG_NEWKEYS
#debug3: receive packet: type 21
#debug1: SSH2_MSG_NEWKEYS received
#debug2: set_newkeys: mode 0
#debug1: rekey after 134217728 blocks
#debug1: pubkey_prepare: ssh_fetch_identitylist: agent #refused operation
debug2: key: Ansible-remote/credentials/user (0x5651dafef660), explicit
#debug3: send packet: type 5
#debug3: receive packet: type 7
#debug1: SSH2_MSG_EXT_INFO received
#debug1: kex_input_ext_info: server-sig-algs=<ssh-ed25519,ssh-rsa,rsa-sha2-256,rsa-sha2-512,ssh-dss,ecdsa-sha2-nistp256,ecdsa-sha2-nistp384,ecdsa-sha2-nistp521>
#debug3: receive packet: type 6
#debug2: service_accept: ssh-userauth
#debug1: SSH2_MSG_SERVICE_ACCEPT received
#debug3: send packet: type 50
#debug3: receive packet: type 51
debug1: Authentications that can continue: publickey
#debug3: start over, passed a different list publickey
#debug3: preferred gssapi-keyex,gssapi-with-mic,publickey,keyboard-interactive,password
#debug3: authmethod_lookup publickey
#debug3: remaining preferred: keyboard-interactive,password
#debug3: authmethod_is_enabled publickey
debug1: Next authentication method: publickey
debug1: Offering RSA public key: Ansible-remote/credentials/user
#debug3: send_pubkey_test
debug3: send packet: type 50
debug2: we sent a publickey packet, wait for reply
debug3: receive packet: type 60
debug1: Server accepts key: pkalg rsa-sha2-512 blen 791
debug2: input_userauth_pk_ok: fp SHA256:Tni9Q2HB3R35pNiPuwLacKah7cmElQr+g4KJieopFeM
debug3: sign_and_send_pubkey: RSA SHA256:Tni9Q2HB3R35pNiPuwLacKah7cmElQr+g4KJieopFeM
debug3: send packet: type 50
debug3: receive packet: type 52
debug1: Authentication succeeded (publickey).
#Authenticated to 1.1.1.1 ([1.1.1.1]:22).
#debug1: channel 0: new [client-session]
#debug3: ssh_session2_open: channel_new: 0
#debug2: channel 0: send open
#debug3: send packet: type 90
#debug1: Requesting no-more-sessions@openssh.com
#debug3: send packet: type 80
#debug1: Entering interactive session.
#debug1: pledge: network
#debug3: receive packet: type 80
#debug1: client_input_global_request: rtype #hostkeys-00@openssh.com want_reply 0
#debug3: receive packet: type 4
#debug1: Remote: /home/user/.ssh/authorized_keys:1: #key options: agent-forwarding port-forwarding pty #user-rc x11-forwarding
#debug3: receive packet: type 4
#debug1: Remote: /home/user/.ssh/authorized_keys:1: #key options: agent-forwarding port-forwarding pty #user-rc x11-forwarding
#debug3: receive packet: type 91
#debug2: callback start
#debug2: fd 3 setting TCP_NODELAY
#debug3: ssh_packet_set_tos: set IP_TOS 0x10
#debug2: client_session2_setup: id 0
#debug2: channel 0: request pty-req confirm 1
#debug3: send packet: type 98
#debug1: Sending environment.
#debug3: Ignored env XDG_SESSION_ID
#debug3: Ignored env HOSTNAME
#debug3: Ignored env TERM
#debug3: Ignored env SHELL
#debug3: Ignored env HISTSIZE
#debug3: Ignored env SSH_CLIENT
#debug3: Ignored env SSH_TTY
#debug3: Ignored env USER
#debug3: Ignored env LS_COLORS
#debug3: Ignored env SSH_AUTH_SOCK
#debug3: Ignored env MAIL
#debug3: Ignored env PATH
#debug3: Ignored env PWD
#debug3: Ignored env EDITOR
#debug1: Sending env LANG = en_US.UTF-8
#debug2: channel 0: request env confirm 0
#debug3: send packet: type 98
#debug3: Ignored env HISTCONTROL
#debug3: Ignored env SHLVL
#debug3: Ignored env HOME
#debug3: Ignored env LOGNAME
#debug3: Ignored env SSH_CONNECTION
#debug3: Ignored env LESSOPEN
#debug3: Ignored env PROMPT_COMMAND
#debug3: Ignored env XDG_RUNTIME_DIR
#debug3: Ignored env _
#debug2: channel 0: request shell confirm 1
#debug3: send packet: type 98
#debug2: callback done
#debug2: channel 0: open confirm rwindow 0 rmax 32768
#debug3: receive packet: type 99
#debug2: channel_input_status_confirm: type 99 id 0
#debug2: PTY allocation request accepted on channel 0
#debug2: channel 0: rcvd adjust 2097152
#debug3: receive packet: type 99
#debug2: channel_input_status_confirm: type 99 id 0
#debug2: shell request accepted on channel 0
#Activate the web console with: systemctl enable --now cockpit.socket
```

</details>
