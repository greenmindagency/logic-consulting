<?php get_header(); // This fxn gets the header.php file and renders it ?>


    <!-- jarallax image -->
 
    <div data-jarallax data-speed="0.2"  class="bg-dark jarallax">

    <?php $image = get_field('mainimage', 2); if( !empty( $image ) ):
  
   $size = 'large';
            $width = $image['sizes'][ $size . '-width' ];
            $height = $image['sizes'][ $size . '-height' ];
   ?> 
      
      <img  src="<?php echo $image['sizes']['large']; //fire the image as a large size?>" class="jarallax-img" alt="<?php bloginfo('name'); ?>" width="<?php echo $width?>" height="<?php echo $height?>" loading="lazy">
      
      <?php endif; ?>
      
      
    <div class="col-12 p-5 text-white text-center">
	
	
   <h1 class="card-title display-2">404 Page Not Found</h1>
    </div>
</div>
    
    <!-- jarallax image --> 



 <div class="container">
      <div class="row">

<h2 class="display-5 my-5 ">Latest Posts</h2>
           
          </div>
		  
	
       <?php query_posts('showposts=12'); ?>   
       <?php while ( have_posts() ) : the_post(); ?>
    <?php include get_theme_file_path( '/loop.php' ); //load loop.php ?>
  
    
    <?php endwhile; ?>
   
   <?php bittersweet_pagination(); // get the pagination ?>  
 
</div>
        
      
	  
             
    
        
        
        




<?php get_footer(); // This fxn gets the footer.php file and renders it ?>