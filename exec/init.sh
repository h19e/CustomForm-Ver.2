#!/bin/sh

echo "init"

HTDOCS_DIR=$1
APP_DIR=$2

cp ../src/htdocs/index.php $HTDOCS_DIR/index.php
cp ../src/app/App.php $APP_DIR/App.php
