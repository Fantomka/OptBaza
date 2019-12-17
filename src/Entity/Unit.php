<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UnitRepository")
 * @ORM\Table(name="Unit")
 */
class Unit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="Id")
     */
    private $id;

    /**
     * @ORM\Column(type="string", name="Unit")
     */
    private $unit;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUnit(): ?string
    {
        return $this->unit;
    }

}
