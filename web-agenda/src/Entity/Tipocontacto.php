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
    private $contactoTc;

    public function __construct()
    {
        $this->contactoTc = new ArrayCollection();
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
    public function getContactoTc(): Collection
    {
        return $this->contactoTc;
    }

    public function addContactoTc(Contacto $contactoTc): self
    {
        if (!$this->contactoTc->contains($contactoTc)) {
            $this->contactoTc[] = $contactoTc;
            $contactoTc->setFktipocontactoC($this);
        }

        return $this;
    }

    public function removeContactoTc(Contacto $contactoTc): self
    {
        if ($this->contactoTc->contains($contactoTc)) {
            $this->contactoTc->removeElement($contactoTc);
            // set the owning side to null (unless already changed)
            if ($contactoTc->getFktipocontactoC() === $this) {
                $contactoTc->setFktipocontactoC(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->nombreTipocontacto;
    }
}
