<?php

namespace App\Entity;

use App\Repository\DesaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DesaRepository::class)
 */
class Desa
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
    private $nama_desa;

    /**
     * @ORM\Column(type="text")
     */
    private $alamat_desa;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNamaDesa(): ?string
    {
        return $this->nama_desa;
    }

    public function setNamaDesa(string $nama_desa): self
    {
        $this->nama_desa = $nama_desa;

        return $this;
    }

    public function getAlamatDesa(): ?string
    {
        return $this->alamat_desa;
    }

    public function setAlamatDesa(string $alamat_desa): self
    {
        $this->alamat_desa = $alamat_desa;

        return $this;
    }
}
