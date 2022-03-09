<?php
	require_once "./database/dbhelper.php";
?>
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
		<link
			rel="stylesheet"
			href="https://unpkg.com/swiper/swiper-bundle.min.css"
		/>
		<title>Phụ kiện</title>
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
							<a href="./Product.php"><span>Sản phẩm</span></a>
							<a href="./phukien.php"  class="active"><span>Phụ kiện</span></a>
							<a href="./baohanh.php"><span>Bảo hành</span></a>
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
								<a href="./Login/login.php">
									<i class="bx bx-user"></i>
								</a>
						</div>
					</div>
				</div>
			</div>
		</header>
		<div class="container">
			<main class="main">

					<div class="products">
						<?php
							$sql = 'select * from accessory';
							$productsList = executeResult($sql);
							foreach($productsList as $item) {
								echo '
									<div class="product-card">
										<a href="./Details.php?id='.$item['id'].'">
											<div class="product-card__image">
												<img src="./upload/'.$item['Image'].'" alt="" />
											</div>
											<h3 class="product-card__name">'.$item['Name'].'</h3>
											<div class="product-card__price">
												<span class="product-card__price__old">'.number_format($item['Price']).' Đ</span>
											</div>
											<div class="product-card__btn">
												<button class="btn btn-animate" style="background-color: #4267b2">
													<span class="btn__txt"> Chọn mua </span>
													<span class="btn__icon"><i class="bx bx-cart"></i></span>
												</button>
											</div>
										</a>
									</div>
								';
							}
						?>
					
					</div>
			</main>
		</div>
			<footer class="footer">
			<div class="container">
				<div class="grid">
					<div class="grid__width">
						<div class="footer__title">Tổng đài hỗ trợ</div>
						<div class="footer__content">
							<a href="tel://0847326456">Liên hệ đặt hàng : 0847326456</a><br>					
							<a href="https://www.facebook.com/nhn2201/">Góp ý, khiếu nại</a><br>
							<a href="https://www.facebook.com/nhn2201/">Thắc mắc đơn hàng</a>							
						</div>
					</div>
					<div class="grid__width">
						<div class="footer__title">Ve Yolo</div>
						<div class="footer__content">
							<p><a href="">Giới thiệu</a></p>
							<p><a href="">Liên hệ</a></p>
							<p><a href="">Tuyển dụng</a></p>
							<p><a href="">Tin tức</a></p>
							<p><a href="">Hệ thống cửa hàng</a></p>
						</div>
					</div>
					<div class="grid__width">
						<div class="footer__title">Chăm sóc khách hàng</div>
						<div class="footer__content">
							<p><a href="">Chính sách đổi trả</a></p>
							<p><a href="">Chính sách bảo hành</a></p>
							<p><a href="">Chính sách hoàn tiền</a></p>
						</div>
					</div>
					<div class="grid__width footer__about">
						<p>
							<a href=""
								><img src="./css/images/Logo-2.png" class="footer__logo" alt=""
							/></a>
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

		<script
			src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
			integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		></script>
		<script src="./js/main.js"></script>
		<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
		<script>
			var swiper = new Swiper('.main', {
				slidesPerView: 1,
				spaceBetween: 30,
				loop: true,
				pagination: {
					el: '.swiper-pagination',
					clickable: true,
				},
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev',
				},
			});
		</script>
	</body>
</html>
