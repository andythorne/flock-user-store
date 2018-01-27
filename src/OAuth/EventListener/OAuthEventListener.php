<?php

namespace App\OAuth\EventListener;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use FOS\OAuthServerBundle\Event\OAuthEvent;

/**
 * Class OAuthEventListener.
 *
 * @author andy@andy-thorne.co.uk
 */
class OAuthEventListener
{
    /** @var EntityManager */
    private $em;

    /**
     * OAuthEventListener constructor.
     *
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function onPreAuthorizationProcess(OAuthEvent $event)
    {
        $user = $event->getUser();
        if ($user instanceof User) {
            $clients = $user->getAuthenticatedClients();
            if ($clients->contains($event->getClient())) {
                $event->setAuthorizedClient(true);
            }
        }
    }

    public function onPostAuthorizationProcess(OAuthEvent $event)
    {
        if ($event->isAuthorizedClient()) {
            if (null !== $client = $event->getClient()) {
                $user = $event->getUser();
                if ($user instanceof User) {
                    $user->addAuthenticatedClient($client);
                    $this->em->persist($user);
                    $this->em->flush($user);
                }
            }
        }
    }
}
