<?php

namespace App\Controller;

use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Serializer\Serializer;

/**
 * Class UserApiController.
 *
 * @author andy@andy-thorne.co.uk
 */
class UserApiController
{
    /** @var Serializer */
    private $serializer;
    /**
     * @var TokenStorage
     */
    private $tokenStorage;

    /**
     * UserApiController constructor.
     *
     * @param Serializer $serializer
     * @param TokenStorage $tokenStorage
     */
    public function __construct(Serializer $serializer, TokenStorage $tokenStorage)
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
