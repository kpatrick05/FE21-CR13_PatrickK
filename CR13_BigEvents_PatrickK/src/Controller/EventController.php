<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Repository\EventsRepository;
use App\Entity\Events;
use App\Entity\Type;

class EventController extends AbstractController
{
    #[Route('/', name: 'event')]
    public function index(): Response
    {
        $events = $this->getDoctrine()->getRepository(Events::class)->findAll();

        return $this->render('event/index.html.twig', [
            "events" => $events
        ]);
    }


    #[Route('/create', name: 'event-create')]
    public function create(Request $request): Response
    {
        $event = new Events();
        $form = $this->createFormBuilder($event)
            ->add("name", TextType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("datetime", DateTimeType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("description", TextType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("picture", TextType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("capacity", NumberType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("contanct_email", TextType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("phonenumber", NumberType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("cityname", TextType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("zip", NumberType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("address", TextType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("url", TextType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add('fk_type', EntityType::class, [
                'class' => Type::class,
                'choice_label' => 'typename',
            ])

            ->add("save", SubmitType::class, array('attr' => array("class" => "btn btn-success", "style" => "margin-bottom: 15px; margin-top: 15px;"), "label" => "Submit"))->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $name = $form["name"]->getData();
            $datetime = $form["datetime"]->getData();
            $description = $form["description"]->getData();
            $picture = $form["picture"]->getData();
            $capacity = $form["capacity"]->getData();
            $contanct_email = $form["contanct_email"]->getData();
            $phonenumber = $form["phonenumber"]->getData();
            $cityname = $form["cityname"]->getData();
            $zip = $form["zip"]->getData();
            $address = $form["address"]->getData();
            $url = $form["url"]->getData();



            $event->setName($name);
            $event->setDatetime($datetime);
            $event->setDescription($description);
            $event->setPicture($picture);
            $event->setCapacity($capacity);
            $event->setContanctEmail($contanct_email);
            $event->setPhonenumber($phonenumber);
            $event->setCityname($cityname);
            $event->setZip($zip);
            $event->setAddress($address);
            $event->setUrl($url);

            $em = $this->getDoctrine()->getManager();

            $em->persist($event);
            $em->flush();

            $this->addFlash('notice', 'Event added');

            return $this->redirectToRoute('event');
        }

        return $this->render('event/create.html.twig', [
            "form" => $form->createView()
        ]);
    }

    #[Route('/details/{id}', name: 'event-details')]
    public function details($id): Response
    {

        $event = $this->getDoctrine()->getRepository(Events::class)->find($id);
        return $this->render('event/details.html.twig', [
            "event" => $event
        ]);
    }
    #[Route('/delete/{id}', name: 'event-delete')]
    public function delete($id): Response
    {


        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository(Events::class)->find($id);
        $em->remove($event);
        $em->flush();

        $this->addFlash("notice", "Event removed");

        return $this->redirectToRoute("event");
    }


    #[Route('/edit/{id}', name: 'event-edit')]
    public function  edit($id, Request $request): Response
    {

        $event = $this->getDoctrine()->getRepository(Events::class)->find($id);
        $form = $this->createFormBuilder($event)
            ->add("name", TextType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("datetime", DateTimeType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("description", TextType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("picture", TextType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("capacity", NumberType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("contanct_email", TextType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("phonenumber", NumberType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("cityname", TextType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("zip", NumberType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("address", TextType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add("url", TextType::class, array('attr' => array("class" => "form-control", "style" => "margin-bottom: 15px;")))
            ->add('fk_type', EntityType::class, [
                'class' => Type::class,
                'choice_label' => 'typename',
            ])

            ->add("save", SubmitType::class, array('attr' => array("class" => "btn btn-success", "style" => "margin-bottom: 15px; margin-top: 15px;"), "label" => "Submit"))->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $name = $form["name"]->getData();
            $datetime = $form["datetime"]->getData();
            $description = $form["description"]->getData();
            $picture = $form["picture"]->getData();
            $capacity = $form["capacity"]->getData();
            $contanct_email = $form["contanct_email"]->getData();
            $phonenumber = $form["phonenumber"]->getData();
            $cityname = $form["cityname"]->getData();
            $zip = $form["zip"]->getData();
            $address = $form["address"]->getData();
            $url = $form["url"]->getData();



            $event->setName($name);
            $event->setDatetime($datetime);
            $event->setDescription($description);
            $event->setPicture($picture);
            $event->setCapacity($capacity);
            $event->setContanctEmail($contanct_email);
            $event->setPhonenumber($phonenumber);
            $event->setCityname($cityname);
            $event->setZip($zip);
            $event->setAddress($address);
            $event->setUrl($url);

            $em = $this->getDoctrine()->getManager();

            $em->persist($event);
            $em->flush();


            $this->addFlash('notice', 'Event edites');

            return $this->redirectToRoute('event');
        }

        return $this->render('event/edit.html.twig', [
            "form" => $form->createView()
        ]);
    }




    #[Route('/music', name: 'event-music')]
    public function music(): Response
    {

        $events = $this->getDoctrine()->getRepository("App:Events")->findBy(["fk_type" => "2"]);
        return $this->render("event/music.html.twig", array("events" => $events));
    }


    #[Route('/movie', name: 'event-movie')]
    public function movie(): Response
    {

        $events = $this->getDoctrine()->getRepository("App:Events")->findBy(["fk_type" => "1"]);
        return $this->render("event/movie.html.twig", array("events" => $events));
    }

    #[Route('/sport', name: 'event-sport')]
    public function sport(): Response
    {

        $events = $this->getDoctrine()->getRepository("App:Events")->findBy(["fk_type" => "3"]);
        return $this->render("event/sport.html.twig", array("events" => $events));
    }
    #[Route('/theater', name: 'event-theater')]
    public function filter(): Response
    {

        $events = $this->getDoctrine()->getRepository("App:Events")->findBy(["fk_type" => "4"]);
        return $this->render("event/theater.html.twig", array("events" => $events));
    }
}
