<?php

namespace Alxbbarbosa\DI;

use PHPUnit\Framework\TestCase;
use stdClass;

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

        $this->assertIsArray($actual);
    }
    
    public function test_DeveriaRetornar1_depoisDeVincular_stdClassComString_QuandoInformar_stringTeste_ParaStdClass()
    {
        $container = new Container();
        $stdClass = new stdClass();
        
        $container->adicionar('teste', $stdClass);

        $actual = $container->obterTodos();

        $this->assertCount(1, $actual);
    }

    public function test_DeveriaRetornar_stdClass_QuandoInformar_stringTeste_paraStdClass()
    {
        $container = new Container();
        $stdClass = new stdClass();

        $container->adicionar('teste', $stdClass);

        $actual = $container->obterPorInterface('teste');

        $this->assertInstanceOf('stdClass', $actual);
    }

    public function test_DeveriaRetornar_stdClass_QuandoInformar_stringTest()
    {
        $container = new Container();

        $container->adicionar('teste', stdClass::class);

        $actual = $container->obterPorInterface('teste');

        $this->assertInstanceOf('stdClass', $actual);
    }

    public function test_DeveriaRetornar_stdClassIguais_QuandoInformar_stringTest()
    {
        $container = new Container();

        $container->adicionar('teste', ['classe' => stdClass::class]);

        $stdClass1 = $container->obterPorInterface('teste');
        $stdClass2 = $container->obterPorInterface('teste');

        $actual = spl_object_hash($stdClass1) == spl_object_hash($stdClass2);

        $this->assertTrue($actual);
    }

    public function test_DeveriaRetornar_stdClassDiferente_QuandoInformar_stringReconstruir()
    {
        $container = new Container();

        $container->adicionar('teste', ['classe' => stdClass::class, 'reconstruir']);

        $stdClass1 = $container->obterPorInterface('teste');
        $stdClass2 = $container->obterPorInterface('teste');

        $actual = spl_object_hash($stdClass1) == spl_object_hash($stdClass2);

        $this->assertFalse($actual);
    }

    public function test_DeveriaRetonar_stdClass_QuandoInvocar_invoke()
    {
        $container = new Container();

        $container->adicionar('teste', ['classe' => new class {
            public function __invoke()
            {
                return new stdClass();
            }
        }]);

        $actual = $container->obterPorInterface('teste');

        $this->assertInstanceOf(stdClass::class, $actual);

    }
}