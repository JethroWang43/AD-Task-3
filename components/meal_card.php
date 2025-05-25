<?php
function renderMealCard($meal) {
    echo "<div class='meal-card'>";
    echo "<strong>{$meal['name']}</strong><br>";
    echo "Type: {$meal['type']}<br>";
    echo "Calories: {$meal['calories']} kcal<br>";
    echo "Protein: {$meal['protein']} g";
    echo "</div>";
}
?>
