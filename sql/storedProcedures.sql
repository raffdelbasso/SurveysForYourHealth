use dbpsicologhe;

DELIMITER $$
create procedure effettuaLogin (in email varchar(255), in password char(32))
select *
from utenti
where utenti.email = email and
	  utenti.password = password$$
DELIMITER ;

DELIMITER $$
create procedure cercaUtentePerEmail (in email varchar(255))
select *
from utenti
where utenti.email = email$$
DELIMITER ;

DELIMITER $$
create procedure registraUtente (in cognome varchar(50), in nome varchar(50), in email varchar(255), in password char(32), in tipoUtente int)
insert into utenti(utenti.cognome, utenti.nome, utenti.email, utenti.password, utenti.tipoUtente) values
(cognome, nome, email, password, tipoUtente)$$
DELIMITER ;

DELIMITER $$
create procedure mostraPediatri ()
select *
from utenti
where tipoUtente = 3$$
DELIMITER ;