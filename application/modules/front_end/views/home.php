    <!-- Push Style -->
    <link rel="stylesheet" href="<?php echo base_url('resources/front_end/css/owl.carousel.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('resources/front_end/css/style.css'); ?>">

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
                                    <img src="<?php echo base_url('storage/uploads/images/portfolios/' . $portfolio->img); ?>" class="img-responsive" atl="<?php echo $portfolio->img_title_alt; ?>"/>
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
                                        <img src="<?php echo base_url('storage/uploads/images/portfolios/' . $portfolio->img); ?>" class="img-responsive" atl="<?php echo $portfolio->img_title_alt; ?>"/>
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
        <div class="bg-mobile visible-xs">
            <div class="text" style="top:45%"></div>
        </div>
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
                                    <p><?php echo $product->description; ?></p>
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
                <div id="arrow-techno-l-p1" class="arrow-left"><img src="<?php echo base_url('storage/images/arrow-left.png'); ?>"/></div>
                <div id="arrow-techno-r-p1" class="arrow-right"><img src="<?php echo base_url('storage/images/arrow-right.png'); ?>"/></div>
                <h2>PRESENTATION VDO วีดีโอแนะนำการใช้งาน</h2>
                <div class="owl-techno1">
                    <?php foreach ($technologies['vdos'] as $vdo) {?>
                        <div class="item vdo-lightbox" data-val="pZFeraPjm4s">
                            <img src="<?php echo $vdo->img_cover; ?>" alt="<?php echo $vdo->img_title_alt; ?>"/>
<!--                            <img src="--><?php //echo base_url('storage/uploads/images/technology' . $vdo->img_cover); ?><!--" alt="--><?php //echo $vdo->img_title_alt; ?><!--"/>-->
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
                <div id="arrow-techno-l-p2" class="arrow-left"><img src="<?php echo base_url('storage/images/arrow-left.png'); ?>"/></div>
                <div id="arrow-techno-r-p2" class="arrow-right"><img src="<?php echo base_url('storage/images/arrow-right.png'); ?>"/></div>
                <h2>TIPS AND TRICKS เกร็ดความรู้อลูมิเนียม</h2>
                <div class="owl-techno2">
                    <?php foreach ($technologies['tips'] as $tip) {?>
                        <div class="item vdo-lightbox" data-val="pZFeraPjm4s">
                            <img src="<?php echo $tip->img_cover; ?>" alt="<?php echo $tip->img_title_alt; ?>"/>
                            <!--                            <img src="--><?php //echo base_url('storage/uploads/images/technology' . $tip->img_cover); ?><!--" alt="--><?php //echo $vdo->img_title_alt; ?><!--"/>-->
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
                <div id="arrow-project-l-p1" class="arrow-left"><img src="<?php echo base_url('storage/images/arrow-left.png'); ?>"/></div>
                <div id="arrow-project-r-p1" class="arrow-right"><img src="<?php echo base_url('storage/images/arrow-right.png'); ?>"/></div>
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
            <div class="see-more"><a href="https://www.aluinch.com/project-references">SEE MORE</a></div>
        </div>
    </div>
    <!-- end section5 -->

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
                    <div class="copy desktop">
                        Copyright © 2015 www.aluinch.com All Rights Reserved. Site by <a href="http://www.polardevgroup.com" target="_blank">Polardev</a>
                    </div>
                    <div class="copy-line desktop"></div>
                    <div class="partner desktop">partnership by <img src="<?php echo base_url('storage/images/partner-logo.jpg'); ?>" width="100"/> Company</div>
                </div>

                <!-- contact -->
                <div class="box-contact form-contact">
                    <form action="<?php echo base_url('contact-us/send'); ?>" method="POST">
                        <input type="text" name="name" placeholder="Name:" required />
                        <input type="text" name="email" placeholder="Email:" required />
                        <input type="text" name="company" placeholder="Company:" />
                        <input type="text" name="tel" placeholder="Phone:" />
                        <textarea name="detail" placeholder="Message:" required ></textarea>
                        <div style="padding-bottom: 20px;" class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div>
                        <input type="submit" value="Send Message" style="margin-top: 0px;" />
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
        <!-- <div id="map-canvas" class="map-google"></div> -->
    </div>
    <!-- end section6 -->

    <!-- term -->
<!--    <div class="modal fade" id="term" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">-->
<!--        <div class="modal-dialog" role="document">-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header" style="border:none">-->
<!--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>-->
<!--                    </button>-->
<!--                </div>-->
<!--                <div class="modal-body sitemap-main">-->
<!--                    <h5>TERMS AND CONDITIONS</h5>-->
<!--                    <div class="line"></div>-->
<!--                    บริษัท อลูมิเนชั่น จำกัด ขอทำความเข้าใจเกี่ยวกับการใช้บริการเว็บไซด์ของบริษัท-->
<!--                    โดยบริษัทมีนโยบายในการคุ้มครองข้อมูลส่วนบุคคล ของผู้ใช้บริการทุกท่านโดยสังเขปดังนี้-->
<!--                    <br/>-->
<!--                    <br/>-->
<!--                    <strong>อมูลส่วนบุคคล (Privacy notes)</strong>-->
<!--                    <br/> ข้อมูลส่วนบุคคลที่ท่านได้ให้ไว้ หรือใช้ผ่านการประมวลผลของเครื่องคอมพิวเตอร์-->
<!--                    ที่ควบคุมการทำงานของเว็บไซด์ของบริษัท ทั้งหมดนั้น ท่านยอมรับ และตกลงว่าเป็นสิทธิ และกรรมสิทธิ์ของบริษัท-->
<!--                    ซึ่งบริษัทจะให้ความคุ้มครองความลับ ดังกล่าวอย่างดี ที่สุด อย่างไรก็ตาม-->
<!--                    เพื่อความปลอดภัยในข้อมูลส่วนบุคคลของท่าน ท่านควรปฏิบัติตามข้อกำหนด และเงื่อนไขในการใช้เว็บไซต์-->
<!--                    ของบริษัทอย่างเคร่งครัด ในกรณีที่ข้อมูลส่วนบุคคลดังกล่าวถูกจารกรรมโดยวิธีการทางอิเล็กทรอนิกส์ (hack)-->
<!--                    หรือสูญหาย เสียหายอันเนื่องจากเหตุสุดวิสัย หรือไม่ว่ากรณีใดๆ-->
<!--                    ถือเป็นความเสี่ยงภัยของท่านเองที่จะต้องระมัดระวังใน การใช้ข้อมูลของท่าน บริษัทขอสงวนสิทธิในการปฏิเสธ-->
<!--                    ความรับผิดจากเหตุดังกล่าวทั้งหมด-->
<!--                    <br/>-->
<!--                    <br/>-->
<!--                    <strong>ลิขสิทธิ์ตามกฎหมาย (Copyrights)</strong>-->
<!--                    <br/> บริษัทขอแจ้งให้ผู้เข้าชมเว็บไซต์โดยทั่วไปทราบว่า ข้อความ ภาพ เสียง เนื้อหาใดๆ ทั้งหมดบนเว็บไซต์-->
<!--                    รวมทั้งเครื่องหมาย การค้า-->
<!--                    ชื่อทางการค้าที่ปรากฏบนเว็บไซต์ของบริษัทเป็นทรัพย์สินทางปัญญาของบริษัทโดยชอบทำตามกฏหมาย หากบุคคลใด-->
<!--                    ลอกเลียน ปลอมแปลง ทำซ้ำ ดัดแปลง เผยแพร่ต่อสาธารณชน จำหน่าย มีไว้ให้เช่าหรือกระทำการใดๆ ในลักษณะที่เป็น-->
<!--                    การแสวงหาประโยชน์ทางการค้าหรือประโยชน์โดยมิชอบ ไม่ว่าโดยประการใดๆ กับทรัพย์สินทางปัญญาของบริษัทดังกล่าง-->
<!--                    ข้างต้น โดยที่ทางบริษัทไม่ได้อนุญาตอย่างถูกต้องตามระเบียบของบริษัท-->
<!--                    ทางบริษัทจะดำเนินการตามกฏหมายกับผู้ละเมิดสิทธิ ดังกล่าวโดยทันที-->
<!--                    <br/>-->
<!--                    <br/>-->
<!--                    <strong>การจำกัดความรับผิด</strong>-->
<!--                    <br/> ผู้เข้าชมเว็บไซต์ทราบและยอมรับว่า การใช้บริการผ่านเว็บไซด์ของบริษัท-->
<!--                    ถือเป็นความเสี่ยงของผู้ใช้บริการแต่เพียงผู้เดียว บริษัทจะไม่รับ ผิดชอบต่อความเสียหายใดๆ-->
<!--                    ไม่ว่าโดยทางตรงหรือทางอ้อม ความเสียหายอันเป็นผลต่อเนื่อง ความเสียหายเชิงลงโทษ การสูญเสีย กำไร ผลประโยชน์-->
<!--                    ข้อมูล หรือความสูญเสียอื่นๆ ทั้งที่จับต้องได้และที่ไม่สามารถจับต้องได้-->
<!--                    อันเป็นผลอันเนื่องมาจากการใช้บริการ การส่งต่อข้อมูล หรือการเข้ามาใช้บริการโดยไม่ได้รับอนุญาต-->
<!--                    หรือเนื้อหาสาระใดๆ ที่เกี่ยวข้องกับบริการ-->
<!--                    <div class="clearfix"></div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <!-- end term -->

    <!-- sitemap -->
<!--    <div class="modal fade" id="sitemap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">-->
<!--        <div class="modal-dialog" role="document">-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header" style="border:none">-->
<!--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>-->
<!--                    </button>-->
<!--                </div>-->
<!--                <div class="modal-body sitemap-main">-->
<!--                    <h5>SITEMAP</h5>-->
<!--                    <div class="line"></div>-->
<!--                    <ul>-->
<!--                        <li><a href="https://www.aluinch.com/">HOME</a></li>-->
<!--                        <li><a href="https://www.aluinch.com/product">PRODUCTS</a></li>-->
<!--                        <li><a href="https://www.aluinch.com/technology">TECHNOLOGY</a></li>-->
<!--                        <li class="box"><a href="https://www.aluinch.com/project-references">PROJECT REFERENCES</a></li>-->
<!--                        <li class="box"><a href="https://www.aluinch.com/contact-us">CONTACT US</a></li>-->
<!--                    </ul>-->
<!--                    <div class="clearfix"></div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

    <!-- map -->
<!--    <div class="modal fade" id="map" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">-->
<!--        <div class="modal-dialog" role="document">-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header" style="border:none">-->
<!--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>-->
<!--                    </button>-->
<!--                </div>-->
<!--                <div class="modal-body">-->
<!--                    <img src="--><?php //echo base_url('storage/images/viewmap.jpg'); ?><!--" class="img-responsive"/>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <!-- end map -->

    <!-- project-ref -->
    <div class="warp-light-box">
        <div class="bg-black"></div>
        <div class="main-lb">
            <div class="close-lb"><img src="<?php echo base_url('storage/images/product/close.png'); ?>"/></div>
            <div id="ajax-result"></div>
        </div>
    </div>
    <!-- end project-ref -->

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
                    skrollr.init();
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
                    url: urlGetProjectRef + '/' + $id + '/' + 'home',
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
