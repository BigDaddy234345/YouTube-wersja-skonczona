<?php
require_once 'db.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['video_id'])) {
    $video_id = intval($data['video_id']);
    
    $stmt = mysqli_prepare($link, "UPDATE videos SET likes = likes + 1 WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $video_id);
    
    if (mysqli_stmt_execute($stmt)) {
        $res = mysqli_query($link, "SELECT likes FROM videos WHERE id = $video_id");
        $row = mysqli_fetch_assoc($res);
        
        echo json_encode(['status' => 'success', 'new_likes' => $row['likes']]);
    } else {
        echo json_encode(['status' => 'error']);
    }
    mysqli_stmt_close($stmt);
}
?>