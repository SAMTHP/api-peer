<?php

namespace App\Controller;

use App\Entity\ApiPeerInfo;
use App\Repository\ApiPeerInfoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/set-user-a", name="api_set_user_a", methods={"POST"})
     */
    public function setUserA(SerializerInterface $serializerInterface, EntityManagerInterface $entityManagerInterface, Request $request)
    {
        $data = $request->getContent();
        $decodeData = \json_decode($data);

        $apiPeer = new ApiPeerInfo();
        $apiPeer->setNameConversation($decodeData->name_conversation);
        $apiPeer->setUserA([$decodeData->user_a]);

        $entityManagerInterface->persist($apiPeer);
        $entityManagerInterface->flush();
        
        $result = $serializerInterface->serialize(
            $apiPeer,
            'json'
        );

        return new JsonResponse(
            $result,
            Response::HTTP_OK,
            [],
            true
        );
    }

    /**
     * @Route("/api/set-user-b", name="api_set_user_b", methods={"POST"})
     */
    public function setUserB(ApiPeerInfoRepository $apiPeerInfoRepository, SerializerInterface $serializerInterface, EntityManagerInterface $entityManagerInterface, Request $request)
    {
        $data = $request->getContent();
        $decodeData = \json_decode($data);

        $apiPeer = $apiPeerInfoRepository->findOneByNameConversation($decodeData->name_conversation);

        $apiPeer->setUserB([$decodeData->user_b]);

        $entityManagerInterface->persist($apiPeer);
        $entityManagerInterface->flush();
        
        $result = $serializerInterface->serialize(
            $apiPeer,
            'json'
        );

        return new JsonResponse(
            $result,
            Response::HTTP_OK,
            [],
            true
        );
    }

    /**
     * @Route("/api/find-user-b-response", name="api_find_user_b_response", methods={"POST"})
     */
    public function findUserBresponse(ApiPeerInfoRepository $apiPeerInfoRepository, SerializerInterface $serializerInterface, EntityManagerInterface $entityManagerInterface, Request $request)
    {
        $data = $request->getContent();
        $decodeData = \json_decode($data);
        
        $apiPeer = $apiPeerInfoRepository->findOneByNameConversation($decodeData->name_conversation);
        
        $response = false;

        if($apiPeer != null) {
            $userB = $apiPeer->getUserB();
    
            if($userB != null) {
                $response = $userB[0];
            }
        }

        $result = $serializerInterface->serialize(
            $response,
            'json'
        );

        return new JsonResponse(
            $result,
            Response::HTTP_OK,
            [],
            true
        );
    }

    /**
     * @Route("/api/get-user-a", name="api_get_user_a", methods={"POST"})
     */
    public function getUserA(ApiPeerInfoRepository $apiPeerInfoRepository, SerializerInterface $serializerInterface, EntityManagerInterface $entityManagerInterface, Request $request)
    {
        $data = $request->getContent();
        $decodeData = \json_decode($data);
        
        $apiPeer = $apiPeerInfoRepository->findOneByNameConversation($decodeData->name_conversation);
        
        $response = false;

        if($apiPeer != null) {
            $userA = $apiPeer->getUserA();
    
            if($userA != null) {
                $response = $userA[0];
            }
        }

        $result = $serializerInterface->serialize(
            $response,
            'json'
        );

        return new JsonResponse(
            $result,
            Response::HTTP_OK,
            [],
            true
        );
    }

    /**
     * @Route("/api/set-answer", name="api_set_answer", methods={"POST"})
     */
    public function setAnswer(ApiPeerInfoRepository $apiPeerInfoRepository, SerializerInterface $serializerInterface, EntityManagerInterface $entityManagerInterface, Request $request)
    {
        $data = $request->getContent();
        $decodeData = \json_decode($data);

        $apiPeer = $apiPeerInfoRepository->findOneByNameConversation($decodeData->name_conversation);

        $apiPeer->setAnswer([$decodeData->answer]);

        $entityManagerInterface->persist($apiPeer);
        $entityManagerInterface->flush();
        
        $result = $serializerInterface->serialize(
            $apiPeer,
            'json'
        );

        return new JsonResponse(
            $result,
            Response::HTTP_OK,
            [],
            true
        );
    }

}
