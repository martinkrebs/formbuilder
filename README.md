## Form Builder

> To run, put the formbuilder folder in xampp htdocs folder, then browse to
localhost/formbuilder/index.php

#### 1. Concise way to specify a simple form:

```
// fields is an array containing: 'labelText' => 'input type' kv pairs,
// eg: 'Comments' => 'textarea'
$fields = ['First name' => 'text', 'Email' => 'email', 'Comments' => 'textarea'];

$action = '<a url>';
$form = new Form($action, 'post', $fields);
$form->render();
```


#### 2. If you need more control you can specify actual elements:
```
// 1. create our form elements
$labelFirstname = new Element('label', ['for' => 'firstName'], 'First name:');
$labelLastname = new Element('label', ['for' => 'lastName'], 'Last name:');
$inputFirstname = new Element('input',['name' => 'firstName', 'placeholder' => 'enter your first name', 'type' => 'text']);
$inputLastname = new Element('input',['name' => 'firstName', 'placeholder' => 'enter your first name', 'type' => 'text']);
$submitButton = new Element('button', ['type' => 'submit'], 'Submit');

// 2. Add them to the $fields array
$fields = [
    $labelFirstname,
    $inputFirstname,
    $labelLastname,
    $inputLastname,
    $submitButton];

// $fields is now an array containing Element instances.

// create and render the form
$action = '<url>';
$form = new Form($action, 'post', $fields);
$form->render();
```
