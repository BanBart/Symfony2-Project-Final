<?php

namespace Project\LineOfWorkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feedback
 */
class Feedback
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $feedbacker_name;

    /**
     * @var string
     */
    private $content;


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
     * Set feedbacker_name
     *
     * @param string $feedbackerName
     * @return Feedback
     */
    public function setFeedbackerName($feedbackerName)
    {
        $this->feedbacker_name = $feedbackerName;

        return $this;
    }

    /**
     * Get feedbacker_name
     *
     * @return string 
     */
    public function getFeedbackerName()
    {
        return $this->feedbacker_name;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Feedback
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }
}
