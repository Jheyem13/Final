<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Diary</title>
    <link rel="stylesheet" type="text/css" href="sheet/view-diary.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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

<h2>Diary Entries</h2>

<?php
$diaryFile = 'diary.txt';

// Check if the diary file exists
if (file_exists($diaryFile)) {
    $diaryContent = json_decode(file_get_contents($diaryFile), true);

    // Check if there are entries to display
    if (!empty($diaryContent)) {
        foreach ($diaryContent as $key => $entry) {
            echo "<h3>" . htmlspecialchars($entry['title']) . "</h3>";
            echo "<p>" . nl2br(htmlspecialchars($entry['content'])) . "</p>";
            echo "<p><em>Timestamp: " . date('Y-m-d H:i:s', $entry['timestamp']) . "</em></p>";

            // View Button
            echo "<a href='view_entry.php?key={$key}'>View</a>";

            // Edit Button
            echo " | <a href='edit_entry.php?key={$key}'>Edit</a>";

            // Delete Button
            echo " | <a href='delete_entry.php?key={$key}'>Delete</a>";

            echo "<hr>";
        }
    } else {
        echo "<p>No diary entries available.</p>";
    }
} else {
    echo "<p>Diary file does not exist.</p>";
}
?>

<!-- Add "Write a Diary" button -->
<a href='write.php' class='write-button'>Write a Diary</a>

</div>

<script src="script.js"></script>
</body>
</html>