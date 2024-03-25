<?php
require_once("./Entities/nhanvien.class.php");

// Kiểm tra nếu dữ liệu được gửi về server
if (isset($_POST["btnsubmit"])) {
    // Lấy giá trị từ form
    $Ma_NV = $_POST["txtMaNV"];
    $Ten_NV = $_POST["txtTenNV"]; // Lấy CategoryID từ form
    $Phai = $_POST["txtPhai"];
    $Noi_Sinh = $_POST["txtNoiSinh"];
    $Ma_Phong = $_POST["txtMaPhong"];
    $Luong = $_POST["txtLuong"];
    // Khởi tạo đối tượng product
    $newNhanVien = new nhanvien($Ma_NV,$Ten_NV,$Phai,$Noi_Sinh,$Ma_Phong,$Luong);
    // Lưu xuống CSDL
    $result = $newNhanVien->save();
    // Xử lý kết quả
    if (!$result) {
        header("Location: add_product.php?failure");
    } else {
        header("Location: add_product.php?inserted");
    }
}
?>

<?php
if (isset($_GET["inserted"])) {
    echo "<h2>Thêm nhân viên thành công</h2>";
}

?>
<?php
include_once("header.php");
?>

<form method="post">
    <h2>Thông tin nhập nhân viên</h2>

    <div class="row">
        <div class="lbLtitle">
            <label>Mã nhân viên:</label>
        </div>
        <div class="lbLinput">
            <input type="text" name="txtMaNV" value="<?php echo isset($_POST["txtMaNV"]) ? $_POST["txtMaNV"] : ""; ?>" />
        </div>
    </div>

    <div class="row">
        <div class="lbLtitle">
            <label>Tên Nhân viên</label>
        </div>
        <div class="lbLinput">
            <textarea name="txtTenNV" cols="21" rows="16"><?php echo isset($_POST["txtTenNV"]) ? $_POST["txtTenNV"] : ""; ?></textarea>
        </div>
    </div>

    <div class="row">
        <div class="lbLtitle">
            <label>Nơi Sinh</label>
        </div>
        <div class="lbLinput">
            <input type="text" name="txtNoiSinh" value="<?php echo isset($_POST["txtNoiSinh"]) ? $_POST["txtNoiSinh"] : ""; ?>" />
        </div>
    </div>

    <div class="row">
        <div class="lbLtitle">
            <label>Giới tính</label>
        </div>
        <div class="lbLinput">
            <input type="text" name="txtPhai" value="<?php echo isset($_POST["txtPhai"]) ? $_POST["txtPhai"] : ""; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="lbltitle">
            <label>Mã phòng</label>
        </div>
        <div class="lbLinput">
            <input type="text" name="txtMaPhong" value="<?php echo isset($_POST["txtMaPhong"]) ? $_POST["txtMaPhong"] : ""; ?>" />
        </div>
    </div>

    <div class="row">
        <div class="lbLtitle">
            <label>Lương</label>
        </div>
        <div class="lbLinput">
            <input type="text" name="txtLuong" value="<?php echo isset($_POST["txtLuong"]) ? $_POST["txtLuong"] : ""; ?>" />
        </div>
    </div>



    <div class="row">
        <div class="submit">
            <input type="submit" name="btnsubmit" value="Thêm nhân viên">
        </div>
    </div>

</form>
<div>
    <li>
        <a href="/buoi5/KTGIUAKY/list_product.php">Danh sách nhân viên</a>
    </li>
</div>

<?php
include_once("footer.php");
?>