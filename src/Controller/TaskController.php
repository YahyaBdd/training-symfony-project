<?php

// src/Controller/TaskController.php
namespace App\Controller;

use App\Entity\PricingPlan;
use App\Entity\Task;
use App\Form\ContactFormType;
use App\ValueObject\ContactForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{

    #[Route('/task', name: 'app_task')]
    public function new(Request $request): Response
    {
        // creates a task object and initializes some data for this example
        $form = $this->createForm(ContactFormType::class, new ContactForm());

//        $form->handleRequest($request);
//        if ($form->isSubmitted() && $form->isValid()) {
//
//            $task = $form->getData();
//
//            return $this->redirectToRoute('app_pricing');
//        }

        return $this->render('task.html.twig', [
            'form' => $form
        ]);
    }
}