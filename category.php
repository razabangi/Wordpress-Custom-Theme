<?php get_header() ?>
<?php if ( have_posts() ): ?>
<section class="section bgg">
    <div class="container">    
        <div class="title-area">
            <h2><?php printf( __( 'Category Archive for %s', 'studentlaptop' ), single_cat_title( '', false ) ) ?></h2>
            <?php if ( category_description() ): ?>
                <?php echo '<span class="hidden-xs">' . category_description() . '</span>' ?>
            <?php endif ?>

        </div><!-- /.pull-right -->
    </div><!-- end container -->
</section>
<div class="container sitecontainer bgw">
    <div class="row">
        <div class="col-md-9 col-sm-9 col-xs-12 m22 single-post">
           <div class="widget searchwidget indexslider">
                <?php if ( have_posts() ) : while( have_posts() ) : the_post() ?>
                	<?php get_template_part( 'content', get_post_format() ); ?>	
                <?php endwhile ?>
                <?php else : ?>	
                	<?php get_template_part( 'content-none' ); ?>
                <?php endif ?>
                <!-- end large-widget -->
            </div>
        </div><!-- end col -->
        <?php get_sidebar() ?>
    </div><!-- end row -->
</div>
<?php endif ?>
<?php get_footer() ?>