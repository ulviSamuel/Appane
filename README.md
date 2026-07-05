# Appane

![PHP](https://img.shields.io/badge/PHP-Web%20Application-777BB4?logo=php&logoColor=white)
![Stato](https://img.shields.io/badge/Stato-Progetto%20scolastico-orange)
![Anno](https://img.shields.io/badge/Anno-2023-lightgrey)
![Frontend](https://img.shields.io/badge/Frontend-HTML%20%2B%20CSS-blue)

**Appane** è un progetto scolastico realizzato nel **2023**: una web application in **PHP** per la consultazione di un menù, visualizzazione prodotti, autenticazione utenti e gestione di un **carrello** con conferma ordine.

Il progetto integra pagine informative, area autenticazione (login/registrazione), dettaglio prodotto, aggiunta/rimozione dal carrello e flusso di conferma ordine.

---

## Indice

- [Descrizione](#descrizione)
- [Funzionalità](#funzionalità)
- [Struttura del progetto](#struttura-del-progetto)
- [Architettura](#architettura)
- [Tecnologie utilizzate](#tecnologie-utilizzate)
- [Flusso utente](#flusso-utente)
- [Configurazione](#configurazione)
- [Esecuzione del progetto](#esecuzione-del-progetto)
- [Note sul progetto](#note-sul-progetto)
- [Possibili miglioramenti futuri](#possibili-miglioramenti-futuri)
- [Autore](#autore)
- [Licenza](#licenza)

---

## Descrizione

L’obiettivo del progetto è simulare un sito/applicazione web orientata alla ristorazione, dove l’utente può:

- visualizzare il menù settimanale;
- consultare dettagli dei prodotti;
- registrarsi ed effettuare login;
- aggiungere prodotti al carrello;
- rimuovere prodotti dal carrello;
- confermare un ordine.

Sono presenti anche sezioni informative come homepage e pagina dedicata ai valori del progetto.

---

## Funzionalità

Il gestionale web permette di svolgere le principali operazioni lato utente:

- navigazione homepage;
- visualizzazione menù settimanale;
- visualizzazione dettaglio prodotto;
- autenticazione utente;
- registrazione nuovo utente;
- inserimento dati (pagina dedicata);
- aggiunta prodotto al carrello;
- visualizzazione carrello;
- rimozione prodotto dal carrello;
- conferma ordine;
- pagina informativa “I nostri valori”.

---

## Struttura del progetto

```text
Appane/
│
├── Codice/
│   ├── index.php
│   ├── index.html
│   ├── menu_settimana.php
│   ├── dettagli_prodotto.php
│   ├── carrello.php
│   ├── aggiungi_al_carrello.php
│   ├── rimuovi_prodotto_carrello.php
│   ├── conferma_ordine.php
│   ├── auth.php
│   ├── login.php
│   ├── registrati.php
│   ├── InserimentoDati.php
│   ├── i_nostri_valori.php
│   ├── variabili_connessione.php
│   ├── css/
│   └── img/
│
├── Storyboard/
│   └── storyboard appane.drawio
│
└── .gitattributes
```

---

## Architettura

Il progetto è organizzato con una separazione pratica tra pagine, logica operativa e risorse statiche.

### Pagine principali

- `index.php` / `index.html`: ingresso applicazione;
- `menu_settimana.php`: visualizzazione menù;
- `dettagli_prodotto.php`: dettaglio singolo prodotto;
- `i_nostri_valori.php`: contenuto informativo.

### Autenticazione

- `auth.php`: logica di autenticazione;
- `login.php`: interfaccia/accesso utente;
- `registrati.php`: registrazione nuovi utenti.

### Carrello e ordini

- `aggiungi_al_carrello.php`: aggiunta elementi;
- `carrello.php`: visualizzazione contenuto carrello;
- `rimuovi_prodotto_carrello.php`: rimozione elemento;
- `conferma_ordine.php`: conferma finale ordine.

### Supporto e configurazione

- `InserimentoDati.php`: gestione/inserimento dati;
- `variabili_connessione.php`: variabili di connessione;
- `css/`: fogli di stile;
- `img/`: immagini del progetto.

---

## Tecnologie utilizzate

- **PHP** (logica lato server)
- **HTML** (struttura delle pagine)
- **CSS** (stile e layout)
- **Hack** (presenza marginale nel repository)
- **Storyboard Draw.io** per progettazione flusso

Composizione linguaggi repository:

- PHP: **63.2%**
- CSS: **31.8%**
- Hack: **2.8%**
- HTML: **2.2%**

---

## Flusso utente

Un flusso tipico dell’applicazione è il seguente:

1. accesso alla homepage;
2. consultazione menù settimanale;
3. apertura dettagli prodotto;
4. login/registrazione (se necessario);
5. aggiunta prodotti al carrello;
6. revisione/rimozione prodotti dal carrello;
7. conferma ordine.

---

## Configurazione

Il file `variabili_connessione.php` contiene i parametri di connessione utilizzati dal progetto.

> Prima di eseguire l’applicazione in locale, verificare e aggiornare i parametri in base al proprio ambiente (host, username, password, database).

---

## Esecuzione del progetto

Il progetto può essere eseguito con uno stack PHP locale, ad esempio:

- XAMPP
- WAMP
- MAMP
- server PHP integrato

### Avvio rapido (server PHP integrato)

Dalla cartella del progetto:

```bash
cd Codice
php -S localhost:8000
```

Aprire poi nel browser:

```text
http://localhost:8000/index.php
```

---

## Note sul progetto

Questo repository contiene un **progetto scolastico del 2023**, realizzato con finalità didattiche per esercitarsi su:

- sviluppo web lato server con PHP;
- gestione pagine dinamiche;
- flussi di autenticazione;
- gestione carrello/ordine;
- organizzazione risorse frontend (HTML/CSS);
- progettazione preliminare tramite storyboard.

---

## Possibili miglioramenti futuri

Alcune possibili evoluzioni del progetto:

- introduzione architettura MVC completa;
- validazioni server-side più robuste;
- gestione sessioni e sicurezza avanzata;
- separazione più netta tra logica e presentazione;
- test automatici;
- pannello amministratore per gestione prodotti/menù;
- storico ordini utente;
- miglioramento responsive design e accessibilità.

---

## Autore

Progetto realizzato da **Samuel Ulivi**.

---

## Licenza

Questo progetto è stato sviluppato per scopi scolastici e didattici.
