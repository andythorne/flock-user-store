<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
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
        return new JsonResponse(
            $this->serializer->serialize($this->tokenStorage->getToken()->getUser(), 'json'), 200, [], true
        );
    }
}
