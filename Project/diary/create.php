<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $entry = [
        'id' => uniqid(),
        'title' => $title,
        'content' => $content,
    ];

    $entries = getDiaryEntries();
    $entries[] = $entry;

    saveDiaryEntries($entries);

    header("Location: write.php");
    exit();
}
?>