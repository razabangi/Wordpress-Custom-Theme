<?php get_header() ?>
<?php if ( have_posts() ) : ?>
<section class="section bgg">
    <div class="container">    
        <div class="title-area">
            <?php 
                if ( is_day() ) 
                {
                    printf( __( '<h2> Daily Archive for %s </h2>', 'studentlap'), get_the_date() );
                } elseif ( is_month() ) {
                    printf( __( '<h2> Montly Archive for %s </h2>', 'studentlap'), get_the_date( _x( 'F Y', 'Monthly Archive Date format', 'studentlap') ) );
                } elseif ( is_year() ) {
                    printf( __( '<h2> Yearly Archive for %s </h2>', 'studentlap'), get_the_date( _x( 'Y', 'Yearly Archive Date format', 'studentlap') ) );  
                } else {
                    _e( ' <h2>Archive </h2>', 'studentlap');
                }
            ?>
            
        </div><!-- /.pull-right -->
    </div><!-- end container -->
</section>
<?php endif ?>
<div class="container sitecontainer bgw">
    <div class="row">
        <div class="col-md-9 col-sm-12">
            <div class="widget searchwidget indexslider">
                <?php if ( have_posts() ) : while( have_posts() ) : the_post() ?>
                    <?php get_template_part( 'content' ) ?>
                <?php endwhile ?>   
                <?php else : ?>
                    <?php get_template_part( 'content', 'none') ?>
                <?php endif ?>
            </div>
            <!-- end widget -->

         </div>
        <!-- end col -->

        <!-- BEGIN SIDEBAR HERE -->
        <?php get_sidebar(); ?>
        <!-- END SIDEBAR HERE -->

        <!-- end col -->

    </div>
    <!-- end row -->
</div>

<?php get_footer() ?>