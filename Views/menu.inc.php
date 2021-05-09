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
    <h1 class="text-center"><b>Welcome to Badminton Court</b></h1>
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
	<div class="section-block signup" style="width: 50%; margin:auto" align="left">
	<div style="width: 100%; margin:auto">
		<div align="center">
		<img src="Image/unnamed.jpg"width="400" height="225">
		<br><br>
		<a href="index.php?controller=Reserve&action=show1" class="btn btn-court ">Court 1</a>
		<br><br>
		</div>
		<div align="center">
		<a href="index.php?controller=Reserve&action=show2" class="btn btn-court ">Court 2</a>
		<br><br>
		</div>
		<div align="center">
		<a href="index.php?controller=Reserve&action=show3" class="btn btn-court ">Court 3</a>
		<br><br>
		</div>
		<div align="center">
		<a href="index.php?controller=Reserve&action=show4" class="btn btn-court ">Court 4</a>
		<br><br>
		</div>
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