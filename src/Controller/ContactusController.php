<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactusController extends AbstractController
{
    #[Route('/contactus', name: 'app_contactus')]
    public function contactUS()
    {
        return new Response("contacr");
    }
}