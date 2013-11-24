# Toumi

Library to include the legacy code.

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
Ackintosh_Toumi::load('legacy.php');

class LegacyTest extends PHPUnit_Framework_TestCase
{
    public function test_hoge()
    {
        $this->assertSame('hogefuga', hoge('fuga'));
    }
}
```

## Author

Akihito Nakano