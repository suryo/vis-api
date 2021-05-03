<?php

namespace App\Entity;

use App\Repository\JenisLembagaDesaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JenisLembagaDesaRepository::class)
 */
class JenisLembagaDesa
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
    private $jenis_lembaga;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJenisLembaga(): ?string
    {
        return $this->jenis_lembaga;
    }

    public function setJenisLembaga(string $jenis_lembaga): self
    {
        $this->jenis_lembaga = $jenis_lembaga;

        return $this;
    }
}
