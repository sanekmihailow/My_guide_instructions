installed versions
====
<deatils>
<details>
 <summary>spoiler</summary>
 
 

#### php

<details>

```nginx
            dpkg -l |grep php
```
```php
ii  libapache2-mod-php7.0                        7.0.26-2+ubuntu16.04.1+deb.sury.org+2                    amd64        server-side, HTML-embedded scripting language (Apache 2 module)
ii  php-apcu                                     5.1.11+4.0.11-1+ubuntu16.04.1+deb.sury.org+1             amd64        APC User Cache for PHP
ii  php-apcu-bc                                  1.0.4-1+ubuntu16.04.1+deb.sury.org+1                     amd64        APCu Backwards Compatibility Module
ii  php-auth-sasl                                1.0.6-2build1                                            all          Abstraction of various SASL mechanism responses
ii  php-bcmath                                   1:7.1+55+ubuntu16.04.1+deb.sury.org+1                    all          Bcmath module for PHP [default]
ii  php-common                                   1:60+ubuntu16.04.1+deb.sury.org+1                        all          Common files for PHP packages
ii  php-db                                       1.7.14-3build1                                           all          PHP PEAR Database Abstraction Layer
ii  php-gettext                                  1.0.11-2+deb.sury.org~xenial+1                           all          read gettext MO files directly, without requiring anything other than PHP
ii  php-igbinary                                 2.0.1-1+ubuntu16.04.1+deb.sury.org+2                     amd64        igbinary PHP serializer
ii  php-ldap                                     1:7.1+55+ubuntu16.04.1+deb.sury.org+1                    all          LDAP module for PHP [default]
ii  php-mail                                     1.3.0-1                                                  all          Class that provides multiple interfaces for sending emails
ii  php-mail-mime                                1.10.0-2                                                 all          PHP PEAR module for creating MIME messages
ii  php-memcached                                3.0.4+2.2.0-1+ubuntu16.04.1+deb.sury.org+1               amd64        memcached extension module for PHP, uses libmemcached
ii  php-msgpack                                  2.0.2+0.5.7-1+ubuntu16.04.1+deb.sury.org+3               amd64        PHP extension for interfacing with MessagePack
ii  php-mysql                                    1:7.1+55+ubuntu16.04.1+deb.sury.org+1                    all          MySQL module for PHP [default]
ii  php-net-smtp                                 1.7.1-1build1                                            all          PHP PEAR module implementing SMTP protocol
ii  php-net-socket                               1.0.14-1build1                                           all          PHP PEAR Network Socket Interface module
ii  php-pear                                     1:1.10.5+submodules+notgz-1+ubuntu16.04.1+deb.sury.org+1 all          PEAR Base System
ii  php-phpseclib                                2.0.1-1build1                                            all          implementations of an arbitrary-precision integer arithmetic library
ii  php-tcpdf                                    6.0.093+dfsg-1ubuntu1                                    all          PHP class for generating PDF files on-the-fly
ii  php7.0                                       7.0.26-2+ubuntu16.04.1+deb.sury.org+2                    all          server-side, HTML-embedded scripting language (metapackage)
ii  php7.0-bcmath                                7.0.26-2+ubuntu16.04.1+deb.sury.org+2                    amd64        Bcmath module for PHP
ii  php7.0-bz2                                   7.0.26-2+ubuntu16.04.1+deb.sury.org+2                    amd64        bzip2 module for PHP
ii  php7.0-cgi                                   7.0.26-2+ubuntu16.04.1+deb.sury.org+2                    amd64        server-side, HTML-embedded scripting language (CGI binary)
ii  php7.0-cli                                   7.0.26-2+ubuntu16.04.1+deb.sury.org+2                    amd64        command-line interpreter for the PHP scripting language
ii  php7.0-common                                7.0.26-2+ubuntu16.04.1+deb.sury.org+2                    amd64        documentation, examples and common module for PHP
ii  php7.0-curl                                  7.0.26-2+ubuntu16.04.1+deb.sury.org+2                    amd64        CURL module for PHP
ii  php7.0-fpm                                   7.0.26-2+ubuntu16.04.1+deb.sury.org+2                    amd64        server-side, HTML-embedded scripting language (FPM-CGI binary)
ii  php7.0-gd                                    7.0.26-2+ubuntu16.04.1+deb.sury.org+2                    amd64        GD module for PHP
ii  php7.0-imap                                  7.0.26-2+ubuntu16.04.1+deb.sury.org+2                    amd64        IMAP module for PHP
ii  php7.0-json                                  7.0.26-2+ubuntu16.04.1+deb.sury.org+2                    amd64        JSON module for PHP
ii  php7.0-mbstring                              7.0.26-2+ubuntu16.04.1+deb.sury.org+2                    amd64        MBSTRING module for PHP
ii  php7.0-mcrypt                                7.0.26-2+ubuntu16.04.1+deb.sury.org+2                    amd64        libmcrypt module for PHP
ii  php7.0-mysql                                 7.0.26-2+ubuntu16.04.1+deb.sury.org+2                    amd64        MySQL module for PHP
ii  php7.0-opcache                               7.0.26-2+ubuntu16.04.1+deb.sury.org+2                    amd64        Zend OpCache module for PHP
ii  php7.0-readline                              7.0.26-2+ubuntu16.04.1+deb.sury.org+2                    amd64        readline module for PHP
ii  php7.0-xml                                   7.0.26-2+ubuntu16.04.1+deb.sury.org+2                    amd64        DOM, SimpleXML, WDDX, XML, and XSL module for PHP
ii  php7.0-zip                                   7.0.26-2+ubuntu16.04.1+deb.sury.org+2                    amd64        Zip module for PHP
ii  php7.1-bcmath                                7.1.12-3+ubuntu16.04.1+deb.sury.org+1                    amd64        Bcmath module for PHP
ii  php7.1-common                                7.1.12-3+ubuntu16.04.1+deb.sury.org+1                    amd64        documentation, examples and common module for PHP
ii  php7.1-ldap                                  7.1.12-3+ubuntu16.04.1+deb.sury.org+1                    amd64        LDAP module for PHP
ii  php7.1-mysql                                 7.1.12-3+ubuntu16.04.1+deb.sury.org+1                    amd64        MySQL module for PHP
ii  phpmyadmin                                   4:4.5.4.1-2ubuntu2                                       all          MySQL web administration tool
ii  zabbix-frontend-php                          1:3.0.13-4+xenial                                        all          Zabbix network monitoring solution - PHP front-end
```
</details>


#### freeradius

<details>

```nginx
            dpkg -l |grep freeraddius
```
```php
ii  freeradius                           2.2.8+dfsg-0.1ubuntu0.1                                  amd64        high-performance and highly configurable RADIUS server
ii  freeradius-common                    2.2.8+dfsg-0.1ubuntu0.1                                  all          FreeRADIUS common files
ii  freeradius-mysql                     2.2.8+dfsg-0.1ubuntu0.1                                  amd64        MySQL module for FreeRADIUS server
ii  freeradius-utils                     2.2.8+dfsg-0.1ubuntu0.1                                  amd64        FreeRADIUS client utilities
ii  libfreeradius2                       2.2.8+dfsg-0.1ubuntu0.1                                  amd64        FreeRADIUS shared library
```

</details>

#### pear

<details>

```nginx
            pear list-all
```
```php
pear/Archive_Tar                               1.4.3      1.4.3  Tar file management class
pear/Archive_Zip                               0.1.2             Zip file archiving management class
pear/Auth                                      1.6.4             Creating an authentication system.
pear/Auth_HTTP                                 2.1.8             HTTP authentication
pear/Auth_PrefManager                          1.2.2             Preferences management class
pear/Auth_PrefManager2                         2.0.0dev1         Preferences management class
pear/Auth_RADIUS                               1.1.0             Wrapper Classes for the RADIUS PECL.
pear/Auth_SASL                                 1.1.0      1.0.6  Abstraction of various SASL mechanism responses
pear/Auth_SASL2                                0.2.0             Abstraction of various SASL mechanism responses
pear/Benchmark                                 1.2.9             Framework to benchmark PHP scripts or function calls.
pear/Cache                                     1.5.6             Framework for caching of arbitrary data.
pear/Cache_Lite                                1.8.2             Fast and Safe little cache system
pear/Calendar                                  0.5.5             A package for building Calendar data structures (irrespective of output)
pear/CodeGen                                   1.0.7             Tool to create Code generaters that operate on XML descriptions
pear/CodeGen_MySQL                             1.0.0RC1          Abstract base package for MySQL code generators
pear/CodeGen_MySQL_Plugin                      0.9.2             Tool to generate MySQL Pugins from an XML description
pear/CodeGen_MySQL_UDF                         1.0.0RC1          Tool to generate MySQL UDF extensions from an XML description
pear/CodeGen_PECL                              1.1.3             Tool to generate PECL extensions from an XML description
pear/Config                                    1.10.12           Your configuration's swiss-army knife.
pear/Config_Lite                               0.2.6             a lightweight and fast Config class for ini style text configuration files.
pear/Console_Color                             1.0.3             This Class allows you to easily use ANSI console colors in your application.
pear/Console_Color2                            0.1.2             This Class allows you to easily use ANSI console colors in your application.
pear/Console_CommandLine                       1.2.2             A full featured command line options and arguments parser
pear/Console_Getargs                           1.4.0             A command-line arguments parser
pear/Console_Getopt                            1.4.1      1.4.1  Command-line option parser
pear/Console_GetoptPlus                        1.0.0RC1          Command-line option parser - Console Getopt+ (Getopt Plus)
pear/Console_ProgressBar                       0.5.2beta         This class provides you with an easy-to-use interface to progress bars.
pear/Console_Table                             1.3.1             Library that makes it easy to build console style tables
pear/Contact_AddressBook                       0.5.1             Address book export-import class
pear/Contact_Vcard_Build                       1.1.2             Build (create) and fetch vCard 2.1 and 3.0 text blocks.
pear/Contact_Vcard_Parse                       1.32.0            Parse vCard 2.1 and 3.0 files.
pear/Crypt_Blowfish                            1.1.0RC2          Allows for quick two-way blowfish encryption without requiring the MCrypt PHP extension.
pear/Crypt_CBC                                 1.0.1             A class to emulate Perl's Crypt::CBC module.
pear/Crypt_CHAP                                1.5.0             Generating CHAP packets.
pear/Crypt_DiffieHellman                       0.2.6             Implementation of Diffie-Hellman Key Exchange cryptographic protocol for PHP5
pear/Crypt_GPG                                 1.6.2             GNU Privacy Guard (GnuPG)
pear/Crypt_HMAC                                1.0.1             A class to calculate RFC 2104 compliant hashes.
pear/Crypt_HMAC2                               1.0.0             Implementation of Hashed Message Authentication Code for PHP5
pear/Crypt_MicroID                             0.1.0             PHP MicroID library.
pear/Crypt_RC4                                 1.0.3             Encryption class for RC4 encryption.

                                                                 Users are highly encourages to migrate to Crypt_RC42 (Crypt RC4 2.0); a PHP5 compatible release with multiple bug fixes.
pear/Crypt_RC42                                0.9.0             Encryption class for RC4 encryption for PHP 5
pear/Crypt_RSA                                 1.2.1             Provides RSA-like key generation, encryption/decryption, signing and signature checking.

                                                                 Users are strongly advised to migrate to phpseclib's Crypt_RSA; which is better maintained and less vulnerable to security issues.
pear/Crypt_Xtea                                1.1.0             A class that implements the Tiny Encryption Algorithm (TEA) (New Variant).
pear/Crypt_XXTEA                               0.9.0             An implementation of the XXTEA encryption algorithm. NOTICE: unregular default behavior.
pear/Date                                      1.5.0a4           Generic date/time handling class for PEAR
pear/Date_Holidays                             0.21.8            Driver based class to calculate holidays.
pear/Date_Holidays_Australia                   0.2.2             Driver based class to calculate holidays in Australia.
pear/Date_Holidays_Austria                     0.1.6             Driver based class to calculate holidays in Austria.
pear/Date_Holidays_Brazil                      0.1.2             Driver based class to calculate holidays in Brazil.
pear/Date_Holidays_Chile                       0.1.0             Driver based class to calculate holidays in Chile.
pear/Date_Holidays_Croatia                     0.1.1             Driver based class to calculate holidays in Croatia.
pear/Date_Holidays_Czech                       0.1.0             Driver based class to calculate holidays in the Czech Republic.
pear/Date_Holidays_Denmark                     0.1.3             Driver based class to calculate holidays in Denmark.
pear/Date_Holidays_Discordian                  0.1.1             Driver based class to calculate Discordian holidays.
pear/Date_Holidays_EnglandWales                0.1.5             Driver based class to calculate holidays in England and Wales.
pear/Date_Holidays_Finland                     0.1.2             Driver based class to calculate holidays in Finland.
pear/Date_Holidays_France                      0.1.0             Driver based class to calculate holidays in France.
pear/Date_Holidays_Germany                     0.1.2             Driver based class to calculate holidays in Germany.
pear/Date_Holidays_Iceland                     0.1.2             Driver based class to calculate holidays in Iceland.
pear/Date_Holidays_Ireland                     0.1.3             Driver based class to calculate holidays in Ireland.
pear/Date_Holidays_Italy                       0.1.1             Driver based class to calculate holidays in Italy.
pear/Date_Holidays_Japan                       0.1.3             Driver based class to calculate holidays in Japan.
pear/Date_Holidays_Netherlands                 0.1.4             Driver based class to calculate holidays in the Netherlands.
pear/Date_Holidays_Norway                      0.1.2             Driver based class to calculate holidays in Norway.
pear/Date_Holidays_PHPdotNet                   0.1.2             Driver based class to calculate birthdays of some members of the PHP.net community.
pear/Date_Holidays_Portugal                    0.1.1             Driver based class to calculate holidays in Portugal.
pear/Date_Holidays_Romania                     0.1.2             Driver based class to calculate holidays in Romania.
pear/Date_Holidays_Russia                      0.1.0             Driver based class to calculate holidays in Russia.
pear/Date_Holidays_SanMarino                   0.1.1             Driver based class to calculate holidays in San Marino.
pear/Date_Holidays_Serbia                      0.1.0             Driver based class to calculate holidays in Serbia.
pear/Date_Holidays_Slovenia                    0.1.2             Driver based class to calculate holidays in Slovenia.
pear/Date_Holidays_Spain                       0.1.4             Driver based class to calculate holidays in Spain.
pear/Date_Holidays_Sweden                      0.1.3             Driver based class to calculate holidays in Sweden.
pear/Date_Holidays_Turkey                      0.1.1             Driver based class to calculate holidays in Turkey.
pear/Date_Holidays_Ukraine                     0.1.2             Driver based class to calculate holidays in the Ukraine.
pear/Date_Holidays_UNO                         0.1.3             Driver based class to calculate holidays in UNO.
pear/Date_Holidays_USA                         0.1.1             Driver based class to calculate holidays in USA.
pear/Date_Holidays_Venezuela                   0.1.1             Driver based class to calculate holidays in Venezuela.
pear/Date_HumanDiff                            0.5.0             Generate textual time differences that are easily understandable by humans
pear/DB                                        1.9.2      1.7.14 Database Abstraction Layer
pear/DBA                                       1.1.1             Berkely-style database abstraction class
pear/DBA_Relational                            0.2.0             Berkely-style database abstraction class
pear/DB_ado                                    1.3.1             DB driver which use MS ADODB library
pear/DB_DataObject                             1.11.5            An SQL Builder, Object Interface to Database Tables
pear/DB_DataObject_FormBuilder                 1.0.2             Class to automatically build HTML_QuickForm objects from a DB_DataObject-derived class
pear/DB_ldap                                   1.2.1             DB interface to LDAP server
pear/DB_ldap2                                  0.5.1             DB drivers for LDAP v2 and v3 database
pear/DB_NestedSet                              1.4.1             API to build and query nested sets
pear/DB_NestedSet2                                               API to build and query nested sets
pear/DB_odbtp                                  1.0.4             DB interface for ODBTP
pear/DB_Pager                                  0.7.2             Retrieve and return information of database result sets
pear/DB_QueryTool                              1.1.2             An OO-interface for easily retrieving and modifying data in a DB.
pear/DB_Sqlite_Tools                           0.1.7             DB_Sqlite_Tools is an object oriented interface to effectively manage and backup Sqlite databases.
pear/DB_Table                                  1.5.6             An object oriented interface to, and model of, a database. Integrates with HTML_QuickForm.
pear/Event_Dispatcher                          1.1.0             Dispatch notifications using PHP callbacks
pear/Event_SignalEmitter                       0.3.2             Generic signal emitting class with the same API as GObject.
pear/File                                      1.4.1             Common file and directory routines
pear/File_Archive                              1.5.5             File_Archive will let you manipulate easily the tar, gz, tgz, bz2, tbz, zip, ar (or deb) files
pear/File_Bittorrent                           1.1.0             Decode and Encode data in Bittorrent format
pear/File_Bittorrent2                          1.3.1             Decode and Encode data in Bittorrent format
pear/File_Cabinet                              0.1.0             Microsoft Cabinet file extraction using either cabextract or expand
pear/File_CSV                                  1.0.0             Read and write of CSV files
pear/File_CSV_DataSource                       1.0.1             Simple data access object for csv files in php5.
pear/File_DeliciousLibrary                     0.1.1             Parser for the library database of the Delicious Library software.
pear/File_DICOM                                0.3               Package for reading and modifying DICOM files
pear/File_DNS                                  0.1.0             Manipulate RFC1033-style DNS Zonefiles
pear/File_Find                                 1.3.3             A Class the facilitates the search of filesystems
pear/File_Fortune                              1.0.0             File_Fortune provides an interface for reading from and writing to fortune files.
pear/File_Fstab                                2.0.3             Read and write fstab files
pear/File_Gettext                              0.4.2             GNU Gettext file parser
pear/File_HtAccess                             1.2.1             Manipulate .htaccess files
pear/File_IMC                                  0.5.0             Create and parse Internet Mail Consortium-style files (like vCard and vCalendar)
pear/File_Infopath                             0.1.0             A package to read the schema and views in html from a Microsoft Infopath file
pear/File_MARC                                 1.2.0             Parse, modify, and create MARC records
pear/File_Mogile                               0.2.0             PHP interface to MogileFS
pear/File_Ogg                                  0.3.1             Retrieves metadata from Ogg files.
pear/File_Passwd                               1.1.7             Manipulate many kinds of password files
pear/File_PDF                                  0.3.3             PDF generation using only PHP.
pear/File_SearchReplace                        1.1.4             Performs search and replace routines.The package always perform replace and doesn't provide separate functions for search.
pear/File_Sitemap                              0.1.4             Create and manage sitemap files.
pear/File_SMBPasswd                            1.0.3             Class for managing SAMBA style password files.
pear/File_Therion                              0.4.1             File_Therion provides an object oriented interface to Therions .th cave-data files.
pear/File_Util                                 1.0.0             Common file and directory utility functions
pear/File_XSPF                                 0.3.1             Package for Manipulating XSPF Playlists
pear/FSM                                       1.4.0             Finite State Machine
pear/Games_Chess                               1.0.1             Construct and validate a logical chess game, does not display
pear/Genealogy_Gedcom                          1.0.1             Gedcom parser
pear/Gtk2_EntryDialog                          1.0.0             Message box with text entry field
pear/Gtk2_ExceptionDump                        1.1.1             Analyze exceptions, php and PEAR errors visually
pear/Gtk2_FileDrop                             1.0.0             Make Gtk widgets accept file drops
pear/Gtk2_IndexedComboBox                      1.1.0             Indexed Gtk2 combo box similar to the HTML select box.
pear/Gtk2_PHPConfig                            1.0.0RC2          GUI Interface to the php.ini file
pear/Gtk2_ScrollingLabel                       0.4.1             A Scrolling label for PHP-Gtk2
pear/Gtk2_VarDump                              1.0.0             A simple GUI to examine php data trees
pear/Gtk_FileDrop                              1.0.3             Make Gtk widgets accept file drops
pear/Gtk_MDB_Designer                          0.1               An Gtk Database schema designer
pear/Gtk_ScrollingLabel                        1.0.0             A scrolling label for PHP-Gtk
pear/Gtk_Styled                                1.0.0             PHP-GTK pseudo-widgets that mimic GtkData based objects and allow the look and feel to be controlled by the programmer.
pear/Gtk_VarDump                               1.0.1             A simple GUI to example php data trees
pear/HTML_AJAX                                 0.5.8             PHP and JavaScript AJAX library
pear/HTML_BBCodeParser                         1.2.4             This is a parser to replace UBB style tags with their html equivalents.
pear/HTML_BBCodeParser2                        0.1.0             A PHP5 replacement for HTML_BBCodeParser. This is a parser to replace UBB style tags with their html equivalents.
pear/HTML_Common                               1.2.5             PEAR::HTML_Common is a base class for other HTML classes.
pear/HTML_Common2                              2.1.1             Abstract base class for HTML classes (PHP5 port of HTML_Common package).
pear/HTML_Crypt                                1.3.4             Encrypts text which is later decoded using javascript on the client side
pear/HTML_CSS                                  1.5.4             Provides a simple interface for validate, handle and generate cascading style sheets
pear/HTML_Entities                             0.2.2             Convert text to/from HTML entities.
pear/HTML_Form                                 1.3.0             Simple HTML form package
pear/HTML_Javascript                           1.1.2             Provides an interface for creating simple JS scripts.
pear/HTML_Menu                                 2.2.0             Generates HTML menus from multidimensional hashes.
pear/HTML_Page                                 2.0.0RC2          PEAR::HTML_Page is a base class for XHTML page generation.
pear/HTML_Page2                                0.6.5             PEAR::HTML_Page2 is a base class for XHTML page generation.
pear/HTML_Progress                             1.2.6             How to include a loading bar in your XHTML documents quickly and easily.
pear/HTML_Progress2                            2.4.2             How to include a loading bar in your XHTML documents quickly and easily.
pear/HTML_QuickForm                            3.2.14            The PEAR::HTML_QuickForm package provides methods for creating, validating, processing HTML forms.
pear/HTML_QuickForm2                           2.0.2             PHP5 rewrite of HTML_QuickForm package
pear/HTML_QuickForm2_Captcha                   0.1.2             Captcha package for QuickForm2
pear/HTML_QuickForm_advmultiselect             1.5.1             Element for HTML_QuickForm that emulate a multi-select.
pear/HTML_QuickForm_altselect                  1.1.1             An alternative to HTML_QuickForm_select using radio buttons and checkboxes
pear/HTML_QuickForm_CAPTCHA                    0.3.0             Drop-in CAPTCHA element for QuickForm forms
pear/HTML_QuickForm_Controller                 1.0.10            The add-on to HTML_QuickForm package that allows building of multipage forms
pear/HTML_QuickForm_DHTMLRulesTableless        0.3.3             DHTML replacement for the standard JavaScript alert window for client-side
                                                                   validation using the tableless renderer
pear/HTML_QuickForm_ElementGrid                0.1.2             An HTML_QuickForm meta-element which holds any other element in a grid
pear/HTML_QuickForm_Livesearch                 0.4.1             Element for HTML_QuickForm to enable a suggest search.
pear/HTML_QuickForm_Renderer_Tableless         0.6.2             Replacement for the default renderer that doesn't use table tags, and generates
                                                                   fully valid XHTML output.
pear/HTML_QuickForm_Rule_Spelling              0.2.0             A HTML_QuickForm rule plugin that checks the spelling of its values
pear/HTML_QuickForm_SelectFilter               1.0.0RC1          Element for PEAR::HTML_QuickForm that defines dynamic filters on the client side for select elements.
pear/HTML_Safe                                 0.10.1            This parser strips down all potentially dangerous content within HTML
pear/HTML_Select                               1.3.1             HTML_Select is a class for generating HTML form select elements.
pear/HTML_Select_Common                        1.2.0             Some small classes to handle common &lt;select&gt; lists
pear/HTML_Table                                1.8.4             PEAR::HTML_Table makes the design of HTML tables easy, flexible, reusable and efficient.
pear/HTML_Table_Matrix                         1.0.10            Autofill a table with data
pear/HTML_TagCloud                             1.0.0             Generate a &quot;Tag Cloud&quot; in HTML and visualize tags by their frequency.
                                                                 Additionally visualizes each tag's age.
pear/HTML_Template_Flexy                       1.3.13            An extremely powerful Tokenizer driven Template engine
pear/HTML_Template_IT                          1.3.1             Integrated Templates
pear/HTML_Template_PHPLIB                      1.6.0             preg_* based template system.
pear/HTML_Template_PHPTAL                                        Templating engine for XHTML and HTML5 with XML syntax and protection against XSS.
pear/HTML_Template_Sigma                       1.3.0             An implementation of Integrated Templates API with template 'compilation' added
pear/HTML_Template_Xipe                        1.7.6             A simple, fast and powerful template engine.
pear/HTML_TreeMenu                             1.2.2             Provides an api to create a HTML tree
pear/HTTP                                      1.4.1             Miscellaneous HTTP utilities
pear/HTTP2                                     1.1.2             Miscellaneous HTTP utilities
pear/HTTP_Client                               1.2.1             Easy way to perform multiple HTTP requests and process their results
pear/HTTP_Download                             1.1.4             Send HTTP Downloads
pear/HTTP_Download2                                              A fork of HTTP_Download for PHP5+
pear/HTTP_FloodControl                         0.1.1             Detect and protect from attempts to flood a site
pear/HTTP_Header                               1.2.1             OO interface to modify and handle HTTP headers and status codes.

                                                                 PEAR QA would recommend Symfony HTTP_Foundation for PHP 5.3+ users.

                                                                 See http://symfony.com/doc/current/components/http_foundation.html
pear/HTTP_Header2                              0.1.0             A fork of HTTP_Header for PHP5+
pear/HTTP_OAuth                                0.3.2             PEAR implementation of the OAuth 1.0a specification
pear/HTTP_Request                              1.4.4             Provides an easy way to perform HTTP requests
pear/HTTP_Request2                             2.3.0             Provides an easy way to perform HTTP requests.
pear/HTTP_Server                               0.4.1             HTTP server class.
pear/HTTP_Session                              0.5.6             Object-oriented interface to the session_* family functions
pear/HTTP_Session2                             0.7.3             PHP5 Session Handler
pear/HTTP_SessionServer                        0.5.0             Daemon to store session data that can be accessed via a simple protocol.
pear/HTTP_Upload                               1.0.0b4           Easy and secure managment of files submitted via HTML Forms
pear/HTTP_WebDAV_Client                        1.0.2             WebDAV stream wrapper class
pear/HTTP_WebDAV_Server                        1.0.0RC8          WebDAV Server Baseclass.
pear/I18N                                      1.0.0             Internationalization package
pear/I18Nv2                                    0.11.4            Internationalization
pear/I18N_UnicodeNormalizer                    1.0.0             Unicode Normalizer
pear/I18N_UnicodeString                        0.3.1             Provides a way to work with self contained multibyte strings
pear/Image_3D                                  0.4.2             This class allows the rendering of 3 dimensional objects utilizing PHP.
pear/Image_Barcode                             1.1.3             Barcode generation
pear/Image_Barcode2                            0.2.3             Barcode generation
pear/Image_Canvas                              0.3.5             A package providing a common interface to image drawing, making image source code independent on the library used.
pear/Image_Color                               1.0.4             Manage and handles color data and conversions.
pear/Image_Color2                              0.1.5             Color conversion and mixing for PHP5
pear/Image_GIS                                 1.1.2             Visualization of GIS data.
pear/Image_GIS2                                0.1.0             Visualization of GIS data.
pear/Image_Graph                               0.8.0             A package for displaying (numerical) data as a graph/chart/plot.
pear/Image_GraphViz                            1.3.0             Interface to AT&T's GraphViz tools
pear/Image_IPTC                                1.0.2             Extract, modify, and save IPTC data
pear/Image_JpegMarkerReader                    0.5.0             Read arbitrary markers from JPEG files.
pear/Image_JpegXmpReader                       0.5.3             Read Photoshop-style XMP metadata from JPEG files.
pear/Image_MonoBMP                             0.1.0             Manipulate monochrome BMP images
pear/Image_Puzzle                              0.2.2             Generates puzzle pieces from image file
pear/Image_QRCode                              0.1.3             A QR (2D) barcode image generator.
pear/Image_Remote                              1.0.2             Retrieve information on remote image files.
pear/Image_Text                                0.7.0             Image_Text - Advanced text maipulations in images.
pear/Image_Tools                               1.0.0RC1          Tools collection for image manipulation.
pear/Image_Transform                           0.9.5             Provides a standard interface to manipulate images using different libraries
pear/Image_WBMP                                0.1.0             Manipulate WBMP images
pear/Image_XBM                                 0.9.0RC1          Manipulate XBM images
pear/Inline_C                                  0.1               Allows inline inclusion of function definitions in C
pear/LiveUser                                  0.16.14           User authentication and permission management framework
pear/LiveUser_Admin                            0.4.0             User authentication and permission management framework
pear/Log                                       1.13.1            Logging Framework
pear/Mail                                      1.4.1      1.3.0  Class that provides multiple interfaces for sending emails
pear/Mail2                                     0.1.1             Class that provides multiple interfaces for sending emails
pear/Mail_IMAP                                 1.1.0RC2          Provides a c-client backend for webmail.
pear/Mail_IMAPv2                               0.2.1             Provides a c-client backend for webmail.
pear/Mail_Mbox                                 0.6.3             Read and modify Unix MBOXes
pear/Mail_Mime                                 1.10.2     1.10.0 Mail_Mime provides classes to create MIME messages.
pear/Mail_Mime2                                                  Mail_Mime provides classes to create MIME messages.
pear/Mail_mimeDecode                           1.5.6             Provides a class to decode mime messages.
pear/Mail_Queue                                1.2.7             Class for put mails in queue and send them later in background.
pear/Math_Basex                                0.3.1             Simple class for converting base set of numbers with a customizable character base set.
pear/Math_BigInteger                           1.0.3             Pure-PHP arbitrary precission integer arithmetic library
pear/Math_BinaryUtils                          0.3.0             Collection of helper methods for easy handling of binary data.
pear/Math_Combinatorics                        1.0.0             A package that produces combinations and permutations
pear/Math_Complex                              0.8.6             Classes that define complex numbers and their operations
pear/Math_Derivative                           1.0.0RC1          Calculate the derivative of a mathematical expression
pear/Math_Fibonacci                            0.8               Package to calculate and manipulate Fibonacci numbers
pear/Math_Finance                              1.0.1             Financial functions
pear/Math_Fraction                             0.4.1             Classes that represent and manipulate fractions.
pear/Math_Histogram                            0.9.0             Classes to calculate histogram distributions
pear/Math_Integer                              0.9.0             Package to represent and manipulate integers
pear/Math_Matrix                               0.8.7             Class to represent matrices and matrix operations
pear/Math_Numerical_RootFinding                1.1.0a2           Numerical Root-Finding methods package in PHP
pear/Math_Polynomial                           0.1.0             Package to represent and manipulate Polynomial equations
pear/Math_Quaternion                           0.8.0             Classes that define Quaternions and their operations
pear/Math_RPN                                  1.1.2             Reverse Polish Notation.
pear/Math_Stats                                0.9.1             Classes to calculate statistical parameters
pear/Math_TrigOp                               1.0               Supplementary trigonometric functions
pear/Math_Vector                               0.7.0             Vector and vector operation classes
pear/MDB                                       1.3.0             database abstraction layer
pear/MDB2                                      2.5.0b5           database abstraction layer
pear/MDB2_Driver_fbsql                         0.3.0             fbsql MDB2 driver
pear/MDB2_Driver_ibase                         1.5.0b5           ibase MDB2 driver
pear/MDB2_Driver_mssql                         1.5.0b4           mssql MDB2 driver
pear/MDB2_Driver_mysql                         1.5.0b4           mysql MDB2 driver
pear/MDB2_Driver_mysqli                        1.5.0b4           mysqli MDB2 driver
pear/MDB2_Driver_oci8                          1.5.0b4           oci8 MDB2 driver
pear/MDB2_Driver_odbc                          0.2.0             ODBC Driver for MDB2
pear/MDB2_Driver_pgsql                         1.5.0b4           pgsql MDB2 driver
pear/MDB2_Driver_querysim                      0.7.0             querysim MDB2 driver
pear/MDB2_Driver_sqlite                        1.5.0b4           sqlite MDB2 driver
pear/MDB2_Driver_sqlsrv                        1.5.0b5           sqlsrv MDB2 driver
pear/MDB2_Schema                               0.8.6             XML based database schema manager
pear/MDB2_TableBrowser                         0.1.3             Database table abstraction library
pear/MDB_QueryTool                             1.2.3             An OO-interface for easily retrieving and modifying data in a DB.
pear/Message                                   0.6               Message hash and digest (HMAC) generation methods and classes
pear/MIME_Type                                 1.4.1             Utility class for dealing with MIME types
pear/MP3_Id                                    1.2.2             Read/Write MP3-Tags
pear/MP3_IDv2                                  0.1.8             Read/Write IDv2-Tags
pear/MP3_Playlist                              0.5.2             Library to create MP3 playlists on the fly, several formats supported including XML, RSS and XHTML
pear/Net_AsteriskManager                                         Control an Asterisk PBX server from PHP
pear/Net_CDDB                                  0.3.0             Package to access and query, and build CDDB audio-CD servers
pear/Net_CheckIP                               1.2.2             Check the syntax of IPv4 addresses
pear/Net_CheckIP2                              1.0.0RC3          A package to determine if an IP (v4) is valid.
pear/Net_Curl                                  1.2.5             Net_Curl provides an OO interface to PHP's cURL extension
pear/Net_Cyrus                                 0.3.2             provides an API for the administration of Cyrus IMAP servers.
pear/Net_Dict                                  1.0.7             Interface to the DICT Protocol
pear/Net_Dig                                   0.1               The PEAR::Net_Dig class should be a nice, friendly OO interface to the dig command
pear/Net_DIME                                  1.0.2             The Net_DIME package implements DIME encoding and decoding
pear/Net_DNS                                   1.0.7             Resolver library used to communicate with a DNS server.
pear/Net_DNS2                                  1.4.4             PHP5 Resolver library used to communicate with a DNS server.
pear/Net_DNSBL                                 1.3.7             Easy way to check if a given Host or URL is listed on a DNSBL or SURBL
pear/Net_Finger                                1.0.1             The PEAR::Net_Finger class provides a tool for querying Finger Servers
pear/Net_FTP                                   1.4.0             Net_FTP provides an OO interface to the PHP FTP functions plus some additions
pear/Net_GameServerQuery                       0.3.0             An interface to query and return information from a game server
pear/Net_Gearman                               0.2.3             A PHP interface to Gearman
pear/Net_Geo                                   1.0.5             Geographical locations based on Internet address
pear/Net_GeoIP                                 1.0.0             Library to perform geo-location lookups of IP addresses.
pear/Net_Growl                                 2.7.0             Send notifications to Growl from PHP on MACOSX and WINDOWS
pear/Net_HL7                                   0.1.1             HL7 messaging API.
pear/Net_Ident                                 1.1.0             Identification Protocol implementation
pear/Net_IDNA                                  0.8.1             Punycode encoding and decoding.
pear/Net_IDNA2                                 0.2.0             Punycode encoding and decoding.
pear/Net_IMAP                                  1.1.3             Provides an implementation of the IMAP protocol
pear/Net_IPv4                                  1.3.4             IPv4 network calculations and validation.
pear/Net_IPv6                                  1.3.0b3           Check and validate IPv6 addresses
pear/Net_IRC                                   0.0.7             IRC Client Class
pear/Net_LDAP                                  1.1.5             Object oriented interface for searching and manipulating LDAP-entries
pear/Net_LDAP2                                 2.2.0             Object oriented interface for searching and manipulating LDAP-entries
pear/Net_LMTP                                  1.0.2             Provides an implementation of the RFC2033 LMTP protocol
pear/Net_MAC                                   0.1.5             Validates and formats MAC addresses
pear/Net_Monitor                               0.3.0             Remote Service Monitor
pear/Net_MPD                                   1.0.2             Music Player Daemon interaction API
pear/Net_Nmap                                  1.0.5             A simple wrapper class for the Nmap utility
pear/Net_NNTP                                  1.5.2             NNTP implementation
pear/Net_Ping                                  2.4.5             Execute ping
pear/Net_POP3                                  1.3.8             Provides a POP3 class to access POP3 server.
pear/Net_Portscan                              1.0.3             Portscanner utilities.
pear/Net_Server                                1.0.3             Generic server class
pear/Net_Sieve                                 1.4.3             Handles talking to a sieve server.
pear/Net_SmartIRC                              1.1.13            Helps you communicate with IRC networks in whatever way you might need, whether in a CLI program or as part of a web page. Also well-suited for bot development.
pear/Net_SMPP                                  0.4.5             SMPP v3.4 protocol implementation
pear/Net_SMPP_Client                           0.4.1             SMPP v3.4 client
pear/Net_SMS                                   0.2.1             SMS functionality.
pear/Net_SMTP                                  1.8.0      1.7.1  An implementation of the SMTP protocol
pear/Net_SMTP2                                 0.1.0             Net_SMTP w/PHP5 compatibility
pear/Net_Socket                                1.2.2      1.0.14 Network Socket Interface
pear/Net_Socket2                               0.1.1             Network Socket Interface
pear/Net_SSH2                                                    ssh2 client abstraction layer
pear/Net_Traceroute                            0.21.3            Execute traceroute
pear/Net_URL                                   1.0.15            Easy parsing of Urls
pear/Net_URL2                                  2.1.2             Class for parsing and handling URL.
pear/Net_URL_Mapper                            0.9.1             Provides a simple and flexible way to build nice URLs for web applications.
pear/Net_UserAgent_Detect                      2.5.2             Net_UserAgent_Detect determines the Web browser, version, and platform from an HTTP user agent string
pear/Net_UserAgent_Mobile                      1.0.0             HTTP mobile user agent string parser
pear/Net_UserAgent_Mobile_GPS                  0.1.1             Interface for GPS
pear/Net_Vpopmaild                             0.3.2             Class for accessing Vpopmail's vpopmaild daemon
pear/Net_WebFinger                             0.4.0             WebFinger client library for PHP
pear/Net_Whois                                 1.0.5             The PEAR::Net_Whois class provides a tool to query internet domain name and network number directory services
pear/Net_Wifi                                  1.3.0             Scans for wireless networks
pear/Numbers_Roman                             1.0.2             Provides methods for converting to and from Roman Numerals.
pear/Numbers_Words                             0.18.2            The PEAR Numbers_Words package provides methods for spelling numerals in words.
pear/OLE                                       1.0.0RC3          Package for reading and writing OLE containers
pear/OpenDocument                              0.2.1             Read, create and modify OASIS OpenDocument office files.
pear/OpenID                                    0.4.0             PHP implementation of OpenID 1.1 and 2.0
pear/Pager                                     2.5.1             Data paging class
pear/Pager_Sliding                             1.6               Sliding Window Pager.
pear/Payment_Clieop                            0.2.0             These classes can create a clieop03 file for you which you can send to a Dutch Bank. Ofcourse you need also a Dutch bank account.
pear/Payment_DTA                               1.4.3             Creates and reads DTA and DTAZV files containing money transaction data (Germany).
pear/Payment_PagamentoCerto                    0.2.3             PHP client to Brazilian payment gateway PagamentoCerto
pear/Payment_PayPal_SOAP                       0.5.1             PayPal SOAP API client
pear/Payment_Process                           0.6.8             Unified payment processor
pear/Payment_Process2                          0.3.1             A PHP5 Payment process API
pear/PEAR                                      1.10.5     1.10.5 PEAR Base System
pear/pearweb                                   1.29.0            The source code for the PEAR website
pear/pearweb_channelxml                        1.15.2            channel.xml and DTD for pear.php.net channel
pear/pearweb_election                          1.0.2             The source code for the PEAR website election
pear/pearweb_gopear                            1.1.7             go-pear script for pear.php.net
pear/pearweb_index                             1.24.0            The source code for the PEAR website, informational front pages
pear/pearweb_manual                            1.3.0             The source code for the PEAR website manual bits
pear/pearweb_pepr                              1.0.5             The source code for the PEAR website package voting
pear/pearweb_phars                             1.10.7            The source code for the PEAR website: go-pear.phar/install-pear-nozlib.phar
pear/pearweb_qa                                1.0.3             The source code for the PEAR website QA scripts
pear/PEAR_Command_Packaging                    0.3.0             make-rpm-spec command for managing RPM .spec files for PEAR packages
pear/PEAR_Delegator                            0.1.0             Delegation for PHP
pear/PEAR_Exception                            1.0.0             The PEAR Exception base class
pear/PEAR_Frontend_Gtk                         0.4.0             Depreciated - Use PEAR_Frontend_Gtk2
pear/PEAR_Frontend_Gtk2                        1.1.0             Graphical PEAR installer based on PHP-Gtk2
pear/PEAR_Frontend_Web                         0.7.5             Webbased PEAR Package Manager
pear/PEAR_Info                                 1.9.2             Show Information about your PEAR install and its packages
pear/PEAR_Manpages                             1.10.0     1.10.0 PEAR man pages
pear/PEAR_PackageFileManager                   1.7.2             PEAR_PackageFileManager takes an existing v1 package.xml file and updates it with a new filelist and changelog
pear/PEAR_PackageFileManager2                  1.0.4             PEAR_PackageFileManager2 takes an existing v2 package.xml file and updates it with a new filelist and changelog
pear/PEAR_PackageFileManager_Cli               0.4.0             A command line interface to PEAR_PackageFileManager
pear/PEAR_PackageFileManager_Frontend          0.8.0             PEAR_PackageFileManager_Frontend, the singleton-based frontend for user input/output.
pear/PEAR_PackageFileManager_Frontend_Web      0.6.0             A Web GUI frontend for the PEAR_PackageFileManager2 class.
pear/PEAR_PackageFileManager_GUI_Gtk           1.0.1             A PHP-GTK frontend for the PEAR_PackageFileManager class.
pear/PEAR_PackageFileManager_Plugins           1.0.4             The plugins for PEAR_PackageFileManager to pick up what files to use, supported are File, CVS, SVN, Git, Perforce
pear/PEAR_PackageUpdate                        1.1.0RC1          A simple way to update packages at run time.
pear/PEAR_PackageUpdate_Gtk2                   0.3.2             A PHP-GTK 2 front end for PEAR_PackageUpdate
pear/PEAR_PackageUpdate_Web                    1.0.1             A Web front end for PEAR_PackageUpdate
pear/PEAR_RemoteInstaller                      0.3.2             PEAR Remote installation plugin through FTP, SFTP, and FTPS
pear/PEAR_Size                                 1.0.0RC2          Determine and list how much filespace each installed package consumes.
pear/PHPDoc                                    0.1.0             Tool to generate documentation from the source
pear/PhpDocumentor                             1.5.0a1           The phpDocumentor package provides automatic documenting of php api directly from the source.
pear/PHPUnit                                   1.3.2             Regression testing framework for unit tests.
pear/PHPUnit2                                  2.3.6             Regression testing framework for unit tests.
pear/PHP_Archive                               0.12.0            Create and Use PHP Archive files
pear/PHP_ArrayOf                               0.2.1             Abstract class package to create arrays of specific element types
pear/PHP_Beautifier                            0.1.15            Beautifier for Php
pear/PHP_CodeSniffer                           3.2.3             PHP_CodeSniffer tokenizes PHP, JavaScript and CSS files to detect and fix violations of a defined set of coding standards.
pear/PHP_Compat                                1.6.0a3           Provides components to achieve PHP version independence
pear/PHP_CompatInfo                            1.9.0             Find out the minimum version and the extensions required for a piece of code to run
pear/PHP_Debug                                 1.0.3             PHP_Debug provides assistance in debugging PHP code
pear/PHP_DocBlockGenerator                     1.1.2             DocBlock Generator
pear/PHP_Fork                                  0.4.0             PHP_Fork class. Wrapper around the pcntl_fork() stuff with a API set like Java language
pear/PHP_FunctionCallTracer                    1.0.0             Function Call Tracer
pear/PHP_LexerGenerator                        0.4.0             translate lexer files in lex2php format into a PHP 5 lexer
pear/PHP_Parser                                0.2.2             A PHP Grammar Parser
pear/PHP_ParserGenerator                       0.1.7             translate grammar files in Lemon Parser Generator format into a PHP 5 parser
pear/PHP_Parser_DocblockParser                 0.1.1             A /** docblock */ parser
pear/PHP_Shell                                 0.3.2             a interactive PHP Shell
pear/PHP_UML                                   1.6.2             A reverse-engineering package that scans PHP files and directories, and delivers an UML/XMI representation of the classes and packages found.
pear/QA_Peardoc_Coverage                       1.1.1             PEAR documentation coverage analysis.
pear/RDF                                       0.2.0             Port of the core RAP API
pear/RDF_N3                                    0.2.0             Port of the RAP N3 parser/serializer
pear/RDF_NTriple                               0.2.0             Port of the RAP NTriple serializer
pear/RDF_RDQL                                  0.2.0             Port of the RAP RDQL API
pear/Science_Chemistry                         1.1.2             Classes to manipulate chemical objects: atoms, molecules, etc.
pear/ScriptReorganizer                         0.4.0             Library/Tool focusing exclusively on the file size aspect of PHP script optimization.
pear/Search_Mnogosearch                        0.1.1             Wrapper classes for the mnoGoSearch extention
pear/Services_Akismet                          1.0.1             PHP client for the Akismet REST API
pear/Services_Akismet2                         0.3.1             PHP client for the Akismet REST API
pear/Services_Amazon                           0.9.0             PHP interface to Amazon Product Advertising API
pear/Services_Amazon_S3                        0.4.0             PHP API for Amazon S3 (Simple Storage Service)
pear/Services_Amazon_SQS                       0.3.0             PHP API and tools for Amazon SQS (Simple Queue Service)
pear/Services_Apns                             0.1.0             Apple Push Notifications Service communication
pear/Services_Atlassian_Crowd                  0.9.5             Services_Atlassian_Crowd is a package to use Atlassian Crowd from PHP
pear/Services_Blogging                         0.2.4             Access your blog with PHP
pear/Services_Compete                          0.1.0             Compete API
pear/Services_Delicious                        0.6.0             Client for the del.icio.us web service.
pear/Services_Digg                             0.4.7             PHP interface to Digg's API
pear/Services_Digg2                            0.3.2             Second generation Digg API client
pear/Services_DynDNS                           0.3.1             Provides access to the DynDNS web service
pear/Services_Ebay                             0.13.1            Interface to eBay's XML-API.
pear/Services_ExchangeRates                    0.8.0             Performs currency conversion
pear/Services_Facebook                         0.2.14            PHP interface to Facebook's API
pear/Services_GeoNames                         1.0.1             A PHP5 interface to the GeoNames public API
pear/Services_Google                           0.2.0             Provides access to the Google SOAP Web APIs
pear/Services_Hatena                           0.1.5             WebServices for Hatena
pear/Services_JSON                             1.0.3             PHP implementaion of json_encode/decode
pear/Services_Libravatar                       0.2.3             API interfacing class for libravatar.org
pear/Services_Mailman                          0.1.0             Integrates Mailman into a website using PHP
pear/Services_oEmbed                           0.2.1             A package for consuming oEmbed
pear/Services_OpenSearch                       0.2.0             Search A9 OpenSearch compatible engines.
pear/Services_OpenStreetMap                    1.0.0RC1          OpenStreetMap Services
pear/Services_PageRank_[OBSOLETE]                                [OBSOLETE]
pear/Services_Pingback                         0.2.2             A Pingback User-Agent class.
pear/Services_ProjectHoneyPot                  0.6.0             A package to interface the http:bl API of ProjectHoneyPot.org.
pear/Services_ReCaptcha                        1.0.3             PHP5 interface to the reCATCHA and the reCATCHA Mailhide API
pear/Services_Scribd                           0.2.0             Interface for Scribd's public API.
pear/Services_SharedBook                       0.2.6             PHP wrapper for SharedBook Open API
pear/Services_ShortURL                         0.3.1             Abstract PHP5 interface for shortening and expanding short URLs
pear/Services_Technorati                       0.7.1beta         A class for interacting with the Technorati API
pear/Services_TinyURL                          0.1.2             PHP interface to TinyURL's API
pear/Services_Trackback                        0.7.1             Trackback - A generic class for sending and receiving trackbacks.
pear/Services_TwitPic                          0.1.0             PHP Interface to TwitPic's API
pear/Services_Twitter                          0.7.0             PHP interface to Twitter's API
pear/Services_Twitter_Uploader                 0.1.0             OAuth echo uploader utility.
pear/Services_urlTea                           0.1.0             PHP interface to urlTea's API
pear/Services_UseKetchup                       0.1.0             An API wrapper to the useketchup.com web service.
pear/Services_W3C_CSSValidator                 0.2.3             An Object Oriented Interface to the W3C CSS Validator service.
pear/Services_W3C_HTMLValidator                1.0.0             An Object Oriented Interface to the W3C HTML Validator service.
pear/Services_Weather                          1.4.7             This class acts as an interface to various online weather-services.
pear/Services_Webservice                       0.6.0             Create webservices
pear/Services_Yadis                            0.5.3             Implementation of the Yadis Specification 1.0 protocol
pear/Services_Yahoo                            0.2.0             Provides access to the Yahoo! Web Services
pear/Services_Yahoo_JP                         0.1.1             WebServices for Yahoo!JAPAN
pear/Services_YouTube                          0.2.2             PHP Client for YouTube API
pear/SOAP                                      0.13.0            **Use PHP's in-built SOAP client!**

                                                                 SOAP Client/Server for PHP
pear/SOAP_Interop                              0.8.2             SOAP Interop Test Application
pear/Spreadsheet_Excel_Writer                  0.9.4             Package for generating Excel spreadsheets
pear/SQL_Parser                                0.7.0             An SQL parser
pear/Stream_SHM                                1.0.0             Shared Memory Stream
pear/Stream_Var                                1.2.0             Allows stream based access to any variable.
pear/Structures_BibTex                         1.0.0RC6          Handling of BibTex Data.
pear/Structures_DataGrid                       0.9.3             Render a data table with automatic pagination and sorting
pear/Structures_DataGrid_DataSource_Array      0.2.0dev1         DataSource driver using arrays
pear/Structures_DataGrid_DataSource_CSV        0.1.6             DataSource driver using CSV files
pear/Structures_DataGrid_DataSource_DataObject 0.2.2dev1         DataSource driver using PEAR::DB_DataObject
pear/Structures_DataGrid_DataSource_DB         0.1.1             DataSource driver using PEAR::DB result objects
pear/Structures_DataGrid_DataSource_DBQuery    0.1.11            DataSource driver using PEAR::DB and an SQL query
pear/Structures_DataGrid_DataSource_DBTable    0.1.7             DataSource driver using PEAR::DB_Table
pear/Structures_DataGrid_DataSource_Excel      0.1.2             DataSource driver using Excel spreadsheets
pear/Structures_DataGrid_DataSource_MDB2       0.1.11            DataSource driver using PEAR::MDB2 and an SQL query
pear/Structures_DataGrid_DataSource_PDO        0.2.0             DataSource driver using PHP Data Objects (PDO) and an SQL query
pear/Structures_DataGrid_DataSource_RSS        0.1.1             DataSource driver using RSS files
pear/Structures_DataGrid_DataSource_XML        0.2.1dev1         DataSource driver using XML files
pear/Structures_DataGrid_Renderer_Console      0.1.1             Renderer driver using PEAR::Console_Table
pear/Structures_DataGrid_Renderer_CSV          0.1.5dev1         Renderer driver that generates a CSV string
pear/Structures_DataGrid_Renderer_Flexy        0.1.4             Renderer driver using Flexy
pear/Structures_DataGrid_Renderer_HTMLSortForm 0.1.3             Sorting form renderer for Structures_DataGrid
pear/Structures_DataGrid_Renderer_HTMLTable    0.1.6             Renderer driver using PEAR::HTML_Table
pear/Structures_DataGrid_Renderer_Pager        0.1.3             Renderer driver using PEAR::Pager
pear/Structures_DataGrid_Renderer_Smarty       0.1.5             Renderer driver using Smarty
pear/Structures_DataGrid_Renderer_XLS          0.1.3             Renderer driver using PEAR::Spreadsheet_Excel_Writer
pear/Structures_DataGrid_Renderer_XML          0.1.4dev1         Renderer driver that generates a XML string
pear/Structures_DataGrid_Renderer_XUL          0.1.3             Renderer driver that generates the XML string for a XUL listbox
pear/Structures_Form                           0.8.0devel        A package designed to make creating input forms easy for packages and applications regardless of their user interface.
pear/Structures_Form_Gtk2                      0.8.0devel        A collection of elements, groups and renderers for creating PHP-GTK 2 forms using Structures_Form.
pear/Structures_Graph                          1.1.1      1.1.1  Graph datastructure manipulation library
pear/Structures_LinkedList                     0.2.2             Implements singly and doubly-linked lists
pear/System_Command                            1.0.8             PEAR::System_Command is a commandline execution interface.
pear/System_Daemon                             1.0.0             Turn PHP scripts into Linux daemons
pear/System_Folders                            1.0.5             Location of system folders
pear/System_Launcher                           0.6.2             Launch files with associated applications
pear/System_Mount                              1.0.1             Mount and unmount devices in fstab
pear/System_ProcWatch                          0.4.3             Monitor Processes
pear/System_SharedMemory                       0.9.0RC1          common OO-style shared memory API
pear/System_Socket                             0.4.1             OO socket API
pear/System_WinDrives                          1.0.0             List files drives on windows systems
pear/test                                                        test
pear/Testing_DocTest                           0.6.0             A Unit Test framework for writing tests in your php code docstrings.
pear/Testing_FIT                               0.2.2             FIT: Framework for Integrated Test
pear/Testing_Selenium                          0.4.4             PHP Client for Selenium RC
pear/Text_CAPTCHA                              1.0.2             Generation of CAPTCHAs
pear/Text_CAPTCHA_Numeral                      1.3.2             Generation of numeral maths captchas
pear/Text_Diff                                 1.2.2             Engine for performing and rendering text diffs
pear/Text_Figlet                               1.0.2             Render text using FIGlet fonts
pear/Text_Highlighter                          0.8.0             Syntax highlighting
pear/Text_Huffman                              0.2.0             Huffman compression
pear/Text_LanguageDetect                       1.0.0             Language detection class
pear/Text_Password                             1.2.1             Creating passwords with PHP.
pear/Text_PathNavigator                        0.2.0             Facilitates navigation of path strings
pear/Text_Spell_Audio                          0.1.0             Generates a sound clip saying the contents of a string of characters.
pear/Text_Statistics                           1.0.1             Compute readability indexes for documents.
pear/Text_TeXHyphen                            0.1.0             Automated word hyphenation with the TeX algorithm.
pear/Text_Wiki                                 1.2.1             Transforms Wiki and BBCode markup into XHTML, LaTeX or plain text markup. This is the base engine for all of the Text_Wiki sub-classes.
pear/Text_Wiki2                                                  A PHP5 port of Text_Wiki.
pear/Text_Wiki_BBCode                          0.0.4             BBCode parser for Text_Wiki
pear/Text_Wiki_Cowiki                          0.0.2             Cowiki parser and renderer for Text_Wiki
pear/Text_Wiki_Creole                          1.0.2             Creole parser and renderer for Text_Wiki
pear/Text_Wiki_Doku                            0.0.1             Doku parser and renderer for Text_Wiki
pear/Text_Wiki_Mediawiki                       0.2.0             Mediawiki parser for Text_Wiki
pear/Text_Wiki_Tiki                            0.1.0             Tiki parser and renderer for Text_Wiki
pear/Translation                               1.2.6pl1          Class for creating multilingual websites.
pear/Translation2                              2.0.4             Class for multilingual applications management.
pear/Tree                                      0.3.7             Generic tree management, currently supports databases (via DB, MDB and MDB2) and XML as data sources
pear/UDDI                                      0.2.4             UDDI for PHP
pear/URI_Template                              0.3.3             Parser for URI Templates.
pear/Validate                                  0.8.5             Validation class
pear/Validate_AR                               0.1.2             Validation class for Argentina
pear/Validate_AT                               0.5.2             Validation class for AT
pear/Validate_AU                               0.1.4             Data validation class for Australia.
pear/Validate_BE                               0.1.4             Validation class for Belgium
pear/Validate_CA                               0.2.0             Validation class for Canada
pear/Validate_CH                               0.6.0             Validation class for CH
pear/Validate_DE                               0.5.2             Validation class for DE
pear/Validate_DK                               0.2.0             Validation class for Denmark
pear/Validate_ES                               0.6.2             Validation class for ES
pear/Validate_FI                               1.0.0             Validation class for Finland
pear/Validate_Finance                          0.5.6             Validation class for Finance
pear/Validate_Finance_CreditCard               0.6.0             Validation class for Credit Cards
pear/Validate_FR                               0.6.0             Validation class for FR
pear/Validate_HU                               0.1.1             Validation class for Hungary
pear/Validate_IE                               1.1.0             Validation class for Ireland
pear/Validate_IN                               0.1.1             Validation class for the Republic of India
pear/Validate_IR                               0.1.0             Data validation class for Iran.
pear/Validate_IS                               0.3.1             Validation class for Iceland
pear/Validate_ISPN                             0.6.1             Validation class for ISPN (International Standard Product Numbers)
pear/Validate_IT                               0.2.0             Validation class for Italy
pear/Validate_LI                               0.1.0             Validation class for Liechtenstein
pear/Validate_LU                               0.1.0             Validation class for Luxembourg
pear/Validate_LV                               1.0.0RC2          Validation class for Latvia
pear/Validate_NL                               0.5.2             Validation class for NL
pear/Validate_NO                               0.1.0             Validation class for Norway
pear/Validate_NZ                               0.1.6             Validation class for NZ
pear/Validate_PL                               0.5.2             Validation class for PL
pear/Validate_ptBR                             0.5.5             Validation class for Brazilian Portuguese
pear/Validate_RU                                                 local russian Validate methods
pear/Validate_SE                               0.1.1             Validation class for Sweden
pear/Validate_UK                               0.5.4             Validation class for UK
pear/Validate_US                               0.5.5             Validation class for US
pear/Validate_ZA                               0.2.2             Validation class for ZA
pear/Var_Dump                                  1.0.4             Provides methods for dumping structured information about a variable.
pear/VersionControl_Git                        0.5.0             Provides OO interface to handle Git repository
pear/VersionControl_SVN                        0.5.2             Simple OO wrapper interface for the Subversion command-line client.
pear/VFS                                       0.3.0             Virtual File System API
pear/XML_Beautifier                            1.2.2             Class to format XML documents.
pear/XML_CSSML                                 1.1.1             The PEAR::XML_CSSML package provides methods for creating cascading style sheets (CSS) from an XML standard called CSSML.
pear/XML_DTD                                   0.5.2             Parsing of DTD files and DTD validation of XML files
pear/XML_FastCreate                            1.0.4             Fast creation of valid XML with DTD control.
pear/XML_Feed_Parser                           1.0.5             Providing a unified API for handling Atom/RSS
pear/XML_fo2pdf                                0.98              Converts a xsl-fo file to pdf/ps/pcl/text/etc with the help of apache-fop
pear/XML_FOAF                                  0.4.0             Provides the ability to manipulate FOAF RDF/XML
pear/XML_GRDDL                                 0.2.0             A PHP library for dealing with GRDDL.
pear/XML_HTMLSax                               2.1.2             A SAX parser for HTML and other badly formed XML documents
pear/XML_HTMLSax3                              3.0.0             A SAX parser for HTML and other badly formed XML documents
pear/XML_image2svg                             0.1.1             Image to SVG conversion
pear/XML_Indexing                              0.3.6             XML Indexing support
pear/XML_MXML                                  0.3.0             Framework to build Macromedia Flex applications.
pear/XML_NITF                                  1.1.1             Parse NITF documents.
pear/XML_Parser                                1.3.7             XML parsing class based on PHP's bundled expat
pear/XML_Parser2                               0.1.0             PHP5+ version of XML_Parser - an XML parsing class based on PHP's bundled expat
pear/XML_Query2XML                             1.7.2             Creates XML data from SQL queries
pear/XML_RDDL                                  0.9               Class to read RDDL (Resource Directory Description Language) documents.
pear/XML_RPC                                   1.5.5             PHP implementation of the XML-RPC protocol
pear/XML_RPC2                                  1.1.3             XML-RPC client/server library
pear/XML_RSS                                   1.1.0             RSS parser
pear/XML_SaxFilters                            0.3.0             A framework for building XML filters using the SAX API
pear/XML_Serializer                            0.21.0            Swiss-army knife for reading and writing XML files. Creates XML files from data structures and vice versa.
pear/XML_sql2xml                               0.3.4             Returns XML from a SQL-Query.
pear/XML_Statistics                            0.2.0             Class to obtain statistical information from an XML documents.
pear/XML_SVG                                   1.1.0             XML_SVG API
pear/XML_svg2image                             0.2.0             Converts a svg  file to a png/jpeg image.
pear/XML_Transformer                           1.1.2             XML Transformations in PHP
pear/XML_Tree                                  2.0.0RC3          *** PHP5 now comes with very good XML handling, consider using it if possible. Otherwise, use XML_Serializer ***

                                                                 Represent XML data in a tree structure
pear/XML_Util                                  1.4.3      1.4.3  XML utility class
pear/XML_Util2                                 0.2.0             XML utility class
pear/XML_Wddx                                  1.0.2             Wddx pretty serializer and deserializer
pear/XML_XPath                                 1.2.4             The PEAR::XML_XPath class provided an XPath/DOM XML manipulation, maneuvering and query interface.
pear/XML_XPath2                                                  The PEAR::XML_XPath2 package provided an XPath/DOM XML manipulation, maneuvering and query interface.
pear/XML_XRD                                   0.3.1             PHP library to parse and generate "Extensible Resource Descriptor" (XRD + JRD) files
pear/XML_XSLT_Wrapper                          0.2.2             Provides a single interface to the different XSLT interface or commands
pear/XML_XUL                                   0.9.1             Class to build Mozilla XUL applications.
```

</details>


#### mysql

<details>
  
```nginx
            dpkg -l |grep mysql |grep -v php
```
```php
ii  dbconfig-mysql                               2.0.4ubuntu1                                             all          dbconfig-common MySQL/MariaDB support
ii  libmysqlclient-dev                           5.7.22-0ubuntu0.16.04.1                                  amd64        MySQL database development files
ii  libmysqlclient20:amd64                       5.7.22-0ubuntu0.16.04.1                                  amd64        MySQL database client library
ii  libmysqld-dev                                5.7.22-0ubuntu0.16.04.1                                  amd64        MySQL embedded database development files
ii  mysql-client                                 5.7.20-0ubuntu0.16.04.1                                  all          MySQL database client (metapackage depending on the latest version)
ii  mysql-client-5.7                             5.7.20-0ubuntu0.16.04.1                                  amd64        MySQL database client binaries
ii  mysql-client-core-5.7                        5.7.20-0ubuntu0.16.04.1                                  amd64        MySQL database core client binaries
ii  mysql-common                                 5.7.20-0ubuntu0.16.04.1                                  all          MySQL database common files, e.g. /etc/mysql/my.cnf
ii  mysql-server                                 5.7.20-0ubuntu0.16.04.1                                  all          MySQL database server (metapackage depending on the latest version)
ii  mysql-server-5.7                             5.7.20-0ubuntu0.16.04.1                                  amd64        MySQL database server binaries and system database setup
ii  mysql-server-core-5.7                        5.7.20-0ubuntu0.16.04.1                                  amd64        MySQL database server binaries
ii  zabbix-server-mysql                          1:3.0.13-4+xenial                                        amd64        Zabbix network monitoring solution - server (MySQL)
```
</