<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$dql = 'SELECT aluno FROM Alura\\Doctrine\\Entity\\Aluno aluno WHERE aluno.nome = \'Rafael Nogueira\' ';
$query = $entityManager->createQuery($dql);
$alunoList = $query->getResult();

foreach ($alunoList as $aluno) {
    $telefones = $aluno
            ->getTelefones()
            ->map(function (Telefone $telefone) {
        return $telefone->getNumero();
    })
            ->toArray();
    echo "ID: {$aluno->getId()} \nNome: {$aluno->getNome()} \n";
    echo "Telefones: " . implode(",", $telefones). "\n";
}
/*
echo "\n<--------------------------------------->\n\n";
$alice = $alunoRepository->find(4);
echo $alice->getNome() . "\n\n";
echo "\n<--------------------------------------->\n\n";

$allAlunos = $alunoRepository->findBy(
        [],//algum filtro nesse caso nome ou id
        ['nome' => 'asc'],//colocar algo em crescente (ASC) ou decresce (DESC)
        4,//total de elementos que deve ser buscado
        0//por onde começar no array
);

var_dump($allAlunos);
echo "\n<--------------------------------------->\n\n";

 RETORNA UM ARRAY, OU SEJA, PODEMOS FAZER UMA LISTA
     $fernando = $alunoRepository->findBy([
  'nome' => 'Fernando dos Santos'
  ]);

RETORNA UM OBJETO, OU SEJA, UM ALUNO ESPECIFICO
$fernando = $alunoRepository->findOneBy([
    'nome' => 'Fernando dos Santos'
        ]);

var_dump($fernando);*/

