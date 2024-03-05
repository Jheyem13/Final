<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $entries = getDiaryEntries();

    $selectedEntry = null;

    foreach ($entries as $entry) {
        if ($entry['id'] === $id) {
            $selectedEntry = $entry;
            break;
        }
    }

    if ($selectedEntry) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Entry</title>
        </head>
        <body>

        <h2>Edit Entry</h2>

        <form action="update.php?id=<?= $selectedEntry['id'] ?>" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?= $selectedEntry['title'] ?>" required><br>

            <label for="content">Content:</label><br>
            <textarea id="content" name="content" rows="4" cols="50"
                      required><?= $selectedEntry['content'] ?></textarea><br>

            <input type="submit" value="Update">
        </form>

        </body>
        </html>
        <?php
    } else {
        echo "Entry not found.";
    }
} else {
    header("Location: write.php");
    exit();
}
?>