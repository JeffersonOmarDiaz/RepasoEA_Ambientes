<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServicioRepository")
 */
class Servicio
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="text")
     */
    private $comentario;

    /**
     * @ORM\Column(type="integer")
     */
    private $calificacion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Productos", inversedBy="servicios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $servicio;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getComentario(): ?string
    {
        return $this->comentario;
    }

    public function setComentario(string $comentario): self
    {
        $this->comentario = $comentario;

        return $this;
    }

    public function getCalificacion(): ?int
    {
        return $this->calificacion;
    }

    public function setCalificacion(int $calificacion): self
    {
        $this->calificacion = $calificacion;

        return $this;
    }

    public function getServicio(): ?Productos
    {
        return $this->servicio;
    }

    public function setServicio(?Productos $servicio): self
    {
        $this->servicio = $servicio;

        return $this;
    }
}
