<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="./css/reset.css" />
		<link rel="stylesheet" href="./css/style.css" />
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.0.1/css/boxicons.min.css"
		/>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css"
		/>
		<title>Chính sách đổi / trả hàng</title>
	</head>
	<body>
		<header class="header">
			<div class="container">
				<div class="header__logo">
					<a href=""><img src="./css/images/Logo-2.png" alt="" /></a>
				</div>
				<div class="header__menu">
					<div class="header__menu-mobile-toggle">
						<i class="bx bx-menu-alt-left"></i>
					</div>
					<div class="header__menu__left">
						<div class="header__menu__left__close">
							<i class="bx bx-chevron-left"></i>
						</div>
						<div
							class="header__menu__item header__menu__left__item"
							id="activeNav"
						>
							<a href="./index.php"><span>Trang chủ</span></a>
							<a href="./Product.php" ><span>Sản phẩm</span></a>
							<a href="./phukien.php"><span>Phụ kiện</span></a>
							<a href="./baohanh.php" class="active"><span>Bảo hành</span></a>
						</div>
					</div>
					<div class="header__menu__right">
						<div class="header__menu__item header__menu__right__item">
							<i class="bx bx-search"></i>
						</div>
						<div class="header__menu__item header__menu__right__item">
							<a href="./Cart.php">
								<i class="bx bx-shopping-bag"></i>
								<?php
										if(!empty($_SESSION['cart'])) {
											$count = count($_SESSION['cart']);
											echo '
											<span class="CartQty"  style="font-size: 18px; color: white; font-weight: 600; position: absolute; top: 10px; padding: 3px; background-color: red; right: 120px; text-align: center; width: 20px; height: 20px; border-radius: 50%;"> 
											'.$count.'
											</span>
											';
										}
										else {
											echo '
											';
										}
									?>
							</a>
						</div>
						<div class="header__menu__item header__menu__right__item">
							<i class="bx bx-user"></i>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div class="container">
			<div class="main">
				<div id="PageContainer">
					<main class="main-content" role="main">
						<section id="page-wrapper">
							<div class="wrapper1">
								<div class="inner">
									<div class="grid">
										<div class="grid__item large--one-whole">
											
											<font size="+1"><br>
											<h3><center><font color="#000000"size="+3">CHÍNH SÁCH ĐỔI/ TRẢ HÀNG</font></center></h3><br><br>
											<div class="rte">
												<p><strong><font color="#000000"size="+2">I/ Quy Định Đổi Hàng.</font></strong></p><br>
												<p>
													<strong><em> Chính sách áp dụng:</em></strong> Áp dụng
													01 lần đổi/01 đơn hàng.
												</p>
												<p>
													- Sản phẩm nguyên giá được đổi sang sản phẩm nguyên
													giá khác còn hàng. Khách hàng thanh toán số tiền chênh
													lệch nếu giá trị sản phẩm đổi lớn hơn. Không hoàn trả
													lại tiền thừa dưới bất kỳ hình thức nào.
												</p>
												<p>
													- Sản phẩm giảm giá đến 30% được đổi màu/size (nếu còn
													hàng) hoặc theo quy chế từng chương trình (nếu có) -
													Không hỗ trợ đổi sang sản phẩm khác.
												</p>
												<p>
													- Sản phẩm không áp dụng đổi bao gồm: Phụ kiện, giày dép, quần áo, sản phẩm giảm giá từ 50%.
												</p>
												<p>- Sản phẩm chỉ được đổi một lần duy nhất.</p>
												<p>
													<strong><em> Điều kiện đổi sản phẩm:</em></strong>
												</p>
												<p>
													- Đổi hàng trong vòng 03 ngày kể từ ngày khách hàng
													nhận được sản phẩm
												</p>
												<p>
													- Sản phẩm còn trong tình trạng ban đầu khi nhận hàng,
													còn nguyên tem và nhãn mác.
												</p>
												<p>- Sản phẩm chưa qua giặt ủi hoặc bẩn, bị hư hỏng.</p><br>
												<p><strong><font size="+2">I/ Quy Định Trả Hàng.</font></strong></p> <br>
												<p>
													<strong><em> Chính sách áp dụng:</em></strong>
												</p>
												<p>
													- Khách hàng được trả sản phẩm trong trường hợp có lỗi
													phát sinh từ nhà sản xuất và không có nhu cầu đổi sang
													sản phẩm khác.
												</p>
												<p>
													- Các trường hợp lỗi do nhà sản xuất gồm: phai
													màu, lỗi chất liệu, lỗi đường may…
												</p>
												<p>
													- Hoàn tiền lại sản phẩm gặp lỗi qua tài khoản ngân
													hàng.
												</p>
												<p>
													- YoLo chịu 100% chi phí vận chuyển trả lại hàng.
												</p>
												<p>
													- YoLo sẽ xử lý trong vòng 10 ngày kể từ ngày nhận
													được sản phẩm lỗi.
												</p></font><br><BR>
											<img
												src="./css/images/doitra.png" height="1000" width="1500"
											/>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</main>
				</div>
			</div>
		</div>

		<footer class="footer">
			<div class="container">
				<div class="grid">
					<div class="grid__width">
						<div class="footer__title"><font color="#0066FF"size="+2">Tổng đài hỗ trợ </font></div>
						<div class="footer__content">
							<a href="tel://0847326456">Liên hệ đặt hàng : 0847326456</a><br><br>
							<a href="https://www.facebook.com/nhn2201/">Góp ý, khiếu nại</a><br><br>
							<a href="https://www.facebook.com/nhn2201/">Thắc mắc đơn hàng</a>
						</div>
					</div>
					<div class="grid__width">
						<div class="footer__title"><font color="#0066FF"size="+2">Ve Yolo</font></div>
						<div class="footer__content">
							<p><a href="baohanh.php">Chính sách đổi trả</a></p>
						
							<p><a href="baohanh.php">Chính sách bảo hành</a></p>
								<p><a href="https://www.facebook.com/nhn2201/">Liên hệ</a></p>
						</div>
					</div>
					<div class="grid__width">
						<div class="footer__title"><font color="#0066FF"size="+2">Chăm sóc khách hàng </font></div>
						<div class="footer__content">
							
							</li>
							
								<li class="tel://0847326456">Call: 0847.326.456</li><br>
								<li class="tel://0847326456">Zalo: 0847.326.456</li><br>
								<li class="contact-4">nam28062019@gmail.com</li>
							
						</div>
					</div>
					<div class="grid__width footer__about">
						<p>
							<a href=""
								><center><font size="+2"> <img src="./css/images/Logo-2.png" class="footer__logo" alt="" height="700" width="200" 
							/></center></font></a>
						</p>
						<p>
							Hướng đến mục tiêu mang lại niềm vui ăn mặc mới mỗi ngày cho hàng
							triệu người tiêu dùng Việt. Hãy cùng Yolo hướng đến một cuộc sống
							năng động, tích cực hơn.
						</p>
					</div>
				</div>
			</div>
		</footer>
		<script src="./js/main.js"></script>
	</body>
</html>
