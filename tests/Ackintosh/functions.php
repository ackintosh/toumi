<?php
/**
 * Legacy code for testing.
 */
function hoge($hoge)
{
    echo 'hoge';
}

somefunction(1234);

function fuga()
{
    $f = function () { echo 'fuga'; };
    call_user_func($f);
}

var_dump('hogehoge');
exit;
