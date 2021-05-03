<?php

namespace App\Entity;

use App\Repository\JenisSuratRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JenisSuratRepository::class)
 */
class JenisSurat
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
    private $jenis_surat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJenisSurat(): ?string
    {
        return $this->jenis_surat;
    }

    public function setJenisSurat(string $jenis_surat): self
    {
        $this->jenis_surat = $jenis_surat;

        return $this;
    }
}
