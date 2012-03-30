<?php

namespace Zubi\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Zubi\ArticleBundle\Entity\ArticleGroup
 */
class ArticleGroup
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    protected $articles;
    
     public function __construct() {
         $this->articles = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Add articles
     *
     * @param Zubi\ArticleBundle\Entity\Article $faqs
     */
    public function addFaq(\Zubi\ArticleBundle\Entity\Article $articles)
    {
        $this->articles[] = $articles;
    }

    /**
     * Get articles
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getFaqs()
    {
        return $this->articles;
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
}