use dbpsicologhe;

DELIMITER $$
drop procedure if exists effettuaLogin$$
create procedure if not exists effettuaLogin (in email varchar(255), in password char(32))
select *
from utenti
where utenti.email = email and
	  utenti.password = password$$
DELIMITER ;

DELIMITER $$
drop procedure if exists cercaUtentePerEmail$$
create procedure if not exists cercaUtentePerEmail (in email varchar(255))
select *
from utenti
where utenti.email = email$$
DELIMITER ;

DELIMITER $$
drop procedure if exists registraUtente$$
create procedure if not exists registraUtente (in cognome varchar(50), in nome varchar(50), in email varchar(255), in password char(32), in tipoUtente int, in codPediatra int)
insert into utenti(utenti.cognome, utenti.nome, utenti.email, utenti.password, utenti.tipoUtente, utenti.codPediatra) values
(cognome, nome, email, password, tipoUtente, codPediatra)$$
DELIMITER ;

DELIMITER $$
drop procedure if exists modificaUtente$$
create procedure if not exists modificaUtente (in idUtente int, in nuovoCognome varchar(50), in nuovoNome varchar(50), in nuovaEmail varchar(255), in nuovaPassword char(32), in nuovoPediatra int)
update utenti
set cognome = nuovoCognome,
nome = nuovoNome,
email = nuovaEmail,
password = nuovaPassword,
codPediatra = nuovoPediatra
where utenti.idUtente = idUtente$$
DELIMITER ;

DELIMITER $$
drop procedure if exists mostraPediatri$$
create procedure if not exists mostraPediatri ()
select *
from utenti
where tipoUtente = 3$$
DELIMITER ;

DELIMITER $$
drop procedure if exists mostraQuestionari$$
create procedure if not exists mostraQuestionari ()
select *
from questionari$$
DELIMITER ;

DELIMITER $$
drop procedure if exists cercaQuestionarioPerId$$
create procedure if not exists cercaQuestionarioPerId(in idQuestionario int)
select *
from questionari
where questionari.idQuestionario = idQuestionario$$
DELIMITER ;

DELIMITER $$
drop procedure if exists mostraDomande$$
create procedure if not exists mostraDomande (in idQuestionario int)
select *
from questionari, domande
where questionari.idQuestionario = codQuestionario and
	  codQuestionario = idQuestionario$$
DELIMITER ;

DELIMITER $$
drop procedure if exists mostraOpzioni$$
create procedure if not exists mostraOpzioni (in idDomanda int)
select idOpzioneInDomanda, opzioni.testo, punteggio
from opzioni, domande, opzioniInDomande
where codDomanda = domande.idDomanda and
	  idOpzione = codOpzione and
	  domande.idDomanda = idDomanda$$
DELIMITER ;

DELIMITER $$
drop procedure if exists inserisciQuestionario$$
create procedure if not exists inserisciQuestionario (in nome varchar(100))
insert into questionari(questionari.nome) values
(nome)$$
DELIMITER ;

DELIMITER $$
drop procedure if exists inserisciDomanda$$
create procedure if not exists inserisciDomanda (in testo varchar(255), in immagine varchar(255), in codQuestionario int)
insert into domande(domande.testo, domande.immagine, domande.codQuestionario) values
(testo, immagine, codQuestionario)$$
DELIMITER ;

DELIMITER $$
drop procedure if exists inserisciOpzione$$
create procedure if not exists inserisciOpzione (in testo varchar(50), in punteggio int, in codDomanda int)
insert into opzioni(opzioni.testo, opzioni.punteggio, opzioni.codDomanda) values
(testo, punteggio, codDomanda)$$
DELIMITER ;

DELIMITER $$
drop procedure if exists registraRisposta$$
create procedure if not exists registraRisposta(in dataOra datetime, in codFiglio int, in codOpzioneInDomanda int)
insert into risposte(risposte.dataOra, risposte.codFiglio, risposte.codOpzioneInDomanda) values
(dataOra, codFiglio, codOpzioneInDomanda)$$
DELIMITER ;

DELIMITER $$
drop procedure if exists numeroFigli$$
create procedure if not exists numeroFigli(in idUtente int)
select count(*)
from utenti, figli
where utenti.idUtente = codUtente and utenti.idUtente = idUtente$$
DELIMITER ;

DELIMITER $$
drop procedure if exists mostraFigli$$
create procedure if not exists mostraFigli(in idUtente int)
select idFiglio, figli.nome, figli.cognome
from utenti, figli
where utenti.idUtente = codUtente and utenti.idUtente = idUtente$$
DELIMITER ;

DELIMITER $$
drop procedure if exists registraFiglio$$
create procedure if not exists registraFiglio(in cognome varchar(50), in nome varchar(50), in dataNascita date, in codUtente int)
insert into figli(figli.cognome, figli.nome, figli.dataNascita, figli.codUtente) values
(cognome, nome, dataNascita, codUtente)$$
DELIMITER ;

DELIMITER $$
drop procedure if exists verificaPassword$$
create procedure if not exists verificaPassword(in idUtente int, in password char(32))
select *
from utenti
where utenti.idUtente = idUtente and
	  utenti.password = password$$
DELIMITER ;

DELIMITER $$
drop procedure if exists calcolaPunteggioCritico$$
create procedure if not exists calcolaPunteggioCritico(in idFiglio int, in dataOra datetime)
select sum(punteggio)
from risposte, opzioniInDomande
where idOpzioneInDomanda = codOpzioneInDomanda and
	  codDomanda in(2, 7, 9, 13, 14, 15) and risposte.dataOra = dataOra and
	  risposte.codFiglio = idFiglio$$
DELIMITER ;

DELIMITER $$
drop procedure if exists calcolaPunteggioTotale$$
create procedure if not exists calcolaPunteggioTotale(in idFiglio int, in dataOra datetime)
select sum(punteggio)
from risposte, opzioniInDomande
where idOpzioneInDomanda = codOpzioneInDomanda and
	  risposte.dataOra = dataOra and
	  risposte.codFiglio = idFiglio$$
DELIMITER ;