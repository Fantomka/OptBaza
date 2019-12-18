<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Provider", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Provider;

    /**
     * @ORM\Column(type="datetime")
     *
     */
    private $DeliveryTime;

    /**
     * @ORM\Column(type="array")
     * @JMS\Groups({"suply"})
     * @JMS\SerializedName("goods")
     */
    private $NumberOfGoods = [];

    /**
     * @ORM\Column(type="array")
     * @JMS\Groups({"suply"})
     * @JMS\SerializedName("product")
     */
    private $Products = [];

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Price", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Price;

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

    public function getPrice(): ?Price
    {
        return $this->Price;
    }

    public function setPrice(?Price $Price): self
    {
        $this->Price = $Price;

        return $this;
    }
}
