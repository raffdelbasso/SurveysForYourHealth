<?php
class Domanda {
    private $idDomanda;
    private $testo;
    private $immagine;
	private $opzioni;
    
    public function __construct($idDomanda, $testo){
        $this->idDomanda = $idDomanda;
        $this->testo = $testo;
		$this->opzioni = array();
    }
    
    public function getIdDomanda() {
        return $this->idDomanda;
    }
    
    public function getTesto() {
        return $this->testo;
    }
    
    public function getImmagine() {
        return $this->immagine;
    }

    public function setIdDomanda($idDomanda) {
        $this->idDomanda = $idDomanda;
    }

    public function setTesto($testo) {
        $this->testo = $testo;
    }

    public function setImmagine($immagine) {
        $this->immagine = $immagine;
    }
	
	public function addOpzione($opzione) {
		array_push($this->opzioni, $opzione);
	}
	
	public function getOpzioneAt($i) {
		return $this->opzioni[$i];
	}
	
	public function numOpzioni() {
		return count($this->opzioni);
	}
}
?>