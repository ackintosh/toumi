<?php
use Ackintosh\Toumi;

class ToumiTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function loadIncludesOnlyFunctionDeclarations()
    {
        Toumi::load(dirname(__FILE__) . '/functions.php');
        $definedFunctions = get_defined_functions();
        $this->assertTrue(in_array('hoge', $definedFunctions['user']));
        $this->assertTrue(in_array('fuga', $definedFunctions['user']));
    }

    /**
     * @test
     */
    public function loadIncludesOnlyClassDeclarations()
    {
        Toumi::load(dirname(__FILE__) . '/classes.php');
        $this->assertTrue(class_exists('Hoge'));
        $this->assertTrue(class_exists('Foo'));
    }

    /**
     * @test
     */
    public function loadIncludesNamespace()
    {
        Toumi::load(dirname(__FILE__) . '/namespaces.php');
        $this->assertTrue(class_exists('\Foo\Bar\Hoge'));
        $this->assertTrue(class_exists('\Foo\Bar\Foo'));
        $this->assertTrue(function_exists('\Foo\Bar\xxx'));
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function loadThrowsExceptionIfFileNotFound()
    {
        Toumi::load('not_found.php');
    }
}
