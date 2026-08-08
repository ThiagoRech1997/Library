# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Library management system (Biblioteca) built with PHP and MySQL. This is an academic project providing CRUD operations for a library database — managing books, authors, publishers, clients, employees, loans (emprestimos), and reservations.

## Tech Stack

- **Backend/Frontend:** PHP (server-rendered pages, no framework)
- **Database:** MySQL (database name: `biblioteca`)
- **UI:** Bootstrap 3 with jQuery
- **Connection:** Legacy `mysql_*` functions (deprecated PHP extension)

## Running the Project

Requires a PHP server with MySQL (e.g., XAMPP, WAMP, or LAMP):

1. Set up MySQL and create the database using `Script_Banco/Script_Criação_Banco_Modelo.sql`
2. Populate with sample data using `Script_Banco/Script_Inserção_Banco_Modelo.sql`
3. Apply triggers from `Script_Banco/Triggers.sql`
4. Serve the project root via PHP (e.g., place in `htdocs` or use `php -S localhost:8080`)

Database connection is configured in `conection.php` (localhost, root, no password).

## Architecture

Each database table has a corresponding directory under `tabelas/` with a consistent set of PHP files:

- `tabelas/tb_<entity>/insert.php` — form for creating records
- `tabelas/tb_<entity>/insert1.php` — processes the insert form submission
- `tabelas/tb_<entity>/update.php` — form for selecting a record to update
- `tabelas/tb_<entity>/update1.php` / `update2.php` — processes the update
- `tabelas/tb_<entity>/delete.php` — form for selecting a record to delete
- `tabelas/tb_<entity>/delete1.php` — processes the deletion
- `tabelas/tb_<entity>/index.php` — lists all records in the table

There are two navigation menus: `menu.php` (uses absolute paths from old project location `APS-Banco_2`) and `menu1.php` (uses relative paths `../../tabelas/` — the correct one for table pages).

## Database Schema

15 tables with the following key entities and relationships:

- **Tb_Livro** (book) references Tb_Editora (publisher) and Tb_Categoria
- **Tb_Autorlivro** — many-to-many join between Tb_Autor and Tb_Livro
- **Tb_Exemplar** (copy) references Tb_Livro, has status field
- **Tb_Emprestimo** (loan) references Tb_Cliente and Tb_Funcionario
- **Tb_Exemplaremprestimo** — join between exemplar and loan, tracks due dates and fines
- **Tb_Reserva** references Tb_Livro, Tb_Funcionario, and Tb_Cliente
- Address entities: Tb_Bairro, Tb_Cidade, Tb_Endereco (shared by clients, employees, publishers)

The ER model is available as `Script_Banco/Mer.pdf` and `Script_Banco/mer.mwb` (MySQL Workbench).

## Known Issues

- `menu.php` has hardcoded paths pointing to `./../../APS-Banco_2/tabelas/` (old project location) — these links are broken
- Uses deprecated `mysql_*` PHP functions (removed in PHP 7+); requires PHP 5.x to run as-is
- UI language is Portuguese (pt-br)
