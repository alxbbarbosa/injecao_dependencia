<?php

namespace App\Services;

use App\Models\Pessoa;

/**
 * Class PessoaServiceFactory
 * @package App\Services
 * @author Alexandre Bezerra Barbosa <alxbbarbosa@yahoo.com.br>
 */
class PessoaServiceFactory
{
    /**
     * @return PessoaService
     */
    public function __invoke()
    {
        /** @var Pessoa $pessoaModel */
        $pessoaModel = new Pessoa();

        return new PessoaService($pessoaModel);
    }
}