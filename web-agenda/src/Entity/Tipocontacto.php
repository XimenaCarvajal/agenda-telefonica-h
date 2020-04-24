<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TipocontactoRepository")
 */
class Tipocontacto
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
    private $nombreTipocontacto;

    /**
     * @ORM\Column(type="string", columnDefinition="ENUM('Activo', 'Inactivo')")
     */
    private $statusTipocontacto;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Contacto", mappedBy="fktipocontactoC")
     */
    private $contactoTp;

    public function __construct()
    {
        $this->contactoTp = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreTipocontacto(): ?string
    {
        return $this->nombreTipocontacto;
    }

    public function setNombreTipocontacto(string $nombreTipocontacto): self
    {
        $this->nombreTipocontacto = $nombreTipocontacto;

        return $this;
    }

    public function getStatusTipocontacto(): ?string
    {
        return $this->statusTipocontacto;
    }

    public function setStatusTipocontacto(string $statusTipocontacto): self
    {
        $this->statusTipocontacto = $statusTipocontacto;

        return $this;
    }

    /**
     * @return Collection|Contacto[]
     */
    public function getContactoTp(): Collection
    {
        return $this->contactoTp;
    }

    public function addContactoTp(Contacto $contactoTp): self
    {
        if (!$this->contactoTp->contains($contactoTp)) {
            $this->contactoTp[] = $contactoTp;
            $contactoTp->setFktipocontactoC($this);
        }

        return $this;
    }

    public function removeContactoTp(Contacto $contactoTp): self
    {
        if ($this->contactoTp->contains($contactoTp)) {
            $this->contactoTp->removeElement($contactoTp);
            // set the owning side to null (unless already changed)
            if ($contactoTp->getFktipocontactoC() === $this) {
                $contactoTp->setFktipocontactoC(null);
            }
        }

        return $this;
    }
}
