<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Nếu bạn sử dụng Composer, hãy thêm dòng này
require 'vendor/autoload.php';

// Nếu bạn không sử dụng Composer, hãy thêm các dòng này
// require 'path/to/PHPMailer/src/Exception.php';
// require 'path/to/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/SMTP.php';

// Lấy dữ liệu từ biểu mẫu
$name = $_POST['name'];
$grade = $_POST['grade'];
$school = $_POST['school'];
$exam_date = $_POST['exam_date'];
$exam_time = $_POST['exam_time'];

// Thiết lập thông tin email
$to = "your_email@example.com";
$subject = "Thông tin đặt lịch";
$message = "Tên: " . $name . "\n" .
            "Khối: " . $grade . "\n" .
            "Trường: " . $school . "\n" .
            "Ngày thi: " . $exam_date . "\n" .
            "Giờ thi: " . $exam_time;

$mail = new PHPMailer(true);

try {
    // Cấu hình máy chủ SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com'; // Thay thế bằng máy chủ SMTP của bạn
    $mail->SMTPAuth = true;
    $mail->Username = 'your_username@example.com'; // Thay thế bằng tên người dùng của bạn
    $mail->Password = 'your_password'; // Thay thế bằng mật khẩu của bạn
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Thiết lập thông tin người gửi và người nhận
    $mail->setFrom('no-reply@example.com', 'No Reply');
    $mail->addAddress($to);

    // Thiết lập tiêu đề và nội dung email
    $mail->isHTML(false);
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Gửi email
    $mail->send();
    echo "Đặt lịch thành công!";
} catch (Exception $e) {
    echo "Lỗi: Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
}
?>
