Author:
Riikka Vepsä

Date:
20.4.2020

***************
**LÄHIRUOKAKAUPPA**
***************
A database exercise implemented with XAMPP.

Inspiration and help was used from Tania Rascia's database tutorial.

Sorry about the finnish language in the code :)

***************
**HOW IT WORKS**
***************

**CREATING A DATABASE**

First we need a database, which we'll create with PDO.

Database structure is defined in init.sql and configuration for database connection is in the config.php file.

Navigating to install.php file in the browser will create a new database to MySql.

**CREATING FRONTEND**

I use frontpage.php as a landing page. Layout is created using Bootstrap 4. In the frontpage there's links to buyers page (read.php) and sellers page (sellers.php - create.php, update.php - update-single.php and delete.php).

In the frontpage there's a simple parallax.

**CREATING FUNCTIONALITIES**

***Adding stuff***

First we need data in our database.

To add new items to sell, use create.php. In the frontend there's a simple form with placeholders and a submit -button.

Create.php requires config.php and common.php. Common.php is only used to so store HTML escape-function, which will convert HTML characters to HTML entities to avoid XSS attacs.

When the submit -button is pushed, database will be connected and new array will be inserted to database and the successful -message will appear on the top of the page.

***Editing stuff***

Update.php lists all products in the database (yes, this is something to work with in the future!). Pushing the edit (muokkaa) -button will SELECT all products FROM products-table and store the result in the $result -variable, and print the table.

Because also this uses form in the frontend, it will require common.php for the safety reasons.

For actually to edit single product, there's a update-single.php file. It's a link with HTTP query, that will fetch the right data based on it's ID, which will be embed in the url.

Desired data will be displayed as a form, and an error message will appear and script will closed, if the id in the url won't match the data.

Data from the form will pe updated in the database and the successful -message will appear in the frontend.

***Deleting stuff***

This is quite similar to update.php, but instead of UPDATE and SELECT clauses, we'll use DELETE clause.

***Reading stuff***

Read.php file will query the list of products by product -parameter, and print out the results.






















