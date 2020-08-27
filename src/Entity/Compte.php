<?php

namespace App\Entity;

use App\Repository\CompteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompteRepository::class)
 */
class Compte
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
    private $numerocompte;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $solde;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $clerib;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $agios;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=ClientPhysique::class, inversedBy="comptes")
     */
    private $cltphysique_id;

    /**
     * @ORM\ManyToOne(targetEntity=ClientMoral::class, inversedBy="comptes")
     */
    private $cltmoral_id;

    /**
     * @ORM\ManyToOne(targetEntity=Agence::class, inversedBy="comptes")
     */
    private $agence_id;

    /**
     * @ORM\ManyToOne(targetEntity=TypeCompte::class, inversedBy="comptes")
     */
    private $typecomte_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumerocompte(): ?string
    {
        return $this->numerocompte;
    }

    public function setNumerocompte(string $numerocompte): self
    {
        $this->numerocompte = $numerocompte;

        return $this;
    }

    public function getSolde(): ?string
    {
        return $this->solde;
    }

    public function setSolde(string $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function getClerib(): ?string
    {
        return $this->clerib;
    }

    public function setClerib(string $clerib): self
    {
        $this->clerib = $clerib;

        return $this;
    }

    public function getAgios(): ?string
    {
        return $this->agios;
    }

    public function setAgios(string $agios): self
    {
        $this->agios = $agios;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCltphysiqueId(): ?ClientPhysique
    {
        return $this->cltphysique_id;
    }

    public function setCltphysiqueId(?ClientPhysique $cltphysique_id): self
    {
        $this->cltphysique_id = $cltphysique_id;

        return $this;
    }

    public function getCltmoralId(): ?ClientMoral
    {
        return $this->cltmoral_id;
    }

    public function setCltmoralId(?ClientMoral $cltmoral_id): self
    {
        $this->cltmoral_id = $cltmoral_id;

        return $this;
    }

    public function getAgenceId(): ?Agence
    {
        return $this->agence_id;
    }

    public function setAgenceId(?Agence $agence_id): self
    {
        $this->agence_id = $agence_id;

        return $this;
    }

    public function getTypecomteId(): ?TypeCompte
    {
        return $this->typecomte_id;
    }

    public function setTypecomteId(?TypeCompte $typecomte_id): self
    {
        $this->typecomte_id = $typecomte_id;

        return $this;
    }
}
