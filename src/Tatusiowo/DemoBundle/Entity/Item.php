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
 * @ORM\Table(name="item")
 */
class Item
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", nullable=false)
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @var Image
     * @ORM\OneToOne(targetEntity="Tatusiowo\DemoBundle\Entity\Image")
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id", nullable=false)
     **/
    protected $image;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Tatusiowo\DemoBundle\Entity\Activity", mappedBy="items")
     */
    protected $activities;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Activity[]
     */
    public function getActivities()
    {
        return $this->activities;
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
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param Activity $activity
     *
     * @return $this
     */
    public function addActivity(Activity $activity)
    {
        $this->activities[] = $activity;

        return $this;
    }

}
