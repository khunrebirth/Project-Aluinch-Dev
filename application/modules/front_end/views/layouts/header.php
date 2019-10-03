<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<title><?php echo $title; ?></title>
	<meta name="description" content="<?php echo $meta['description']; ?>">
	<meta name="keywords" content="<?php echo $meta['keyword']; ?>">

	<link rel="canonical" href="<?php echo current_url(); ?>" />
	<meta property="og:locale" content="th_TH" />
	<meta property="og:locale:alternate" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo $og_twitter['title']; ?>" />
	<meta property="og:description" content="<?php echo $og_twitter['description']; ?>" />
	<meta property="og:url" content="<?php echo current_url(); ?>" />
	<meta property="og:site_name" content="<?php echo base_url(); ?>" />
	<meta property="og:image" content="<?php echo $og_twitter['image']; ?>" />

	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="<?php echo $og_twitter['title']; ?>" />
	<meta name="twitter:description" content="<?php echo $og_twitter['description']; ?>" />
	<meta name="twitter:image" content="<?php echo $og_twitter['image']; ?>" />

    <!-- Fonts -->
    <link rel="stylesheet" href="<?php echo base_url('resources/front_end/css/font-awesome.min.css?v=001'); ?>">

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url('resources/front_end/css/superslides.css'); ?>">

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css?v=001">

    <!-- CSS Library -->
    <link rel="stylesheet" href="<?php echo base_url('resources/front_end/css/jpreloader.css'); ?>">
    <?php if ($this->uri->segment(1) != "home" && $this->uri->segment(1) != '') { ?>
        <link rel="stylesheet" href="<?php echo base_url('resources/front_end/css/owl.carousel-1.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('resources/front_end/css/owl.theme-1.css'); ?>">
    <?php } ?>

    <!-- Custom CSS -->
    <?php if ($this->uri->segment(1) != "home" && $this->uri->segment(1) != '') { ?>
        <link rel="stylesheet" href="<?php echo base_url('resources/front_end/css/index.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('resources/front_end/css/main.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('resources/front_end/css/custom-specific.css'); ?>">
    <?php } ?>


    <!-- JS Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js?hl=th'></script>
    <script src="<?php echo base_url('resources/front_end/js/jquery.superslides.min.js'); ?>"></script>
    <script src="<?php echo base_url('resources/front_end/js/google-maker.js'); ?>"></script>
    <script src="<?php echo base_url('resources/front_end/js/google-place.js'); ?>"></script>
    <script src="<?php echo base_url('resources/front_end/js/jpreloader.js'); ?>"></script>

    <?php if ($this->uri->segment(1) != "home" && $this->uri->segment(1) != '') { ?>
        <script src="<?php echo base_url('resources/front_end/js/owl.carousel-1.min.js'); ?>"></script>
        <script src="<?php echo base_url('resources/front_end/js/equaheight.js'); ?>"></script>
    <?php } ?>

    <!-- Custom JS -->
    <?php if ($this->uri->segment(1) != "home" && $this->uri->segment(1) != '') { ?>
        <script src="<?php echo base_url('resources/front_end/js/main.js'); ?>"></script>
    <?php } ?>
</head>
<body>
    <header>
        <div class="mobile-nav" data-toggle="collapse" data-target="#navi" aria-expanded="false" aria-controls="navi"><i class="fa fa-bars"></i></div>
        <nav>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="navigation">
							<div class="logo">
								<a href="<?php echo base_url('home'); ?>"><img src="<?php echo base_url('storage/images/logo.png'); ?>" class="img-responsive"></a>
							</div>
                            <div id="navi" class="collapse navbar-collapse">
                                <ul>
                                    <!-- Desktop -->
                                    <li class="home-nav <?php if ($this->uri->segment(1) == "" || $this->uri->segment(1) == 'home') { echo 'active'; } ?>">
                                        <div><a href="<?php echo base_url('home'); ?>">HOME</a></div>
                                    </li>
                                    <li class="product-nav <?php if ($this->uri->segment(1) == "product") { echo 'active'; } ?>">
                                        <div><a href="<?php echo base_url('product'); ?>">PRODUCTS</a></div>
                                    </li>
                                    <li class="technology-nav <?php if ($this->uri->segment(1) == "technology" || $this->uri->segment(1) == "category_technology-tips-and-tracks" || $this->uri->segment(1) == 'category_technology-faq') { echo 'active'; } ?>">
                                        <div><a href="<?php echo base_url('technology'); ?>">TECHNOLOGY</a></div>
                                    </li>
                                    <li class="project-nav <?php if ($this->uri->segment(1) == "project-references") { echo 'active'; } ?>">
                                        <div><a href="<?php echo base_url('project-references'); ?>">PROJECT REFERENCES</a></div>
                                    </li>
                                    <li class="contact-nav <?php if ($this->uri->segment(1) == "contact") { echo 'active'; } ?>">
                                        <div><a href="<?php echo base_url('contact'); ?>">CONTACT US</a></div>
                                    </li>
                                    <!-- Moblie -->
                                    <li class="mobile <?php if ($this->uri->segment(1) == "" || $this->uri->segment(1) == 'home') { echo 'active'; } ?>">
                                        <div><a href="<?php echo base_url('home'); ?>">HOME</a></div>
                                    </li>
                                    <li class="mobile <?php if ($this->uri->segment(1) == "product") { echo 'active'; } ?>">
                                        <div><a href="<?php echo base_url('product'); ?>">PRODUCTS</a></div>
                                    </li>
                                    <li class="mobile <?php if ($this->uri->segment(1) == "category_technology" ) { echo 'active'; } ?>">
                                        <div><a href="<?php echo base_url('technology'); ?>">TECHNOLOGY</a></div>
                                    </li>
                                    <li class="mobile <?php if ($this->uri->segment(1) == "project-references" ) { echo 'active'; } ?>">
                                        <div><a href="<?php echo base_url('project-references'); ?>">PROJECT REFERENCES</a></div>
                                    </li>
                                    <li class="mobile <?php if ($this->uri->segment(1) == "contact") { echo 'active'; } ?>">
                                        <div><a href="<?php echo base_url('contact'); ?>">CONTACT US</a></div>
                                    </li>
                                    <li class="mobile">
                                        <div><a href="tel:022863666">02 286 3666</a></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="hot-bar">
                                <div class="hotline"><a href="tel:022863666">02 286 3666</a></div>
                                <div class="fb">
                                    <div class="pull-left">
                                        <a href="https://www.facebook.com/ALUINCH" target="_blank"><img src="<?php echo base_url('storage/images/fb.png'); ?>" class="img-responsive"/></a>
                                    </div>
                                    <div class="pull-left">
                                        <a href="http://line.me/ti/p/~ALUMINATION"><img src="<?php echo base_url('storage/images/icon-line.png'); ?>" class="img-responsive"/></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
