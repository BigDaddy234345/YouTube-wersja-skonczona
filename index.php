<?php
require_once 'db.php';


$count_result = mysqli_query($link, "SELECT COUNT(*) FROM videos");
if (!$count_result) {
    die("Ошибка запроса: " . mysqli_error($link));
}

$count = mysqli_fetch_row($count_result)[0];
$half = max(4, (int)ceil($count / 2));

$stmt = $link->prepare("SELECT * FROM videos ORDER BY RAND() LIMIT ?");
$stmt->bind_param("i", $half);
$stmt->execute();
$result = $stmt->get_result();

$videos = [];
while ($row = mysqli_fetch_assoc($result)) {
    $videos[] = $row;
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<body>

<header class="pasek-gora">
    <div class="start">
        <button class="menu-icon" id="sidebar-toggle" aria-label="Otwórz menu">
            <span class="material-symbols-outlined">menu</span>
        </button>
        <a href="index.php" class="logo" aria-label="Strona główna">
            <img src="images/img.jpg" alt="Logo" class="logo-dark">
            <img src="images/img-light.jpg" alt="Logo" class="logo-light">
            <span>Youtube</span>
            <span class="country-code">PL</span>
        </a>
    </div>

    <div class="center">
        <div class="wyszukiwarka">
            <input type="text" id="search-input" class="pole-szukaj" placeholder="Wyszukaj">
            <button class="search-btn" id="search-btn" aria-label="Szukaj">
                <span class="material-symbols-outlined filled-icon">search</span>
            </button>
        </div>
    </div>

    <div class="koniec">
        <input type="checkbox" id="theme-checkbox" style="display: none;">

        <label for="theme-checkbox" class="create-btn" title="Zmień motyw" style="cursor: pointer;">
        <span class="material-symbols-outlined">light_mode</span>
        </label>

        <div class="notification-wrapper">
    <input type="checkbox" id="notif-checkbox" style="display: none;">
    
    <label for="notif-checkbox" class="create-btn" title="Powiadomienia" style="cursor: pointer;">
        <span class="material-symbols-outlined">notifications</span>
    </label>
    
    <div class="notif-dropdown" id="notif-dropdown">
        <p class="notif-empty">Brak nowych powiadomień</p>
    </div>
        </div>

         <a href="reze.php" aria-label="Reze">
    <img src="images/img151.png" class="avatar" alt="Reze" style="object-fit: cover;">
        </a>
    </div>
</header>

<nav class="sidebar" id="sidebar">
    <div class="sekcja">
        <a href="index.php" class="item active" data-category="all">
            <i class="fa-solid fa-house"></i>
            <span>Strona Główna</span>
        </a>
    </div>

    <hr>

    <div class="sekcja">
        <h3 class="sekcja-title">Subskrypcje</h3>
            <a href="mrbeast.php" class="item">
        <img src="images/img4.jpg" class="avatar-sm" alt="MrBeast">
            <span>MrBeast</span>
        </a>
    <a href="veritasium.php" class="item">
            <img src="images/img5.webp" class="avatar-sm" alt="Veritasium">
        <span>Veritasium</span>
    </a>
        <a href="daily_dose_of_internet.php" class="item sub-extra" style="display:none">
            <img src="images/img6.png" class="avatar-sm" alt="Daily Dose of Internet">
            <span>Daily Dose of Internet</span>
        </a>
        <div class="item" id="subs-expand">
            <i class="fa-solid fa-chevron-down" id="subs-chevron"></i>
            <span id="subs-expand-text">Rozwiń</span>
        </div>
    </div>

    <hr>

    <div class="sekcja">
        <h3 class="sekcja-title">Kategorie</h3>
        <div class="item active" data-category="all" onclick="filterCategory('all', this)">
            <i class="fa-solid fa-fire"></i>
            <span>Wszystkie</span>
        </div>
        <div class="item" data-category="muzyka" onclick="filterCategory('muzyka', this)">
            <i class="fa-solid fa-music"></i>
            <span>Muzyka</span>
        </div>
        <div class="item" data-category="programowanie" onclick="filterCategory('programowanie', this)">
            <i class="fa-solid fa-code"></i>
            <span>Programowanie</span>
        </div>
        <div class="item" data-category="sport" onclick="filterCategory('sport', this)">
            <i class="fa-solid fa-futbol"></i>
            <span>Sport</span>
        </div>
        <div class="item" data-category="jedzenie" onclick="filterCategory('jedzenie', this)">
            <i class="fa-solid fa-utensils"></i>
            <span>Jedzenie</span>
        </div>
    </div>

    <hr>

    <div class="sekcja">
        <h3 class="sekcja-title">Inne możliwości</h3>
       <a href="watch.php?id=ТВОЙ_ID&autoplay=1" class="item">
         <i class="fa-brands fa-youtube" style="color:#ff0000"></i>
        <span>YouTube Premium</span>
</a>
    </div>
</nav>

<main class="video-grid" id="video-grid">
    <?php foreach ($videos as $v): ?>
    <div class="video-card"
         data-title="<?php echo htmlspecialchars(strtolower($v['title'])); ?>"
         data-channel="<?php echo htmlspecialchars(strtolower($v['channel_name'])); ?>"
         data-category="<?php echo htmlspecialchars(strtolower($v['category'] ?? '')); ?>">
        <div class="thumbnail-container">
            <a href="watch.php?id=<?php echo $v['id']; ?>">
                <img src="<?php echo htmlspecialchars($v['thumbnail']); ?>" class="thumbnail" alt="<?php echo htmlspecialchars($v['title']); ?>" loading="lazy">
            </a>
        </div>
        <div class="video-info-container">
            <img src="<?php echo htmlspecialchars($v['channel_avatar'] ?? 'images/img1.jpg'); ?>" class="channel-avatar" alt="Avatar">
            
            <div class="video-text">
                <h4 class="video-title"><?php echo htmlspecialchars($v['title']); ?></h4>
                <p class="channel-name"><?php echo htmlspecialchars($v['channel_name']); ?></p>
                <p class="video-stats"><?php echo htmlspecialchars($v['stats']); ?></p>
            </div>
            <i class="fa-solid fa-ellipsis-vertical more-btn"></i>
        </div>
    </div>
    <?php endforeach; ?>
</main>

<div class="no-results" id="no-results">
    <i class="fa-solid fa-magnifying-glass"></i>
    <p>Brak wyników dla "<span id="no-results-query"></span>"</p>
</div>

<script src="main.js"></script>
</body>
</html>


