drop database if exists dbpsicologhe;
create database if not exists dbpsicologhe;
use dbpsicologhe;

create table questionari (
    idQuestionario int primary key not null auto_increment,
    nome varchar(100) not null 
);

create table domande(
    idDomanda int not null primary key auto_increment,
    testo varchar(255) not null,
    immagine varchar(255),
    codQuestionario int not null, 
    foreign key(codQuestionario) references questionari(idQuestionario)
);

create table opzioni(
    idOpzione int primary key auto_increment,
    testo varchar(50) not null, 
    punteggio int not null, 
    codDomanda int not null, 
    foreign key(codDomanda) references domande(idDomanda)
);

create table utenti(
    idUtente int not null primary key auto_increment,
    cognome varchar(50) not null,
    nome varchar(50) not null,
    email varchar(255) not null,
    password char(32) not null,
    tipoUtente int not null,
    codPediatra int,
    foreign key(codPediatra) references utenti(idUtente)
);

create table figli(
    idFiglio int not null primary key auto_increment,
    cognome varchar(50) not null,
    nome varchar(50) not null,
    dataNascita date not null,
    codUtente int not null,
    foreign key(codUtente) references utenti(idUtente)
);

create table risposte(
    idRisposta int not null primary key auto_increment,
    dataOra timestamp not null,
    codUtente int not null,
    foreign key(codUtente) references utenti(idUtente),
    codOpzione int not null,
    foreign key(codOpzione) references opzioni(idOpzione)
);

/*
insert into questionari (nome) values 
('Test per l\'autismo');

insert into domande(testo, codQuestionario) values 
('Vostro figlio si diverte ad essere dondolato o a saltare sulle vostre ginocchia?', 1),
('Vostro figlio s''interessa agli altri bambini?', 1),
('A vostro figlio piace arrampicarsi sulle cose o sulle scale?', 1),
('Vostro figlio si diverte a giocare al gioco del CU-CU o a nascondino?', 1),
('Vostro figlio gioca mai a far finta? Per esempio fa finta di parlare al telefono o di accudire una bambola o altro?', 1),
('Vostro figlio, usa mai l''idicatore col dito indice per chiedere qualcosa?', 1),
('Vostro figlio usa mai l''indicatore con il dito indice per segnalare interesse in qualcosa', 1),
('Vostro figlio riesce a giocare in modo appropriato con piccoli giocattoli (ad esempio macchine o cubi) e non solo portarli alla bocca o farli cadere?', 1),
('Vostro figlio vi porta mai oggetti per mostrarvi qualcosa?', 1),
('Vostro figlio vi guarda negli occhi per più di un secondo o due?', 1),
('Vostro figlio sembra mai ipersensibile ai rumori (ad es.tappandosi le orecchie)?', 1),
('Vostro figlio sorride in risposta alla vostra alla vostra faccia o al vostro sorriso?', 1),
('Vostro figlio vi imita? (Ad esempio se fate una faccia lui cerca di imitarla?)', 1),
('Vostro figlio risponde al suo nome quando lo chimate senza essere visti?', 1),
('Se indicate con il dito indice un giocattolo dalla parte opposta della stanza, vostro figlio lo guarda?', 1),
('Vostro figlio cammina?', 1),
('Vostro figlio guarda le cose a cui voi state guardando?', 1),
('Vostro figlio fa movimenti inusuali con le dita davanti alla sua faccia?', 1),
('Vostro figlio cerca di attirare la vostra attenzione su una attività?', 1),
('Vi siete mai chiesti mai chiesti se vostro figlio potessere essere sordo?', 1),
('Vostro figlio capisce ciò che dicono le persone?', 1),
('Vostro figlio qualche volta fissa lo sguardo nel vuoto o girovaga senza scopo?', 1),
('Vostro figlio vi guarda in faccia per capire quale è la vostra reazione di fronte a qualcosa di non familiare?', 1);

insert into opzioni (testo, punteggio, codDomanda) values 
('Si o No?', 1,1),
('Si o No?', 2,2),
('Si o No?', 1,3),
('Si o No?', 1,4),
('Si o No?', 1,5),
('Si o No?', 1,6),
('Si o No?', 2,7),
('Si o No?', 1,8),
('Si o No?', 2,9),
('Si o No?', 1,10),
('Si o No?', 1,11),
('Si o No?', 1,12),
('Si o No?', 2,13),
('Si o No?', 2,14),
('Si o No?', 2,15),
('Si o No?', 1,16),
('Si o No?', 1,17),
('Si o No?', 1,18),
('Si o No?', 1,19),
('Si o No?', 1,20),
('Si o No?', 1,21),
('Si o No?', 1,22),
('Si o No?', 1,23);
*/