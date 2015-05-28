<?php
class dbCenter{
    private $namaTabel;
    private $record = array();
    public $dbQuery;
    private $status;
    public $dataRow = array();
    private $dbCon;
    
    function __construct($_namaTabel) {
		$this->namaTabel = $_namaTabel;
		$this->setConnection ("localhost","root","","sista");
    }
	function setConnection ($_host,$_user,$_password,$_db) {
		$this->dbCon=mysqli_connect($_host,$_user,$_password,$_db);
		return $this->dbCon;
	}
	
	function getDataRow() {
		return $this->dataRow;
	}
    
    function siapkanRecord(array $_record){
        $this->record = $_record;
    }
    
    function simpan() {
        $this->dbQuery = "INSERT INTO ".$this->namaTabel." SET ";
        foreach ($this->record as $key => $value) {
            $this->dbQuery.= "$key = '$value', ";
        }
        $this->dbQuery = rtrim($this->dbQuery, ', ');
        $this->status = mysqli_query($this->dbCon,$this->dbQuery);
    }
    
    function ambilSemua() {
        $this->dbQuery = "SELECT * FROM ".$this->namaTabel."";
        $this->status = mysqli_query($this->dbCon,$this->dbQuery);
        while ($row=  mysqli_fetch_assoc($this->status)) {
            $this->dataRow[]=$row;
        }
        return $this->dataRow;
    }
    
    function ambilDenganLimit ($limit, $posisi=NULL) {
        if (isset($posisi)) {
            $this->dbQuery = "SELECT * FROM ".$this->namaTabel." LIMIT ".$posisi.", ".$limit."";
        }
        else {
            $this->dbQuery = "SELECT * FROM ".$this->namaTabel." LIMIT ".$limit."";
        }
        $this->status = mysqli_query($this->dbCon,$this->dbQuery);
        while ($row=  mysqli_fetch_assoc($this->status)) {
            $this->dataRow[]=$row;
        }
        return $this->dataRow;
    }
    
    function ambilDataDenganKondisi (array $kondisi) {
        $this->dbQuery = "SELECT * FROM ".$this->namaTabel." WHERE ";
        foreach ($kondisi as $key => $value) {
            $this->dbQuery .= "$key = '$value' AND ";
        }
        $this->dbQuery = rtrim($this->dbQuery, 'AND ');
        $this->status = mysqli_query($this->dbCon,$this->dbQuery);
        while ($row=  mysqli_fetch_assoc($this->status)) {
            $this->dataRow[]=$row;
        }
        return $this->dataRow;
    }
            
    function editBerdasarkan(array $kolom) {
        $this->dbQuery = "UPDATE ".$this->namaTabel." SET ";
        foreach ($this->record as $key => $value) {
            $this->dbQuery.= "$key ='$value',";
        }
        $this->dbQuery = rtrim($this->dbQuery, ',');
        $this->dbQuery.= " WHERE";
        foreach ($kolom as $key => $value) {
            $this->dbQuery.= " $key = '$value' AND";
        }
        $this->dbQuery = rtrim($this->dbQuery, 'AND ');
        $this->status = mysqli_query($this->dbCon,$this->dbQuery);
    }
    
    function hapusSemua () {
        $this->dbQuery = "DELETE FROM ".$this->namaTabel."";
		$this->status = mysqli_query($this->dbCon,$this->dbQuery);
    }
    
    function hapusDenganKondisi (array $kondisi) {
        $this->dbQuery = "DELETE FROM ".$this->namaTabel." WHERE ";
        foreach ($kondisi as $key => $value) {
            $this->dbQuery .= "$key = '$value' AND ";
        }
        $this->dbQuery = rtrim($this->dbQuery, 'AND ');
        $this->status = mysqli_query($this->dbCon,$this->dbQuery);
    }
    
    function executeQuery($query){
        $this->dbQuery = $query;
        $this->status = mysqli_query($this->dbCon, $this->dbQuery);
        while ($row=  mysqli_fetch_assoc($this->status)) {
            $this->dataRow[]=$row;
        }
        return $this->dataRow;
    }
function executeQuery2($query){
        $this->dbQuery = $query;
        $this->status = mysqli_query($this->dbCon, $this->dbQuery);
    }
}

?>