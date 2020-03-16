<!DOCTYPE html>

<html lang="en">
  <head>
    <title>Simple Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <meta name="robots" content="noindex,nofollow" />
  </head>
  <body>
      <main>
          <h1>Basic Calculator Class</h1>
          <p>Demonstrates the use of a Calculator class to construct an instance that is able to add, subtract, multiply or divide two numbers</p>
          <p>The php source code for this page can be viewed at 
          <a href="https://github.com/norapeach/ITC_240_PHPwebapps" target="_blank">Github</a></p>
          <section>
            <h2>Let's do some basic math!</h2>
            <p >Enter two numbers and select an arithmetic operator from the dropdown. Click the = button to calculate.</p>
            <form action="." method="post">
            <input type="hidden" name="action" value="run_calculator">

            <label class="hidden" for="val1">Enter a number:</label>
            <input type="text" id="val1" name="val1" placeholder="Enter 1st number" value="<?php echo $newval1; # show 1st value post submit?>">

            <label class="hidden" for="symbol">select arithmetic operator symbol:</label><!-- hide label? -->
            <select id="symbol" name="symbol">
              <option value="add">+</option>
              <option value="subt">-</option>
              <option value="multiply">*</option>
              <option value="divide">/</option>
            </select>
            <br />

            <label class="hidden" for="val2">Enter 2nd number:</label>  
            <input type="text" name="val2" id="val2" placeholder="2nd number"
                value="<?php echo $newval2; # show entered value after submit?>">
            <input type="submit" name="submit" value="=" class="submit">
            <span class="error"><?php echo $val1Err; ?></span>
            <br />
            </form>
            <p>Result: <?php echo $output; ?></p>
          </section>
      </main>
  </body>
</html>