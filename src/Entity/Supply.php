<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SupplyRepository")
 */
class Supply
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
     * @ORM\Column(type="datetime")
     */
    private $DeliveryTime;

    /**
     * @ORM\Column(type="array")
     */
    private $NumberOfGoods = [];

    /**
     * @ORM\Column(type="array")
     */
    private $Products = [];

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Price")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProvider(): ?string
    {
        return $this->Provider;
    }

    public function setProvider(string $Provider): self
    {
        $this->Provider = $Provider;

        return $this;
    }

    public function getDeliveryTime(): ?\DateTimeInterface
    {
        return $this->DeliveryTime;
    }

    public function setDeliveryTime(\DateTimeInterface $DeliveryTime): self
    {
        $this->DeliveryTime = $DeliveryTime;

        return $this;
    }

    public function getNumberOfGoods(): ?array
    {
        return $this->NumberOfGoods;
    }

    public function setNumberOfGoods(array $NumberOfGoods): self
    {
        $this->NumberOfGoods = $NumberOfGoods;

        return $this;
    }

    public function getProducts(): ?array
    {
        return $this->Products;
    }

    public function setProducts(array $Products): self
    {
        $this->Products = $Products;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->Price;
    }

    public function setPrice(string $Price): self
    {
        $this->Price = $Price;

        return $this;
    }
}
