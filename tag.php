<?php get_header(); // This fxn gets the header.php file and renders it ?>

<!-- jarallax image -->
 
    <?php
        $term       = get_queried_object();
        $use_video  = get_field( 'use_video', $term );
        $video      = get_field( 'video', $term );
        $image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
        $image_width  = $image_data[1];
        $image_height = $image_data[2];
        $image        = get_field( 'image', $term );
    ?>

    <div data-jarallax data-speed="0.2" class="bg-secondary jarallax<?php if ( $use_video && $video ) echo ' video-jarallax'; ?>"<?php if ( $use_video && $video ) echo ' data-jarallax-video="https://www.youtube.com/watch?v=' . esc_attr( $video ) . '"'; ?>>

        <?php if ( ! ( $use_video && $video ) ) : ?>
            <img loading="lazy" src="<?php if ( $image ) { echo $image['sizes']['large']; } else { the_post_thumbnail_url( 'large' ); } ?>" alt="<?php the_title(); ?>" class="jarallax-img" width="<?php echo $image_width; ?>" height="<?php echo $image_height; ?>">
        <?php endif; ?>
	  
	  
      
	  <div class="container py-spacer">
	  <div class="row">
	  
	  
    <div class="col-md-8 py-spacer text-white">
     <?php $term = get_queried_object(); $title = get_field('title', $term);?><?php if( get_field('title', $term) ): ?><h1 class="fw-bold h5"><?php echo $title; ?></h1> <?php endif; ?>
      
      <h2 class="fw-bold card-title display-4 my-3"><?php single_cat_title(); ?></h2>
      
    <?php $term = get_queried_object(); $description = get_field('description', $term);?><?php if( get_field('description', $term) ): ?><p class="lead card-text"><?php echo $description; ?></p><?php endif; ?> 



	<div class="mt-4">
       	  
   <?php 
                $term = get_queried_object();
                $taxonomy = $term->taxonomy;
                $term_id = $term->term_id;  
                if( have_rows('buttons', $taxonomy . '_' . $term_id) ):
                while(have_rows('buttons', $taxonomy . '_' . $term_id)): 
                the_row(); 
            ?> 


  <a class="me-2 btn <?php $color = get_sub_field('color'); if ($color) echo esc_html($color); ?>" href="<?php $link = get_sub_field('link'); if ($link) echo esc_html($link); ?>"><?php $text = get_sub_field('text'); if ($text) echo esc_html($text); ?></a>
  
           
            
            <?php endwhile; endif; ?>  



        </div>
	
	
	
    </div>




</div>
    </div></div>
    <!-- jarallax image --> 


<div class="border-bottom container-fluid bg-light">
<div class="container">
<div class="row">

<div class="col">


<nav class="my-3 d-none d-sm-none d-md-block" aria-label="breadcrumb">
  <div class="d-flex justify-content-between align-items-center">
    
    <!-- Breadcrumb on the left -->
    <div>
      <?php echo do_shortcode('[custom_breadcrumbs]'); ?>
    </div>

    <!-- Share on the right -->
	
<?php
global $wp;

// Get the full URL
$share_url = urlencode( home_url( add_query_arg( array(), $wp->request ) ) );

// Create encoded version for URLs
$share_title =  YoastSEO()->meta->for_current_page()->title;
?>



    <div class="dropdown">
     <button class="btn rounded-0 p-2" type="button" id="shareDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fs-5 fa-share-alt text-primary"></i>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="shareDropdown">
        <li>
          <a class="dropdown-item d-flex align-items-center" href="mailto:?subject=<?php echo $share_title; ?>&body=<?php echo $share_url; ?>">
            <i class="fas fa-envelope me-2 text-primary"></i> Email
          </a>
        </li>
        <li>
          <a class="dropdown-item d-flex align-items-center" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $share_url; ?>" target="_blank" rel="noopener">
            <i class="fab fa-linkedin me-2 text-primary"></i> LinkedIn
          </a>
        </li>
        <li>
          <a class="dropdown-item d-flex align-items-center" href="https://twitter.com/intent/tweet?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>" target="_blank" rel="noopener">
            <i class="fab fa-x-twitter me-2 text-primary"></i> X
          </a>
        </li>
        <li>
          <a class="dropdown-item d-flex align-items-center" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" target="_blank" rel="noopener">
            <i class="fab fa-facebook me-2 text-primary"></i> Facebook
          </a>
        </li>
      </ul>
    </div>

  </div>
</nav>


</div>


</div>

</div>
</div>


<!-- flixable content -->

<?php $term = get_queried_object(); // get the current taxonomy term ?>
<?php if( have_rows('body', $term) ): ?>

<article class="blog-post">	

<?php while( have_rows('body', $term) ): the_row(); ?>
<?php include get_theme_file_path( '/flixable.php' ); //load sidebar.php ?>
<?php endwhile; ?>

</article>   

<?php endif; ?>

<!-- flixable content -->   
    

<?php get_footer(); // This fxn gets the footer.php file and renders it ?>