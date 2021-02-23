<?php

namespace App\Services;

use App\Models\Pessoa;
use phpDocumentor\Reflection\Types\Integer;

/**
 * Class PessoaServiceFactory
 * @package App\Services
 * @author Alexandre Bezerra Barbosa <alxbbarbosa@yahoo.com.br>
 */
interface PessoaServiceInterface
{
    /**
     * @param integer $pessoaId
     * @return Pessoa
     */
    public function obterPorId(int $pessoaId): Pessoa;
}