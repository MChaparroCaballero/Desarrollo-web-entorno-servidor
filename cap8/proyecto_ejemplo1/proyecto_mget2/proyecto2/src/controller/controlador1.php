<?php
//src/Controller/controlador1.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class controlador1 extends AbstractController{
    
    #[Route('/suma', name:'suma', methods:['POST'])]
     
    public function home( Request $request): Response {
        $datos = json_decode($request->getContent(), true);

        $num1 = $datos['n1'] ?? 0;
        $num2 = $datos['n2'] ?? 0;
        
        $resultado = $num1 + $num2;

        return $this->json([
            'total' => $resultado
        ]);
    }
}
?>