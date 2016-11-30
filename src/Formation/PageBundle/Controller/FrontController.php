<?php

namespace Formation\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FrontController extends Controller
{
    /**
     * Index
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $categories = $em->getRepository('CatalogBundle:Category')->findBy([], ['id' => 'ASC'], 10);
        
        return $this->render('PageBundle:Front:index.html.twig', array(
            'categories' => $categories
        ));
    }
    
    /**
     * Category
     */
    public function categoryAction(Request $request)
    {
        $categoryId = $request->get('id');
        
        $em = $this->getDoctrine()->getManager();
        
        $products = $em->getRepository('CatalogBundle:Product')->findProductsByCategory($categoryId);
        $category = $em->getRepository('CatalogBundle:Category')->findOneById($categoryId);
        
        return $this->render('PageBundle:Front:category.html.twig', array(
            'products' => $products,
            'category' => $category
        ));
    }
    
    /**
     * Product
     */
    public function productAction(Request $request)
    {
        $productId = $request->get('productId');
        $categoryId = $request->get('categoryId');
        
        $em = $this->getDoctrine()->getManager();
        
        $product = $em->getRepository('CatalogBundle:Product')->findOneById($productId);
        
        return $this->render('PageBundle:Front:product.html.twig', array(
            'product' => $product,
            'categoryId' => $categoryId
        ));
    }
}
