<?php

namespace Formation\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="connect_log")
 * @ORM\Entity(repositoryClass="Formation\CatalogBundle\Repository\ConnectLogRepository")
 */
class ConnectLog
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * 
     * @ORM\Column(name="username", type="string")
     */
    private $username;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    
    
    /**
     * Get Id
     * 
     * @return integer
     */
    function getId()
    {
        return $this->id;
    }
    
    /**
     * Set Id
     * 
     * @param integer $id
     */
    function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * Get Username
     * 
     * @return string
     */
    function getUsername()
    {
        return $this->username;
    }
    
    /**
     * Set Username
     * 
     * @param string $username
     */
    function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get Date
     * 
     * @return \DateTime
     */
    function getDate()
    {
        return $this->date;
    }

    /**
     * Set Date
     * 
     * @param \DateTime $date
     */
    function setDate(\DateTime $date)
    {
        $this->date = $date;
    }
}
