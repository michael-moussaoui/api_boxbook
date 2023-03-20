<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class BoxBookController extends AbstractController
{
    #[Route('api/v1/boxbooks', name: 'app_box_books', methods: ['GET'])]
    public function getAllBoxBook(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/BoxBookController.php',
        ]);
    }
    #[Route('api/v1/boxbook/{id}', name: 'app_box_book', methods: ['GET'])]
    public function getBoxBook(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/BoxBookController.php',
        ]);
    }
}
