<?php
try {
    ob_start();

?>
<body>
<script>
function myFunction() {
    if (confirm("Are you want to confirm reservation?") == true) {
        document.getElementById("reserveForm").submit();
    } 
}
</script>
<br>
    <div align="right" style="width: 80%; margin:auto">
        <form name="logout" id="back" method="post" 
        action=<?= Router::getSourcePath() . "logout.php"?>>
            <button class="btn btn-reward" type="submit">Logout</button>
    </form>
    </div>
    <h1 class="text-center"><b>Reservation</b></h1>
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
        <div class="sign-up-form">
        <form name="reserveForm" id="reserveForm" method="post" 
            action=<?= Router::getSourcePath() . "index.php?controller=Reserve&action=reserve"?>>
            <label class="col-sm-1" style="color: white;" align="left">Court:</label>
            <select name="courtID" style="width: 65%; margin:auto" align="left" class="btn btn-white dropdown-toggle" required/>
                <option value="0"selected>Court</option>
                <option value="1">Court 1</option>
                <option value="2">Court 2</option>
                <option value="3">Court 3</option>
                <option value="4">Court 4</option>
            </select>
            <br><br>
            <label class="col-sm-1" style="color: white;" align="left">Date:</label>
            <input class="signup-input" type="date" name="datere" required/>
            <br><br>
            <label class="col-sm-1" style="color: white;" align="left">Time:</label>
            <select name="timeID" style="width: 65%; margin:auto" align="left" class="btn btn-white dropdown-toggle" required/>
                <option value="0" selected>Time</option>
                <option value="1">08:00-09:00</option>
                <option value="2">09:00-10:00</option>
                <option value="3">10:00-11:00</option>
                <option value="4">11:00-12:00</option>
                <option value="5">12:00-13:00</option>
                <option value="6">13:00-14:00</option>
                <option value="7">14:00-15:00</option>
                <option value="8">15:00-16:00</option>
                <option value="9">16:00-17:00</option>
                <option value="10">17:00-18:00</option>
                <option value="11">18:00-19:00</option>
                <option value="12">19:00-20:00</option>
                <option value="13">20:00-21:00</option>
            </select>
            <br><br>
            <button class="btn btn-signupii" type="button" onclick="myFunction();">Submit</button>
            <button class="btn btn-cancel" type="reset">Cancel</button>
        </form>
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