<?php
/**
 * ========================================
 * STRONA PRZEGLĄDANIA WIDEO (WATCH PAGE)
 * ========================================
 * 
 * Funkcja: Wyświetla video po ID z bazy danych
 * Pokazuje: Odtwarzacz, info o kanale, opis, komentarze, rekomendacje
 */

// Podłączenie bazy danych
require_once 'db.php';

/**
 * ========================================
 * 1. POBIERANIE I WALIDACJA ID WIDEO
 * ========================================
 */

// Pobierz ID z URL parametru: watch.php?id=123
// intval() zmienia na liczbę - chroni przed SQL injekcją
$video_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// SQL zapytanie - pobierz wideo o danym ID
$sql = "SELECT * FROM videos WHERE id = " . $video_id;
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

/**
 * ========================================
 * 2. SPRAWDZENIE CZY WIDEO ISTNIEJE
 * ========================================
 */

// Jeśli wideo nie znalezione - przekieruj na stronę główną
if (!$row) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <!-- ========================================
         METADANE STRONY
         ======================================== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tytuł strony - pokazuje tytuł wideo -->
    <title><?php echo $row['title']; ?> - Mój YouTube</title>
    
    <!-- ========================================
         PODŁĄCZENIE CZCIONEK I IKON
         ======================================== -->
    
    <!-- Material Symbols - ikony od Google -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    
    <!-- Font Awesome - ikony sieciowe i więcej -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Style CSS dla strony przeglądania wideo -->
    <link rel="stylesheet" href="style2.css">
</head>

<!-- ========================================
     TREŚĆ STRONY
     ======================================== -->
<body class="watch-page">

    <!-- ========================================
         NAGŁÓWEK (HEADER) - NAWIGACJA
         ======================================== -->

    <header class="header">
        <!-- LEWA CZĘŚĆ: Menu + Logo -->
        <div class="start">
            <!-- Przycisk menu -->
<button class="menu-icon" onclick="window.location.href='index.php'">
    <span class="material-symbols-outlined">menu</span>
</button>

            <!-- Logo YouTube -->
            <div class="logo">
                <!-- Dwa warianty logo - ciemny i jasny -->
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
                <!-- Pole tekstowe -->
                <input type="text" class="search-input" placeholder="Wyszukaj">
                <!-- Przycisk wyszukiwania -->
                <button class="search-btn"><span class="material-symbols-outlined">search</span></button>
            </div>
        </div>

        <!-- PRAWA CZĘŚĆ: Przyciski i profil -->
        <div class="end">
            <!-- Przycisk motywu -->
            <button class="create-btn" id="theme-toggle" title="Zmień motyw">
                <span class="material-symbols-outlined" id="theme-icon">light_mode</span>
            </button>

            <!-- Przycisk tworzenia -->
            <button class="create-btn" title="Utwórz">
                <span class="material-symbols-outlined">add</span>
            </button>
            
            <!-- Powiadomienia -->
            <button class="create-btn" title="Powiadomienia">
                <span class="material-symbols-outlined">notifications</span>
                <span class="badge">9+</span>
            </button>
            
            <!-- Profil użytkownika -->
            <div class="avatar" role="img" aria-label="Profil"></div>
        </div>
    </header>

    <!-- ========================================
         GŁÓWNA ZAWARTOŚĆ STRONY
         ======================================== -->
    <main class="watch-page-layout">
        <!-- ========================================
             LEWA KOLUMNA: ODTWARZACZ WIDEO I INFORMACJE
             ======================================== -->
        <div class="primary-column">
            
            <!-- ODTWARZACZ WIDEO -->
            <!-- Adaptacyjny kontener z proporcją 16:9 -->
            <div class="video-player-wrapper">
                <!-- Iframe z wideo YouTube -->
                <iframe src="<?php echo $row['video_url']; ?>" frameborder="0" allowfullscreen></iframe>
            </div>

            <!-- TYTUŁ WIDEO -->
            <h1 class="watch-title"><?php echo $row['title']; ?></h1>

            <!-- ========================================
                 METADANE WIDEO (Kanał + Przyciski)
                 ======================================== -->
            <div class="watch-metadata">
                
                <!-- LEWA CZĘŚĆ: Informacje o kanale -->
                <div class="channel-info">
                    <!-- Avatar kanału -->
                    <img src="images/img1.jpg" alt="Avatar" class="channel-avatar">
                    
                    <!-- Dane kanału -->
                    <div class="channel-text">
                        <!-- Nazwa kanału z ikoną weryfikacji -->
                        <strong>FunPay <i class="fa-solid fa-circle-check"></i></strong>
                        <!-- Liczba subskrybentów -->
                        <span>69,6 tys. subskrybentów</span>
                    </div>
                    
                    <!-- Przycisk do subskrypcji kanału -->
                    <button class="subscribe-btn">Zasubskrybuj</button>
                </div>
               
                <!-- PRAWA CZĘŚĆ: Przyciski akcji -->
                <div class="action-buttons">
                    <!-- GRUPA POLUBIENIE/NIECHĘĆ -->
                    <div class="like-dislike-group">
                        <!-- Polubienie -->
                        <button class="action-btn" id="btn-like">
                            <i class="fa-regular fa-thumbs-up"></i> 29 tys.
                        </button>
                        <!-- Separator -->
                        <div class="btn-divider"></div>
                        <!-- Niechęć -->
                        <button class="action-btn" id="btn-dislike">
                            <i class="fa-regular fa-thumbs-down"></i>
                        </button>
                    </div>
                    
                    <!-- Udostępnij -->
                    <button class="action-btn">
                        <i class="fa-solid fa-share"></i> Udostępnij
                    </button>
                    
                    <!-- Zapisz -->
                    <button class="action-btn">
                        <i class="fa-regular fa-bookmark"></i> Zapisz
                    </button>
                </div>
            </div>

            <!-- ========================================
                 OPIS WIDEO
                 ======================================== -->
            <div class="watch-description">
                <!-- Liczba wyświetleń i data publikacji -->
                <p><strong>60 tys. wyświetleń • 1 dzień temu</strong></p>
                <!-- Pełny opis z bazy danych -->
                <p><?php echo $row['description']; ?></p>
            </div>

            <!-- ========================================
                 SEKCJA KOMENTARZY
                 ======================================== -->
            <div class="comments-section">
                <h3>Komentarze</h3>
                
                <!-- FORMULARZ DO DODANIA KOMENTARZA -->
                <div class="add-comment">
                    <!-- Pole do wpisania tekstu komentarza -->
                    <input type="text" id="comment-input" placeholder="Dodaj komentarz...">
                    <!-- Przycisk wysyłania komentarza -->
                    <button id="comment-submit-btn">Skomentuj</button>
                </div>
                
                <!-- LISTA KOMENTARZY -->
                <div id="comments-list">
                    <!-- Przykład komentarza -->
                    <div class="single-comment" style="margin-top: 15px; border-bottom: 1px solid #333; padding-bottom: 10px;">
                        <strong>Jan Kowalski</strong>
                        <p>Super film! Czekam na więcej.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========================================
             PRAWA KOLUMNA: POLECANE WIDEO
             ======================================== -->
        <div class="secondary-column">
            
            <!-- ========================================
                 FILTRY REKOMENDACJI
                 ======================================== -->
            <div class="sidebar-filters">
                <!-- Wszystkie wideo (domyślnie aktywny) -->
                <button class="filter-btn active">Wszystkie wideo</button>
                <!-- Z tej samej serii -->
                <button class="filter-btn">Z tej samej serii</button>
            </div>

            <?php
            /**
             * ========================================
             * POBIERANIE POLECANYCH WIDEO
             * ========================================
             * 
             * Algorytm:
             * 1. Pobierz kategorię bieżącego wideo
             * 2. Pobierz 6 wideo z tej samej kategorii (losowa kolejność)
             * 3. Jeśli jest mniej niż 6, uzupełnij z innych kategorii
             */
            
            // Kategoria bieżącego wideo
            $current_category = $row['category'];
            
            // Tablica ID już wyświetlonych wideo (aby uniknąć powtórzeń)
            $shown_videos = [$video_id]; 

            // ZAPYTANIE 1: Wideo z tej samej kategorii
            $rec_sql = "SELECT * FROM videos WHERE category = '$current_category' AND id != $video_id ORDER BY RAND() LIMIT 6";
            $rec_result = mysqli_query($link, $rec_sql);
            $count = mysqli_num_rows($rec_result);

            // PĘTLA 1: Wyświetlanie wideo z tej samej kategorii
            while($rec_row = mysqli_fetch_assoc($rec_result)) {
                $shown_videos[] = $rec_row['id'];
                ?>
                <!-- KARTA POLCANEGO WIDEO -->
                <div class="side-video" onclick="window.location.href='watch.php?id=<?php echo $rec_row['id']; ?>'" style="cursor: pointer;">
                    <!-- Miniatura wideo -->
                    <img src="<?php echo $rec_row['thumbnail']; ?>" alt="Podgląd">
                    <!-- Informacje -->
                    <div class="side-video-info">
                        <!-- Tytuł -->
                        <h4><?php echo $rec_row['title']; ?></h4>
                        <!-- Kanał z ikoną weryfikacji -->
                        <p><?php echo $rec_row['channel_name']; ?> <i class="fa-solid fa-circle-check"></i></p>
                        <!-- Statystyka -->
                        <p><?php echo $rec_row['stats']; ?></p>
                    </div>
                </div>
                <?php
            }

            /**
             * ========================================
             * UZUPEŁNIANIE Z INNYCH KATEGORII
             * ========================================
             * 
             * Jeśli wideo z tej samej kategorii jest mniej niż 6,
             * pobieramy wideo z pozostałych kategorii
             */

            if ($count < 6) {
                // Ile wideo jeszcze potrzeba
                $needed = 6 - $count;
                
                // Konwertuj tablicę ID na SQL format (1,2,3,4...)
                $excluded_ids = implode(',', $shown_videos); 
                
                // ZAPYTANIE 2: Wideo z innych kategorii
                $extra_sql = "SELECT * FROM videos WHERE id NOT IN ($excluded_ids) ORDER BY RAND() LIMIT $needed";
                $extra_result = mysqli_query($link, $extra_sql);
                
                // PĘTLA 2: Wyświetlanie dodatkowych wideo
                while($extra_row = mysqli_fetch_assoc($extra_result)) {
                    ?>
                    <!-- KARTA DODATKOWEGO WIDEO -->
                    <div class="side-video" onclick="window.location.href='watch.php?id=<?php echo $extra_row['id']; ?>'" style="cursor: pointer;">
                        <!-- Miniatura -->
                        <img src="<?php echo $extra_row['thumbnail']; ?>" alt="Podgląd">
                        <!-- Informacje -->
                        <div class="side-video-info">
                            <!-- Tytuł -->
                            <h4><?php echo $extra_row['title']; ?></h4>
                            <!-- Kanał -->
                            <p><?php echo $extra_row['channel_name']; ?> <i class="fa-solid fa-circle-check"></i></p>
                            <!-- Statystyka -->
                            <p><?php echo $extra_row['stats']; ?></p>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </main>

    <!-- ========================================
         SKRYPTY
         ======================================== -->
    
    <!-- Przełączanie motywu (jasny/ciemny) -->
    <script src="theme.js"></script>
    
    <!-- Funkcjonalność strony (polubienia, komentarze) -->
    <script src="watch.js"></script>
</body>
</html>