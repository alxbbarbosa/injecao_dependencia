<?php

namespace Alxbbarbosa\DI;

use PHPUnit\Framework\TestCase;

/**
 * Class ContainerTest
 * @package Alxbbarbosa\DI
 * @author Alexandre Bezerra Barbosa <alxbbarbosa@yahoo.com.br>
 */
class ContainerTest extends TestCase
{
    public function test_DeveriaRetornar_ArrayVazio_QuandoInvocar_ObterTodos() {

        $container = new Container();

        $actual = $container->obterTodos();

        $this->assertEquals([], $actual);
    }
    
    public function test_DeveriaVincular_stdClassComString_QuandoInformar_stringTeste_ParaStdClass()
    {
        $container = new Container();
        $stdClass = new \stdClass();
        
        $container->juntar('teste', $stdClass);

        $actual = $container->obterTodos();

        $this->assertCount(1, $actual);
    }

    public function test_DeveriaRetornar_stdClass_QuandoInformar_stringTeste_paraObterPorInterface()
    {
        $container = new Container();
        $stdClass = new \stdClass();

        $container->juntar('teste', $stdClass);

        $actual = $container->obterPorInterface('teste');

        $this->assertInstanceOf('stdClass', $actual);
    }
}