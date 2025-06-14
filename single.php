<?php get_header(); // This fxn gets the header.php file and renders it ?>

     <!-- jarallax image -->
 
    <div data-jarallax data-speed="0.2"  class="bg-secondary jarallax">
      
        <?php $image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "large" ); ?><?php $image_width = $image_data[1]; ?><?php $image_height = $image_data[2];  // get the featuered images width and height ?> 
      
      
      <img loading="lazy" src="<?php the_post_thumbnail_url('large'); ?>" class="jarallax-img" alt="<?php the_title(); ?>" width="<?php echo $image_width; ?>" height="<?php echo $image_height; ?>">
      
	  <div class="container py-spacer">
	  <div class="row">
    <div class="col-12 py-5 text-white">
    <h1 class="fw-bold card-title display-5"><?php the_title(); ?></h1>
	
	
	   <?php 
$description = get_field('description'); 
if ($description): ?>
    <p class="lead my-4"><?php echo $description; ?></p>
<?php endif; ?>



<h2 class="mt-5 fw-bold h5 text-uppercase">
    <?php 
    foreach((get_the_category()) as $category) { 
        if($category->parent != 1) { // load category
            $category_link = get_category_link($category->term_id);
            echo '<a href="' . esc_url($category_link) . '" class="text-decoration-none text-white">'
                . esc_html($category->cat_name) . 
                '</a> ';
        } 
    } 
    ?>
    <i class="ms-3 fa-solid fa-arrow-right-long"></i>
</h2>


	
    
    
    </div>

</div></div>


</div>
    
    <!-- jarallax image --> 

<div class="border-bottom container-fluid bg-light">
<div class="container">
<div class="row">

<div class="col">

<nav class="my-3 d-none d-sm-none d-md-block" aria-label="breadcrumb">

<?php echo do_shortcode('[custom_breadcrumbs]'); ?>

</nav>

</div>


</div>

</div>
</div>


<!-- flixable content -->


<?php if( have_rows('body') ): ?>

<article class="blog-post">

<?php while( have_rows('body') ): the_row(); ?>
<?php include get_theme_file_path( '/flixable.php' ); //load sidebar.php ?>
<?php endwhile; ?>

</article>   

<?php endif; ?>

<!-- flixable content --> 

<?php /* if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

*/ ?>

<?php get_footer(); // This fxn gets the footer.php file and renders it ?>