<?php
class MemberController {

/**
 * handleRequest จะทำการตรวจสอบ action และพารามิเตอร์ที่ส่งเข้ามาจาก Router
 * แล้วทำการเรียกใช้เมธอดที่เหมาะสมเพื่อประมวลผลแล้วส่งผลลัพธ์กลับ
 *
 * @param string $action ชื่อ action ที่ผู้ใช้ต้องการทำ
 * @param array $params พารามิเตอร์ที่ใช้เพื่อในการทำ action หนึ่งๆ
 */
public function handleRequest(string $action="index", array $params) {
    switch ($action) {
        case "login":
            $username = $params["POST"]["username"]??"";
            $pass = $params["POST"]["password"]??"";
            if ($username !== "" && $pass !== "") {
                $this->$action($username, $pass);
            }
            break;
        case "addNew":
            $namepre = $params["POST"]["namepre"];
            $name = $params["POST"]["name"];
            $surname = $params["POST"]["surname"];
            $username = $params["POST"]["username"];
            $password = $params["POST"]["password"];
            $occupation = $params["POST"]["occupation"];
            $faculty = $params["POST"]["faculty"];
            $phone = $params["POST"]["phone"];
            $this->$action($namepre,$name,$surname,$username,$password,$occupation,$faculty,$phone);
            break;
        case "signUp":
            $a = 1;
            $this->$action($a);
            break;
        case "profile":
            $b = 5;
            $this->$action($b);
            break;
        case "backhome":
            $c = 8;
            $this->$action($c);
            break;
        case "backpage":
            $d = 8;
            $this->$action($d);
            break;
        case "index":
            $this->index();
            break;
        default:
            break;
    }
}

    private function signUp ($a){
        include Router::getSourcePath()."Views/regis.inc.php";
    }
    private function profile($b){
        include Router::getSourcePath()."Views/member.inc.php";
    }
    private function backhome($c){
        include Router::getSourcePath()."Views/menu.inc.php";
    }
    private function backpage($d){
        include Router::getSourcePath()."Views/approve.inc.php";
    }
    private function addNew ($namepre,$name,$surname,$username,$password,$occupation,$faculty,$phone){
        $member = new Member();
        $member->setNamepre($namepre);
        $member->setName($name);
        $member->setSurname($surname);
        $member->setUser($username);
        $member->setPasswd($password);
        $member->setOccupation($occupation);
        $member->setFaculty($faculty);
        $member->setPhone($phone);
        $member->insert();
        header("Location: ".Router::getSourcePath()."index.php?");

    }
    private function login(string $username, string $password) {
        if($username=="kasetsart"&&$password=="kukps"){
            include Router::getSourcePath()."Views/approve.inc.php";
        }
        else{
            $member = Member::findByAccount($username,$password) ;
        if ($member !== null){
            session_start();
            $_SESSION['member'] = $member;
            $_SESSION['username'] = $member->getUser();
            $_SESSION['name'] = $member->getName();
            $_SESSION['surname'] = $member->getSurname();
            $_SESSION['id'] = $member->getId();
            $_SESSION['namepre'] = $member->getNamepre();
            $_SESSION['password'] = $member->getPasswd();
            $_SESSION['occupation'] = $member->getOccupation();
            $_SESSION['faculty'] = $member->getFaculty();
            $_SESSION['phone'] = $member->getPhone();
            include Router::getSourcePath()."Views/menu.inc.php";
        }
        else {
            header("Location: ".Router::getSourcePath()."index.php?msg=invalid username or password");
        }
        }
    }
    private function index() {
        
    }
}