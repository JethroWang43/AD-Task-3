<div class="right-content">
    <h2>Let's start your meal</h2>
    <?php
    // I<?php
    // Raw strings
    $appetizer = "a FRESH and LIGHT appetizer to awaken your taste buds.";
    $mainCourse = "A HEARTY and fulfilling MAIN course that satisfies your hunger.";
    $dessert = "a SWEET dessert to COMPLETE your dining experience.";
    $quote = " hate every minute of training, but I said, 'Don't quit. Suffer now and live the rest of your life as a champion - Muhammad Ali";

    // String manipulation
    $appetizer = ucfirst(strtolower($appetizer));
    $mainCourse = ucfirst(strtolower($mainCourse));
    $dessert = ucfirst(strtolower($dessert));
    $quote = ucfirst(strtolower($quote));

    // Combine into a paragraph
    $intro = "Let's start your meal. ";
    $mealDescription = $intro . $appetizer . "<br>" . $mainCourse . "<br>" . $dessert . "<br>" . $quote;

    // Optional: show total length of paragraph
    $length = strlen($mealDescription);

    // Output
    echo "<p>$mealDescription</p>";
    echo "<p><em>Paragraph length: $length characters</em></p>";
    ?>

    <div class="next-button">
        <a href="../../page/page1/index.php">Check Meals</a>
    </div>
</div>
