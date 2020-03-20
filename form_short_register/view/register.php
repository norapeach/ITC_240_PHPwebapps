<?php include 'header.php'; // top of html doc through closing header tag?>
<main>
    <!-- Main view that displays form & interacts with model/ classes -->
    <form action="." method="post">
    <!-- form action="." as not sent to db -->
    <fieldset>
        <legend>User Information</legend>

        <label>First Name:</label>
        <!-- input value dynamically passed to server is value of $field_name -->
        <input type="text" name="first_name" value="<?php echo htmlspecialchars($first_name);?>"> 
        <?php echo $fields->getField('first_name')->getHTML(); // adds <span> with potential error message formatting ?><br>

        <label>Last Name:</label>
        <input type="text" name="last_name" value="<?php echo htmlspecialchars($last_name);?>"> 
        <?php echo $fields->getField('last_name')->getHTML(); // adds <span> with potential error message formatting ?><br>

        <label>Phone:</label>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($phone);?>">
        <?php echo $fields->getField('phone')->getHTML(); ?><br>

        <label>E-Mail:</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email);?>">
        <?php echo $fields->getField('email')->getHTML(); ?><br>
    </fieldset>
    <fieldset>
        <legend>Submit Registration</legend>

        <label>&nbsp;</label>
        <input type="submit" name="action" value="Register"/>
        <input type="submit" name="action" value="Reset"/><br>
    </fieldset>
    </form>
</main>
<?php include 'footer.php'; // dynamic footer plus closing <body><html> tags
?>