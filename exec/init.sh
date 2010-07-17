#!/bin/sh

echo "init"

#document root directory
DEFAULT_PARAM=$1
echo -n "htdocs_dir? [${DEFAULT_PARAM}]"
read PARAM
if [ "$PARAM" = "" ]; then
	HTDOCS_DIR=$DEFAULT_PARAM
else
	HTDOCS_DIR=$PARAM
fi
echo $HTDOCS_DIR

#application directory
DEFAULT_PARAM=$2
echo -n "app_dir? [${DEFAULT_PARAM}]"
read PARAM
if [ "$PARAM" = "" ]; then
	APP_DIR=$DEFAULT_PARAM
else
	APP_DIR=$PARAM
fi
echo $APP_DIR

#database user
DEFAULT_PARAM=$3
echo -n "db_host? [${DEFAULT_PARAM}]"
read PARAM
if [ "$PARAM" = "" ]; then
	DB_HOST=$DEFAULT_PARAM
else
	DB_HOST=$PARAM
fi
echo $DB_HOST

#database user
DEFAULT_PARAM=$4
echo -n "db_user? [${DEFAULT_PARAM}]"
read PARAM
if [ "$PARAM" = "" ]; then
	DB_USER=$DEFAULT_PARAM
else
	DB_USER=$PARAM
fi
echo $DB_USER

#database pass
DEFAULT_PARAM=$5
echo -n "db_pass? [${DEFAULT_PARAM}]"
read PARAM
if [ "$PARAM" = "" ]; then
	DB_PASS=$DEFAULT_PARAM
else
	DB_PASS=$PARAM
fi
echo $DB_PASS

mkdir $APP_DIR
mkdir $APP_DIR/lib
mkdir $APP_DIR/conf
cp ../src/htdocs/index.php $HTDOCS_DIR/index.php
cp ../src/app/target.php $APP_DIR/target.php
cp ../src/app/lib/Controller.php $APP_DIR/lib/Controller.php

rm $APP_DIR/App.php
rm $APP_DIR/dbconf.php

#make indexfile
echo '<?php' > $HTDOCS_DIR/index.php
echo 'define("APP_DIR","'$APP_DIR'");' >> $HTDOCS_DIR/index.php 
echo "require_once APP_DIR .'/target.php';" >> $HTDOCS_DIR/index.php


#make conffile
echo '<?php' > $APP_DIR/conf/dbconf.php
echo ''
echo 'define("DB_HOST","'$DB_HOST'");' >> $APP_DIR/conf/dbconf.php 
echo 'define("DB_USER","'$DB_USER'");' >> $APP_DIR/conf/dbconf.php 
echo 'define("DB_PASS","'$DB_PASS'");' >> $APP_DIR/conf/dbconf.php





 
