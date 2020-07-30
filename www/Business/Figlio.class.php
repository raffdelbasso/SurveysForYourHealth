<?php
class Figlio {
	private $idFiglio;
	private $cognome;
	private $nome;
	private $sesso;
    
    public function __construct($idFiglio, $cognome, $nome, $sesso){
        $this->idFiglio = $idFiglio;
        $this->cognome = $cognome;
		$this->nome = $nome;
		$this->sesso = $sesso;
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

	public function getSesso(){
		return $this->sesso;
	}

	public function setSesso($sesso){
		$this->sesso = $sesso;
	}
    
}
?>