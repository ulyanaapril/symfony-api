<?php

namespace App\Entity;

use App\Repository\VatRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: VatRepository::class)]
#[ApiResource]
class Vat
{
    public function __construct($rate) {
        $this->rate = $rate;
    }
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
//    #[JoinColumn(onDelete:"CASCADE")]
    private $id;

    #[ORM\Column(type: 'integer')]
    #[Assert\Range(min: '1', max: 19)]
    private $rate;

    #[ORM\OneToOne(mappedBy: 'vatId', targetEntity: Country::class, cascade: ['persist', 'remove'])]
    private $country;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRate(): ?int
    {
        return $this->rate;
    }

    public function setRate(int $rate): self
    {
        $this->rate = $rate;
        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(Country $country): self
    {
        // set the owning side of the relation if necessary
        if ($country->getVatId() !== $this) {
            $country->setVatId($this);
        }

        $this->country = $country;

        return $this;
    }
}
