<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Vat;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ApiResource]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $price;

    #[ORM\OneToOne(targetEntity: Vat::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[ApiFilter(SearchFilter::class, properties: ['vatId.country.localeId.lang' => 'ipartial'])]
    private $vatId;

    public function __construct($name, $description, $price, $vatId)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->vatId = $vatId;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?string
    {
        return round($this->price + ($this->price * ($this->getVatId()->getRate() / 100)), 2);
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;
    }

    public function setVatId(Vat $vatId): self
    {
        $this->vatId = $vatId;

        return $this;
    }

    public function getVatId(): ?Vat
    {
        return $this->vatId;
    }




}

