<?php
include("php/config.php");
include("diary.php");

if(!isset($_SESSION['valid'])){
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['id'];
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="sheet/home.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <title>Home</title>

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
    <a href="write.php" onclick="openWriteJournalPopup()">
        <i class='bx bxs-edit'></i>
        <span class="link-name" style="--i:2;">Write Journal</span>
    </a>
</li>

    </li>
    <li class="list-item">
        <a href="view_diary.php">
        <i class='bx bx-book-reader'></i>
            <span class="link-name" stlye="--i:3;">Read Journal</span>
        </a>
    </li>
    <li class="list-item">
        <a href="#">
        <i class='bx bx-question-mark'></i>
            <span class="link-name" stlye="--i:4;">About</span>
        </a>
    </li>
    <li class="list-item">
        <a href="#">
        <i class='bx bx-cog'></i>
            <span class="link-name" stlye="--i:5;">Services</span>
        </a>
    </li>
    <li class="list-item">
        <a href="#">
        <i class='bx bx-hash'></i>
            <span class="link-name" stlye="--i:6;">Contact</span>
        </a>
    </li>
    
    <li class="list-item">
            <a href="edit.php">
                <i class='bx bx-user-circle'></i>
                <span class="link-name" style="--i:7;">Edit Profile</span>
            </a>
        </li>

    <li class="list-item">
        <a href="php/logout.php">
        <i class='bx bx-log-out'></i>
            <span class="link-name" stlye="--i:8;">Logout</span>
        </a>
    </li>
    </ul>
    </nav>
   

        <main>



        </main>

    

        <script src="script.js"></script>
    </body>
    </html>