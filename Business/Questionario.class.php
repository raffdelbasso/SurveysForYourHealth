<?php
class Questionario {
    private $idQuestionario;
    private $nome;
    
    public function __construct($idQuestionario){
        $this->idQuestionario = $idQuestionario;
        $this->nome = $nome;
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
    
}
?>