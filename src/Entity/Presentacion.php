<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Presentacion
 *
 * @ORM\Table(name="presentacion")
 * @ORM\Entity
 */
class Presentacion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_presentacion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPresentacion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="string", length=50, nullable=true)
     */
    private $descripcion;

    public function getIdPresentacion(): ?int
    {
        return $this->idPresentacion;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }


}
