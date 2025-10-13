<?php 
function ecuaciones($numeroA,$numeroB,$numeroC){
    $soluciones = [];

        if(!is_numeric($numeroA)||!is_numeric($numeroB)||!is_numeric($numeroC)){
            throw new Exception("Los valores de a, b y c deben ser numericos");
        }
        $discriminante = ($numeroB**2) - (4*$numeroA*$numeroC);
        if($discriminante > 0){
            $solucion1 = (-$numeroB + sqrt($discriminante)) / (2*$numeroA);
            $solucion2 = (-$numeroB - sqrt($discriminante)) / (2*$numeroA);
            $soluciones[] = "La solución 1 es: ".$solucion1;
            $soluciones[] = "La solución 2 es: ".$solucion2;
            return $soluciones;

        }elseif($discriminante == 0){
            $solucionUnica = -$numeroB / (2*$numeroA);
            $soluciones[] = "Solo hay una solución: ".$solucionUnica;
            return $soluciones;
        }else{
         throw new Exception("No hay soluciones reales");
        }
}
?>
