<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Курсовой проект — Стенд готов</title>
    <style>
        body { font-family: system-ui, sans-serif; margin: 40px; background: #f4f6f8; }
        .card { background: white; padding: 24px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,.08); max-width: 600px; }
        h1 { color: #1e293b; margin-top: 0; font-size: 20px; }
        .badge { display: inline-block; padding: 4px 10px; border-radius: 4px; font-weight: bold; background: #e2e8f0; }
    </style>
</head>
<body>
    <main class="card">
        <h1>Курсовой проект: Стенд инициализирован</h1>
        <p><strong>Версия PHP на хостинге:</strong> <span class="badge"><?= htmlspecialchars($phpVersion, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></span></p>
        <p><strong>Статус СУБД:</strong> <?= htmlspecialchars($dbStatus, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></p>
        <hr>
        <p><em>Профессиональный модуль ПМ.09 / МДК.09.01</em></p>
    </main>
</body>
</html>
