<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BookController extends AbstractController
{
    //Récupère tous les livres
    #[Route('/api/v1/books', name: 'app_books', methods:['GET'])]
    public function getAllBooks(BookRepository $booksRepository, SerializerInterface $serializer ): Response
    {
        $books = $booksRepository->findAll();
        $json = $serializer->serialize($books,'json', ['groups'=>'book:read']);
        $response = new response($json, 200, [
            "content-type" => "application/json"
        ] );
        
        return $response;
        
    }

    //Récupère un livre
    #[Route('/api/v1/book/{id}', name: 'app_book', methods:['GET'])]
    public function getBookById($id, EntityManagerInterface $entityManager, SerializerInterface $serializer): Response

    {
        $booksRepository = $entityManager->getRepository(Book::class);
        $books = $booksRepository->findBy(['id' => $id]);
        $json = $serializer->serialize($books,'json', ['groups'=>'book:read']);

        $response = new Response($json, 200, [
            "Content-Type" =>"application/json"
        ]);
       
        
        return $response;
    }
    
    //Supprimer un livre
    #[Route('/api/v1/book/{id}', name: 'app_book_delete', methods:['DELETE'])]
    public function deleteBook(SerializerInterface $serializer, EntityManagerInterface $entityManager, $id):Response
    {
     
      $booksRepository = $entityManager->getRepository(Book::class);
      $books = $booksRepository->findOneBy(['id' => $id]);
      $json = $serializer->serialize($books,'json', ['groups'=>'book:read']);
      $entityManager ->remove($books);
      $entityManager->flush();

      return $this->json(null,Response::HTTP_NO_CONTENT);


    }

    //Ajouter un livre
    #[Route('/api/v1/books', name: 'app_books_post', methods:['POST'])]
    public function AddBook(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager, UrlGeneratorInterface $urlGenerator):JsonResponse
     
    {
        $dataJson = $request->getContent();
        
            $book = $serializer->deserialize($dataJson,Book::class, 'json');
            
            $entityManager->persist($book);
            $entityManager->flush();
    
            return $this->json($book, Response::HTTP_CREATED,[],['groups' => 'book:read']);
       }
    }

     

