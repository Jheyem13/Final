<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Entry</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="sheet/edit_entry.css">
</head>
<body>

<?php
$diaryFile = 'diary.txt';

// Check if the diary file exists
if (file_exists($diaryFile)) {
    $diaryContent = json_decode(file_get_contents($diaryFile), true);

    // Check if the key is provided in the URL
    if (isset($_GET['key']) && array_key_exists($_GET['key'], $diaryContent)) {
        $key = $_GET['key'];
        $entry = $diaryContent[$key];

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize input data
            $editedTitle = htmlspecialchars(strip_tags($_POST['edited_title']));
            $editedContent = htmlspecialchars(strip_tags($_POST['edited_content']));

            // Update the entry
            $diaryContent[$key]['title'] = $editedTitle;
            $diaryContent[$key]['content'] = $editedContent;

            // Save updated content back to the file
            file_put_contents($diaryFile, json_encode($diaryContent));

            echo "<p>Diary entry updated successfully!</p>";
            echo "<a href='view_diary.php'>Back to View Diary</a>";
        } else {
            // Display the edit form
            echo "<form method='post'>";
            echo "<label for='edited_title'>Edited Title:</label>";
            echo "<input type='text' id='edited_title' name='edited_title' value='" . htmlspecialchars($entry['title']) . "' required>";
            echo "<br>";
            echo "<label for='edited_content'>Edited Content:</label>";
            echo "<textarea id='edited_content' name='edited_content' rows='4' required>" . htmlspecialchars($entry['content']) . "</textarea>";
            echo "<br>";
            echo "<input type='submit' value='Save'>";
            echo "</form>";
        }
    } else {
        echo "<p>Invalid entry key.</p>";
    }
} else {
    echo "<p>Diary file does not exist.</p>";
}
?>

</body>
</html>