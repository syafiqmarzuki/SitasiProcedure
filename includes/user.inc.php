<?php
class User{
	
	private $conn;
	private $table_name = "petugas";
	
	public $idptgs;
	public $nptgs;
	public $aptgs;
	public $tptgs;
	public $sptgs;
	public $jptgs;
	public $un;
	public $pw;
	
	public function __construct($db){
		$this->conn = $db;
	}
	
	function insert(){
		
		$query = "insert into ".$this->table_name." values('',?,?,?,?,?,?,?,0,NOW(),0,0)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->un);
		$stmt->bindParam(2, $this->pw);
		$stmt->bindParam(3, $this->nptgs);
		$stmt->bindParam(4, $this->aptgs);
		$stmt->bindParam(5, $this->tptgs);
		$stmt->bindParam(6, $this->sptgs);
		$stmt->bindParam(7, $this->jptgs);
		
		
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	function readAll(){

		$query = "SELECT * FROM ".$this->table_name." WHERE enabled=0 ORDER BY id_ptgs ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	// used when filling up the update product form
	function readOne(){
		
		$query = "SELECT * FROM " . $this->table_name . " WHERE id_ptgs=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->idptgs);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->idptgs = $row['id_ptgs'];
		$this->un = $row['username'];
		$this->pw = $row['password'];
		$this->nptgs = $row['nama_ptgs'];
		$this->aptgs = $row['alamat_ptgs'];
		$this->tptgs = $row['telepon_ptgs'];
		$this->sptgs = $row['status'];
		$this->jptgs = $row['jns_kelamin_ptgs'];
		
	}
	
	// update the product
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					username = :un, 
					password = :pw,
					nama_ptgs = :nptgs, 
					alamat_ptgs = :aptgs, 
					telepon_ptgs = :tptgs, 
					status = :sptgs, 
					jns_kelamin_ptgs = :jptgs,
					diupdt_pd =  NOW()
				WHERE
					id_ptgs = :idptgs";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':un', $this->un);
		$stmt->bindParam(':pw', $this->pw);
		$stmt->bindParam(':nptgs', $this->nptgs);
		$stmt->bindParam(':aptgs', $this->aptgs);
		$stmt->bindParam(':tptgs', $this->tptgs);
		$stmt->bindParam(':sptgs', $this->sptgs);
		$stmt->bindParam(':jptgs', $this->jptgs);
		$stmt->bindParam(':idptgs', $this->idptgs);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	// delete the product
	function delete(){
	
		$query = "UPDATE " . $this->table_name . " SET enabled=1, dihps_pd=NOW() WHERE id_ptgs = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->idptgs);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>
