<?php
$file = "students.json";

function docDanhSach($file) {
    if (!file_exists($file)) {
        return array();
    }

    $noiDung = file_get_contents($file);
    $data = json_decode($noiDung, true);

    if ($data == null) {
        return array();
    }

    return $data;
}

function ghiDanhSach($file, $data) {
    $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents($file, $json);
}

function htmlAnToan($text) {
    return htmlspecialchars($text, ENT_QUOTES, "UTF-8");
}
$action = $_GET["action"];
/*
    POST: thêm sinh viên mới
*/
if ($action == "create") {
    header("Content-Type: text/plain; charset=UTF-8");

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        echo "Lỗi: chức năng thêm sinh viên phải dùng POST.";
        exit;
    }

    $mssv = $_POST["mssv"];
    $ten = $_POST["ten"];
    $email = $_POST["email"];
    $sdt = $_POST["sdt"];
    $nganh = $_POST["nganh"];
    $gioi_tinh = $_POST["gioi_tinh"];

    if ($mssv == "" || $ten == "") {
        echo "Vui lòng nhập MSSV và họ tên.";
        exit;
    }

    $sinhVienMoi = array(
        "mssv" => $mssv,
        "ten" => $ten,
        "email" => $email,
        "sdt" => $sdt,
        "nganh" => $nganh,
        "gioi_tinh" => $gioi_tinh
    );

    $danhSach = docDanhSach($file);
    $danhSach[] = $sinhVienMoi;
    ghiDanhSach($file, $danhSach);

    echo "Thêm sinh viên thành công bằng POST.\n";
    echo "PHP đã nhận dữ liệu qua biến \$_POST.\n";
    echo "Sinh viên vừa thêm: " . $mssv . " - " . $ten;

    exit;
}

header("Content-Type: text/plain; charset=UTF-8");
echo "Action không hợp lệ.";
?>