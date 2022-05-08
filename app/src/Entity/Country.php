<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
#[ApiResource]
class Country
{

    public function __construct($name, $localeId, $vatId) {
        $this->name = $name;
        $this->localeId = $localeId;
        $this->vatId = $vatId;
    }
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\OneToOne(inversedBy: 'country', targetEntity: Locale::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $localeId;

    #[ORM\OneToOne(inversedBy: 'country', targetEntity: Vat::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $vatId;

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

    public function getLocaleId(): ?Locale
    {
        return $this->localeId;
    }

    public function setLocaleId(Locale $localeId): self
    {
        $this->localeId = $localeId;

        return $this;
    }

    public function getVatId(): ?Vat
    {
        return $this->vatId;
    }

    public function setVatId(Vat $vatId): self
    {
        $this->vatId = $vatId;

        return $this;
    }
}
