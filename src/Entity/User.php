<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Class User.
 *
 * @author andy@andy-thorne.co.uk
 */
class User extends BaseUser
{
    /** @var AuthCode[] */
    private $authCodes;

    /** @var Client[] */
    private $authenticatedClients;

    public function __construct()
    {
        parent::__construct();

        $this->authCodes = new ArrayCollection();
        $this->authenticatedClients = new ArrayCollection();
    }

    /**
     * @return AuthCode[]
     */
    public function getAuthCodes()
    {
        return $this->authCodes;
    }

    /**
     * @return Client[]
     */
    public function getAuthenticatedClients()
    {
        return $this->authenticatedClients;
    }

    /**
     * @param Client $authenticatedClient
     *
     * @return $this
     */
    public function addAuthenticatedClient(Client $authenticatedClient)
    {
        $this->authenticatedClients[] = $authenticatedClient;

        return $this;
    }

    /**
     * @param Client $authenticatedClient
     *
     * @return $this
     */
    public function removeAuthenticatedClient(Client $authenticatedClient)
    {
        $this->authenticatedClients->removeElement($authenticatedClient);

        return $this;
    }
}
