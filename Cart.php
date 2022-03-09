<?php
	session_start();
  require_once('./database/dbhelper.php');
	if(isset($_POST['updateCart'])) {
		$updateQty = $_POST['cartqty'];
		$cart = unserialize(serialize($_SESSION['cart']));
		
		for($i=0;$i<count($cart);$i++) {
			$cart[$i]['Quantity'] = $updateQty[$i];
		}
		$_SESSION['cart'] = $cart;
	}
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
		<!--  -->
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
		/>
    

		<link rel="stylesheet" href="./css/wp/index.css" />
		<script
			type="text/javascript"
			src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
			id="jquery-core-js"
		></script>
		<script
			type="text/javascript"
			src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.3.2/jquery-migrate.min.js"
			id="jquery-migrate-js"
		></script>

		<!--  -->

		<title>Sản phẩm</title>
	</head>
	<body>
		<header class="header">
			<div class="containers">
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
							<i class="bx bx-user"></i>
						</div>
					</div>
				</div>
			</div>
		</header>
		<div class="container">
			<main id="main" class="main">
				<div class="cart-container container page-wrapper page-checkout">
					<div class="woocommerce">
						<div class="woocommerce-notices-wrapper"></div>
						<div class="woocommerce row row-large row-divided">
							<div class="col large-7 pb-0 ">
							<form class="woocommerce-cart-form" method="post">
								<div class="cart-wrapper sm-touch-scroll">
									<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
										<thead>
											<tr>
												<th class="product-name" colspan="3">Sản phẩm</th>
												<th class="product-price">Giá</th>
												<th class="product-quantity">Số lượng</th>
												<th class="product-subtotal">Tạm tính</th>
											</tr>
										</thead>
										<tbody>
											<?php
												if(isset($_GET['action'])) {
													if($_GET['action'] == "remove") {
														foreach($_SESSION['cart'] as $key => $value) {
															if($value['Id'] == $_GET['Id']) {
																unset($_SESSION['cart'][$key]);
															}
														}
													}
												}
												if(!empty($_SESSION['cart'])) {
													foreach($_SESSION['cart'] as $key => $value) {
														echo '
															<tr class="woocommerce-cart-form__cart-item cart_item">
																<td class="product-remove">
																	<a href="./Cart.php?action=remove&Id='.$value['Id'].'" class="remove" aria-label="Xóa sản phẩm này" data-product_id="5546" data-product_sku="">&times;</a>					
																</td>
																<td class="product-thumbnail">
																	<a href="">
																		<img width="300" height="300" src="./upload/'.$value['Image'].'" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" sizes="(max-width: 300px) 100vw, 300px" />
																	</a>
																</td>
																<td class="product-name" data-title="Sản phẩm">
																	<a href="">
																		'.$value['ProductName'].'
																	</a>
																	<div class="show-for-small mobile-product-price">
																		<span class="mobile-product-price__qty">1 x </span>
																		<span class="woocommerce-Price-amount amount"><bdi>'.number_format($value['Price']).'&nbsp;<span class="woocommerce-Price-currencySymbol">VND</span></bdi></span>
																	</div>
																</td>
																<td class="product-price" data-title="Giá">
																	<span class="woocommerce-Price-amount amount price-one-tam"><bdi>'.number_format($value['Price']).'&nbsp;<span class="woocommerce-Price-currencySymbol">VND</span></bdi></span>
																</td>
																<td class="product-quantity" data-title="Số lượng">
																	<div class="quantity buttons_added form-minimal">
																		<input type="button" value="-" class="minus button is-form">
																			<label class="screen-reader-text" for="quantity_61be8cf1885cb">
																				'.$value['ProductName'].' số lượng
																			</label>
																		<input
																			type="number"
																			id="quantity_61be8cf1885cb"
																			class="input-text qty text"
																			step="1"
																			min="0"
																			max=""
																			name="cartqty[]"
																			value="'.$value['Quantity'].'"
																			title="SL"
																			size="4"
																			placeholder=""
																			inputmode="numeric"
																			/>
																		<input type="button" value="+" class="plus button is-form">	
																	</div>
																</td>
																<td class="product-subtotal" data-title="Tạm tính">
																	<span class="woocommerce-Price-amount amount " id="total"><bdi>'.number_format($value['Price'] * $value['Quantity']).' &nbsp;<span class="woocommerce-Price-currencySymbol">VND</span></bdi></span>
																</td>
															</tr>
														';
													}
												}
												
											
											?>
											<tr>
												<td colspan="6" class="actions clear">			
													<div class="continue-shopping pull-left text-left">
														<a class="button-continue-shopping button primary is-outline"  href="./Product.php">
															&#8592;&nbsp;Tiếp tục xem sản phẩm	</a>
													</div>
													<input class="button primary mt-0 pull-left small" name="updateCart" type="submit" value="Cập nhật giỏ hàng">
													</input>
													<input type="hidden" id="woocommerce-cart-nonce" name="woocommerce-cart-nonce" value="5b01c7e093" /><input type="hidden" name="_wp_http_referer" value="/cart" />	
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</form>
						</div>

						<div class="cart-collaterals large-5 col pb-0">
							<div class="cart-sidebar col-inner ">
								<div class="cart_totals ">
	          			<table cellspacing="0">
          					<thead>
											<tr>
													<th class="product-name" colspan="2" style="border-width:3px;">Cộng giỏ hàng</th>
											</tr>
          					</thead>
          				</table>
									<h2>Cộng giỏ hàng</h2>
									<table cellspacing="0" class="shop_table shop_table_responsive">
										<?php
											$total = 0;
											if(isset($_SESSION['cart'])) {
												foreach($_SESSION['cart'] as $key => $value) {
												$total += $value['Price'] * $value['Quantity'];

											}
											}
											echo '
											<tr class="cart-subtotal">
												<th>Tạm tính</th>
												<td data-title="Tạm tính"><span class="woocommerce-Price-amount amount"><bdi>'.number_format($total).'&nbsp;<span class="woocommerce-Price-currencySymbol">VND</span></bdi></span></td>
											</tr>
											<tr class="order-total">
												<th>Tổng</th>
												<td data-title="Tổng"><strong><span class="woocommerce-Price-amount amount"><bdi>'.number_format($total).'&nbsp;<span class="woocommerce-Price-currencySymbol">VND</span></bdi></span></strong> </td>
											</tr>

											';
											?>
									</table>
									<div class="wc-proceed-to-checkout">
									<a href="./Thanhtoan.php" class="checkout-button button alt wc-forward">
										Tiến hành thanh toán
									</a>
								</div>
							</div>
				<!-- <form class="checkout_coupon mb-0" method="post">
			<div class="coupon">
				<h3 class="widget-title"><i class="icon-tag" ></i> Phiếu ưu đãi</h3><input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Mã ưu đãi" /> <input type="submit" class="is-form expand" name="apply_coupon" value="Áp dụng" />
							</div>
		</form> -->
							<div class="cart-sidebar-content relative"></div>	</div>

						</div>
					</div>
					<div class="cart-footer-content after-cart-content relative"></div></div>
				</div>

				<!-- shop container -->
			</main>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    //   $(function(){
    //     //Số lượng từ giới hạn
    //     var limitW = 200;
    //     //Số ký tự của từ
    //     var char = 4;
    //     var txt = $('p').html();
    //     var txtStart = txt.slice(0,limitW).replace(/\w+$/,'');
    //     var txtEnd = txt.slice(txtStart.length);
    //     if ( txtEnd.replace(/\s+$/,'').split(' ').length > char ) {
    //         $('p').html([
    //             txtStart,
    //             '<a href="#" class="more">xem thêm...</a>',
    //             '<span class="detail">',
    //             txtEnd,
    //             '</span>'
    //         ].join('')
    //     );
    //     }
        
    //     $('span.detail').hide();
    //     $('a.more').click(function() {
    //         $(this).hide().next('span.detail').fadeIn();
    //         return false;
    //     });
    // });
    </script>
		<!--  -->
		<script
    
			type="text/javascript"
			src="https://lingdecor.com/wp-includes/js/hoverIntent.min.js?ver=1.8.1"
			id="hoverIntent-js"
		></script>
		<script type="text/javascript" id="flatsome-js-js-extra">
			var flatsomeVars = {
				ajaxurl: 'https:\/\/lingdecor.com\/wp-admin\/admin-ajax.php',
				rtl: '',
				sticky_height: '70',
				lightbox: {
					close_markup:
						'<button title="%title%" type="button" class="mfp-close"><svg xmlns="http:\/\/www.w3.org\/2000\/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"><\/line><line x1="6" y1="6" x2="18" y2="18"><\/line><\/svg><\/button>',
					close_btn_inside: false,
				},
				user: {
					can_edit_pages: false,
				},
				i18n: {
					mainMenu: 'Main Menu',
				},
				options: {
					cookie_notice_version: '1',
				},
			};
		</script>
		<script
			type="text/javascript"
			src="https://lingdecor.com/wp-content/themes/flatsome/assets/js/flatsome.js?ver=3.13.1"
			id="flatsome-js-js"
		></script>
		<script
			type="text/javascript"
			src="https://lingdecor.com/wp-content/themes/flatsome/assets/js/woocommerce.js?ver=3.13.1"
			id="flatsome-theme-woocommerce-js-js"
		></script>
		<script
			type="text/javascript"
			src="https://lingdecor.com/wp-includes/js/wp-embed.min.js?ver=5.7.3"
			id="wp-embed-js"
		></script>

		<!--  -->
	</body>
</html>
