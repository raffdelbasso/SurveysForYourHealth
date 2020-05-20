<?php
class Utente {
	private $idUtente;
	private $cognome;
	private $nome;
	private $email;
	private $tipoUtente;
    
    public function __construct($idUtente, $cognome, $nome, $email, $tipoUtente){
        $this->idUtente = $idUtente;
        $this->cognome = $cognome;
        $this->nome = $nome;
		$this->email = $email;
		$this->tipoUtente = $tipoUtente;
    }
    
	public function getIdUtente(){
		return $this->idUtente;
	}

	public function setIdUtente($idUtente){
		$this->idUtente = $idUtente;
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

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getTipoUtente(){
		return $this->tipoUtente;
	}
    
}
?>