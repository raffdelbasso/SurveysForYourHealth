# S.F.Y.H. - Surverys For Your Health
Il software offre uno strumento semplice per determinare precocemente se un bambino può sviluppare autismo e quindi se ha bisogno o meno dell’analisi di un professionista.
## Procedura di installazione
### 1. Software necessari
* [XAMPP](https://www.apachefriends.org/it/index.html)
* [Git](https://git-scm.com/download/)
### 2. Download del software
Apri la Git Bash e clona l'intero progetto nella cartella C:\xampp\htdocs usando i seguenti comandi nel terminale:
```
cd C:\xampp\htdocs
```
```
git clone https://github.com/raffdelbasso/SurveysForYourHealth
```
### 3. Creazione del database
Avvia il servizio di MySQL dal pannello di controllo di XAMPP (cliccando su "Start" in corrispondenza di MySQL) ed esegui gli script di creazione del database digitando i seguenti comandi nella shell (disponibile sulla destra del pannello di controllo di XAMPP):
```
mysql -u root
```
```
source C:\xampp\htdocs\SurveysForYourHealth\sql\dbpsicologhe.sql
```
```
source C:\xampp\htdocs\SurveysForYourHealth\sql\storedProcedures.sql
```
### 4. Apertura del software
Avvia il servizio di Apache dal pannello di controllo di XAMPP (cliccando su "Start" in corrispondenza di Apache), apri un browser qualsiasi e recati al seguente indirizzo:
```
localhost/SurveysForYourHealth/www/Presentation/login.php
```
