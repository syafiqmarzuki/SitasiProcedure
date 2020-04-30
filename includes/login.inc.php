<?php 
class Login
{
	private $conn;
    private $table_name = "petugas";
	private $table_name2 = "act_log";
	
    public $user;
    public $userid;
    public $passid;
    public $username;

    


    public function __construct($db){
		$this->conn = $db;
	}

    public function login()
    {
        $user = $this->checkCredentials();
        if ($user) {
            $this->user = $user;
			session_start();
            $_SESSION['nama_ptgs'] = $user['nama_ptgs'];
            $_SESSION['id_ptgs'] = $user['id_ptgs'];
            $_SESSION['username'] = $user['username'];
            return $user['nama_ptgs'];
        }
        return false;
    }

    protected function checkCredentials()
    {
        $stmt = $this->conn->prepare('SELECT * FROM '.$this->table_name.' WHERE username=? and password=? and status="Admin" ');
		$stmt->bindParam(1, $this->userid);
		$stmt->bindParam(2, $this->passid);

        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            $submitted_pass = $this->passid;
            if ($submitted_pass == $data['password']) {
                return $data;

            }
        }
        return false;
    }

    public function login_ptgs()
    {
        $user = $this->checkCredentials_ptgs();
        if ($user) {
            $this->user = $user;
            session_start();
            $_SESSION['nama_ptgs'] = $user['nama_ptgs'];
            $_SESSION['id_ptgs'] = $user['id_ptgs'];
            $_SESSION['username'] = $user['username'];
            return $user['nama_ptgs'];
        }
        return false;
    }

    protected function checkCredentials_ptgs()
    {
        $stmt = $this->conn->prepare('SELECT * FROM '.$this->table_name.' WHERE username=? and password=? and status="Petugas" and enabled=0');
        $stmt->bindParam(1, $this->userid);
        $stmt->bindParam(2, $this->passid);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            $submitted_pass = $this->passid;
            if ($submitted_pass == $data['password']) {
                return $data;
            }
        }
        return false;
    }

    public function getUser()
    {
        return $this->user;
    }
    public function insert(){
        
        $query = "insert into ".$this->table_name2." values('', NOW(), ?, 'login')";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->userid);
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
        
    }

    public function insert2(){
        
        $query = "insert into ".$this->table_name2." values('', NOW(), ?, 'logout')";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->username);
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
        
    }
    
}
?>
