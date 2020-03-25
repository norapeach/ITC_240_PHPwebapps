<?php
/*      index.php acts as controller in MVC pattern.
        Includes scripts for random password generator & a registration form (see line 81)
*/
////// BEGIN PASSWORD GENERATOR CONTROLS /////////
/*
returns random character random number $i should represent length of concat charset char1
*/
function random_char($string) {
    $i = mt_rand(0, strlen($string)-1);
    return $string[$i];
}

/*
returns random string of the given $length and using the given $char_set --> character set
*/
function random_string($length, $char_set) {
    $output = ''; # accumulator for random 
    for($i = 0; $i < $length; $i++) {
        # call random_char above
        $output .= random_char($char_set); # adds to output string on each loop
    }
    return $output;
}

/* 
Primary reusable function that is utilized in webform that will send the character set configurations to be used via the server. Returns a random pw that meets those given configurations - $options refers to an array of elements referencing each value sent via GET superglobal array.
*/ 
function generate_password($options) {
    // define character sets
    $lower = implode(range('a', 'z')); // includes min/max in rang
    $upper = implode(range('A', 'Z'));
    $numbers = implode(range(0, 9));
    $symbols = '$*?!%-&';

    /*    
    Extract configuration flags into variables based on whether isset() returns true - if yes, then value is used, otherwise 0 --> uses turnary operator ? after condition, first value is true statement; 2nd value 0 for false
    */ 

    $use_lower = isset($options['lower']) ? $options['lower'] : '0';
    $use_upper = isset($options['upper']) ? $options['upper'] : '0';; 
    $use_numbers = isset($options['numbers']) ? $options['numbers'] : '0';;
    $use_symbols = isset($options['symbols']) ? $options['symbols'] : '0';; # do I need 2 colons?
    
    /*
    Construct charset to use for random pw based on configs above 1 means checked, so that charset is concatenated to $chars string
    */
    $chars = '';
    if($use_lower == '1') { $chars .= $lower; }
    if($use_upper == '1') { $chars .= $upper; }
    if($use_numbers == '1') { $chars .= $numbers; }
    if($use_symbols == '1') { $chars .= $symbols; }

    /*
    need to set length parameter to be passed to random_string() call. Check if GET superglobal array key 'length' has a value set --> turnary operator conditional; if evaluates to false, then default value is 8
    */
    $length = isset($options['length']) ? $options['length'] : 8;
    return random_string($length, $chars);
} 
/*
$options array assigns values returned from $_GET superglobal array to matching element keys. Allows for functions to demonstrate encapsulation & polymorphism --> separates specific state from function behavior
*/
$options = array(
    'length' => $_GET['length'], // if user determines pw length  
    'lower' => $_GET['lower'],
    'upper' => $_GET['upper'],
    'numbers' => $_GET['numbers'],
    'symbols' => $_GET['symbols']
);

/*
control structure to filter for GET - action & if Generate
button was clicked then call the function to generate pw
*/
$pwaction = filter_input(INPUT_GET, 'action');
$pwaction = strtolower($pwaction);
if ($pwaction == 'generate') { 
    $password = generate_password($options);
} ////// END PASSWORD GENERATION VIEW CONTROLS

////////////// START REGISTER VIEW CONTROLS
// first access model classes
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
} ////// END REGISTRATION VIEW CONTROLS
?>
