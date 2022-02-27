<!-- BEGIN HEADER HERE -->
<?php get_header(); ?>
<!-- END HEADER HERE -->

        <div class="container sitecontainer bgw">
            <?php get_template_part( 'partials/news' ) ?>
            <!-- end row -->
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <?php get_template_part( 'partials/slider' ) ?>
                    <!-- end property-slider -->

                    <div class="widget searchwidget indexslider">
                        <?php if ( have_posts() ) : while( have_posts() ) : the_post() ?>
                        	<?php get_template_part( 'content', get_post_format() ); ?>	
                        <?php endwhile ?>
                        <?php else : ?>	
                        	<?php get_template_part( 'content-none' ); ?>
                        <?php endif ?>
                        <!-- end large-widget -->
                        <?php // echo studentlaptop_numbered_pagination() ?>
                        <?php echo studentlaptop_paging_nav(); ?>
                    </div>
                    <!-- end widget -->

                    <div class="widget">
                        <div class="widget-title">
                            <h4>Latest Laptops</h4>
                            <hr>
                        </div>
                        <!-- end widget-title -->

                        <div class="reviewlist review-posts row m30">
                            <div class="post-review col-md-4 col-sm-12 first">
                                <div class="post-media entry">
                                    <a href="#" title="">
                                        <img src="<?php echo IMAGES ?>/latest-laptop/latest-laptop-1.jpg" alt="" class="img-responsive">
                                        <div class="magnifier">
                                        </div>
                                    </a>
                                </div>
                                <!-- end media -->
                                <div class="post-title">
                                    <h3><a href="#">Lenovo Ideapad 310-15ISK</a></h3>
                                </div>
                                <!-- end post-title -->
                            </div>
                            <!-- end post-review -->

                            <div class="post-review col-md-4 col-sm-12">
                                <div class="post-media entry">
                                    <a href="single-review.html" title="">
                                        <img src="<?php echo IMAGES ?>/latest-laptop/latest-laptop-2.jpg" alt="" class="img-responsive">
                                        <div class="magnifier">&nbsp;</div>
                                        <!-- end magnifier -->
                                    </a>
                                </div>
                                <!-- end media -->
                                <div class="post-title">
                                    <h3><a href="#">Lenovo Ideapad 310-15ISK</a></h3>
                                </div>
                                <!-- end post-title -->
                            </div>
                            <!-- end post-review -->

                            <div class="post-review col-md-4 col-sm-12 last">
                                <div class="post-media entry">
                                    <a href="single-review.html" title="">
                                        <img src="<?php echo IMAGES ?>/latest-laptop/latest-laptop-3.jpg" alt="" class="img-responsive">
                                        <div class="magnifier">&nbsp;</div>
                                        <!-- end magnifier -->
                                    </a>
                                </div>
                                <!-- end media -->
                                <div class="post-title">
                                    <h3><a href="#">Lenovo Ideapad 310-15ISK</a></h3>
                                </div>
                                <!-- end post-title -->
                            </div>
                            <!-- end post-review -->

                            <div class="post-review col-md-4 col-sm-12 first">
                                <div class="post-media entry">
                                    <a href="single-review.html" title="">
                                        <img src="<?php echo IMAGES ?>/latest-laptop/latest-laptop-4.jpg" alt="" class="img-responsive">
                                        <div class="magnifier">&nbsp;</div>
                                        <!-- end magnifier -->
                                    </a>
                                </div>
                                <!-- end media -->
                                <div class="post-title">
                                    <h3><a href="#">Lenovo Ideapad 310-15ISK</a></h3>
                                </div>
                                <!-- end post-title -->
                            </div>
                            <!-- end post-review -->

                            <div class="post-review col-md-4 col-sm-12">
                                <div class="post-media entry">
                                    <a href="single-review.html" title="">
                                        <img src="<?php echo IMAGES ?>/latest-laptop/latest-laptop-5.jpg" alt="" class="img-responsive">
                                        <div class="magnifier">&nbsp;</div>
                                        <!-- end magnifier -->
                                    </a>
                                </div>
                                <!-- end media -->
                                <div class="post-title">
                                    <h3><a href="single-review.html">Apple Watch available on Apple Stores! Did you buy?</a></h3>
                                </div>
                                <!-- end post-title -->
                            </div>
                            <!-- end post-review -->

                            <div class="post-review col-md-4 col-sm-12 last">
                                <div class="post-media entry">
                                    <a href="single-review.html" title="">
                                        <img src="<?php echo IMAGES ?>/latest-laptop/latest-laptop-6.jpg" alt="" class="img-responsive">
                                        <div class="magnifier">&nbsp;</div>
                                        <!-- end magnifier -->
                                    </a>
                                </div>
                                <!-- end media -->
                                <div class="post-title">
                                    <h3><a href="single-review.html">London Tover Review (Sure in Digital Industrial)</a></h3>
                                </div>
                                <!-- end post-title -->
                            </div>
                            <!-- end post-review -->

                        </div>

                    </div>
                    <!-- end widget -->

                    <div class="widget searchwidget indexslider">&nbsp;</div>
                    <!-- end widget -->

                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="widget">
                                <div class="ads-widget">
                                    <a href="#"><img src="<?php echo IMAGES ?>/ads/ads-970-90.jpg" alt="" class="img-responsive"></a>
                                </div>
                                <!-- end ads-widget -->
                            </div>
                            <!-- end widget -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                </div>
                <!-- end col -->

                <!-- BEGIN SIDEBAR HERE -->
                <?php get_sidebar() ?>
                <!-- END SIDEBAR HERE -->


            </div>
            <!-- end row -->
        </div>
        <!-- end container -->

        <!-- BEGIN FOOTER HERE -->
        <?php get_footer() ?>
        <!-- END FOOTER HERE -->