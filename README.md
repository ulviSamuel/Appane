# Appane

Appane is a server-rendered PHP web application for browsing a bakery product menu, managing a shopping cart, and confirming orders.

![PHP](https://img.shields.io/badge/PHP-server--rendered-777BB4?logo=php&logoColor=white)
![Database](https://img.shields.io/badge/Database-MySQL%2FMySQLi-4479A1?logo=mysql&logoColor=white)
![Year](https://img.shields.io/badge/Year-2023-lightgrey)

## Overview

The application provides a small bakery ordering flow:

- browse products grouped by category;
- view product details;
- register an account and sign in;
- add products and quantities to a session- or user-associated cart;
- remove products from the cart;
- confirm an order for a signed-in user;
- read the site's product and sourcing values.

The repository is a historical PHP application rather than a production-ready service. Its user-facing pages and database operations are implemented directly in the `Codice/` directory.

## Technology stack

- **PHP** for server-side page rendering, authentication, cart operations, and order confirmation.
- **HTML and CSS** for the page structure and presentation.
- **JavaScript** with `XMLHttpRequest` for adding and removing cart items without a full page reload.
- **MySQL accessed through PHP MySQLi** for users, products, categories, and cart records.
- **Draw.io** for the storyboard stored in `Storyboard/`.

## Application flow

The main entry point is `Codice/index.php`. From there, users can navigate to the weekly menu, values page, cart, or login flow.

1. `menu_settimana.php` reads products and categories from the database and accepts a quantity for each product.
2. `aggiungi_al_carrello.php` associates the selected product with the current authenticated user or PHP session.
3. `carrello.php` displays active cart items from the previous day and calculates the total.
4. `conferma_ordine.php` requires an authenticated user and marks the user's active cart records as fulfilled.

## Project structure

```text
.
├── Codice/
│   ├── index.php
│   ├── menu_settimana.php
│   ├── dettagli_prodotto.php
│   ├── carrello.php
│   ├── aggiungi_al_carrello.php
│   ├── rimuovi_prodotto_carrello.php
│   ├── conferma_ordine.php
│   ├── login.php
│   ├── registrati.php
│   ├── auth.php
│   ├── InserimentoDati.php
│   ├── i_nostri_valori.php
│   ├── variabili_connessione.php
│   ├── css/
│   └── img/
└── Storyboard/
    └── storyboard appane.drawio
```

## Getting started

### Prerequisites

- PHP with the MySQLi extension enabled.
- A reachable MySQL-compatible database containing the tables referenced by the application: `tutenti`, `tprodotti`, `tcategorie`, and `tcarrello`.

No dependency manifest, database schema dump, automated build configuration, or test suite is included in this repository.

### Configuration

Review [`Codice/variabili_connessione.php`](Codice/variabili_connessione.php) and configure its database connection for the local environment. The repository does not include a schema or migration script, so the required database structure must be supplied separately.

### Run locally

From the repository root, start PHP's built-in development server with the application directory as its document root:

```bash
php -S localhost:8000 -t Codice
```

Open <http://localhost:8000/index.php> in a browser.

The pages that use product, user, or cart data require a working database connection. The login and registration forms post to `auth.php` and `InserimentoDati.php`, respectively.

## Testing and build status

The repository contains no declared test or build commands. PHP syntax checks can be run against the application files when PHP is installed:

```bash
for file in Codice/*.php; do php -l "$file" || exit 1; done
```

This is a manual syntax check, not an included automated test suite.

## Historical context

The non-README Git history records the initial repository and storyboard commits on 2023-12-06, followed by feature and correction commits through 2023-12-20. The original development year is therefore documented as **2023** based on the coherent implementation history, not the later README-generation commit.

## License

No license file or explicit license declaration is included in the repository. Licensing status requires human review.
