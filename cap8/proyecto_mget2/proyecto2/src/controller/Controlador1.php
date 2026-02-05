<?php
// src/Controller/Controlador1.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class Controlador1 extends AbstractController{
    
    #[Route('/suma', name: 'suma', methods: ['POST'])]
    public function suma(Request $request): Response {
        $datos = json_decode($request->getContent(), true);

        $num1 = $datos['n1'] ?? 0;
        $num2 = $datos['n2'] ?? 0;
        
        $resultado = $num1 + $num2;

        return $this->json([
            'total' => $resultado
        ]);
    }

    #[Route('/hola', name: 'hola', methods: ['GET'])]
    public function hola(): Response{
        return new Response('<html><body>Hola</body></html>');
    }

    #[Route('/producto/{num1}/{num2}', name: 'producto', methods: ['GET'])]
    public function producto($num1, $num2): Response{
        $producto = $num1 * $num2;
        return new Response("<html><body> " . $producto . "</body></html>");
    }

    #[Route('/defecto1/{num}', name: 'defecto1', methods: ['GET'], defaults: ['num' => 3])]
    public function defecto1($num): Response{
        return new Response("<html><body> " . $num . "</body></html>");
    }

    #[Route('/defecto2/{num}', name: 'defecto2', methods: ['GET'], defaults: ['num' => 4])]
    public function defecto2($num): Response{
        return new Response("<html><body> " . $num . "</body></html>");
    }

    #[Route('/cuadrado/{num}', name: 'cuadrado')]
    public function cuadrado($num): Response
    {
        // Redirigimos usando la sintaxis corta de array []
        return $this->redirectToRoute('producto', [
            'num1' => $num, 
            'num2' => $num
        ]);
    }

    #[Route('/testRequest', name: 'testRequest')]
    public function testRequest(Request $request): Response
    {
        $ip = $request->getClientIp();
        
        return new Response(
            "<html><body>IP: {$ip}</body></html>"
        );
    }
	

    #[Route('/sesion1', name: 'sesion1')]
    public function sesion1(SessionInterface $session): Response
    {
        // Guardamos el valor en la sesión del servidor
        $session->set('variable', 100);

        return $this->redirectToRoute('sesion2');
    }

    #[Route('/sesion2', name: 'sesion2')]
    public function sesion2(SessionInterface $session): Response
    {
        // Recuperamos el valor (el segundo parámetro es el valor por defecto si no existe)
        $var = $session->get('variable', 'No hay valor en sesión');

        return new Response("<html><body> Valor en sesión: {$var}</body></html>");
    }
}
?>
