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
     * @param object $objetoConcreto
     */
    public function juntar(string $interface, object $objetoConcreto)
    {
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

        return $this->container[$interface];
    }
}