<?php

namespace Mgn\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Article
 *
 * @ORM\Entity
 * @ORM\Table(name="mgn_article")
 * @ORM\Entity(repositoryClass="Mgn\ArticleBundle\Entity\ArticleRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Article
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer $author
     *
     * @ORM\ManyToOne(targetEntity="Mgn\UserBundle\Entity\User")
     */
    private $author;

    /**
     * @var integer $category
     *
     * @ORM\ManyToOne(targetEntity="Mgn\ArticleBundle\Entity\Category", inversedBy="articles")
     */
    private $category;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateTop", type="datetime")
     */
    private $dateTop;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="header", type="string", length=255, nullable=true)
     */
    private $header;

    /**
     * @var string
     *
     * @ORM\Column(name="introduction", type="text", nullable=true)
     */
    private $introduction;

    /**
     * @var integer $contents
     *
     * @ORM\OneToMany(targetEntity="Mgn\ContentBundle\Entity\Content", mappedBy="article")
     */
    private $contents;

    /**
     * @var boolean
     *
     * @ORM\Column(name="comments", type="boolean")
     */
    private $comments;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="countViews", type="bigint")
     */
    private $countViews;

    /**
     * @var integer
     *
     * @ORM\Column(name="countComments", type="bigint")
     */
    private $countComments;
    
    /**
     * @var integer $idLastComment
     *
     * @ORM\OneToOne(targetEntity="Mgn\MessageBundle\Entity\Message")
     * @ORM\JoinColumn(nullable=true)
     */
    private $idLastComment;
    
    /**
     * @var datetime $dateLastComment
     *
     * @ORM\Column(name="dateLastComment", type="datetime", nullable=true)
     */
    private $dateLastComment;

    /**
     * @var integer $userLastComment
     *
     * @ORM\ManyToOne(targetEntity="Mgn\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     */
    private $userLastComment;

    /**
    * @Gedmo\Slug(fields={"url"})
    * @ORM\Column(length=128, unique=true)
    */
    private $slug;

    public function __construct()
    {
        $datetime = new \Datetime();
        $this->date = $datetime;
        $this->dateTop = $datetime;
        $this->countViews = 0;
        $this->countComments = 0;
        $this->comments = true;
        $this->status = 'draft';
        $this->title = 'Sans titre';
        $this->contents = new ArrayCollection();
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
     * Set date
     *
     * @param \DateTime $date
     * @return Article
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set dateTop
     *
     * @param \DateTime $dateTop
     * @return Article
     */
    public function setDateTop($dateTop)
    {
        $this->dateTop = $dateTop;
    
        return $this;
    }

    /**
     * Get dateTop
     *
     * @return \DateTime 
     */
    public function getDateTop()
    {
        return $this->dateTop;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Article
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set header
     *
     * @param string $header
     * @return Article
     */
    public function setHeader($header)
    {
        $this->header = $header;
    
        return $this;
    }

    /**
     * Get header
     *
     * @return string 
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * Set introduction
     *
     * @param string $introduction
     * @return Article
     */
    public function setIntroduction($introduction)
    {
        $this->introduction = $introduction;
    
        return $this;
    }

    /**
     * Get introduction
     *
     * @return string 
     */
    public function getIntroduction()
    {
        return $this->introduction;
    }

    /**
     * Set comments
     *
     * @param boolean $comments
     * @return Article
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    
        return $this;
    }

    /**
     * Get comments
     *
     * @return boolean 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Article
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set countViews
     *
     * @param integer $countViews
     * @return Article
     */
    public function setCountViews($countViews)
    {
        $this->countViews = $countViews;
    
        return $this;
    }

    /**
     * Get countViews
     *
     * @return integer 
     */
    public function getCountViews()
    {
        return $this->countViews;
    }

    /**
     * Set countComments
     *
     * @param integer $countComments
     * @return Article
     */
    public function setCountComments($countComments)
    {
        $this->countComments = $countComments;
    
        return $this;
    }

    /**
     * Get countComments
     *
     * @return integer 
     */
    public function getCountComments()
    {
        return $this->countComments;
    }

    /**
     * Set dateLastComment
     *
     * @param \DateTime $dateLastComment
     * @return Article
     */
    public function setDateLastComment($dateLastComment)
    {
        $this->dateLastComment = $dateLastComment;
    
        return $this;
    }

    /**
     * Get dateLastComment
     *
     * @return \DateTime 
     */
    public function getDateLastComment()
    {
        return $this->dateLastComment;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Article
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
     * Set author
     *
     * @param \Mgn\UserBundle\Entity\User $author
     * @return Article
     */
    public function setAuthor(\Mgn\UserBundle\Entity\User $author = null)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return \Mgn\UserBundle\Entity\User 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set category
     *
     * @param \Mgn\ArticleBundle\Entity\Category $category
     * @return Article
     */
    public function setCategory(\Mgn\ArticleBundle\Entity\Category $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \Mgn\ArticleBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add contents
     *
     * @param \Mgn\ContentBundle\Entity\Content $contents
     * @return Article
     */
    public function addContent(\Mgn\ContentBundle\Entity\Content $contents)
    {
        $this->contents[] = $contents;
    
        return $this;
    }

    /**
     * Remove contents
     *
     * @param \Mgn\ContentBundle\Entity\Content $contents
     */
    public function removeContent(\Mgn\ContentBundle\Entity\Content $contents)
    {
        $this->contents->removeElement($contents);
    }

    /**
     * Get contents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * Set idLastComment
     *
     * @param \Mgn\MessageBundle\Entity\Message $idLastComment
     * @return Article
     */
    public function setIdLastComment(\Mgn\MessageBundle\Entity\Message $idLastComment = null)
    {
        $this->idLastComment = $idLastComment;
    
        return $this;
    }

    /**
     * Get idLastComment
     *
     * @return \Mgn\MessageBundle\Entity\Message 
     */
    public function getIdLastComment()
    {
        return $this->idLastComment;
    }

    /**
     * Set userLastComment
     *
     * @param \Mgn\UserBundle\Entity\User $userLastComment
     * @return Article
     */
    public function setUserLastComment(\Mgn\UserBundle\Entity\User $userLastComment = null)
    {
        $this->userLastComment = $userLastComment;
    
        return $this;
    }

    /**
     * Get userLastComment
     *
     * @return \Mgn\UserBundle\Entity\User 
     */
    public function getUserLastComment()
    {
        return $this->userLastComment;
    }
}
