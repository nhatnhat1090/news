-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2015 at 06:08 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manggiaoduc`
--

-- --------------------------------------------------------

--
-- Table structure for table `easyii_admins`
--

CREATE TABLE `easyii_admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `auth_key` varchar(128) NOT NULL,
  `access_token` varchar(128) DEFAULT NULL,
  `role` varchar(16) DEFAULT NULL,
  `cate_manage` varchar(32) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_admins`
--

INSERT INTO `easyii_admins` (`admin_id`, `username`, `password`, `auth_key`, `access_token`, `role`, `cate_manage`, `email`) VALUES
(6, 'admin', '9aa7ccd18de8470e92e56f5eb6f81fb5996bd6a4', '2-SM07VwmZywDNg7VwUDfkL-0YCidFdj', NULL, 'admin', '5,2', NULL),
(5, 'editor', '016a857a1041fd1de074c1f81aab1832c5513f5c', '6hiNKoTsQAf3v4KwXmtZeT-VLj_lDKzw', NULL, 'editor', '11,5,1', 'editor1@manggiaoduc.com'),
(7, 'tuandn', 'd2f8667794b02175afc93bc59ceafa71aa08e7b4', '7hyYj7ZkzmNqmpjUW-u1lbOCUJDowIrb', NULL, 'admin', '5', NULL),
(8, 'linhnt', '90b1a21aa7a0d42ed1d0be378fd8c53305f5e33a', 'x162VflGPi4jvgIgDoCY-KIZptoCKgMj', NULL, 'admin', '1', 'nhatnhat1090@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `easyii_article_categories`
--

CREATE TABLE `easyii_article_categories` (
  `category_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `order_num` int(11) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `tree` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_article_categories`
--

INSERT INTO `easyii_article_categories` (`category_id`, `title`, `image`, `order_num`, `slug`, `tree`, `lft`, `rgt`, `depth`, `status`) VALUES
(2, 'Test', NULL, 2, 'test', 2, 1, 2, 0, 1),
(5, 'Thời sự', '', 3, 'thoi-su', 5, 1, 6, 0, 1),
(8, 'Đô thị', '', 3, 'do-thi', 5, 2, 3, 1, 1),
(9, 'Giao thông', '', 3, 'giao-thong', 5, 4, 5, 1, 1),
(11, 'Giải trí', '', 4, 'giai-tri', 11, 1, 6, 0, 1),
(12, 'Việt Nam', '', 4, 'viet-nam', 11, 2, 3, 1, 1),
(13, 'Quốc tế', '', 4, 'quoc-te', 11, 4, 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_article_items`
--

CREATE TABLE `easyii_article_items` (
  `item_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(128) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `short` varchar(1024) DEFAULT NULL,
  `text` text NOT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `time` int(11) DEFAULT '0',
  `views` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `owner` int(11) NOT NULL,
  `video_url` varchar(1024) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:text,2:photo,3:video',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_article_items`
--

INSERT INTO `easyii_article_items` (`item_id`, `category_id`, `title`, `image`, `short`, `text`, `slug`, `time`, `views`, `status`, `owner`, `video_url`, `type`, `created_at`, `updated_at`) VALUES
(10, 13, 'Người đẹp Miss Universe rạng rỡ trên sân khấu tổng duyệt', '', 'Đại diện Việt Nam, Phạm Hương, chuẩn bị tâm lý sẵn sàng cho đêm chung kết trao giải Hoa hậu Hoàn vũ, diễn ra vào sáng 21/12.', '', 'nguoi-dep-miss-universe-rang-ro-tren-san-khau-tong-duyet', 1450627719, 0, 2, 5, NULL, 2, '2015-12-20 17:09:19', NULL),
(5, 12, 'Lan Khuê lọt top 5 bình chọn ở Miss World 2015', '', 'Đại diện Việt Nam, Thái Lan, Ấn Độ, Pháp, Lebanon là 5 thí sinh đang có lượng bình chọn nhiều nhất. Người chiến thắng giải phụ này sẽ vào thẳng vòng thi ứng xử.', '<p>\r\n	Cuộc thi Hoa hậu Thế giới (Miss World 2015) diễn ra tại Tam Á, Trung  Quốc với sự tham gia của hơn 100 người đẹp đến từ các quốc gia và vùng  lãnh thổ trên khắp thế giới. Đại diện Việt Nam ở đấu trường này là Trần  Ngọc Lan Khuê. Sau một tháng tranh tài, các thí sinh bước vào đêm chung  kết trao giải, được tổ chức tại sân khấu ngoài trời của một khách sạn  sang trọng. \r\n	<br>\r\n	<br>\r\n	 Đến lúc này, 5 gương mặt được các chuyên trang sắc đẹp đánh giá cao nhất  gồm đại diện của Ba Lan, Australia, Pháp, Lebanon, Philippines. Trong  khi đó, Lan Khuê cũng góp mặt trong top 15 thí sinh tiềm năng. Những  thành tích đại diện Việt Nam đã đạt được là top 30 phần thi siêu mẫu,  top 10 đầm dạ hội đẹp nhất.</p><p>Lan Khuê là một trong những thí sinh được chọn múa solo ở màn Dances  of the World. Đại diện Việt Nam mặc áo tứ thân và nón quai thao. </p><p>                            <img alt="Lan Khuê lọt top 5 bình chọn ở Miss World 2015" src="http://img.v3.news.zdn.vn/w660/Uploaded/OpluOAA/2015_12_19/lan_khue_dien.jpg"></p><p>6 hoa hậu thế giới hội tụ ở Tam Á, Trung Quốc trước chung kết. Trong  ảnh là Rolene Strauss (đương kim hoa hậu), Ksenia Sukhinova (Miss World  2008), Megan Young (Miss World 2013), Azra Akın (Miss World 2002), Vu  Văn Hà (Miss World 2012) và Agbani Darego (Miss World 2001). </p><p>                            <img alt="Lan Khuê lọt top 5 bình chọn ở Miss World 2015" src="http://img.v3.news.zdn.vn/w660/Uploaded/OpluOAA/2015_12_19/miss_world_hoi_tu6.jpg"></p>', 'lan-khue-lot-top-5-binh-chon-o-miss-world-215', 1450530498, 0, 1, 5, NULL, 1, '2015-12-19 15:00:00', '2015-12-19 15:16:25'),
(6, 12, '6 bộ đầm giúp Jennifer Phạm tôn dáng', '', 'Bà mẹ hai con vẫn khiến người hâm mộ phải trầm trồ bởi ngoại hình trẻ trung, gợi cảm.', '', '6-bo-dam-giup-jennifer-pham-ton-dang', 1450595875, 0, 1, 0, NULL, 2, '2015-12-20 08:19:25', NULL),
(7, 12, 'Lan Khuê lộng lẫy trên sân khấu tổng duyệt của Miss World', '', 'Hơn 100 người đẹp sẽ cùng nhau tranh tài để tìm ra gương mặt đăng quang Hoa hậu Thế giới lần thứ 65.', '', 'lan-khue-long-lay-tren-san-khau-tong-duyet-cua-miss-world', 1450625697, 0, 1, 0, NULL, 2, '2015-12-20 08:31:42', '2015-12-20 16:34:57'),
(8, 12, 'Lan Khuê tự tin bước vào Top 11 Miss World 2015', '', 'Đại diện Việt Nam giành giải bình chọn của khán giả People Choice và tiến thẳng vào Top 11 Hoa hậu thế giới 2015.', '', 'lan-khue-tu-tin-buoc-vao-top-11-miss-world-215', 1450600891, 0, 1, 0, 'https://www.youtube.com/watch?v=3BY2KRFW_3U', 3, '2015-12-20 09:25:37', '2015-12-20 15:13:09'),
(9, 12, 'CEO Google: Từ mọt sách đến ông vua công nghệ', '/uploads/article/pi-296add4760.jpg', 'Sundar Pichai là một hình mẫu điển hình của người trẻ châu Á, lớn lên với sự trợ giúp của gia đình và bay cao bằng đam mê.', '<p>Sundar Pichai được mệnh danh là một trong những ông vua hiện tại của  làng công nghệ, người mang lại thành công cho Google Chrome, Android và  Google Apps. Ông được cho là người đã khiến một phần sáu dân số thế giới  dùng đến Chrome, mang lại hơn 1 tỷ thiết bị dùng Android chỉ trong năm  ngoái và 40.000 lượt tìm kiếm mỗi giây trên Google. Pichai được định giá  đến 150 triệu USD bởi các nhà đầu tư và là một trong những CEO giàu có  nhất hiện tại.</p> <table>     <tbody>         <tr>             <td><img alt="Sundar Pichai, một trong những người quyền lực nhất giới công nghệ hiện tại. Ảnh: Daily Mail UK." src="http://img.v3.news.zdn.vn/w660/Uploaded/OFH_oazszstq/2015_12_20/pi.jpg"></td>         </tr>         <tr>             <td>Sundar Pichai, một trong những người quyền lực nhất giới công nghệ hiện tại. <em>Ảnh: <strong>Getty.</strong></em></td>         </tr>     </tbody> </table> Pichai có thân thế và tuổi thơ khá khiêm nhường. Ông sinh  ra trong một gia đình lao động trung lưu, và học được những kiến thức  đầu tiên về cơ khí từ người cha Regunatha, vốn là một kỹ sư. Ông không hề tiếp xúc sớm với công nghệ, theo <em>Daily Mail. </em>Năm  12 tuổi, nhà ông mới có chiếc điện thoại đầu tiên, và Pichai cũng không  bộc lộ tài năng gì sớm trừ việc nhớ tất cả số điện thoại ông từng gọi.  Bản thân ông cũng không phải là một học sinh đầu bảng, nhưng là một cậu  trò chăm chỉ. Những người bạn kể lại với tờ <em>The Hindu</em>: “Pichai  là một con mọt sách thực sự. Dù điểm Lịch sử và Địa lý rất lẹt đẹt, cậu  ta lại có một tình yêu vô bờ với khoa học. Cậu ấy từ chối mọi cuộc chơi  đùa và toàn tâm hết sức cho chuyện học. Cậu ấy mê đọc sách đến nỗi không  thèm nhìn đến bạn bè xung quanh”.<p> Nhưng mọi chuyện thay đổi khi Pichai theo học kỹ sư tại  Viện Công nghệ Kharagpur, Ấn Độ. Ông nhanh chóng trở thành một sinh viên  sáng giá, người “luôn hơn bạn bè một cái đầu”. Không lâu sau, Pichai  giành được học bổng toàn phần của Đại học Stanford. Gia đình Pichai,  nhất là người bố, luôn ủng hộ con mình học lên cao bằng mọi giá. Ông rút  toàn bộ 1.000 bảng Anh, tương đương thu nhập gần một năm, để mua vé máy  bay cho cậu sinh viên trẻ. Trả lời <em>Bloomberg </em>trong một cuộc  phỏng vấn gần đây, Pichai cho biết cha mẹ ông đã làm điều mà mọi bậc cha  mẹ sẽ làm cho con cái: "Họ dành gần như toàn bộ tiền dành dụm để tôi  theo đuổi con đường học vấn". Sau này, Pichai mua cho họ một căn hộ mới,  nhưng cha mẹ ông vẫn ưa thích căn nhà mà ông đã lớn lên hơn.</p> <table>     <tbody>         <tr>             <td><img alt="Căn nhà Pichai lớn lên, hiện tại gia đình anh vẫn sống tại đây." src="http://img.v3.news.zdn.vn/w660/Uploaded/OFH_oazszstq/2015_12_20/ho.jpg"></td>         </tr>         <tr>             <td>Căn nhà Pichai lớn lên. Hiện tại, gia đình ông vẫn sống tại đây. <em>Ảnh: <strong>CA Press.</strong></em></td>         </tr>     </tbody> </table> Ở Stanford, Pichai theo đuổi ngành luyện kim, nhưng vẫn  học thêm ngành điện tử mà ông yêu thích. Chính sách giáo dục tại đây cho  phép ông theo đuổi hai ngành học song song. Chẳng lâu sau, Pichai nhận  huy chương dành cho sinh viên xuất sắc, và nhanh chóng xác định được  tình yêu của mình với ngành điện tử và vật liệu. Sau đó, Pichai nhận bằng MBA tại Wharton, trực thuộc Đại  học Pennsylvania. Ông nhận công việc kế toán một năm, cho đến khi được  Google mời phỏng vấn vào 2004. Cuộc phỏng vấn diễn ra vào ngày Cá tháng  Tư (1/4), cùng ngày Gmail được giới thiệu. Pichai vẫn nghĩ đó là một trò  đùa.<p> Nhiệm vụ đầu tiên của Pichai tại Google là dẫn dắt những  đội kỹ thuật đằng sau Chrome OS. Sau đó, ông được giao phụ trách thêm  Google Toolbar, tìm kiếm trên máy tính cá nhân&hellip; Pichai nhanh chóng  thuyết phục được nhiều đối tác cài đặt Toolbar lên máy tính, và phổ cập  công cụ tìm kiếm Google đến hàng trăm triệu thiết bị trên toàn thế giới.  Năm 2008, ông thuyết phục thành công cựu CEO Eric Schmidt, lúc đó vẫn  còn chần chừ, rằng Google cần một nền tảng duyệt web riêng.</p><p> Đó là nước cờ đã làm nên tên tuổi Pichai. Từ khi xuất hiện  vào 2008, Chrome trở thành nền tảng thống trị công cụ duyệt web, và  Pichai được giao phụ trách gần như toàn bộ các sản phẩm của Google, bao  gồm Chrome, Google Apps, tìm kiếm, nghiên cứu, bản đồ, thương mại, quảng  cáo, cơ sở hạ tầng, và Google+, theo thống kê từ <em>Quora</em>.</p><p> Năm 2011, nhiều tin đồn cho biết Twitter muốn mời Pichai  thay thế trưởng đội sản phẩm Jason Goldman, nhưng ông từ chối. Nhiều  nguồn tin cho biết Microsoft cũng ngắm Pichai thay thế cho chức danh CEO  của Steve Ballmer. Tờ <em>Inc.</em> cho biết, Google đã giữ chân Pichai bằng số cổ phiếu trị giá 50 triệu USD.</p><p> Năm 2013, Pichai nắm giữ mảng nền tảng di động, thay thế  chính người đã phát minh ra Android - Andy Rubin. Ông nhanh chóng mang  hơn một tỷ người dùng đến với hệ sinh thái này.</p><p> Tháng 8/2015, Larry Page, một trong hai nhà đồng sáng lập  Google, tuyên bố Google được sát nhập vào Alphabet Inc. Một điều khoản  hợp đồng chỉ định hai nhà sáng lập Page và Sergey Brin rời các vị trí  của họ trong Google, và từ đó, Sundar Pichai chính thức trở thành CEO  của công ty công nghệ quyền lực này.</p><p>Pichai được cho là người giúp Google hợp tác chặt chẽ với  Samsung, nhất là sau lần cùng thăm nhà máy của ông lớn Hàn Quốc với  Larry Page và Google CBO Nikesh Arora. Ông cũng thành lập Android One,  nhân tố giúp Google tiến sâu vào các công ty Ấn Độ như Micromax, Spice  hay Karbonn.</p> <table>     <tbody>         <tr>             <td><img alt="Thành công của Google và Android mang dấu ấn rất đậm nét của Sundar Pichai." src="http://img.v3.news.zdn.vn/w660/Uploaded/OFH_oazszstq/2015_12_20/848946119736640thumbnail.jpg"></td>         </tr>         <tr>             <td>Thành công của Google và Android mang dấu ấn rất đậm nét của Sundar Pichai.</td>         </tr>     </tbody> </table><p>Dù còn ngồi trên ghế nhà trường hay đã trở thành CEO  Google, Sundar Pichai vẫn là một con người điềm tĩnh và “thực tế”. Ông  cất nhắc những người được việc và bỏ qua những kẻ “bè cánh và cơ hội”,  theo <em>Quora</em>. Ông được các đồng sự và cấp dưới đánh giá là một  nhà quản lý vui vẻ, biết cách tạo nên những đội ngũ tốt và truyền cảm  hứng cho họ làm như vậy. Trong khi Larry Page là nhà sáng lập Google  giỏi nói về tương lai và những chân trời cao rộng, Pichai chính là cái  đầu thực tế giúp mang những tầm nhìn ấy đến với người dùng.</p>', 'ceo-google-tu-mot-sach-den-ong-vua-cong-nghe', 1450599887, 0, 2, 5, NULL, 1, '2015-12-20 09:43:09', '2015-12-20 15:13:09');

-- --------------------------------------------------------

--
-- Table structure for table `easyii_carousel`
--

CREATE TABLE `easyii_carousel` (
  `carousel_id` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `link` varchar(255) NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `text` text,
  `order_num` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_carousel`
--

INSERT INTO `easyii_carousel` (`carousel_id`, `image`, `link`, `title`, `text`, `order_num`, `status`) VALUES
(1, '/uploads/carousel/1.jpg', '', 'Ut enim ad minim veniam, quis nostrud exercitation', 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', 1, 1),
(2, '/uploads/carousel/2.jpg', '', 'Sed do eiusmod tempor incididunt ut labore et', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 2, 1),
(3, '/uploads/carousel/3.jpg', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_catalog_categories`
--

CREATE TABLE `easyii_catalog_categories` (
  `category_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `fields` text NOT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `tree` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `order_num` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_catalog_categories`
--

INSERT INTO `easyii_catalog_categories` (`category_id`, `title`, `image`, `fields`, `slug`, `tree`, `lft`, `rgt`, `depth`, `order_num`, `status`) VALUES
(1, 'Gadgets', NULL, '[{"name":"brand","title":"Brand","type":"select","options":["Samsung","Apple","Nokia"]},{"name":"storage","title":"Storage","type":"string","options":""},{"name":"touchscreen","title":"Touchscreen","type":"boolean","options":""},{"name":"cpu","title":"CPU cores","type":"select","options":["1","2","4","8"]},{"name":"features","title":"Features","type":"checkbox","options":["Wi-fi","4G","GPS"]},{"name":"color","title":"Color","type":"checkbox","options":["White","Black","Red","Blue"]}]', 'gadgets', 1, 1, 6, 0, NULL, 1),
(2, 'Smartphones', NULL, '[{"name":"brand","title":"Brand","type":"select","options":["Samsung","Apple","Nokia"]},{"name":"storage","title":"Storage","type":"string","options":""},{"name":"touchscreen","title":"Touchscreen","type":"boolean","options":""},{"name":"cpu","title":"CPU cores","type":"select","options":["1","2","4","8"]},{"name":"features","title":"Features","type":"checkbox","options":["Wi-fi","4G","GPS"]},{"name":"color","title":"Color","type":"checkbox","options":["White","Black","Red","Blue"]}]', 'smartphones', 1, 2, 3, 1, NULL, 1),
(3, 'Tablets', NULL, '[{"name":"brand","title":"Brand","type":"select","options":["Samsung","Apple","Nokia"]},{"name":"storage","title":"Storage","type":"string","options":""},{"name":"touchscreen","title":"Touchscreen","type":"boolean","options":""},{"name":"cpu","title":"CPU cores","type":"select","options":["1","2","4","8"]},{"name":"features","title":"Features","type":"checkbox","options":["Wi-fi","4G","GPS"]},{"name":"color","title":"Color","type":"checkbox","options":["White","Black","Red","Blue"]}]', 'tablets', 1, 4, 5, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_catalog_items`
--

CREATE TABLE `easyii_catalog_items` (
  `item_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(128) NOT NULL,
  `description` text,
  `available` int(11) DEFAULT '1',
  `price` float DEFAULT '0',
  `discount` int(11) DEFAULT '0',
  `data` text NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `time` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_catalog_items`
--

INSERT INTO `easyii_catalog_items` (`item_id`, `category_id`, `title`, `description`, `available`, `price`, `discount`, `data`, `image`, `slug`, `time`, `status`) VALUES
(1, 2, 'Nokia 3310', '<h3>The legend</h3><p>The Nokia 3310 is a GSMmobile phone announced on September 1, 2000, and released in the fourth quarter of the year, replacing the popular Nokia 3210. The phone sold extremely well, being one of the most successful phones with 126 million units sold worldwide.&nbsp;The phone has since received a cult status and is still widely acclaimed today.</p><p>The 3310 was developed at the Copenhagen Nokia site in Denmark. It is a compact and sturdy phone featuring an 84 × 48 pixel pure monochrome display. It has a lighter 115 g battery variant which has fewer features; for example the 133 g battery version has the start-up image of two hands touching while the 115 g version does not. It is a slightly rounded rectangular unit that is typically held in the palm of a hand, with the buttons operated with the thumb. The blue button is the main button for selecting options, with "C" button as a "back" or "undo" button. Up and down buttons are used for navigation purposes. The on/off/profile button is a stiff black button located on the top of the phone.</p>', 5, 100, 0, '{"brand":"Nokia","storage":"1","touchscreen":"0","cpu":1,"color":["White","Red","Blue"]}', '/uploads/catalog/3310.jpg', 'nokia-3310', 1449816870, 1),
(2, 2, 'Galaxy S6', '<h3>Next is beautifully crafted</h3><p>With their slim, seamless, full metal and glass construction, the sleek, ultra thin edged Galaxy S6 and unique, dual curved Galaxy S6 edge are crafted from the finest materials.</p><p>And while they may be the thinnest smartphones we`ve ever created, when it comes to cutting-edge technology and flagship Galaxy experience, these 5.1" QHD Super AMOLED smartphones are certainly no lightweights.</p>', 1, 1000, 10, '{"brand":"Samsung","storage":"32","touchscreen":"1","cpu":8,"features":["Wi-fi","GPS"]}', '/uploads/catalog/galaxy.jpg', 'galaxy-s6', 1449730470, 1),
(3, 2, 'Iphone 6', '<h3>Next is beautifully crafted</h3><p>With their slim, seamless, full metal and glass construction, the sleek, ultra thin edged Galaxy S6 and unique, dual curved Galaxy S6 edge are crafted from the finest materials.</p><p>And while they may be the thinnest smartphones we`ve ever created, when it comes to cutting-edge technology and flagship Galaxy experience, these 5.1" QHD Super AMOLED smartphones are certainly no lightweights.</p>', 0, 1100, 10, '{"brand":"Apple","storage":"64","touchscreen":"1","cpu":4,"features":["Wi-fi","4G","GPS"]}', '/uploads/catalog/iphone.jpg', 'iphone-6', 1449644070, 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_catalog_item_data`
--

CREATE TABLE `easyii_catalog_item_data` (
  `data_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `name` varchar(128) NOT NULL,
  `value` varchar(1024) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_catalog_item_data`
--

INSERT INTO `easyii_catalog_item_data` (`data_id`, `item_id`, `name`, `value`) VALUES
(1, 1, 'brand', 'Nokia'),
(2, 1, 'storage', '1'),
(3, 1, 'touchscreen', '0'),
(4, 1, 'cpu', '1'),
(5, 1, 'color', 'White'),
(6, 1, 'color', 'Red'),
(7, 1, 'color', 'Blue'),
(8, 2, 'brand', 'Samsung'),
(9, 2, 'storage', '32'),
(10, 2, 'touchscreen', '1'),
(11, 2, 'cpu', '8'),
(12, 2, 'features', 'Wi-fi'),
(13, 2, 'features', 'GPS'),
(14, 3, 'brand', 'Apple'),
(15, 3, 'storage', '64'),
(16, 3, 'touchscreen', '1'),
(17, 3, 'cpu', '4'),
(18, 3, 'features', 'Wi-fi'),
(19, 3, 'features', '4G'),
(20, 3, 'features', 'GPS');

-- --------------------------------------------------------

--
-- Table structure for table `easyii_faq`
--

CREATE TABLE `easyii_faq` (
  `faq_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `order_num` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_faq`
--

INSERT INTO `easyii_faq` (`faq_id`, `question`, `answer`, `order_num`, `status`) VALUES
(1, 'Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it?', 'But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure', 1, 1),
(2, 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum?', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta <a href="http://easyiicms.com/">sunt explicabo</a>.', 2, 1),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 't enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_feedback`
--

CREATE TABLE `easyii_feedback` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(64) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `text` text NOT NULL,
  `answer_subject` varchar(128) DEFAULT NULL,
  `answer_text` text,
  `time` int(11) DEFAULT '0',
  `ip` varchar(16) NOT NULL,
  `status` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_feedback`
--

INSERT INTO `easyii_feedback` (`feedback_id`, `name`, `email`, `phone`, `title`, `text`, `answer_subject`, `answer_text`, `time`, `ip`, `status`) VALUES
(1, 'Đỗ Ngọc Tuấn', 'nhatnhat1090@gmail.com', '0966400312', '', 'abc', 'Answer on your feedback message', 'Hello, Đỗ Ngọc Tuấn.\r\n\r\nhehe\r\n\r\nBest regards.', 1450252324, '127.0.0.1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_files`
--

CREATE TABLE `easyii_files` (
  `file_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `file` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `downloads` int(11) DEFAULT '0',
  `time` int(11) DEFAULT '0',
  `order_num` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_files`
--

INSERT INTO `easyii_files` (`file_id`, `title`, `file`, `size`, `slug`, `downloads`, `time`, `order_num`) VALUES
(1, 'Price list', '/uploads/files/example.csv', 104, 'price-list', 0, 1449816872, 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_gallery_categories`
--

CREATE TABLE `easyii_gallery_categories` (
  `category_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `tree` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `order_num` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_gallery_categories`
--

INSERT INTO `easyii_gallery_categories` (`category_id`, `title`, `image`, `slug`, `tree`, `lft`, `rgt`, `depth`, `order_num`, `status`) VALUES
(1, 'Album 1', '/uploads/gallery/album-1.jpg', 'album-1', 1, 1, 2, 0, 2, 1),
(2, 'Album 2', '/uploads/gallery/album-2.jpg', 'album-2', 2, 1, 2, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_guestbook`
--

CREATE TABLE `easyii_guestbook` (
  `guestbook_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `text` text NOT NULL,
  `answer` text,
  `email` varchar(128) DEFAULT NULL,
  `time` int(11) DEFAULT '0',
  `ip` varchar(16) NOT NULL,
  `new` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_guestbook`
--

INSERT INTO `easyii_guestbook` (`guestbook_id`, `name`, `title`, `text`, `answer`, `email`, `time`, `ip`, `new`, `status`) VALUES
(1, 'First user', '', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', NULL, NULL, 1449816870, '127.0.0.1', 0, 1),
(2, 'Second user', '', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', NULL, 1449816872, '127.0.0.1', 0, 1),
(3, 'Third user', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'hihi', NULL, 1449816872, '127.0.0.1', 0, 1),
(4, 'TuanDN', '', 'hoho', NULL, 'nhatnhat1090@gmail.com', 1449826863, '127.0.0.1', 0, 1),
(5, 'Dung', '', 'hehe', NULL, 'nhatnhat1090@gmail.com', 1450255774, '127.0.0.1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_loginform`
--

CREATE TABLE `easyii_loginform` (
  `log_id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `user_agent` varchar(1024) NOT NULL,
  `time` int(11) DEFAULT '0',
  `success` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_loginform`
--

INSERT INTO `easyii_loginform` (`log_id`, `username`, `password`, `ip`, `user_agent`, `time`, `success`) VALUES
(1, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0', 1449816870, 1),
(2, 'admin', '123456', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0', 1450079523, 0),
(3, 'root', '123456', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0', 1450079535, 0),
(4, 'root', 'nevergiveup21102403', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0', 1450079546, 0),
(5, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0', 1450079559, 1),
(6, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0', 1450086109, 1),
(7, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0', 1450091146, 1),
(8, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0', 1450187311, 1),
(9, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.80 Safari/537.36', 1450272214, 1),
(10, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450425689, 1),
(11, 'admin', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450428077, 1),
(12, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450429349, 1),
(13, 'tuandn', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450433843, 1),
(14, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450433886, 1),
(15, 'root', 'lovingyou', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450434070, 0),
(16, 'root', 'lovingyou', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450434181, 0),
(17, 'root', 'lovingyou', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450434186, 0),
(18, 'root', 'root', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450434194, 0),
(19, 'root', '123456', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450434229, 0),
(20, 'root', '123456', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450434436, 0),
(21, 'tuandn', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450440498, 1),
(22, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450440584, 1),
(23, 'tuandn', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450440750, 1),
(24, 'root', 'lovingyou', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450442989, 0),
(25, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450442992, 1),
(26, 'tuandn', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450443841, 1),
(27, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450446479, 1),
(28, 'tuandn', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450447295, 1),
(29, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450447595, 1),
(30, 'tuandn', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450447608, 1),
(31, 'admin', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450447648, 1),
(32, 'editor', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450447674, 1),
(33, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1450496799, 1),
(34, 'tuandn', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1450497303, 1),
(35, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1450508179, 1),
(36, 'tuandn', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1450509640, 1),
(37, 'admin', '123456', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1450513437, 0),
(38, 'admin', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1450513440, 1),
(39, 'linhnt', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1450513472, 1),
(40, 'tuandn', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1450514173, 1),
(41, 'tuandn', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1450519574, 1),
(42, 'tuandn', '23456', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450519910, 0),
(43, 'tuandn', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450519916, 1),
(44, 'editor', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450527248, 1),
(45, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450530015, 1),
(46, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450530471, 1),
(47, 'editor', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450530484, 1),
(48, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450541622, 1),
(49, 'editor', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450599997, 1),
(50, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450601084, 1),
(51, 'admin', '123456', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450625068, 0),
(52, 'admin', '123456', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450625072, 0),
(53, 'admin', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450625077, 1),
(54, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450625424, 1),
(55, 'editor', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450627571, 1),
(56, 'root', '******', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1450630033, 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_migration`
--

CREATE TABLE `easyii_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_migration`
--

INSERT INTO `easyii_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1449816867),
('m000000_000000_install', 1449816869);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_modules`
--

CREATE TABLE `easyii_modules` (
  `module_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `class` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `icon` varchar(32) NOT NULL,
  `settings` text NOT NULL,
  `notice` int(11) DEFAULT '0',
  `order_num` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_modules`
--

INSERT INTO `easyii_modules` (`module_id`, `name`, `class`, `title`, `icon`, `settings`, `notice`, `order_num`, `status`) VALUES
(1, 'article', 'yii\\easyii\\modules\\article\\ArticleModule', 'Tin bài', 'pencil', '{"categoryThumb":true,"articleThumb":true,"enablePhotos":true,"enableShort":true,"shortMaxLength":"255","enableTags":true,"itemsInFolder":false}', 0, 65, 1),
(2, 'carousel', 'yii\\easyii\\modules\\carousel\\CarouselModule', 'Slide ảnh', 'picture', '{"enableTitle":true,"enableText":true}', 0, 40, 1),
(3, 'catalog', 'yii\\easyii\\modules\\catalog\\CatalogModule', 'Catalog', 'list-alt', '{"categoryThumb":true,"itemsInFolder":false,"itemThumb":true,"itemPhotos":true,"itemDescription":true,"itemSale":true}', 0, 100, 0),
(4, 'faq', 'yii\\easyii\\modules\\faq\\FaqModule', 'FAQ', 'question-sign', '[]', 0, 45, 1),
(5, 'feedback', 'yii\\easyii\\modules\\feedback\\FeedbackModule', 'Feedback', 'earphone', '{"mailAdminOnNewFeedback":true,"subjectOnNewFeedback":"New feedback","templateOnNewFeedback":"@easyii\\/modules\\/feedback\\/mail\\/en\\/new_feedback","answerTemplate":"@easyii\\/modules\\/feedback\\/mail\\/en\\/answer","answerSubject":"Answer on your feedback message","answerHeader":"Hello,","answerFooter":"Best regards.","enableTitle":false,"enablePhone":true,"enableCaptcha":false}', 0, 60, 1),
(6, 'file', 'yii\\easyii\\modules\\file\\FileModule', 'Files', 'floppy-disk', '[]', 0, 30, 0),
(7, 'gallery', 'yii\\easyii\\modules\\gallery\\GalleryModule', 'Photo Gallery', 'camera', '{"categoryThumb":true,"itemsInFolder":false}', 0, 90, 0),
(8, 'guestbook', 'yii\\easyii\\modules\\guestbook\\GuestbookModule', 'Guestbook', 'book', '{"enableTitle":false,"enableEmail":true,"preModerate":false,"enableCaptcha":false,"mailAdminOnNewPost":true,"subjectOnNewPost":"New message in the guestbook.","templateOnNewPost":"@easyii\\/modules\\/guestbook\\/mail\\/en\\/new_post","frontendGuestbookRoute":"\\/guestbook","subjectNotifyUser":"Your post in the guestbook answered","templateNotifyUser":"@easyii\\/modules\\/guestbook\\/mail\\/en\\/notify_user"}', 1, 80, 0),
(9, 'news', 'yii\\easyii\\modules\\news\\NewsModule', 'News', 'bullhorn', '{"enableThumb":true,"enablePhotos":true,"enableShort":true,"shortMaxLength":256,"enableTags":true}', 0, 70, 0),
(10, 'page', 'yii\\easyii\\modules\\page\\PageModule', 'Pages', 'file', '[]', 0, 50, 0),
(11, 'shopcart', 'yii\\easyii\\modules\\shopcart\\ShopcartModule', 'Orders', 'shopping-cart', '{"mailAdminOnNewOrder":true,"subjectOnNewOrder":"New order","templateOnNewOrder":"@easyii\\/modules\\/shopcart\\/mail\\/en\\/new_order","subjectNotifyUser":"Your order status changed","templateNotifyUser":"@easyii\\/modules\\/shopcart\\/mail\\/en\\/notify_user","frontendShopcartRoute":"\\/shopcart\\/order","enablePhone":true,"enableEmail":true}', 0, 120, 0),
(12, 'subscribe', 'yii\\easyii\\modules\\subscribe\\SubscribeModule', 'E-mail subscribe', 'envelope', '[]', 0, 10, 0),
(13, 'text', 'yii\\easyii\\modules\\text\\TextModule', 'Text blocks', 'font', '[]', 0, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_news`
--

CREATE TABLE `easyii_news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `short` varchar(1024) DEFAULT NULL,
  `text` text NOT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `time` int(11) DEFAULT '0',
  `views` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_news`
--

INSERT INTO `easyii_news` (`news_id`, `title`, `image`, `short`, `text`, `slug`, `time`, `views`, `status`) VALUES
(1, 'First news title hihi', '/uploads/news/news-1.jpg', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti', '<p><strong>Sed ut perspiciatis</strong>, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem.&nbsp;</p><ul><li>item 1</li><li>item 2</li><li>item 3</li></ul><p>ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur?</p>', 'first-news-title-hihi', 1449816870, 3, 1),
(2, 'Second news title', '/uploads/news/news-2.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p><ol> <li>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </li><li>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</li></ol>', 'second-news-title', 1449730470, 0, 1),
(3, 'Third news title', '/uploads/news/news-3.jpg', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', 'third-news-title', 1449644070, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_pages`
--

CREATE TABLE `easyii_pages` (
  `page_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `slug` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_pages`
--

INSERT INTO `easyii_pages` (`page_id`, `title`, `text`, `slug`) VALUES
(1, 'Index', '<p><strong>All elements are live-editable, switch on Live Edit button to see this feature.</strong>&nbsp;</p><p>Dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&nbsp;Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'page-index'),
(2, 'Shop', '', 'page-shop'),
(3, 'Shop search', '', 'page-shop-search'),
(4, 'Shopping cart', '', 'page-shopcart'),
(5, 'Order created', '<p>Your order successfully created. Our manager will contact you as soon as possible.</p>', 'page-shopcart-success'),
(6, 'News', '', 'page-news'),
(7, 'Articles', '', 'page-articles'),
(8, 'Gallery', '', 'page-gallery'),
(9, 'Guestbook', '', 'page-guestbook'),
(10, 'FAQ', '', 'page-faq'),
(11, 'Contact', '<p><strong>Address</strong>: Dominican republic, Santo Domingo, Some street 123</p><p><strong>ZIP</strong>: 123456</p><p><strong>Phone</strong>: +1 234 56-78</p><p><strong>E-mail</strong>: demo@example.com</p>', 'page-contact');

-- --------------------------------------------------------

--
-- Table structure for table `easyii_photos`
--

CREATE TABLE `easyii_photos` (
  `photo_id` int(11) NOT NULL,
  `class` varchar(128) NOT NULL,
  `item_id` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `order_num` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_photos`
--

INSERT INTO `easyii_photos` (`photo_id`, `class`, `item_id`, `image`, `description`, `order_num`) VALUES
(1, 'yii\\easyii\\modules\\catalog\\models\\Item', 1, '/uploads/photos/3310-1.jpg', '', 1),
(2, 'yii\\easyii\\modules\\catalog\\models\\Item', 1, '/uploads/photos/3310-2.jpg', '', 2),
(3, 'yii\\easyii\\modules\\catalog\\models\\Item', 2, '/uploads/photos/galaxy-1.jpg', '', 3),
(4, 'yii\\easyii\\modules\\catalog\\models\\Item', 2, '/uploads/photos/galaxy-2.jpg', '', 4),
(5, 'yii\\easyii\\modules\\catalog\\models\\Item', 2, '/uploads/photos/galaxy-3.jpg', '', 5),
(6, 'yii\\easyii\\modules\\catalog\\models\\Item', 2, '/uploads/photos/galaxy-4.jpg', '', 6),
(7, 'yii\\easyii\\modules\\catalog\\models\\Item', 3, '/uploads/photos/iphone-1.jpg', '', 7),
(8, 'yii\\easyii\\modules\\catalog\\models\\Item', 3, '/uploads/photos/iphone-2.jpg', '', 8),
(9, 'yii\\easyii\\modules\\catalog\\models\\Item', 3, '/uploads/photos/iphone-3.jpg', '', 9),
(10, 'yii\\easyii\\modules\\catalog\\models\\Item', 3, '/uploads/photos/iphone-4.jpg', '', 10),
(11, 'yii\\easyii\\modules\\news\\models\\News', 1, '/uploads/photos/news-1-1.jpg', '', 11),
(12, 'yii\\easyii\\modules\\news\\models\\News', 1, '/uploads/photos/news-1-2.jpg', '', 12),
(13, 'yii\\easyii\\modules\\news\\models\\News', 1, '/uploads/photos/news-1-3.jpg', '', 13),
(14, 'yii\\easyii\\modules\\news\\models\\News', 1, '/uploads/photos/news-1-4.jpg', '', 14),
(41, 'yii\\easyii\\modules\\article\\models\\Item', 10, '/uploads/photos/sankhau1-bbdba257f9.jpg', '80 người đẹp Miss Universe chuẩn bị bước vào đêm tranh tài cuối cùng để tìm ra gương mặt xuất sắc, kế nhiệm đương kim hoa hậu người Colombia - Paulina Vega.', 41),
(42, 'yii\\easyii\\modules\\article\\models\\Item', 10, '/uploads/photos/sankhau2-06bf16f1f0.jpg', 'Các thí sinh đều rạng rỡ và hào hứng trong buổi tổng duyệt. Đứng giữa dàn người đẹp là diễn viên hài kịch từng chiến thắng giải Emmy - Steve Harvey, đồng thời là MC đêm chung kết.', 42),
(19, 'yii\\easyii\\modules\\gallery\\models\\Category', 1, '/uploads/photos/album-1-9.jpg', '', 19),
(20, 'yii\\easyii\\modules\\gallery\\models\\Category', 1, '/uploads/photos/album-1-8.jpg', '', 20),
(21, 'yii\\easyii\\modules\\gallery\\models\\Category', 1, '/uploads/photos/album-1-7.jpg', '', 21),
(22, 'yii\\easyii\\modules\\gallery\\models\\Category', 1, '/uploads/photos/album-1-6.jpg', '', 22),
(23, 'yii\\easyii\\modules\\gallery\\models\\Category', 1, '/uploads/photos/album-1-5.jpg', '', 23),
(24, 'yii\\easyii\\modules\\gallery\\models\\Category', 1, '/uploads/photos/album-1-4.jpg', '', 24),
(25, 'yii\\easyii\\modules\\gallery\\models\\Category', 1, '/uploads/photos/album-1-3.jpg', '', 25),
(26, 'yii\\easyii\\modules\\gallery\\models\\Category', 1, '/uploads/photos/album-1-2.jpg', '', 26),
(27, 'yii\\easyii\\modules\\gallery\\models\\Category', 1, '/uploads/photos/album-1-1.jpg', '', 27),
(28, 'yii\\easyii\\modules\\article\\models\\Item', 6, '/uploads/photos/img68241-ce867b36bc.jpg', 'Hoa hậu châu Á tại Mỹ 2006 vừa thực hiện bộ ảnh thời trang mới. Khoác lên người những bộ đầm ôm sát cơ thể, bà mẹ hai con khoe khéo đường cong trước ống kính.', 28),
(29, 'yii\\easyii\\modules\\article\\models\\Item', 6, '/uploads/photos/img68511-36c0482a72.jpg', 'Thiết kế hoa văn ấn tượng với điểm nhấn là hàng cúc sau lưng càng làm tôn vóc dáng của người đẹp sinh năm 1985. Bên cạnh đó, tông màu đỏ ấm áp cũng phù hợp để diện trong mùa đông.', 29),
(30, 'yii\\easyii\\modules\\article\\models\\Item', 6, '/uploads/photos/img69431-273e78ede0.jpg', 'Jennifer Phạm chuộng phong cách quyến rũ, sang trọng và thanh lịch.', 30),
(31, 'yii\\easyii\\modules\\article\\models\\Item', 6, '/uploads/photos/img741-76fb6fb9cb.jpg', 'Dù không phải người mẫu chuyên nghiệp, thỉnh thoảng Jennifer Phạm vẫn nhận được lời mời diễn thời trang.', 31),
(32, 'yii\\easyii\\modules\\article\\models\\Item', 6, '/uploads/photos/img72651-36609c3d6c.jpg', 'Cô được mệnh danh là một trong những bà mẹ hai con trẻ trung, gợi cảm nhất showbiz Việt.', 32),
(33, 'yii\\easyii\\modules\\article\\models\\Item', 6, '/uploads/photos/img73571-b180da1593.jpg', 'Bên cạnh đó, cô cũng là nàng thơ của nhiều nhà thiết kế Việt.', 33),
(34, 'yii\\easyii\\modules\\article\\models\\Item', 6, '/uploads/photos/img74111-1c55ed119c.jpg', 'Cũng giống nhiều mỹ nhân khác, bà mẹ hai con chuộng dáng đầm cổ gợi cảm.', 34),
(35, 'yii\\easyii\\modules\\article\\models\\Item', 6, '/uploads/photos/img74241-2ef6b53beb.jpg', 'Phần khoét lưng giúp Jennifer Phạm tôn nét đẹp dịu dàng, nữ tính.', 35),
(36, 'yii\\easyii\\modules\\article\\models\\Item', 7, '/uploads/photos/sankhauchungket1-8ad4c73909.jpg', 'Chung kết Hoa hậu Thế giới (Miss World 2015) diễn ra vào tối 19/12 tại sân khấu ngoài trời của một khách sạn sang trọng ở Tam Á, Trung Quốc. Hơn 100 người đẹp đến từ các quốc gia và vùng lãnh thổ trên thế giới cùng tranh tài để tìm ra gương mặt đăng quang.', 36),
(37, 'yii\\easyii\\modules\\article\\models\\Item', 7, '/uploads/photos/sankhauchungket2-7d37940a02.jpg', 'Sân khấu được thiết kế theo hình tròn với nền màu trắng sang trọng.', 37),
(38, 'yii\\easyii\\modules\\article\\models\\Item', 7, '/uploads/photos/sankhauchungket3-0d7363894a.jpg', 'Toàn cảnh sân khấu lộng lẫy khi được cộng hưởng với ánh sáng. Đảm nhận vai trò dẫn chương trình đêm chung kết trao giải là Megan Young (Miss World 2013) và nam diễn viên kiêm host chương trình truyền hình nổi tiếng Tim Vincent.', 38),
(39, 'yii\\easyii\\modules\\article\\models\\Item', 7, '/uploads/photos/sankhauchungket4-0d8e7181ce.jpg', 'Chung kết Miss World sẽ được mở màn bằng tiết mục Dances of the World. Đại diện Việt Nam là một trong những thí sinh được chọn múa đơn. Lan Khuê sẽ xuất hiện trên sân khấu với trang phục áo dài tứ thân.', 39),
(40, 'yii\\easyii\\modules\\article\\models\\Item', 7, '/uploads/photos/lankhuetongduyet-bd4a6d0563.jpg', 'Hình ảnh Lan Khuê trong buổi tổng duyệt chung kết. Cô chọn bộ đầm đuôi cá ánh kim lấp lánh do Lý Quí Khánh thiết kế.', 40),
(43, 'yii\\easyii\\modules\\article\\models\\Item', 10, '/uploads/photos/tongduyet1-e702100aa4.jpg', 'Phạm Hương và đại diện Cộng hòa Dominica là hai người bạn thân ở Miss Universe. Họ thường xuyên chụp ảnh chung cũng như chia sẻ về nhau.', 43),
(44, 'yii\\easyii\\modules\\article\\models\\Item', 10, '/uploads/photos/tongduyet7-7250eb93b3.jpg', 'Hoa hậu Philippines - Pia Wurtzbach - được coi là đối thủ của Phạm Hương ở khu vực châu Á. Cô sở hữu lượng fan hùng hậu dù thi đấu ở nước Mỹ.', 44),
(45, 'yii\\easyii\\modules\\article\\models\\Item', 10, '/uploads/photos/tongduyet4-a425170bf4.jpg', 'Người đẹp Puerto Rico sở hữu đôi mắt nâu hút hồn, khuôn miệng rộng.', 45),
(46, 'yii\\easyii\\modules\\article\\models\\Item', 10, '/uploads/photos/tongduyet5-3a0cc05957.jpg', 'Hoa hậu Ukraine và Tây Ban Nha không được đánh giá cao ở cuộc thi năm nay.', 46),
(47, 'yii\\easyii\\modules\\article\\models\\Item', 10, '/uploads/photos/tongduyet6-f7fb43719f.jpg', 'Trong khi đó, đại diện Paraguay là một trong những ứng cử viên nặng ký, được trang Missosology xếp vào top 10. Trong đêm bán kết, cả hai phần thi bikini và dạ hội của cô đều được đánh giá cao.', 47),
(48, 'yii\\easyii\\modules\\article\\models\\Item', 10, '/uploads/photos/tongduyet13-e32c51ad39.jpg', 'Hoa hậu Colombia - Ariadna Gutiérrez - với chiều cao 1,78 m và hình thể nóng bỏng cũng được dự đoán là ứng cử viên nặng ký của chiếc vương miện.', 48),
(49, 'yii\\easyii\\modules\\article\\models\\Item', 10, '/uploads/photos/tongduyet11-031a2f22d6.jpg', 'Rất nhiều người dự đoán Olivia Jordan sẽ đăng quang trên sân nhà, dù cô là thí sinh già nhất cuộc thi Hoa hậu Hoàn vũ lần thứ 64.', 49),
(50, 'yii\\easyii\\modules\\article\\models\\Item', 10, '/uploads/photos/tongduyet12-ab541d874c.jpg', 'Nhan sắc rạng ngời của thí sinh nước chủ nhà Mỹ.', 50),
(51, 'yii\\easyii\\modules\\article\\models\\Item', 10, '/uploads/photos/tongduyet22-d3952b85df.jpg', 'Trên sân khấu tổng duyệt, các thí sinh cũng được chọn ngẫu nhiên để bốc thăm câu hỏi ứng xử.', 51),
(52, 'yii\\easyii\\modules\\article\\models\\Item', 10, '/uploads/photos/tongduyet23-9981ae50de.jpg', 'Hoa hậu Mexico diện trang phục cây đen sành điệu.', 52),
(53, 'yii\\easyii\\modules\\article\\models\\Item', 10, '/uploads/photos/tongduyet19-dfd786998e.jpg', 'Hoa hậu Singapore không gây ấn tượng ở cuộc thi bằng những đại diện châu Á khác như Việt Nam, Philippines, Ấn Độ, Thái Lan.', 53),
(54, 'yii\\easyii\\modules\\article\\models\\Item', 10, '/uploads/photos/tongduyet17-27dcfa6c9f.jpg', 'Đại diện Ghana trình diễn tự tin.', 54),
(55, 'yii\\easyii\\modules\\article\\models\\Item', 10, '/uploads/photos/tongduyet2-8697e43135.jpg', 'Hoa hậu Australia cũng nằm trong top 10 ứng cử viên sáng giá. Ưu điểm của cô là gương mặt đẹp, nụ cười rạng ngời.', 55);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_seotext`
--

CREATE TABLE `easyii_seotext` (
  `seotext_id` int(11) NOT NULL,
  `class` varchar(128) NOT NULL,
  `item_id` int(11) NOT NULL,
  `h1` varchar(128) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `keywords` varchar(128) DEFAULT NULL,
  `description` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_seotext`
--

INSERT INTO `easyii_seotext` (`seotext_id`, `class`, `item_id`, `h1`, `title`, `keywords`, `description`) VALUES
(1, 'yii\\easyii\\modules\\page\\models\\Page', 1, '', 'EasyiiCMS demo', '', 'yii2, easyii, admin'),
(2, 'yii\\easyii\\modules\\page\\models\\Page', 2, 'Shop categories', 'Extended shop title', '', ''),
(3, 'yii\\easyii\\modules\\page\\models\\Page', 3, 'Shop search results', 'Extended shop search title', '', ''),
(4, 'yii\\easyii\\modules\\page\\models\\Page', 4, 'Shopping cart H1', 'Extended shopping cart title', '', ''),
(5, 'yii\\easyii\\modules\\page\\models\\Page', 5, 'Success', 'Extended order success title', '', ''),
(6, 'yii\\easyii\\modules\\page\\models\\Page', 6, 'News H1', 'Extended news title', '', ''),
(7, 'yii\\easyii\\modules\\page\\models\\Page', 7, 'Articles H1', 'Extended articles title', '', ''),
(8, 'yii\\easyii\\modules\\page\\models\\Page', 8, 'Photo gallery', 'Extended gallery title', '', ''),
(9, 'yii\\easyii\\modules\\page\\models\\Page', 9, 'Guestbook H1', 'Extended guestbook title', '', ''),
(10, 'yii\\easyii\\modules\\page\\models\\Page', 10, 'Frequently Asked Question', 'Extended faq title', '', ''),
(11, 'yii\\easyii\\modules\\page\\models\\Page', 11, 'Contact us', 'Extended contact title', '', ''),
(12, 'yii\\easyii\\modules\\catalog\\models\\Category', 2, 'Smartphones H1', 'Extended smartphones title', '', ''),
(13, 'yii\\easyii\\modules\\catalog\\models\\Category', 3, 'Tablets H1', 'Extended tablets title', '', ''),
(14, 'yii\\easyii\\modules\\catalog\\models\\Item', 1, 'Nokia 3310', '', '', ''),
(15, 'yii\\easyii\\modules\\catalog\\models\\Item', 2, 'Samsung Galaxy S6', '', '', ''),
(16, 'yii\\easyii\\modules\\catalog\\models\\Item', 3, 'Apple Iphone 6', '', '', ''),
(17, 'yii\\easyii\\modules\\news\\models\\News', 1, 'First news H1', '', '', ''),
(18, 'yii\\easyii\\modules\\news\\models\\News', 2, 'Second news H1', '', '', ''),
(19, 'yii\\easyii\\modules\\news\\models\\News', 3, 'Third news H1', '', '', ''),
(26, 'yii\\easyii\\modules\\gallery\\models\\Category', 1, 'Album 1 H1', 'Extended Album 1 title', '', ''),
(27, 'yii\\easyii\\modules\\gallery\\models\\Category', 2, 'Album 2 H1', 'Extended Album 2 title', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `easyii_settings`
--

CREATE TABLE `easyii_settings` (
  `setting_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `title` varchar(128) NOT NULL,
  `value` varchar(1024) NOT NULL,
  `visibility` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_settings`
--

INSERT INTO `easyii_settings` (`setting_id`, `name`, `title`, `value`, `visibility`) VALUES
(1, 'easyii_version', 'EasyiiCMS version', '0.9', 0),
(2, 'recaptcha_key', 'ReCaptcha key', '1', 1),
(3, 'password_salt', 'Password salt', 'Qp-lw2Fin1FYWdpbL-bpF9orQz99qLEB', 0),
(4, 'root_auth_key', 'Root authorization key', '7hyYj7ZkzmNqmpjUW-u1lbOCUJDowIrb', 0),
(5, 'root_password', 'Root password', 'd2f8667794b02175afc93bc59ceafa71aa08e7b4', 1),
(6, 'auth_time', 'Auth time', '86400', 1),
(7, 'robot_email', 'Robot E-mail', 'noreply@cms-shop.vn', 1),
(8, 'admin_email', 'Admin E-mail', 'nhatnhat1090@gmail.com', 2),
(9, 'recaptcha_secret', 'ReCaptcha secret', '1', 1),
(10, 'toolbar_position', 'Frontend toolbar position ("top" or "bottom")', 'top', 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_shopcart_goods`
--

CREATE TABLE `easyii_shopcart_goods` (
  `good_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `options` varchar(255) NOT NULL,
  `price` float DEFAULT '0',
  `discount` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `easyii_shopcart_orders`
--

CREATE TABLE `easyii_shopcart_orders` (
  `order_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `comment` varchar(1024) NOT NULL,
  `remark` varchar(1024) NOT NULL,
  `access_token` varchar(32) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `time` int(11) DEFAULT '0',
  `new` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `easyii_subscribe_history`
--

CREATE TABLE `easyii_subscribe_history` (
  `history_id` int(11) NOT NULL,
  `subject` varchar(128) NOT NULL,
  `body` text NOT NULL,
  `sent` int(11) DEFAULT '0',
  `time` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `easyii_subscribe_subscribers`
--

CREATE TABLE `easyii_subscribe_subscribers` (
  `subscriber_id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `time` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `easyii_tags`
--

CREATE TABLE `easyii_tags` (
  `tag_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `frequency` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_tags`
--

INSERT INTO `easyii_tags` (`tag_id`, `name`, `frequency`) VALUES
(1, 'php', 1),
(2, 'yii2', 2),
(3, 'jquery', 2),
(4, 'html', 1),
(60, 'hoàn vũ', 1),
(7, 'ajax', 1),
(34, 'hoa hậu', 2),
(33, 'giải trí', 1),
(59, 'công nghệ', 1),
(58, 'CEO', 1),
(57, 'google', 1),
(61, 'miss universe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_tags_assign`
--

CREATE TABLE `easyii_tags_assign` (
  `class` varchar(128) NOT NULL,
  `item_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_tags_assign`
--

INSERT INTO `easyii_tags_assign` (`class`, `item_id`, `tag_id`) VALUES
('yii\\easyii\\modules\\news\\models\\News', 1, 7),
('yii\\easyii\\modules\\news\\models\\News', 1, 3),
('yii\\easyii\\modules\\news\\models\\News', 1, 2),
('yii\\easyii\\modules\\news\\models\\News', 2, 2),
('yii\\easyii\\modules\\news\\models\\News', 2, 3),
('yii\\easyii\\modules\\news\\models\\News', 2, 4),
('yii\\easyii\\modules\\article\\models\\Item', 10, 61),
('yii\\easyii\\modules\\news\\models\\News', 1, 1),
('yii\\easyii\\modules\\article\\models\\Item', 10, 60),
('yii\\easyii\\modules\\article\\models\\Item', 5, 34),
('yii\\easyii\\modules\\article\\models\\Item', 5, 33),
('yii\\easyii\\modules\\article\\models\\Item', 10, 34),
('yii\\easyii\\modules\\article\\models\\Item', 9, 59),
('yii\\easyii\\modules\\article\\models\\Item', 9, 57),
('yii\\easyii\\modules\\article\\models\\Item', 9, 58);

-- --------------------------------------------------------

--
-- Table structure for table `easyii_texts`
--

CREATE TABLE `easyii_texts` (
  `text_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `slug` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `easyii_texts`
--

INSERT INTO `easyii_texts` (`text_id`, `text`, `slug`) VALUES
(1, 'Welcome on EasyiiCMS demo website', 'index-welcome-title');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `easyii_admins`
--
ALTER TABLE `easyii_admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `access_token` (`access_token`);

--
-- Indexes for table `easyii_article_categories`
--
ALTER TABLE `easyii_article_categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `easyii_article_items`
--
ALTER TABLE `easyii_article_items`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `easyii_carousel`
--
ALTER TABLE `easyii_carousel`
  ADD PRIMARY KEY (`carousel_id`);

--
-- Indexes for table `easyii_catalog_categories`
--
ALTER TABLE `easyii_catalog_categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `easyii_catalog_items`
--
ALTER TABLE `easyii_catalog_items`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `easyii_catalog_item_data`
--
ALTER TABLE `easyii_catalog_item_data`
  ADD PRIMARY KEY (`data_id`),
  ADD KEY `item_id_name` (`item_id`,`name`),
  ADD KEY `value` (`value`(300));

--
-- Indexes for table `easyii_faq`
--
ALTER TABLE `easyii_faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `easyii_feedback`
--
ALTER TABLE `easyii_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `easyii_files`
--
ALTER TABLE `easyii_files`
  ADD PRIMARY KEY (`file_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `easyii_gallery_categories`
--
ALTER TABLE `easyii_gallery_categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `easyii_guestbook`
--
ALTER TABLE `easyii_guestbook`
  ADD PRIMARY KEY (`guestbook_id`);

--
-- Indexes for table `easyii_loginform`
--
ALTER TABLE `easyii_loginform`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `easyii_migration`
--
ALTER TABLE `easyii_migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `easyii_modules`
--
ALTER TABLE `easyii_modules`
  ADD PRIMARY KEY (`module_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `easyii_news`
--
ALTER TABLE `easyii_news`
  ADD PRIMARY KEY (`news_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `easyii_pages`
--
ALTER TABLE `easyii_pages`
  ADD PRIMARY KEY (`page_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `easyii_photos`
--
ALTER TABLE `easyii_photos`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `model_item` (`class`,`item_id`);

--
-- Indexes for table `easyii_seotext`
--
ALTER TABLE `easyii_seotext`
  ADD PRIMARY KEY (`seotext_id`),
  ADD UNIQUE KEY `model_item` (`class`,`item_id`);

--
-- Indexes for table `easyii_settings`
--
ALTER TABLE `easyii_settings`
  ADD PRIMARY KEY (`setting_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `easyii_shopcart_goods`
--
ALTER TABLE `easyii_shopcart_goods`
  ADD PRIMARY KEY (`good_id`);

--
-- Indexes for table `easyii_shopcart_orders`
--
ALTER TABLE `easyii_shopcart_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `easyii_subscribe_history`
--
ALTER TABLE `easyii_subscribe_history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `easyii_subscribe_subscribers`
--
ALTER TABLE `easyii_subscribe_subscribers`
  ADD PRIMARY KEY (`subscriber_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `easyii_tags`
--
ALTER TABLE `easyii_tags`
  ADD PRIMARY KEY (`tag_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `easyii_tags_assign`
--
ALTER TABLE `easyii_tags_assign`
  ADD KEY `class` (`class`),
  ADD KEY `item_tag` (`item_id`,`tag_id`);

--
-- Indexes for table `easyii_texts`
--
ALTER TABLE `easyii_texts`
  ADD PRIMARY KEY (`text_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `easyii_admins`
--
ALTER TABLE `easyii_admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `easyii_article_categories`
--
ALTER TABLE `easyii_article_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `easyii_article_items`
--
ALTER TABLE `easyii_article_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `easyii_carousel`
--
ALTER TABLE `easyii_carousel`
  MODIFY `carousel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `easyii_catalog_categories`
--
ALTER TABLE `easyii_catalog_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `easyii_catalog_items`
--
ALTER TABLE `easyii_catalog_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `easyii_catalog_item_data`
--
ALTER TABLE `easyii_catalog_item_data`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `easyii_faq`
--
ALTER TABLE `easyii_faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `easyii_feedback`
--
ALTER TABLE `easyii_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `easyii_files`
--
ALTER TABLE `easyii_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `easyii_gallery_categories`
--
ALTER TABLE `easyii_gallery_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `easyii_guestbook`
--
ALTER TABLE `easyii_guestbook`
  MODIFY `guestbook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `easyii_loginform`
--
ALTER TABLE `easyii_loginform`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `easyii_modules`
--
ALTER TABLE `easyii_modules`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `easyii_news`
--
ALTER TABLE `easyii_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `easyii_pages`
--
ALTER TABLE `easyii_pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `easyii_photos`
--
ALTER TABLE `easyii_photos`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `easyii_seotext`
--
ALTER TABLE `easyii_seotext`
  MODIFY `seotext_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `easyii_settings`
--
ALTER TABLE `easyii_settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `easyii_shopcart_goods`
--
ALTER TABLE `easyii_shopcart_goods`
  MODIFY `good_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `easyii_shopcart_orders`
--
ALTER TABLE `easyii_shopcart_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `easyii_subscribe_history`
--
ALTER TABLE `easyii_subscribe_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `easyii_subscribe_subscribers`
--
ALTER TABLE `easyii_subscribe_subscribers`
  MODIFY `subscriber_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `easyii_tags`
--
ALTER TABLE `easyii_tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `easyii_texts`
--
ALTER TABLE `easyii_texts`
  MODIFY `text_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
