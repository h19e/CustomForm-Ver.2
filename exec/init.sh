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


mkdir $HTDOCS_DIR
mkdir $HTDOCS_DIR/css

cp ../src/htdocs/css/base.css $HTDOCS_DIR/css/base.css

mkdir $APP_DIR
mkdir $APP_DIR/lib
mkdir $APP_DIR/conf
mkdir $APP_DIR/components
mkdir $APP_DIR/modules
mkdir $APP_DIR/modules/Top
mkdir $APP_DIR/modules/Top/actions
mkdir $APP_DIR/modules/Top/views
mkdir $APP_DIR/modules/User
mkdir $APP_DIR/modules/User/actions
mkdir $APP_DIR/modules/User/views

cp ../src/app/conf/set_env_template.php $APP_DIR/conf/set_env_template.php

cp ../src/app/target.php $APP_DIR/target.php

cp ../src/app/lib/Controller.php $APP_DIR/lib/Controller.php
cp ../src/app/lib/Parameter.php $APP_DIR/lib/Parameter.php
cp ../src/app/lib/View.php $APP_DIR/lib/View.php
cp ../src/app/lib/Factory.php $APP_DIR/lib/Factory.php

cp ../src/app/components/Header.tpl.php $APP_DIR/components/Header.tpl.php

cp ../src/app/modules/Top/actions/Index.php $APP_DIR/modules/Top/actions/Index.php
cp ../src/app/modules/Top/views/Index.tpl.php $APP_DIR/modules/Top/views/Index.tpl.php

cp ../src/app/modules/User/actions/*.php $APP_DIR/modules/User/actions/
cp ../src/app/modules/User/views/*.tpl.php $APP_DIR/modules/User/views/

#make indexfile
echo '<?php' > $HTDOCS_DIR/index.php
echo 'define("APP_DIR","'$APP_DIR'");' >> $HTDOCS_DIR/index.php 
echo "require_once APP_DIR .'/target.php';" >> $HTDOCS_DIR/index.php





 
