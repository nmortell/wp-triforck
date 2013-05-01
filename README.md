wp-triforck
===========

a Wordpress Content folder with custom themes and plugins

to keep different environments up to date 
	-pre commit: mysqldump -u [mysql user] -p --skip-extended-insert [database] > /path/to/repo/wordpress-dev.sql

	-post merge: mysql -u [mysql user] -p [database] < /path/to/repo/wordpress-dev.sql
