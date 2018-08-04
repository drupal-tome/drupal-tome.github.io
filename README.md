# The Tome Hompage - tome.fyi

Hello there! This is the repository for the Tome marketing and documentation
site, [tome.fyi](https://tome.fyi).

This site is also built with Tome, and should be editable on your local machine
if you want to see how it's made.

# Use

To install the site locally, run:

```
composer install
drush tome:install
```

Once the site is installed, run `drush runserver` to work locally.

To see how the static site looks, run `drush tome:static --run-server`. 

It's a pretty standard Drupal site! So poke around and have fun.

PRs for new documentation or fixes are more than welcome.

# Dealing with SSL errors

If you see a CKEditor-related SSL error when running `composer install`, you
likely have not configured PHP's OpenSSL settings. To fix this, open your
`php.ini` file and set `openssl.cafile` to the path of your certificate file.

On my machine, the certificate is at `/usr/local/etc/openssl/cert.pem`.
