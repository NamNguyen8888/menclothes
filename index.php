<?php
	session_start();
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
		<title>Trang chủ</title>
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
							<a href="./index.php" class="active"><span>Trang chủ</span></a>
							<a href="./Product.php"><span>Sản phẩm</span></a>
							<a href="./phukien.php"><span>Phụ kiện</span></a>
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
			<div class="swiper main">
				<div class="swiper-wrapper">
					<?php
						$sql = 'select * from slider';
						$sliderList = executeResult($sql);
						foreach($sliderList as $item) {
							echo '
								<div class="swiper-slide">
									<section class="hero-slider">
										<div class="hero-slider__item active">
											<div class="hero-slider__item__info">
												<div
													class="hero-slider__item__info__title"
													style="color: '.$item['Color'].'"
												>
													<span>'.$item['Title'].'</span>
												</div>
												<div class="hero-slider__item__info__description">
													<span
														>'.$item['Description'].'</span
													>
												</div>
												<div class="hero-slider__item__info__btn">
													<a href="">
														<button class="btn btn-animate" style="background: '.$item['Color'].'">
															<span class="btn__txt"> Xem chi tiết </span>
														</button>
													</a>
												</div>
											</div>
											<div class="hero-slider__item__image">
												<div class="shape" style="background: '.$item['Color'].'"></div>
												<img src="./upload/'.$item['Slider'].'" alt="" />
											</div>
										</div>
									</section>
								</div>
							';
						}
					?>
				</div>
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>
			<section class="sectionBody">
				<div class="policy-card">
					<div class="policy-cart__icon">
						<i class="bx bx-shopping-bag"></i>
					</div>
					<div class="policy-cart__info">
						<div class="policy-cart__info__name">Miễn phí giao hàng</div>
						<div class="policy-cart__info__description">
							Miễn phí ship với đơn hàng > 239K
						</div>
					</div>
				</div>
				<div class="policy-card">
					<div class="policy-cart__icon">
						<i class="bx bx-credit-card"></i>
					</div>
					<div class="policy-cart__info">
						<div class="policy-cart__info__name">Thanh toán COD</div>
						<div class="policy-cart__info__description">
							Thanh toán khi nhận hàng (COD)
						</div>
					</div>
				</div>
				<div class="policy-card">
					<div class="policy-cart__icon">
						<i class="bx bx-diamond"></i>
					</div>
					<div class="policy-cart__info">
						<div class="policy-cart__info__name">Khách hàng VIP</div>
						<div class="policy-cart__info__description">
							Ưu đãi dành cho khách hàng VIP
						</div>
					</div>
				</div>
				<div class="policy-card">
					<div class="policy-cart__icon">
						<i class="bx bx-diamond"></i>
					</div>
					<div class="policy-cart__info">
						<div class="policy-cart__info__name">Hỗ trợ bảo hành</div>
						<div class="policy-cart__info__description">
							Đổi, sửa đồ tại tất cả store
						</div>
					</div>
				</div>
			</section>
			<section>
				<section class="sectionTitle" > <font color="#0066FF"size="+4">top sản phẩm bán chạy trong tuần</font> </section>
				<div class="products">
					<?php
						$sql = 'select * from products order by rand() limit 4';
						$productsList = executeResult($sql);
						foreach($productsList as $item) {
							echo '
								<div class="product-card">
									<a href="./Details.php?IdProduct='.$item['IdProduct'].'">
										<div class="product-card__image">
											<img src="./upload/'.$item['Image'].'" alt="" />
											<img src="./upload/'.$item['ImageOne'].'" alt="" />
										</div>
										<h3 class="product-card__name">'.$item['ProductName'].'</h3>
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
			</section>
			<section>
				<section class="sectionTitle"><font color="#0066FF"size="+4">sản phẩm mới</font></section>
				<div class="products">
					<?php
						$sql = 'select * from products order by rand() limit 8';
						$productLists = executeResult($sql);
						foreach($productLists as $item) {
							echo '
							<div class="product-card">
								<a href="./Details.php?IdProduct='.$item['IdProduct'].'">
									<div class="product-card__image">
										<img src="./upload/'.$item['Image'].'" alt="" />
										<img src="./upload/'.$item['ImageOne'].'" alt="" />
									</div>
									<h3 class="product-card__name">'.$item['ProductName'].'</h3>
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
			</section>
			<section>
				<section class="sectionBody">
					<a href=""><img src="./css/images/banner.png" alt="" /></a>
				</section>
				<section>
					<section class="sectionTitle">
						<font color="#0066FF"size="+4">top sản phẩm bán chạy trong tuần</font>
					</section>
					<div class="products">
						<?php
							$sql = 'select * from products order by rand() limit 12';
							$productLists = executeResult($sql);
							foreach($productLists as $item) {
								echo '
								<div class="product-card">
									<a href="./Details.php?IdProduct='.$item['IdProduct'].'">
										<div class="product-card__image">
											<img src="./upload/'.$item['Image'].'" alt="" />
											<img src="./upload/'.$item['ImageOne'].'" alt="" />
										</div>
										<h3 class="product-card__name">'.$item['ProductName'].'</h3>
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
				</section>
			</section>
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
