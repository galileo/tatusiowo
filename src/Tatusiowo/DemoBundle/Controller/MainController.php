<?php

namespace Tatusiowo\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MainController extends Controller
{
    /**
     * @Route("/homepage", name="homepage")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @Template()
     */
    public function homepageAction()
    {
        return [];
    }
}
