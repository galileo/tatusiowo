<?php
namespace Tatusiowo\DemoBundle\Service;

use Tatusiowo\DemoBundle\Entity\Activity;

interface ActivityManagerInterface
{
    /**
     * @param int $offset
     * @param int $limit
     * @return Activity[]
     */
    public function getActivities($offset = 0, $limit = 10);

    /**
     * @param Activity[] $activities
     * @return Activity[]
     */
    public function assignLikes($activities);
}