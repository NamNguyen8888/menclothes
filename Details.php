<?php
	session_start();
  require_once('./database/dbhelper.php');
  if(isset($_GET['IdProduct'])) {
        $IdProduct=$_GET['IdProduct'];
        $sql = 'select * from products where IdProduct='.$IdProduct;
        $productList = executeResultSingle($sql);
        if($productList != null) {
            $ProductName = $productList['ProductName'];
            $Image = $productList['Image'];
            $Price = $productList['Price'];
            $Description = $productList['Description'];
            $ImageOne = $productList['ImageOne'];
        }
    }
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = 'select * from accessory where id='.$id;
		$accessoryList = executeResultSingle($sql);
		if($accessoryList != null) {
			$ProductName = $accessoryList['Name'];
			$Image = $accessoryList['Image'];
			$Price = $accessoryList['Price'];
			$Description = $accessoryList['Description'];
      $ImageOne = $accessoryList['ImageOne'];
		}
	}
	if($_SERVER['RESQUEST_METHOD']= 'POST')	{
		if(isset($_POST['add-to-cart'])) {
			if(isset($_SESSION['cart'])) {
				$session_array_id = array_column($_SESSION['cart'],'Id');
				if(!in_array($IdProduct, $session_array_id)) {
					$session_array = array(
						'Id' => $IdProduct,
						'ProductName' => $ProductName,
						'Image' => $Image,
						'Price' => $Price,
						'Quantity' => $_POST['quantity']
					);
					$_SESSION['cart'][] = $session_array;
				}
			}
			else {
				$session_array = array(
					'Id' => $IdProduct,
					'ProductName' => $ProductName,
					'Image' => $Image,
					'Price' => $Price,
					'Quantity' => $_POST['quantity']
				);
				$_SESSION['cart'][] = $session_array;
			}
		}
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

		<title>Thông tin sản phẩm</title>
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
				<div class="shop-container">
					<div class="container">
						<div class="woocommerce-notices-wrapper"></div>
					</div>
					<div
						id="product-5546"
						class="
							product
							type-product
							post-5546
							status-publish
							first
							instock
							product_cat-decor-de-ban
							product_tag-phi-hanh-gia
							product_tag-phi-hanh-gia-cam-bong
							product_tag-tuong-phi-hanh-gia
							has-post-thumbnail
							sale
							shipping-taxable
							purchasable
							product-type-simple
						"
					>
						<div class="product-container">
							<form action="" enctype="multipart/form-data" method="post">
                <div class="product-main">
								<div class="row content-row mb-0">
									<div class="product-gallery large-6 col">
										<div
											class="
												product-images
												relative
												mb-half
												has-hover
												woocommerce-product-gallery
												woocommerce-product-gallery--with-images
												woocommerce-product-gallery--columns-4
												images
											"
											data-columns="4"
										>
											<div
												class="image-tools absolute top show-on-hover right z-3"
											></div>

											<figure
												class="
													woocommerce-product-gallery__wrapper
													product-gallery-slider
													slider slider-nav-small
													mb-half
												"
												data-flickity-options='{
                          "cellAlign": "center",
                          "wrapAround": true,
                          "autoPlay": false,
                          "prevNextButtons":true,
                          "adaptiveHeight": true,
                          "imagesLoaded": true,
                          "lazyLoad": 1,
                          "dragThreshold" : 15,
                          "pageDots": false,
                          "rightToLeft": false}'
											>
												<div
													class="woocommerce-product-gallery__image slide first"
												>
													<a href=""
														><?php echo '<img
															width="600"
															height="600"
															src="./upload/'.$Image.'"
															class="wp-post-image skip-lazy"
															alt=""
													/>'; ?></a>
												</div>
												<div
													class="woocommerce-product-gallery__image slide"
												>
													<a href=""
														><?php echo '<img
															width="600"
															height="600"
															src="./upload/'.$ImageOne.'"
															class="skip-lazy"
															alt=""
													/>' ?></a>
												</div>
											</figure>

										</div>

										<div
											class="
												product-thumbnails
												thumbnails
												slider
												row row-small row-slider
												slider-nav-small
												small-columns-4
											"
											data-flickity-options='{
                        "cellAlign": "left",
                        "wrapAround": false,
                        "autoPlay": false,
                        "prevNextButtons": true,
                        "asNavFor": ".product-gallery-slider",
                        "percentPosition": true,
                        "imagesLoaded": true,
                        "pageDots": false,
                        "rightToLeft": false,
                        "contain": true
                      }'
										>
											<div class="col is-nav-selected first">
												<a>
													<?php
                          echo '<img
														src="./upload/'.$Image.'"
														alt=""
														width="300"
														height="300"
														class="attachment-woocommerce_thumbnail"
													/>'
                          ?>
												</a>
											</div>
											<div class="col">
												<a
													><?php echo '<img
														src="./upload/'.$ImageOne.'"
														alt=""
														width="300"
														height="300"
														class="attachment-woocommerce_thumbnail"
												/>' ?></a>
											</div>
										</div>
									</div>

									<div
										class="
											product-info
											summary
											col-fit col
											entry-summary
											product-summary
											text-left
											form-minimal
										"
									>
										<h1 class="product-title product_title entry-title">
											<?php echo $ProductName; ?>
										</h1>

										<div class="is-divider small"></div>
										<div class="price-wrapper">
											<p class="price product-page-price price-on-sale">
												<!-- <del aria-hidden="true"
													><span class="woocommerce-Price-amount amount"
														><bdi
															>1,680,000&nbsp;<span
																class="woocommerce-Price-currencySymbol"
																>VND</span
															></bdi
														></span
													></del
												> -->
												<ins
													><span class="woocommerce-Price-amount amount"
														><bdi
															> <?php echo number_format($Price); ?><span
																class="woocommerce-Price-currencySymbol"
																>VND</span
															></bdi
														></span
													></ins
												>
											</p>
										</div>
										<div class="product-short-description">
											 <?php  echo '<p> '.$Description.' </p> '?>
										</div>

										<form
											class="cart"
											method="post"
											enctype="multipart/form-data"
										>
											<div class="quantity buttons_added form-minimal">
												<input
													type="button"
													value="-"
													class="minus button is-form"
												/>
												<label
													class="screen-reader-text"
													for="quantity_6160420302b36"
													>Phi hành gia cầm bóng(LDB222) số lượng</label
												>
												<input
													type="number"
													id="quantity_6160420302b36"
													class="input-text qty text"
													step="1"
													min="1"
													max=""
													name="quantity"
													value="1"
													title="SL"
													size="4"
													placeholder=""
													inputmode="numeric"
												/>
												<input
													type="button"
													value="+"
													class="plus button is-form"
												/>
											</div>

											<button
												type="submit"
												name="add-to-cart"
												class="single_add_to_cart_button button alt"
											>
												Thêm vào giỏ
											</button>
											<!-- <script>
												jQuery(function ($) {
													$('.custom-checkout-btn').on('click', function () {
														$(this).attr('href', function () {
															return (
																this.href + '&quantity=' + $('input.qty').val()
															);
														});
													});
												});
											</script> -->
											<a href="./Thanhtoan.php">
												<button
												name="add-to-cart"
												class="single_add_to_cart_button button alt"
												>MUA HÀNG NGAY</button>
											</a>
										</form>

								
										</div>
									</div>
								</div>
							</div>
              </form>

							<div class="product-footer">
								<div class="container">
									<div class="related related-products-wrapper product-section">
										<h3
											class="
												product-section-title
												container-width
												product-section-title-related
												pt-half
												pb-half
												uppercase
											"
										>
											Sản phẩm tương tự
										</h3>
                    <div
											class="
												row
												large-columns-4
												medium-columns-3
												small-columns-2
												row-small
												slider
												row-slider
												slider-nav-reveal slider-nav-push
											"
											data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : false}'
										>
                    <?php
                      $sql = 'select * from products order by rand() limit 8';
                      $product = executeResult($sql);
                      foreach($product as $item) {
                        echo '
                          <div
                            class="
                              product-small
                              col
                              has-hover
                              product
                              type-product
                              post-1003
                              status-publish
                              last
                              instock
                              product_cat-decor-de-ban
                              product_tag-nu-than-cong-ly
                              product_tag-tuong-nu-than-cong-ly
                              has-post-thumbnail
                              shipping-taxable
                              purchasable
                              product-type-simple
                            "
                          >
                            <div class="col-inner">
                              <div
                                class="badge-container absolute left top z-1"
                              ></div>
                              <div class="product-small box">
                                <div class="box-image">
                                  <div class="image-fade_in_back">
                                    <a
                                      href="./Details.php?IdProduct='.$item['IdProduct'].'"
                                    >
                                      <img
                                        width="300"
                                        height="300"
                                        src="./upload/'.$item['Image'].'"
                                        class="
                                          attachment-woocommerce_thumbnail
                                          size-woocommerce_thumbnail
                                        "
                                        alt=""
                                        sizes="(max-width: 300px) 100vw, 300px"
                                      /><img
                                        width="300"
                                        height="300"
                                        src="./upload/'.$item['ImageOne'].'"
                                        class="
                                          show-on-hover
                                          absolute
                                          fill
                                          hide-for-small
                                          back-image
                                        "
                                        alt=""
                                        sizes="(max-width: 300px) 100vw, 300px"
                                      />
                                    </a>
                                  </div>
                                  <div
                                    class="
                                      image-tools
                                      is-small
                                      top
                                      right
                                      show-on-hover
                                    "
                                  ></div>
                                  <div
                                    class="
                                      image-tools
                                      is-small
                                      hide-for-small
                                      bottom
                                      left
                                      show-on-hover
                                    "
                                  ></div>
                                  <div
                                    class="
                                      image-tools
                                      grid-tools
                                      text-center
                                      hide-for-small
                                      bottom
                                      hover-slide-in
                                      show-on-hover
                                    "
                                  ></div>
                                </div>

                                <div
                                  class="
                                    box-text box-text-products
                                    text-center
                                    grid-style-2
                                  "
                                >
                                  <div class="title-wrapper">
                                    <p
                                      class="
                                        name
                                        product-title
                                        woocommerce-loop-product__title
                                      "
                                    >
                                      <a
                                        href=""
                                        class="
                                          woocommerce-LoopProduct-link
                                          woocommerce-loop-product__link
                                        "
                                        >'.$item['ProductName'].'</a
                                      >
                                    </p>
                                  </div>
                                  <div class="price-wrapper">
                                    <span class="price"
                                      ><span class="woocommerce-Price-amount amount"
                                        ><bdi
                                          >'.$item['Price'].'&nbsp;<span
                                            class="woocommerce-Price-currencySymbol"
                                            >VND</span
                                          ></bdi
                                        >
                                      </span>
                                    </span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        ';
                      }
                    ?>
                    </div>
										<!-- <div
											class="
												row
												large-columns-4
												medium-columns-3
												small-columns-2
												row-small
												slider
												row-slider
												slider-nav-reveal slider-nav-push
											"
											data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : false}'
										>
											<div
												class="
													product-small
													col
													has-hover
													product
													type-product
													post-967
													status-publish
													instock
													product_cat-decor-de-ban
													product_tag-de-ban-pha-le
													product_tag-pha-le
													product_tag-pha-le-trang-tri
													product_tag-qua-cau-pha-le
													has-post-thumbnail
													shipping-taxable
													purchasable
													product-type-simple
												"
											>
												<div class="col-inner">
													<div
														class="badge-container absolute left top z-1"
													></div>
													<div class="product-small box">
														<div class="box-image">
															<div class="image-fade_in_back">
																<a
																	href="https://lingdecor.com/decor-de-ban/qua-cau-pha-leldb15"
																>
																	<img
																		width="300"
																		height="300"
																		src="https://lingdecor.com/wp-content/uploads/2020/09/Qua-cau-pha-leLDB15lingdecor-300x300.jpg"
																		class="
																			attachment-woocommerce_thumbnail
																			size-woocommerce_thumbnail
																		"
																		alt=""
																		loading="lazy"
																		sizes="(max-width: 300px) 100vw, 300px"
																	/><img
																		width="300"
																		height="300"
																		src="https://lingdecor.com/wp-content/uploads/2020/09/Qua-cau-pha-leLDB15lingdecor-anh-1-300x300.jpg"
																		class="
																			show-on-hover
																			absolute
																			fill
																			hide-for-small
																			back-image
																		"
																		alt=""
																		loading="lazy"
																		sizes="(max-width: 300px) 100vw, 300px"
																	/>
																</a>
															</div>
															<div
																class="
																	image-tools
																	is-small
																	top
																	right
																	show-on-hover
																"
															></div>
															<div
																class="
																	image-tools
																	is-small
																	hide-for-small
																	bottom
																	left
																	show-on-hover
																"
															></div>
															<div
																class="
																	image-tools
																	grid-tools
																	text-center
																	hide-for-small
																	bottom
																	hover-slide-in
																	show-on-hover
																"
															></div>
														</div>

														<div
															class="
																box-text box-text-products
																text-center
																grid-style-2
															"
														>
															<div class="title-wrapper">
																<p
																	class="
																		name
																		product-title
																		woocommerce-loop-product__title
																	"
																>
																	<a
																		href="https://lingdecor.com/decor-de-ban/qua-cau-pha-leldb15"
																		class="
																			woocommerce-LoopProduct-link
																			woocommerce-loop-product__link
																		"
																		>Quả cầu pha lê(LDB15)</a
																	>
																</p>
															</div>
															<div class="price-wrapper">
																<span class="price"
																	><span class="woocommerce-Price-amount amount"
																		><bdi
																			>900,000&nbsp;<span
																				class="woocommerce-Price-currencySymbol"
																				>VND</span
																			></bdi
																		>
																	</span>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div
												class="
													product-small
													col
													has-hover
													product
													type-product
													post-480
													status-publish
													instock
													product_cat-decor-de-ban
													product_tag-decor-de-ban
													product_tag-tuong-mat-co-gai
													product_tag-tuyet-sac-giai-nhan
													has-post-thumbnail
													shipping-taxable
													purchasable
													product-type-simple
												"
											>
												<div class="col-inner">
													<div
														class="badge-container absolute left top z-1"
													></div>
													<div class="product-small box">
														<div class="box-image">
															<div class="image-fade_in_back">
																<a
																	href="https://lingdecor.com/decor-de-ban/tuyet-sac-giai-nhanldb10"
																>
																	<img
																		width="300"
																		height="300"
																		src="https://lingdecor.com/wp-content/uploads/2020/09/TUYET-SAC-GIAI-NHAN-lingdecor.com_-300x300.jpg"
																		class="
																			attachment-woocommerce_thumbnail
																			size-woocommerce_thumbnail
																		"
																		alt=""
																		sizes="(max-width: 300px) 100vw, 300px"
																	/><img
																		width="300"
																		height="300"
																		src="https://lingdecor.com/wp-content/uploads/2020/09/10609019079_1336098814.400x400-300x300.jpg"
																		class="
																			show-on-hover
																			absolute
																			fill
																			hide-for-small
																			back-image
																		"
																		alt=""
																		sizes="(max-width: 300px) 100vw, 300px"
																	/>
																</a>
															</div>
															<div
																class="
																	image-tools
																	is-small
																	top
																	right
																	show-on-hover
																"
															></div>
															<div
																class="
																	image-tools
																	is-small
																	hide-for-small
																	bottom
																	left
																	show-on-hover
																"
															></div>
															<div
																class="
																	image-tools
																	grid-tools
																	text-center
																	hide-for-small
																	bottom
																	hover-slide-in
																	show-on-hover
																"
															></div>
														</div>

														<div
															class="
																box-text box-text-products
																text-center
																grid-style-2
															"
														>
															<div class="title-wrapper">
																<p
																	class="
																		name
																		product-title
																		woocommerce-loop-product__title
																	"
																>
																	<a
																		href="https://lingdecor.com/decor-de-ban/tuyet-sac-giai-nhanldb10"
																		class="
																			woocommerce-LoopProduct-link
																			woocommerce-loop-product__link
																		"
																		>Tuyệt sắc giai nhân(LDB10)</a
																	>
																</p>
															</div>
															<div class="price-wrapper">
																<span class="price"
																	><span class="woocommerce-Price-amount amount"
																		><bdi
																			>850,000&nbsp;<span
																				class="woocommerce-Price-currencySymbol"
																				>VND</span
																			></bdi
																		>
																	</span>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>

											

											<div
												class="
													product-small
													col
													has-hover
													product
													type-product
													post-1009
													status-publish
													first
													instock
													product_cat-decor-de-ban
													product_tag-tuong-hon-nhau
													product_tag-tuong-tinh-yeu-vinh-cuu
													has-post-thumbnail
													shipping-taxable
													purchasable
													product-type-simple
												"
											>
												<div class="col-inner">
													<div
														class="badge-container absolute left top z-1"
													></div>
													<div class="product-small box">
														<div class="box-image">
															<div class="image-fade_in_back">
																<a
																	href="https://lingdecor.com/decor-de-ban/tinh-yeu-vinh-cuuldb21"
																>
																	<img
																		width="300"
																		height="300"
																		src="https://lingdecor.com/wp-content/uploads/2020/09/Tinh-yeu-vinh-cuuLDB21lingdecor-300x300.jpg"
																		class="
																			attachment-woocommerce_thumbnail
																			size-woocommerce_thumbnail
																		"
																		alt=""
																		sizes="(max-width: 300px) 100vw, 300px"
																	/>
																</a>
															</div>
															<div
																class="
																	image-tools
																	is-small
																	top
																	right
																	show-on-hover
																"
															></div>
															<div
																class="
																	image-tools
																	is-small
																	hide-for-small
																	bottom
																	left
																	show-on-hover
																"
															></div>
															<div
																class="
																	image-tools
																	grid-tools
																	text-center
																	hide-for-small
																	bottom
																	hover-slide-in
																	show-on-hover
																"
															></div>
														</div>

														<div
															class="
																box-text box-text-products
																text-center
																grid-style-2
															"
														>
															<div class="title-wrapper">
																<p
																	class="
																		name
																		product-title
																		woocommerce-loop-product__title
																	"
																>
																	<a
																		href="https://lingdecor.com/decor-de-ban/tinh-yeu-vinh-cuuldb21"
																		class="
																			woocommerce-LoopProduct-link
																			woocommerce-loop-product__link
																		"
																		>Tình yêu vĩnh cửu(LDB21)</a
																	>
																</p>
															</div>
															<div class="price-wrapper">
																<span class="price"
																	><span class="woocommerce-Price-amount amount"
																		><bdi
																			>1,800,000&nbsp;<span
																				class="woocommerce-Price-currencySymbol"
																				>VND</span
																			></bdi
																		>
																	</span>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div
												class="
													product-small
													col
													has-hover
													product
													type-product
													post-488
													status-publish
													instock
													product_cat-decor-de-ban
													product_cat-gia-de-ruou
													product_tag-gia-de-ruou
													product_tag-gia-ruou
													product_tag-gia-ruou-con-huou
													product_tag-gia-ruou-huou
													has-post-thumbnail
													shipping-taxable
													purchasable
													product-type-simple
												"
											>
												<div class="col-inner">
													<div
														class="badge-container absolute left top z-1"
													></div>
													<div class="product-small box">
														<div class="box-image">
															<div class="image-fade_in_back">
																<a
																	href="https://lingdecor.com/decor-de-ban/gia-de-ruou-huoulgr02"
																>
																	<img
																		width="300"
																		height="300"
																		src="https://lingdecor.com/wp-content/uploads/2020/09/Gia-de-ruou-huouLGR02-300x300.jpg"
																		class="
																			attachment-woocommerce_thumbnail
																			size-woocommerce_thumbnail
																		"
																		alt=""
																		sizes="(max-width: 300px) 100vw, 300px"
																	/>
																</a>
															</div>
															<div
																class="
																	image-tools
																	is-small
																	top
																	right
																	show-on-hover
																"
															></div>
															<div
																class="
																	image-tools
																	is-small
																	hide-for-small
																	bottom
																	left
																	show-on-hover
																"
															></div>
															<div
																class="
																	image-tools
																	grid-tools
																	text-center
																	hide-for-small
																	bottom
																	hover-slide-in
																	show-on-hover
																"
															></div>
														</div>

														<div
															class="
																box-text box-text-products
																text-center
																grid-style-2
															"
														>
															<div class="title-wrapper">
																<p
																	class="
																		name
																		product-title
																		woocommerce-loop-product__title
																	"
																>
																	<a
																		href="https://lingdecor.com/decor-de-ban/gia-de-ruou-huoulgr02"
																		class="
																			woocommerce-LoopProduct-link
																			woocommerce-loop-product__link
																		"
																		>Giá để rượu hươu(LGR02)</a
																	>
																</p>
															</div>
															<div class="price-wrapper">
																<span class="price"
																	><span class="woocommerce-Price-amount amount"
																		><bdi
																			>500,000&nbsp;<span
																				class="woocommerce-Price-currencySymbol"
																				>VND</span
																			></bdi
																		>
																	</span>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div
												class="
													product-small
													col
													has-hover
													product
													type-product
													post-465
													status-publish
													instock
													product_cat-decor-de-ban
													product_tag-con-su-tu
													product_tag-decor-de-ban
													product_tag-su-tu
													product_tag-trang-tri-su-tu
													product_tag-tuong-su-tu
													has-post-thumbnail
													sale
													featured
													shipping-taxable
													purchasable
													product-type-simple
												"
											>
												<div class="col-inner">
													<div class="badge-container absolute left top z-1">
														<div class="callout badge badge-square">
															<div class="badge-inner secondary on-sale">
																<span class="onsale">-9%</span>
															</div>
														</div>
													</div>
													<div class="product-small box">
														<div class="box-image">
															<div class="image-fade_in_back">
																<a
																	href="https://lingdecor.com/decor-de-ban/tuong-su-tu-doi-vuong-mienldb01"
																>
																	<img
																		width="300"
																		height="300"
																		src="https://lingdecor.com/wp-content/uploads/2020/09/Su-tu-doi-vuong-mien-2-lingdecor.com_-300x300.jpg"
																		class="
																			attachment-woocommerce_thumbnail
																			size-woocommerce_thumbnail
																		"
																		alt=""
																		sizes="(max-width: 300px) 100vw, 300px"
																	/><img
																		width="300"
																		height="300"
																		src="https://lingdecor.com/wp-content/uploads/2020/09/Su-tu-doi-vuong-mien-lingdecor.com_-300x300.jpg"
																		class="
																			show-on-hover
																			absolute
																			fill
																			hide-for-small
																			back-image
																		"
																		alt=""
																		sizes="(max-width: 300px) 100vw, 300px"
																	/>
																</a>
															</div>
															<div
																class="
																	image-tools
																	is-small
																	top
																	right
																	show-on-hover
																"
															></div>
															<div
																class="
																	image-tools
																	is-small
																	hide-for-small
																	bottom
																	left
																	show-on-hover
																"
															></div>
															<div
																class="
																	image-tools
																	grid-tools
																	text-center
																	hide-for-small
																	bottom
																	hover-slide-in
																	show-on-hover
																"
															></div>
														</div>

														<div
															class="
																box-text box-text-products
																text-center
																grid-style-2
															"
														>
															<div class="title-wrapper">
																<p
																	class="
																		name
																		product-title
																		woocommerce-loop-product__title
																	"
																>
																	<a
																		href="https://lingdecor.com/decor-de-ban/tuong-su-tu-doi-vuong-mienldb01"
																		class="
																			woocommerce-LoopProduct-link
																			woocommerce-loop-product__link
																		"
																		>Tượng Sư Tử đội vương miện(LDB01)</a
																	>
																</p>
															</div>
															<div class="price-wrapper">
																<span class="price"
																	><del aria-hidden="true"
																		><span
																			class="woocommerce-Price-amount amount"
																			><bdi
																				>950,000&nbsp;<span
																					class="
																						woocommerce-Price-currencySymbol
																					"
																					>VND</span
																				></bdi
																			>
																		</span>
																	</del>
																	<ins
																		><span
																			class="woocommerce-Price-amount amount"
																			><bdi
																				>860,000&nbsp;<span
																					class="
																						woocommerce-Price-currencySymbol
																					"
																					>VND</span
																				></bdi
																			></span
																		></ins
																	></span
																>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div
												class="
													product-small
													col
													has-hover
													product
													type-product
													post-974
													status-publish
													last
													instock
													product_cat-decor-de-ban
													product_tag-con-voi-trang-tri
													product_tag-doi-voi
													product_tag-doi-voi-me-con
													product_tag-quang-tang-voi
													product_tag-trang-tri-voi
													has-post-thumbnail
													shipping-taxable
													purchasable
													product-type-simple
												"
											>
												<div class="col-inner">
													<div
														class="badge-container absolute left top z-1"
													></div>
													<div class="product-small box">
														<div class="box-image">
															<div class="image-fade_in_back">
																<a
																	href="https://lingdecor.com/decor-de-ban/doi-voi-me-conldb16"
																>
																	<img
																		width="300"
																		height="300"
																		src="https://lingdecor.com/wp-content/uploads/2020/09/z2389220869561_f2a8c5e7151a60b4257062dceec67721-copy-300x300.jpg"
																		class="
																			attachment-woocommerce_thumbnail
																			size-woocommerce_thumbnail
																		"
																		alt=""
																		sizes="(max-width: 300px) 100vw, 300px"
																	/>
																</a>
															</div>
															<div
																class="
																	image-tools
																	is-small
																	top
																	right
																	show-on-hover
																"
															></div>
															<div
																class="
																	image-tools
																	is-small
																	hide-for-small
																	bottom
																	left
																	show-on-hover
																"
															></div>
															<div
																class="
																	image-tools
																	grid-tools
																	text-center
																	hide-for-small
																	bottom
																	hover-slide-in
																	show-on-hover
																"
															></div>
														</div>

														<div
															class="
																box-text box-text-products
																text-center
																grid-style-2
															"
														>
															<div class="title-wrapper">
																<p
																	class="
																		name
																		product-title
																		woocommerce-loop-product__title
																	"
																>
																	<a
																		href="https://lingdecor.com/decor-de-ban/doi-voi-me-conldb16"
																		class="
																			woocommerce-LoopProduct-link
																			woocommerce-loop-product__link
																		"
																		>Đôi voi mẹ con(LDB16)</a
																	>
																</p>
															</div>
															<div class="price-wrapper">
																<span class="price"
																	><span class="woocommerce-Price-amount amount"
																		><bdi
																			>880,000&nbsp;<span
																				class="woocommerce-Price-currencySymbol"
																				>VND</span
																			></bdi
																		>
																	</span>
																</span>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div
												class="
													product-small
													col
													has-hover
													product
													type-product
													post-934
													status-publish
													first
													instock
													product_cat-decor-de-ban
													product_tag-bo-vu-nu
													product_tag-co-gai-mua
													product_tag-decor-de-ban
													has-post-thumbnail
													sale
													shipping-taxable
													purchasable
													product-type-simple
												"
											>
												<div class="col-inner">
													<div class="badge-container absolute left top z-1">
														<div class="callout badge badge-square">
															<div class="badge-inner secondary on-sale">
																<span class="onsale">-20%</span>
															</div>
														</div>
													</div>
													<div class="product-small box">
														<div class="box-image">
															<div class="image-fade_in_back">
																<a
																	href="https://lingdecor.com/decor-de-ban/bo-vu-nu-gomldb09"
																>
																	<img
																		width="300"
																		height="300"
																		src="https://lingdecor.com/wp-content/uploads/2020/09/Bo-vu-nu-gomLDB09lingdecor-300x300.jpg"
																		class="
																			attachment-woocommerce_thumbnail
																			size-woocommerce_thumbnail
																		"
																		alt=""
																		sizes="(max-width: 300px) 100vw, 300px"
																	/><img
																		width="300"
																		height="300"
																		src="https://lingdecor.com/wp-content/uploads/2020/09/Bo-vu-nu-gomLDB09lingdecor1-300x300.jpg"
																		class="
																			show-on-hover
																			absolute
																			fill
																			hide-for-small
																			back-image
																		"
																		alt=""
																		sizes="(max-width: 300px) 100vw, 300px"
																	/>
																</a>
															</div>
															<div
																class="
																	image-tools
																	is-small
																	top
																	right
																	show-on-hover
																"
															></div>
															<div
																class="
																	image-tools
																	is-small
																	hide-for-small
																	bottom
																	left
																	show-on-hover
																"
															></div>
															<div
																class="
																	image-tools
																	grid-tools
																	text-center
																	hide-for-small
																	bottom
																	hover-slide-in
																	show-on-hover
																"
															></div>
														</div>

														<div
															class="
																box-text box-text-products
																text-center
																grid-style-2
															"
														>
															<div class="title-wrapper">
																<p
																	class="
																		name
																		product-title
																		woocommerce-loop-product__title
																	"
																>
																	<a
																		href="https://lingdecor.com/decor-de-ban/bo-vu-nu-gomldb09"
																		class="
																			woocommerce-LoopProduct-link
																			woocommerce-loop-product__link
																		"
																		>Bộ vũ nữ gốm(LDB09)</a
																	>
																</p>
															</div>
															<div class="price-wrapper">
																<span class="price"
																	><del aria-hidden="true"
																		><span
																			class="woocommerce-Price-amount amount"
																			><bdi
																				>1,000,000&nbsp;<span
																					class="
																						woocommerce-Price-currencySymbol
																					"
																					>VND</span
																				></bdi
																			>
																		</span>
																	</del>
																	<ins
																		><span
																			class="woocommerce-Price-amount amount"
																			><bdi
																				>800,000&nbsp;<span
																					class="
																						woocommerce-Price-currencySymbol
																					"
																					>VND</span
																				></bdi
																			></span
																		></ins
																	></span
																>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div> -->
									</div>
								</div>
							</div>
						</div>
					</div>
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
