<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Class User
 *
 * @author andy@andy-thorne.co.uk
 */
class User extends BaseUser
{
    /** @var AuthCode[] */
    private $authCodes;

    public function __construct()
    {
        parent::__construct();

        $this->authCodes = new ArrayCollection();
    }

    /**
     * @return AuthCode[]
     */
    public function getAuthCodes()
    {
        return $this->authCodes;
    }
}
