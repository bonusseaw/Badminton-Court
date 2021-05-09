<?php

class Reserve{
    private $reserveID;
    private $courtID;
    private $datere;
    private $timeID;
    private $id;
    private $s;

    private const TABLE = "reservation";

    /**
     * @return mixed
     */
    public function getReserveID()
    {
        return $this->reserveID;
    }

    /**
     * @param mixed $id
     */
    public function setReserveID(int $reserveID)
    {
        $this->reserveID = $reserveID;
    }
    /**
     * @return mixed
     */
    public function getCourtID()
    {
        return $this->courtID;
    }

    /**
     * @param mixed $id
     */
    public function setCourtID(int $courtID)
    {
        $this->courtID = $courtID;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function getTimeID()
    {
        return $this->timeID;
    }

    /**
     * @param mixed $id
     */
    public function setTimeID(int $timeID)
    {
        $this->timeID = $timeID;
    }
    public function getDate():string
    {
        return $this->datere;
    }

    /**
     * @param mixed $name
     */
    public function setDate(string $datere)
    {
        $this->datere = $datere;
    }
    public function getS()
    {
        return $this->s;
    }

    /**
     * @param mixed $id
     */
    public function setS(string $s)
    {
        $this->s = $s;
    }
    
    public static function findAll(): array {
        $con = Db::getInstance();
        $query = "SELECT courtName,date(datere),timeStart,timeEnd,name,surname,s 
        FROM `findall` ORDER BY date(datere)";
        $stmt = $con->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $reList  = array();
        while ($re = $stmt->fetch())
        {
            $reList[] = $re;
        }
        return $reList;
    }
    public static function findEdit(): array {
        $con = Db::getInstance();
        $query = "SELECT reserveID,courtName,date(datere),timeStart,timeEnd,name,surname,s 
        FROM `findall` ORDER BY date(datere)";
        $stmt = $con->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $reList  = array();
        while ($re = $stmt->fetch())
        {
            $reList[] = $re;
        }
        return $reList;
    }
    public static function find(int $reserveID):?Reserve {
        $con = Db::getInstance();
        $query = "SELECT * FROM ".self::TABLE." WHERE reserveID = $reserveID";
        $stmt = $con->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Reserve");
        $stmt->execute();
        if ($re = $stmt->fetch())
        {
            return $re;
        }
        return null;
    }

    public static function findByCourt(int $courtID): array {
        $con = Db::getInstance();
        $query = "SELECT courtName,date(datere),timeStart,timeEnd,name,surname,s 
        FROM `findall` WHERE courtID = $courtID ORDER BY date(datere)";
        $stmt = $con->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $reList  = array();
        while ($re = $stmt->fetch())
        {
            $reList[] = $re;
        }
        return $reList;
    }

    public static function findStatus(): array {
        $con = Db::getInstance();
        $query = "SELECT reserveID,courtName,date(datere),timeStart,timeEnd,name,surname,s 
        FROM `findall` WHERE s = 'รออนุมัติ' ORDER BY date(datere)";
        $stmt = $con->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $reList  = array();
        while ($re = $stmt->fetch())
        {
            $reList[] = $re;
        }
        return $reList;
    }

   
    public function insert() {
        $con = Db::getInstance();
        $values = "";
        $this->setReserveID(mt_rand(0, 1000000000));
        foreach ($this as $prop => $val) {
            $values .= "'$val',";
        }
        $values = substr($values,0,-1);
        $query = "INSERT INTO ".self::TABLE." VALUES ($values)";
        //echo $query;
        $res = $con->exec($query);
        return $res;
    }

    public function update() {
        $query = "UPDATE reservation SET s = 'จองแล้ว' WHERE reserveID = ".$this->getReserveID();
        $con = Db::getInstance();
        $res = $con->exec($query);
        return $res;
    }

    public function delete() {
        $query = "DELETE FROM reservation WHERE reserveID = ".$this->getReserveID();
        $con = Db::getInstance();
        $res = $con->exec($query);
        return $res;
    }

}