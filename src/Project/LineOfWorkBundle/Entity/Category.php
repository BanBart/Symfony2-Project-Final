<?php

namespace Project\LineOfWorkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Project\LineOfWorkBundle\Utils\Slug;

/**
 * Category
 */
class Category
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $jobs;
    
    private $active_jobs;
    
    private $more_jobs;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jobs = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function __toString() {
        return $this->getName();
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
     * @return Category
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
     * Set slug
     *
     * @param string $slug
     * @return Category
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Add jobs
     *
     * @param \Project\LineOfWorkBundle\Entity\Job $jobs
     * @return Category
     */
    public function addJob(\Project\LineOfWorkBundle\Entity\Job $jobs)
    {
        $this->jobs[] = $jobs;

        return $this;
    }

    /**
     * Remove jobs
     *
     * @param \Project\LineOfWorkBundle\Entity\Job $jobs
     */
    public function removeJob(\Project\LineOfWorkBundle\Entity\Job $jobs)
    {
        $this->jobs->removeElement($jobs);
    }

    /**
     * Get jobs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJobs()
    {
        return $this->jobs;
    }
    /**
     * @ORM\PrePersist
     */
    public function setSlugValue()
    {
        $this->slug = Slug::slugify($this->getName());
    }
    
    public function setActiveJobs($jobs){
        $this->active_jobs = $jobs;
    }
    
    public function getActiveJobs(){
        return $this->active_jobs;
    }
    
    public function setMoreJobs($jobs){
        $this->more_jobs = $jobs >= 0 ? $jobs : 0;
    }
    
    public function getMoreJobs(){
        return $this->more_jobs;
    }
}
