<?php
try {
    ob_start();

?>
<body>
<script>
function myFunction() {
    if (confirm("Are you want to confirm sign up?") == true) {
        document.getElementById("signUpForm").submit();
    } 
}
</script>
    <br>
    <div align="right" style="width: 80%; margin:auto">
        <form name="back" id="back" method="post" 
        action=<?= Router::getSourcePath() . "index.php"?>>
            <button class="btn btn-reward" type="submit">Back</button>
    </form>
    </div>
    <h1 class="text-center"><b>Sign Up</b></h1>
    <br>
    <div class="section-block signup" style="width: 50%; margin:auto">
        <div class="sign-up-form">
            <form name="signUpForm" id="signUpForm" method="post" 
            action=<?= Router::getSourcePath() . "index.php?controller=Member&action=addNew"?>>
                <label class="col-sm-1" style="color: white;" align="left">Name:</label>
                <select name="namepre" align="left" class="btn btn-white dropdown-toggle" required/>
                <option value="" selected>คำนำหน้า</option>
                <option value="นาย">นาย</option>
                <option value="นาง">นาง</option>
                <option value="นางสาว">นางสาว</option>
                <option value="เด็กชาย">เด็กชาย</option>
                <option value="เด็กหญิง">เด็กหญิง</option>
                </select>
                <input class="signup-input" style="width: 48%; margin:auto" type="text" name="name" placeholder="Name" 
                required/>
                <br><br>
                <label class="col-sm-1" style="color: white;" align="left">Surname:</label>
                <input class="signup-input" type="text" name="surname" placeholder="Surname" 
                required/>
                <br><br>
                <label class="col-sm-1" style="color: white;" align="left">Username:</label>
                <input class="signup-input" type="text" name="username" placeholder="Username" 
                required/>
                <br><br>
                <label class="col-sm-1" style="color: white;" align="left">Password:</label>
                <input class="signup-input" type="text" name="password" placeholder="Password" 
                required/>
                <br><br>
                <label class="col-sm-1" style="color: white;" align="left">Occupation:</label>
                <select name="occupation" style="width: 65%; margin:auto" align="left" class="btn btn-white dropdown-toggle" required/>
                <option value="" selected>อาชีพ</option>
                <option value="นิสิต">นิสิต</option>
                <option value="อาจารย์">อาจารย์</option>
                <option value="บุคลากร">บุคลากร</option>
                <option value="อื่นๆ">อื่นๆ</option>
                </select>
                <br><br>
                <label class="col-sm-1" style="color: white;" align="left">Faculty:</label>
                <select name="faculty" style="width: 65%; margin:auto" align="left" class="btn btn-white dropdown-toggle" required/>
                <option value="" selected>คณะ</option>
                <option value="วิศวกรรมศาสตร์ กำแพงแสน">วิศวกรรมศาสตร์ กำแพงแสน</option>
                <option value="เกษตร กำแพงแสน">เกษตร กำแพงแสน</option>
                <option value="ศิลปศาสตร์และวิทยาศาสตร์">ศิลปศาสตร์และวิทยาศาสตร์</option>
                <option value="ศึกษาศาสตร์และพัฒนศาสตร์">ศึกษาศาสตร์และพัฒนศาสตร์</option>
                <option value="วิทยาศาสตร์การกีฬา">วิทยาศาสตร์การกีฬา</option>
                <option value="สัตวแพทยศาสตร์">สัตวแพทยศาสตร์</option>
                <option value="ประมง">ประมง</option>
                <option value="อื่นๆ">อื่นๆ</option>
                </select>
                <br><br>
                <label class="col-sm-1" style="color: white;" align="left">Phone:</label>
                <input class="signup-input" type="text" name="phone" placeholder="XXX-XXXXXXX" required/>
                <br><br>
                <button class="btn btn-signupii" type="button" onclick="myFunction();">SignUp</button>
                <button class="btn btn-cancel" type="reset">Cancel</button>
                <br>
			</form>
	    </div>
    </div>
    <br><br>
</body>
</html>
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