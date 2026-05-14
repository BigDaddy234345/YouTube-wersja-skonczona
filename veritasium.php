<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veritasium - YouTube</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="channel.css">
</head>
<body>

<header class="pasek-gora">
    <div class="start">
        <button class="menu-icon" aria-label="Menu">
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
        <form class="wyszukiwarka" action="index.php" method="get">
            <input type="text" name="q" class="pole-szukaj" placeholder="Wyszukaj">
            <button type="submit" class="search-btn" aria-label="Szukaj">
                <span class="material-symbols-outlined filled-icon">search</span>
            </button>
        </form>
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

<div class="channel-banner" style="background: linear-gradient(135deg, #0d1533, #1c3070);"></div>

<div class="channel-header-wrap">
    <img src="images/img5.webp" alt="Veritasium" class="channel-avatar-lg">
    <div class="channel-meta">
        <h1 class="channel-name">Veritasium <i class="fa-solid fa-circle-check" style="font-size:18px;color:#3ea6ff"></i></h1>
        <p class="channel-stats">15,3 mln subskrybentów • 0 filmów</p>
        <p class="channel-desc">Kanał popularnonaukowy prowadzony przez Dereka Mullera. Nauka, fizyka, matematyka i nieoczekiwane eksperymenty.</p>
    </div>
    
    <button class="ch-subscribe-btn">Jesteś zasubskrybowany</button>
</div>

<div class="channel-tabs">
    <button class="tab-btn active">Filmy</button>
</div>

<div class="channel-empty">
    <i class="fa-solid fa-film" style="font-size:48px;margin-bottom:16px;display:block"></i>
    <p>Ten kanał nie ma jeszcze żadnych filmów</p>
</div>

</body>
</html>