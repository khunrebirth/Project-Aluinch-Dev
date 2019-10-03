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

    <section id="product" class="main-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="headbar">
                        <div class="triangle"></div>
                        <h2>PRODUCT</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <ul class="list-item">
                        <?php foreach ($list_products as $products) { ?>
                        <li class="product-list <?php if (rawurldecode($this->uri->segment(1)) == 'product' && rawurldecode($this->uri->segment(2)) == $products['group_product_slug']) { echo 'active'; } ?>">
                            <a><?php echo $products['group_product_name']; ?></a>
                            <ul class="sub-list-item">
                                <?php foreach ($products['category_products'] as $category_product) { ?>
                                    <li class="active">
                                        <a href="<?php echo base_url('product/' . $products['group_product_slug'] . '/' . $category_product['category_product_slug'] . '/' . hashids_encrypt($category_product['category_product_id'])); ?>">
                                            <?php echo $category_product['category_product_name']; ?>
                                            <p><?php echo $category_product['category_product_description']; ?></p>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="product-main">
                        <div class="head-item"><?php echo $list_products_specific['group_product_name']; ?></div>
                        <h4><?php echo $list_products_specific['category_product_name'] . ':' . $list_products_specific['category_product_description']; ?></h4>
                        <div class="main-pic">
                            <img src="<?php echo base_url('storage/uploads/images/products/' . $list_products_specific['category_product_img_cover']); ?>" class="img-responsive" alt="<?php echo $list_products_specific['category_product_img_title_alt']; ?>" />
                        </div>
                        <div class="list-pdf">
                            <ul>
                                <li>
                                    <div><a onClick="ga('send', 'event', 'Downloads', 'Click', 'Catalog', '100');" href="#" target="_blank">Download Catalog</a></div>
                                </li>
                                <li>
                                    <div><a href="#" target="_blank">Download Price</a></div>
                                </li>
                                <li>
                                    <div id="cad-form">Download Cad</div>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <ul id="list-loadmore" class="listing">
                            <?php foreach ($list_products_specific['products'] as $product) { ?>
                                <li class="lb-detail" data-code="<?php echo hashids_encrypt($product->id) . '-code'; ?>" data-val="<?php echo hashids_encrypt($product->id); ?>">
                                    <img src="<?php echo base_url('storage/uploads/images/products/' . $product->img); ?>" class="img-responsive img-center" alt="<?php echo $product->img_title_alt; ?>"/>
                                    <div class="clearfix"></div>
                                    <div class="box-topic"><?php echo $product->title; ?></div>
                                    <div class="box-des"><?php echo $product->description_en . ' | ' . $product->description_th; ?></div>
                                    <div class="clearfix"></div>
                                    <div class="viewdetail">
                                        VIEW DETAIL <div class="icon"><img src="<?php echo base_url('storage/images/product/iconview.png'); ?>"/></div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                        <div class="clearfix"></div>
                        <div align="center">
                            <div id="loadmore">Load More</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="product-lightbox warp-light-box">
        <div class="product-lightbox bg-black"></div>
        <div id="product-des" class="main-bl-product">
            <div id="arrow-product-left" class="arrow-left"><i class="glyphicon glyphicon-menu-left"></i></div>
            <div id="arrow-product-right" class="arrow-right"><i class="glyphicon glyphicon-menu-right"></i></div>
            <div class="close-lb"><img src="<?php echo base_url('storage/images/product/close.png'); ?>"/></div>
            <div id="ajax-result"></div>
        </div>
    </div>

    <div class="cad-lightbox warp-light-box">
        <div class="cad-lightbox bg-black"></div>
        <div id="product-cad" class="main-bl-product">
            <div class="close-lb"><img src="<?php echo base_url('storage/images/product/close.png'); ?>"/></div>
            <div class="warp-slide-product">
                <a target="_blank" href="https://line.me/R/ti/p/%40arc6608f">
                    <div><h1>Please scan the QR code below to continue to download CAD.</h1></div>
                    <div style="text-align: center;"><img width="50%" src="<?php echo base_url('storage/images/qr-code.jpg'); ?>"/></div>
                </a>
            </div>
        </div>
    </div>

    <?php include 'layouts/contact.php'; ?>

	<?php include 'layouts/model_term.php'; ?>

	<?php include 'layouts/model_sitemap.php'; ?>

	<?php include 'layouts/model_map.php'; ?>

    <!-- Push Custom Scripts -->
    <script>
        $(document).ready(function () {

            /**********
             * Event
             * **/

            x = 6

            $('#list-loadmore li:lt(' + x + ')').show()

            $('#loadmore').click(function () {
                $('#list-loadmore li').show()
                equalheight('#list-loadmore li')
                $("#loadmore").hide()
            })

            $('#showLess').click(function () {
                x = (x - 5 < 0) ? 3 : x - 5
                $('#list-loadmore li').not(':lt(' + x + ')').hide()
            })

            $(".lb-detail").on('click', function () {

                let urlGetProduct = "<?php echo base_url('ajax/get/product'); ?>"
                let $id = $(this).data("val");

                $(".product-lightbox").addClass("show-black");
                $(".product-lightbox").addClass("show-black");
                $("body,html").addClass("overflow-hidden");

                $.ajax({
                    type: 'GET',
                    url: urlGetProduct + '/' + $id,
                    success: function (res) {
                        $('#ajax-result').html(res.data);
                    },
                    error: function (data) {
                        console.log("error");
                    }
                });
            });
        })
    </script>
