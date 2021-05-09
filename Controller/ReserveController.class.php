<?php
class ReserveController {

/**
 * handleRequest จะทำการตรวจสอบ action และพารามิเตอร์ที่ส่งเข้ามาจาก Router
 * แล้วทำการเรียกใช้เมธอดที่เหมาะสมเพื่อประมวลผลแล้วส่งผลลัพธ์กลับ
 *
 * @param string $action ชื่อ action ที่ผู้ใช้ต้องการทำ
 * @param array $params พารามิเตอร์ที่ใช้เพื่อในการทำ action หนึ่งๆ
 */
public function handleRequest(string $action="index", array $params) {
    switch ($action) {
        case "new":
            $n=1;
            $this->$action($n);
            break;
        case "show1":
            $show = 1;
            $this->$action($show);
            break;
        case "show2":
            $show = 1;
            $this->$action($show);
            break;
        case "show3":
            $show = 1;
            $this->$action($show);
            break;
        case "show4":
            $show = 1;
            $this->$action($show);
            break;
        case "showall":
            $show = 1;
            $this->$action($show);
            break;
        case "change":
            $rid = $_GET['id'];
            $this->$action($rid);
            break;
        case "delete":
            $rid = $_GET['id'];
            $this->$action($rid);
            break;
        case "reserve":
            $courtID = $params["POST"]["courtID"];
            $datere = $params["POST"]["datere"];
            $timeID = $params["POST"]["timeID"];
            $this->$action($courtID,$datere,$timeID);
            break;
        case "index":
            $this->index();
            break;
        default:
            break;
    }
}

private function new($n) {
    include Router::getSourcePath()."Views/reserve.inc.php";
}
private function change($rid) {
    $re = Reserve::find($rid);
    if ($re !== null){
        $re->update();
        include Router::getSourcePath()."Views/approve.inc.php";
    }
}

private function delete($rid) {
    $re = Reserve::find($rid);
    if ($re !== null){
        $re->delete();
    }
    include Router::getSourcePath()."Views/edit.inc.php";
}

private function reserve($courtID,$datere,$timeID){
    session_start();
    $mem = $_SESSION['id'];
    $rese = new Reserve();
    $rese->setCourtID((int)($courtID));
    $rese->setDate($datere);
    $rese->setTimeID((int)($timeID));
    $rese->setId($mem);
    $rese->setS("รออนุมัติ");
    $rese->insert();
    if($rese->getCourtID()==1){
        $_SESSION['court1'] = Reserve::findByCourt(1);
        include Router::getSourcePath()."Views/court1.inc.php";
    }
    else if($rese->getCourtID()==2){
        $_SESSION['court2'] = Reserve::findByCourt(2);
        include Router::getSourcePath()."Views/court2.inc.php";
    }
    else if($rese->getCourtID()==3){
        $_SESSION['court3'] = Reserve::findByCourt(3);
        include Router::getSourcePath()."Views/court3.inc.php";
    }
    else if($rese->getCourtID()==4){
        $_SESSION['court4'] = Reserve::findByCourt(4);
        include Router::getSourcePath()."Views/court4.inc.php";
    }

}

private function show1($show){
    session_start();
    $_SESSION['court1'] = Reserve::findByCourt(1);
    include Router::getSourcePath()."Views/court1.inc.php";
}

private function show2($show){
    session_start();
    $_SESSION['court2'] = Reserve::findByCourt(2);
    include Router::getSourcePath()."Views/court2.inc.php";
}
private function show3($show){
    session_start();
    $_SESSION['court3'] = Reserve::findByCourt(3);
    include Router::getSourcePath()."Views/court3.inc.php";
}
private function show4($show){
    session_start();
    $_SESSION['court4'] = Reserve::findByCourt(4);
    include Router::getSourcePath()."Views/court4.inc.php";
}
private function showall($show){
    session_start();
    $_SESSION['court'] = Reserve::findAll();
    include Router::getSourcePath()."Views/edit.inc.php";
}

private function index() {
        
}
}