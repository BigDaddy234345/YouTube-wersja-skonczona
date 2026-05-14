<?php
require_once 'db.php';

$video_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$stmt = mysqli_prepare($link, "SELECT * FROM videos WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $video_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row    = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$row) {
    header('Location: index.php');
    exit;
}

$current_category = mysqli_real_escape_string($link, $row['category'] ?? '');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($row['title']); ?> - YouTube Clone</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="style2.css">
</head>
<body>

<header class="pasek-gora">
    <div class="start">
        <button class="menu-icon" id="sidebar-toggle" aria-label="Menu">
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
</header>

<main class="watch-page-layout">
    <div class="primary-column">
        <div class="video-player-wrapper">
            <iframe src="<?php echo htmlspecialchars($row['video_url']); ?>" frameborder="0" allowfullscreen></iframe>
        </div>

        <h1 class="watch-title"><?php echo htmlspecialchars($row['title']); ?></h1>

        <div class="watch-metadata">
            <div class="channel-info">
                <img src="images/img1.jpg" alt="Avatar kanału" class="channel-avatar">
                <div class="channel-text">
                    <strong><?php echo htmlspecialchars($row['channel_name']); ?> <i class="fa-solid fa-circle-check"></i></strong>
                    <span><?php echo htmlspecialchars($row['subscribers'] ?? '69,6 tys. subskrybentów'); ?></span>
                </div>
                <button class="subscribe-btn">Zasubskrybuj</button>
            </div>

            <div class="action-buttons">
                <div class="like-dislike-group">
                    <button class="action-btn" id="btn-like">
                        <i class="fa-regular fa-thumbs-up"></i>
                        <span id="like-count"><?php echo intval($row['likes'] ?? 0); ?></span>
                    </button>
                    <div class="btn-divider"></div>
                    <button class="action-btn" id="btn-dislike">
                        <i class="fa-regular fa-thumbs-down"></i>
                    </button>
                </div>
                <button class="action-btn">
                    <i class="fa-solid fa-share"></i> Fajny przycisk
                </button>
                <button class="action-btn">
                    <i class="fa-regular fa-bookmark"></i> Bardzo fajny przycisk
                </button>
            </div>
        </div>

        <div class="watch-description">
            <p><strong><?php echo htmlspecialchars($row['stats'] ?? ''); ?></strong></p>
            <p><?php echo nl2br(htmlspecialchars($row['description'] ?? '')); ?></p>
        </div>

        <div class="comments-sekcja">
    <h3>Komentarze</h3>
    <div class="add-comment">
        <input type="hidden" id="current-video-id" value="<?php echo $video_id; ?>">
        <input type="text" id="comment-input" placeholder="Dodaj komentarz...">
        <button id="comment-submit-btn">Skomentuj</button>
    </div>
    
    <div id="comments-list">
        <?php
        $stmt_comments = mysqli_prepare($link, "SELECT * FROM comments WHERE video_id = ? ORDER BY created_at DESC");
        mysqli_stmt_bind_param($stmt_comments, "i", $video_id);
        mysqli_stmt_execute($stmt_comments);
        $res_comments = mysqli_stmt_get_result($stmt_comments);
        
        while ($c = mysqli_fetch_assoc($res_comments)) {
            echo '<div class="single-comment">';
            echo '<strong>' . htmlspecialchars($c['author_name']) . '</strong>';
            echo '<p>' . htmlspecialchars($c['comment_text']) . '</p>';
            echo '</div>';
        }
        mysqli_stmt_close($stmt_comments);
        ?>
        </div>
    </div>
</div>
    <div class="secondary-column">
        <div class="sidebar-filters">
            <button class="filter-btn active">Wszystkie wideo</button>
            <button class="filter-btn">Z tej samej serii</button>
        </div>

<?php
        $shown = [$video_id];

        $rec_result = mysqli_query($link, "SELECT * FROM videos WHERE category = '$current_category' AND id != $video_id ORDER BY RAND() LIMIT 4");
        $count = mysqli_num_rows($rec_result);

        while ($rec = mysqli_fetch_assoc($rec_result)) {
            $shown[] = $rec['id']; 
        ?>
        <a href="watch.php?id=<?php echo $rec['id']; ?>" class="side-video">
            <img src="<?php echo htmlspecialchars($rec['thumbnail']); ?>" alt="<?php echo htmlspecialchars($rec['title']); ?>">
            <div class="side-video-info">
                <h4><?php echo htmlspecialchars($rec['title']); ?></h4>
                <p><?php echo htmlspecialchars($rec['channel_name']); ?></p>
                <p><?php echo htmlspecialchars($rec['stats']); ?></p>
            </div>
        </a>
        <?php } ?>

        <?php 
        $needed = 6 - $count; 
        
        if ($needed > 0): 
            $excluded = implode(',', $shown);

            $extra_result = mysqli_query($link, "SELECT * FROM videos WHERE id NOT IN ($excluded) AND category != '$current_category' ORDER BY RAND() LIMIT $needed");
            
            while ($extra = mysqli_fetch_assoc($extra_result)) {
        ?>
        <a href="watch.php?id=<?php echo $extra['id']; ?>" class="side-video">
            <img src="<?php echo htmlspecialchars($extra['thumbnail']); ?>" alt="<?php echo htmlspecialchars($extra['title']); ?>">
            <div class="side-video-info">
                <h4><?php echo htmlspecialchars($extra['title']); ?></h4>
                <p><?php echo htmlspecialchars($extra['channel_name']); ?></p>
                <p><?php echo htmlspecialchars($extra['stats']); ?></p>
            </div>
        </a>
        <?php } ?>
        <?php endif; ?>
    </div>
</main>


<script src="watch.js"></script>
</body>
</html>


