<?php

namespace Alxbbarbosa\DI;

/**
 * Class Container
 * @package Alxbbarbosa\DI
 * @author Alexandre Bezerra Barbosa <alxbbarbosa@yahoo.com.br>
 */
class Container
{
    /** @var array */
    private array $container = [];

    /**
     * @return array
     */
    public function obterTodos() : array
    {
        return $this->container;
    }

    /**
     * @param string $interface
     * @param mixed $objetoConcreto
     */
    public function juntar(string $interface, $objetoConcreto)
    {
        if (is_string($objetoConcreto)) {
            $objetoConcreto = $this->processarString($objetoConcreto);
        }

        if (is_array($objetoConcreto) && !in_array('reconstruir', $objetoConcreto) &&
            !key_exists('reconstruir', $objetoConcreto)) {
            $objetoConcreto = $this->processarArray($objetoConcreto);
        }

        $this->container[$interface] = $objetoConcreto;
    }

    /**
     * @param string $interface
     * @return object|null
     */
    public function obterPorInterface(string $interface = ''): ?object
    {
        if (empty($interface) || !isset($this->container[$interface])) {
            return null;
        }

        return $this->processarRetorno($interface);
    }

    /**
     * @param string $interface
     * @return object|null
     */
    private function processarRetorno(string $interface): ?object
    {
        /** @var mixed $objetoConcreto */
        $objetoConcreto = $this->container[$interface];

        if (is_object($objetoConcreto)) {
            return $this->processarObjeto($objetoConcreto);
        }

        if (is_array($objetoConcreto)) {
            return $this->processarArray($objetoConcreto);
        }

        return null;
    }

    /**
     * @param object $objetoConcreto
     * @return object
     */
    private function processarObjeto(object $objetoConcreto): object
    {
        $reflectionObject = new \ReflectionObject($objetoConcreto);

        if ($reflectionObject->hasMethod('__invoke')) {
            return ($objetoConcreto)();
        }

        return $objetoConcreto;
    }

    /**
     * @param string $dados
     * @return object|null
     */
    private function processarString(string $dados): ?object
    {
        $reflectionClass = new \ReflectionClass($dados);

        if ($reflectionClass->isInstantiable()) {
            return $reflectionClass->newInstance();
        }

        return null;
    }

    /**
     * @param array $dados
     * @return object|null
     */
    private function processarArray(array $dados): ?object
    {
        if (!isset($dados['classe'])) {
            return null;
        }

        if (is_string($dados['classe'])) {
            return $this->processarString($dados['classe']);
        }

        if (is_object($dados['classe'])) {
            return $this->processarObjeto($dados['classe']);
        }

        return null;
    }
}