<?php

namespace App\Entity;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuarios", inversedBy="usuariocontactoU")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fkusuarioUc;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contacto", inversedBy="usuariocontactoC")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fkcontactoUc;

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

    public function getFkusuarioUc(): ?Usuarios
    {
        return $this->fkusuarioUc;
    }

    public function setFkusuarioUc(?Usuarios $fkusuarioUc): self
    {
        $this->fkusuarioUc = $fkusuarioUc;

        return $this;
    }

    public function getFkcontactoUc(): ?Contacto
    {
        return $this->fkcontactoUc;
    }

    public function setFkcontactoUc(?Contacto $fkcontactoUc): self
    {
        $this->fkcontactoUc = $fkcontactoUc;

        return $this;
    }
}
