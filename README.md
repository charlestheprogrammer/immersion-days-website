# Brief presentation

This repo is intended to provide access to the sources of the website for the **EPITA immersion days**. The proposed subject is written in **Python**, intended for **amateur students** who are new to computer science. This site allows students to challenge each other with an overall **ranking on one of the proposed exercises**.


# Project architecture

```
Immersion Website
|
| ------ moulinette.php
| ------ refreshusers.php (apply modifications of default user to all users)
| ------ adduser.sh (bash script to add a new user)
| ------ draganddrop.php (template for user submission page)
| ------ css/
|		|
| 		| ------ *.css
| ------ js/
|		|
|		| ------ *.js
| ------ login/
|		|
|		| ------ dbconnect.php
|		| ------ index.php
|		| ------ logout.php
|		| ------ login.php
|		| ------ register.php
| ------ scoreboard/
| ------ subject/ (with the subject in PDF)
| ------ users/
|		|
|		| ------ default/ (template for all users)
|		|		|
|		|		| ------ dbconnect.php
|		|		| ------ index.php
|		|		| ------ mouli.py (execute user file to get the score)
```
> Very easy to use


## Scoreboard

Here is the structure of the scoreboard:

|Rank	|Name     |Pseudo   |Score          |Best score		|
|-------|---------|-------- |---------------|---------------|
|1     	|User N°1.|Hey, are |2381123        |8744902		|
|2      |User N°2 |You      |2179934        |8245609		|
|3      |User N°3 |Happy?   |1849003		|7649804		|


# How to use the sources

The website is build using PHP. So, you need to host the sources to access them from a machine where PHP is installed and configured.
The website required a SQL database. All the queries are made with function mysqli_query() from PHP. Notice that you need to configure all the ```dbconnect.php``` to enable the connection between the website and your database. The name of the database is ```immersion``` but you can change it in the ```dbconnect.php``` file.
