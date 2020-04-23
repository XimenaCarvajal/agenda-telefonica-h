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
    private $idTipocontacto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombreTipocontacto;

    /**
     * @ORM\Column(type="string", columnDefinition="ENUM('Activo', 'Inactivo')")
     */
    private $statusTipocontacto;



    public function getIdTipocontacto(): ?int
    {
        return $this->idTipocontacto;
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

}
