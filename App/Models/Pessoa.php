<?php

namespace App\Models;

/**
 * Class Pessoa
 * @package App\Models
 * @author Alexandre Bezerra Barbosa <alxbbarbosa@yahoo.com.br>
 */
class Pessoa
{
    /** @var array */
    private array $atributos = [];

    /**
     * @param string $nomeAtributo
     * @param mixed  $valorAtributo
     * @return void
     */
    public function __set(string $nomeAtributo, $valorAtributo): void
    {
        $this->atributos[$nomeAtributo] = $valorAtributo;
    }

    /**
     * @param string $nomeAtributo
     * @return mixed
     */
    public function __get(string $nomeAtributo)
    {
        return $this->atributos[$nomeAtributo];
    }

    /**
     * @param string $nomeAtributo
     * @return bool
     */
    public function __isset(string $nomeAtributo)
    {
        return isset($this->atributos[$nomeAtributo]);
    }

    /**
     * @param int $pessoaId
     * @return Pessoa
     */
    public function obterPorId(int $pessoaId): Pessoa
    {
        $pessoas = [1 => new self, 2 => new self];
        $pessoas[1]->id = 1;
        $pessoas[1]->nome = "João Silva";
        $pessoas[2]->id = 2;
        $pessoas[2]->nome = "Maria Toledo";

        return $pessoas[$pessoaId];
    }
}