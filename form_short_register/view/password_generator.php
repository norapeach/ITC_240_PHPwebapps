<!-- inserts password_generator form -->
  <p class="bold">Your Catland Password: <?php echo $password; // generated pw output here ?></p>
  <p>Generate a new password using checkboxes to toggle included characters.</p>
  <form action="." method="get">
    <fieldset>
    <legend>Password Generator</legend>
        Length: <input type="text" name="length" value="<?php if(isset($_GET['length'])) { echo $_GET['length']; } ?>" /><br />
        <input type="checkbox" name="lower" value="1" <?php if($_GET['lower'] == 1) { echo 'checked'; } ?> /> Lowercase<br />
        <input type="checkbox" name="upper" value="1" <?php if($_GET['upper'] == 1) { echo 'checked'; } ?> /> Uppercase<br />
        <input type="checkbox" name="numbers" value="1" <?php if($_GET['numbers'] == 1) { echo 'checked'; } ?> /> Numbers<br />
        <input type="checkbox" name="symbols" value="1" <?php if($_GET['symbols'] == 1) { echo 'checked'; } ?> /> Symbols<br />
        <input type="submit" name="action" value="Generate" />
    </fieldset>
  </form>