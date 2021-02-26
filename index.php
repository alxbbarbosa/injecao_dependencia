<?php

require "vendor/autoload.php";

use Alxbbarbosa\DI\Container;
use App\Services\PessoaServiceFactory;
use App\Services\PessoaServiceInterface;

$container = new Container();

/** Feito o bind - Junção */
$container->adicionar(PessoaServiceInterface::class, PessoaServiceFactory::class);


/** @var PessoaServiceInterface $pessoaService - obter o serviço PessoaService a partir do container*/
$pessoaService = $container->obterPorInterface(PessoaServiceInterface::class);

$pessoa1 = $pessoaService->obterPorId(1);
$pessoa2 = $pessoaService->obterPorId(2);

var_dump($pessoa1, $pessoa2);