<?php

namespace Tatusiowo\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table("activities_done")
 */
class ActivitiesDone {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(
     *  targetEntity="Tatusiowo\DemoBundle\Entity\User",
     *  inversedBy="activitiesDone"
     * )
     */
    protected $user;

    /**
     * @ORM\ManyToOne(
     *  targetEntity="Tatusiowo\DemoBundle\Entity\User",
     *  inversedBy="userDoneActivities"
     * )
     */
    protected $activity;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    protected $liked;


    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \Tatusiowo\DemoBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return \Tatusiowo\DemoBundle\Entity\Activity
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return boolean
     */
    public function getLiked()
    {
        return $this->liked;
    }

    /**
     * @param \Tatusiowo\DemoBundle\Entity\Activity $activity
     *
     * @return \Tatusiowo\DemoBundle\Entity\ActivitiesDone
     */
    public function setActivity(Activity $activity)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * @param \Tatusiowo\DemoBundle\Entity\User $user
     * @return \Tatusiowo\DemoBundle\Entity\ActivitiesDone
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @param \DateTime $createdAt
     * @return \Tatusiowo\DemoBundle\Entity\ActivitiesDone
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @param boolean $liked
     *
     * @return \Tatusiowo\DemoBundle\Entity\ActivitiesDone
     */
    public function setLiked($liked)
    {
        $this->liked = $liked;
        return $this;
    }
}