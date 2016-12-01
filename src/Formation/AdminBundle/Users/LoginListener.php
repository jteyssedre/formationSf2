<?php

namespace Formation\AdminBundle\Users;

use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Formation\CatalogBundle\Entity\ConnectLog;
use Doctrine\ORM\EntityManager;


class LoginListener
{
    /** @var EntityManager $em */
    protected $em;


    /**
     * 
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * 
     * @param InteractiveLoginEvent $loginEvent
     */
    public function onLogin(InteractiveLoginEvent $loginEvent)
    {
        $username = $loginEvent->getAuthenticationToken()->getUsername();
        $log = new ConnectLog();
        
        $log->setUsername($username);
        $log->setDate(new \DateTime());
        
        $this->em->persist($log);
        $this->em->flush();        
    }
    
}
