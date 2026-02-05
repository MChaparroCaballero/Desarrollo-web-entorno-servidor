<?php
// src/Controller/ERBase.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
#[Route('/base')]
class ERBase extends AbstractController{
	#[Route('/hola', name: 'hola')]
	 public function hola(){
        return new Response('<html><body>Hola</body></html>');
	 }
}