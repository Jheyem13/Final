<?php
function getDiaryEntries($con, $user_id) {
    $entries = array();
    $diary_query = mysqli_query($con, "SELECT * FROM journal_entries WHERE user_id = $user_id ORDER BY entry_date DESC");

    while($entry_result = mysqli_fetch_assoc($diary_query)){
        $entries[] = $entry_result;
    }

    return $entries;
}

function createDiaryEntry($con, $user_id, $entry_text) {
    $entry_date = date("Y-m-d");
    $entry_text = mysqli_real_escape_string($con, $entry_text);

    $query = "INSERT INTO journal_entries (user_id, entry_date, entry_text) VALUES ('$user_id', '$entry_date', '$entry_text')";
    mysqli_query($con, $query);
}
?>