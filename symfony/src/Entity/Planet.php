<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlanetRepository")
 */
class Planet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="Astronaut")
     * @ORM\JoinTable(name="planet_astronaut",
     *      joinColumns={@ORM\JoinColumn(name="planet_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="astronaut_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $astronauts;

    public function __construct()
    {
        $this->astronauts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAstronauts()
    {
        return $this->astronauts;
    }

    public function setAstronauts($astronauts)
    {
        $this->astronauts = $astronauts;

        return $this;
    }
}
