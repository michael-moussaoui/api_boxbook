<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BookController extends AbstractController
{
    #[Route('/api/v1/books', name: 'app_books', methods:['GET'])]
    public function getAllBooks(BookRepository $booksRepository, SerializerInterface $serializer ): Response
    {
        $books = $booksRepository->findAll();
        $json = $serializer->serialize($books,'json');
        $response = new response($json, 200, [
            "content-type" => "application/json"
        ] );
        
        return $response;
        
    }
    #[Route('/api/v1/book/{id}', name: 'app_book', methods:['GET'])]
    public function getBookById($id, EntityManagerInterface $entityManager, SerializerInterface $serializer): Response

    {
        $booksRepository = $entityManager->getRepository(Book::class);
        $books = $booksRepository->findBy(['id' => $id]);
        $json = $serializer->serialize($books,'json');

        $response = new Response($json, 200, [
            "Content-Type" =>"application/json"
        ]);
       
        
        return $response;
    }
    
}
