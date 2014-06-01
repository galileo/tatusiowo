<?php

namespace Tatusiowo\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Tatusiowo\DemoBundle\Entity\Activity;

class ActivityController extends Controller
{
    /**
     * @Route("/list", name="tatusiowo_activity_list")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @Template()
     */
    public function listAction()
    {
        $activities = $this->getDoctrine()->getRepository('DemoBundle:Activity')->findAll();
//        $this->manager->assignLikes($activities);

        return array('activities' => $activities);
    }

    /**
     * @param $activityId
     *
     * @Route("/{activityId}", name="tatusiowo_activity_detail")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @Template()
     */
    public function detailAction($activityId)
    {
        $activity = $this->findOneOrFail($activityId);

        return ['activity' => $activity];
    }

    /**
     * @param $activityId
     *
     * @return Activity
     */
    private function findOneOrFail($activityId)
    {
        $activity = $this->get('tatusiowo_activity_repository')->find($activityId);

        return $activity;
    }

}
