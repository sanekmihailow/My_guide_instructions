moves (migrate) on another (other) server
=====

links
===
[1](https://docs.gitlab.com/ee/raketasks/backup_restore.html)

[2](https://www.fabian-keller.de/blog/migrating-a-gitlab-instance-to-another-server)

#### 1) create backup 
>           (def - /var/opt/gitlab/backups)

```nginx
sudo gitlab-rake gitlab:backup:create
```
![](https://github.com/sanekmihailow/My_guide_instructions/blob/master/images/gitlab%20ls%20backups.jpg)

#### 2) update gitlab  to avoid versions problems and repaet step 1

```nginx
sudo apt update
sudo apt install gitlab-ce
sudo gitlab-rake gitlab:backup:create
```

#### 3) copy backup on remote server
```nginx
sudo rsync -ave 'ssh -p $port' /var/opt/gitlab/backups/1524512047_2018_04_23_10.7.0_gitlab_backup.tar remote-user@remote-ip:~/
```
or
```nginx
sudo scp -P $port /var/opt/gitlab/backups/1524512047_2018_04_23_10.7.0_gitlab_backup.tar remote-user@remote-ip:~/
```
> also copy conf and save passwords 
```bash
/etc/gitlab/gitlab.rb 
/etc/gitlab/gitlab/gitlab-secrets.json 
/var/opt/gitlab/.ssh/authorized_keys
```
#### 4) on remote server restore our backup
```nginx
sudo cp 1524512047_2018_04_23_10.7.0_gitlab_backup.tar /var/opt/gitlab/backups/
sudo gitlab-ctl stop unicorn
sudo gitlab-ctl stop sidekiq
sudo gitlab-rake gitlab:backup:restore BACKUP=1524512047_2018_04_23_10.7.0
```
#### 5) check status restore
```nginx
sudo gitlab-ctl restart
sudo gitlab-ctl start unicorn
sudo gitlab-ctl start sidekiq
sudo gitlab-rake gitlab:check SANITIZE=true
```
 #### 6) restore passwords
 ```nginx
 sudo cp /etc/gitlab/gitlab.rb{,.bak}
 sudo cp /etc/gitlab/gitlab-secrets.json{,.bak}
 sudo cp gitlab-secrets.json /etc/gitlab/gitlab-secrets.json
 cat authorized_keys |sudo tee /var/opt/gitlab/.ssh/authorized_keys
 ```


