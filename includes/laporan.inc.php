<?php
class Laporan{
	
	private $conn;
	private $table_name = "siswa";
	private $table_name2 = "saldo_sw";
	private $table_name3 = "transaksi";
	
	

	
	public $idsw;
	public $nissw;
	public $nmsw;
	public $almtsw;
	public $tglsw;
	public $jsw;
	public $nmotsw;
	public $telsw;
	public $kelsw;


	public $idtrans;
	public $tgltrans;
	public $deb;
	public $kre;
	public $idptgstrans;
	public $saldo;

	

	
	public function __construct($db){
		$this->conn = $db;
	}
	
	function insert(){
		
		$query = "insert into ".$this->table_name." values('',?,?,?,?,?,?,?,?,0)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nissw);
		$stmt->bindParam(2, $this->nmsw);
		$stmt->bindParam(3, $this->almtsw);
		$stmt->bindParam(4, $this->tglsw);
		$stmt->bindParam(5, $this->jsw);
		$stmt->bindParam(6, $this->nmotsw);
		$stmt->bindParam(7, $this->telsw);
		$stmt->bindParam(8, $this->kelsw);

		$query2 = "insert into ".$this->table_name2." values('',0,0,?,0)";
		$stmt2 = $this->conn->prepare($query2);
		$stmt2->bindParam(1, $this->nissw);
		
		

		$query3 = "insert into ".$this->table_name3." values('',0,0,?,0)";
		$stmt3 = $this->conn->prepare($query3);
		$stmt3->bindParam(1, $this->nissw);
		
		
		
		
		
		
		
		if($stmt->execute() && $stmt2->execute() && $stmt3->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	function readAll(){

		$query = "SELECT s.*, sd.* FROM ".$this->table_name." s join ".$this->table_name2." sd on s.nis = sd.nis WHERE s.disabled=0 ORDER BY s.id_sw ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}

		function readAll2(){

		$query = "SELECT ".$this->table_name.".*, ".$this->table_name2.".*, ".$this->table_name3.".* FROM ".$this->table_name." 
		inner join ".$this->table_name2." on ".$this->table_name2.".nis = ".$this->table_name.".nis 
		inner join ".$this->table_name3." on ".$this->table_name3.".nis = ".$this->table_name.".nis 
		WHERE ".$this->table_name.".disabled=0 AND ".$this->table_name.".nis=? GROUP BY siswa.nis";


		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->nissw);
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


		$this->idtrans = $row['id_trans'];
		$this->tgltrans = $row['tgl_trans'];
		$this->deb = $row['debit'];
		$this->kre = $row['kredit'];
		$this->idptgstrans = $row['id_ptgs'];
		$this->saldo = $row['saldo'];


		

		
	}

	function readAll3(){

		$query = "SELECT ".$this->table_name.".*, ".$this->table_name2.".*, ".$this->table_name3.".*, ".$this->table_name4.".* FROM ".$this->table_name." 
		inner join ".$this->table_name2." on ".$this->table_name2.".nis = ".$this->table_name.".nis 
		inner join ".$this->table_name3." on ".$this->table_name3.".nis = ".$this->table_name.".nis 
		inner join ".$this->table_name4." on ".$this->table_name4.".nis = ".$this->table_name.".nis 
		WHERE ".$this->table_name.".disabled=0 AND ".$this->table_name.".id_sw=? ORDER BY siswa.nis";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}

		function readAll4(){

		$query = "SELECT s.*, sd.* FROM ".$this->table_name." s join ".$this->table_name2." sd on s.nis = sd.nis WHERE s.disabled=0 ORDER BY s.id_sw ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	// used when filling up the update product form
	function readOne(){
		
		$query = "SELECT ".$this->table_name.".*, ".$this->table_name2.".*, ".$this->table_name3.".* FROM ".$this->table_name." 
		inner join ".$this->table_name2." on ".$this->table_name2.".nis = ".$this->table_name.".nis 
		inner join ".$this->table_name3." on ".$this->table_name3.".nis = ".$this->table_name.".nis 
		WHERE ".$this->table_name.".nis=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->nissw);
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
		$this->saldo = $row['saldo'];

		$this->idtrans = $row['id_trans'];
		$this->tgltrans = $row['tgl_trans'];
		$this->deb = $row['debit'];
		$this->kre = $row['kredit'];
		$this->idptgstrans = $row['id_ptgs'];

		
		
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
					kelompok = :kelsw 
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
	
		$query = "UPDATE " . $this->table_name . " SET disabled=1 WHERE id_sw = ?";
		
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
