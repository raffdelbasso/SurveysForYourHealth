<?php
    require_once '../Data/DBHandler.class.php';
    require_once '../Data/DBQuery.class.php';
    spl_autoload_register(function ($class) {
        require_once  $class . '.class.php';
    });
        
    class GestoreQuestionario{
        public function __construct() {
            
        }
        
        public function mostraQuestionari() {
            $questionari = array();
            $sql = DBQuery::mostraQuestionari();
            $recordSet = DBHandler::getAll($sql);
            if (count($recordSet) != 0) {
                for ($i=0; $i<count($recordSet); $i++) {
                    array_push($questionari, new Questionario($recordSet[$i][0], $recordSet[$i][1]));
                }
                return $questionari;
            } else {
                return null;
            }
        }

        public function cercaQuestionarioPerId($id) {
            $sql = DBQuery::cercaQuestionarioPerId($id);
            $questionario = DBHandler::getRow($sql);
            return new Questionario($questionario[0], $questionario[1]);
        }

        public function riempiQuestionario($questionarioVecchio, $sessoFiglio) {
            $questionario = new Questionario($questionarioVecchio->getIdQuestionario(), $questionarioVecchio->getNome());
            $sql = DBQuery::mostraDomande($questionario->getIdQuestionario(), $sessoFiglio);
            $recordSet = DBHandler::getAll($sql);
            for ($i=0; $i<count($recordSet); $i++) {
                $domanda = new Domanda($recordSet[$i][2], $recordSet[$i][3]);
                $questionario->addDomanda($domanda);
                $sql = DBQuery::mostraOpzioni($domanda->getIdDomanda());
                $recordSet2 = DBHandler::getAll($sql);
                for ($j=0; $j<count($recordSet2); $j++) {
                    $opzione = new Opzione($recordSet2[$j][0], $recordSet2[$j][1], $recordSet[$j][2]);
                    $questionario->getDomandaAt($i)->addOpzione($opzione);
                }
            }
            return $questionario;
        }
    }
?>