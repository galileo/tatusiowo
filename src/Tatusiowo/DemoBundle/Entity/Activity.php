<?php

/**
 * @author Sergiusz Michalik <sergiusz.michalik@xsolve.pl>
 */

namespace Tatusiowo\DemoBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="activity")
 */
class Activity 
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="title", type="string", nullable=false)
     * @Assert\NotBlank()
     */
    protected $title;

    /**
     * @var int
     * @ORM\Column(name="time_from", type="smallint", nullable=false)
     * @Assert\NotBlank()
     */
    protected $timeFrom;

    /**
     * @var int
     * @ORM\Column(name="time_to", type="smallint", nullable=false)
     * @Assert\NotBlank()
     */
    protected $timeTo;

    /**
     * @var int
     * @ORM\Column(name="age_from", type="smallint", nullable=false)
     */
    protected $ageFrom;

    /**
     * @var int
     * @ORM\Column(name="age_to", type="smallint", nullable=false)
     * @Assert\NotBlank()
     */
    protected $ageTo;

    /**
     * @var bool
     * @ORM\Column(name="outdoor", type="boolean", nullable=false)
     */
    protected $outdoor;

    /**
     * @var bool
     * @ORM\Column(name="indoor", type="boolean", nullable=false)
     */
    protected $indoor;

    /**
     * @var int
     * @ORM\Column(name="fun", type="smallint", nullable=false)
     * @Assert\NotBlank()
     */
    protected $fun;

    /**
     * @var int
     * @ORM\Column(name="creativity", type="smallint", nullable=false)
     * @Assert\NotBlank()
     */
    protected $creativity;

    /**
     * @var int
     * @ORM\Column(name="effort", type="smallint", nullable=false)
     * @Assert\NotBlank()
     */
    protected $effort;

    /**
     * @var string
     * @ORM\Column(name="description", type="text", nullable=false)
     * @Assert\NotBlank()
     */
    protected $description;

    /**
     * @var bool
     * @ORM\Column(name="approved", type="boolean", nullable=false)
     */
    protected $approved;

    /**
     * @var Image
     * @ORM\OneToOne(targetEntity="Tatusiowo\DemoBundle\Entity\Image")
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id", nullable=false)
     **/
    protected $image;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Tatusiowo\DemoBundle\Entity\Item", inversedBy="activities")
     * @ORM\JoinTable(name="activities_items",
     *      joinColumns={@ORM\JoinColumn(name="activity_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="item_id", referencedColumnName="id")}
     * )
     */
    protected $items;

    /**
     * @ORM\OneToMany(targetEntity="Tatusiowo\DemoBundle\Entity\ActivitiesDone", mappedBy="activity")
     */
    protected $userDoneActivities;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Tatusiowo\DemoBundle\Entity\User", inversedBy="activitiesToDo")
     * @ORM\JoinTable(name="activities_to_do",
     *      joinColumns={@ORM\JoinColumn(name="activity_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="item_id", referencedColumnName="id")}
     * )
     */
    protected $userToDoActivities;

    /**
     * @var \DateTime
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    protected $createdAt;

    /**
     * @var \DateTime
     * @ORM\Column(name="approved_at", type="datetime", nullable=true)
     */
    protected $approvedAt;

    /**
     * @return int
     */
    public function getAgeFrom()
    {
        return $this->ageFrom;
    }

    /**
     * @return int
     */
    public function getAgeTo()
    {
        return $this->ageTo;
    }

    /**
     * @return boolean
     */
    public function isApproved()
    {
        return $this->approved;
    }

    /**
     * @return int
     */
    public function getCreativity()
    {
        return $this->creativity;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getEffort()
    {
        return $this->effort;
    }

    /**
     * @return int
     */
    public function getFun()
    {
        return $this->fun;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return boolean
     */
    public function isIndoor()
    {
        return $this->indoor;
    }

    /**
     * @return boolean
     */
    public function isOutdoor()
    {
        return $this->outdoor;
    }

    /**
     * @return int
     */
    public function getTimeFrom()
    {
        return $this->timeFrom;
    }

    /**
     * @return int
     */
    public function getTimeTo()
    {
        return $this->timeTo;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return \DateTime
     */
    public function getApprovedAt()
    {
        return $this->approvedAt;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return Item[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param int $ageFrom
     *
     * @return $this
     */
    public function setAgeFrom($ageFrom)
    {
        $this->ageFrom = $ageFrom;

        return $this;
    }

    /**
     * @param int $ageTo
     *
     * @return $this
     */
    public function setAgeTo($ageTo)
    {
        $this->ageTo = $ageTo;

        return $this;
    }

    /**
     * @param boolean $approved
     *
     * @return $this
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;

        return $this;
    }

    /**
     * @param \DateTime $approvedAt
     *
     * @return $this
     */
    public function setApprovedAt(\DateTime $approvedAt)
    {
        $this->approvedAt = $approvedAt;

        return $this;
    }

    /**
     * @param \DateTime $createdAt
     *
     * @return $this
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @param int $creativity
     *
     * @return $this
     */
    public function setCreativity($creativity)
    {
        $this->creativity = $creativity;

        return $this;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param int $effort
     *
     * @return $this
     */
    public function setEffort($effort)
    {
        $this->effort = $effort;

        return $this;
    }

    /**
     * @param int $fun
     *
     * @return $this
     */
    public function setFun($fun)
    {
        $this->fun = $fun;

        return $this;
    }

    /**
     * @param boolean $indoor
     *
     * @return $this
     */
    public function setIndoor($indoor)
    {
        $this->indoor = $indoor;

        return $this;
    }

    /**
     * @param boolean $outdoor
     *
     * @return $this
     */
    public function setOutdoor($outdoor)
    {
        $this->outdoor = $outdoor;

        return $this;
    }

    /**
     * @param int $timeFrom
     *
     * @return $this
     */
    public function setTimeFrom($timeFrom)
    {
        $this->timeFrom = $timeFrom;

        return $this;
    }

    /**
     * @param int $timeTo
     *
     * @return $this
     */
    public function setTimeTo($timeTo)
    {
        $this->timeTo = $timeTo;

        return $this;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param Image $image
     *
     * @return $this
     */
    public function setImage(Image $image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @param Item $item
     *
     * @return $this
     */
    public function addItem(Item $item)
    {
        $this->items[] = $item;

        return $this;
    }

}
