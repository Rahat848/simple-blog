<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Simple Blog</title>
</head>
<body>
    <header>
        <h1>Simple Blog</h1>
        <nav>
            <a href="index.php">Home</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="create_post.php">Create Post</a>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="register.php">Register</a>
                <a href="login.php">Login</a>
            <?php endif; ?>
        </nav>
    </header>
