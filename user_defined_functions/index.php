<?php
// 1. isPalimndrome function checks whether string, passed as an 
//      argument is a palindrome
$phrase = '';
$message = 'Click on the submit button to check your word.';

/******** FUNCTION DEFITION ****/
function isPalindrome($word) {
    // get reverse of word
    $backward = strrev($word);
    if (strcasecmp($word, $backward) == 0) {
        return true;
    }
    return false;
}
//process
$action = filter_input(INPUT_POST, 'action');
switch ($action) {
    case 'check_palindrome':
        $phrase = filter_input(INPUT_POST, 'phrase'); // get user entered value
        // trim whitespace
        $phrase = trim($phrase);
        // validate that input field wasn't empty
        if (empty($phrase)) {
            $message = 'Please enter a word or a phrase and click submit.';
            break;
        }
        // call isPalindrome($phrase), test boolean conditions and update $message
        if (isPalindrome($phrase)) {
            $phrase = htmlspecialchars($phrase);
            $message = "<b>{$phrase}</b> is a palindrome and reads the same backward as forward";
            break;
        } else {
            $message = "<b>{$phrase}</b> doesn't read the same backward as forward, so it's not a palindrome.";
            break;
        }
}

// 2.) isSorted() takes an array as argument and returns a sorted array without using built-in sort()
/****** FUNCTION DEFINITION ****/
function sortArray($list) {
    for ($i = 0; $i < (count($list)- 1); $i++) {
        for ($j = $i + 1; $j < count($list); $j++) {
            if ($list[$i] > $list[$j]) {
                $temp = $list[$i];
                $list[$i] = $list[$j];
                $list[$j] = $temp;
            }
        }
    }
    return $list;
}
$test_array = array(5, 100, 2,32, 1, 7);
$test_strings = array('car', 'bat', 'ate', 'fart', 'eat');

include 'ud_function_examples.php';
?>