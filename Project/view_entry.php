<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Entry</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="sheet/view-entry.css">
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
            $entry = $diaryContent[$key];

            echo "<h3>Title:</h3>","" . htmlspecialchars($entry['title']) . "</h2>";
            echo "<h3>Content:</h3>";
            echo "<p>" . nl2br(htmlspecialchars($entry['content'])) . "</p>";
            echo "<p><em>Timestamp: " . date('Y-m-d H:i:s', $entry['timestamp']) . "</em></p>";

            // Back to View Diary Button
            echo "<a href='view_diary.php' class='back-button'>Back to View Diary</a>";
        } else {
            echo "<p>Invalid entry key.</p>";
        }
    } else {
        echo "<p>Diary file does not exist.</p>";
    }
    ?>

</div>

</body>
</html>
