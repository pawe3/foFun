<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Post;
use AppBundle\Entity\Topic;
use AppBundle\Service\Form\CategoryType;
use AppBundle\Service\Form\TopicType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Component\Form\Extension\Core\Type\SubmitType;
//use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;


/**
 * @Route("/admin")
 */
class AdminController extends Controller
{
    private $em;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        /** @var EntityManagerInterface $em */
        $this->em = $this->container->get("doctrine.orm.default_entity_manager");
    }

    /**
     * @Route("/admin_panel", name="homepage_admin")
     */
    public function indexAction(Request $request)
    {
        $q = $this->em->getRepository(Category::class)->findAll();
        // replace this example code with whatever you need
        return $this->render('admin/admin_panel.html.twig', array("date"=>$q));
    }

//    /**
//     * @Route("/admin_panel", name="panel_admin")
//     */
//    public function panelAction(Request $request)
//    {
//        // replace this example code with whatever you need
//        return $this->render('admin/admin.html.twig');
//    }

    /**
     * @Route("/add_kategoria", name="add_kategoria")
     */

    public function addAction(Request $request)
    {
        $kategoria = new Category();

//        old solution

//        $form = $this->createFormBuilder($kategoria)
//            ->add('nazwaKat', TextType::class)
//            ->add('save', SubmitType::class)
//            ->getForm();
        $form = $this->createForm(CategoryType::class, $kategoria);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $kategoria = $form->getData();
            $this->em->persist($kategoria);
            $this->em->flush();
            return $this->redirectToRoute('homepage_admin');
        }

        return $this->render("@App/Admin/mod_category.html.twig", array("form"=>$form->createView()));
    }

    /**
     * @Route("/update_kategoria", name="update_kategoria")
     */
    public function updateAction(Request $request)
    {
        $id = $request->get("id", 0);

        if ($id)
        {

            $kategoria = $this->em->getRepository(Category::class)->findOneBy(array("id"=>$id));

            if ($kategoria)
            {
                $form = $this->createForm(CategoryType::class, $kategoria);

//                $form = $this->createFormBuilder($kategoria)
//                    ->add('nazwaKat', TextType::class)
//                    ->add('save', SubmitType::class)
//                    ->getForm();

                $form->handleRequest($request);
                if ($form->isSubmitted() && $form->isValid())
                {
                    $kategoria = $form->getData();
                    $this->em->persist($kategoria);
                    $this->em->flush();
                    return $this->redirectToRoute('homepage_admin');
                }


                return $this->render("@App/Admin/mod_category.html.twig", array("form"=>$form->createView()));
            }
        }

        return $this->redirectToRoute("homepage_admin");

    }

    /**
     * @Route("/delete_kategoria", name="delete_kategoria")
     */
    public function deleteAction(Request $request)
    {
        $id = $request->get("id", 0);
        if ($id)
        {

            $kategoria = $this->em->getRepository(Category::class)->findOneBy(array("id"=>$id));

            if ($kategoria)
            {

                $this->em->remove($kategoria);
                $this->em->flush();

            }
        }

        return $this->redirectToRoute("homepage_admin");

    }


//    public function create
}
