<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý sinh viên</title>

    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #eef3ff;
            color: #1f2937;
        }

        .header {
            background: linear-gradient(135deg, #2563eb, #4f46e5);
            color: white;
            padding: 25px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
        }

        .container {
            width: 92%;
            max-width: 1200px;
            margin: 25px auto;
        }

        .app-layout {
            display: grid;
            grid-template-columns: 360px 1fr;
            gap: 20px;
            align-items: start;
        }

        @media (max-width: 900px) {
            .app-layout {
                grid-template-columns: 1fr;
            }
        }

        .card {
            background: white;
            border-radius: 18px;
            padding: 20px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
            margin-top: 20px;
        }

        h2 {
            color: #1d4ed8;
            margin-top: 0;
        }

        .form-card {
            position: sticky;
            top: 20px;
        }

        .form-group {
            margin-bottom: 12px;
        }

        label {
            font-weight: bold;
            font-size: 14px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            box-sizing: border-box;
        }

        button {
            background: #2563eb;
            color: white;
            border: none;
            padding: 11px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
        }

        button:hover {
            background: #1d4ed8;
        }

        .btn-gray {
            background: #64748b;
        }

        .btn-gray:hover {
            background: #475569;
        }

        #thongBao {
            margin-top: 15px;
            padding: 12px;
            background: #ecfdf5;
            color: #047857;
            border-left: 5px solid #10b981;
            border-radius: 8px;
            display: none;
            white-space: pre-wrap;
            font-size: 14px;
        }

        .list-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }

        .room-title {
            display: inline-block;
            background: #e0e7ff;
            color: #1d4ed8;
            padding: 6px 12px;
            border-radius: 999px;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .student-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 16px;
        }

        .student-card {
            border: 1px solid #dbe4f0;
            border-radius: 16px;
            padding: 16px;
            background: #f8fbff;
            text-align: center;
            transition: 0.2s;
        }

        .student-card:hover {
            border-color: #2563eb;
            background: #eff6ff;
            transform: translateY(-2px);
        }

        .student-icon {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: #dbeafe;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 34px;
            border: 3px solid #bfdbfe;
            margin: 0 auto 10px auto;
        }

        .mssv {
            display: inline-block;
            background: #dbeafe;
            color: #1d4ed8;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 8px;
            max-width: 100%;
            word-break: break-word;
        }

        .student-info h3 {
            margin: 4px 0 12px 0;
            font-size: 16px;
            color: #111827;
        }

        .student-detail {
            margin-top: 10px;
            text-align: left;
            border-top: 1px solid #dbe4f0;
            padding-top: 10px;
        }

        .info-row {
            display: grid;
            grid-template-columns: 62px 1fr;
            gap: 8px;
            margin-bottom: 7px;
            font-size: 13px;
            line-height: 1.35;
        }

        .info-label {
            font-weight: bold;
            color: #1e3a8a;
        }

        .info-value {
            color: #475569;
            overflow-wrap: break-word;
        }

        #log {
            margin-top: 20px;
            background: #111827;
            color: #d1fae5;
            padding: 12px;
            border-radius: 10px;
            white-space: pre-wrap;
            font-size: 13px;
        }
    </style>
</head>

<body>

<div class="header">
    <h1>QUẢN LÝ SINH VIÊN</h1>
</div>

<div class="container">

    <div class="app-layout">
        <div class="card form-card">
            <h2>Nhập thông tin sinh viên</h2>

            <div class="form-group">
                <label>MSSV</label>
                <input type="text" id="mssv" placeholder="Ví dụ: SV04">
            </div>

            <div class="form-group">
                <label>Họ tên</label>
                <input type="text" id="ten" placeholder="Nhập họ tên">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" id="email" placeholder="Nhập email">
            </div>

            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" id="sdt" placeholder="Nhập số điện thoại">
            </div>

            <div class="form-group">
                <label>Ngành</label>
                <input type="text" id="nganh" placeholder="Nhập ngành học">
            </div>

            <div class="form-group">
                <label>Giới tính</label>
                <select id="gioi_tinh">
                    <option>Nam</option>
                    <option>Nữ</option>
                    <option>Khác</option>
                </select>
            </div>

            <button onclick="themSinhVien()">Thêm sinh viên</button>
            <button class="btn-gray" onclick="xoaForm()">Xóa form</button>

            <div id="thongBao"></div>
        </div>

        <div>
            <div class="card">
                <div class="list-header">
                    <div>
                        <div class="room-title">ROOM 1</div>
                        <h2>Danh sách sinh viên</h2>
                    </div>

                    <button onclick="taiDanhSach()">Tải lại danh sách</button>
                </div>

                <div id="danhSachSinhVien" class="student-grid">
                    Đang tải danh sách...
                </div>
            </div>

            <div class="card">
                <h2>Nhật ký kỹ thuật</h2>
                <div id="log">Chưa có thao tác.</div>
            </div>
        </div>

    </div>
</div>

<script>
function taiDanhSach() {
    var xhr = new XMLHttpRequest();

    var url = "api_students.php?action=list&random=" + Math.random();

    ghiLog("Đang gửi GET:\n" + url);

    xhr.open("GET", url, true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            /*
                Server trả về HTML
                responseText chứa toàn bộ HTML
            */
            document.getElementById("danhSachSinhVien").innerHTML = xhr.responseText;

            ghiLog(
                "GET hoàn tất.\n" +
                "Dữ liệu được nhận bằng xhr.responseText.\n" +
                "Sau đó đưa vào giao diện bằng innerHTML."
            );
        }
    };

    xhr.send();
}

function themSinhVien() {
    var mssv = document.getElementById("mssv").value;
    var ten = document.getElementById("ten").value;
    var email = document.getElementById("email").value;
    var sdt = document.getElementById("sdt").value;
    var nganh = document.getElementById("nganh").value;
    var gioi_tinh = document.getElementById("gioi_tinh").value;

    var data = "";
    data = data + "mssv=" + encodeURIComponent(mssv);
    data = data + "&ten=" + encodeURIComponent(ten);
    data = data + "&email=" + encodeURIComponent(email);
    data = data + "&sdt=" + encodeURIComponent(sdt);
    data = data + "&nganh=" + encodeURIComponent(nganh);
    data = data + "&gioi_tinh=" + encodeURIComponent(gioi_tinh);

    var xhr = new XMLHttpRequest();

    xhr.open("POST", "api_students.php?action=create", true);

    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    ghiLog(
        "Đang gửi POST:\n" +
        "api_students.php?action=create\n\n" +
        "Header:\n" +
        "Content-Type: application/x-www-form-urlencoded\n\n" +
        "Body:\n" + data
    );

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            /*
                Server trả về text thông báo.
                responseText chứa text đó.
            */
            document.getElementById("thongBao").style.display = "block";
            document.getElementById("thongBao").innerText = xhr.responseText;

            ghiLog(
                "POST hoàn tất.\n" +
                "PHP trả về thông báo qua xhr.responseText:\n\n" +
                xhr.responseText
            );

            taiDanhSach();
        }
    };

    xhr.send(data);
}

function xoaForm() {
    document.getElementById("mssv").value = "";
    document.getElementById("ten").value = "";
    document.getElementById("email").value = "";
    document.getElementById("sdt").value = "";
    document.getElementById("nganh").value = "";
}

function ghiLog(noiDung) {
    document.getElementById("log").innerText = noiDung;
}

taiDanhSach();
</script>

</body>
</html>