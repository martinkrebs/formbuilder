<?php
require_once "Form.php";

// Simple form creation
$fields = ['First name' => 'text', 'Email' => 'email', 'Comments' => 'textarea'];
$action = htmlspecialchars($_SERVER['PHP_SELF']);
$simpleForm = new Form($action, 'post', $fields);


// Detailed Form Creation
// create our form elements
$labelFirstname = new Element('label', ['for' => 'first_name'], 'What\'s your first name?');
$labelLastname = new Element('label', ['for' => 'last_name'], 'And your last name?');
$inputFirstname = new Element('input',[ 'type' => 'text', 'name' => 'first_name', 'placeholder' => 'enter your first name']);
$inputLastname = new Element('input',['type' => 'text', 'name' => 'last_name', 'placeholder' => 'enter your last name' ]);

$labelFeedback = new Element('label', ['for' => 'feedback'], 'Please give us feedback');
$textareaFeedback = new Element('textarea', ['rows' => '5', 'cols' => '30', 'name' => 'feedback'], 'enter your feedback here ...');

// add them to the $fields array
$fields = [
    $labelFirstname,
    $inputFirstname,
    $labelLastname,
    $inputLastname,
    $labelFeedback,
    $textareaFeedback,
];

// create the form
$action = htmlspecialchars($_SERVER['PHP_SELF']);
$detailedForm = new Form($action, 'post', $fields);


include_once('view.php');
