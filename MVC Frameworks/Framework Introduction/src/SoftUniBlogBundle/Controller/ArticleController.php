<?php

namespace SoftUniBlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use SoftUniBlogBundle\Entity\Article;
use SoftUniBlogBundle\Entity\User;
use SoftUniBlogBundle\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends Controller
{
    /**
     * @Route("/article/create", name="article_create")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $article=new Article();
        $form=$this->createForm(ArticleType::class,$article);
        $form->handleRequest($request);

        if ($form->isSubmitted() and $form->isValid()) {
            $currentUser = $this->getUser();
            $article->setAuthor($currentUser);
            $em=$this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('blog_index');
        }
        return $this->render('article/create.html.twig',['form'=>$form->createView()]);
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/article/{id}", name="article_view")
     */
    public function viewArticle($id)
    {
       $article=$this->getDoctrine()->getRepository(Article::class)->find($id);
        return $this->render('article/article.html.twig',['article'=>$article]);
    }

    /**
     * @Route("/article/edit/{id}" , name="article_edit")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request,$id)
    {
        $article=$this->getDoctrine()->getRepository(Article::class)->find($id);
        $form=$this->createForm(ArticleType::class,$article);
        $form->handleRequest($request);

        if (null===$article){
            return $this->redirectToRoute('blog_index');
        }
        /** @var User $currentUser */
        $currentUser=$this->getUser();

        if (!$currentUser->isAdmin() and !$currentUser->isAuthor($article)){
            return $this->redirectToRoute("blog_index");
        }
        if ($form->isSubmitted() and $form->isValid()) {
            $currentUser = $this->getUser();
            $article->setAuthor($currentUser);
            $em=$this->getDoctrine()->getManager();
            $em->merge($article);
            $em->flush();

            return $this->redirectToRoute('blog_index');
        }
        return $this->render('article/edit.html.twig',
            ['form'=>$form->createView(),'article'=>$article]);
    }

    /**
     * @Route("/article/delete/{id}" , name="article_delete")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request,$id)
    {
        $article=$this->getDoctrine()->getRepository(Article::class)->find($id);

        if (null===$article){
            return $this->redirectToRoute('blog_index');
        }

        /** @var User $currentUser */
        $currentUser=$this->getUser();

        if (!$currentUser->isAdmin() and !$currentUser->isAuthor($article)){
            return $this->redirectToRoute("blog_index");
        }

        $form=$this->createForm(ArticleType::class,$article);
        $form->handleRequest($request);

        if ($form->isSubmitted() and $form->isValid()) {
            $currentUser = $this->getUser();
            $article->setAuthor($currentUser);
            $em=$this->getDoctrine()->getManager();
            $em->remove($article);
            $em->flush();


        }
        return $this->render('article/delete.html.twig',
            ['form'=>$form->createView(),'article'=>$article]);
    }
}
