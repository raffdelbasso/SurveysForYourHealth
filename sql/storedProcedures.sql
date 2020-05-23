use dbpsicologhe;

DELIMITER $$
create procedure if not exists effettuaLogin (in email varchar(255), in password char(32))
select *
from utenti
where utenti.email = email and
	  utenti.password = password$$
DELIMITER ;

DELIMITER $$
create procedure if not exists cercaUtentePerEmail (in email varchar(255))
select *
from utenti
where utenti.email = email$$
DELIMITER ;

DELIMITER $$
create procedure if not exists registraUtente (in cognome varchar(50), in nome varchar(50), in email varchar(255), in password char(32), in tipoUtente int, in codPediatra int)
insert into utenti(utenti.cognome, utenti.nome, utenti.email, utenti.password, utenti.tipoUtente, utenti.codPediatra) values
(cognome, nome, email, password, tipoUtente, codPediatra)$$
DELIMITER ;

DELIMITER $$
create procedure if not exists mostraPediatri ()
select *
from utenti
where tipoUtente = 3$$
DELIMITER ;

DELIMITER $$
create procedure if not exists mostraQuestionari ()
select *
from questionari$$
DELIMITER ;

DELIMITER $$
create procedure if not exists mostraDomande (in idQuestionario int)
select *
from questionari, domande
where questionari.idQuestionario = codQuestionario and
	  codQuestionario = idQuestionario$$
DELIMITER ;

DELIMITER $$
create procedure if not exists inserisciQuestionario (in nome varchar(100))
insert into questionari(questionari.nome) values
(nome)$$
DELIMITER ;

DELIMITER $$
create procedure if not exists inserisciDomanda (in testo varchar(255), in immagine varchar(255), in codQuestionario int)
insert into domande(domande.testo, domande.immagine, domande.codQuestionario) values
(testo, immagine, codQuestionario)$$
DELIMITER ;