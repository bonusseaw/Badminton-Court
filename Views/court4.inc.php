<?php
try {
    ob_start();

    $court = $_SESSION['court4'];

?>
<body>
<br>
    <div align="right" style="width: 80%; margin:auto">
        <form name="logout" id="back" method="post" 
        action=<?= Router::getSourcePath() . "logout.php"?>>
            <button class="btn btn-reward" type="submit">Logout</button>
    </form>
    </div>
    <h1 class="text-center"><b>Court 4</b></h1>
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
    <div class="section-block summary" style='width: 75%; margin:auto'>
    <?php
        $header = array("Court Name","Date","Time Start","Time End","Name","Surname","Status");
        echo "<table class='table text-center bg-dark' style='width: 100%; margin:auto'>";
        echo"<thead>";
        echo "<tr>";
        foreach ($header as $h){
            echo "<th class='text-center'>$h</th>";
        }
        echo "</tr>";
        echo"</thead>";
        echo"<tbody>";
        
        foreach ($court as $row) {
            echo "<tr>";
            foreach ($row as $col){
               echo "<td>$col</td>";
            }
        echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    ?>
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