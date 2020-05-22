<?php
class Domanda {
    private $idDomanda;
    private $testo;
    private $immagine;
	private $opzioni;
    
    public function __construct($idDomanda, $testo, $immagine){
        $this->idDomanda = $idDomanda;
        $this->testo = $testo;
        $this->immagine = $immagine;
		$opzioni = array();
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
		array_push($opzioni, $opzione);
	}
	
	public function getOpzioneAt($i) {
		return $opzioni[$i];
	}
	
	public function numOpzioni() {
		return count($opzioni);
	}
}
?>