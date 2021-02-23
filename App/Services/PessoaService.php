<?php

namespace App\Services;

use App\Models\Pessoa;

/**
 * Class PessoaService
 * @package App\Services
 * @author Alexandre Bezerra Barbosa <alxbbarbosa@yahoo.com.br>
 */
class PessoaService implements PessoaServiceInterface
{
    /** @var Pessoa */
    private Pessoa $pessoaModel;

    /**
     * PessoaService constructor.
     * @param Pessoa $pessoaModel
     */
    public function __construct(Pessoa $pessoaModel)
    {
        $this->pessoaModel = $pessoaModel;
    }

    /**
     * @inheritDoc
     */
    public function obterPorId(int $pessoaId): Pessoa
    {
        return $this->pessoaModel->obterPorId($pessoaId);
    }
}