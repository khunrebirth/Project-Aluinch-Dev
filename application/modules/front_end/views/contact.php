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
					<h2>CONTACT US</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">

				<?php if ($this->session->flashdata('success')) { ?>
					<div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
				<?php } ?>
				<?php if ($this->session->flashdata('error')) { ?>
					<div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
				<?php } ?>

				<div class="contact-main">
					<form action="<?php echo base_url('contact/send'); ?>" method="POST">
						<input type="text" name="name" placeholder="Name:" required/>
						<input type="text" name="email" placeholder="Email:" required/>
						<input type="text" name="phone" placeholder="Phone:"/>
						<input type="text" name="company" placeholder="Company:"/>
						<textarea name="detail" placeholder="Message:" required></textarea>
						<div style="padding-bottom: 20px;" class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div>
						<input type="submit" value="SUBMIT"/>
					</form>
				</div>
				<div class="contact-main">
					<div class="contact-form">
						<div class="head">CONTACT INFO</div>
						<div class="line"></div>
						<div class="contact-detail">
							<div class="media">
								<div class="media-left">
									<img class="media-object" data-callback="makeaction" src="<?php echo base_url('storage/images/contact/c1.png'); ?>">
								</div>
								<div class="media-body">
									<?php echo $contact_info->address?>
								</div>
							</div>
							<div class="media box-c">
								<div class="media-left media-middle">
									<img class="media-object" src="<?php echo base_url('storage/images/contact/c4.png'); ?>">
								</div>
								<div class="media-body">
									<a href="tel:022863666" class="call">02 286 3666</a>
								</div>
							</div>
						</div>
						<div class="contact-detail">
							<div class="media">
								<div class="media-left">
									<img class="media-object" src="<?php echo base_url('storage/images/contact/c2.png'); ?>">
								</div>
								<div class="media-body">
									<a href="mailto:info@aluinch.com">info@aluinch.com</a>
								</div>
							</div>
							<div class="media">
								<div class="media-left media-middle">
									<img class="media-object" src="<?php echo base_url('storage/images/contact/c3.png'); ?>">
								</div>
								<div class="media-body">
									<a href="http://www.aluinch.com">www.aluinch.com</a>
								</div>
							</div>
							<div class="media">
								<div class="media-left media-middle">
									<img class="media-object" src="<?php echo base_url('storage/images/contact/c5.png'); ?>">
								</div>
								<div class="media-body">
									<a href="javascript:void(0)">VIEW COMPANY MAP</a>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="line" style="margin-top:10px;"></div>
						<div class="contact-detail">Copyright © 2018 www.aluinch.com All Rights Reserved. SEO maintained by <a href="https://www.iseo.in.th" target="_blank" style="color:#f15e22;">iSEO.in.th</a>
						</div>
						<div class="contact-detail">
							<a href="javascript:void(0)" data-toggle="modal" data-target="#sitemap">Sitemap</a>
							<br/>
							<a href="javascript:void(0)" data-toggle="modal" data-target="#term">Terms and Conditions</a>
						</div>
						<div class="clearfix"></div>
						<br/>
						<br/>
						<div class="partner-main">
							<div class="pull-left">
								PARTNERSHIP BY <img src="<?php echo base_url('storage/images/partner-logo.jpg'); ?>" width="100"/> COMPANY
							</div>
							<div class="pull-right">
								<div class="pull-right">
									<a href="https://www.facebook.com/ALUINCH/?fref=ts" target="_blank">
										<img class="media-object" src="<?php echo base_url('storage/images/contact/fb.png'); ?>">
									</a>
								</div>
								<div class="pull-right" style="padding-right:10px;">
									<a href="http://line.me/ti/p/~ALUINCH">
										<img class="media-object" src="<?php echo base_url('storage/images/contact/line.png'); ?>">
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="line-contact">
					<div class="icon-contact"><img src="<?php echo base_url('storage/images/contact/icon.png'); ?>"></div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="text-contact"> please file my place location company</div>
			</div>
		</div>
	</div>
</section>

<div class="graphic-contact"><img src="<?php echo base_url('storage/images/contact/graphic.png'); ?>" class="img-responsive"/></div>

<?php include 'layouts/model_term.php'; ?>

<?php include 'layouts/model_sitemap.php'; ?>

<?php include 'layouts/model_map.php'; ?>
