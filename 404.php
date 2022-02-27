<?php get_header() ?>
<section class="section bgg">
            <div class="container">
                <div class="title-area">
                    <h2><?php _e( '404 Page', 'studentlaptop' ); ?></h2>
                </div>
                <!-- /.pull-right -->
            </div>
            <!-- end container -->
        </section>

        <div class="container sitecontainer bgw">
            <div class="row">
                <div class="col-md-12 m22 single-post">
                    <div class="widget">
                        <div class="large-widget m30">
                            <div class="post-desc">

                                <div class="page-404-content">
                                    <div class="row">
                                        <div class="col-sm-6 hidden-xs">
                                            <img alt="404-page" src="<?php echo IMAGES ?>/image-404.jpg">
                                        </div>
                                        <div class="col-sm-6 col-xs-12">
                                            <h2>
                                            <?php _e( '404', 'studentlaptop' ); ?>
                                            <span><?php _e( 'Error!', 'studentlaptop' ) ?></span>
                                            </h2>
                                            <p>
                                            <?php _e( "Sorry, we can't find the page you are looking for. <br><br>", 'studentlaptop' ); ?> 
                                            <a href="/">Home </a> <?php __( 'or search something from search form.', 'studentlaptop' ); ?>
                                            <?php get_search_form() ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- end post-desc -->
                        </div>
                        <!-- end large-widget -->
                    </div>
                    <!-- end widget -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
<?php get_footer() ?>