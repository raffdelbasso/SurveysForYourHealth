<?php
class Libro{
    private $idLibro;
    private $titolo;
    private $annoAcquisto;
    private $prezzo;
    private $Autore;
    
    public function __construct($idLibro, $titolo, $annoAcquisto, $prezzo, $Autore){
        $this->idLibro = $idLibro;
        $this->titolo = $titolo;
        $this->annoAcquisto = $annoAcquisto;
        $this->prezzo = $prezzo;
        $this->Autore = $Autore;
    }
    
    public function getIdLibro()
    {
        return $this->idLibro;
    }

    public function getTitolo()
    {
        return $this->titolo;
    }

    public function getAnnoAcquisto()
    {
        return $this->annoAcquisto;
    }

    public function getPrezzo()
    {
        return $this->prezzo;
    }

    public function getAutore()
    {
        return $this->Autore;
    }

    public function setIdLibro($idLibro)
    {
        $this->idLibro = $idLibro;
    }

    public function setTitolo($titolo)
    {
        $this->titolo = $titolo;
    }

    public function setAnnoAcquisto($annoAcquisto)
    {
        $this->annoAcquisto = $annoAcquisto;
    }

    public function setPrezzo($prezzo)
    {
        $this->prezzo = $prezzo;
    }

    public function setAutore($Autore)
    {
        $this->Autore = $Autore;
    }
}
?>