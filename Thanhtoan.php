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

		<title>Thanh to??n</title>
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
							<a href="./index.php"><span>Trang ch???</span></a>
							<a href="./Product.php"><span>S???n ph???m</span></a>
							<a href="./phukien.php"><span>Ph??? ki???n</span></a>
							<a href="./baohanh.php"><span>B???o h??nh</span></a>
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
									B???n c?? m?? ??u ????i?
									<a href="#" class="showcoupon">???n v??o ????y ????? nh???p m??</a>
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
							<p>N???u b???n c?? m?? gi???m gi??, vui l??ng ??i???n v??o ph??a b??n d?????i.</p>
							<div class="coupon">
								<div class="flex-row medium-flex-wrap">
									<div class="flex-col flex-grow">
										<input
											type="text"
											name="coupon_code"
											class="input-text"
											placeholder="M?? ??u ????i"
											id="coupon_code"
											value=""
										/>
									</div>
									<div class="flex-col">
										<button
											type="submit"
											class="button expand"
											name="apply_coupon"
											value="??p d???ng"
										>
											??p d???ng
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
												<h3>Th??ng tin thanh to??n</h3>

												<div class="woocommerce-billing-fields__field-wrapper">
													<p
														class="form-row form-row-wide validate-required"
														id="billing_last_name_field"
														data-priority="10"
													>
														<label for="billing_last_name" class=""
															>H??? v?? t??n&nbsp;<abbr
																class="required"
																title="b???t bu???c"
																>*</abbr
															></label
														><span class="woocommerce-input-wrapper"
															><input
																type="text"
																class="input-text"
																name="billing_last_name"
																id="billing_last_name"
																placeholder="H??? t??n c???a b???n"
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
															>S??? ??i???n tho???i&nbsp;<abbr
																class="required"
																title="b???t bu???c"
																>*</abbr
															></label
														><span class="woocommerce-input-wrapper"
															><input
																type="tel"
																class="input-text"
																name="billing_phone"
																id="billing_phone"
																placeholder="S??? ??i???n tho???i c???a b???n"
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
															>?????a ch??? email&nbsp;<span class="optional"
																>(tu??? ch???n)</span
															></label
														><span class="woocommerce-input-wrapper"
															><input
																type="email"
																class="input-text"
																name="billing_email"
																id="billing_email"
																placeholder="Email c???a b???n"
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
															>T???nh/Th??nh ph???&nbsp;<abbr
																class="required"
																title="b???t bu???c"
																>*</abbr
															></label
														><span class="woocommerce-input-wrapper"
															><select
																name="billing_state"
																id="billing_state"
																class="select"
																data-allow_clear="true"
																data-placeholder="Ch???n t???nh/th??nh ph???"
															>
																<option value="">Ch???n t???nh/th??nh ph???</option>
																<option value="HANOI">H?? N???i</option>
																<option value="HOCHIMINH">H??? Ch?? Minh</option>
																<option value="ANGIANG">An Giang</option>
																<option value="BACGIANG">B???c Giang</option>
																<option value="BACKAN">B???c K???n</option>
																<option value="BACLIEU">B???c Li??u</option>
																<option value="BACNINH">B???c Ninh</option>
																<option value="BARIAVUNGTAU">
																	B?? R???a - V??ng T??u
																</option>
																<option value="BENTRE">B???n Tre</option>
																<option value="BINHDINH">B??nh ?????nh</option>
																<option value="BINHDUONG">B??nh D????ng</option>
																<option value="BINHPHUOC">B??nh Ph?????c</option>
																<option value="BINHTHUAN">B??nh Thu???n</option>
																<option value="CAMAU">C?? Mau</option>
																<option value="CANTHO">C???n Th??</option>
																<option value="CAOBANG">Cao B???ng</option>
																<option value="DAKLAK">?????k L???k</option>
																<option value="DAKNONG">?????k N??ng</option>
																<option value="DANANG">???? N???ng</option>
																<option value="DIENBIEN">??i???n Bi??n</option>
																<option value="DONGNAI">?????ng Nai</option>
																<option value="DONGTHAP">?????ng Th??p</option>
																<option value="GIALAI">Gia Lai</option>
																<option value="HAGIANG">H?? Giang</option>
																<option value="HAIDUONG">H???i D????ng</option>
																<option value="HAIPHONG">H???i Ph??ng</option>
																<option value="HANAM">H?? Nam</option>
																<option value="HATINH">H?? T??nh</option>
																<option value="HAUGIANG">H???u Giang</option>
																<option value="HOABINH">H??a B??nh</option>
																<option value="HUNGYEN">H??ng Y??n</option>
																<option value="KHANHHOA">Kh??nh H??a</option>
																<option value="KIENGIANG">Ki??n Giang</option>
																<option value="KONTUM">Kon Tum</option>
																<option value="LAICHAU">Lai Ch??u</option>
																<option value="LAMDONG">L??m ?????ng</option>
																<option value="LANGSON">L???ng S??n</option>
																<option value="LAOCAI">L??o Cai</option>
																<option value="LONGAN">Long An</option>
																<option value="NAMDINH">Nam ?????nh</option>
																<option value="NGHEAN">Ngh??? An</option>
																<option value="NINHBINH">Ninh B??nh</option>
																<option value="NINHTHUAN">Ninh Thu???n</option>
																<option value="PHUTHO">Ph?? Th???</option>
																<option value="PHUYEN">Ph?? Y??n</option>
																<option value="QUANGBINH">Qu???ng B??nh</option>
																<option value="QUANGNAM">Qu???ng Nam</option>
																<option value="QUANGNGAI">Qu???ng Ng??i</option>
																<option value="QUANGNINH">Qu???ng Ninh</option>
																<option value="QUANGTRI">Qu???ng Tr???</option>
																<option value="SOCTRANG">S??c Tr??ng</option>
																<option value="SONLA">S??n La</option>
																<option value="TAYNINH">T??y Ninh</option>
																<option value="THAIBINH">Th??i B??nh</option>
																<option value="THAINGUYEN">Th??i Nguy??n</option>
																<option value="THANHHOA">Thanh H??a</option>
																<option value="THUATHIENHUE">
																	Th???a Thi??n Hu???
																</option>
																<option value="TIENGIANG">Ti???n Giang</option>
																<option value="TRAVINH">Tr?? Vinh</option>
																<option value="TUYENQUANG">Tuy??n Quang</option>
																<option value="VINHLONG">V??nh Long</option>
																<option value="VINHPHUC">V??nh Ph??c</option>
																<option value="YENBAI">Y??n B??i</option>
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
															>Qu???n/Huy???n
															<abbr class="required" title="b???t bu???c"
																>*</abbr
															></label
														><select
															name="billing_city"
															id="billing_city"
															class="select"
															data-allow_clear="true"
															data-placeholder="Ch???n qu???n huy???n"
														>
															<option value="" selected="selected">
																Ch???n qu???n huy???n
															</option>
															<option value="271">Huy???n Ba V??</option>
															<option value="277">Huy???n Ch????ng M???</option>
															<option value="018">Huy???n Gia L??m</option>
															<option value="274">Huy???n Ho??i ?????c</option>
															<option value="250">Huy???n M?? Linh</option>
															<option value="282">Huy???n M??? ?????c</option>
															<option value="272">Huy???n Ph??c Th???</option>
															<option value="280">Huy???n Ph?? Xuy??n</option>
															<option value="275">Huy???n Qu???c Oai</option>
															<option value="016">Huy???n S??c S??n</option>
															<option value="278">Huy???n Thanh Oai</option>
															<option value="020">Huy???n Thanh Tr??</option>
															<option value="279">Huy???n Th?????ng T??n</option>
															<option value="276">Huy???n Th???ch Th???t</option>
															<option value="273">Huy???n ??an Ph?????ng</option>
															<option value="017">Huy???n ????ng Anh</option>
															<option value="281">Huy???n ???ng H??a</option>
															<option value="001">Qu???n Ba ????nh</option>
															<option value="021">Qu???n B???c T??? Li??m</option>
															<option value="005">Qu???n C???u Gi???y</option>
															<option value="007">Qu???n Hai B?? Tr??ng</option>
															<option value="008">Qu???n Ho??ng Mai</option>
															<option value="002">Qu???n Ho??n Ki???m</option>
															<option value="268">Qu???n H?? ????ng</option>
															<option value="004">Qu???n Long Bi??n</option>
															<option value="019">Qu???n Nam T??? Li??m</option>
															<option value="009">Qu???n Thanh Xu??n</option>
															<option value="003">Qu???n T??y H???</option>
															<option value="006">Qu???n ?????ng ??a</option>
															<option value="269">Th??? x?? S??n T??y</option>
														</select>
													</p> -->
													<!-- <p
														class="form-row form-row-first"
														id="billing_address_2_field"
														data-priority="50"
													>
														<label for="billing_address_2" class=""
															>X??/Ph?????ng</label
														><select
															name="billing_address_2"
															id="billing_address_2"
															class="select"
															data-allow_clear="true"
															data-placeholder="Ch???n x??/ph?????ng"
														>
															<option value="" selected="selected">
																Ch???n x??/ph?????ng
															</option>
														</select>
													</p> -->
													<p
														class="form-row form-row-last validate-required"
														id="billing_address_1_field"
														data-priority="60"
													>
														<label for="billing_address_1" class=""
															>?????a ch???&nbsp;<abbr
																class="required"
																title="b???t bu???c"
																>*</abbr
															></label
														><span class="woocommerce-input-wrapper"
															><input
																type="text"
																class="input-text"
																name="billing_address_1"
																id="billing_address_1"
																placeholder="V?? d???: S??? 20, ng?? 90"
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
												<h3>Th??ng tin b??? sung</h3>

												<div
													class="woocommerce-additional-fields__field-wrapper"
												>
													<p
														class="form-row notes"
														id="order_comments_field"
														data-priority=""
													>
														<label for="order_comments" class=""
															>Ghi ch?? ????n h??ng&nbsp;<span class="optional"
																>(tu??? ch???n)</span
															></label
														><span class="woocommerce-input-wrapper">
															<textarea
																name="order_comments"
																class="input-text"
																id="order_comments"
																placeholder="Ghi ch?? v??? ????n h??ng, v?? d???: th???i gian hay ch??? d???n ?????a ??i???m giao h??ng chi ti???t h??n."
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
											<h3 id="order_review_heading">????n h??ng c???a b???n</h3>

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
															<th class="product-name">S???n ph???m</th>
															<th class="product-total">T???m t??nh</th>
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
																????a g???m 2 t???ng trang tr??(LKT04)&nbsp;
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
                                  <th>T???m t??nh</th>
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
                                  <th>T???ng</th>
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
															<th>T???m t??nh</th>
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
															<th>T???ng</th>
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
																Chuy???n kho???n ng??n h??ng
															</label>
															<div class="payment_box payment_method_bacs">
																<p>
																	Th???c hi???n thanh to??n v??o ngay t??i kho???n ng??n
																	h??ng c???a ch??ng t??i. Vui l??ng s??? d???ng M?? ????n
																	h??ng c???a b???n trong ph???n N???i dung thanh to??n.
																	????n h??ng s??? ??????c giao sau khi ti???n ???? chuy???n.
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
																Tr??? ti???n m???t khi nh???n h??ng
															</label>
															<div
																class="payment_box payment_method_cod"
																style="display: none"
															>
																<p>
																	Qu?? kh??ch nh???n h??ng ???????c ki???m tra h??ng tr?????c
																	khi thanh to??n
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
															value="?????t h??ng"
															data-value="?????t h??ng"
														>
															?????t h??ng
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
						<div class="footer__title"><font color="#0066FF"size="+2">T???ng ????i h??? tr??? </font></div>
						<div class="footer__content">
							<a href="tel://0847326456">Li??n h??? ?????t h??ng : 0847326456</a><br><br>
							<a href="https://www.facebook.com/nhn2201/">G??p ??, khi???u n???i</a><br><br>
							<a href="https://www.facebook.com/nhn2201/">Th???c m???c ????n h??ng</a>
						</div>
					</div>
					<div class="grid__width">
						<div class="footer__title"><font color="#0066FF"size="+2">Ve Yolo</font></div>
						<div class="footer__content">
							<p><a href="baohanh.php">Ch??nh s??ch ?????i tr???</a></p>
						
							<p><a href="baohanh.php">Ch??nh s??ch b???o h??nh</a></p>
								<p><a href="https://www.facebook.com/nhn2201/">Li??n h???</a></p>
						</div>
					</div>
					<div class="grid__width">
						<div class="footer__title"><font color="#0066FF"size="+2">Ch??m s??c kh??ch h??ng </font></div>
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
							H?????ng ?????n m???c ti??u mang l???i ni???m vui ??n m???c m???i m???i ng??y cho h??ng
							tri???u ng?????i ti??u d??ng Vi???t. H??y c??ng Yolo h?????ng ?????n m???t cu???c s???ng
							n??ng ?????ng, t??ch c???c h??n.
						</p>
					</div>
				</div>
			</div>
		</footer>
		<script src="./js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    //   $(function(){
    //     //S??? l?????ng t??? gi???i h???n
    //     var limitW = 200;
    //     //S??? k?? t??? c???a t???
    //     var char = 4;
    //     var txt = $('p').html();
    //     var txtStart = txt.slice(0,limitW).replace(/\w+$/,'');
    //     var txtEnd = txt.slice(txtStart.length);
    //     if ( txtEnd.replace(/\s+$/,'').split(' ').length > char ) {
    //         $('p').html([
    //             txtStart,
    //             '<a href="#" class="more">xem th??m...</a>',
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
