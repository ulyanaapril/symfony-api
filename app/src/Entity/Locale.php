<?php

namespace App\Entity;

use App\Repository\LocaleRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

#[ORM\Entity(repositoryClass: LocaleRepository::class)]
#[ApiResource]
class Locale
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $lang;

    #[ORM\Column(type: 'string', length: 10)]
    private $iso;

    #[ORM\OneToOne(mappedBy: 'localeId', targetEntity: Country::class, cascade: ['persist', 'remove'])]
    private $country;

    public function __construct($lang, $iso) {
        $this->lang = $lang;
        $this->iso = $iso;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLang(): ?string
    {
        return $this->lang;
    }

    public function setLang(string $lang): self
    {
        $this->lang = $lang;

        return $this;
    }

    public function getIso(): ?string
    {
        return $this->iso;
    }

    public function setIso(string $iso): self
    {
        $this->iso = $iso;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(Country $country): self
    {
        // set the owning side of the relation if necessary
        if ($country->getLocaleId() !== $this) {
            $country->setLocaleId($this);
        }

        $this->country = $country;

        return $this;
    }
}
