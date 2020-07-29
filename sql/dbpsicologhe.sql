drop database if exists dbpsicologhe;
create database if not exists dbpsicologhe;
use dbpsicologhe;
SET NAMES 'utf8';
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
    testo varchar(50) not null
);

create table opzioniInDomande(
    idOpzioneInDomanda int primary key auto_increment,
    punteggio int not null,
    codDomanda int not null,
    foreign key(codDomanda) references domande(idDomanda),
    codOpzione int not null,
    foreign key(codOpzione) references opzioni(idOpzione)
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
    dataOra datetime not null,
    codFiglio int not null,
    foreign key(codFiglio) references figli(idFiglio),
    codOpzioneInDomanda int not null,
    foreign key(codOpzioneInDomanda) references opzioniInDomande(idOpzioneInDomanda)
);

-- Questionario n.1: M-CHAT
insert into questionari(nome) values
("M-CHAT: Modified Checklist for Autism in Toddlers");

insert into domande(testo, codQuestionario) values
("Vostro figlio si diverte ad essere dondolato o a saltare sulle vostre ginocchia?", 1),
("Vostro figlio s'interessa agli altri bambini?", 1),
("A vostro figlio piace arrampicarsi sulle cose o sulle scale?", 1),
("Vostro figlio si diverte a giocare al gioco del CU-CU o a nascondino?", 1),
("Vostro figlio gioca mai a far finta? Per esempio fa finta di parlare al telefono o di accudire una bambola o altro?", 1),
("Vostro figlio usa mai l'indicare col dito indice per chiedere qualcosa?", 1),
("Vostro figlio usa mai l'indicare col dito indice per segnalare interesse in qualcosa?", 1),
("Vostro figlio riesce a giocare in modo appropriato con piccoli giocattoli (ad esempio macchinine o cubi) e non solo portarli alla bocca o farli cadere", 1),
("Vostro figlio vi porta mai oggetti per mostrarvi qualcosa?", 1),
("Vostro figlio vi guarda negli occhi per più di un secondo o due?", 1),
("Vostro figlio sembra mai ipersensibile ai rumori (ad es. tappandosi le orecchie)?", 1),
("Vostro figlio sorride in risposta alla vostra faccia o al vostro sorriso?", 1),
("Vostro figlio vi imita? (Ad esempio se fate una faccia lui cerca di imitarla?)", 1),
("Vostro figlio risponde al suo nome quando lo chiamate senza essere visti?", 1),
("Se indicate con il dito indice un giocattolo dalla parte opposta della stanza, vostro figlio lo guarda?", 1),
("Vostro figlio cammina?", 1),
("Vostro figlio guarda le cose a cui voi state guardando?", 1),
("Vostro figlio fa movimenti inusuali con le dita davanti alla sua faccia?", 1),
("Vostro figlio cerca di attirare la vostra attenzione su una sua attività?", 1),
("Vi siete mai chiesti se vostro figlio potesse essere sordo?", 1),
("Vostro figlio capisce ciò che dicono le persone?", 1),
("Vostro figlio qualche volta fissa lo sguardo nel vuoto o girovaga senza scopo?", 1),
("Vostro figlio vi guarda in faccia per capire quale è la vostra reazione di fronte a qualcosa di non familiare?", 1);

insert into opzioni(testo) values
("Si'"),
("No");

insert into opzioniInDomande(punteggio, codDomanda, codOpzione) values
(0, 1, 1),
(1, 1, 2),
(0, 2, 1),
(1, 2, 2),
(0, 3, 1),
(1, 3, 2),
(0, 4, 1),
(1, 4, 2),
(0, 5, 1),
(1, 5, 2),
(0, 6, 1),
(1, 6, 2),
(0, 7, 1),
(1, 7, 2),
(0, 8, 1),
(1, 8, 2),
(0, 9, 1),
(1, 9, 2),
(0, 10, 1),
(1, 10, 2),
(1, 11, 1),
(0, 11, 2),
(0, 12, 1),
(1, 12, 2),
(0, 13, 1),
(1, 13, 2),
(0, 14, 1),
(1, 14, 2),
(0, 15, 1),
(1, 15, 2),
(0, 16, 1),
(1, 16, 2),
(0, 17, 1),
(1, 17, 2),
(1, 18, 1),
(0, 18, 2),
(0, 19, 1),
(1, 19, 2),
(1, 20, 1),
(0, 20, 2),
(0, 21, 1),
(1, 21, 2),
(1, 22, 1),
(0, 22, 2),
(0, 23, 1),
(1, 23, 2);

-- Questionario n.2: ...
insert into questionari(nome) values
("Indicatori di abuso sessuale sui minori");

insert into domande(testo, codQuestionario) values
("Il/la bambino/a dimostra conoscenze anomale per l'età di aspetti della sessualità adulta in bambini?", 2),
("Il/la bambino/a ha una certa tendenza all'erotizzazione dei rapporti come mezzo di socializzazione e per dare e ricevere affetto?", 2),
("Il/la bambino/a avanza richieste di tipo sessuale agli adulti?", 2),
("Il/la bambino/a è alla ricerca compulsiva di giochi sessualizzati?", 2),
("Il/la bambino/a è ideatore o partecipe dell'iniziazione sessuale di bambini più piccoli?", 2),
("Il/la bambino/a crea disegni a contenuto sessuale?", 2),
("Si osserva masturbazione compulsiva nel/la bambino/a?", 2),
("Il/la bambino/a inserisce in vagina o nell'ano corpi?", 2),
("Il/la bambino/a riporta arrossamenti, lividi, escoriazioni in area genitale e/o anale?", 2),
("La bambina riporta perdite vaginali?", 2),
("Sono presenti lividi sulle cosce e sulle braccia del/la bambino/a causati da contenzione manuale, da corde, ecc.?", 2),
("Il/la bambino/a presenta difficoltà a camminare o a sedersi?", 2),
("Il/la bambino/a lamenta o riferisce dolore, bruciore dell'area ano-genitale?", 2),
("Il/la bambino/a mostra ritardi nello sviluppo fisico?", 2);

insert into opzioniInDomande(punteggio, codDomanda, codOpzione) values
(1, 24, 1),
(0, 24, 2),
(1, 25, 1),
(0, 25, 2),
(1, 26, 1),
(0, 26, 2),
(1, 27, 1),
(0, 27, 2),
(1, 28, 1),
(0, 28, 2),
(1, 29, 1),
(0, 29, 2),
(1, 30, 1),
(0, 30, 2),
(1, 31, 1),
(0, 31, 2),
(1, 32, 1),
(0, 32, 2),
(1, 33, 1),
(0, 33, 2),
(1, 34, 1),
(0, 34, 2),
(1, 35, 1),
(0, 35, 2),
(1, 36, 1),
(0, 36, 2),
(1, 37, 1),
(0, 37, 2);