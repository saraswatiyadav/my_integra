<?php
/**
 * Template Name: About
 *
 * The About page template displays the description about Integra Traffic.
 *
 * @package WooFramework
 * @subpackage Template
 */

 get_header();
 global $woo_options;
  global $YWAR_AdvancedReview;
  global $product;
?>


    <!-- #content Starts -->
	<?php woo_content_before(); ?>
    <div class="about-us-container">
    	<div class="about-us-grey"></div>
    	<div class="main">
        	<div class="about-us">
            	<div class="imagebox">
                	<h2>The Integra Group</h2>
                    <?php the_post_thumbnail();?>
                    <!-- <img src="<?php //echo get_stylesheet_directory_uri(); ?>/images/img-about.png" alt="" /> -->
                </div>
                <div class="info">
                <?php the_content() ; echo "hello";

/*$reviews_count = count( $YWAR_AdvancedReview->get_product_reviews_by_rating( $product->id ) );
echo "number of reviews" . $reviews_count ;

$YWAR_AdvancedReview->reviews_list( $product->id ); 
echo $YWAR_AdvancedReview->reviews_list( $product->id ) . "<br>"; 

$reviews_count = count( get_product_reviews_by_rating( $woo_options->id ) );
echo $reviews_count ;

*/
                
                ?>

                

                	<!-- <h1>We Make Safe Traffic for you</h1>
                    <p>here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>
                    <p>f you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat.</p>
                    <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat.</p>
                    <p>here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p> -->
                </div>
                <div class="clearfix"></div>

       
           <?php 

             
//$id = $product->id;
//$wpcounts = comments_number();
//echo $wpcounts ;
//$id = get_current_user();
//$id = get_comment_ID() ;

//print_r($id) ;

/*$id = $woo_options->ID ;

$defaults = $comment_id; 

$com= get_comment($defaults ); 
echo $com ;*/
$ll =  get_the_ID();
echo "<br>" ."Id : " .$ll . "<br>" ;

$args = array ('post_type' => 'product', 'post_id' => $com);
//$args = array ('post_type' => 'product',);
$comments = get_comments( $args );
wp_list_comments( array( 'callback' => 'woocommerce_comments' ), $comments);
$count = count( $product->id); 

//////////////////////
/*$author  = get_user_by( 'id', $product->post->post_author );

echo $author ;*/
echo "The Author Name : " ; the_author() ;

/////////////////////
product_vendors_tab_content_after();


/////////////////////

   
////////////////////
/*$value = comments_template();
echo $value ;*/

//echo comments_template();

              ?>


            </div>
        </div>
    </div>
	<?php woo_content_after(); ?>

<?php get_footer(); ?>
