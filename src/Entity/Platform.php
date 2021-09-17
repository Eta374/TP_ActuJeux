<?php

namespace App\Entity;

use App\Entity\News;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PlatformRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=PlatformRepository::class)
 */
class Platform
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
    private $platPlatform;

    /**
     * @ORM\ManyToMany(targetEntity=News::class, mappedBy="Platform")
     */
    private $news;

    public function __construct()
    {
        $this->news = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlatPlatform(): ?string
    {
        return $this->platPlatform;
    }

    public function setPlatPlatform(string $platPlatform): self
    {
        $this->platPlatform = $platPlatform;

        return $this;
    }

    /**
     * @return Collection|News[]
     */
    public function getNews(): Collection
    {
        return $this->news;
    }

    public function addNews(News $news): self
    {
        if (!$this->news->contains($news)) {
            $this->news[] = $news;
            $news->addPlatform($this);
        }

        return $this;
    }

    public function removeNews(News $news): self
    {
        if ($this->news->removeElement($news)) {
            $news->removePlatform($this);
        }

        return $this;
    }
}
