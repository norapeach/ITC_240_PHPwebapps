<?php 
class Calculator {
    // properties
    private $val1;
    private $val2;
    private $symbol;
    private $result; 
    
    // constructor
    public function __construct($newval1, $newval2, $newsymbol) {
        $this->val1 = $newval1; 
        $this->val2 = $newval2;
        $this->symbol = $newsymbol;
    }
    // acessor methods
    function getval1() {
        return $this->val1;
    }

    function getval2() {
        return $this->val2;
    }
    
    public function calc() {
        // pre: val1 & val2 must be numeric
        if (!is_numeric($this->val1) || !is_numeric($this->val2)) {
            return $this->result = "Looks like you didn't enter valid numbers.";
        }
        // switch statement to check value of symbol 
        switch($this->symbol) {
            case 'add':
                return $this->result = $this->val1 + $this->val2;
            case 'subt':
                return $this->result = $this->val1 - $this->val2;
            case 'multiply':
                return $this->result = $this->val1 * $this->val2;
            case 'divide':
                return $this->result = $this->val1 / $this->val2;
        }
    }
}
///////// OUTSIDE OF CLASS - form validation & handling
$valErr = '';
$output = '';

// function to validate form input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// process form input via switch statement
$action = filter_input(INPUT_POST, 'action');
switch ($action) {
    case 'run_calculator':
        // validate that input fields aren't empty
        $newval1 = filter_input(INPUT_POST, 'val1');
        $newval2 = filter_input(INPUT_POST, 'val2');
        $newsymbol = filter_input(INPUT_POST, 'symbol');
        if (empty($newval1) || empty($newval2)) {
            $val1Err = '*** Two numbers are required ***';
            break;
        } else {
            $newval1 = test_input($newval1);
            $newval2 = test_input($newval2);
        }

        // NEW OBJECT: instantialize Calculator with user input values
        $calc = new Calculator($newval1, $newval2, $newsymbol);
        // run calculation and assign $result to output
        $output = $calc->calc();
        break;
    }

include 'calculator.php';
?>