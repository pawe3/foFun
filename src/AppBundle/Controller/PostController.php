<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
    private $em;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        /** @var EntityManagerInterface $em */
        $this->em = $this->container->get("doctrine.orm.default_entity_manager");
    }

    /**
     * @Route("/kategoria", name="category_view")
     */
    public function indexAction(Request $request)
    {
        $q = $this->em->getRepository(Post::class)->findAll();
        // replace this example code with whatever you need
//        dump($this->getUser());
//        die;
        return $this->render('@App/Post/post.html.twig', array("date"=>$q));
    }
}
