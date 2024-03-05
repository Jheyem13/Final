<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diary CRUD</title>
    <link rel="stylesheet" type="text/css" href="sheet/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="sheet/sidebar.css">
</head>
<body>

<nav class="sidebar">
    <div class="logo-menu">
        <h2 class="logo">DailyDraft</h2>
        <i class='bx bx-menu toggle-btn'></i>
    </div>
 
    <ul class="list">
        <li class="list-item active">
            <a href="home.php">
                <i class='bx bx-home'></i>
                <span class="link-name" style="--i:1;">Home</span>
            </a>
        </li>
        <li class="list-item">
            <a href="write.php">
                <i class='bx bxs-edit'></i>
                <span class="link-name" style="--i:2;">Write Journal</span>
            </a>
        </li>
        <li class="list-item">
            <a href="view_diary.php">
                <i class='bx bx-book-reader'></i>
                <span class="link-name" style="--i:3;">Read Journal</span>
            </a>
        </li>
        <li class="list-item">
            <a href="#">
                <i class='bx bx-question-mark'></i>
                <span class="link-name" style="--i:4;">About</span>
            </a>
        </li>
        <li class="list-item">
            <a href="#">
                <i class='bx bx-cog'></i>
                <span class="link-name" style="--i:5;">Services</span>
            </a>
        </li>
        <li class="list-item">
            <a href="#">
                <i class='bx bx-hash'></i>
                <span class="link-name" style="--i:6;">Contact</span>
            </a>
        </li>
        <li class="list-item">
            <a href="edit.php">
                <i class='bx bx-user-circle'></i>
                <span class="link-name" style="--i:7;">Edit Profile</span>
            </a>
        </li>
        <li class="list-item">
            <a href="#">
                <i class='bx bx-log-out'></i>
                <span class="link-name" style="--i:8;">Logout</span>
            </a>
        </li>
    </ul>
</nav>

<div class="container">
    <!-- Title Paragraph -->
    <p class="title-paragraph">What is your Daily Draft Today?</p>

    <?php
    // Your PHP code goes here
    function sanitizeData($data) {
        return htmlspecialchars(strip_tags($data));
    }

    $successMessage = ""; // Initialize an empty variable to hold the success message

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $diaryFile = 'diary.txt';
        $diaryContent = [];

        if (file_exists($diaryFile)) {
            $diaryContent = json_decode(file_get_contents($diaryFile), true);
        }

        $title = sanitizeData($_POST['title']);
        $content = sanitizeData($_POST['content']);

        if (isset($_POST['edit_entry'])) {
            $editIndex = $_POST['edit_entry'];
            $diaryContent[$editIndex]['title'] = $title;
            $diaryContent[$editIndex]['content'] = $content;
        } else {
            $entry = [
                'title' => $title,
                'content' => $content,
                'timestamp' => time()
            ];

            $diaryContent[] = $entry;
        }

        file_put_contents($diaryFile, json_encode($diaryContent));

        $successMessage = "Diary entry " . (isset($_POST['edit_entry']) ? "updated" : "added") . " successfully!";
    }
    ?>

    <!-- Diary Form -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="content">Content:</label>
        <textarea id="content" name="content" rows="4" required></textarea>
        <br>
        <input type="submit" value="Submit">
    </form>

    <!-- Success Message -->
    <?php if (!empty($successMessage)): ?>
        <p class="success-message"><?php echo $successMessage; ?> <a href='view_diary.php' class='view-button'>View Diary</a></p>
    <?php endif; ?>
</div>

<script src="script.js"></script>
</body>
</html>
