<?php
	require_once('./database/dbhelper.php');
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
		<title>Sản phẩm</title>
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
							<a href="./Product.php" class="active"><span>Sản phẩm</span></a>
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
			<div class="main">
				<div class="catalog">
					<div class="catalog__filter">
						<div class="catalog__filter__widget">
							<div class="catalog__filter__widget__title">
								danh mục sản phẩm
								<div class="catalog__filter__widget__content">
									<form action="" method="post">
										<div class="catalog__filter__widget__content__item">
											<?php
												$sql = 'select * from Category';
												$Category = executeResult($sql);
												
												foreach($Category as $item) {
													$checked =[];
													if(isset($_GET['checkbox'])) {
														$checked = $_GET['checkbox'];
													}
													echo '
													<label for="" class="custom-checkbox">
														<input type="checkbox" name="checkbox[]" id="" value="'.$item['IdCategory'].'" />
														<!-- <span class="custom-checkbox__checkmark">
															<i class="bx bxs-check-square"></i>
														</span> -->
														<span>'.$item['Category'].'</span>
													</label>
												';
												}
												
											?>
										</div>
									</form>
									
								</div>
							</div>
						</div>
					</div>
					<div class="catalog__content">
						<div class="products">
							
							<?php
		
									if(isset($_GET['checkbox'])) {
										$branchecked =[];
										$branchecked = $_GET['checkbox'];
										print($branchecked);
										foreach($branchecked as $rowbrand) {
											$sql = "select * from products where IdCategory in ($rowbrand)";
											$productList = executeResult($sql);
											foreach($productList as $item) {
												echo '
													<div class="product-card">
														<a href="./Details.php?IdProduct='.$item['IdProduct'].'">
															<div class="product-card__image">
																<img
																	src="./upload/'.$item['Image'].'"
																	alt=""
																/>
																<img
																	src="./upload/'.$item['ImageOne'].'"
																	alt=""
																/>
															</div>
															<h3 class="product-card__name">'.$item['ProductName'].'</h3>
															<div class="product-card__price">
																<span class="product-card__price__old">'.number_format($item['Price']).' Đ</span>
															</div>
														</a>
														<div class="product-card__btn">
															<button
																class="btn btn-animate"
																style="background-color: #4267b2"
															>
																<span class="btn__txt"> Chọn mua </span>
																<span class="btn__icon"><i class="bx bx-cart"></i></span>
															</button>
														</div>
													</div>
												';
											}
										}
										

									}
									else {
										$sql = 'select * from products';
										$productList = executeResult($sql);
										foreach($productList as $item) {
											echo '
												<div class="product-card">
													<a href="./Details.php?IdProduct='.$item['IdProduct'].'">
														<div class="product-card__image">
															<img
																src="./upload/'.$item['Image'].'"
																alt=""
															/>
															<img
																src="./upload/'.$item['ImageOne'].'"
																alt=""
															/>
														</div>
														<h3 class="product-card__name">'.$item['ProductName'].'</h3>
														<div class="product-card__price">
															<span class="product-card__price__old">'.number_format($item['Price']).' Đ</span>
														</div>
													
													<div class="product-card__btn">
														<button
															class="btn btn-animate"
															style="background-color: #4267b2"
														>
															<span class="btn__txt"> Chọn mua </span>
															<span class="btn__icon"><i class="bx bx-cart"></i></span>
														</button>

													</div>
													</a>
												</div>
											';
										}
									}
								
								
								
							?>
						</div>
					</div>
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
