<?php
class Ackintosh_ToumiTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function loadIncludesOnlyFunctionDeclarations()
    {
        Ackintosh_Toumi::load(dirname(__FILE__) . '/functions.php');
        $definedFunctions = get_defined_functions();
        $this->assertTrue(in_array('hoge', $definedFunctions['user']));
        $this->assertTrue(in_array('fuga', $definedFunctions['user']));
    }

    /**
     * @test
     */
    public function loadIncludesOnlyClassDeclarations()
    {
        Ackintosh_Toumi::load(dirname(__FILE__) . '/classes.php');
        $this->assertTrue(class_exists('Hoge'));
        $this->assertTrue(class_exists('Foo'));
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function loadThrowsExceptionIfFileNotFound()
    {
        Ackintosh_Toumi::load('not_found.php');
    }
}
