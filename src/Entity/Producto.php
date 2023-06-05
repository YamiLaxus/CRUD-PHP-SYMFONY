<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Producto
 *
 * @ORM\Table(name="producto", indexes={@ORM\Index(name="fk_presentacion", columns={"id_presentacion"}), @ORM\Index(name="fk_proveedor", columns={"id_proveedor"}), @ORM\Index(name="fk_zona", columns={"id_zona"}), @ORM\Index(name="fk_marca", columns={"id_marca"})})
 * @ORM\Entity
 */
class Producto
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_producto", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProducto;

    /**
     * @var int|null
     *
     * @ORM\Column(name="codigo", type="integer", nullable=true)
     */
    private $codigo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion_producto", type="string", length=1000, nullable=true)
     */
    private $descripcionProducto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="precio", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $precio;

    /**
     * @var int|null
     *
     * @ORM\Column(name="stock", type="integer", nullable=true)
     */
    private $stock;

    /**
     * @var int|null
     *
     * @ORM\Column(name="iva", type="integer", nullable=true)
     */
    private $iva;

    /**
     * @var string|null
     *
     * @ORM\Column(name="peso", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $peso;

    /**
     * @var \Marca
     *
     * @ORM\ManyToOne(targetEntity="Marca")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_marca", referencedColumnName="id_marca")
     * })
     */
    private $idMarca;

    /**
     * @var \Zona
     *
     * @ORM\ManyToOne(targetEntity="Zona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_zona", referencedColumnName="id_zona")
     * })
     */
    private $idZona;

    /**
     * @var \Presentacion
     *
     * @ORM\ManyToOne(targetEntity="Presentacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_presentacion", referencedColumnName="id_presentacion")
     * })
     */
    private $idPresentacion;

    /**
     * @var \Proveedor
     *
     * @ORM\ManyToOne(targetEntity="Proveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proveedor", referencedColumnName="id_proveedor")
     * })
     */
    private $idProveedor;

    public function getIdProducto(): ?int
    {
        return $this->idProducto;
    }

    public function getCodigo(): ?int
    {
        return $this->codigo;
    }

    public function setCodigo(?int $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getDescripcionProducto(): ?string
    {
        return $this->descripcionProducto;
    }

    public function setDescripcionProducto(?string $descripcionProducto): self
    {
        $this->descripcionProducto = $descripcionProducto;

        return $this;
    }

    public function getPrecio(): ?string
    {
        return $this->precio;
    }

    public function setPrecio(?string $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getIva(): ?int
    {
        return $this->iva;
    }

    public function setIva(?int $iva): self
    {
        $this->iva = $iva;

        return $this;
    }

    public function getPeso(): ?string
    {
        return $this->peso;
    }

    public function setPeso(?string $peso): self
    {
        $this->peso = $peso;

        return $this;
    }

    public function getIdMarca(): ?Marca
    {
        return $this->idMarca;
    }

    public function setIdMarca(?Marca $idMarca): self
    {
        $this->idMarca = $idMarca;

        return $this;
    }

    public function getIdZona(): ?Zona
    {
        return $this->idZona;
    }

    public function setIdZona(?Zona $idZona): self
    {
        $this->idZona = $idZona;

        return $this;
    }

    public function getIdPresentacion(): ?Presentacion
    {
        return $this->idPresentacion;
    }

    public function setIdPresentacion(?Presentacion $idPresentacion): self
    {
        $this->idPresentacion = $idPresentacion;

        return $this;
    }

    public function getIdProveedor(): ?Proveedor
    {
        return $this->idProveedor;
    }

    public function setIdProveedor(?Proveedor $idProveedor): self
    {
        $this->idProveedor = $idProveedor;

        return $this;
    }


}
