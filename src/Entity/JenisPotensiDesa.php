<?php

namespace App\Entity;

use App\Repository\JenisPotensiDesaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JenisPotensiDesaRepository::class)
 */
class JenisPotensiDesa
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
    private $potensi;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPotensi(): ?string
    {
        return $this->potensi;
    }

    public function setPotensi(string $potensi): self
    {
        $this->potensi = $potensi;

        return $this;
    }
}
