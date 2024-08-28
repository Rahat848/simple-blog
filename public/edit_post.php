<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

include '../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts WHERE id='$id' AND user_id='{$_SESSION['user_id']}'";
    $result = mysqli_query($conn, $sql);
    $post = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $sql = "UPDATE posts SET title='$title', content='$content' WHERE id='$id' AND user_id='{$_SESSION['user_id']}'";
    if (mysqli_query($conn, $sql)) {
        header('Location: index.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <form class="container" method="POST">
    <input type="text" name="title" value="<?php echo $post['title']; ?>" required>
    <textarea name="content" required><?php echo $post['content']; ?></textarea>
    <button type="submit">Update Post</button>
</form>
</body>
</html>
