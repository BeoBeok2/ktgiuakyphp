<div>
    <button><a href="/buoi5/KTGIUAKY/add_product.php">Thêm sản phẩm</a></button>

</div>
<?php
require_once("./Entities/nhanvien.class.php");
include_once("header.php");

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    // Gọi phương thức xóa nhân viên từ lớp nhanvien
    nhanvien::delete_nhanvien($id);
    // Chuyển hướng trang về trang danh sách nhân viên sau khi xóa
    header("Location: list_product.php");
    exit(); // Đảm bảo không có mã HTML hoặc mã PHP nào khác được thêm vào sau lệnh header
}

$prods = nhanvien::list_nhanvien();

echo "<div class='nhanvien-list'>";
echo "<div class='product-item'>";
echo "<div color='red' class='column-header'>Mã Nhân viên</div>";
echo "<div class='column-header'>Tên Nhân viên</div>";
echo "<div class='column-header'>Giới tính</div>";
echo "<div class='column-header'>Nơi sinh</div>";
echo "<div class='column-header'>Tên Phòng</div>";
echo "<div class='column-header'>Lương</div>";
echo "<div class='column-header'>Action</div>";
echo "</div>";

foreach ($prods as $item) {
    echo "<div class='product-item'>";
    echo "<div>" . $item["Ma_NV"] . "</div>";
    echo "<div>" . $item["Ten_NV"] . "</div>";
    echo "<div>";
    if ($item["Phai"] == "NU") {
        echo "<img src='image/woman.jpg' alt='Nữ' width='60px' height='60px' />";
    } else if ($item["Phai"] == "NAM") {
        echo "<img src='image/man.jpg' alt='Nam' width='60px' height='60px' />";
    }
    echo "</div>";

    echo "<div>" . $item["Noi_Sinh"] . "</div>";
    echo "<div>" . $item["Ten_Phong"] . "</div>";
    echo "<div>" . $item["Luong"] . "</div>";
    echo "<div><button onclick=\"window.location.href='?action=delete&id=" . $item["Ma_NV"] . "'\"><img src='image/delete.jpg' alt='Xóa' width='20px' height='20px' /></button></div>";
echo "<div><button onclick=\"window.location.href='sua_nhanvien.php?id=" . $item["Ma_NV"] . "'\"><img src='image/edit.jpg' alt='Chỉnh sửa' width='20px' height='20px' /></button></div>";

    echo "</div>";
}
echo "</div>";



include_once("footer.php");
?>