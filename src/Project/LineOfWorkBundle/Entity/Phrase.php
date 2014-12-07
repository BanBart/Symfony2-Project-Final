<?php

namespace Project\LineOfWorkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Phrase
 */
class Phrase
{
   
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $main_header;

    /**
     * @var string
     */
    private $medium_header;

    /**
     * @var string
     */
    private $medium_paragraph;

    /**
     * @var string
     */
    private $bottom_paragraph;


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
     * Set main_header
     *
     * @param string $mainHeader
     * @return Phrase
     */
    public function setMainHeader($mainHeader)
    {
        $this->main_header = $mainHeader;

        return $this;
    }

    /**
     * Get main_header
     *
     * @return string 
     */
    public function getMainHeader()
    {
        return $this->main_header;
    }

    /**
     * Set medium_header
     *
     * @param string $mediumHeader
     * @return Phrase
     */
    public function setMediumHeader($mediumHeader)
    {
        $this->medium_header = $mediumHeader;

        return $this;
    }

    /**
     * Get medium_header
     *
     * @return string 
     */
    public function getMediumHeader()
    {
        return $this->medium_header;
    }

    /**
     * Set medium_paragraph
     *
     * @param string $mediumParagraph
     * @return Phrase
     */
    public function setMediumParagraph($mediumParagraph)
    {
        $this->medium_paragraph = $mediumParagraph;

        return $this;
    }

    /**
     * Get medium_paragraph
     *
     * @return string 
     */
    public function getMediumParagraph()
    {
        return $this->medium_paragraph;
    }

    /**
     * Set bottom_paragraph
     *
     * @param string $bottomParagraph
     * @return Phrase
     */
    public function setBottomParagraph($bottomParagraph)
    {
        $this->bottom_paragraph = $bottomParagraph;

        return $this;
    }

    /**
     * Get bottom_paragraph
     *
     * @return string 
     */
    public function getBottomParagraph()
    {
        return $this->bottom_paragraph;
    }
}
