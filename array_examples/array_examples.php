<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
  <head>
    <title>Array Examples</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <meta name="robots" content="noindex,nofollow" />
  </head>
  <body>
      <main>
          <h1>Array Examples</h1>
          <p>Basic handling of simple and associative arrays.</p>
          <p>The php source code for this page can be viewed at 
          <a href="https://github.com/norapeach/ITC_240_PHPwebapps" target="_blank">github</a></p>
          <section>
            <h2>Pet Adoption</h2>
            <p>The following kinds of animals have been rescued: <?php echo $pets_f; ?></p>
            <p>Result: <?php echo $message_f; ?></p>
          </section>
          <section>
            <h2>Display State Capitals</h2>
            <p>Associative array sorted alphabetically by the name of the capital:</p>
              <ul>
                <?php echo $list_f; ?>
              </ul>
          </section>
          <aside>
            <h2>Inserting item in the middle of an array</h2>
            <p>The starting array has the elements: 1, 2, 3, 4, 5, 6</p>
            <p>42 has been inserted at index 4 (zero-index): <?php echo $result3_f; ?></p>
          </aside>
          <aside>
            <h2>Temperature Calculations</h2>
            <p>Sample temperature values for a week 32, 47, 55, 30, 42, 39, 45:</p>
            <ul>
              <?php echo $result4_f;?>
            </ul>
          </aside>
      </main>

  </body>
</html>