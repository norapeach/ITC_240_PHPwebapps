<?php
// Acts as controller in MVC pattern
require_once('model/fields.php');
require_once('model/validator.php');

///// Add form field values with optional initial message
# first instantialize Validator 
$validate = new Validator();

# access & reference to class Fields property, workaround encapsulation
$fields = $validate->getFields();  # empty array

$fields->addField('first_name'); // constructs new Field object in $fields with key 'first_name'
$fields->addField('last_name');
$fields->addField('phone', 'Use 888-555-1234 format.');
$fields->addField('email', 'Must be a valid email address.');

// check what action was sent to server
$action = filter_input(INPUT_POST, 'action'); // filter user input based on button value attribute following action
if ($action === NULL) {
    $action = 'reset'; // reset button was clicked & form reset to blank
} else {
    $action = strtolower($action); 
}

// pass content from filter_input() to switch statement
switch ($action) {
    case 'reset':
        // Reset button clicked: clears values for variables
        $first_name = '';
        $last_name = '';
        $phone = '';
        $email = '';

        // loads blank form view  
        include 'view/register.php'; 
        break;

    case 'register': // if register button was clicked -- start validation
        // Copy form values to local variables
        $first_name = trim(filter_input(INPUT_POST, 'first_name'));
        $last_name = trim(filter_input(INPUT_POST, 'last_name'));
        $phone = trim(filter_input(INPUT_POST, 'phone'));
        $email = trim(filter_input(INPUT_POST, 'email'));

        // Validate form data via Validator method calls
        $validate->text('first_name', $first_name);
        $validate->text('last_name', $last_name);
        $validate->phone('phone', $phone);
        $validate->email('email', $email);

        // Load appropriate view based on hasErrors
        if ($fields->hasErrors()) {
            include 'view/register.php';
        } else {
            include 'view/success.php';
        }
        break;
}
?>
