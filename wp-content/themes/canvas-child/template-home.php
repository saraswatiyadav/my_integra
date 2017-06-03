<?php
/**
 * Template Name: Home
 *
 * The business page template displays your posts with a "business"-style
 * content slider at the top.
 *
 * @package WooFramework
 * @subpackage Template
 */

global $woo_options, $wp_query , $post ;
get_header();

$page_template = woo_get_page_template();
?>
    <!-- #content Starts -->
	<?php woo_content_before(); ?>
	<div class="home-banner">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img-banner.jpg" alt="" />
        <div class="info">
            <div class="main">
            	<div class="banner">
                	<div class="banner-title">
                        <h1><span>Integra</span> Traffic</h1>
                        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    </div>
                    <div class="button-container">
                        <!-- <a href="<?php //the_permalink(); ?>" class="btn">Explore More</a> -->
                    </div>
                </div>
           	</div>
        </div>
    </div>
    <div class="home-about">
    	<div class="main">
        	<div class="imagebox">
            	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img-home-about.jpg" alt="" />
            </div>
            <div class="info">
                 <?php 
                $args = array('page_id'=>'109' , 'post_type'   => 'page', 'post_status' => 'publish');
          
                $query = new WP_Query($args);
                if (  $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 


                ?>
            	<div class="about-title">
                	<!-- <h1><span>About</span> Us</h1> -->
                    <h1><span><?php the_title() ; ?></span> </h1>
                </div>
               
                <div class="about-info">
                    <?php  

                      $excerpt=get_the_excerpt(); 
                      $text=string_limit_words_more($excerpt,53);
                      echo $text;   
                     ?>
                	<!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p> -->
                </div>
            <?php 
            endwhile ; 
            endif ;
            ?>
                <div class="button-container">
                    <!-- <a href="javascript:;" class="btn">Read More</a> -->
                    <a href="<?php the_permalink(); ?>" class="btn">Read More</a>
                    
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="home-featured-product">
    	<div class="main">
             <?php 
                $args = array('post_type'   => 'feature', 'post_status' => 'publish');
          
                $query = new WP_Query($args);
                if (  $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
             ?>
        	<div class="featured-product-title">
            	<!-- <h1><span>Featured</span> Product</h1> -->
                <h1><span><?php the_title() ; ?></span> </h1>
            </div>
            <div class="info">
            <?php  
                 /*$excerpt=get_the_content(); 
                 $text=string_limit_words_more($excerpt,53);
                 echo $text;   */
            ?>
            <p><?php the_content() ; ?></p>
            	<!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p> -->
            </div>
            <div class="imagebox">
                <?php the_post_thumbnail() ; ?>
            	<!-- <img src="<?php //echo get_stylesheet_directory_uri(); ?>/images/img-featured-product.jpg" alt="" /> -->
            </div>
             <?php 
            endwhile ; 
            endif ;
            ?>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="home-products">
        <div class="main">
            <div class="products-title">
                <h1><span>Prod</span>ucts</h1>
            </div>
            <div class="button-container">
            	
                <!-- <a href="javascript:;" class="btn">View All Products</a> -->
              <!--   <a href="http://innctech.ga/integra/product-category/gator-patch-fiber-c/" class="btn">View All Products</a> -->
              <?php $id = get_post(310) ; ?>
                <a href="<?php echo get_permalink($id); ?>" class="btn">View All Products</a>

            </div>
            <div class="clearfix"></div>
            <div class="info">
                <p><?php the_content($post->ID); ?><!-- There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc. --></p>
            </div>
            <div class="products">
                <ul>
                <?php 
                $args = array('post_type'   => 'product', 'post_status' => 'publish', 'order_by'=>'ASC','posts_per_page'=>'6');
          
                $query = new WP_Query($args);
                if (  $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
                ?>
                    <li>
                        <div class="item">
                        <?php the_post_thumbnail();?>
                           <!--  <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/products/img-product01.png" alt="" /> -->
                            <div class="item-content">
                            	<div class="item-info">
                                   <!-- 
                                    <h3>Gator Patch</h3> -->
                                     <h3><?php the_title() ; ?></h3>
                                  <!--   <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p> -->
                                  <?php the_content() ; ?>
                                    <a href="javascript:;" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </li>

                     <?php 
            endwhile ; 
            endif ;
            ?>
                   <!--  <li>
                        <div class="item">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/products/img-product02.png" alt="" />
                            <div class="item-content">
                            	<div class="item-info">
                                    <h3>EZ Navigator APS System</h3>
                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                                    <a href="javascript:;" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/products/img-product03.png" alt="" />
                            <div class="item-content">
                            	<div class="item-info">
                                    <h3>Traffic Signal Hardware</h3>
                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                                    <a href="javascript:;" class="btn">Read More</a>
                              	</div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/products/img-product04.png" alt="" />
                            <div class="item-content">
                            	<div class="item-info">
                                    <h3>Sky Bracket</h3>
                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                                    <a href="javascript:;" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/products/img-product05.png" alt="" />
                            <div class="item-content">
                            	<div class="item-info">
                                    <h3>Wells Signs</h3>
                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                                    <a href="javascript:;" class="btn">Read More</a>
                             	</div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item">
                        	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/products/img-product06.png" alt="" />
                            <div class="item-content">
                            	<div class="item-info">
                                    <h3>Solar Traffic Controls</h3>
                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                                    <a href="javascript:;" class="btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
	<div class="home-news-events">
        <div class="main">
            <div class="news-events-title">
                <h1><span>News</span> &amp; Events</h1>
            </div>
            <div class="button-container">
            	<!-- <a href="javascript:;" class="btn">View All News</a> -->
                <a href="<?php echo site_url('news-events'); ?>" class="btn">View All News</a>

               
            </div>
            <div class="clearfix"></div>
            <div class="news-events">
            	<ul>
                <?php 
                $args = array('cat' => 'Latest Events', 'posts_per_page'=>'3','post_status' => 'publish','order_by'=>'ASC');
          
                $query = new WP_Query($args);
                //print_r($query);
                if (  $query->have_posts() ) : 
                    while ( $query->have_posts() ) : $query->the_post(); 
                ?>
                	<li>
                    	<div class="item">
                        	<div class="imagebox">
                            	<!-- <img src="<?php //echo get_stylesheet_directory_uri(); ?>/images/img-news-events.jpg" alt="" /> -->
                                <?php the_post_thumbnail() ; ?>
                            </div>
                            <div class="info">
                            	<!-- <h4>Where can I get some</h4> -->
                                <h4><?php the_title() ; ?></h4>
                                <?php  
                                  $excerpt=get_the_excerpt(); 
                                  $text=string_limit_words_more($excerpt,20);
                                     
                                 ?>
                                <!-- <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p> -->
                                <p> <?php echo $text; ?></p>
                            </div>
                            <div class="read-more">
                            	<!-- <a href="javascript:;" class="btn">Read More</a> -->
                                  <?php //$id = get_post(145) ; ?>
                                <a href="<?php the_permalink() ; //echo get_permalink($id); ?>" class="btn">Read More</a>
                            </div>
                        </div>
                    </li>
                <?php endwhile ; 
                        endif ; ?>
                   <!--  <li>
                    	<div class="item">
                        	<div class="imagebox">
                            	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img-news-events.jpg" alt="" />
                            </div>
                            <div class="info">
                            	<h4>Where can I get some</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            </div>
                            <div class="read-more">
                            	<a href="javascript:;" class="btn">Read More</a>
                            </div>
                        </div>
                    </li>
                    <li>
                    	<div class="item">
                        	<div class="imagebox">
                            	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img-news-events.jpg" alt="" />
                            </div>
                            <div class="info">
                            	<h4>Where can I get some</h4>
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            </div>
                            <div class="read-more">
                            	<a href="javascript:;" class="btn">Read More</a>
                            </div>
                        </div>
                    </li> -->
                </ul>
            </div>
      	</div>
   	</div>
    <?php woo_content_after(); ?>
<?php get_footer(); ?>