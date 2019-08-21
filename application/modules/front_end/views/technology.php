    <!-- CSS Libraries -->

    <!-- Push Custom CSS -->
    <style>
        .main-section ul.list-item>li:before {
            content: none !important;
        }
    </style>

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
                        <h2>TECHNOLOGY</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <ul class="list-item">
                        <?php foreach ($category_technologies as $category_technology) { ?>
                            <li class="<?php if (rawurldecode($this->uri->segment(1)) == 'technology' && rawurldecode($this->uri->segment(2)) == $category_technology->slug) { echo 'active'; } ?>">
                                <a href="<?php echo base_url('technology/' . $category_technology->slug . '/' . $category_technology->id); ?>"><?php echo $category_technology->title; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-md-9">
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
                                                <div class="faq-main-box" data-val="toggle-<?php echo $faq->id; ?>">
                                                    <?php echo $faq->ask; ?> <i class="glyphicon glyphicon-triangle-right"></i>
                                                </div>
                                                <p class="toggle-<?php echo $faq->id; ?>"><?php echo $faq->ans; ?></p>
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

    <!-- contact -->
    <script src='https://www.google.com/recaptcha/api.js?hl=th'></script>
    <script>
        function check-captcha(){
            document.getElementById('btn-footer-submit').disabled = false;
        }
    </script>
    <style type="text/css">
        button[disabled], html input[disabled] {
            opacity: 0.5;
        }
    </style>
    <div id="contact">
        <div class="graphic"><img src="<?php echo base_url('storage/images/product/graphic-footer.png'); ?>" class="img-responsive" /></div>
        <div class="main-box-head">
            <div class="warp">
                <div class="box-header">CONTACT<br />US</div>
            </div>
        </div>
        <div class="bg"></div>
        <div class="bg-orange">
            <div class="warp">
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
                                Alumination Ltd.<br />
                                1369 Room No. 7, Chan road, Thungwatdon, Sathorn, Bangkok 10120<br />
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
                                <br /> Sitemap
                                <br />Terms and Conditions
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="copy desktop">Copyright © 2015 www.aluinch.com All Rights Reserved. SEO maintained by iSEO.in.th</div>
                    <div class="copy-line desktop"></div>
                    <div class="partner desktop">partnership by <img src="<?php echo base_url('storage/images/partner-logo.jpg'); ?>" width="100" /> Company</div>
                </div>
                <div class="box-contact form-contact">
                    <form method="post" action="https://www.aluinch.com/sendemail_system.php">
                        <input type="text" name="name" placeholder="Name:" required />
                        <input type="text" name="email" placeholder="Email:" required />
                        <input type="text" name="company" placeholder="Company:" />
                        <input type="text" name="tel" placeholder="Phone:" />
                        <textarea name="detail" placeholder="Message:" required ></textarea>
                        <div style="padding-bottom: 20px;" data-callback="check-captcha" class="g-recaptcha" data-sitekey="6LcVeUYUAAAAADtuawZIutfIUO5U8badCga1I5yL"></div>
                        <input type="submit" id="btn-footer-submit" value="Send Message" style="margin-top: 0px;" />
                    </form>
                    <div class="fb">
                        <a href="http://line.me/ti/p/~ALUMINATION" target="_blank">
                            <img src="<?php echo base_url('storage/images/line-icon.png'); ?>" />
                        </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="https://www.facebook.com/ALUINCH/" target="_blank"><img src="<?php echo base_url('storage/images/fb2.png'); ?>" /></a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="copy mobile">Sitemap | Terms and Conditions</div>
                    <div class="copy mobile">Copyright © 2015 www.aluinch.com All Rights Reserved. SEO maintained by iSEO.in.th</div>
                    <div class="clearfix"></div>
                    <div class="copy-line mobile"></div>
                    <div class="partner mobile">partnership by <span class="yellow">In The Glazz</span> Company</div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="map-canvas" class="map-google"></div>
    </div>
    <!-- end contact -->

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Push Custom Scripts -->
    <script>
        $(function(){
            $("#navi ul li.technology-nav").addClass("active");


            size_li = $("#list-loadmore li").size();
            x=6;
            $('#list-loadmore li:lt('+x+')').show();
            $('#loadmore').click(function () {
//        x= (x+5 <= size_li) ? x+5 : size_li;
//        $('#list-loadmore li:lt('+x+')').show();
                $('#list-loadmore li').show();
                equalheight('#list-loadmore li');
                $("#loadmore").hide();
            });
            $('#showLess').click(function () {
                x=(x-5<0) ? 3 : x-5;
                $('#list-loadmore li').not(':lt('+x+')').hide();
            });
        });
    </script>

    <!-- map -->
    <div class="modal fade" id="map" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border:none">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <img src="<?php echo base_url('storage/images/viewmap.jpg'); ?>" class="img-responsive" />
                </div>
            </div>
        </div>
    </div>
    <!-- map -->
