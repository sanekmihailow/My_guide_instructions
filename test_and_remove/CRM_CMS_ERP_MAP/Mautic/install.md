https://blog.h-educate.com/how-to-install-mautic/

https://www.tecmint.com/install-mautic-marketing-automation-tool-in-linux/

CREATE USER 'mautic'@'localhost' IDENTIFIED BY 'Enter_Your_Password_Here';
GRANT ALL ON mautic.* TO 'mautic'@'localhost';

a2enmod rewrite
