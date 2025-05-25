<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Meal Schedule Plan</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <header>
        <?php include __DIR__ . '/../../components/header.php'; ?>
    </header>

    <?php
    include __DIR__ . '/../../components/meal_card.php';
    include __DIR__ . '/../../handlers/weekly_meals.php';
    ?>

    <main class="main-content">
        <div class="meal-table-container">
            <table class="meal-table">
                <thead>
                    <tr>
                        <?php foreach (array_keys($weeklyMeals) as $day): ?>
                            <th><?= $day ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($weeklyMeals as $meals): ?>
                            <td>
                                <?php foreach ($meals as $meal): ?>
                                    <?php renderMealCard($meal); ?>
                                <?php endforeach; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>



    <footer class="footer">
        <?php include __DIR__ . '/../../components/footer.php'; ?>
    </footer>

</body>
</html>
