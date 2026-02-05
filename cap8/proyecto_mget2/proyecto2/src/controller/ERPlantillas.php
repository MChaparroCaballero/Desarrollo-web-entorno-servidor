<?php
// src/Controller/ERPlantillas.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/base')]
class ERPlantillas extends AbstractController{
    #[Route('/saludo/{nombre}', name: 'saludo')]
    public function saludo($nombre): Response
    {
        return $this->render('saludo.html.twig', array(
            'nombre' => $nombre
        ));
    }

    #[Route('/positivo/{num}', name: 'positivo')]
    public function positivo(int $num): Response
    {
        return $this->render('if.html.twig', array(
            'numero' => $num
        ));
    }

    #[Route('/tabla', name: 'tabla')]
    public function tabla(): Response
    {
        $filas = [
            ['codigo' => '1', 'nombre' => 'Sevilla'],
            ['codigo' => '2', 'nombre' => 'Madrid'],
        ];

        return $this->render('tabla.html.twig', array(
            'filas' => $filas
        ));
    }
}