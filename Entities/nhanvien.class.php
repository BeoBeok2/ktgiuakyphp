<?php
require_once ("./config/db.class.php");
class nhanvien {
    public $Ma_NV;
    public $Ten_NV;
    public $Phai;
    public $Noi_Sinh;
    public $Ma_Phong;
    public $Luong;

    public function __construct($Ma_NV, $Ten_NV, $Phai, $Noi_Sinh, $Ma_Phong, $Luong){
        $this->Ma_NV = $Ma_NV;
        $this->Ten_NV = $Ten_NV;
        $this->Phai = $Phai;
        $this->Noi_Sinh = $Noi_Sinh;
        $this->Ma_Phong = $Ma_Phong;
        $this->Luong = $Luong;
    }

    public function save(){
        $db = new Db();
        $sql = "INSERT INTO NHANVIEN(Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong) VALUES
        ('$this->Ma_NV', '$this->Ten_NV', '$this->Phai', '$this->Noi_Sinh', '$this->Ma_Phong', '$this->Luong')";
        $result = $db->query_execute($sql);
        return $result;
    }

    public static function list_nhanvien(){
        $db = new Db();
        $sql = "SELECT n.*, p.Ten_Phong 
                FROM NHANVIEN n 
                INNER JOIN PHONGBAN p ON n.Ma_Phong = p.Ma_Phong";
        $result = $db->select_to_array($sql);
        return $result;
    }

    // public static function get_nhanvien($id){
    //     $db = new Db();
    //     $sql = "SELECT * FROM NHANVIEN WHERE Ma_NV = '$id'";
    //     $result = $db->select_to_array($sql);
    //     if ($result) {
    //         return $result[0]; 
    //     } else {
    //         return false; 
    //     }
    // }
    public function update(){
        $db = new Db();
        $sql = "UPDATE NHANVIEN SET Ten_NV = '$this->Ten_NV', Phai = '$this->Phai', Noi_Sinh = '$this->Noi_Sinh', Ma_Phong = '$this->Ma_Phong', Luong = '$this->Luong' WHERE Ma_NV = '$this->Ma_NV'";
        $result = $db->query_execute($sql);
        return $result;
    }
    
    
    public static function delete_nhanvien($Ma_NV){
        $db = new Db();
        $sql = "DELETE FROM NHANVIEN WHERE Ma_NV = '$Ma_NV'";
        $result = $db->query_execute($sql);
        return $result;
    }
}
?>
