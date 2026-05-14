
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twój Kanał - YouTube</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="channel.css">
</head>
<body>


<header class="pasek-gora">
    <div class="start">
        <style>
        * {
            cursor: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' style='font-size:24px;'><text y='20'>💣</text></svg>") 12 12, auto !important;
        }
    </style>
</head>
<body>
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
    </div>
</header>

<div class="channel-banner" style="background-image: url('images/img150.jpg'); background-size: contain; background-position: center center; background-repeat: no-repeat; background-color: #ffffff; border-bottom: 2px solid #9c27b0;"></div>

<div class="channel-header-wrap">
    <img src="images/img151.png" alt="Reze" class="channel-avatar-lg">
    <div class="channel-meta">
        <h1 class="channel-name">Reze fan <i class="fa-solid fa-circle-check" style="font-size:18px;color:#3ea6ff"></i></h1>
        <p class="channel-stats">100 tys. subskrybentów</p>
        <p class="channel-desc">Ja jestem reze fan</p>
    </div>
    
    <button class="ch-subscribe-btn reze-sub-btn">To jest twój kanał</button>
</div>

<div class="channel-empty">
    <i class="fa-solid fa-film" style="font-size:48px;margin-bottom:16px;display:block"></i>
    <p>Ten kanał nie ma jeszcze żadnych filmów</p>
</div>



</body>
</html>