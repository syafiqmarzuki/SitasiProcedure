<?php
class Siswa{
	
	private $conn;
	private $table_name = "siswa";
	private $table_name2 = "trans_debit";
	private $table_name3 = "trans_kredit";

	
	public $idsw;
	public $nissw;
	public $nmsw;
	public $almtsw;
	public $tglsw;
	public $jsw;
	public $nmotsw;
	public $telsw;
	public $kelsw;

	
	public function __construct($db){
		$this->conn = $db;
	}
	
	function insert(){
		
		$query = "insert into ".$this->table_name." values('',?,?,?,?,?,?,?,?,0,NOW(),0,0)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nissw);
		$stmt->bindParam(2, $this->nmsw);
		$stmt->bindParam(3, $this->almtsw);
		$stmt->bindParam(4, $this->tglsw);
		$stmt->bindParam(5, $this->jsw);
		$stmt->bindParam(6, $this->nmotsw);
		$stmt->bindParam(7, $this->telsw);
		$stmt->bindParam(8, $this->kelsw);


				
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	function readAll(){

		$query = "SELECT * FROM ".$this->table_name." WHERE disabled=0 ORDER BY nis ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	// used when filling up the update product form
	function readOne(){
		
		$query = "SELECT * FROM " . $this->table_name . " WHERE id_sw=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->idsw);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->idsw = $row['id_sw'];
		$this->nissw = $row['nis'];
		$this->nmsw = $row['nama'];
		$this->almtsw = $row['alamat'];
		$this->tglsw = $row['tgl_lahir'];
		$this->jsw = $row['jenis_kelamin'];
		$this->nmotsw = $row['nama_ortu'];
		$this->telsw = $row['telepon'];
		$this->kelsw = $row['kelompok'];
		
	}
	
	// update the product
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					nis = :nissw, 
					nama = :nmsw,
					alamat = :almtsw, 
					tgl_lahir = :tglsw, 
					jenis_kelamin = :jsw, 
					nama_ortu = :nmotsw, 
					telepon = :telsw, 
					kelompok = :kelsw,
					diupdt_pd = NOW() 
				WHERE
					id_sw = :idsw";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nissw', $this->nissw);
		$stmt->bindParam(':nmsw', $this->nmsw);
		$stmt->bindParam(':almtsw', $this->almtsw);
		$stmt->bindParam(':tglsw', $this->tglsw);
		$stmt->bindParam(':jsw', $this->jsw);
		$stmt->bindParam(':nmotsw', $this->nmotsw);
		$stmt->bindParam(':telsw', $this->telsw);
		$stmt->bindParam(':kelsw', $this->kelsw);
		$stmt->bindParam(':idsw', $this->idsw);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	// delete the product
	function delete(){
	
		$query = "UPDATE " . $this->table_name . " SET disabled=1, dihps_pd=NOW() WHERE id_sw = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->idsw);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>
