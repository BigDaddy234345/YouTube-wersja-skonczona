<?php
/**
 * ========================================
 * STRONA GŁÓWNA YOUTUBE'A
 * ========================================
 * 
 * Ta strona wyświetla listę wideo z bazy danych
 * w responsywnej siatce (grid layout)
 */

// 1. Podłączamy plik z konfiguracją bazy danych
require_once 'db.php';

// 2. Pobieramy wszystkie wideo z bazy w losowej kolejności
$sql = "SELECT * FROM videos ORDER BY RAND()";
$result = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <!-- ========================================
         METADANE DOKUMENTU
         ======================================== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Clone — Strona Główna</title>
    
    <!-- ========================================
         PODŁĄCZENIE STYLÓW I CZCIONEK
         ======================================== -->
    
    <!-- Główny plik stylów CSS -->
    <link rel="stylesheet" href="style.css">
    
    <!-- Material Symbols - ikony od Google -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    
    <!-- Font Awesome - ikony brandów i symboli -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-p1CmY5Y1bM6VqGkJZ3qG6oZsWmYQ2p9s6JtqX1xZc2b1s8sY3lKp9Kf1X9nQ0V6Y6G7H8I9J0K2L3M4N5O6Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<!-- ========================================
     ZAWARTOŚĆ STRONY
     ======================================== -->
<body>

    <!-- ========================================
         NAGŁÓWEK (HEADER)
         ======================================== -->
    <header class="header">
        <!-- LEWA CZĘŚĆ: Menu + Logo -->
        <div class="start">
            <!-- Przycisk menu (otwiera/zamyka menu boczne) -->
            <button class="menu-icon" aria-label="menu">
                <span class="material-symbols-outlined">menu</span>
            </button>

            <!-- Logo YouTube -->
            <div class="logo">
                <!-- Dwa warianty logo - ciemny i jasny (przełączane przy zmianie motywu) -->
                <img src="images/img.jpg" alt="Logo" class="logo-dark">
                <img src="images/img-light.jpg" alt="Logo" class="logo-light">
                <span>Youtube</span>
                <!-- Kod kraju -->
                <span class="country-code">PL</span>
            </div>
        </div>

        <!-- ŚRODEK: Pole wyszukiwania -->
        <div class="center">
            <div class="search-box">
                <!-- Pole tekstowe do wpisania szukanego tekstu -->
                <input type="text" class="search-input" placeholder="Wyszukaj">

                <!-- Ikona klawiatury głosowej -->
                <div class="keyboard-icon" title="Klawiatura">
                    <span class="material-symbols-outlined">keyboard_alt</span>
                </div>

                <!-- Przycisk wysyłający zapytanie wyszukiwania -->
                <button class="search-btn" aria-label="search">
                    <span class="material-symbols-outlined filled-icon">search</span>
                </button>
            </div>
        </div>

        <!-- PRAWA CZĘŚĆ: Przyciski i profil -->
        <div class="end">
            <!-- Przycisk do przełączania motywu (jasny/ciemny) -->
            <button class="create-btn" id="theme-toggle" title="Zmień motyw">
                <span class="material-symbols-outlined" id="theme-icon">light_mode</span>
            </button>

            <!-- Przycisk do utworzenia nowego wideo/treści -->
            <button class="create-btn" title="Utwórz">
                <span class="material-symbols-outlined">add</span>
            </button>

            <!-- Przycisk powiadomień z czerwoną odznką -->
            <button class="create-btn" title="Powiadomienia">
                <span class="material-symbols-outlined">notifications</span>
                <span class="badge">9+</span>
            </button>

            <!-- Awatar użytkownika -->
            <div class="avatar" role="img" aria-label="Profil"></div>
        </div>
    </header>

    <!-- ========================================
         MENU BOCZNE (SIDEBAR)
         ======================================== -->
    <div class="sidebar">
        <!-- SEKCJA 1: Główne menu -->
        <div class="section">
            <!-- Link do strony głównej -->
            <div class="item"><i class="fa-solid fa-house"></i> <span>Strona Główna</span> <a href="index.html"></a></div>
            <!-- Link do shorts (krótkie wideo) -->
            <div class="item"><i class="fa-solid fa-bolt"></i> <span>Shorts</span></div>
        </div>

        <hr>

        <!-- SEKCJA 2: Subskrybowani kanały -->
        <div class="section">
            <h3 class="section-title">Subskrypcje <i class="fa-solid fa-chevron-right"></i></h3>
            
            <!-- Kanał 1 -->
            <div class="item">
                <img src="images/img4.jpg" class="avatar-sm"> <span>MrBeast</span>
            </div>
            <!-- Kanał 2 -->
            <div class="item">
                <img src="images/img5.webp" class="avatar-sm"> <span>Veritasium</span>
            </div>
            <!-- Kanał 3 -->
            <div class="item">
                <img src="images/img6.png" class="avatar-sm"> <span>Daily Dose of Internet</span>
            </div>

            <!-- Przycisk rozwijania listy -->
            <div class="item"><i class="fa-solid fa-chevron-down"></i> <span>Rozwiń</span></div>
        </div>

        <hr>

        <!-- SEKCJA 3: Twoja biblioteka -->
        <div class="section">
            <h3 class="section-title">Ty <i class="fa-solid fa-chevron-right"></i></h3>
            <!-- Historia oglądania -->
            <div class="item"><i class="fa-solid fa-clock-rotate-left"></i> <span>Historia</span></div>
            <!-- Zapisane playlisty -->
            <div class="item"><i class="fa-solid fa-list-ul"></i> <span>Playlisty</span></div>
            <!-- Wideo do obejrzenia później -->
            <div class="item"><i class="fa-solid fa-clock"></i> <span>Obejrzyj później</span></div>
            <!-- Polubione wideo -->
            <div class="item"><i class="fa-solid fa-thumbs-up"></i> <span>Polubione</span></div>
            <!-- Moje filmy -->
            <div class="item"><i class="fa-solid fa-video"></i> <span>Twoje filmy</span></div>
            <!-- Pobrane wideo -->
            <div class="item"><i class="fa-solid fa-download"></i> <span>Pobrane</span></div>
            <!-- Przycisk rozwijania -->
            <div class="item"><i class="fa-solid fa-chevron-down"></i> <span>Rozwiń</span></div>
        </div>

        <hr>

        <!-- SEKCJA 4: Kategorie treści -->
        <div class="section">
            <h3 class="section-title">Navigator</h3>
            <!-- Muzyka -->
            <div class="item"><i class="fa-solid fa-music"></i> <span>Muzyka</span></div>
            <!-- Filmy -->
            <div class="item"><i class="fa-solid fa-film"></i> <span>Filmy</span></div>
            <!-- Transmisje na żywo -->
            <div class="item"><i class="fa-solid fa-tower-broadcast"></i> <span>Transmisje</span></div>
            <!-- Rozwiń -->
            <div class="item"><i class="fa-solid fa-chevron-down"></i> <span>Rozwiń</span></div>
        </div>

        <hr>

        <!-- SEKCJA 5: Premium i usługi -->
        <div class="section">
            <h3 class="section-title">Inne możliwości</h3>
            <!-- YouTube Premium -->
            <div class="item"><i class="fa-brands fa-youtube" style="color: #ff0000;"></i> <span>YouTube Premium</span></div>
            <!-- Studio dla twórców -->
            <div class="item"><i class="fa-solid fa-square-rss" style="color: #ff0000;"></i> <span>Studio kreatywne</span></div>
            <!-- YouTube Music -->
            <div class="item"><i class="fa-solid fa-circle-play" style="color: #ff0000;"></i> <span>YouTube Music</span></div>
            <!-- YouTube Kids -->
            <div class="item"><i class="fa-solid fa-child" style="color: #ff0000;"></i> <span>YouTube Dzieci</span></div>
        </div>
    </div>

    <!-- ========================================
         GŁÓWNA SIATKA WIDEO
         ======================================== -->
    <main class="video-grid">
        <?php
        /**
         * PĘTLA WHILE - wyświetlanie wideo
         * 
         * Ta pętla pobiera każdy wiersz z bazy danych
         * i tworzy dla niego kartę wideo
         */
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <!-- KARTA WIDEO -->
            <div class="video-card">
                <!-- Kontener thumbnaila (miniatury) -->
                <div class="thumbnail-container">
                    <!-- Link do strony przeglądania wideo z ID -->
                    <a href="watch.php?id=<?php echo $row['id']; ?>">
                        <!-- Zdjęcie wideo -->
                        <img src="<?php echo $row['thumbnail']; ?>" class="thumbnail">
                    </a>
                </div>

                <!-- INFORMACJE POD WIDEO -->
                <div class="video-info-container">
                    <!-- Tekst: tytuł, kanał, statystyka -->
                    <div class="video-text" style="margin-left: 0;">
                        <!-- Tytuł wideo z bazy danych -->
                        <h4 class="video-title"><?php echo $row['title']; ?></h4>
                        <!-- Nazwa kanału -->
                        <p class="channel-name"><?php echo $row['channel_name']; ?></p>
                        <!-- Statystyka: ilość wyświetleń, data publikacji -->
                        <p class="video-stats"><?php echo $row['stats']; ?></p>
                    </div>
                    <!-- Przycisk "więcej" (trzy kropki) -->
                    <i class="fa-solid fa-ellipsis-vertical more-btn"></i>
                </div>
            </div>

        <?php
        } // Koniec pętli while
        ?>
    </main>

</body>
</html>





</main>

    <main class="video-grid">
        <?php
        // 3. PĘTLA WHILE: Działa jak linia montażowa.
        // Bierze pierwszy wiersz z bazy -> rysuje kartę -> bierze drugi -> rysuje kartę... i tak do końca.
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
        } // 4. Koniec pętli
        ?>
    </main>
<script src="theme.js"></script>
</body>
</html>