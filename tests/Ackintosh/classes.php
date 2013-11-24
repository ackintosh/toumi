<?php
/**
 * Legacy code for testing.
 */
class Hoge
{
    public function fuga()
    {
        return true;
    }
}

$hoge = new Hoge();
$result = $hoge->fuga();

if ($result) exit;

class Foo
{
    public function bar()
    {
        echo 'foobar';
    }
}

$foo = new Foo();
$foo->bar();
