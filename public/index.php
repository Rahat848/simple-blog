<?php
session_start();
include '../config/db.php';
include '../includes/header.php';
$sql = "SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
echo "<div class='container'>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='post'> <h2>{$row['title']}</h2>";
    echo "<p class='meta'>by {$row['username']} on {$row['created_at']}</p>";
    echo "<p class='content'>{$row['content']}</p>";
    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $row['user_id']) {
        echo "<a class='btn edit-btn' href='edit_post.php?id={$row['id']}'>Edit</a> | <a class='btn delete-btn' href='delete_post.php?id={$row['id']}'>Delete</a>";
    }
    echo "</div><hr>";
}
echo "</div>";
include '../includes/footer.php';
mysqli_close($conn);
?>
