<?php
$mealNames = [
    'Oatmeal', 'Chicken Salad', 'Pasta', 'Smoothie', 'Grilled Fish', 'Avocado Toast',
    'Beef Stir Fry', 'Quinoa Bowl', 'Turkey Sandwich', 'Veggie Wrap', 'Yogurt Parfait',
    'Lentil Soup', 'Grilled Chicken Breast', 'Brown Rice Bowl', 'Steamed Broccoli', 'Baked Sweet Potato',
    'Greek Salad', 'Tofu Stir Fry', 'Salmon Fillet', 'Hummus and Veggies', 'Egg White Omelette',
    'Fruit Salad', 'Chickpea Curry', 'Roasted Brussels Sprouts', 'Spinach and Feta Wrap', 'Cottage Cheese Bowl'
];

$mealTypes = ['Breakfast', 'Lunch', 'Dinner'];
$weeklyMeals = [];

$daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

foreach ($daysOfWeek as $day) {
    $meals = [];

    foreach ($mealTypes as $type) {
        $randomName = trim($mealNames[array_rand($mealNames)]);
        $randomCalories = rand(150, 700);
        $randomProtein = rand(5, 40);

        $meals[] = [
            'name' => $randomName,
            'type' => $type,
            'calories' => $randomCalories,
            'protein' => $randomProtein
        ];
    }

    // Create a comma-separated list of meal names (optional usage)
    $mealNamesString = implode(', ', array_map('trim', array_column($meals, 'name')));

    // Store meals
    $weeklyMeals[$day] = $meals;

    // Optional: if you want to access or debug the names string, you could do something like:
    // $weeklyMeals[$day . '_names'] = $mealNamesString;
}
?>
