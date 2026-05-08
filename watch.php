<?php
/**
 * ========================================
 * СТРАНИЦА ПРОСМОТРА ВИДЕО (WATCH PAGE)
 * ========================================
 * 
 * Этот скрипт отображает видео по его ID из БД,
 * показывает информацию о канале, описание и рекомендации
 */

// Подключаем конфиг БД и функции
require_once 'db.php';

/**
 * ========================================
 * 1. ПОЛУЧЕНИЕ ID ВИДЕО И ПРОВЕРКА
 * ========================================
 */

// Получаем ID видео из URL параметра (?id=123)
// intval() защищает от SQL инъекций преобразуя в число
$video_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Запрос видео по ID
$sql = "SELECT * FROM videos WHERE id = " . $video_id;
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

// Если видео не найдено - перенаправляем на главную
if (!$row) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- ========================================
         МЕТАДАННЫЕ СТРАНИЦЫ
         ======================================== -->
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Название страницы в браузере (показывает название видео) -->
    <title><?php echo $row['title']; ?> - Мой Ютуб</title>
    
    <!-- ========================================
         ПОДКЛЮЧЕНИЕ ШРИФТОВ И ИКОНОК
         ======================================== -->
    
    <!-- Иконки Google Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    
    <!-- Иконки Font Awesome (для лайков, поделиться и т.д.) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Стили для страницы просмотра видео -->
    <link rel="stylesheet" href="style2.css">
</head>

<!-- ========================================
     ТЕЛО СТРАНИЦЫ С КЛАССОМ WATCH-PAGE
     ======================================== -->
<body class="watch-page">

    <!-- ========================================
         ШАПКА (HEADER) - НАВИГАЦИЯ
         ======================================== -->

    <header class="header">
        <!-- Левая часть: Меню + Логотип -->
        <div class="start">
            <!-- Кнопка меню (обычно открывает боковое меню на мобильных) -->
            <a href="index.php" class="menu-icon">
            <span class="material-symbols-outlined">menu</span>
            </a>

            <!-- Логотип YouTube -->
            <div class="logo">
                <img src="images/img.jpg" alt="Логотип">
                <span>Youtube</span>
                <!-- Код страны -->
                <span class="country-code">PL</span>
            </div>
        </div>

        <!-- Центральная часть: Поле поиска -->
        <div class="center">
            <div class="search-box">
                <input type="text" class="search-input" placeholder="Wyszukaj">
                <button class="search-btn"><span class="material-symbols-outlined">search</span></button>
            </div>
        </div>

        <!-- Правая часть: Кнопки и профиль -->
        <div class="end">
            
            <button class="create-btn" id="theme-toggle" title="Zmień motyw">
                <span class="material-symbols-outlined" id="theme-icon">light_mode</span>
            </button>

            <button class="create-btn" title="Создать">
                <span class="material-symbols-outlined">add</span>
            </button>
            <button class="create-btn" title="Уведомления">
                <span class="material-symbols-outlined">notifications</span>
                <span class="badge">9+</span>
            </button>
            <div class="avatar" role="img" aria-label="Профиль"></div>
        </div>
    </header>

    <!-- ========================================
         ОСНОВНОЙ КОНТЕНТ СТРАНИЦЫ
         ======================================== -->
    <main class="watch-page-layout">
        <!-- ========================================
             ЛЕВАЯ КОЛОНКА: ВИДЕОПЛЕЕР И ИНФОРМАЦИЯ
             ======================================== -->
        <div class="primary-column">
            
            <!-- Видеоплеер с адаптивным соотношением сторон 16:9 -->
            <div class="video-player-wrapper">
                <!-- Iframe с видео (URL из БД) -->
                <iframe src="<?php echo $row['video_url']; ?>" frameborder="0" allowfullscreen></iframe>
            </div>

            <!-- Название видео из БД -->
            <h1 class="watch-title"><?php echo $row['title']; ?></h1>

            <!-- ========================================
                 ИНФОРМАЦИЯ О КАНАЛЕ И КНОПКИ ДЕЙСТВИЙ
                 ======================================== -->
            <div class="watch-metadata">
                
                <!-- Левая часть: Аватар канала + Информация -->
                <div class="channel-info">
                    <!-- Аватар канала -->
                    <img src="images/img1.jpg" alt="Аватарка" class="channel-avatar">
                    
                    <!-- Название канала и количество подписчиков -->
                    <div class="channel-text">
                        <strong>FunPay <i class="fa-solid fa-circle-check"></i></strong>
                        <span>69,6 тыс. подписчиков</span>
                    </div>
                    
                    <!-- Кнопка подписки -->
                    <button class="subscribe-btn">Подписаться</button>
                </div>
               
                <!-- Правая часть: Кнопки действий -->
                <div class="action-buttons">
                    <!-- Лайк и дизлайк (скреплены вместе) -->
                    <div class="like-dislike-group">
                        <!-- Кнопка лайка с количеством -->
                        <button class="action-btn" id="btn-like">
                            <i class="fa-regular fa-thumbs-up"></i> 29 тыс.
                        </button>
                        <!-- Разделитель -->
                        <div class="btn-divider"></div>
                        <!-- Кнопка дизлайка (без числа) -->
                        <button class="action-btn" id="btn-dislike">
                            <i class="fa-regular fa-thumbs-down"></i>
                        </button>
                    </div>
                    
                    <!-- Кнопка поделиться -->
                    <button class="action-btn">
                        <i class="fa-solid fa-share"></i> Поделиться
                    </button>
                    
                    <!-- Кнопка сохранения видео -->
                    <button class="action-btn">
                        <i class="fa-regular fa-bookmark"></i> Сохранить
                    </button>
                </div>
            </div>

            <!-- ========================================
                 ОПИСАНИЕ ВИДЕО
                 ======================================== -->
            <div class="watch-description">
                <!-- Количество просмотров и дата -->
                <p><strong>60 тыс. просмотров • 1 день назад</strong></p>
                <!-- Полное описание из БД -->
                <p><?php echo $row['description']; ?></p>
            </div>

            <!-- ========================================
                 СЕКЦИЯ КОММЕНТАРИЕВ
                 ======================================== -->
            <div class="comments-section">
                <h3>Komentarze</h3>
                
                <!-- Форма для добавления нового комментария -->
                <div class="add-comment">
                    <input type="text" id="comment-input" placeholder="Dodaj komentarz...">
                    <button id="comment-submit-btn">Skomentuj</button>
                </div>
                
                <!-- Список комментариев -->
                <div id="comments-list">
                    <!-- Пример одного комментария -->
                    <div class="single-comment" style="margin-top: 15px; border-bottom: 1px solid #333; padding-bottom: 10px;">
                        <strong>Jan Kowalski</strong>
                        <p>Super film! Czekam na więcej.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========================================
             ПРАВАЯ КОЛОНКА: РЕКОМЕНДОВАННЫЕ ВИДЕО
             ======================================== -->
        <div class="secondary-column">
            
            <!-- ========================================
                 ФИЛЬТРЫ РЕКОМЕНДАЦИЙ
                 ======================================== -->
            <div class="sidebar-filters">
                <!-- Кнопка "Все видео" (активна по умолчанию) -->
                <button class="filter-btn active">Все видео</button>
                <!-- Кнопка "Из той же серии" -->
                <button class="filter-btn">Из той же серии</button>
            </div>

            <?php
            /**
             * ========================================
             * ПОЛУЧЕНИЕ РЕКОМЕНДОВАННЫХ ВИДЕО
             * ========================================
             * 
             * Логика:
             * 1. Получаем категорию текущего видео
             * 2. Выбираем 6 видео из той же категории
             * 3. Если их меньше 6, подбираем остальные из других категорий
             */
            
            // Получаем категорию текущего видео
            $current_category = $row['category'];
            
            // Массив с ID показанных видео (чтобы не повторять текущее)
            $shown_videos = [$video_id]; 

            // Запрос: выбираем 6 видео из той же категории (случайный порядок)
            $rec_sql = "SELECT * FROM videos WHERE category = '$current_category' AND id != $video_id ORDER BY RAND() LIMIT 6";
            $rec_result = mysqli_query($link, $rec_sql);
            $count = mysqli_num_rows($rec_result);

            // Цикл: выводим найденные видео
            while($rec_row = mysqli_fetch_assoc($rec_result)) {
                // Добавляем ID в массив показанных
                $shown_videos[] = $rec_row['id'];
                ?>
                <!-- Карточка рекомендованного видео -->
                <div class="side-video" onclick="window.location.href='watch.php?id=<?php echo $rec_row['id']; ?>'" style="cursor: pointer;">
                    <!-- Превью видео -->
                    <img src="<?php echo $rec_row['thumbnail']; ?>" alt="Превью">
                    <!-- Информация о видео -->
                    <div class="side-video-info">
                        <!-- Название видео -->
                        <h4><?php echo $rec_row['title']; ?></h4>
                        <!-- Название канала с галочкой верификации -->
                        <p><?php echo $rec_row['channel_name']; ?> <i class="fa-solid fa-circle-check"></i></p>
                        <!-- Статистика (просмотры, дата) -->
                        <p><?php echo $rec_row['stats']; ?></p>
                    </div>
                </div>
                <?php
            }

            /**
             * ========================================
             * ДОБАВЛЕНИЕ ВИДЕО ДРУГИХ КАТЕГОРИЙ
             * ========================================
             * 
             * Если видео из той же категории менее 6,
             * добавляем недостающие видео из других категорий
             */

            // Проверяем, нужны ли ещё видео
            if ($count < 6) {
                // Сколько видео ещё нужно показать
                $needed = 6 - $count;
                
                // Преобразуем массив ID в строку для SQL (1,2,3,4...)
                $excluded_ids = implode(',', $shown_videos); 
                
                // Запрос: выбираем видео, которых ещё не показали
                $extra_sql = "SELECT * FROM videos WHERE id NOT IN ($excluded_ids) ORDER BY RAND() LIMIT $needed";
                $extra_result = mysqli_query($link, $extra_sql);
                
                // Цикл: выводим дополнительные видео
                while($extra_row = mysqli_fetch_assoc($extra_result)) {
                    ?>
                    <!-- Карточка дополнительного видео -->
                    <div class="side-video" onclick="window.location.href='watch.php?id=<?php echo $extra_row['id']; ?>'" style="cursor: pointer;">
                        <!-- Превью видео -->
                        <img src="<?php echo $extra_row['thumbnail']; ?>" alt="Превью">
                        <!-- Информация о видео -->
                        <div class="side-video-info">
                            <!-- Название видео -->
                            <h4><?php echo $extra_row['title']; ?></h4>
                            <!-- Название канала с галочкой верификации -->
                            <p><?php echo $extra_row['channel_name']; ?> <i class="fa-solid fa-circle-check"></i></p>
                            <!-- Статистика (просмотры, дата) -->
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
         СКРИПТЫ И ФУНКЦИОНАЛЬНОСТЬ
         ======================================== -->
    
    <!-- Скрипт переключения темы (светлая/тёмная) -->
    <script src="theme.js"></script>
    
    <!-- Скрипт функциональности страницы просмотра (лайки, комментарии и т.д.) -->
    <script src="watch.js"></script>
</body>
</html>