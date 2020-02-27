<?php // https://github.com/ava11235/itc240/blob/master/assignment_6_arrays.md 
// 1. pet adoption
$pets = array('dog', 'cat', 'fish', 'bird', 'iguana');
$pets_f = implode(', ', $pets);
$format = 'You can adopt a %s, a %s, or a %s from the animal sanctuary';
$message_f = sprintf($format, $pets[0], $pets[1], $pets[3]);

// 2. display state capitals
$statecaps = array('Washington' => 'Olympia', 
                                    'Oregon' => 'Salem', 
                                    'California' => 'Sacramento', 
                                    'Alaska' => 'Juneau', 
                                    'Hawaii' => 'Honolulu', 
                                    'Idaho' => 'Boise', 
                                    'Nevada' => 'Carson City', 
                                    'Arizona' => 'Phoenix');
asort($statecaps); # sort array by value
$list_f = "";
foreach($statecaps as $state => $cap ) { # loop through each key/value pair
    $list_f .= "<li>State: {$state} <span>Capital: {$cap}</span></li>"; # format as <li> within <ul>
}

// 3. insert element at num[4] then continue with rest of num array
// post output: 1,2,3,4, 42, 5, 6
$nums = array(1, 2, 3, 4, 5, 6);
$slice = array_slice($nums, 4); # store last 2 elements
array_splice($nums, 4); # remove from $nums
array_push($nums, 42); # add 42 to $nums[4]
$result = array_merge($nums, $slice); #combine $nums with $sliced off 2 values
$result3_f = implode(', ', $result);


// 4. display lowest, highest and average temperatures from array
$temps = array(32, 47, 55, 30, 42, 39, 45);
sort($temps, SORT_NUMERIC);
$average = array_sum($temps) / count($temps);
$average_f = sprintf("%01.1f", $average);
$high = $temps[0];
$low = $temps[count($temps) -1];
$result4_f = "<li>Average temp this week: {$average_f}</li>" . 
    "<li>Lowest temp: {$low}</li>" . 
    "<li>Highest temp: {$high}</li>";

include 'array_examples.php';
?> 