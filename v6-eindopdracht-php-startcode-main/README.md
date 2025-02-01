# demo1
This is part of a super-simple tutorial on how create web apps using PHP and PDO. It follows my principle of "not using packages."

Links to tutorial part 1, 2 and 3
- https://medium.com/codex/a-super-simple-php-tutorial-for-beginning-to-code-part-1-db703d22d227
- https://medium.com/codex/a-super-simple-php-tutorial-for-beginning-to-code-part-2-13dbdcc121f2
- https://medium.com/codex/a-super-simple-php-tutorial-for-beginning-to-code-part-3-working-with-databases-via-pdo-e32e0b929dfe

# Getting started

## 1. Start the php server 
Type the following command in Terminal
```
./start-server.sh
```
A new browser tab automatically pops up. If it doesn't, click on ports, click the line with port 8080, click on the globe icon.

## 2. See the database
- click on the Admin link
- log in with password 'admin'

# Changelog
## 2025/01/31 database admin page 
fix "admin" page for database management doesn't load due to "MicroTimer" error<br>
cause: phpliteadmin.php doesn't support php version 8<br>
fix: upgrade phpliteadmin.php to beta version found at https://www.phpliteadmin.org/phpliteadmin-dev.zip
