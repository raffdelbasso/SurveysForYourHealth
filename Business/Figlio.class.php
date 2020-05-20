<?php
class Genitore {
	private $idFiglio;
	private $cognome;
	private $nome;
	private $genitore;
    
    public function __construct($idFiglio, $cognome, $nome, $genitore){
        $this->idFiglio = $idFiglio;
        $this->cognome = $cognome;
        $this->nome = $nome;
		$this->genitore = $genitore;
    }
    
	public function getIdFiglio(){
		return $this->idFiglio;
	}

	public function setIdFiglio($idFiglio){
		$this->idFiglio = $idFiglio;
	}

	public function getCognome(){
		return $this->cognome;
	}

	public function setCognome($cognome){
		$this->cognome = $cognome;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getGenitore(){
		return $this->genitore;
	}

	public function setGenitore($genitore){
		$this->genitore = $genitore;
	}
    
}
?>