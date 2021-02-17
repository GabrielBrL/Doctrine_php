<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;

/**
 * @Entity
 */
class Curso {
    
    /**
     *
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $nomeCurso;
    /**
     * @ManyToMany(targetEntity="Aluno", inversedBy="cursos")
     */
    private $alunos;
    
    public function __construct() {
        $this->alunos = new ArrayCollection();
    }
    
    public function getNomeCurso(): string
    {
        return $this->nomeCurso;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setNomeCurso($nomeCurso): self 
    {
        $this->nomeCurso = $nomeCurso;
        return $this;
    }
    
    public function addAlunos(Aluno $aluno): self
    {
        if($this->alunos->contains($aluno)){
            return $this;
        }
        
        $this->alunos->add($aluno);
        $aluno->addCursos($this);
        return $this;
    }
    
    public function getAlunos(): ArrayCollection
    {
        return $this->alunos;
    }
    
}
