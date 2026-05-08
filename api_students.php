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
    GET: lấy danh sách sinh viên
*/
if ($action == "list") {
    header("Content-Type: text/html; charset=UTF-8");

    $danhSach = docDanhSach($file);

    if (count($danhSach) == 0) {
        echo "Chưa có sinh viên nào.";
        exit;
    }

    for ($i = 0; $i < count($danhSach); $i++) {
        $sv = $danhSach[$i];

        echo "<div class='student-card'>";

        echo "<div class='student-icon'>👤</div>";

        echo "<div class='student-info'>";
        echo "<div class='mssv'>" . htmlAnToan($sv["mssv"]) . "</div>";
        echo "<h3>" . htmlAnToan($sv["ten"]) . "</h3>";

        echo "<div class='student-detail'>";

        echo "<div class='info-row'>";
        echo "<div class='info-label'>Email</div>";
        echo "<div class='info-value'>" . htmlAnToan($sv["email"]) . "</div>";
        echo "</div>";

        echo "<div class='info-row'>";
        echo "<div class='info-label'>SĐT</div>";
        echo "<div class='info-value'>" . htmlAnToan($sv["sdt"]) . "</div>";
        echo "</div>";

        echo "<div class='info-row'>";
        echo "<div class='info-label'>Ngành</div>";
        echo "<div class='info-value'>" . htmlAnToan($sv["nganh"]) . "</div>";
        echo "</div>";

        echo "<div class='info-row'>";
        echo "<div class='info-label'>GT</div>";
        echo "<div class='info-value'>" . htmlAnToan($sv["gioi_tinh"]) . "</div>";
        echo "</div>";

        echo "</div>";
        echo "</div>";

        echo "</div>";
    }

    exit;
}

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