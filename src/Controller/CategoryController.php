<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Book;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class CategoryController extends AbstractController
{
    #[Route('api/v1/categories', name: 'app_categories', methods: ['GET'])]
    public function GetAllCategories(CategoryRepository $categoryRepository,SerializerInterface $serializer): Response
    {
        $categories = $categoryRepository->findAll();
        $json = $serializer->serialize($categories,'json',['groups'=>'book:read']);
        $response = new response($json, 200, [
            "content-type" => "application/json"
        ] );
        
        return $response;
    }
    #[Route('api/v1/category{id}', name: 'app_category', methods: ['GET'])]
    public function GetCategoryById($id, EntityManagerInterface $entityManager,CategoryRepository $categoryRepository,SerializerInterface $serializer): Response
    {
        $categoryRepository = $entityManager->getRepository(Category::class);
        $category = $categoryRepository->findBy(['id' => $id]);
        $json = $serializer->serialize($category,'json',['groups'=>'book:read']);
        $response = new response($json,200, [
            "content-type" => "application/json"
        ]);

        return $response;
    }
}
