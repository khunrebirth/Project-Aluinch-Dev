	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header">
				<h1>Dashboard</h1>
			</div>
            <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
            <?php } ?>
            <?php if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
            <?php } ?>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="card card-statistic-1">
						<div class="card-icon bg-primary">
							<i class="far fa-user"></i>
						</div>
						<div class="card-wrap">
							<div class="card-header">
								<h4>Total Admin</h4>
							</div>
							<div class="card-body">
                                0
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-md-12 col-12 col-sm-12">
					<div class="card">
						<div class="card-header">
							<h4>Statistics</h4>
							<div class="card-header-action">
								<div class="btn-group">
									<a href="#" class="btn btn-primary">Week</a>
									<a href="#" class="btn">Month</a>
								</div>
							</div>
						</div>
						<div class="card-body">
							<canvas id="myChart" height="182"></canvas>
							<div class="statistic-details mt-sm-4">
								<div class="statistic-details-item">
									<span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
									<div class="detail-value">$Pain Text</div>
									<div class="detail-name">Today's Sales</div>
								</div>
								<div class="statistic-details-item">
									<span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
									<div class="detail-value">$Pain Text</div>
									<div class="detail-name">This Week's Sales</div>
								</div>
								<div class="statistic-details-item">
									<span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
									<div class="detail-value">$Pain Text</div>
									<div class="detail-name">This Month's Sales</div>
								</div>
								<div class="statistic-details-item">
									<span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
									<div class="detail-value">$Pain Text</div>
									<div class="detail-name">This Year's Sales</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-12 col-12 col-sm-12">
					<div class="card">
						<div class="card-header">
							<h4>Recent Activities</h4>
						</div>
						<div class="card-body">
							<ul class="list-unstyled list-unstyled-border">
								<li class="media">
									<img class="mr-3 rounded-circle" width="50" src="<?php echo base_url('resources/back_end/assets/img/avatar/avatar-1.png'); ?>" alt="avatar">
									<div class="media-body">
										<div class="float-right text-primary">Now</div>
										<div class="media-title">Pain Text</div>
										<span class="text-small text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem culpa dignissimos distinctio ipsam laboriosam magnam modi nihil odit omnis pariatur placeat, rerum soluta. Aliquid aperiam consequuntur maxime nihil quis, quos.</span>
									</div>
								</li>
								<li class="media">
									<img class="mr-3 rounded-circle" width="50" src="<?php echo base_url('resources/back_end/assets/img/avatar/avatar-2.png'); ?>" alt="avatar">
									<div class="media-body">
										<div class="float-right">12m</div>
										<div class="media-title">Pain Text</div>
										<span class="text-small text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ducimus ipsam nam perspiciatis qui repudiandae similique voluptate. Asperiores aspernatur, aut delectus ex excepturi necessitatibus optio recusandae sapiente sit suscipit unde.</span>
									</div>
								</li>
								<li class="media">
									<img class="mr-3 rounded-circle" width="50" src="<?php echo base_url('resources/back_end/assets/img/avatar/avatar-3.png'); ?>" alt="avatar">
									<div class="media-body">
										<div class="float-right">17m</div>
										<div class="media-title">Pain Text</div>
										<span class="text-small text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquam assumenda consequatur delectus doloribus eos harum</span>
									</div>
								</li>
								<li class="media">
									<img class="mr-3 rounded-circle" width="50" src="<?php echo base_url('resources/back_end/assets/img/avatar/avatar-4.png'); ?>" alt="avatar">
									<div class="media-body">
										<div class="float-right">21m</div>
										<div class="media-title">Pain Text</div>
										<span class="text-small text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci assumenda at debitis distinctio magnam neque odit.</span>
									</div>
								</li>
							</ul>
							<div class="text-center pt-1 pb-1">
								<a href="#" class="btn btn-primary btn-lg btn-round">
									View All
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
