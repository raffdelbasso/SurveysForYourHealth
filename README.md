# S.F.Y.H. - Surverys For Your Health
Il software offre uno strumento semplice per determinare precocemente se un bambino può sviluppare autismo e quindi se ha bisogno o meno dell’analisi di un professionista.
## Procedura di installazione
### 1. Software necessari
* [XAMPP](https://www.apachefriends.org/it/index.html)
### 2. Download del software
Clona il progetto nella cartella C:\xampp\htdocs usando i seguenti comandi nel terminale:
```
cd C:\xampp\htdocs
```
```
git clone https://github.com/raffdelbasso/psicologhe5IA
```
### 3. Creazione del database
Avvia il servizio di MySQL dal pannello di controllo di XAMPP ed esegui gli script di creazione del database digitando i seguenti comandi nel terminale:
```
mysql -u root
```
```
source C:\xampp\htdocs\psicologhe5IA\sql\dbpsicologhe.sql
```
```
source C:\xampp\htdocs\psicologhe5IA\sql\storedProcedures.sql
```
### 4. Apertura del software
Avvia il servizio di Apache dal pannello di controllo di XAMPP, apri un browser e recati al seguente indirizzo:
```
localhost/psicologhe5IA/www/Presentation/index.php
```
