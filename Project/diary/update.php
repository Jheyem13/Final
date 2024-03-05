<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $entries = getDiaryEntries();

    foreach ($entries as &$entry) {
        if ($entry['id'] === $id) {
            $entry['title'] = $title;
            $entry['content'] = $content;
            break;
        }
    }

    saveDiaryEntries($entries);

    header("Location: write.php");
    exit();
} else {
    header("Location: write.php");
    exit();
}
?>
