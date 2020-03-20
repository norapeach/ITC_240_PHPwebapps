<?php include 'header.php'; // top of html doc through closing header tag ?> 
<main>
    <!-- Displays once form is submitted -->
    <h2>Meow!</h2>
    <p>Cat content coming your way soon...</p>
    <p>The following registration information has been successfully submitted.</p>
    <ul>
        <li>First Name: <?php echo htmlspecialchars($first_name); ?></li>
        <li>Last Name: <?php echo htmlspecialchars($last_name); ?></li>
        <li>Phone: <?php echo htmlspecialchars($phone); ?></li>
        <li>Email: <?php echo htmlspecialchars($email); ?></li>
    </ul>
</main>
<?php include 'footer.php'; // adds dynamic footer html and closing <body><html> tags?> 