<?php

namespace Formation\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Formation\CatalogBundle\Entity\Category;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="Formation\CatalogBundle\Repository\ProductRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Product
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
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime")
     * @Assert\DateTime()
     */
    private $createdDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_date", type="datetime", nullable=true)
     * @Assert\DateTime()
     */
    private $updatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     * @Assert\Length(min=10)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="sku", type="string", length=255, unique=true)
     * @Assert\NotBlank()
     */
    private $sku;
    
    /**
     * @ORM\ManyToMany(targetEntity="Formation\CatalogBundle\Entity\Category", cascade={"persist"})
     * @ORM\JoinTable(name="product_category")
     */
    private $categories;
    
    
    public function __construct()
    {
        $this->createdDate = new \DateTime();
        $this->categories = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return Product
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set updatedDate
     *
     * @param \DateTime $updatedDate
     * @return Product
     */
    public function setUpdatedDate($updatedDate)
    {
        $this->updatedDate = $updatedDate;

        return $this;
    }

    /**
     * Get updatedDate
     *
     * @return \DateTime 
     */
    public function getUpdatedDate()
    {
        return $this->updatedDate;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set sku
     *
     * @param string $sku
     * @return Product
     */
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Get sku
     *
     * @return string 
     */
    public function getSku()
    {
        return $this->sku;
    }
    
    /**
     * Add category
     * 
     * @param Category $category
     * @return $this
     */
    public function addCategory(Category $category)
    {
        $this->categories[] = $category;
        
        return $this;
    }
    
    /**
     * Remove category
     * 
     * @param Category $category
     */
    public function removeCategory(Category $category)
    {
        $this->categories->removeElement($category);
    }
    
    /**
     * Get categories
     * 
     * @return array
     */
    public function getCategories()
    {
        return $this->categories;
    }
    
    /**
     * Update Date
     * 
     * @ORM\PreUpdate
     */
    public function updateDate()
    {
        $this->setUpdatedDate(new \DateTime());
    }
}
