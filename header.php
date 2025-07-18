<?php
	/*-----------------------------------------------------------------------------------*/
	/* This template will be called by all other template files to begin 
	/* rendering the page and display the header/nav
	/*-----------------------------------------------------------------------------------*/
?> 
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">




<?php wp_head(); ?>






<?php if (have_rows('contactdetails', 2)) : ?>
    <?php while (have_rows('contactdetails', 2)) : the_row(); ?>
        <?php 
		
		$telephone = get_sub_field('telephone');
		$price_range = get_sub_field('price_range');
		$street_address = get_sub_field('street_address');
		$city = get_sub_field('city');
		$region = get_sub_field('region');
		$country = get_sub_field('country');
?>
       
		
		
		
		
		
		
<script type="application/ld+json">{"@context":"https://schema.org","@type":"Organization","name":"<?php bloginfo('name'); ?>","url":"<?php echo esc_url(get_home_url()); ?>/","logo":"<?php $image = get_field('logo' , 2); if( !empty($image) ): echo $image['sizes']['large']; endif; ?>","contactPoint":{"@type":"ContactPoint","telephone":"<?php echo esc_html($telephone); ?>","contactType":"Customer Service"},"address":{"@type":"PostalAddress","streetAddress":"<?php echo esc_html($street_address); ?>","addressLocality":"<?php echo esc_html($city); ?>","addressRegion":"<?php echo esc_html($region); ?>","addressCountry":"<?php echo esc_html($country); ?>"}, "sameAs":[<?php if( have_rows('social_media', 2) ) : $links = []; while( have_rows('social_media', 2) ) : the_row(); $links[] = get_sub_field('link'); endwhile; echo '"' . implode('", "', $links) . '"'; endif; ?>]}</script>



  
<script type="application/ld+json">{"@context":"https://schema.org","@graph":[{"@type":"LocalBusiness","name":"<?php bloginfo('name'); ?>","image":"<?php $image = get_field('logo' , 2); if( !empty($image) ): echo $image['sizes']['large']; endif; ?>","telephone":"<?php echo esc_html($telephone); ?>","priceRange":"<?php echo esc_html($price_range); ?>","address":{"@type":"PostalAddress","streetAddress":"<?php echo esc_html($street_address); ?>","addressLocality":"<?php echo esc_html($city); ?>","addressRegion":"<?php echo esc_html($region); ?>","addressCountry":"<?php echo esc_html($country); ?>"}}]}</script>
		
		
		
		
		
    <?php endwhile; ?>
<?php endif; ?>





<?php	// get the tracking repeater

if( have_rows('tracking', 2) ):
while( have_rows('tracking', 2) ) : the_row();
$headcode = get_sub_field('head_code');
$bodycode = get_sub_field('body_code');
?>

<?php echo $headcode ?>

<?php endwhile; else : endif; //get the tracking repeater ?>






<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />



  </head>
  <body>

<?php	// get the tracking repeater

if( have_rows('tracking', 2) ):
while( have_rows('tracking', 2) ) : the_row();
$headcode = get_sub_field('head_code');
$bodycode = get_sub_field('body_code');
?>

<?php echo $bodycode ?>

<?php endwhile; else : endif; //get the tracking repeater ?>

    
	
	
        
	
        
     
<nav class="navbar fixed-top navbar-expand-lg 

<?php 
$menu_color = get_field('menu_color', 2); // Get from current page/post

if ($menu_color == 'black') { 
    echo 'menu-dynamic bg-dark text-white';
} elseif ($menu_color == 'transparent') { 
    echo 'menu-dynamic bg-transparent text-white';
} elseif ($menu_color == 'white') { 
    echo 'menu-dynamic shadow bg-light';
} else { 
    echo '';
}
?>">

	  
	  
	  
	  
	  
	  
  <div class="container-fluid">
   <a class="me-5 navbar-brand my-2" href="<?php bloginfo( 'url' ); ?>">
   
   
<?php 
$logoblack = get_field('logo' , 2);
$logolight = get_field('logo_light' , 2);
 ?>
   
<?php
// Get the image size dynamically
$image = $logoblack;
$size = 'medium';

// Ensure image data exists
if (!empty($image) && isset($image['sizes'][$size])) {
    $image_url = $image['sizes'][$size];
    $width = isset($image['sizes'][$size . '-width']) ? $image['sizes'][$size . '-width'] : null;
    $height = isset($image['sizes'][$size . '-height']) ? $image['sizes'][$size . '-height'] : null;
    $fixed_height = 40;

    // Calculate proportional width if dimensions are valid
    if ($width && $height) {
        $new_width = round(($fixed_height / $height) * $width);
    }
}

?>




<?php 

    $menu_color = get_field('menu_color', 2); // Retrieve the value of the 'menu_color' field

    if ($menu_color == 'black') {  ?>
          
<img class="logo d-inline-block align-top" src="<?php echo $logolight['sizes']['medium']; ?>" width="<?php echo esc_attr($new_width); ?>" height="<?php echo esc_attr($fixed_height); ?>" title="<?php bloginfo('name'); ?> Logo" alt="<?php bloginfo('name'); ?> Logo" />

  <?php   } elseif ($menu_color == 'transparent') {  ?>
  
  <img class="logo d-inline-block align-top" src="<?php echo $logolight['sizes']['medium']; ?>" width="<?php echo esc_attr($new_width); ?>" height="<?php echo esc_attr($fixed_height); ?>" title="<?php bloginfo('name'); ?> Logo" alt="<?php bloginfo('name'); ?> Logo" />
       
 <?php    } else {  ?>
 
 <img class="logo d-inline-block align-top" src="<?php echo $logoblack['sizes']['medium']; ?>" width="<?php echo esc_attr($new_width); ?>" height="<?php echo esc_attr($fixed_height); ?>" title="<?php bloginfo('name'); ?> Logo" alt="<?php bloginfo('name'); ?> Logo" />
 
        
  <?php   }  ?>




   
   
   
      
    </a>
    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	
	
	<?php wp_nav_menu( array(
  
    'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
    'container'       => 'ul',
    'container_class' => 'collapse navbar-collapse',
    'container_id'    => 'bs-example-navbar-collapse-1',
    'menu_class'      => 'navbar-nav me-auto mb-2 mb-lg-0',
    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
    'walker'          => new WP_Bootstrap_Navwalker(),
) ); ?>
	
	
      
      <div class="d-flex">
        
      
<form class="is-search-form is-ajax-search me-3" action="<?php echo esc_url(home_url('/')); ?>" method="get" role="search">
    <div class="input-group">
        <input type="search" name="s" class="form-control  p-1 ps-3 is-search-input" placeholder="Search" autocomplete="on">
        <button type="submit" class="btn btn-secondary">
            <span>
<i class="text-white fa fa-search"></i>
            </span>
        </button>
    </div>
</form>
        
        
       
       
       
       
 
       	<!-- shorten url -->
<a class="btn copy-to-clipboard btn-outline-primary  bg-light" data-clipboard-text='<?php
function tiny_url($url){
    return file_get_contents("https://tinyurl.com/api-create.php?url=" . $url);
}
$url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
echo tiny_url($url);
?>'><i class=" text-dark  fa fa-link"></i></a> 
<!-- shorten url -->
   
        
		
		<a href="<?php bloginfo( 'url' ); ?>/ar/" class="ms-3 btn btn-primary">ع</a> 
		
		
        </div>
        
    </div>
  </div>



</nav>