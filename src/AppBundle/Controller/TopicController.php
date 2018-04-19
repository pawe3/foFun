<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use AppBundle\Entity\Topic;

use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

class TopicController extends Controller
{
    private $em;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        /** @var EntityManagerInterface $em */
        $this->em = $this->container->get("doctrine.orm.default_entity_manager");
    }

    /**
     * @Route("/topic", name="topic_view")
     */
    public function indexAction(Request $request)
    {
        $q = $this->em->getRepository(Topic::class)->findAll();
        return $this->render('@App/Topic/topic.html.twig', array("date"=>$q));
    }

    /**
     * @Route("/add_topic", name="add_topic")
     */

    public function addTAction(Request $request)
    {
        $topic = new Topic();

        $form = $this->createForm(TopicType::class, $topic);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $topic = $form->getData();

            $firstPost = new Post();
            $firstPost->setTresc($topic->getPosts());

            $this->em->persist($topic);
            $this->em->flush();
            return $this->redirectToRoute('topic_view');
        }

        return $this->render("@App/Admin/mod_category.html.twig", array("form"=>$form->createView()));
    }
}





