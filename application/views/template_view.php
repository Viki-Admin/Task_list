<? require 'application/models/db.php'; ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Главная</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<body>
	<div class="wrapper">
    <header>
        <h1>Task list</h1>
    </header>
	<?php include 'application/views/'.$content_view; ?>
<footer></footer>
</div>
</body>
</html>