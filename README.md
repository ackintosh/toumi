# Toumi

Library to include the legacy code.

[![Build Status](https://travis-ci.org/ackintosh/toumi.png?branch=master)](https://travis-ci.org/ackintosh/toumi)

## Usage

`legacy.php`

```php
<?php
function hoge($arg)
{
    return 'hoge' . $arg;
}

somefunction(1234);

function fuga()
{
    $f = function () { echo 'fuga'; };
    call_user_func($f);
}

var_dump(hoge('hogehoge'));
exit;
```

```php
<?php
// Only function declaration is included.
\Ackintosh\Toumi::load('legacy.php');

class LegacyTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function hoge()
    {
        $this->assertSame('hogefuga', hoge('fuga'));
    }
}
```

## Author

Akihito Nakano