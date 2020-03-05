<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
  <head>
    <title>User Defined Function Examples</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <meta name="robots" content="noindex,nofollow" />
  </head>
  <body>
      <main>
          <h1>User Defined Functions</h1>
          <p>This page utilizes two examples of user-defined functions.</p>
          <p>The php source code for this page can be viewed at 
          <a href="https://github.com/norapeach/ITC_240_PHPwebapps" target="_blank">github</a></p>
          <section>
            <h2>Palindrome Tester</h2>
            <p >Enter a word or phrase in the form field below and click submit to test if it is a palindrome.</p>
            <form action="." method="post">
            <input type="hidden" name="action" value="check_palindrome"> 
            <label>Word/Phrase: </label>
            <input type="text" name="phrase"
                value="<?php echo htmlspecialchars($phrase); ?>">
            <!-- <br /> -->
            <label></label>
            <input type="submit" value="Submit" class="submit">
            <br />
            </form>
            <p>Result: <?php echo ($message); ?></p>
          </section>
          <section>
            <h2>Array Sorting</h2>
            <p>Below is the sorted output of two test calls to sortArray($array). Each call was passed an array of unsorted values as a parameter and sorts them them in ascending order. This function does not utilize the PHP built-in sort(). <strong>Note: </strong>the current version has not yet been tested for case sensitivity or mixed type values</p>
              <p>Sorted integers: <?php echo print_r(sortArray($test_array)); ?></p>
              <p>Sorted strings: <?php echo print_r(sortArray($test_strings)); ?></p>
          </section>
      </main>
  </body>
</html>