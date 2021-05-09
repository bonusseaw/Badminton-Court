<?php

class Member{
    private $id;
    private $namepre;
    private $name;
    private $surname;
    private $username;
    private $passwd;
    private $occupation;
    private $faculty;
    private $phone;
    
    private const TABLE = "members";

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

    /**
     * @return mixed
     */
    public function getUser():string
    {
        return $this->username;
    }

    /**
     * @param mixed $user
     */
    public function setUser(string $user)
    {
        $this->username = $user;
    }

    /**
     * @return mixed
     */
    public function getName():string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPasswd():string
    {
        return $this->passwd;
    }

    /**
     * @param mixed $passwd
     */
    public function setPasswd(string $passwd)
    {
        $this->passwd = $passwd;
    }

    /**
     * @return mixed
     */
    public function getSurname():string
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname(string $surname)
    {
        $this->surname = $surname;
    }
    public function getNamepre():string
    {
        return $this->namepre;
    }
    public function setNamepre(string $namepre)
    {
        $this->namepre = $namepre;
    }
    public function getOccupation():string
    {
        return $this->occupation;
    }
    public function setOccupation(string $occupation)
    {
        $this->occupation = $occupation;
    }
    public function getFaculty():string
    {
        return $this->faculty;
    }
    public function setFaculty(string $faculty)
    {
        $this->faculty = $faculty;
    }
    public function getPhone():string
    {
        return $this->phone;
    }
    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    public static function findAll(): array {
        $con = Db::getInstance();
        $query = "SELECT * FROM ".self::TABLE;
        $stmt = $con->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Member");
        $stmt->execute();
        $memberList  = array();
        while ($mem = $stmt->fetch())
        {
            $memberList[$mem->getId()] = $mem;
        }
        return $memberList;
    }

    public static function findById(int $id): ?Member {
        $con = Db::getInstance();
        $query = "SELECT * FROM ".self::TABLE." WHERE id = $id";
        $stmt = $con->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Member");
        $stmt->execute();
        if ($mem = $stmt->fetch())
        {
            return $mem;
        }
        return null;
    }

    public static function findByAccount(string $username,string $passwd){
        $con = Db::getInstance();
        $query = "SELECT * FROM ".self::TABLE." WHERE username = '$username' AND passwd = '$passwd'";
        $stmt = $con->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Member");
        $stmt->execute();
        if ($mem = $stmt->fetch())
        {
            return $mem;
        }
        return null;
    }

    public function insert() {
        $con = Db::getInstance();
        $values = "";
        $this->setId(mt_rand(0, 1000000000));
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
        $query = "UPDATE ".self::TABLE." SET ";
        foreach ($this as $prop => $val) {
            $query .= " $prop='$val',";
        }
        $query = substr($query, 0, -1);
        $query .= " WHERE id = ".$this->getId();
        $con = Db::getInstance();
        $res = $con->exec($query);
        return $res;
    }
}