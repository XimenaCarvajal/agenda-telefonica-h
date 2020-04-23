<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactosRepository")
 */
class Contactos
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idContacto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombreContacto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $organizacionContacto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $domicilioContacto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $notaContacto;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $statusContacto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $usoContacto;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TipoContacto")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fkTipoContacto;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuarios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fkUsuario;

    public function getIdContacto(): ?int
    {
        return $this->idContacto;
    }

    public function getNombreContacto(): ?string
    {
        return $this->nombreContacto;
    }

    public function setNombreContacto(string $nombreContacto): self
    {
        $this->nombreContacto = $nombreContacto;

        return $this;
    }

    public function getOrganizacionContacto(): ?string
    {
        return $this->organizacionContacto;
    }

    public function setOrganizacionContacto(string $organizacionContacto): self
    {
        $this->organizacionContacto = $organizacionContacto;

        return $this;
    }

    public function getDomicilioContacto(): ?string
    {
        return $this->domicilioContacto;
    }

    public function setDomicilioContacto(string $domicilioContacto): self
    {
        $this->domicilioContacto = $domicilioContacto;

        return $this;
    }

    public function getNotaContacto(): ?string
    {
        return $this->notaContacto;
    }

    public function setNotaContacto(string $notaContacto): self
    {
        $this->notaContacto = $notaContacto;

        return $this;
    }

    public function getStatusContacto(): ?string
    {
        return $this->statusContacto;
    }

    public function setStatusContacto(string $statusContacto): self
    {
        $this->statusContacto = $statusContacto;

        return $this;
    }

    public function getUsoContacto(): ?string
    {
        return $this->usoContacto;
    }

    public function setUsoContacto(string $usoContacto): self
    {
        $this->usoContacto = $usoContacto;

        return $this;
    }

    public function getFkTipoContacto(): ?TipoContacto
    {
        return $this->fkTipoContacto;
    }

    public function setFkTipoContacto(?TipoContacto $fkTipoContacto): self
    {
        $this->fkTipoContacto = $fkTipoContacto;

        return $this;
    }

    public function getFkUsuario(): ?Usuarios
    {
        return $this->fkUsuario;
    }

    public function setFkUsuario(?Usuarios $fkUsuario): self
    {
        $this->fkUsuario = $fkUsuario;

        return $this;
    }
}
