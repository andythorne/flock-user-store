<?php

namespace App\Controller;

use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class UserApiController.
 *
 * @author andy@andy-thorne.co.uk
 */
class UserApiController
{
    /** @var SerializerInterface */
    private $serializer;
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * UserApiController constructor.
     *
     * @param SerializerInterface   $serializer
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(SerializerInterface $serializer, TokenStorageInterface $tokenStorage)
    {
        $this->serializer = $serializer;
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * Return the current user's data.
     *
     * @return JsonResponse
     */
    public function getUser()
    {
        $user = $this->tokenStorage->getToken()->getUser();

        if (!$user instanceof UserInterface) {
            throw new NotFoundHttpException('User not found');
        }

        return new JsonResponse([
            'id' => $user->getId(),
            'username' => $user->getUsername(),
            'realname' => $user->getUsername(),
            'email' => $user->getEmail(),
        ]);
    }
}
