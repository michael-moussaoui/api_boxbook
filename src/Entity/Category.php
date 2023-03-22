<?php

namespace App\Entity;

use App\Entity\Book;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups("book:read")]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups("book:read")]
    private ?string $name = null;

    // #[ORM\ManyToMany(targetEntity: Book::class, mappedBy: 'categoryId')]
    // private Collection $books;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Book::class)]
    private Collection $book;

    public function __construct()
    {
        $this->book = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName ();
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

    /**
     * @return Collection<int, Book>
     */
    public function getBooks(): Collection
    {
        return $this->book;
    }

    public function addBook(Book $book): self
    {
        if (!$this->book->contains($book)) {
            $this->book->add($book);
            $book->setCategory($this);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->book->removeElement($book)) {
            // set the owning side to null (unless already changed)
            if ($book->getCategory() === $this) {
                $book->setCategory(null);
            }
        }

        return $this;
    }
}
