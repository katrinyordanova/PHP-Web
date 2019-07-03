<?php

namespace SoftUniBlogBundle\Controller;

use SoftUniBlogBundle\Entity\Article;
use SoftUniBlogBundle\Entity\Product;
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

    /**
     * @Route("/orm")
     */
    public function orm()
    {
        $product=new Product();
        $product->setName('Coca Cola');
        $product->setPrice(2.3);
        $product->setDescription('Alabala');
        $product->setCreateDate(new \DateTime());

        $em=$this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();

        return $this->render('home/orm.html.twig',
        ['product'=>$product]);
    }

    /**
     * @Route("/orm_get")
     */
    public function orm_get()
    {
        $product=$this->getDoctrine()->getRepository(Product::class)->find(1);
        return $this->render('home/orm.html.twig',['product'=>$product]);
    }

    /**
 * @Route("/orm_update")
 */
    public function orm_update()
    {
        $product=$this->getDoctrine()->getRepository(Product::class)->find(3);
        $product->setName('New new 999');
        $em=$this->getDoctrine()->getManager();
        //$em->persist($product);
        $em->flush();
        return $this->render('home/orm.html.twig',['product'=>$product]);
    }

    /**
     * @Route("/orm_delete")
     */
    public function orm_delete()
    {
        $product=$this->getDoctrine()->getRepository(Product::class)->find(3);

        if (!$product){
            throw $this->createNotFoundException("Product not found");
        }

        $em=$this->getDoctrine()->getManager();
        $em->remove($product);
        $em->flush();
        return $this->render('home/orm.html.twig',['product'=>$product]);
    }

    /**
     * @Route("/orm_get2")
     */
    public function orm_get2()
    {
        $product=$this->getDoctrine()->getRepository(Product::class)->findByNameAndPrice(1);
        return $this->render('home/orm.html.twig',['product'=>$product]);
    }
}
