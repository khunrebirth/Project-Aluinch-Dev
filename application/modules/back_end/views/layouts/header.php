<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aluinch &mdash; Backoffice <?php echo "($title)"; ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo base_url('resources/back_end/node_modules/jqvmap/dist/jqvmap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('resources/back_end/node_modules/weathericons/css/weather-icons.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('resources/back_end/node_modules/weathericons/css/weather-icons-wind.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('resources/back_end/node_modules/summernote/dist/summernote-bs4.css'); ?>">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url('resources/back_end/assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('resources/back_end/assets/css/components.css'); ?>">


    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?php echo base_url('resources/back_end/assets/js/stisla.js'); ?>"></script>

    <!-- JS Libraies -->
    <script src="<?php echo base_url('resources/back_end/node_modules/simpleweather/jquery.simpleWeather.min.js'); ?>"></script>
    <script src="<?php echo base_url('resources/back_end/node_modules/chart.js/dist/Chart.min.js'); ?>"></script>
    <script src="<?php echo base_url('resources/back_end/node_modules/jqvmap/dist/jquery.vmap.min.js'); ?>"></script>
    <script src="<?php echo base_url('resources/back_end/node_modules/jqvmap/dist/maps/jquery.vmap.world.js'); ?>"></script>
    <script src="<?php echo base_url('resources/back_end/node_modules/summernote/dist/summernote-bs4.js'); ?>"></script>
    <script src="<?php echo base_url('resources/back_end/node_modules/chocolat/dist/js/jquery.chocolat.min.js'); ?>"></script>
    <script src="<?php echo base_url('resources/back_end/node_modules/sweetalert/dist/sweetalert.min.js'); ?>"></script>

    <style>
		.input-file-w-30 {
			width: 30%
		}
    </style>
	<!-- Custom JS -->
	<script type="text/javascript">
        window.base_url = "<?php echo base_url(); ?>"
	</script>
</head>
<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $user->username; ?></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="<?php echo base_url('backoffice/logout'); ?>" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="<?php echo base_url('backoffice/dashboard'); ?>">Aluinch Backoffice</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="<?php echo base_url('backoffice/dashboard'); ?>">ALI</a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">General</li>
                    <li class="">
                        <a class="nav-link" href="<?php echo base_url('backoffice/dashboard'); ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
                    </li>
                    <li class="menu-header">Pages</li>
                    <li class="nav-item dropdown <?php if ($this->uri->segment(2) == "page" && $this->uri->segment(3) == "home") { echo 'active'; } ?>">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-home"></i><span>Home</span></a>
                        <ul class="dropdown-menu">
                            <li class="<?php if ($this->uri->segment(3) == "home" && $this->uri->segment(4) == "content") { echo 'active'; } ?>">
                                <a class="nav-link" href="<?php echo base_url('backoffice/page/home/content/1'); ?>">&#9679; Content</a>
                            </li>
                        </ul>
                        <ul class="dropdown-menu">
                            <li class="<?php if ($this->uri->segment(3) == "home" && $this->uri->segment(4) == "gallery") { echo 'active'; } ?>">
                                <a class="nav-link" href="<?php echo base_url('backoffice/page/home/gallery'); ?>">&#9679; Gallery</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown <?php if ($this->uri->segment(2) == "page" && $this->uri->segment(3) == "product") { echo 'active'; } ?>">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-gopuram"></i><span>Products</span></a>
                        <ul class="dropdown-menu">
                            <li class="<?php if ($this->uri->segment(3) == "product") { echo 'active'; } ?>">
                                <a class="nav-link" href="<?php echo base_url('backoffice/page/product/group'); ?>">&#9679; Products</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown <?php if ($this->uri->segment(2) == "page" && $this->uri->segment(3) == "technology") { echo 'active'; } ?>">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-microchip"></i><span>Technologies</span></a>
                        <ul class="dropdown-menu">
                            <li class="<?php if ($this->uri->segment(3) == "technology") { echo 'active'; } ?>">
                                <a class="nav-link" href="<?php echo base_url('backoffice/page/technology/category'); ?>">&#9679; Technologies</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown <?php if ($this->uri->segment(2) == "page" && $this->uri->segment(3) == "project") { echo 'active'; } ?>">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-project-diagram"></i><span>Project References</span></a>
                        <ul class="dropdown-menu">
                            <li class="<?php if ($this->uri->segment(3) == "project" && $this->uri->segment(4) == "content") { echo 'active'; } ?>">
                                <a class="nav-link" href="<?php echo base_url('backoffice/page/project/content/1') ?>">&#9679; Content</a>
                            </li>
                        </ul>
                        <ul class="dropdown-menu">
                            <li class="<?php if ($this->uri->segment(3) == "project" && ($this->uri->segment(4) == "projects" || $this->uri->segment(4) == "list-project-pictures")) { echo 'active'; } ?>">
                                <a class="nav-link" href="<?php echo base_url('backoffice/page/project/projects') ?>">&#9679; Projects</a>
                            </li>
                        </ul>
                    </li>
					<li class="nav-item dropdown <?php if ($this->uri->segment(2) == "page" && $this->uri->segment(3) == "contact") { echo 'active'; } ?>">
						<a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i><span>Contact</span></a>
						<ul class="dropdown-menu">
							<li class="<?php if ($this->uri->segment(3) == "contact" && $this->uri->segment(4) == "content") { echo 'active'; } ?>">
								<a class="nav-link" href="<?php echo base_url('backoffice/page/contact/content/1'); ?>">&#9679; Content</a>
							</li>
						</ul>
                        <ul class="dropdown-menu">
                            <li class="<?php if ($this->uri->segment(3) == "contact" && $this->uri->segment(4) == "info") { echo 'active'; } ?>">
                                <a class="nav-link" href="<?php echo base_url('backoffice/page/contact/info/1') ?>">&#9679; Info</a>
                            </li>
                        </ul>
					</li>
                    <li class="menu-header">Settings</li>
                    <li>
                        <a class="nav-link" href="<?php echo base_url('backoffice/settings'); ?>"><i class="fas fa-ellipsis-h"></i> <span>Settings</span></a>
                    </li>
                </ul>
                <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                    <a href="<?php echo base_url('home'); ?>" class="btn btn-primary btn-lg btn-block btn-icon-split">
                        <i class="fas fa-rocket"></i> Back to Website
                    </a>
                </div>
            </aside>
        </div>
