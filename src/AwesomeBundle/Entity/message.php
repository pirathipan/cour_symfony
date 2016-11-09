<?php

namespace AwesomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="AwesomeBundle\Repository\messageRepository")
 */
class message
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
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="ticket", inversedBy="message")
     * @ORM\JoinColumn(name="ticket", referencedColumnName="id", nullable=false)
     */
    private $ticket;



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
     * Set content
     *
     * @param string $content
     *
     * @return message
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

    /**
     * Set ticket
     *
     * @param \AwesomeBundle\Entity\ticket $ticket
     *
     * @return message
     */
    public function setTicket(\AwesomeBundle\Entity\ticket $ticket)
    {
        $this->ticket = $ticket;

        return $this;
    }

    /**
     * Get ticket
     *
     * @return \AwesomeBundle\Entity\ticket
     */
    public function getTicket()
    {
        return $this->ticket;
    }
}
