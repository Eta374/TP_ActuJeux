<?php

namespace App\Entity;

use App\Entity\Genres;
use App\Entity\Platform;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\NewsRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=NewsRepository::class)
 */
class News
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
    private $titleNews;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imgNews;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $videoNews;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateNews;

    /**
     * @ORM\Column(type="text")
     */
    private $textNews;

    /**
     * @ORM\ManyToMany(targetEntity=Platform::class, inversedBy="news")
     */
    private $Platform;

    /**
     * @ORM\ManyToMany(targetEntity=Genres::class, inversedBy="news")
     */
    private $Genres;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="news")
     */
    private $user;


    public function __construct()
    {
        $this->Platform = new ArrayCollection();
        $this->Genres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleNews(): ?string
    {
        return $this->titleNews;
    }

    public function setTitleNews(string $titleNews): self
    {
        $this->titleNews = $titleNews;

        return $this;
    }

    public function getImgNews(): ?string
    {
        return $this->imgNews;
    }

    public function setImgNews(string $imgNews): self
    {
        $this->imgNews = $imgNews;

        return $this;
    }

    public function getVideoNews(): ?string
    {
        return $this->videoNews;
    }

    public function setVideoNews(string $videoNews): self
    {
        $this->videoNews = $videoNews;

        return $this;
    }

    public function getDateNews(): ?\DateTimeInterface
    {
        return $this->dateNews;
    }

    public function setDateNews(\DateTimeInterface $dateNews): self
    {
        $this->dateNews = $dateNews;

        return $this;
    }

    public function getTextNews(): ?string
    {
        return $this->textNews;
    }

    public function setTextNews(string $textNews): self
    {
        $this->textNews = $textNews;

        return $this;
    }

    /**
     * @return Collection|Platform[]
     */
    public function getPlatform(): Collection
    {
        return $this->Platform;
    }

    public function addPlatform(Platform $platform): self
    {
        if (!$this->Platform->contains($platform)) {
            $this->Platform[] = $platform;
        }

        return $this;
    }

    public function removePlatform(Platform $platform): self
    {
        $this->Platform->removeElement($platform);

        return $this;
    }

    /**
     * @return Collection|Genres[]
     */
    public function getGenres(): Collection
    {
        return $this->Genres;
    }

    public function addGenre(Genres $genre): self
    {
        if (!$this->Genres->contains($genre)) {
            $this->Genres[] = $genre;
        }

        return $this;
    }

    public function removeGenre(Genres $genre): self
    {
        $this->Genres->removeElement($genre);

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

}
