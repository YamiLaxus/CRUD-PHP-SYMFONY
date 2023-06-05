<?php

namespace App\Entity;

use App\Repository\ProductosRepository;
use Doctrine\DBAL\Types\DecimalType;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductosRepository::class)]
class Productos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_producto = null;

    private ?int $id_marca = null;

    private ?int $id_presentacion = null;

    private ?int $id_proveedor = null;

    private ?int $id_zona = null;

    private ?int $codigo = null;

    private ?string $descirpcion_producto = null;

    private ?DecimalType $precio = null;

    private ?int $stock = null;

    private ?int $iva = null;

    private ?DecimalType $peso = null;



    public function getId(): ?int
    {
        return $this->id_producto;
    }   
}
