#!/usr/bin/env bash

set -e

drush cron -l https://tome.fyi
drush tome:static -l https://tome.fyi
rm -rf gh-pages
git clone git@github.com:drupal-tome/drupal-tome.github.io.git gh-pages
cd gh-pages
git checkout master || git checkout -b master
cd ..
rm -rf gh-pages/*
cp -r html/* gh-pages/
cp CNAME gh-pages/CNAME
cd gh-pages
git add .
git commit -m 'Updating gh-pages site'
git push -u origin master
