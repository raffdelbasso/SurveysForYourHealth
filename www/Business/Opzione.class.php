<?php
class Opzione {
    private $idOpzione;
    private $testo;
    private $punteggio;
    
    public function __construct($idOpzione, $testo, $punteggio){
        $this->idOpzione = $idOpzione;
        $this->testo = $testo;
        $this->punteggio = $punteggio;
    }
    
    public function getIdOpzione(){
		return $this->idOpzione;
	}

	public function setIdOpzione($idOpzione){
		$this->idOpzione = $idOpzione;
	}

	public function getTesto(){
		return $this->testo;
	}

	public function setTesto($testo){
		$this->testo = $testo;
	}

	public function getPunteggio(){
		return $this->punteggio;
	}

	public function setPunteggio($punteggio){
		$this->punteggio = $punteggio;
	}
}
?>