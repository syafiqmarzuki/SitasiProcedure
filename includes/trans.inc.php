<?php
class Transaksi{
	
	private $conn;
	private $table_name = "siswa";
	private $table_name2 = "transaksi";
	private $table_name3 = "petugas";
	

	
	public $idsw;
	public $nissw;
	public $nmsw;
	public $almtsw;
	public $tglsw;
	public $jsw;
	public $nmotsw;
	public $telsw;
	public $kelsw;
	public $deb;
	public $kre;
	public $idptgs;
	public $idptgstrans;
	public $namaptgstrans;
	public $alamatptgstrans;
	public $teleponptgstrans;






	
	public function __construct($db){
		$this->conn = $db;
	}
	
	function insert(){
		
		$query = "insert into ".$this->table_name2." values('',?,NOW(),?,0,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nissw);
		$stmt->bindParam(2, $this->deb);
		$stmt->bindParam(3, $this->idptgs);
		
		
	
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}

	function insert1(){
		
		$query = "insert into ".$this->table_name2." values('',?,NOW(),0,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nissw);
		$stmt->bindParam(2, $this->kre);
		$stmt->bindParam(3, $this->idptgs);
		
		
	
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	function readAll(){

		$query = "SELECT s.*, trans.* FROM ".$this->table_name." s join ".$this->table_name2." trans on s.nis = trans.nis WHERE s.disabled=0 AND trans.id_ptgs>0 AND trans.kredit=0 ORDER BY trans.tgl_trans DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}

	function readAll1(){

		$query = "SELECT s.*, trans.* FROM ".$this->table_name." s join ".$this->table_name2." trans on s.nis = trans.nis WHERE s.disabled=0 AND trans.id_ptgs>0 AND trans.debit=0 ORDER BY trans.tgl_trans DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}


		function readAll3(){

		$query = "SELECT s.*, trans.* FROM ".$this->table_name." s join ".$this->table_name2." trans on s.nis = trans.nis WHERE s.disabled=0 AND trans.id_ptgs>0 AND s.nis=?";
		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->nissw);
		$stmt->execute();
		
		return $stmt;
	}
	
			function readAll4(){

		$query = "SELECT s.*, trans.* p.* FROM ".$this->table_name2." trans join ".$this->table_name." s on s.nis = trans.nis join ".$this->table_name3." p on p.id_ptgs = trans.id_ptgs WHERE s.disabled=0 AND trans.id_ptgs>0 AND s.nis=?";
		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->nissw);
		$stmt->execute();
		
		return $stmt;
	}

		function readOne(){
		
		$query = "SELECT ".$this->table_name.".*, ".$this->table_name2.".*, ".$this->table_name3.".* FROM ".$this->table_name2." 
		inner join ".$this->table_name." on ".$this->table_name2.".nis = ".$this->table_name.".nis 
		inner join ".$this->table_name3." on ".$this->table_name3.".id_ptgs = ".$this->table_name2.".id_ptgs 
		WHERE ".$this->table_name2.".id_trans=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->idtrans);
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
		$this->namaptgstrans = $row['nama_ptgs'];
		$this->alamatptgstrans = $row['alamat_ptgs'];
		$this->teleponptgstrans = $row['telepon_ptgs'];



		
		
	}
	// used when filling up the update product form

}
?>
