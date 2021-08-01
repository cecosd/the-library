The project demonstrates a simple custom made PHP OOP framework.

The problem that this project solves is to:
- Lookup into a folder called books-library and collect all XML files.
- The XML files are then inserted int a PosgreSQL database
- When the project is started, the users can search the database by Author Name

# Project Structure

## App

Holding the main logic for the project's framework

### Models

#### Author

Simple model for giving structure of a single Author

#### Book

Simple model for giving structure of a single Book

### Services

Needed Services throughout the project

#### AuthorBookSearchService

Class holding the search logic for the AuthorBooks search

### Utils

#### Database

##### DBConnect

The connector to the Database

### Bootstrap

Simple bootstrap php file

## Books Library

All the folders and sub-folders with books are here. If the library location will be changed, please modify the file
index_author_books.php line 5 and replace 

dirname(__FILE__) . '/books-library'

with your new path

## Config

### Database

Environment like file for the local/server connection with the database

## Migrations

All needed tables for the project in this directory in a separate file.
This directry is used during the setup step with file init_db.php

## Pub

### CSS

#### Style

Styles for the project

### JS

#### Search

Javascript for the dynamization of the search flow

## Routes

### Search

API kind of endpoint for returning JSON object

## Views

### Index

The main view of the project where all the actions are executed for the user.

# Setup

To setup the project please follow these steps strictly:

## Composer

This project uses composer for simple autoloading:

composer install

## Edit database connection

open config/database.php

## Migrate tables

php init_db.php 

## Index all possible authors and books

php index_author_books.php

## Start the server

php -S localhost:9000 -t .