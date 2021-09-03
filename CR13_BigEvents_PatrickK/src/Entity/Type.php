<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeRepository::class)
 */
class Type
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typename;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypename(): ?string
    {
        return $this->typename;
    }

    public function setTypename(string $typename): self
    {
        $this->typename = $typename;

        return $this;
    }
}
