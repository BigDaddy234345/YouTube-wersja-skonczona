<?php
require_once 'db.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['video_id']) && isset($data['text'])) {
    $video_id = intval($data['video_id']);
    $text = trim($data['text']);
    
  
    $author = "Gość"; 

    if (!empty($text)) {
        $stmt = mysqli_prepare($link, "INSERT INTO comments (video_id, author_name, comment_text) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "iss", $video_id, $author, $text);
        
        if (mysqli_stmt_execute($stmt)) {

            echo json_encode(['status' => 'success', 'author' => $author, 'text' => htmlspecialchars($text)]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Błąd bazy danych']);
        }
        mysqli_stmt_close($stmt);
    }
}
?>