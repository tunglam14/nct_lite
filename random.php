<?
$arr = array(
	'Lắng Nghe Nước Mắt' => 'http://m.nhaccuatui.com/bai-hat/lang-nghe-nuoc-mat-mrsiro.m0vVpWHQvdwj.html',
	'Không Cảm Xúc' => 'http://m.nhaccuatui.com/bai-hat/khong-cam-xuc-ho-quang-hieu.nfXGsKiRCy.html',
	'Lòng Đau Tình Phai' => 'http://m.nhaccuatui.com/bai-hat/long-dau-tinh-phai-hkt.mvrSZ3AWkcOT.html',
	'Đừng Làm Anh Khóc' => 'http://m.nhaccuatui.com/bai-hat/dung-lam-anh-khoc-minh-vuong-m4u.mjH2GvyIYGOs.html',
	'Chờ Người Nơi Ấy (Mỹ Nhân Kế OST)' => 'http://m.nhaccuatui.com/bai-hat/cho-nguoi-noi-ay-my-nhan-ke-ost-uyen-linh.ac5xJ6tKhpj5.html',
	'Còn Lại Gì Sau Cơn Mưa' => 'http://m.nhaccuatui.com/bai-hat/con-lai-gi-sau-con-mua-ho-quang-hieu.maKPdKVNNlqm.html',
	);
$k = array_rand($arr);
$_POST['url'] =  $arr[$k];
$_POST['name'] =  $k;
include 'link.php';


?>