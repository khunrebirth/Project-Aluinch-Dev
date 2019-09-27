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
                            <?php echo $contact_info->address; ?>
                        </div>
                    </div>
                    <div class="media box-c">
                        <div class="media-left media-middle">
                            <img class="media-object" src="<?php echo base_url('storage/images/c3.png'); ?>">
                        </div>
                        <div class="media-body" style="padding-top:5px;">
                            <a href="mailto:<?php echo $contact_info->email; ?>"> <?php echo $contact_info->email; ?></a>
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
                            <a href="tel:022863666"><?php echo $contact_info->tel; ?></a>
                        </div>
                    </div>
                    <div class="media box-c">
                        <div class="media-left media-middle">
                            <img class="media-object" src="<?php echo base_url('storage/images/c4.png'); ?>">
                        </div>
                        <div class="media-body" style="padding-top:5px;">
                            <?php echo $contact_info->web; ?>
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
                <form action="<?php echo base_url('contact/send'); ?>" method="POST">
                    <input type="text" name="name" placeholder="Name:" required />
                    <input type="text" name="email" placeholder="Email:" required />
                    <input type="text" name="company" placeholder="Company:" />
                    <input type="text" name="tel" placeholder="Phone:" />
                    <textarea name="detail" placeholder="Message:" required ></textarea>
                    <div style="padding-bottom: 20px;" class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div>
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
    <!-- <div id="map-canvas" class="map-google"></div> -->
</div>
