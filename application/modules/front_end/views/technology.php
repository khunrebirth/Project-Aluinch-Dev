<!-- Push Custom Style -->
<style>
	.main-section ul.list-item>li:last-of-type:before {
		content: none;
	}
</style>

<!-- Main Content -->
<div id="section1">
	<div class="warp-slide">
		<div id="slides">
			<div class="slides-container">
				<img src="<?php echo base_url('storage/images/bg1-n1.jpg'); ?>"/>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="slogan-head">
					Alumination caused by the integration of people with experience and expertise in aluminum directly.
					We are ready to offer a new way of decorating buildings are beautiful and add value to the maximum.
					As well, we will have to innovate and develop products, aluminum continued using the brand name that
					ALUINCH.
				</div>
			</div>
		</div>
	</div>
</div>

<section id="slogan-web" class="main-section">
	<div class="graphic">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="text-box">
						<h1>ALUMINIUM INSTINCT!</h1>
						<p>
							Aluminium Instinct, The creative modern aluminium frame style has always<br/> concerned
							equable frame design both in vertical and horizontal line.
						</p>
					</div>
					<div class="fb"></div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="technology" class="main-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="headbar">
					<div class="triangle"></div>
					<h2>TECHNOLOGY</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<ul class="list-item">
					<?php foreach ($category_technologies as $category_technology) { ?>
						<li class="<?php if (rawurldecode($this->uri->segment(1)) == 'technology' && rawurldecode($this->uri->segment(2)) == $category_technology['category_technology_slug']) { echo 'active'; } ?>">

							<?php if ($category_technology['category_technology_slug'] != 'faq-คำถามที่พบบอย') { ?>
								<a><?php echo $category_technology['category_technology_name']; ?></a>
								<ul class="sub-list-item">
									<?php foreach ($category_technology['technologies'] as $technology) { ?>
										<li class="">
											<a href="<?php echo base_url('technology/' . $category_technology['category_technology_slug'] . '/' . $technology->slug . '/' . hashids_encrypt($technology->id)); ?>">
												<?php echo $technology->title; ?>
											</a>
										</li>
									<?php } ?>
								</ul>

							<?php } else if ($category_technology['category_technology_slug'] == 'faq-คำถามที่พบบอย') { ?>
								<a href="<?php echo base_url('technology/' . $category_technology['category_technology_slug'] . '/' . hashids_encrypt($category_technology['category_technology_id'])); ?>"><?php echo $category_technology['category_technology_name']; ?></a>
							<?php } ?>

						</li>
					<?php } ?>
				</ul>
			</div>
			<div class="col-md-8">
				<div class="product-main">

					<?php if ($technology_specific_category_slug != 'faq-คำถามที่พบบอย') { ?>

						<div class="head-item">
							<?php echo $technology_specific->category_technology_name; ?>
						</div>
						<div id="show-vdo" class="main-pic">
							<?php echo $technology_specific->src; ?>
							<h1><?php echo $technology_specific->title; ?></h1>
							<p><?php echo $technology_specific->body; ?></p>
						</div>
						<div class="clearfix"></div>

					<?php } else if ($technology_specific_category_slug == 'faq-คำถามที่พบบอย') { ?>

						<div class="head-item"><?php echo $technology_specific['category_technology_name']; ?></div>
						<div class="clearfix"></div>
						<div class="main-carousel">
							<div class="faq-main">
								<ul class="load-ul">
									<?php foreach ($technology_specific['faqs'] as $faq) { ?>
										<li>
											<div class="faq-main-box" data-val="toggle-<?php echo hashids_encrypt($faq->id); ?>">
												<?php echo $faq->ask; ?> <i
														class="glyphicon glyphicon-triangle-right"></i>
											</div>
											<p class="toggle-<?php echo hashids_encrypt($faq->id); ?>"><?php echo $faq->ans; ?></p>
										</li>
									<?php } ?>
								</ul>
								<div id="loadMore" class="see-more">SEE MORE</div>
							</div>
						</div>

					<?php } ?>

				</div>
			</div>
		</div>
	</div>
</section>

<?php include 'layouts/contact.php'; ?>

<?php include 'layouts/model_term.php'; ?>

<?php include 'layouts/model_sitemap.php'; ?>

<?php include 'layouts/model_map.php'; ?>
