<!-- Push Style -->
<link rel="stylesheet" href="<?php echo base_url('resources/front_end/css/owl.carousel.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('resources/front_end/css/style.css'); ?>">

<style>
	@media (max-width: 767px) {
		.icon-line,
		.icon-fb {
			height: 36px;
		}
	}
</style>

<div class="ruler-bar"></div>
<div class="hidden-xs">
	<div class="nav-page">
		<ul>
			<li class="home-nav">
				<div class="dot"></div>
				<div class="menu">HOME</div>
			</li>
			<li class="product-nav">
				<div class="dot"></div>
				<div class="menu">PRODUCTS</div>
			</li>
			<li class="technology-nav">
				<div class="dot"></div>
				<div class="menu">TECHNOLOGY</div>
			</li>
			<li class="project-nav">
				<div class="dot"></div>
				<div class="menu">PROJECT REFERENCES</div>
			</li>
			<li class="contact-nav">
				<div class="dot"></div>
				<div class="menu">CONTACT US</div>
			</li>
		</ul>
	</div>
</div>

<!-- section1 -->
<div id="section1" data-0="opacity:1" data-1000="opacity:0">
	<div class="warp-slide">
		<div class="slogan">
			Alumination caused by the integration of people with experience and expertise in aluminum directly. We are
			ready to offer a new way of decorating buildings are beautiful and add value to the maximum. As well, we
			will have to innovate and develop products, aluminum continued using the brand name that ALUINCH.
		</div>
		<div id="slides">
			<div class="slides-container">
				<img src="<?php echo base_url('storage/images/bg1-n1.jpg'); ?>"/>
			</div>
		</div>
	</div>
</div>
<!-- end section1 -->

<!-- section2 -->
<div id="section2" data-0="top:400px;opacity:1" data-1000="top:0px;" data-2000="top:0%;" data-11000="top:-1600px;opacity:1">
	<div class="bg-mobile visible-xs">
		<div class="text" style="top:40%"><img src="<?php echo base_url('storage/images/text-home.png'); ?>" width="150"/>
		</div>
	</div>
	<div class="hidden-xs bg"></div>
	<div class="warp hidden-xs">
		<div class="text-home">
			<img src="<?php echo base_url('storage/images/text-home.png'); ?>" width="300"/>
		</div>
		<div class="arrow" data-0="opacity:0;" data-1300="opacity:0;" data-1600="opacity:1;">
			<img src="<?php echo base_url('storage/images/arrow.png'); ?>"/>
		</div>
	</div>
	<div class="port-main" data-0="opacity:0;" data-1300="opacity:0;" data-1600="opacity:1;">
		<div class="graphic"><img src="<?php echo base_url('storage/images/graphic1.png'); ?>"/></div>
		<div class="warp-slide">
			<div class="line-head"></div>
			<h1>PORTFOLIOS</h1>
			<div class="clearfix"></div>
			<div class="clearfix"></div>
			<div class="main-slide">
				<div id="slide1" class="slide-crop">
					<div class="owl-gallery">
						<?php foreach ($portfolios as $portfolio) { ?>
							<div class="item" data-hash="port<?php echo $portfolio->id; ?>">
								<img src="<?php echo base_url('storage/uploads/images/portfolios/' . $portfolio->title); ?>" class="img-responsive" atl="<?php echo $portfolio->img_title_alt; ?>"/>
							</div>
						<?php } ?>
					</div>
					<div class="main-thumb">
						<div id="arrow-port-left" class="arrow-left"><i class="glyphicon glyphicon-menu-left"></i></div>
						<div id="arrow-port-right" class="arrow-right"><i class="glyphicon glyphicon-menu-right"></i></div>
						<div class="space" align="center">Image Gallery</div>
						<div class="owl-gallery-thumb">
							<?php foreach ($portfolios as $portfolio) { ?>
								<div class="item" data-hash="port<?php echo $portfolio->id; ?>">
									<img src="<?php echo base_url('storage/uploads/images/portfolios/' . $portfolio->title); ?>" class="img-responsive" atl="<?php echo $portfolio->img_title_alt; ?>"/>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end section2 -->

<!-- section3: Products -->
<div id="section3" data-2000="top:500px;opacity:0;" data-3000="opacity:1; top:-200px;" data-5000="opacity:1; top:-400px;" data-6000="top:-1000px;opacity:1;" data-8000="top:-2800px;">
<!--	<div class="bg-mobile visible-xs">-->
<!--		<div class="text" style="top:45%"></div>-->
<!--	</div>-->
	<div class="bg hidden-xs" data-2000="opacity:1;"></div>
	<div class="bg2 hidden-xs" data-2000="opacity:1;"></div>
	<div class="text-main hidden-xs" data-0="opacity:0;" data-4000="opacity:0;" data-4200="opacity:1;"></div>
	<div class="warp" data-scroll-index="2">
		<div class="graphic"><img src="<?php echo base_url('storage/images/graphic1.png'); ?>"/></div>
		<div class="line-head"></div>
		<h1>PRODUCT</h1>
		<div class="clearfix"></div>
		<div class="warp-slide">
			<h2>ALUMINIUM อลูมิเนียมโปรไฟล์</h2>
			<div class="owl-product1">
				<?php foreach ($products['aluminiums'] as $product) { ?>
					<div class="item">
						<a href="<?php echo base_url('product/' . $product->group_product_slug . '/' . $product->slug . '/' . hashids_encrypt($product->id)); ?>">
							<img src="<?php echo base_url('storage/uploads/images/products/' . $product->img_cover_home) ?>" class="img-responsive" alt="<?php echo $product->img_title_alt; ?>"/>
							<div class="product-box">
								<h3><?php echo $product->title; ?></h3>
								<p><?php echo $product->description; ?></p>
							</div>
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="warp-slide">
			<h2>HARDWARE อุปกรณ์ประตูหน้าต่าง</h2>
			<div class="owl-product2">
				<?php foreach ($products['hardwares'] as $product) { ?>
					<div class="item">
						<a href="<?php echo base_url('product/' . $product->group_product_slug . '/' . $product->slug . '/' . hashids_encrypt($product->id)); ?>">
							<img src="<?php echo base_url('storage/uploads/images/products/' . $product->img_cover_home) ?>" class="img-responsive" alt="<?php echo $product->img_title_alt; ?>"/>
							<div class="product-box">
								<h3><?php echo $product->title; ?></h3>
								<p style="<?php if ($product->id == 16) { echo 'letter-spacing: -0.3px;'; } ?>"><?php echo $product->description; ?></p>
							</div>
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<!-- end section3 -->

<!-- section4: Technology -->
<div id="section4" data-0="top:500px;opacity:0;" data-6000="opacity:0;" data-9000="top:-300px;opacity:1;" data-14000="top:-3500px;opacity:1;">
	<div class="bg hidden-xs" data-2000="opacity:1;"></div>
	<div class="bg2 hidden-xs" data-2000="opacity:1;"></div>
	<div class="text-main hidden-xs" data-0="opacity:0;" data-8500="opacity:0;" data-8700="opacity:1;">
		ALUINCH produce aluminium with standard ISO 14001 and 9001 from the plant which has the capacity, the largest in
		Thailand and environmentally friendly raw material aluminium 6063 T 5 on the strength of aluminium used. market
		Because forming Surface of the aluminium production process that we use to enhance their beauty. Smooth skin
		with aluminium throughout the line.
	</div>
	<div class="bg-mobile visible-xs">
		<div class="text">
			ALUINCH produce aluminium with standard ISO 14001 and 9001 from the plant which has the capacity, the
			largest in Thailand and environmentally friendly raw material aluminium 6063 T 5 on the strength of
			aluminium used. market Because forming Surface of the aluminium production process that we use to enhance
			their beauty. Smooth skin with aluminium throughout the line.
		</div>
	</div>
	<div class="warp" data-scroll-index="3">
		<div class="graphic"><img src="<?php echo base_url('storage/images/graphic1.png'); ?>"/></div>
		<div class="line-head"></div>
		<h1>TECHNOLOGY</h1>
		<div class="clearfix"></div>

		<div class="warp-slide">
			<div id="arrow-techno-l-p1" class="arrow-left"><img src="<?php echo base_url('storage/images/arrow-left.png'); ?>" style="height: 20px;" /></div>
			<div id="arrow-techno-r-p1" class="arrow-right"><img src="<?php echo base_url('storage/images/arrow-right.png'); ?>" style="height: 20px;" /></div>
			<h2>PRESENTATION VDO วีดีโอแนะนำการใช้งาน</h2>
			<div class="owl-techno1">
				<?php foreach ($technologies['vdos'] as $vdo) {?>
					<div class="item vdo-lightbox" data-val="<?php echo $vdo->short_src; ?>">
						<img src="<?php echo $vdo->img_cover; ?>" alt="<?php echo $vdo->img_title_alt; ?>"/>
						<div class="vdo-box">
							<h3><?php echo $vdo->title; ?></h3>
							<p><?php echo $vdo->description; ?></p>
						</div>
					</div>
				<?php } ?>
			</div>

			<div class="see-more"><a href="<?php echo base_url('technology'); ?>">SEE MORE</a></div>
		</div>

		<div class="warp-slide">
			<div id="arrow-techno-l-p2" class="arrow-left"><img src="<?php echo base_url('storage/images/arrow-left.png'); ?>" style="height: 20px;" /></div>
			<div id="arrow-techno-r-p2" class="arrow-right"><img src="<?php echo base_url('storage/images/arrow-right.png'); ?>" style="height: 20px;" /></div>
			<h2>TIPS AND TRICKS เกร็ดความรู้อลูมิเนียม</h2>
			<div class="owl-techno2">
				<?php foreach ($technologies['tips'] as $tip) {?>
					<div class="item vdo-lightbox" data-val="pZFeraPjm4s">
						<img src="<?php echo $tip->img_cover; ?>" alt="<?php echo $tip->img_title_alt; ?>"/>
						<div class="vdo-box">
							<h3><?php echo $tip->title; ?></h3>
							<p><?php echo $tip->description; ?></p>
						</div>
					</div>
				<?php } ?>
			</div>

			<div class="see-more"><a href="<?php echo base_url('technology'); ?>">SEE MORE</a></div>
		</div>

		<div class="warp-slide faq-main">
			<h2>FAQ</h2>
			<?php foreach ($technologies['faqs'] as $faq) {?>
				<div class="faq-main-box" data-val="toggle-<?php echo $faq->id; ?>">
					<?php echo $faq->ask; ?> <i class="glyphicon glyphicon-triangle-right"></i>
				</div>
				<p class="toggle-<?php echo $faq->id; ?>">
					<?php echo $faq->ans; ?>
				</p>
			<?php } ?>
			<div class="see-more"><a href="<?php echo base_url('technology'); ?>">SEE MORE</a></div>
		</div>
	</div>
</div>
<!-- end section4 -->

<!-- section5: Project Ref -->
<div id="section5" data-0="top:500px;pacity:1;" data-12000="opacity:0;" data-14000="opacity:1;top:-450px;" data-17000="top:-2200px;">
	<div class="bg hidden-xs" data-2000="opacity:1;"></div>
	<div class="bg2 hidden-xs" data-2000="opacity:1;"></div>
	<div class="text-main hidden-xs" data-12700="opacity:0;" data-13400="opacity:0;" data-13600="opacity:1;">
		ALUINCH is aluminium with a special design. Equal emphasis on both the vertical and horizontal frames of
		maintaining some. And avoid the joints of aluminium alloy. This design provides the smallest footprint. It also
		takes into account the strength of the performance and versatility of use.
	</div>
	<div class="bg-mobile visible-xs">
		<div class="text">
			ALUINCH is aluminium with a special design. Equal emphasis on both the vertical and horizontal frames of
			maintaining some. And avoid the joints of aluminium alloy. This design provides the smallest footprint. It
			also takes into account the strength of the performance and versatility of use.
		</div>
	</div>
	<div class="warp" data-scroll-index="4">
		<div class="graphic"><img src="<?php echo base_url('storage/images/graphic1.png'); ?>"/></div>
		<div class="line-head"></div>
		<h1>PROJECT REFERENCE</h1>
		<div class="clearfix"></div>
		<div class="warp-slide">
			<div id="arrow-project-l-p1" class="arrow-left"><img src="<?php echo base_url('storage/images/arrow-left.png'); ?>" style="height: 20px;"/></div>
			<div id="arrow-project-r-p1" class="arrow-right"><img src="<?php echo base_url('storage/images/arrow-right.png'); ?>" style="height: 20px;"/></div>
			<div class="owl-project">
				<?php foreach ($projects as $project) { ?>
					<div class="item lb-detail-project" data-id="<?php echo hashids_encrypt($project->id); ?>" data-name="<?php echo $project->title; ?>">
						<img src="<?php echo base_url('storage/uploads/images/projects/' . $project->img_cover); ?>" class="img-responsive img-center" alt="<?php echo $project->img_title_alt; ?>"/>
						<div class="vdo-box">
							<h3 class="text-center"><?php echo $project->title; ?></h3>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="see-more"><a href="<?php echo base_url('project-references'); ?>">SEE MORE</a></div>
	</div>
</div>
<!-- end section5 -->

<!-- project-ref -->
<div class="warp-light-box">
	<div class="bg-black"></div>
	<div class="main-lb">
		<div class="close-lb"><img src="<?php echo base_url('storage/images/product/close.png'); ?>"/></div>
		<div id="ajax-result"></div>
	</div>
</div>
<!-- end project-ref -->

<!-- section6: Contact -->
<div id="section6" data-0="top:50%;opacity:0;" data-14000="opacity:0;top:500px;" data-14500="opacity:1;" data-16000="top:10%;" data-18000="top:-50%;">
	<div class="bg" data-2000="opacity:1;"></div>
	<div class="bg-orange">
		<div class="warp" data-scroll-index="5">
			<div class="line-head"></div>
			<h1>CONTACT US</h1>
			<div class="box-contact box-contact-1">
				<div class="clearfix"></div>
				<span class="head">CONTACT INFO</span>
				<div class="clearfix"></div>
				<div class="list-contact">
					<div class="media">
						<div class="media-left media-top">
							<img class="media-object" src="<?php echo base_url('storage/images/c1.png'); ?>">
						</div>
						<div class="media-body">
							Alumination Ltd.<br/>
							Head Office : 1369 Room No. 7, Chan road, Thungwatdon, Sathorn, Bangkok 10120<br/>
							Fax : 02 286 3669
						</div>
					</div>
					<div class="media box-c">
						<div class="media-left media-middle">
							<img class="media-object" src="<?php echo base_url('storage/images/c3.png'); ?>">
						</div>
						<div class="media-body" style="padding-top:5px;">
							<a href="mailto:info@aluinch.com">info@aluinch.com</a>
						</div>
					</div>
					<div class="contact-clear"></div>
					<div class="media box-c">
						<div class="media-left media-middle">
							<img class="media-object" src="<?php echo base_url('storage/images/c5.png'); ?>">
						</div>
						<div class="media-body map" style="padding-top:5px;" data-toggle="modal" data-target="#map">
							VIEW COMPANY MAP
						</div>
					</div>
				</div>
				<div class="list-contact2">
					<div class="media box-c">
						<div class="media-left media-middle">
							<img class="media-object" src="<?php echo base_url('storage/images/c2.png'); ?>">
						</div>
						<div class="media-body" style="padding-top:5px;">
							<a href="tel:022863666"> 02 286 3666</a>
						</div>
					</div>
					<div class="media box-c">
						<div class="media-left media-middle">
							<img class="media-object" src="<?php echo base_url('storage/images/c4.png'); ?>">
						</div>
						<div class="media-body" style="padding-top:5px;">
							www.aluinch.com
						</div>
					</div>
					<div class="media box-c desktop">
						<div class="media-body">
							<br/><span class="term-lb" data-toggle="modal" data-target="#sitemap">Sitemap</span>
							<br/><span class="term-lb" data-toggle="modal" data-target="#term">Terms and Conditions</span>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="copy desktop float-none">
					Copyright © 2015 www.aluinch.com All Rights Reserved. Site by <a href="http://www.polardevgroup.com" target="_blank">Polardev</a>
				</div>
				<div class="copy-line desktop"></div>
				<div class="list-social">
					<a href="http://line.me/ti/p/~ALUMINATION" target="_blank">
						<img src="<?php echo base_url('storage/images/line-icon.png'); ?>" class="icon-line"/>
					</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="https://www.facebook.com/ALUINCH/" target="_blank"><img src="<?php echo base_url('storage/images/fb2.png'); ?>" class="icon-fb"/></a>
				</div>
			</div>

			<!-- contact -->
			<div class="box-contact form-contact">
				<form action="<?php echo base_url('contact/send'); ?>" method="POST">
					<input type="text" name="name" placeholder="Name:" required />
					<input type="text" name="email" placeholder="Email:" required />
					<input type="text" name="company" placeholder="Company:" />
					<input type="text" name="tel" placeholder="Phone:" />
					<textarea name="detail" placeholder="Message:" required ></textarea>
					<div style="padding-bottom: 20px;" class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div>
					<input type="submit" value="Send Message" style="margin-top: 0px;" />
				</form>
				<div class="clearfix"></div>
				<div class="copy mobile"><span data-toggle="modal" data-target="#sitemap">Sitemap</span> | <span class="term-lb" data-toggle="modal" data-target="#term">Terms and Conditions</span></div>
				<div class="copy mobile">Copyright © 2015 www.aluinch.com All Rights Reserved. SEO maintained by iSEO.in.th</div>
				<div class="clearfix"></div>
				<div class="copy-line mobile"></div>
				<div class="partner mobile">partnership by <span class="yellow">In The Glazz</span> Company</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<!-- <div id="map-canvas" class="map-google"></div> -->
</div>
<!-- end section6 -->

<?php include 'layouts/model_term.php'; ?>

<?php include 'layouts/model_sitemap.php'; ?>

<?php include 'layouts/model_map.php'; ?>

<!-- Push Scripts -->
<script src="<?php echo base_url('resources/front_end/js/owl.carousel.min.js'); ?>"></script>
<script src="<?php echo base_url('resources/front_end/js/scrollIt.js?v=1001'); ?>"></script>
<script src="<?php echo base_url('resources/front_end/js/main-home.js'); ?>"></script>
<script src="<?php echo base_url('resources/front_end/js/skrollr.min.js'); ?>"></script>

<!-- Push Custom Scripts -->
<script type="text/javascript">
	$(function () {

		/**********
		 * Init
		 * **/

		if (!(/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera)) {

			// initialize skrollr if the window width is large enough
			if ($(window).width() > 768) {
				// skrollr.init();
                skrollr.init({forceHeight: false});
			} else {
				skrollr.init().destroy();
			}

			// disable skrollr if the window is resized below 768px wide
			$(window).on('resize', function () {
				if ($(window).width() <= 768) {
					skrollr.init().destroy(); // skrollr.init() returns the singleton created above
					//topOffset: -120

				} else {
					skrollr.init();

				}
			});

		} else {

			skrollr.init().destroy();

		}

		/**********
		 * Event
		 * **/

		$(".lb-detail-project").on('click', function() {

			let urlGetProjectRef = "<?php echo base_url('ajax/get/project-references'); ?>"
			let $id = $(this).data("id")

			$(".warp-light-box").addClass("show-black")
			$(".bg-black").addClass("show-black")
			$("body,html").addClass("overflow-hidden")

			$.ajax({
				type: 'GET',
				url: urlGetProjectRef + '/' + $id + '/home',
				success: function (res) {
					$('#ajax-result').html(res.data);
				},
				error: function (data) {
					console.log("error");
				}
			})
		})
	});
</script>
