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
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $correoUsuario;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $passUsuario;

    /**
     * @ORM\Column(type="string", columnDefinition="ENUM('Admin', 'Trabajador')")
     */
    private $tipoUsuario;

    /**
     * @ORM\Column(type="string", columnDefinition="ENUM('Activo', 'Inactivo')")
     */
    private $statusUsuario;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Contacto", mappedBy="fkusuarioC")
     */
    private $contactoU;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Usuariocontacto", mappedBy="fkusuarioUc")
     */
    private $usuariocontactoU;

    public function __construct()
    {
        $this->contactoU = new ArrayCollection();
        $this->usuariocontactoU = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPassUsuario(): ?string
    {
        return $this->passUsuario;
    }

    public function setPassUsuario(string $passUsuario): self
    {
        $this->passUsuario = $passUsuario;

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

    /**
     * @return Collection|Contacto[]
     */
    public function getContactoU(): Collection
    {
        return $this->contactoU;
    }

    public function addContactoU(Contacto $contactoU): self
    {
        if (!$this->contactoU->contains($contactoU)) {
            $this->contactoU[] = $contactoU;
            $contactoU->setFkusuarioC($this);
        }

        return $this;
    }

    public function removeContactoU(Contacto $contactoU): self
    {
        if ($this->contactoU->contains($contactoU)) {
            $this->contactoU->removeElement($contactoU);
            // set the owning side to null (unless already changed)
            if ($contactoU->getFkusuarioC() === $this) {
                $contactoU->setFkusuarioC(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Usuariocontacto[]
     */
    public function getUsuariocontactoU(): Collection
    {
        return $this->usuariocontactoU;
    }

    public function addUsuariocontactoU(Usuariocontacto $usuariocontactoU): self
    {
        if (!$this->usuariocontactoU->contains($usuariocontactoU)) {
            $this->usuariocontactoU[] = $usuariocontactoU;
            $usuariocontactoU->setFkusuarioUc($this);
        }

        return $this;
    }

    public function removeUsuariocontactoU(Usuariocontacto $usuariocontactoU): self
    {
        if ($this->usuariocontactoU->contains($usuariocontactoU)) {
            $this->usuariocontactoU->removeElement($usuariocontactoU);
            // set the owning side to null (unless already changed)
            if ($usuariocontactoU->getFkusuarioUc() === $this) {
                $usuariocontactoU->setFkusuarioUc(null);
            }
        }

        return $this;
    }
}
