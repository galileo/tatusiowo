<?php

namespace Tatusiowo\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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
}
