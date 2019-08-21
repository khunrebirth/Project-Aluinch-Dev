    <!-- Main Content -->
    <div id="section1">
        <div class="warp-slide">
            <div id="slides">
                <div class="slides-container">
                    <img src="<?php echo base_url('storage/images/bg1-n1.jpg'); ?>" />
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="slogan-head">
                        Alumination caused by the integration of people with experience and expertise in aluminum directly. We are ready to offer a new way of decorating buildings are beautiful and add value to the maximum. As well, we will have to innovate and develop products, aluminum continued using the brand name that ALUINCH.
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
                                Aluminium Instinct, The creative modern aluminium frame style has always<br /> concerned equable frame design both in vertical and horizontal line.
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
                        <h2>PROJECT REFERENCES</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-main">
                        <div class="head-item">ALBUM PICTURES PRODUCT</div>
                        <div class="clearfix"></div>
                        <div class="main-carousel">
                            <ul class="project-ref">
                                <?php foreach ($projects as $project) { ?>
                                    <li class="lb-detail-project" data-id="<?php echo $project->id; ?>" data-name="<?php echo $project->title; ?>" data-des="<?php echo $project->desc; ?>">
                                        <figure>
                                            <div class="main-img">
                                                <div class="orange-bg"><div class="icon"><i class="glyphicon glyphicon-search"></i></div></div>
                                                <img src="<?php echo base_url('storage/uploads/projects/' . $project->image_cover); ?>" class="img-responsive img-center" />
                                            </div>
                                            <figcaption> <?php echo $project->title; ?></figcaption>
                                        </figure>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="warp-light-box">
        <div class="bg-black"></div>
        <div class="main-lb">
            <div class="close-lb"><img src="<?php echo base_url('storage/images/product/close.png'); ?>" class="img-responsive" /></div>
            <div id="ajax-result"></div>
        </div>
    </div>

    <!-- contact -->
    <?php include 'layouts/contact.php'; ?>
    <!-- end contact -->
