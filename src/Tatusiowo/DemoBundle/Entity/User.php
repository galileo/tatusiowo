<?php

namespace Tatusiowo\DemoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $email;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $surname;

    /**
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * @var \Tatusiowo\DemoBundle\Entity\Child[]|\Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(
     *  targetEntity="Tatusiowo\DemoBundle\Entity\Child",
     *  mappedBy="parent",
     *  cascade={"persist"},
     *  orphanRemoval=true
     * )
     */
    protected $children;

    /**
     * @var \Tatusiowo\DemoBundle\Entity\Point[]|\Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(
     *  targetEntity="Tatusiowo\DemoBundle\Entity\Point",
     *  mappedBy="user",
     *  cascade={"persist"},
     *  orphanRemoval=true
     * )
     */
    protected $userPoints;

    /**
     * @ORM\OneToMany(targetEntity="Tatusiowo\DemoBundle\Entity\ActivitiesDone", mappedBy="user")
     */
    protected $activitiesDone;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Tatusiowo\DemoBundle\Entity\Activity", mappedBy="userToDoActivities")
     */
    protected $activitiesToDo;

    function __construct()
    {
        $this->children = new ArrayCollection();
        $this->userPoints = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return \Tatusiowo\DemoBundle\Entity\Child[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @return \Tatusiowo\DemoBundle\Entity\Point[]
     */
    public function getUserPoints()
    {
        return $this->userPoints;
    }

    /**
     * @param string $name
     * @return \Tatusiowo\DemoBundle\Entity\User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $email
     * @return \Tatusiowo\DemoBundle\Entity\User|User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param string $password
     * @return \Tatusiowo\DemoBundle\Entity\User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @param string $surname
     * @return \Tatusiowo\DemoBundle\Entity\User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * @param \Tatusiowo\DemoBundle\Entity\Child $child
     * @return \Tatusiowo\DemoBundle\Entity\User
     */
    public function addChildren(Child $child)
    {
        $this->children->add($child);

        return $this;
    }
}
