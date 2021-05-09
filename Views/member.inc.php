<?php
try {
    ob_start();
?>
<body>
<br>
    <div align="right" style="width: 80%; margin:auto">
        <form name="logout" id="back" method="post" 
        action=<?= Router::getSourcePath() . "logout.php"?>>
            <button class="btn btn-reward" type="submit">Logout</button>
    </form>
    </div>
    <h1 class="text-center"><b>My Profile</b></h1>
    <br>
    <div>
		<div align="center">
            <ul class="nav nav-tabs" role="tablist" style="width: 100%; margin:auto">
				<a href="index.php?controller=Member&action=backhome" class="btn btn-reward">Home</a></li>
                <a href="index.php?controller=Member&action=profile" class="btn btn-reward">Profile</a></li>
                <a href="index.php?controller=Reserve&action=new" class="btn btn-reward">Reservation</a></li>
			</ul>
		</div>
	</div>
    <br><br>
    <div class="section-block signup" style="width: 50%; margin:auto">
        <div align="center" style="width: 60%; margin:auto">
        <img src="Image/profile-417-1163876.png" width="150" height="150">
		<br><br>
        <?php 
            session_start();
            $id = $_SESSION['id'];
            $namepre = $_SESSION['namepre'];
            $name = $_SESSION['name'];
            $surname = $_SESSION['surname'];
            $username = $_SESSION['username'];
            $password = $_SESSION['password'];
            $occupation = $_SESSION['occupation'];
            $faculty = $_SESSION['faculty'];
            $phone = $_SESSION['phone'];

            echo "<h4 style='color: white;'>Name:&nbsp".$namepre."&nbsp".$name."</h4><br>";
            echo "<h4 style='color: white;'>Surname:&nbsp".$surname."</h4><br>";
            echo "<h4 style='color: white;'>Username:&nbsp".$username."</h4><br>";
            echo "<h4 style='color: white;'>Occupation:&nbsp".$occupation."</h4><br>";
            echo "<h4 style='color: white;'>Faculty:&nbsp".$faculty."</h4><br>";
            echo "<h4 style='color: white;'>Phone:&nbsp".$phone."</h4><br>";

        ?>
        </div>
    </div>
    <br><br>
</body>
<?php

$content = ob_get_clean();

include Router::getSourcePath()."layout.php";
} // -- try
catch (Throwable $e) {
ob_clean(); // ล้าง output เดิมที่ค้างอยู่จากการสร้าง page
echo "Access denied: No Permission to view this page";
exit(1);
}
?>