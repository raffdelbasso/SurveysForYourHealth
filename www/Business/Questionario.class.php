<?php
class Questionario {
    private $idQuestionario;
    private $nome;
	private $domande;
    
    public function __construct($idQuestionario, $nome){
        $this->idQuestionario = $idQuestionario;
        $this->nome = $nome;
        $this->domande = array();
    }
    
    public function getIdQuestionario() {
        return $this->idQuestionario;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setIdQuestionario($idQuestionario) {
        $this->idQuestionario = $idQuestionario;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
	
	public function addDomanda($domanda) {
		array_push($this->domande, $domanda);
	}
	
	public function getDomandaAt($i) {
		return $this->domande[$i];
	}
	
	public function numDomande() {
		return count($this->domande);
	}
    
}
?>