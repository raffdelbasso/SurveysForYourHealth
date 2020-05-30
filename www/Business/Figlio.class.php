<?php
class Figlio {
	private $idFiglio;
	private $cognome;
	private $nome;
    
    public function __construct($idFiglio, $cognome, $nome){
        $this->idFiglio = $idFiglio;
        $this->cognome = $cognome;
        $this->nome = $nome;
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
    
}
?>