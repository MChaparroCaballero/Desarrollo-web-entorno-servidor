<?php
// src/PartidoRepository.php
use Doctrine\ORM\EntityRepository;
class PartidoRepository extends EntityRepository{
/* devuelve una colección con los partidos completos, -1 si no encuentra
el equipo*/
public function findAllPartidosCompletos() 
    {
        $em = $this->getEntityManager();

        // Consulta sin WHERE para traer todo
        $query = $em->createQuery(
            "SELECT p, l, v
             FROM Partido p
             JOIN p.local l
             JOIN p.visitante v"
        );

        // getResult devuelve un array (lista), ideal para el foreach
        return $query->getResult(); 
    }
}
?>