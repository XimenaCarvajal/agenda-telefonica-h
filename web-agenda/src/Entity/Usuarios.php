<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsuariosRepository")
 */
class Usuarios
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $idUsuario;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $correoUsuario;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $passwordUsuario;

   
     /**
     * @ORM\Column(type="string", columnDefinition="ENUM('Administrador', 'Trabajador')")
     */
    private $tipoUsuario;

   

    /**
     * @ORM\Column(type="string", columnDefinition="ENUM('Activo', 'Inactivo')")
     */
    private $statusUsuario;


    public function getIdUsuario(): ?int
    {
        return $this->idUsuario;
    }

    public function getCorreoUsuario(): ?string
    {
        return $this->correoUsuario;
    }

    public function setCorreoUsuario(string $correoUsuario): self
    {
        $this->correoUsuario = $correoUsuario;

        return $this;
    }

    public function getPasswordUsuario(): ?string
    {
        return $this->passwordUsuario;
    }

    public function setPasswordUsuario(string $passwordUsuario): self
    {
        $this->passwordUsuario = $passwordUsuario;

        return $this;
    }

    public function getTipoUsuario(): ?string
    {
        return $this->tipoUsuario;
    }

    public function setTipoUsuario(string $tipoUsuario): self
    {
        $this->tipoUsuario = $tipoUsuario;

        return $this;
    }

    public function getStatusUsuario(): ?string
    {
        return $this->statusUsuario;
    }

    public function setStatusUsuario(string $statusUsuario): self
    {
        $this->statusUsuario = $statusUsuario;

        return $this;
    }

   
}
