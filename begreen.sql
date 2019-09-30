-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 11, 2019 lúc 02:38 PM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `begreen`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `acc_id` int(11) NOT NULL,
  `acc_email` varchar(255) NOT NULL COMMENT 'email là duy nhất',
  `acc_password` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'pass là duy nhất',
  `acc_fullname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `acc_phone` varchar(255) CHARACTER SET utf8 NOT NULL,
  `acc_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `acc_role` bit(1) NOT NULL COMMENT '0: admin, 1: khách hàng'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`acc_id`, `acc_email`, `acc_password`, `acc_fullname`, `acc_phone`, `acc_address`, `acc_role`) VALUES
(1, 'thai97@gmail.com', 'thai', 'Hồng Chiêu Thái', '0166', 'Cần Thơ', b'0'),
(2, 'tung95@gmail.com', 'tung', 'Nguyễn Thanh Tùng', '0166', 'Cần Thơ', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `bill_pro_info` varchar(500) CHARACTER SET utf8 NOT NULL COMMENT 'lưu duoi dang json, thông tin của các sản phẩm duoc mua trong hd',
  `bill_pro_amount` int(11) NOT NULL COMMENT 'tổng số lượng của hóa đơn',
  `bill_pro_price` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'tổng tiền của hd',
  `bill_payment` bit(1) NOT NULL,
  `bill_status` bit(1) NOT NULL COMMENT '0: chưa thanh toán, 1 thanh toán',
  `bill_oder_name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'ten nguoi mua hang',
  `bill_phone` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'sdt nguoi mua hàng',
  `bill_address` varchar(500) CHARACTER SET utf8 NOT NULL COMMENT 'dia chi nguoi mua hàng',
  `bill_inputday` date NOT NULL COMMENT 'ngay lap hoadon, la ngay hien tai cua he thong',
  `bill_outputday` date NOT NULL COMMENT 'ngay giao hàng'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`bill_id`, `bill_pro_info`, `bill_pro_amount`, `bill_pro_price`, `bill_payment`, `bill_status`, `bill_oder_name`, `bill_phone`, `bill_address`, `bill_inputday`, `bill_outputday`) VALUES
(1, '{\"33\":{\"sp_sl\":1,\"sp_ten\":\"LX-500H-7B2VDF\",\"sp_hh\":\"LX-500H-7B2VDF.jpg\",\"sp_gia\":\"1034000\",\"sp_km\":null}}', 4, '300000', b'0', b'0', 'Nguyễn Thanh Tùng', '0166', 'Sóc trăng', '2019-04-08', '2019-04-12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_titlename` text NOT NULL COMMENT 'tiêu đề blog',
  `blog_detailcontent` text NOT NULL,
  `blog_img` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'đường dẫn hình sản phẩm cây'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `care_products`
--

CREATE TABLE `care_products` (
  `care_id` int(11) NOT NULL,
  `care_light` varchar(500) CHARACTER SET utf8 NOT NULL COMMENT 'điều kiện cham sóc về ánh sáng',
  `care_soil` varchar(500) CHARACTER SET utf8 NOT NULL COMMENT 'tỉ lệ, loại:đất trồng, phân bón',
  `care_water` varchar(500) CHARACTER SET utf8 NOT NULL COMMENT 'tưới nước như thế nào là thich hop cho tung loại cay',
  `pro_id` int(11) DEFAULT NULL COMMENT 'fk products: cách cham sóc này thuoc ve sp, cây nào'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `care_products`
--

INSERT INTO `care_products` (`care_id`, `care_light`, `care_soil`, `care_water`, `pro_id`) VALUES
(1, 'điều kiện về ánh sáng 01', 'điều kiện về đất 01', 'điều kiện về nuoc719 01', 1),
(2, 'điều kiện về ánh sáng 01', 'điều kiện về đất 01', 'điều kiện về nuoc719 01', 1),
(3, 'điều kiện về ánh sáng 02', 'điều kiện về đất 02', 'điều kiện về nuoc719 02', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categorys`
--

CREATE TABLE `categorys` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cate_description` text CHARACTER SET utf8 NOT NULL COMMENT 'mô tả loại sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `categorys`
--

INSERT INTO `categorys` (`cate_id`, `cate_name`, `cate_description`) VALUES
(1, 'ngoài trời', 'mo ta loai cays'),
(2, 'trong nhà', 'mô tả loại cây');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback_product`
--

CREATE TABLE `feedback_product` (
  `fp_id` int(11) NOT NULL,
  `acc_id` int(11) DEFAULT NULL COMMENT 'fk accounts: phản hồi thuộc về kh nào??',
  `pro_id` int(11) DEFAULT NULL COMMENT 'fk products: tat ca phan hoi, traloi phoi deu thuoc ve 1 sanpham duy nhat',
  `fp_content` varchar(500) CHARACTER SET utf8 NOT NULL COMMENT 'nội dung phản hồi ve san pham cua kh',
  `fb_reply` varchar(500) CHARACTER SET utf8 DEFAULT NULL COMMENT 'truong nay duoc cap nhat khi admin tra loi phan hoi cua kh',
  `acc_idadmin` int(11) DEFAULT NULL COMMENT 'id cua admin duoc cap nhat vao bang nay khi admin reply phanhoi cua kh',
  `fb_status` bit(1) NOT NULL DEFAULT b'0' COMMENT '0: admin chưa tl, 1: admin da tl'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `feedback_product`
--

INSERT INTO `feedback_product` (`fp_id`, `acc_id`, `pro_id`, `fp_content`, `fb_reply`, `acc_idadmin`, `fb_status`) VALUES
(1, 2, 1, 'Loại cây này trồng như thế nào vay shop?', 'Chào bạn! loại này phù hop trong nhà ạ', 2, b'1'),
(2, 2, 1, 'Loại cây này trồng như thế nào vay shop 02?', '', 2, b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback_service`
--

CREATE TABLE `feedback_service` (
  `fs_id` int(11) NOT NULL,
  `fs_content` varchar(500) CHARACTER SET utf8 NOT NULL COMMENT 'noi dung phan hoi ve dichvu',
  `fs_status` bit(1) NOT NULL DEFAULT b'0' COMMENT '0: admin chưa tl, 1: admin đã trả lời'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `pay_name` bit(1) NOT NULL COMMENT '0: thanh toán khi nhan hàng, 1: the tin dụng, ngân hàng',
  `pay_content` text CHARACTER SET utf8 COMMENT 'mô tả ve hình thuc thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `payment`
--

INSERT INTO `payment` (`pay_id`, `pay_name`, `pay_content`) VALUES
(1, b'0', 'Thanh toán khi nhận hàng'),
(2, b'1', 'Chuyển khoản');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pictures`
--

CREATE TABLE `pictures` (
  `pic_id` int(11) NOT NULL,
  `pic_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pic_type` int(11) NOT NULL COMMENT 'loại hình, 0: hinh hien sanpham thi len giao dien,  ',
  `pro_id` int(11) DEFAULT NULL COMMENT 'id cua sản phẩm, nhung hinh nay thuoc thang sp nào'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `pictures`
--

INSERT INTO `pictures` (`pic_id`, `pic_name`, `pic_type`, `pro_id`) VALUES
(1, 'sp01_1.jpg', 0, 1),
(2, 'sp01_2.jpg', 1, 1),
(3, 'sp01_3.jpg', 2, 1),
(4, 'sp01_4.jpg', 3, 1),
(5, 'sp02_1.jpg', 0, 2),
(6, 'sp02_2.jpg', 1, 2),
(7, 'sp02_3.jpg', 2, 2),
(8, 'sp02_4.jpg', 3, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `pro_id` int(11) NOT NULL,
  `prom_id` int(11) DEFAULT NULL COMMENT 'fk promotion',
  `cate_id` int(11) DEFAULT NULL COMMENT 'fk categorys',
  `pro_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pro_newprice` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'giá sp- giá hiện tại, giá đã giảm (nếu co giamgia)',
  `pro_oldprice` varchar(500) NOT NULL COMMENT 'chua giam gia',
  `pro_titlecontent` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'mô tả ngắn sp',
  `pro_detailcontent` text CHARACTER SET utf8 NOT NULL COMMENT 'mô tả chi tiết sp',
  `pro_color` varchar(40) CHARACTER SET utf8 NOT NULL COMMENT 'màu cây',
  `pro_size` varchar(40) CHARACTER SET utf8 NOT NULL,
  `pro_inputday` date NOT NULL COMMENT 'Ngày thêm cây vào hệ thống',
  `pro_amount` int(11) NOT NULL COMMENT 'số lượng sản phẩm hiện có trong kho hàng'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`pro_id`, `prom_id`, `cate_id`, `pro_name`, `pro_newprice`, `pro_oldprice`, `pro_titlecontent`, `pro_detailcontent`, `pro_color`, `pro_size`, `pro_inputday`, `pro_amount`) VALUES
(1, NULL, 1, 'sản phẩm 01', '100000', '100000', 'sản phẩm mô tả ngắn', 'sản phẩm mô tả chi tiết', 'xanh', 'nhỏ', '2019-04-08', 20),
(2, NULL, 1, 'sản phẩm 02', '1500000', '1500000', 'sản phẩm mô tả ngắn', 'sản phẩm mô tả chi tiết', 'xanh trắng', 'vừa', '2019-04-08', 30),
(3, NULL, 2, 'sản phẩm 03', '3500000', '3500000', 'sản phẩm mô tả ngắn', 'sản phẩm mô tả chi tiết', 'xanh trắng', 'lớn', '2019-04-08', 30),
(4, NULL, 2, 'sản phẩm 04', '1500000', '1500000', 'sản phẩm mô tả ngắn', 'sản phẩm mô tả chi tiết', 'xanh vàng', 'nhỏ', '2019-04-08', 10),
(5, NULL, 2, 'sản phẩm 05', '4500000', '4500000', 'sản phẩm mô tả ngắn', 'sản phẩm mô tả chi tiết', 'xanh trắng', 'nhỏ', '2019-04-08', 40),
(14, NULL, 1, 'Trầu bà lá xẻ', '80000', '80000', 'Cây trầu bà lá xẻ', 'Cây trầu bà lá xẻ hay thường được gọi là trầu bà khía, trầu bà chân vịt với hình dáng lạ mắt nên thường được trồng để trang trí nội thất là chủ yếu, ngoài ra cây còn mang hương thơm dịu nhẹ rất dễ chịu.', 'Xanh', 'Nhỏ', '2019-04-08', 10),
(15, NULL, 1, 'Trầu bà lá xẻ', '120000', '120000', 'Cây trầu bà lá xẻ', 'Cây trầu bà lá xẻ hay thường được gọi là trầu bà khía, trầu bà chân vịt với hình dáng lạ mắt nên thường được trồng để trang trí nội thất là chủ yếu, ngoài ra cây còn mang hương thơm dịu nhẹ rất dễ chịu.', 'Xanh', 'Vừa', '2019-04-08', 20),
(16, NULL, 1, 'Trầu bà lá xẻ', '220000', '220000', 'Cây trầu bà lá xẻ', 'Cây trầu bà lá xẻ hay thường được gọi là trầu bà khía, trầu bà chân vịt với hình dáng lạ mắt nên thường được trồng để trang trí nội thất là chủ yếu, ngoài ra cây còn mang hương thơm dịu nhẹ rất dễ chịu.', 'Xanh', 'Lớn', '2019-04-08', 15),
(17, NULL, 1, 'Bạch đàn mini', '90000', '90000', 'Cây bạch đàn mini', 'Bạch đàn, Khuynh diệp là chi thực vật có hoa Eucalyptus trong họ Đào kim nương (Myrtaceae). Các thành viên của chi này có xuất xứ từ Úc. Có hơn 700 loài bạch đàn, hầu hết có bản địa tại Australia, và một số nhỏ được tìm thấy ở New Guinea và Indonesia và một ở vùng viễn bắc Philippines và Đài Loan. Các loài bạch đàn đã được trồng ở các vùng nhiệt đới và cận nhiệt đới gồm châu Mỹ, châu Âu, châu Phi, vùng Địa Trung Hải, Trung Đông, Trung Quốc, bán đảo Ấn Độ... và cả Việt Nam.', 'Xanh trắng', 'Nhỏ', '2019-04-08', 10),
(18, NULL, 1, 'Bạch đàn mini', '130000', '130000', 'Cây bạch đàn mini', 'Bạch đàn, Khuynh diệp là chi thực vật có hoa Eucalyptus trong họ Đào kim nương (Myrtaceae). Các thành viên của chi này có xuất xứ từ Úc. Có hơn 700 loài bạch đàn, hầu hết có bản địa tại Australia, và một số nhỏ được tìm thấy ở New Guinea và Indonesia và một ở vùng viễn bắc Philippines và Đài Loan. Các loài bạch đàn đã được trồng ở các vùng nhiệt đới và cận nhiệt đới gồm châu Mỹ, châu Âu, châu Phi, vùng Địa Trung Hải, Trung Đông, Trung Quốc, bán đảo Ấn Độ... và cả Việt Nam.', 'Xanh trắng', 'Vừa', '2019-04-08', 10),
(19, NULL, 1, 'Bạch đàn mini', '250000', '250000', 'Cây bạch đàn mini', 'Bạch đàn, Khuynh diệp là chi thực vật có hoa Eucalyptus trong họ Đào kim nương (Myrtaceae). Các thành viên của chi này có xuất xứ từ Úc. Có hơn 700 loài bạch đàn, hầu hết có bản địa tại Australia, và một số nhỏ được tìm thấy ở New Guinea và Indonesia và một ở vùng viễn bắc Philippines và Đài Loan. Các loài bạch đàn đã được trồng ở các vùng nhiệt đới và cận nhiệt đới gồm châu Mỹ, châu Âu, châu Phi, vùng Địa Trung Hải, Trung Đông, Trung Quốc, bán đảo Ấn Độ... và cả Việt Nam.', 'Xanh trắng', 'Lớn', '2019-04-08', 8),
(20, NULL, 1, 'Chuối mini', '70000', '70000', 'Cây chuối mini', 'Cây chuối mini trang trí là loại cây trang trí trong nhà, phòng khách hoặc phòng ăn, ban công sân thượng, mang lại không gian xanh mát cho nội thất.Có thể làm cây trang trí trong quán cà phê hoặc quán ăn.', 'Xanh', 'Nhỏ', '2019-04-08', 8),
(21, NULL, 1, 'Chuối mini', '150000', '150000', 'Cây chuối mini', 'Cây chuối mini trang trí là loại cây trang trí trong nhà, phòng khách hoặc phòng ăn, ban công sân thượng, mang lại không gian xanh mát cho nội thất.Có thể làm cây trang trí trong quán cà phê hoặc quán ăn.', 'Xanh', 'Vừa', '2019-04-08', 18),
(22, NULL, 1, 'Chuối mini', '260000', '260000', 'Cây chuối mini', 'Cây chuối mini trang trí là loại cây trang trí trong nhà, phòng khách hoặc phòng ăn, ban công sân thượng, mang lại không gian xanh mát cho nội thất.Có thể làm cây trang trí trong quán cà phê hoặc quán ăn.', 'Xanh', 'Lớn', '2019-04-08', 10),
(23, NULL, 1, 'Trầu bà', '45000', '45000', 'Cây trầu bà', 'Cây Trầu Bà có tên khoa học: Epipremnum aureum) là một loài thực vật có hoa trong họ Ráy (Araceae). Cây trầu bà có nguồn gốc từ đảo Solomon, nguyên sinh ở Indonexia, ngoài tên gọi Trầu Bà cây còn có các tên gọi khác như: Vạn Niên Thanh leo, cây sắn dây Hoàng kim, Thạch Cam Tử, Trầu Ba Vàng, Hoàng Tam Điệp…Cây có khả năng hút được khí độc từ máy vi tính, loại bỏ chất gây ung thư formaldehydes và nhiều chất hóa học dễ bay hơi khác, là loại lọc không khí rất tốt. Cây Trầu Bà có ý nghĩa phong thủy mang đến cho gia chủ may mắn, thành đạt và bình an. Cây phù hợp để phòng khách, trang trí sảng, treo của sổ, hiên nhà, quán nhậu, quán cà phê hoặc để bàn làm việc.', 'Xanh trắng', 'Nhỏ', '2019-04-08', 28),
(24, NULL, 1, 'Trầu bà', '110000', '110000', 'Cây trầu bà', 'Cây Trầu Bà có tên khoa học: Epipremnum aureum) là một loài thực vật có hoa trong họ Ráy (Araceae). Cây trầu bà có nguồn gốc từ đảo Solomon, nguyên sinh ở Indonexia, ngoài tên gọi Trầu Bà cây còn có các tên gọi khác như: Vạn Niên Thanh leo, cây sắn dây Hoàng kim, Thạch Cam Tử, Trầu Ba Vàng, Hoàng Tam Điệp…Cây có khả năng hút được khí độc từ máy vi tính, loại bỏ chất gây ung thư formaldehydes và nhiều chất hóa học dễ bay hơi khác, là loại lọc không khí rất tốt. Cây Trầu Bà có ý nghĩa phong thủy mang đến cho gia chủ may mắn, thành đạt và bình an. Cây phù hợp để phòng khách, trang trí sảng, treo của sổ, hiên nhà, quán nhậu, quán cà phê hoặc để bàn làm việc.', 'Xanh trắng', 'Vừa', '2019-04-08', 28),
(25, NULL, 1, 'Trầu bà', '200000', '200000', 'Cây trầu bà', 'Cây Trầu Bà có tên khoa học: Epipremnum aureum) là một loài thực vật có hoa trong họ Ráy (Araceae). Cây trầu bà có nguồn gốc từ đảo Solomon, nguyên sinh ở Indonexia, ngoài tên gọi Trầu Bà cây còn có các tên gọi khác như: Vạn Niên Thanh leo, cây sắn dây Hoàng kim, Thạch Cam Tử, Trầu Ba Vàng, Hoàng Tam Điệp…Cây có khả năng hút được khí độc từ máy vi tính, loại bỏ chất gây ung thư formaldehydes và nhiều chất hóa học dễ bay hơi khác, là loại lọc không khí rất tốt. Cây Trầu Bà có ý nghĩa phong thủy mang đến cho gia chủ may mắn, thành đạt và bình an. Cây phù hợp để phòng khách, trang trí sảng, treo của sổ, hiên nhà, quán nhậu, quán cà phê hoặc để bàn làm việc.', 'Xanh trắng', 'Lớn', '2019-04-08', 2),
(26, NULL, 1, 'Thường xuân', '99000', '99000', 'Cây thường xuân', 'Cây thường xuân, còn gọi là cây Vạn niên, (danh pháp khoa học: Hedera helix) là một loài thực vật thuộc chi Dây thường xuân (Hedera), Họ Cuồng (Araliaceae). Cây có nguồn gốc ở châu Âu và Tây Á, là loài cây leo, thường xanh. Chúng có khả năng sinh sống và lan trên bề mặt dốc cao tới 20-30 mét. Ở nhiều nơi, chúng được trồng để tạo màu xanh và để làm hàng rào. Thường xuân không đòi hỏi nhiều ánh sáng. Chăm sóc dễ dàng. Có nghiên cứu cho rằng thường xuân có thể hấp thụ các hợp chất hữu cơ dễ bay hơi hay các chất gây ô nhiễm không khí do máy tính hoặc các thiết bị văn phòng tạo ra có thể gây đau đầu và buồn nôn.', 'Xanh', 'Nhỏ', '2019-04-08', 8),
(27, NULL, 1, 'Thường xuân', '190000', '190000', 'Cây thường xuân', 'Cây thường xuân, còn gọi là cây Vạn niên, (danh pháp khoa học: Hedera helix) là một loài thực vật thuộc chi Dây thường xuân (Hedera), Họ Cuồng (Araliaceae). Cây có nguồn gốc ở châu Âu và Tây Á, là loài cây leo, thường xanh. Chúng có khả năng sinh sống và lan trên bề mặt dốc cao tới 20-30 mét. Ở nhiều nơi, chúng được trồng để tạo màu xanh và để làm hàng rào. Thường xuân không đòi hỏi nhiều ánh sáng. Chăm sóc dễ dàng. Có nghiên cứu cho rằng thường xuân có thể hấp thụ các hợp chất hữu cơ dễ bay hơi hay các chất gây ô nhiễm không khí do máy tính hoặc các thiết bị văn phòng tạo ra có thể gây đau đầu và buồn nôn.', 'Xanh', 'Vừa', '2019-04-08', 18),
(28, NULL, 1, 'Thường xuân', '290000', '290000', 'Cây thường xuân', 'Cây thường xuân, còn gọi là cây Vạn niên, (danh pháp khoa học: Hedera helix) là một loài thực vật thuộc chi Dây thường xuân (Hedera), Họ Cuồng (Araliaceae). Cây có nguồn gốc ở châu Âu và Tây Á, là loài cây leo, thường xanh. Chúng có khả năng sinh sống và lan trên bề mặt dốc cao tới 20-30 mét. Ở nhiều nơi, chúng được trồng để tạo màu xanh và để làm hàng rào. Thường xuân không đòi hỏi nhiều ánh sáng. Chăm sóc dễ dàng. Có nghiên cứu cho rằng thường xuân có thể hấp thụ các hợp chất hữu cơ dễ bay hơi hay các chất gây ô nhiễm không khí do máy tính hoặc các thiết bị văn phòng tạo ra có thể gây đau đầu và buồn nôn.', 'Xanh', 'Lớn', '2019-04-08', 2),
(29, NULL, 1, 'Lưỡi hổ thái', '80000', '80000', 'Cây lưỡi hổ thái', 'Cây lưỡi hổ thái có tên gọi đầy đủ đó là cây lưỡi hổ Thái Lan. Gọi tắt là cây lưỡi hổ thái. Đây là dòng cây được nhập từ bên Thái và ươm trồng ở Việt Nam. Khí hậu của Thái Lan cũng gần giống với khí hậu của Việt Nam, vì vậy việc trồng cây lưỡi hổ thái không gặp quá nhiều khó khăn, nhất là trong giai đoạn chăm sóc cây.', 'Xanh vàng trắng', 'Nhỏ', '2019-04-08', 38),
(30, NULL, 1, 'Lưỡi hổ thái', '120000', '120000', 'Cây lưỡi hổ thái', 'Cây lưỡi hổ thái có tên gọi đầy đủ đó là cây lưỡi hổ Thái Lan. Gọi tắt là cây lưỡi hổ thái. Đây là dòng cây được nhập từ bên Thái và ươm trồng ở Việt Nam. Khí hậu của Thái Lan cũng gần giống với khí hậu của Việt Nam, vì vậy việc trồng cây lưỡi hổ thái không gặp quá nhiều khó khăn, nhất là trong giai đoạn chăm sóc cây.', 'Xanh vàng trắng', 'Vừa', '2019-04-08', 38),
(31, NULL, 1, 'Lưỡi hổ thái', '220000', '220000', 'Cây lưỡi hổ thái', 'Cây lưỡi hổ thái có tên gọi đầy đủ đó là cây lưỡi hổ Thái Lan. Gọi tắt là cây lưỡi hổ thái. Đây là dòng cây được nhập từ bên Thái và ươm trồng ở Việt Nam. Khí hậu của Thái Lan cũng gần giống với khí hậu của Việt Nam, vì vậy việc trồng cây lưỡi hổ thái không gặp quá nhiều khó khăn, nhất là trong giai đoạn chăm sóc cây.', 'Xanh vàng trắng', 'Lớn', '2019-04-08', 38),
(32, NULL, 2, 'Xương rồng tay thỏ', '80000', '80000', 'Cây xương rồng tay thỏ', 'Xương Rồng Tai Nhỏ còn được gọi với cái tên Xương Rồng Nopal và tên khoa học Opuntia pulvinata. Loại cây này được trồng phổ biến ở miền Tây Nam của nước Mỹ và phía Bắc Mexico. Trong các chợ Xương Rồng Nopal được bán dạng tươi ngay sau khi mới thu hái hoặc phơi khô được đóng hộp hay đóng túi.', 'Xanh', 'Nhỏ', '2019-04-08', 20),
(33, NULL, 2, 'Xương rồng tay thỏ', '120000', '120000', 'Cây xương rồng tay thỏ', 'Xương Rồng Tai Nhỏ còn được gọi với cái tên Xương Rồng Nopal và tên khoa học Opuntia pulvinata. Loại cây này được trồng phổ biến ở miền Tây Nam của nước Mỹ và phía Bắc Mexico. Trong các chợ Xương Rồng Nopal được bán dạng tươi ngay sau khi mới thu hái hoặc phơi khô được đóng hộp hay đóng túi.', 'Xanh', 'Vừa', '2019-04-08', 20),
(34, NULL, 2, 'Xương rồng tay thỏ', '220000', '220000', 'Cây xương rồng tay thỏ', 'Xương Rồng Tai Nhỏ còn được gọi với cái tên Xương Rồng Nopal và tên khoa học Opuntia pulvinata. Loại cây này được trồng phổ biến ở miền Tây Nam của nước Mỹ và phía Bắc Mexico. Trong các chợ Xương Rồng Nopal được bán dạng tươi ngay sau khi mới thu hái hoặc phơi khô được đóng hộp hay đóng túi.', 'Xanh', 'Lớn', '2019-04-08', 10),
(35, NULL, 2, 'Vạn niên', '90000', '90000', 'Cây vạn niên', 'Cây Vạn Niên sở hữu một cái tên vô cùng mỹ miều và đáng nhớ: Vạn Niên có nghĩa hán tự là “ngàn năm thanh xuân” – diễn tả sự mãi mãi tươi trẻ, tràn đầy nhựa sống và sự vĩnh hằng, trường tồn với thời gian. Cây Vạn Niên còn có một tên gọi khác chính là Môn Trường Sinh. Sở dĩ loài cây này mang cái tên đáng nhớ như vậy vì cây có sức sống rất bền bỉ, sống lâu năm lá cây không gặp tình trạng héo úa, vào mùa đông thời tiết lạnh giá cây vẫn sinh sôi phát triển.', 'Xanh đen', 'Nhỏ', '2019-04-08', 10),
(36, NULL, 2, 'Vạn niên', '180000', '180000', 'Cây vạn niên', 'Cây Vạn Niên sở hữu một cái tên vô cùng mỹ miều và đáng nhớ: Vạn Niên có nghĩa hán tự là “ngàn năm thanh xuân” – diễn tả sự mãi mãi tươi trẻ, tràn đầy nhựa sống và sự vĩnh hằng, trường tồn với thời gian. Cây Vạn Niên còn có một tên gọi khác chính là Môn Trường Sinh. Sở dĩ loài cây này mang cái tên đáng nhớ như vậy vì cây có sức sống rất bền bỉ, sống lâu năm lá cây không gặp tình trạng héo úa, vào mùa đông thời tiết lạnh giá cây vẫn sinh sôi phát triển.', 'Xanh đen', 'Vừa', '2019-04-08', 10),
(37, NULL, 2, 'Vạn niên', '290000', '290000', 'Cây vạn niên', 'Cây Vạn Niên sở hữu một cái tên vô cùng mỹ miều và đáng nhớ: Vạn Niên có nghĩa hán tự là “ngàn năm thanh xuân” – diễn tả sự mãi mãi tươi trẻ, tràn đầy nhựa sống và sự vĩnh hằng, trường tồn với thời gian. Cây Vạn Niên còn có một tên gọi khác chính là Môn Trường Sinh. Sở dĩ loài cây này mang cái tên đáng nhớ như vậy vì cây có sức sống rất bền bỉ, sống lâu năm lá cây không gặp tình trạng héo úa, vào mùa đông thời tiết lạnh giá cây vẫn sinh sôi phát triển.', 'Xanh đen', 'Lớn', '2019-04-08', 5),
(38, NULL, 2, 'Sen đá kim', '50000', '50000', 'Cây sen đá kim', 'Sen đá kim do có phần thân và lá dày để trữ nước, một đặc trưng của thực vật ở vùng có khí hậu khô cằn, nhiệt độ cao và trữ lượng mưa thấp khiến cây phải trữ nước để có thể tồn tại trong thời gian dài.', 'Xanh', 'Nhỏ', '2019-04-08', 10),
(39, NULL, 2, 'Sen đá kim', '110000', '110000', 'Cây sen đá kim', 'Sen đá kim do có phần thân và lá dày để trữ nước, một đặc trưng của thực vật ở vùng có khí hậu khô cằn, nhiệt độ cao và trữ lượng mưa thấp khiến cây phải trữ nước để có thể tồn tại trong thời gian dài.', 'Xanh', 'Vừa', '2019-04-08', 18),
(40, NULL, 2, 'Sen đá kim', '210000', '210000', 'Cây sen đá kim', 'Sen đá kim do có phần thân và lá dày để trữ nước, một đặc trưng của thực vật ở vùng có khí hậu khô cằn, nhiệt độ cao và trữ lượng mưa thấp khiến cây phải trữ nước để có thể tồn tại trong thời gian dài.', 'Xanh', 'Lớn', '2019-04-08', 8),
(41, NULL, 2, 'Sen đá lá tròn', '40000', '40000', 'Cây sen lá tròn', 'Cây sen lá tròn dễ chăm sóc và dễ phát triển, thích bóng râm, khó bị úng nước nhưng cây phát triển tốt ở nơi đất giàu dinh dưỡng và thoát nước tốt.Cây sen lá tròn  cần đất trồng tơi xốp thông thoáng tránh ngập úng. Liên hệ tư vấn khi gặp những vấn đề khi trồng cây.Những đặc tính của Sen đá, đều mang những đặc điểm mà con người chúng ta mong mỏi: Mạnh mẽ, kiên cường không gục ngã trong mọi hoàn cảnh. Chính điều kiện sống khắc nghiệt, thiếu thốn vật chất tôi luyện lên một cá thể mạnh mẽ, đẹp đẽ dưới ánh bình minh. Sen đá luôn biết vươn lên, dễ dàng thích nghi với mọi hoàn cảnh. Vẻ đẹp chất phác không cầu kỳ, tượng trưng cho một cuộc đời bản lĩnh, đối mặt với bản thân, đối mặt với thử thách và khẳng định với đời vẻ đẹp của bản thân.', 'Xanh', 'Nhỏ', '2019-04-08', 18),
(42, NULL, 2, 'Sen đá lá tròn', '110000', '110000', 'Cây sen lá tròn', 'Cây sen lá tròn dễ chăm sóc và dễ phát triển, thích bóng râm, khó bị úng nước nhưng cây phát triển tốt ở nơi đất giàu dinh dưỡng và thoát nước tốt.Cây sen lá tròn  cần đất trồng tơi xốp thông thoáng tránh ngập úng. Liên hệ tư vấn khi gặp những vấn đề khi trồng cây.Những đặc tính của Sen đá, đều mang những đặc điểm mà con người chúng ta mong mỏi: Mạnh mẽ, kiên cường không gục ngã trong mọi hoàn cảnh. Chính điều kiện sống khắc nghiệt, thiếu thốn vật chất tôi luyện lên một cá thể mạnh mẽ, đẹp đẽ dưới ánh bình minh. Sen đá luôn biết vươn lên, dễ dàng thích nghi với mọi hoàn cảnh. Vẻ đẹp chất phác không cầu kỳ, tượng trưng cho một cuộc đời bản lĩnh, đối mặt với bản thân, đối mặt với thử thách và khẳng định với đời vẻ đẹp của bản thân.', 'Xanh', 'Vừa', '2019-04-08', 15),
(43, NULL, 2, 'Sen đá lá tròn', '210000', '210000', 'Cây sen lá tròn', 'Cây sen lá tròn dễ chăm sóc và dễ phát triển, thích bóng râm, khó bị úng nước nhưng cây phát triển tốt ở nơi đất giàu dinh dưỡng và thoát nước tốt.Cây sen lá tròn  cần đất trồng tơi xốp thông thoáng tránh ngập úng. Liên hệ tư vấn khi gặp những vấn đề khi trồng cây.Những đặc tính của Sen đá, đều mang những đặc điểm mà con người chúng ta mong mỏi: Mạnh mẽ, kiên cường không gục ngã trong mọi hoàn cảnh. Chính điều kiện sống khắc nghiệt, thiếu thốn vật chất tôi luyện lên một cá thể mạnh mẽ, đẹp đẽ dưới ánh bình minh. Sen đá luôn biết vươn lên, dễ dàng thích nghi với mọi hoàn cảnh. Vẻ đẹp chất phác không cầu kỳ, tượng trưng cho một cuộc đời bản lĩnh, đối mặt với bản thân, đối mặt với thử thách và khẳng định với đời vẻ đẹp của bản thân.', 'Xanh', 'Lớn', '2019-04-08', 3),
(44, NULL, 2, 'Sen đá móng rồng', '35000', '35000', 'Cây sen đá móng rồng', 'Sen đá móng rồng có hình như vuốt của con rồng, cây chỉ bé cũng đã có thể ra hoa, hoa có màu vàng nhỏ. Cây mang ý nghĩa cho sự bảo vệ và che chở. Cây như được một chú rồng con luôn bảo vệ bên mình, có thể nói nó như bùa hộ mệnh cho bạn.', 'Xanh trắng', 'Nhỏ', '2019-04-08', 18),
(45, NULL, 2, 'Sen đá móng rồng', '110000', '110000', 'Cây sen đá móng rồng', 'Sen đá móng rồng có hình như vuốt của con rồng, cây chỉ bé cũng đã có thể ra hoa, hoa có màu vàng nhỏ. Cây mang ý nghĩa cho sự bảo vệ và che chở. Cây như được một chú rồng con luôn bảo vệ bên mình, có thể nói nó như bùa hộ mệnh cho bạn.', 'Xanh trắng', 'Vừa', '2019-04-08', 18),
(46, NULL, 2, 'Sen đá móng rồng', '210000', '210000', 'Cây sen đá móng rồng', 'Sen đá móng rồng có hình như vuốt của con rồng, cây chỉ bé cũng đã có thể ra hoa, hoa có màu vàng nhỏ. Cây mang ý nghĩa cho sự bảo vệ và che chở. Cây như được một chú rồng con luôn bảo vệ bên mình, có thể nói nó như bùa hộ mệnh cho bạn.', 'Xanh trắng', 'Lớn', '2019-04-08', 8),
(47, NULL, 2, 'Sen đá móng rồng sao biển', '55000', '55000', 'Cây sen đá móng rồng sao biển', 'Cây móng rồng dễ chăm sóc và dễ phát triển, thích bóng râm, khó bị úng nước nhưng cây phát triển tốt ở nơi đất giàu dinh dưỡng và thoát nước tốt, nên mang ra sương đêm và nắng gián tiếp buổi sáng đến 8h.Cũng như các loại cây thuộc họ xương rồng khác, cây sao biển không cần tưới nước nhiều, có thể chịu được nắng gió, nhưng cũng có thể sống lâu trong bóng râm. Những cây sao biển được trồng vào các chậu nhỏ xinh dễ thương, để bàn làm việc hay để trên giá sách, góc học tập, cửa sổ đều phù hợp. Nếu bạn có đi công tác dài ngày, bạn cũng không phải lo lắng cây bị khô héo.', 'Xanh vàng', 'Nhỏ', '2019-04-08', 18),
(48, NULL, 2, 'Sen đá móng rồng sao biển', '105000', '105000', 'Cây sen đá móng rồng sao biển', 'Cây móng rồng dễ chăm sóc và dễ phát triển, thích bóng râm, khó bị úng nước nhưng cây phát triển tốt ở nơi đất giàu dinh dưỡng và thoát nước tốt, nên mang ra sương đêm và nắng gián tiếp buổi sáng đến 8h.Cũng như các loại cây thuộc họ xương rồng khác, cây sao biển không cần tưới nước nhiều, có thể chịu được nắng gió, nhưng cũng có thể sống lâu trong bóng râm. Những cây sao biển được trồng vào các chậu nhỏ xinh dễ thương, để bàn làm việc hay để trên giá sách, góc học tập, cửa sổ đều phù hợp. Nếu bạn có đi công tác dài ngày, bạn cũng không phải lo lắng cây bị khô héo.', 'Xanh vàng', 'Vừa', '2019-04-08', 8),
(49, NULL, 2, 'Sen đá móng rồng sao biển', '205000', '205000', 'Cây sen đá móng rồng sao biển', 'Cây móng rồng dễ chăm sóc và dễ phát triển, thích bóng râm, khó bị úng nước nhưng cây phát triển tốt ở nơi đất giàu dinh dưỡng và thoát nước tốt, nên mang ra sương đêm và nắng gián tiếp buổi sáng đến 8h.Cũng như các loại cây thuộc họ xương rồng khác, cây sao biển không cần tưới nước nhiều, có thể chịu được nắng gió, nhưng cũng có thể sống lâu trong bóng râm. Những cây sao biển được trồng vào các chậu nhỏ xinh dễ thương, để bàn làm việc hay để trên giá sách, góc học tập, cửa sổ đều phù hợp. Nếu bạn có đi công tác dài ngày, bạn cũng không phải lo lắng cây bị khô héo.', 'Xanh vàng', 'Lớn', '2019-04-08', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion`
--

CREATE TABLE `promotion` (
  `prom_id` int(11) NOT NULL,
  `prom_discription` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'mô tả dịp khuyến mãi, vd: 8/3',
  `prom_percent` int(11) DEFAULT NULL COMMENT 'có thể có giá trị khuyến mãi, vd: 10%',
  `prom_gift` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'có the tặng quà, vd: tặng chậu, tặng thêm cây',
  `prom_day_start` date DEFAULT NULL COMMENT 'ngày bat dau khuyen mai',
  `prom_day_end` date DEFAULT NULL COMMENT 'ngày ket thuc km'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `promotion`
--

INSERT INTO `promotion` (`prom_id`, `prom_discription`, `prom_percent`, `prom_gift`, `prom_day_start`, `prom_day_end`) VALUES
(1, 'mô tả dịp khuyến mãi - sửa nèggg', 10, '', '2019-04-10', '2019-04-19'),
(2, 'mô tả dịp khuyến mãi 02', 20, NULL, '2019-04-08', '2019-04-15'),
(3, 'mô tả dịp khuyến mãi 03', 30, NULL, '2019-04-08', '2019-04-15'),
(4, 'mô tả dịp khuyến mãi 04', 40, NULL, '2019-04-08', '2019-04-15'),
(5, 'mô tả dịp khuyến mãi 05', 50, NULL, '2019-04-08', '2019-04-15');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`acc_id`),
  ADD UNIQUE KEY `acc_email` (`acc_email`),
  ADD UNIQUE KEY `acc_password` (`acc_password`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Chỉ mục cho bảng `care_products`
--
ALTER TABLE `care_products`
  ADD PRIMARY KEY (`care_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Chỉ mục cho bảng `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `feedback_product`
--
ALTER TABLE `feedback_product`
  ADD PRIMARY KEY (`fp_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Chỉ mục cho bảng `feedback_service`
--
ALTER TABLE `feedback_service`
  ADD PRIMARY KEY (`fs_id`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Chỉ mục cho bảng `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`pic_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `cate_id` (`cate_id`),
  ADD KEY `prom_id` (`prom_id`);

--
-- Chỉ mục cho bảng `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`prom_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `care_products`
--
ALTER TABLE `care_products`
  MODIFY `care_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `categorys`
--
ALTER TABLE `categorys`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `feedback_product`
--
ALTER TABLE `feedback_product`
  MODIFY `fp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `feedback_service`
--
ALTER TABLE `feedback_service`
  MODIFY `fs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `pictures`
--
ALTER TABLE `pictures`
  MODIFY `pic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `promotion`
--
ALTER TABLE `promotion`
  MODIFY `prom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `care_products`
--
ALTER TABLE `care_products`
  ADD CONSTRAINT `care_products_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`);

--
-- Các ràng buộc cho bảng `feedback_product`
--
ALTER TABLE `feedback_product`
  ADD CONSTRAINT `feedback_product_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`),
  ADD CONSTRAINT `feedback_product_ibfk_2` FOREIGN KEY (`acc_id`) REFERENCES `accounts` (`acc_id`);

--
-- Các ràng buộc cho bảng `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `categorys` (`cate_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`prom_id`) REFERENCES `promotion` (`prom_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
