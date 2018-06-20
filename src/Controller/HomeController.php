<?php
/**
 *
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/twitter")
     */
    public function twitter()
    {


        return $this->render('twitter.html.twig');
    }
}