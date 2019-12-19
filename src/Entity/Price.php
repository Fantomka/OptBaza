<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PriceRepository")
 */
class Price
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Provider")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Provider;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Product;

    /**
     * @ORM\Column(type="float")
     */
    private $PriceOfUnit;

    /**
     * @ORM\Column(type="date")
     */
    private $Date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProvider(): ?Provider
    {
        return $this->Provider;
    }

    public function setProvider(?Provider $Provider): self
    {
        $this->Provider = $Provider;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->Product;
    }

    public function setProduct(?Product $Product): self
    {
        $this->Product = $Product;

        return $this;
    }

    public function getPriceOfUnit(): ?float
    {
        return $this->PriceOfUnit;
    }

    public function setPriceOfUnit(float $PriceOfUnit): self
    {
        $this->PriceOfUnit = $PriceOfUnit;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }
}
