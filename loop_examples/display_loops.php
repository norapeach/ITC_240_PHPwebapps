<?php 
// get data from the form
$meal_cost = filter_input(INPUT_POST, 'meal_cost');
$tip_percent = filter_input(INPUT_POST, 'tip_percent');
$tax_percent = filter_input(INPUT_POST, 'tax_percent');

// calculate the tip amount
$tip_amount = $meal_cost * $tip_percent * .01;

// calculate tax amount
$tax_amount = $meal_cost * $tax_percent * .01;

// calculate total cost
$subtotal = $meal_cost + $tip_amount + $tax_amount;

//apply currency formatting
$meal_cost_f = "$".number_format($meal_cost, 2);
$tip_amount_f = "$".number_format($tip_amount, 2);
$tax_amount_f = "$".number_format($tax_amount, 2);
$subtotal_f = "$".number_format($subtotal, 2);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Example: Loop &amp; Conditional Statements</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
        <main>
            <h1>Loop &amp; Conditional Statement Examples</h1>
                    <label>Meal Cost:</label>
                    <span><?php echo htmlspecialchars($meal_cost_f); ?></span><br />
                    
                    <label>Tip Amount:</label>
                    <span><?php echo htmlspecialchars($tip_amount_f); ?></span><br />

                    <label>Tax Amount:</label>
                    <span><?php echo htmlspecialchars($tax_amount_f); ?></span><br />

                    <label>Total:</label>
                    <span><?php echo $subtotal_f; ?></span><br />
                    <br />
                    <?php // evaluates meal cost and output a message
                         $message = "";
                         if ($meal_cost <= 0 || !is_numeric($meal_cost) || $tip_percent  <= 0 || !is_numeric($tip_percent)
                         || $tax_percent <= 0 || !is_numeric($tax_percent)) {
                            $message = "<b>Sorry, your total has a bug. Did you enter incorrect values? Try again.</b>";
                         } else if ($subtotal < 20) {
                            $message = 'Good price';
                         } else if ($subtotal >= 20 && $subtotal <= 40) {
                             $message = 'Reasonably priced';
                         } else {
                             $message = 'This meal is pricey';
                         }
                    ?>
                    <p>Price Evaluation: <?php echo $message; ?></p>
                    <hr>
                    <p>Example a for loop that outputs 1 to 10 and that indicates a random number between 5 and 7:</p>
                    <p><?php
                         $random = rand(5, 7); // set random number between min 5 - 7
                         for ($number = 1; $number <= 10; $number++) { // loop and output numbers 1 through 10
                             echo $number;
                             if ($number >= 5 && $number <= 7) { // condition to check if number is between 5 & 7
                                { if ($number == $random) {
                                    echo "<span> is your random number.</span><br />";
                                    continue; // break out of current loop and go to next 
                                } }
                             }
                             echo "<br />"; // line break for rest of number set 
                            }
                         
                    ?></p>
                    <br>
                </div>
            </form>
        </main>
    </body>
</html>