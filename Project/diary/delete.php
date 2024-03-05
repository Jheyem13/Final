<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $entries = getDiaryEntries();

    foreach ($entries as $key => $entry) {
        if ($entry['id'] === $id) {
            unset($entries[$key]);
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