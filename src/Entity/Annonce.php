<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 */
class Annonce
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $organisme;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cp;

    /**
     * @ORM\ManyToOne(targetEntity=Bien::class, inversedBy="annonces")
     */
    private $Biens;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="annonces")
     */
    private $Utilisateurs;

    /**
     * @ORM\OneToMany(targetEntity=Message::class, mappedBy="annonce")
     */
    private $Messages;

   
    public function __construct()
    {
        $this->Maisons = new ArrayCollection();
        $this->Appartements = new ArrayCollection();
        $this->Messages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getOrganisme(): ?string
    {
        return $this->organisme;
    }

    public function setOrganisme(string $organisme): self
    {
        $this->organisme = $organisme;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getBiens(): ?Bien
    {
        return $this->Biens;
    }

    public function setBiens(?Bien $Biens): self
    {
        $this->Biens = $Biens;

        return $this;
    }

    public function getUtilisateurs(): ?Utilisateur
    {
        return $this->Utilisateurs;
    }

    public function setUtilisateurs(?Utilisateur $Utilisateurs): self
    {
        $this->Utilisateurs = $Utilisateurs;

        
        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getMessages(): Collection
    {
        return $this->Messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->Messages->contains($message)) {
            $this->Messages[] = $message;
            $message->setAnnonce($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->Messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getAnnonce() === $this) {
                $message->setAnnonce(null);
            }
        }

        return $this;
    }

}
