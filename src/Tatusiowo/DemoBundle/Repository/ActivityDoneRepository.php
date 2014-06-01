<?php

namespace Tatusiowo\DemoBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Tatusiowo\DemoBundle\Entity\Activity;

class ActivityDoneRepository extends EntityRepository
{

    /**
     * @param Activity[] $activities
     *
     * @return array $counts
     */
    public function findPlainLikeCount($activities)
    {

        $counts = $this->getEntityManager()
            ->createQuery('SELECT COUNT(ad.id)
                FROM DemoBundle:ActivityDone ad
                WHERE ad.user IN (?1)
                AND ad.like = ?2
                GROUP BY ad.user'
            )
            ->setParameter(1, $this->getIds($activities))
            ->setParameter(2, true)
            ->getResult();

        print_r($counts);

//        die();

        return $counts;
    }

    /**
     * @param Activity[] $activities
     * @return array
     */
    protected function getIds($activities)
    {
        $ids = array_map(function (Activity $activity) {
            return $activity->getId();
        }, $activities);

        return $ids;
    }

} 