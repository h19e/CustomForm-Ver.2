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



mkdir $APP_DIR
mkdir $APP_DIR/lib
mkdir $APP_DIR/conf
mkdir $APP_DIR/modules
mkdir $APP_DIR/modules/Top
mkdir $APP_DIR/modules/Top/actions

cp ../src/app/conf/set_env_template.php $APP_DIR/conf/set_env_template.php

cp ../src/app/target.php $APP_DIR/target.php

cp ../src/app/lib/Controller.php $APP_DIR/lib/Controller.php

cp ../src/app/modules/Top/actions/Index.php $APP_DIR/modules/Top/actions/Index.php


rm $APP_DIR/App.php
rm $APP_DIR/dbconf.php
rm $APP_DIR/conf/dbconf.php

#make indexfile
echo '<?php' > $HTDOCS_DIR/index.php
echo 'define("APP_DIR","'$APP_DIR'");' >> $HTDOCS_DIR/index.php 
echo "require_once APP_DIR .'/target.php';" >> $HTDOCS_DIR/index.php





 
