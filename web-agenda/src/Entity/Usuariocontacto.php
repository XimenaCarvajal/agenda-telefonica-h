<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsuariocontactoRepository")
 */
class Usuariocontacto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $statusUc;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Usuarios", inversedBy="usuariocontactoU")
     */
    private $fkusuarioUc;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Contacto", inversedBy="usuariocontactoC")
     */
    private $fkcontactoUc;

    public function __construct()
    {
        $this->fkusuarioUc = new ArrayCollection();
        $this->fkcontactoUc = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatusUc(): ?string
    {
        return $this->statusUc;
    }

    public function setStatusUc(string $statusUc): self
    {
        $this->statusUc = $statusUc;

        return $this;
    }

    /**
     * @return Collection|Usuarios[]
     */
    public function getFkusuarioUc(): Collection
    {
        return $this->fkusuarioUc;
    }

    public function addFkusuarioUc(Usuarios $fkusuarioUc): self
    {
        if (!$this->fkusuarioUc->contains($fkusuarioUc)) {
            $this->fkusuarioUc[] = $fkusuarioUc;
        }

        return $this;
    }

    public function removeFkusuarioUc(Usuarios $fkusuarioUc): self
    {
        if ($this->fkusuarioUc->contains($fkusuarioUc)) {
            $this->fkusuarioUc->removeElement($fkusuarioUc);
        }

        return $this;
    }

    /**
     * @return Collection|Contacto[]
     */
    public function getFkcontactoUc(): Collection
    {
        return $this->fkcontactoUc;
    }

    public function addFkcontactoUc(Contacto $fkcontactoUc): self
    {
        if (!$this->fkcontactoUc->contains($fkcontactoUc)) {
            $this->fkcontactoUc[] = $fkcontactoUc;
        }

        return $this;
    }

    public function removeFkcontactoUc(Contacto $fkcontactoUc): self
    {
        if ($this->fkcontactoUc->contains($fkcontactoUc)) {
            $this->fkcontactoUc->removeElement($fkcontactoUc);
        }

        return $this;
    }
}
