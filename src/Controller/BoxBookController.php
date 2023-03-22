<?php

namespace App\Controller;

use App\Entity\BoxBook;
use App\Repository\BoxBookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BoxBookController extends AbstractController
{   
    //Récupérer toutes les boites à livres
    #[Route('/api/v1/boxbooks', name: 'app_boxbooks', methods:['GET'])]
    public function getAllBooks(BoxBookRepository $boxbooksRepository, SerializerInterface $serializer ): Response
    {
        $boxBooks = $boxbooksRepository->findAll();
        $json = $serializer->serialize($boxBooks,'json');
        $response = new response($json, 200, [
            "content-type" => "application/json"
        ] );
        
        return $response;
        
    }

    //Récupérer une boite à livres
    #[Route('/api/v1/boxbook/{id}', name: 'app_boxbook', methods:['GET'])]
    public function getBoxBookById($id, EntityManagerInterface $entityManager, SerializerInterface $serializer): Response

    {
        $boxBooksRepository = $entityManager->getRepository(BoxBook::class);
        $boxBooks = $boxBooksRepository->findBy(['id' => $id]);
        $json = $serializer->serialize($boxBooks,'json');

        $response = new Response($json, 200, [
            "Content-Type" =>"application/json"
        ]);
       
        return $response;
    }

    //Supprimer un livre
    #[Route('/api/v1/boxbook/{id}', name: 'app_boxbook_delete', methods:['DELETE'])]
    public function deleteBoxBook(SerializerInterface $serializer, EntityManagerInterface $entityManager, $id):Response
    {
     
      $boxBooksRepository = $entityManager->getRepository(BoxBook::class);
      $boxBooks = $boxBooksRepository->findOneBy(['id' => $id]);
      $json = $serializer->serialize($boxBooks,'json', ['groups'=>'book:read']);
      $entityManager ->remove($boxBooks);
      $entityManager->flush();

      return $this->json(null,Response::HTTP_NO_CONTENT);


    }

    //Ajouter une boite à livres
    #[Route('/api/v1/boxbooks', name: 'app_boxbooks_post', methods:['POST'])]
    public function AddBoxBook(Request $request, SerializerInterface $serializer, EntityManagerInterface $entityManager, UrlGeneratorInterface $urlGenerator):JsonResponse
     
    {
        $dataJson = $request->getContent();
        
            $boxBook = $serializer->deserialize($dataJson,BoxBook::class, 'json');
            
            $entityManager->persist($boxBook);
            $entityManager->flush();
    
            return $this->json($boxBook, Response::HTTP_CREATED,[],['groups' => 'book:read']);
       }
}
