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
                <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
                    <div class="dropdown-menu dropdown-list dropdown-menu-right">
                        <div class="dropdown-header">Messages
                            <div class="float-right">
                                <a href="#">Mark All As Read</a>
                            </div>
                        </div>
                        <div class="dropdown-list-content dropdown-list-message">
                            <a href="#" class="dropdown-item dropdown-item-unread">
                                <div class="dropdown-item-avatar">
                                    <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle">
                                    <div class="is-online"></div>
                                </div>
                                <div class="dropdown-item-desc">
                                    <b>Kusnaedi</b>
                                    <p>Hello, Bro!</p>
                                    <div class="time">10 Hours Ago</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item dropdown-item-unread">
                                <div class="dropdown-item-avatar">
                                    <img alt="image" src="../assets/img/avatar/avatar-2.png" class="rounded-circle">
                                </div>
                                <div class="dropdown-item-desc">
                                    <b>Dedik Sugiharto</b>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                    <div class="time">12 Hours Ago</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item dropdown-item-unread">
                                <div class="dropdown-item-avatar">
                                    <img alt="image" src="../assets/img/avatar/avatar-3.png" class="rounded-circle">
                                    <div class="is-online"></div>
                                </div>
                                <div class="dropdown-item-desc">
                                    <b>Agung Ardiansyah</b>
                                    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <div class="time">12 Hours Ago</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item">
                                <div class="dropdown-item-avatar">
                                    <img alt="image" src="../assets/img/avatar/avatar-4.png" class="rounded-circle">
                                </div>
                                <div class="dropdown-item-desc">
                                    <b>Ardian Rahardiansyah</b>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                                    <div class="time">16 Hours Ago</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item">
                                <div class="dropdown-item-avatar">
                                    <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle">
                                </div>
                                <div class="dropdown-item-desc">
                                    <b>Alfa Zulkarnain</b>
                                    <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                                    <div class="time">Yesterday</div>
                                </div>
                            </a>
                        </div>
                        <div class="dropdown-footer text-center">
                            <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </li>
                <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                                                             class="nav-link notification-toggle nav-link-lg beep"><i
                                class="far fa-bell"></i></a>
                    <div class="dropdown-menu dropdown-list dropdown-menu-right">
                        <div class="dropdown-header">Notifications
                            <div class="float-right">
                                <a href="#">Mark All As Read</a>
                            </div>
                        </div>
                        <div class="dropdown-list-content dropdown-list-icons">
                            <a href="#" class="dropdown-item dropdown-item-unread">
                                <div class="dropdown-item-icon bg-primary text-white">
                                    <i class="fas fa-code"></i>
                                </div>
                                <div class="dropdown-item-desc">
                                    Template update is available now!
                                    <div class="time text-primary">2 Min Ago</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item">
                                <div class="dropdown-item-icon bg-info text-white">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="dropdown-item-desc">
                                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                                    <div class="time">10 Hours Ago</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item">
                                <div class="dropdown-item-icon bg-success text-white">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="dropdown-item-desc">
                                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                                    <div class="time">12 Hours Ago</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item">
                                <div class="dropdown-item-icon bg-danger text-white">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <div class="dropdown-item-desc">
                                    Low disk space. Let's clean it!
                                    <div class="time">17 Hours Ago</div>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item">
                                <div class="dropdown-item-icon bg-info text-white">
                                    <i class="fas fa-bell"></i>
                                </div>
                                <div class="dropdown-item-desc">
                                    Welcome to Stisla template!
                                    <div class="time">Yesterday</div>
                                </div>
                            </a>
                        </div>
                        <div class="dropdown-footer text-center">
                            <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </li>
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

                    <li class="menu-header">Meta tags</li>
                    <li class="">
                        <a class="nav-link" href="<?php echo base_url('backoffice/meta-tag'); ?>"><i class="fas fa-pencil-ruler"></i> <span>Meta Tags</span></a>
                    </li>

                    <li class="menu-header">Pages</li>
                    <li class="nav-item dropdown <?php if ($this->uri->segment(2) == "page" && $this->uri->segment(3) == "home") { echo 'active'; } ?>">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-home"></i><span>Home</span></a>
                        <ul class="dropdown-menu">
                            <li class="<?php if ($this->uri->segment(3) == "home" && $this->uri->segment(4) == "content"){ echo 'active'; } ?>">
                                <a class="nav-link" href="#">&#9679; Content Page</a>
                            </li>
                            <li class="active">
                                <a class="nav-link" href="#">&#9679; Title 1</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown <?php if ($this->uri->segment(2) == "page" && $this->uri->segment(3) == "product") { echo 'active'; } ?>">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-gopuram"></i><span>Products</span></a>
                        <ul class="dropdown-menu">
                            <li class="<?php if ($this->uri->segment(3) == "product" && $this->uri->segment(4) == "group") { echo 'active'; } ?>">
                                <a class="nav-link" href="<?php echo base_url('backoffice/page/product/group'); ?>">&#9679; Products</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown <?php if ($this->uri->segment(2) == "page" && $this->uri->segment(3) == "technology") { echo 'active'; } ?>">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-microchip"></i><span>Technologies</span></a>
                        <ul class="dropdown-menu">
                            <li class="<?php if ($this->uri->segment(3) == "technology" && $this->uri->segment(4) == "content"){ echo 'active'; } ?>">
                                <a class="nav-link" href="#">&#9679; Content Page</a>
                            </li>
                            <li class="<?php if ($this->uri->segment(3) == "technology" && $this->uri->segment(4) == "category"){ echo 'active'; } ?>">
                                <a class="nav-link" href="#">&#9679; Category Technology</a>
                            </li>
                            <li class="<?php if ($this->uri->segment(3) == "technology" && $this->uri->segment(4) == "faq"){ echo 'active'; } ?>">
                                <a class="nav-link" href="#">&#9679; Technology FAQ</a>
                            </li>
                            <li class="<?php if ($this->uri->segment(3) == "technology" && $this->uri->segment(4) == "list-technologies"){ echo 'active'; } ?>">
                                <a class="nav-link" href="#">&#9679; Technologies</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown <?php if ($this->uri->segment(2) == "page" && $this->uri->segment(3) == "project") { echo 'active'; } ?>">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-project-diagram"></i><span>Project References</span></a>
                        <ul class="dropdown-menu">
                            <li class="<?php if ($this->uri->segment(3) == "project" && $this->uri->segment(4) == "content") { echo 'active'; } ?>">
                                <a class="nav-link" href="#">&#9679; Content Page</a>
                            </li>
                            <li class="<?php if ($this->uri->segment(3) == "project" && $this->uri->segment(4) == "list-projects") { echo 'active'; } ?>">
                                <a class="nav-link" href="#">&#9679; Projects</a>
                            </li>
                        </ul>
                    </li>
					<li class="nav-item dropdown <?php if ($this->uri->segment(2) == "page" && $this->uri->segment(3) == "contact") { echo 'active'; } ?>">
						<a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i><span>Contact</span></a>
						<ul class="dropdown-menu">
							<li class="<?php if ($this->uri->segment(3) == "product" && $this->uri->segment(4) == "content") { echo 'active'; } ?>">
								<a class="nav-link" href="<?php echo base_url('backoffice/page/contact/content'); ?>">&#9679; Content</a>
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
