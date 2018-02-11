PHP_VERSION=`php -v | head -n 1 | cut -d ' ' -f 2 | awk -F. '{printf "%2d%02d%02d", $1,$2,$3}'`
if [ "$PHP_VERSION" -ge 70000 ]; then
  composer require phpunit/phpunit
else
  composer require phpunit/phpunit:4.*
fi
