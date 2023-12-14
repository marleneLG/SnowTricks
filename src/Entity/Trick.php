<?php
// src/Entity/Article.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="Tricks")
 * */

class Trick
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * Les tricks sont liées à un user
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="tricks")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * Un trick a potentiellement plusieurs messages
     * @ORM\OneToMany(targetEntity="App\Entity\Message", mappedBy="trick")
     */
    private $messages;

    /**
     * Les categories sont liées à un trick
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="category")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * Un trick a potentiellement plusieurs pictures
     * @ORM\OneToMany(targetEntity="App\Entity\Picture", mappedBy="trick")
     */
    private $pictures;

    /**
     * Un trick a potentiellement plusieurs videos
     * @ORM\OneToMany(targetEntity="App\Entity\Video", mappedBy="trick")
     */
    private $videos;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
}
