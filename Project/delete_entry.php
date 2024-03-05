<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Entry</title>
    <link rel="stylesheet" type="text/css" href="sheet/delete-entry.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">

    <?php
    $diaryFile = 'diary.txt';

    // Check if the diary file exists
    if (file_exists($diaryFile)) {
        $diaryContent = json_decode(file_get_contents($diaryFile), true);

        // Check if the key is provided in the URL
        if (isset($_GET['key']) && array_key_exists($_GET['key'], $diaryContent)) {
            $key = $_GET['key'];

            // Remove the entry
            unset($diaryContent[$key]);

            // Save updated content back to the file
            file_put_contents($diaryFile, json_encode(array_values($diaryContent)));  // Reindex array after deletion

            echo "<p class='success-message'>Diary entry deleted successfully!</p>";
            echo "<a href='view_diary.php' class='back-button'>Back to View Diary</a>";
        } else {
            echo "<p class='error-message'>Invalid entry key.</p>";
        }
    } else {
        echo "<p class='error-message'>Diary file does not exist.</p>";
    }
    ?>

</div>

</body>
</html>
