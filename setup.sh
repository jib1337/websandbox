#!/bin/bash
# Sets up and hosts the unhackable website

if php -i | grep -q "mysqli"; then
	echo "mysqli PHP module installed. Continuing..."
else
	echo "Please install the mysqli PHP module: sudo apt install php-mysqli"
	exit 1
fi

echo "Starting mysql service.."
service mysql start &
sleep 5;

if mysql < createdb.sql
then
	echo "Database created.."
else
	echo "Error: Database not created"
	exit 1
fi

echo "Starting PHP service..."
php -S 127.0.0.1:8000 -t websandbox/
