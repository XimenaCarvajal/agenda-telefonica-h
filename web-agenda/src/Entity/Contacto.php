<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactoRepository")
 */
class Contacto
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
    private $nombreContacto;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $organizacionContacto;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $domicilioContacto;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $notaContacto;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $statusContacto;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $usoContacto;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tipocontacto", inversedBy="contactoTp")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fktipocontactoC;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuarios", inversedBy="contactoU")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fkusuarioC;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Usuariocontacto", mappedBy="fkcontactoUc")
     */
    private $usuariocontactoC;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Datocontacto", mappedBy="fkcontactoDc")
     */
    private $datocontactoC;

    public function __construct()
    {
        $this->usuariocontactoC = new ArrayCollection();
        $this->datocontactoC = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function setOrganizacionContacto(?string $organizacionContacto): self
    {
        $this->organizacionContacto = $organizacionContacto;

        return $this;
    }

    public function getDomicilioContacto(): ?string
    {
        return $this->domicilioContacto;
    }

    public function setDomicilioContacto(?string $domicilioContacto): self
    {
        $this->domicilioContacto = $domicilioContacto;

        return $this;
    }

    public function getNotaContacto(): ?string
    {
        return $this->notaContacto;
    }

    public function setNotaContacto(?string $notaContacto): self
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

    public function getFktipocontactoC(): ?Tipocontacto
    {
        return $this->fktipocontactoC;
    }

    public function setFktipocontactoC(?Tipocontacto $fktipocontactoC): self
    {
        $this->fktipocontactoC = $fktipocontactoC;

        return $this;
    }

    public function getFkusuarioC(): ?Usuarios
    {
        return $this->fkusuarioC;
    }

    public function setFkusuarioC(?Usuarios $fkusuarioC): self
    {
        $this->fkusuarioC = $fkusuarioC;

        return $this;
    }

    /**
     * @return Collection|Usuariocontacto[]
     */
    public function getUsuariocontactoC(): Collection
    {
        return $this->usuariocontactoC;
    }

    public function addUsuariocontactoC(Usuariocontacto $usuariocontactoC): self
    {
        if (!$this->usuariocontactoC->contains($usuariocontactoC)) {
            $this->usuariocontactoC[] = $usuariocontactoC;
            $usuariocontactoC->addFkcontactoUc($this);
        }

        return $this;
    }

    public function removeUsuariocontactoC(Usuariocontacto $usuariocontactoC): self
    {
        if ($this->usuariocontactoC->contains($usuariocontactoC)) {
            $this->usuariocontactoC->removeElement($usuariocontactoC);
            $usuariocontactoC->removeFkcontactoUc($this);
        }

        return $this;
    }

    /**
     * @return Collection|Datocontacto[]
     */
    public function getDatocontactoC(): Collection
    {
        return $this->datocontactoC;
    }

    public function addDatocontactoC(Datocontacto $datocontactoC): self
    {
        if (!$this->datocontactoC->contains($datocontactoC)) {
            $this->datocontactoC[] = $datocontactoC;
            $datocontactoC->setFkcontactoDc($this);
        }

        return $this;
    }

    public function removeDatocontactoC(Datocontacto $datocontactoC): self
    {
        if ($this->datocontactoC->contains($datocontactoC)) {
            $this->datocontactoC->removeElement($datocontactoC);
            // set the owning side to null (unless already changed)
            if ($datocontactoC->getFkcontactoDc() === $this) {
                $datocontactoC->setFkcontactoDc(null);
            }
        }

        return $this;
    }
}
