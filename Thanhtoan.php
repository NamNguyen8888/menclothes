<?php
	session_start();
  require_once('./database/dbhelper.php');
	$Name = $Phone = $Email = $Address = $Description = '';
  if(!empty($_POST)) {
		if(isset($_POST['billing_last_name'])) {
			$Name = $_POST['billing_last_name'];
		}
		if(isset($_POST['billing_phone'])) {
			$Phone = $_POST['billing_phone'];
		}
		if(isset($_POST['billing_email'])) {
			$Email = $_POST['billing_email'];
		}
		if(isset($_POST['billing_address_1'])) {
			$Address = $_POST['billing_address_1'];
		}
		if(isset($_POST['order_comments'])) {
			$Description = $_POST['order_comments'];
		}
	}
	// print($_SESSION['cart']['Id']);
	if(isset($_POST['woocommerce_checkout_place_order'])) {
    $orderDate =  date('Y-m-d H:s:i');
    $sql = 'insert into oder(orderDate,Description,Name,Phone,Email,Address) values("'.$orderDate.'", "'.$Description.'", "'.$Name.'", "'.$Phone.'", "'.$Email.'", "'.$Address.'")';
		// print($sql);
		execute($sql);
		foreach($_SESSION['cart'] as $key => $value) {
			$_SESSION['AP'] = $value['Id'];
			$ProductName = $value['ProductName'];
			$Price = $value['Price'];
			$Quantity = $value['Quantity'];
		}
		// $sql1 = 'insert into orderdetails(IdOrder, IDProduct, Name, Price, Quantity) value()';
		// print($_SESSION['cart']['ProductName']);
		unset($_SESSION['cart']);
		header('Location: ./index.php');
		die();
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

		<title>Thanh toán</title>
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
						<!-- <div class="woocommerce-form-coupon-toggle">
							<div class="woocommerce-info message-wrapper">
								<div class="message-container container medium-text-center">
									Bạn có mã ưu đãi?
									<a href="#" class="showcoupon">Ấn vào đây để nhập mã</a>
								</div>
							</div>
						</div> -->

						<!-- <form
							class="
								checkout_coupon
								woocommerce-form-coupon
								has-border
								is-dashed
							"
							method="post"
							style="display: none"
						>
							<p>Nếu bạn có mã giảm giá, vui lòng điền vào phía bên dưới.</p>
							<div class="coupon">
								<div class="flex-row medium-flex-wrap">
									<div class="flex-col flex-grow">
										<input
											type="text"
											name="coupon_code"
											class="input-text"
											placeholder="Mã ưu đãi"
											id="coupon_code"
											value=""
										/>
									</div>
									<div class="flex-col">
										<button
											type="submit"
											class="button expand"
											name="apply_coupon"
											value="Áp dụng"
										>
											Áp dụng
										</button>
									</div>
								</div>
							</div>
						</form> -->
						<div class="woocommerce-notices-wrapper"></div>
						<form
							name="checkout"
							method="post"
							class="checkout woocommerce-checkout"
							enctype="multipart/form-data"
						>
							<div class="row pt-0">
								<div class="large-7 col">
									<div id="customer_details">
										<div class="clear">
											<div class="woocommerce-billing-fields">
												<h3>Thông tin thanh toán</h3>

												<div class="woocommerce-billing-fields__field-wrapper">
													<p
														class="form-row form-row-wide validate-required"
														id="billing_last_name_field"
														data-priority="10"
													>
														<label for="billing_last_name" class=""
															>Họ và tên&nbsp;<abbr
																class="required"
																title="bắt buộc"
																>*</abbr
															></label
														><span class="woocommerce-input-wrapper"
															><input
																type="text"
																class="input-text"
																name="billing_last_name"
																id="billing_last_name"
																placeholder="Họ tên của bạn"
																value=""
														/></span>
													</p>
													<p
														class="
															form-row form-row-first
															validate-required validate-phone
														"
														id="billing_phone_field"
														data-priority="20"
													>
														<label for="billing_phone" class=""
															>Số điện thoại&nbsp;<abbr
																class="required"
																title="bắt buộc"
																>*</abbr
															></label
														><span class="woocommerce-input-wrapper"
															><input
																type="tel"
																class="input-text"
																name="billing_phone"
																id="billing_phone"
																placeholder="Số điện thoại của bạn"
																value=""
																autocomplete="tel"
														/></span>
													</p>
													<p
														class="form-row form-row-last validate-email"
														id="billing_email_field"
														data-priority="21"
													>
														<label for="billing_email" class=""
															>Địa chỉ email&nbsp;<span class="optional"
																>(tuỳ chọn)</span
															></label
														><span class="woocommerce-input-wrapper"
															><input
																type="email"
																class="input-text"
																name="billing_email"
																id="billing_email"
																placeholder="Email của bạn"
																value=""
																autocomplete="email username"
														/></span>
													</p>
													<!-- <p
														class="
															form-row form-row-first
															address-field
															update_totals_on_change
															validate-required
														"
														id="billing_state_field"
														data-priority="30"
													>
														<label for="billing_state" class=""
															>Tỉnh/Thành phố&nbsp;<abbr
																class="required"
																title="bắt buộc"
																>*</abbr
															></label
														><span class="woocommerce-input-wrapper"
															><select
																name="billing_state"
																id="billing_state"
																class="select"
																data-allow_clear="true"
																data-placeholder="Chọn tỉnh/thành phố"
															>
																<option value="">Chọn tỉnh/thành phố</option>
																<option value="HANOI">Hà Nội</option>
																<option value="HOCHIMINH">Hồ Chí Minh</option>
																<option value="ANGIANG">An Giang</option>
																<option value="BACGIANG">Bắc Giang</option>
																<option value="BACKAN">Bắc Kạn</option>
																<option value="BACLIEU">Bạc Liêu</option>
																<option value="BACNINH">Bắc Ninh</option>
																<option value="BARIAVUNGTAU">
																	Bà Rịa - Vũng Tàu
																</option>
																<option value="BENTRE">Bến Tre</option>
																<option value="BINHDINH">Bình Định</option>
																<option value="BINHDUONG">Bình Dương</option>
																<option value="BINHPHUOC">Bình Phước</option>
																<option value="BINHTHUAN">Bình Thuận</option>
																<option value="CAMAU">Cà Mau</option>
																<option value="CANTHO">Cần Thơ</option>
																<option value="CAOBANG">Cao Bằng</option>
																<option value="DAKLAK">Đắk Lắk</option>
																<option value="DAKNONG">Đắk Nông</option>
																<option value="DANANG">Đà Nẵng</option>
																<option value="DIENBIEN">Điện Biên</option>
																<option value="DONGNAI">Đồng Nai</option>
																<option value="DONGTHAP">Đồng Tháp</option>
																<option value="GIALAI">Gia Lai</option>
																<option value="HAGIANG">Hà Giang</option>
																<option value="HAIDUONG">Hải Dương</option>
																<option value="HAIPHONG">Hải Phòng</option>
																<option value="HANAM">Hà Nam</option>
																<option value="HATINH">Hà Tĩnh</option>
																<option value="HAUGIANG">Hậu Giang</option>
																<option value="HOABINH">Hòa Bình</option>
																<option value="HUNGYEN">Hưng Yên</option>
																<option value="KHANHHOA">Khánh Hòa</option>
																<option value="KIENGIANG">Kiên Giang</option>
																<option value="KONTUM">Kon Tum</option>
																<option value="LAICHAU">Lai Châu</option>
																<option value="LAMDONG">Lâm Đồng</option>
																<option value="LANGSON">Lạng Sơn</option>
																<option value="LAOCAI">Lào Cai</option>
																<option value="LONGAN">Long An</option>
																<option value="NAMDINH">Nam Định</option>
																<option value="NGHEAN">Nghệ An</option>
																<option value="NINHBINH">Ninh Bình</option>
																<option value="NINHTHUAN">Ninh Thuận</option>
																<option value="PHUTHO">Phú Thọ</option>
																<option value="PHUYEN">Phú Yên</option>
																<option value="QUANGBINH">Quảng Bình</option>
																<option value="QUANGNAM">Quảng Nam</option>
																<option value="QUANGNGAI">Quảng Ngãi</option>
																<option value="QUANGNINH">Quảng Ninh</option>
																<option value="QUANGTRI">Quảng Trị</option>
																<option value="SOCTRANG">Sóc Trăng</option>
																<option value="SONLA">Sơn La</option>
																<option value="TAYNINH">Tây Ninh</option>
																<option value="THAIBINH">Thái Bình</option>
																<option value="THAINGUYEN">Thái Nguyên</option>
																<option value="THANHHOA">Thanh Hóa</option>
																<option value="THUATHIENHUE">
																	Thừa Thiên Huế
																</option>
																<option value="TIENGIANG">Tiền Giang</option>
																<option value="TRAVINH">Trà Vinh</option>
																<option value="TUYENQUANG">Tuyên Quang</option>
																<option value="VINHLONG">Vĩnh Long</option>
																<option value="VINHPHUC">Vĩnh Phúc</option>
																<option value="YENBAI">Yên Bái</option>
															</select></span
														>
													</p> -->
													<!-- <p
														class="
															form-row form-row-last
															validate-required validate-required
														"
														id="billing_city_field"
														data-priority="40"
													>
														<label for="billing_city" class=""
															>Quận/Huyện
															<abbr class="required" title="bắt buộc"
																>*</abbr
															></label
														><select
															name="billing_city"
															id="billing_city"
															class="select"
															data-allow_clear="true"
															data-placeholder="Chọn quận huyện"
														>
															<option value="" selected="selected">
																Chọn quận huyện
															</option>
															<option value="271">Huyện Ba Vì</option>
															<option value="277">Huyện Chương Mỹ</option>
															<option value="018">Huyện Gia Lâm</option>
															<option value="274">Huyện Hoài Đức</option>
															<option value="250">Huyện Mê Linh</option>
															<option value="282">Huyện Mỹ Đức</option>
															<option value="272">Huyện Phúc Thọ</option>
															<option value="280">Huyện Phú Xuyên</option>
															<option value="275">Huyện Quốc Oai</option>
															<option value="016">Huyện Sóc Sơn</option>
															<option value="278">Huyện Thanh Oai</option>
															<option value="020">Huyện Thanh Trì</option>
															<option value="279">Huyện Thường Tín</option>
															<option value="276">Huyện Thạch Thất</option>
															<option value="273">Huyện Đan Phượng</option>
															<option value="017">Huyện Đông Anh</option>
															<option value="281">Huyện Ứng Hòa</option>
															<option value="001">Quận Ba Đình</option>
															<option value="021">Quận Bắc Từ Liêm</option>
															<option value="005">Quận Cầu Giấy</option>
															<option value="007">Quận Hai Bà Trưng</option>
															<option value="008">Quận Hoàng Mai</option>
															<option value="002">Quận Hoàn Kiếm</option>
															<option value="268">Quận Hà Đông</option>
															<option value="004">Quận Long Biên</option>
															<option value="019">Quận Nam Từ Liêm</option>
															<option value="009">Quận Thanh Xuân</option>
															<option value="003">Quận Tây Hồ</option>
															<option value="006">Quận Đống Đa</option>
															<option value="269">Thị xã Sơn Tây</option>
														</select>
													</p> -->
													<!-- <p
														class="form-row form-row-first"
														id="billing_address_2_field"
														data-priority="50"
													>
														<label for="billing_address_2" class=""
															>Xã/Phường</label
														><select
															name="billing_address_2"
															id="billing_address_2"
															class="select"
															data-allow_clear="true"
															data-placeholder="Chọn xã/phường"
														>
															<option value="" selected="selected">
																Chọn xã/phường
															</option>
														</select>
													</p> -->
													<p
														class="form-row form-row-last validate-required"
														id="billing_address_1_field"
														data-priority="60"
													>
														<label for="billing_address_1" class=""
															>Địa chỉ&nbsp;<abbr
																class="required"
																title="bắt buộc"
																>*</abbr
															></label
														><span class="woocommerce-input-wrapper"
															><input
																type="text"
																class="input-text"
																name="billing_address_1"
																id="billing_address_1"
																placeholder="Ví dụ: Số 20, ngõ 90"
																value=""
																autocomplete="address-line1"
														/></span>
													</p>
												</div>
											</div>
										</div>

										<div class="clear">
											<div class="woocommerce-shipping-fields"></div>
											<div class="woocommerce-additional-fields">
												<h3>Thông tin bổ sung</h3>

												<div
													class="woocommerce-additional-fields__field-wrapper"
												>
													<p
														class="form-row notes"
														id="order_comments_field"
														data-priority=""
													>
														<label for="order_comments" class=""
															>Ghi chú đơn hàng&nbsp;<span class="optional"
																>(tuỳ chọn)</span
															></label
														><span class="woocommerce-input-wrapper">
															<textarea
																name="order_comments"
																class="input-text"
																id="order_comments"
																placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn."
																rows="2"
																cols="5"
															></textarea>
														</span>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="large-5 col">
									<div class="col-inner has-border">
										<div class="checkout-sidebar sm-touch-scroll">
											<h3 id="order_review_heading">Đơn hàng của bạn</h3>

											<div
												id="order_review"
												class="woocommerce-checkout-review-order"
											>
												<table
													class="
														shop_table
														woocommerce-checkout-review-order-table
													"
												>
													<thead>
														<tr>
															<th class="product-name">Sản phẩm</th>
															<th class="product-total">Tạm tính</th>
														</tr>
													</thead>
													<tbody>
                            <?php
                              if(!empty($_SESSION['cart'])) {
																foreach($_SESSION['cart'] as $key => $value) {
																	echo '
																		<tr class="cart_item">
																			<td class="product-name">
																				'.$value['ProductName'].'&nbsp;
																				<strong class="product-quantity"
																					>&times;&nbsp;'.$value['Quantity'].'</strong
																				>
																			</td>
																			<td class="product-total">
																				<span class="woocommerce-Price-amount amount"
																					><bdi
																						>'.number_format($value['Price']).'&nbsp;<span
																							class="woocommerce-Price-currencySymbol"
																							>VND</span
																						></bdi
																					></span
																				>
																			</td>
																		</tr>
																	';
																}
															}
                            ?>
														<!-- <tr class="cart_item">
															<td class="product-name">
																Đĩa gốm 2 tầng trang trí(LKT04)&nbsp;
																<strong class="product-quantity"
																	>&times;&nbsp;1</strong
																>
															</td>
															<td class="product-total">
																<span class="woocommerce-Price-amount amount"
																	><bdi
																		>550,000&nbsp;<span
																			class="woocommerce-Price-currencySymbol"
																			>VND</span
																		></bdi
																	></span
																>
															</td>
														</tr> -->
													</tbody>
													<tfoot>
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
                                  <td>
                                    <span class="woocommerce-Price-amount amount"
                                      ><bdi
                                        >'.$total.'&nbsp;<span
                                          class="woocommerce-Price-currencySymbol"
                                          >VND</span
                                        ></bdi
                                      ></span
                                    >
                                  </td>
                                </tr>

                                <tr class="order-total">
                                  <th>Tổng</th>
                                  <td>
                                    <strong
                                      ><span class="woocommerce-Price-amount amount"
                                        ><bdi
                                          >'.$total.'&nbsp;<span
                                            class="woocommerce-Price-currencySymbol"
                                            >VND</span
                                          ></bdi
                                        ></span
                                      ></strong
                                    >
                                  </td>
                                </tr>
                              ';
                            ?>
														<!-- <tr class="cart-subtotal">
															<th>Tạm tính</th>
															<td>
																<span class="woocommerce-Price-amount amount"
																	><bdi
																		>550,000&nbsp;<span
																			class="woocommerce-Price-currencySymbol"
																			>VND</span
																		></bdi
																	></span
																>
															</td>
														</tr>

														<tr class="order-total">
															<th>Tổng</th>
															<td>
																<strong
																	><span class="woocommerce-Price-amount amount"
																		><bdi
																			>550,000&nbsp;<span
																				class="woocommerce-Price-currencySymbol"
																				>VND</span
																			></bdi
																		></span
																	></strong
																>
															</td>
														</tr> -->
													</tfoot>
												</table>
												<div id="payment" class="woocommerce-checkout-payment">
													<!-- <ul
														class="wc_payment_methods payment_methods methods"
													>
														<li class="wc_payment_method payment_method_bacs">
															<input
																id="payment_method_bacs"
																type="radio"
																class="input-radio"
																name="payment_method"
																value="bacs"
																checked="checked"
																data-order_button_text=""
															/>

															<label for="payment_method_bacs">
																Chuyển khoản ngân hàng
															</label>
															<div class="payment_box payment_method_bacs">
																<p>
																	Thực hiện thanh toán vào ngay tài khoản ngân
																	hàng của chúng tôi. Vui lòng sử dụng Mã đơn
																	hàng của bạn trong phần Nội dung thanh toán.
																	Đơn hàng sẽ đươc giao sau khi tiền đã chuyển.
																</p>
															</div>
														</li>
														<li class="wc_payment_method payment_method_cod">
															<input
																id="payment_method_cod"
																type="radio"
																class="input-radio"
																name="payment_method"
																value="cod"
																data-order_button_text=""
															/>

															<label for="payment_method_cod">
																Trả tiền mặt khi nhận hàng
															</label>
															<div
																class="payment_box payment_method_cod"
																style="display: none"
															>
																<p>
																	Quý khách nhận hàng được kiếm tra hàng trước
																	khi thanh toán
																</p>
															</div>
														</li>
													</ul> -->
													<div class="form-row place-order">

														<div
															class="woocommerce-terms-and-conditions-wrapper"
														></div>

														<button
															type="submit"
															class="button alt"
															name="woocommerce_checkout_place_order"
															id="place_order"
															value="Đặt hàng"
															data-value="Đặt hàng"
														>
															Đặt hàng
														</button>
                            
														<input
															type="hidden"
															id="woocommerce-process-checkout-nonce"
															name="woocommerce-process-checkout-nonce"
															value="0e8463e44e"
														/><input
															type="hidden"
															name="_wp_http_referer"
															value="/checkout?add-to-cart=5847"
														/>
													</div>
												</div>
											</div>

											<div class="woocommerce-privacy-policy-text"></div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
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
    <script type='text/javascript' src='https://lingdecor.com/wp-content/plugins/woocommerce/assets/js/frontend/country-select.min.js?ver=5.9.0' id='wc-country-select-js'></script>
    <script type='text/javascript' src='https://lingdecor.com/wp-content/plugins/woocommerce/assets/js/frontend/address-i18n.min.js?ver=5.9.0' id='wc-address-i18n-js'></script>
		<!--  -->
	</body>
</html>
