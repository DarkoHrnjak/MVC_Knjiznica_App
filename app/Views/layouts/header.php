<!DOCTYPE html>
<html>
    <head>
        <title>Knjižnica web</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <header>
            <h1 class="logo">Knjižnica WEB</h1>
            <nav>
                <a href="index.php">Početna</a>
                <?php if(!isset($_SESSION["user"])): ?>
                <a href="index.php?page=register">Registracija</a>
                <a href="index.php?page=login">Prijava</a>
                <?php else: ?>
                <a href="index.php?page=logout">Odjava</a>
                <?php endif; ?>
            </nav>
            <div class="user-info">
                <?php if(isset($_SESSION["user"])): ?>
                    Vi ste <strong><?= $_SESSION["user"]["korime"] ?></strong>,
                    tip <strong><?= $_SESSION["user"]["tip"] ?></strong>
                <?php else: ?>
                Gost | Neprijavljen
                <?php endif; ?>
            </div>
        </header>
