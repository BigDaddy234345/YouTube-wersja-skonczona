<?php
// 1. Подключаемся к базе данных
require_once 'db.php';

// 2. Даем команду: "Достань вообще все записи из таблицы videos"
$sql = "SELECT * FROM videos ORDER BY RAND()";
$result = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini-szablon — nagłówek (header)</title>
    <!-- Подключение стилей -->
    <link rel="stylesheet" href="style.css">
    <!-- Подключите Material Symbols, если хотите видеть иконки -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <!-- Komentarz PL: Dodaję Font Awesome, żeby ikony "fa-" działały -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-p1CmY5Y1bM6VqGkJZ3qG6oZsWmYQ2p9s6JtqX1xZc2b1s8sY3lKp9Kf1X9nQ0V6Y6G7H8I9J0K2L3M4N5O6Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<script src="theme.js"></script>
<body>

    <!-- HEADER: логотип, поиск, кнопки -->
    <header class="header">

        <!-- Левая часть: меню + логотип -->
        <div class="start">
            <button class="menu-icon" aria-label="menu">
                <span class="material-symbols-outlined">menu</span>
            </button>

            <div class="logo">
                <!-- Локальная картинка в папке images/ -->
                <img src="images/img.jpg" alt="Логотип">
                <span>Youtube</span>
                <span class="country-code">PL</span>
            </div>
        </div>

        <!-- Центральная часть: поиск -->
        <div class="center">
            <div class="search-box">
                <input type="text" class="search-input" placeholder="Wyszukaj">

                <!-- Иконка клавиатуры: вставьте имя иконки при подключённом шрифте -->
                <div class="keyboard-icon" title="Klawiatura">
                    <span class="material-symbols-outlined">keyboard_alt</span>
                </div>

                <!-- Кнопка поиска -->
                <button class="search-btn" aria-label="search">
                    <span class="material-symbols-outlined filled-icon">search</span>
                </button>
            </div>
        </div>

       <div class="end">
            <button class="create-btn" id="theme-toggle" title="Zmień motyw">
                <span class="material-symbols-outlined" id="theme-icon">light_mode</span>
            </button>

            <button class="create-btn" title="Utwórz">
                <span class="material-symbols-outlined">add</span>
            </button>

            <button class="create-btn" title="Powiadomienia">
                <span class="material-symbols-outlined">notifications</span>
                <span class="badge">9+</span>
            </button>

            <div class="avatar" role="img" aria-label="Профиль"></div>
        </div>

    </header>


<div class="sidebar">
    <div class="section">
        <div class="item"><i class="fa-solid fa-house"></i> <span>Strona Główna</span> <a href="index.html"></a></div>
        <div class="item"><i class="fa-solid fa-bolt"></i> <span>Shorts</span></div>
    </div>

    <hr>

    <div class="section">
        <h3 class="section-title">Subskrypcje <i class="fa-solid fa-chevron-right"></i></h3>
        
        <div class="item">
            <img src="images/img4.jpg" class="avatar-sm"> <span>MrBeast</span>
        </div>
        <div class="item">
            <img src="images/img5.webp" class="avatar-sm"> <span>Veritasium</span>
        </div>
        <div class="item">
            <img src="images/img6.png" class="avatar-sm"> <span>Daily Dose of Internet</span>
        </div>

        <div class="item"><i class="fa-solid fa-chevron-down"></i> <span>Rozwiń</span></div>
    </div>

    <hr>

    <div class="section">
        <h3 class="section-title">Ty <i class="fa-solid fa-chevron-right"></i></h3>
        <div class="item"><i class="fa-solid fa-clock-rotate-left"></i> <span>Historia</span></div>
        <div class="item"><i class="fa-solid fa-list-ul"></i> <span>Playlisty</span></div>
        <div class="item"><i class="fa-solid fa-clock"></i> <span>Obejrzyj później</span></div>
        <div class="item"><i class="fa-solid fa-thumbs-up"></i> <span>Polubione</span></div>
        <div class="item"><i class="fa-solid fa-video"></i> <span>Twoje filmy</span></div>
        <div class="item"><i class="fa-solid fa-download"></i> <span>Pobrane</span></div>
        <div class="item"><i class="fa-solid fa-chevron-down"></i> <span>Rozwiń</span></div>
    </div>

    <hr>

    <div class="section">
        <h3 class="section-title">Navigator</h3>
        <div class="item"><i class="fa-solid fa-music"></i> <span>Muzyka</span></div>
        <div class="item"><i class="fa-solid fa-film"></i> <span>Filmy</span></div>
        <div class="item"><i class="fa-solid fa-tower-broadcast"></i> <span>Transmisje</span></div>
        <div class="item"><i class="fa-solid fa-chevron-down"></i> <span>Rozwiń</span></div>
    </div>

    <hr>

    <div class="section">
        <h3 class="section-title">Inne możliwości</h3>
        <div class="item"><i class="fa-brands fa-youtube" style="color: #ff0000;"></i> <span>YouTube Premium</span></div>
        <div class="item"><i class="fa-solid fa-square-rss" style="color: #ff0000;"></i> <span>Studio kreatywne</span></div>
        <div class="item"><i class="fa-solid fa-circle-play" style="color: #ff0000;"></i> <span>YouTube Music</span></div>
        <div class="item"><i class="fa-solid fa-child" style="color: #ff0000;"></i> <span>YouTube Dzieci</span></div>
    </div>
</div>









</main>

    <main class="video-grid">
        <?php
        // 3. ЦИКЛ WHILE: Работает как конвейер. 
        // Берет первую строчку из базы -> рисует карточку -> берет вторую -> рисует карточку... и так до конца.
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            
            <div class="video-card">
                <div class="thumbnail-container">
                    <a href="watch.php?id=<?php echo $row['id']; ?>">
                        <img src="<?php echo $row['thumbnail']; ?>" class="thumbnail">
                    </a>
                </div>
                <div class="video-info-container">
                    <div class="video-text" style="margin-left: 0;">
                        <h4 class="video-title"><?php echo $row['title']; ?></h4>
                        <p class="channel-name"><?php echo $row['channel_name']; ?></p>
                        <p class="video-stats"><?php echo $row['stats']; ?></p>
                    </div>
                    <i class="fa-solid fa-ellipsis-vertical more-btn"></i>
                </div>
            </div>

        <?php
        } // 4. Конец цикла
        ?>
    </main>

</body>
</html>