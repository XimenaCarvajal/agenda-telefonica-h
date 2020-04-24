<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DatocontactoRepository")
 */
class Datocontacto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $tipoDc;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $valorDc;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $statusDc;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contacto", inversedBy="datocontactoC")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fkcontactoDc;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipoDc(): ?string
    {
        return $this->tipoDc;
    }

    public function setTipoDc(string $tipoDc): self
    {
        $this->tipoDc = $tipoDc;

        return $this;
    }

    public function getValorDc(): ?string
    {
        return $this->valorDc;
    }

    public function setValorDc(string $valorDc): self
    {
        $this->valorDc = $valorDc;

        return $this;
    }

    public function getStatusDc(): ?string
    {
        return $this->statusDc;
    }

    public function setStatusDc(string $statusDc): self
    {
        $this->statusDc = $statusDc;

        return $this;
    }

    public function getFkcontactoDc(): ?Contacto
    {
        return $this->fkcontactoDc;
    }

    public function setFkcontactoDc(?Contacto $fkcontactoDc): self
    {
        $this->fkcontactoDc = $fkcontactoDc;

        return $this;
    }
}
