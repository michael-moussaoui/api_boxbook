<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\BookRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups("book:read")]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups("book:read")]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    #[Groups("book:read")]
    private ?string $author = null;

    #[ORM\Column]
    #[Groups("book:read")]
    private ?string $isbn = null;

    #[ORM\Column(length: 255)]
    #[Groups("book:read")]
    private ?string $cover = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups("book:read")]
    private ?string $resume = null;

    #[ORM\Column]
    #[Groups("book:read")]
    private ?bool $isAvailable = null;

    // #[ORM\ManyToMany(targetEntity: Category::class, inversedBy: 'books')]
    // private Collection $categoryId;

    #[ORM\ManyToOne(inversedBy: 'book')]
    private ?Category $category = null;

    #[ORM\ManyToOne(inversedBy: 'books')]
    private ?BoxBook $boxbookId = null;

    // public function __construct()
    // {
    //     $this->category = new ArrayCollection();
    // }
    public function __toString()
    {
        return $this->getCategory();
    }
   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(string $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function isIsAvailable(): ?bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): self
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    // /**
    //  * @return Collection<int, Category>
    //  */
    // public function getCategoryId(): Collection
    // {
    //     return $this->categoryId;
    // }

    // public function addCategoryId(Category $categoryId): self
    // {
    //     if (!$this->categoryId->contains($categoryId)) {
    //         $this->categoryId->add($categoryId);
    //     }

    //     return $this;
    // }

    // public function removeCategoryId(Category $categoryId): self
    // {
    //     $this->categoryId->removeElement($categoryId);

    //     return $this;
    // }

    public function getBoxbookId(): ?BoxBook
    {
        return $this->boxbookId;
    }

    public function setBoxbookId(?BoxBook $boxbookId): self
    {
        $this->boxbookId = $boxbookId;

        return $this;
    }
}
