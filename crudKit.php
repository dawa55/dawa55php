<?php

require "vendor/autoload.php";
use CrudKit\CrudKitApp;
use CrudKit\Pages\MySQLTablePage;

// Create a new app
$app = new CrudKitApp();

// Create a new page mapped to a table
$sqlPage = new MySQLTablePage ("customer_page", "john", "hunter2", "mydb");
$sqlPage->setTableName ("Customers")  // Set the table name
        ->setPrimaryColumn ("CustomerId")
        ->addColumn ("FirstName", "First Name")
        ->addColumn ("LastName", "Last Name")
        ->addColumn ("DateOfPurchase", "Date of Purchase")
        ->addColumn ("Country", "Country", [ // Additional configuration using options
            'validation' => [
                'required' => false,
            ]
        ])
        ->setSummaryColumns (["FirstName", "Country"]);


// Add the page to the app
$app->addPage($sqlPage);

// Render the app
$app->render();
?>