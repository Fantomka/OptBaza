<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @ORM\Column(name="Id")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $ProductId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ProductName;

    /**
     * @ORM\Column(type="integer")
     */
    private $ProductQuantity;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Unit")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="Id")
     */
    private $Unit;

    /**
     * @ORM\Column(type="float")
     */
    private $UnitCost;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductId(): ?int
    {
        return $this->ProductId;
    }

    public function setProductId(int $ProductId): self
    {
        $this->ProductId = $ProductId;

        return $this;
    }

    public function getProductName(): ?string
    {
        return $this->ProductName;
    }

    public function setProductName(string $ProductName): self
    {
        $this->ProductName = $ProductName;

        return $this;
    }

    public function getProductQuantity(): ?int
    {
        return $this->ProductQuantity;
    }

    public function setProductQuantity(int $ProductQuantity): self
    {
        $this->ProductQuantity = $ProductQuantity;

        return $this;
    }

    public function getUnit(): ?Unit
    {
        return $this->Unit;
    }

    public function setUnit(?Unit $Unit): self
    {
        $this->Unit = $Unit;

        return $this;
    }

    public function getUnitCost(): ?float
    {
        return $this->UnitCost;
    }

    public function setUnitCost(float $UnitCost): self
    {
        $this->UnitCost = $UnitCost;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }
}
