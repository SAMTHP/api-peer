<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/set-user-a", name="api_set_user_a", methods={"POST"})
     */
    public function index(SerializerInterface $serializerInterface, EntityManagerInterface $entityManagerInterface, Request $request)
    {
        $data = $request->getContent();
        $decodeData = \json_decode($data);

        dd($decodeData);
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }
}
