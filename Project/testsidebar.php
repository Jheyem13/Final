<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <link rel="stylesheet" href="sheet/test.css">
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
    <a href="#">
    <i class='bx bx-home'></i>
        <span class="link-name" style="--i:1;">Home</span>
    </a>
</li>
<li class="list-item">
    <a href="#">
    <i class='bx bxs-edit'></i>
        <span class="link-name" stlye="--i:2;">Write Journal</span>
    </a>
</li>
<li class="list-item">
    <a href="#">
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
    <a href="#">
    <i class='bx bx-user-circle'></i>
        <span class="link-name" stlye="--i:7;">User Profile</span>
    </a>
</li>
<li class="list-item">
    <a href="#">
    <i class='bx bx-log-out'></i>
        <span class="link-name" stlye="--i:8;">Logout</span>
    </a>
</li>
</ul>
</nav>

<script src="script.js"></script>
</body>
</html>


/* <?php 
                
                $id = $_SESSION['id'];
                $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['Username'];
                    $res_Email = $result['Email'];
                    $res_Age = $result['Age'];
                    $res_id = $result['Id'];
                }
                
                echo "<a href='edit.php?Id=$res_id' style='color:White;'>Change Profile</a>";
                ?>

                <a href="php/logout.php"> <button class="btn">Log Out</button> </a>

            </div>
        </div>
        <main>

        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hello <b><?php echo $res_Uname ?></b>, Welcome to DailyDraft!!! </p>
                </div>
                <div class="box">
                    <p>Your email is <b><?php echo $res_Email ?></b>.</p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p>And you are <b><?php echo $res_Age ?> years old and I thankyou hehe</b>.</p> 
                </div>
            </div>
        </div>

        </main>
\*