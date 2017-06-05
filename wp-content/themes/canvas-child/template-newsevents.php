<?php
/**
 * Template Name: News & Events
 *
 * The News & Events page template displays your all latest news and latest events. 
 *
 * @package WooFramework
 * @subpackage Template
 */

  get_header();
  global $woo_options; the_post();
  $event_category = get_post(get_post_meta( get_the_ID(), "latest-event", true ));
?>
    <!-- #content Starts -->
	<?php woo_content_before(); ?>
    <div class="news-events-container">
    	<div class="main">
        	<div class="left-content">
            	<div class="news">
                	<h1>Latest Events</h1>
                    <ul>
                     <?php 
                    
                     print_r($event_category); die;
                        $args = array($event_category,'post_type'   => 'post', 'post_status' => 'publish');
                  
                        $query = new WP_Query($args);
                        if (  $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
                     ?>     
                    	<li>
                        	<div class="item">
                            	<div class="imagebox">
                                	<!-- <img src="<?php //echo get_stylesheet_directory_uri(); ?>/images/img-news-events01.png" alt="" /> -->
                                    <?php the_post_thumbnail();?>
                                </div>
                                <div class="info">
                                	<!-- <h2>Readable content of when looking at its layout.</h2> -->
                                     <h2><?php the_title() ; ?></h2>
                                    <p>
                                    <?php echo "hello"; the_content() ; ?>
                                    <!-- There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour or randomised words which don't look even slightly believable. --></p>
                                </div>
                            </div>
                        </li>

                    <?php endwhile ; 
                            endif ; ?>
<!--                         <li>
                        	<div class="item">
                            	<div class="imagebox">
                                	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img-news-events02.png" alt="" />
                                </div>
                                <div class="info">
                                	<h2>Readable content of when looking at its layout.</h2>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour or randomised words which don't look even slightly believable.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                        	<div class="item">
                            	<div class="imagebox">
                                	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img-news-events03.png" alt="" />
                                </div>
                                <div class="info">
                                	<h2>Readable content of when looking at its layout.</h2>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour or randomised words which don't look even slightly believable.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                        	<div class="item">
                            	<div class="imagebox">
                                	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img-news-events04.png" alt="" />
                                </div>
                                <div class="info">
                                	<h2>Readable content of when looking at its layout.</h2>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour or randomised words which don't look even slightly believable.</p>
                                </div>
                            </div>
                        </li> -->
                    </ul>
                </div>
            	<div class="news">
                	<h1>Latest News</h1>
                    <ul>
                     <?php 
                        $args = array('cat' => 'Latest News','post_type'   => 'post', 'post_status' => 'publish');
                  
                        $query = new WP_Query($args);
                        if (  $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
                     ?>
                    	<li>
                        	<div class="item">
                            	<div class="imagebox">
                                	<!-- <img src="<?php //echo get_stylesheet_directory_uri(); ?>/images/img-news-events01.png" alt="" /> -->
                                    <?php the_post_thumbnail();?>
                                </div>
                                <div class="info">
                                	<!-- <h2>Readable content of when looking at its layout.</h2> -->
                                    <h2><?php the_title() ; ?></h2>
                                    <p>
                                    <?php the_excerpt() ; ?>
                                    <!-- There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour or randomised words which don't look even slightly believable. --></p>
                                </div>
                            </div>
                        </li>
                          <?php endwhile ; 
                            endif ; ?>
                       <!--  <li>
                        	<div class="item">
                            	<div class="imagebox">
                                	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img-news-events02.png" alt="" />
                                </div>
                                <div class="info">
                                	<h2>Readable content of when looking at its layout.</h2>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour or randomised words which don't look even slightly believable.</p>
                                </div>
                            </div>
                        </li> -->
                   	</ul>
                </div>
           	</div>

             <?php //woo_main_after(); ?>
            <!--  <div class="clearfix"></div> -->
            <div class="right-sidebar">
            <?php get_sidebar() ; ?>

            </div>
            <?php get_sidebar('right') ; ?>
           <!--  <div class="right-sidebar">
            	<div class="popular-events">
                	<h1>Popular Events</h1>
                	<div class="item">
                    	<div class="imagebox">
                        	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img-news-events01.png" alt="" />
                        </div>
                        <div class="info">
                        	<h3>It is a long established fact that a reader will.</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="item">
                    	<div class="imagebox">
                        	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img-news-events02.png" alt="" />
                        </div>
                        <div class="info">
                        	<h3>It is a long established fact that a reader will.</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="item">
                    	<div class="imagebox">
                        	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img-news-events03.png" alt="" />
                        </div>
                        <div class="info">
                        	<h3>It is a long established fact that a reader will.</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="popular-news">
                	<h1>Popular News</h1>
                	<div class="item">
                    	<div class="imagebox">
                        	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img-news-events01.png" alt="" />
                        </div>
                        <div class="info">
                        	<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="links">
                        	<ul>
                            	<li>There are many variations of passages of Lorem Ipsum.</li>
                                <li>There are many variations of passages of Lorem Ipsum.</li>
                                <li>There are many variations of passages of Lorem Ipsum.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="item">
                    	<div class="imagebox">
                        	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img-news-events02.png" alt="" />
                        </div>
                        <div class="info">
                        	<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="links">
                        	<ul>
                            	<li>There are many variations of passages of Lorem Ipsum.</li>
                                <li>There are many variations of passages of Lorem Ipsum.</li>
                                <li>There are many variations of passages of Lorem Ipsum.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="item">
                    	<div class="imagebox">
                        	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img-news-events03.png" alt="" />
                        </div>
                        <div class="info">
                        	<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="links">
                        	<ul>
                            	<li>There are many variations of passages of Lorem Ipsum.</li>
                                <li>There are many variations of passages of Lorem Ipsum.</li>
                                <li>There are many variations of passages of Lorem Ipsum.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
 -->            <div class="clearfix"></div>
        </div>
    </div>
	<?php woo_content_after(); ?>

<?php get_footer(); ?>
