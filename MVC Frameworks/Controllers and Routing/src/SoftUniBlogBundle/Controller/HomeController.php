<?php

namespace SoftUniBlogBundle\Controller;

use SoftUniBlogBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="blog_index")
     */
    public function indexAction()
    {
        $articles=$this->getDoctrine()->getRepository(Article::class)->findBy([],['dateAdded'=>'desc']);
        return $this->render('home/home.html.twig',['articles'=>$articles]);
    }
}
