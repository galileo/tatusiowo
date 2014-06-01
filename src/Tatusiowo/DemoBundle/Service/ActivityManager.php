<?php


namespace Tatusiowo\DemoBundle\Service;


use Doctrine\ORM\EntityRepository;
use Tatusiowo\DemoBundle\Entity\Activity;

class ActivityManager implements ActivityManagerInterface
{
    /**
     * @var \Doctrine\ORM\EntityRepository
     */
    private $activityRepository;

    function __construct(EntityRepository $activityRepository)
    {
        $this->activityRepository = $activityRepository;
    }

    /**
     * @param int $offset
     * @param int $limit
     * @return Activity[]
     */
    public function getActivities($offset = 0, $limit = 10)
    {
        $activities = $this->activityRepository->findAll();
        $this->assignLikes($activities);

        return $activities;
    }

    /**
     * @param Activity[] $activities
     * @return Activity[]
     */
    public function assignLikes($activities)
    {
//        $this->activityRepository->find

        return $activities;
    }
} 