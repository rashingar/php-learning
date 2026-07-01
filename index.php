<?php

declare(string_types=1);

require __DIR__ . '/db.php';

$statement = $pdo->query(
    'SELECT id, title, is_completed, created_at
    FROM tasks
    ORDER BY id'
);

$tasks = $statement->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">

    <title>PHP Learning Project</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main class="container">
        <h1> PHP Learning Project</h1>

        <p>PHP and MySQL are connected successfully.</p>

        <h2>Tasks</h2>

        <?php if ($tasks === []): ?>
            <p>No tasks were found.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($tasks as $task): ?>
                    <li>
                        <?= htmlspecialchars(
                            $task['title'],
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </main>
</body>

</html>