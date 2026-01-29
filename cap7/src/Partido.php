<?php
// src/Partido.php
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="PartidoRepository")
 * @ORM\Table(name="partido")
 **/
class Partido
{
	/** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
    private $id;
    	/**
         * @ORM\ManyToOne(targetEntity="Equipo")
         * @ORM\JoinColumn(name="local", referencedColumnName="id")
         **/
	private $local;
    	/**
         * @ORM\ManyToOne(targetEntity="Equipo")
         * @ORM\JoinColumn(name="visitante", referencedColumnName="id")
         **/
	private $visitante;
    	/** @ORM\Column(type="integer") **/
	private $goles_local;
    	/** @ORM\Column(type="integer") **/
	private $goles_visitante;
    /** @ORM\Column(type="date") **/
	private $fecha;
    
	
	public function getId()
    {
        return $this->id;
    }

    public function getLocal()
    {
        return $this->local;
    }

    public function setLocal($local)
    {
        $this->local = $local;
    }
	public function getVisitante()
    {
        return $this->visitante;
    }

    public function setVisitante($visitante)
    {
        $this->visitante = $visitante;
    }
	public function getGolesLocal()
    {
        return $this->goles_local;
    }

    public function setGolesLocal($goles_local)
    {
        $this->goles_local = $goles_local;
    }
	public function getGolesVisitante()
    {
        return $this->goles_visitante;
    }

    public function setGolesVisitante($goles_visitante)
    {
        $this->goles_visitante = $goles_visitante;
    }
	public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha)
    {
        $this->fecha = $fecha;
    }			
}
	