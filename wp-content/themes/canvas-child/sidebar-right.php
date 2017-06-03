 <div class="right-sidebar">
            	<div class="popular-events">
                	<h1>Popular Events</h1>
                    <?php

                    $popularpost = new WP_Query( array( 'post_type'=>'event', 'posts_per_page' => 3 ) );
                        if($popularpost->have_posts() ) :
                        while ( $popularpost->have_posts() ) : $popularpost->the_post();
                    ?>
                	<div class="item">
                    	<div class="imagebox">
                             <?php 
                             if ( has_post_thumbnail()) {
                               $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                               //echo '<img src="' . $image_url[0] . '" title="' . the_title_attribute('echo=0') . '" width="260px" height="218px" >';
                             }
                             ?>
                              <img src="<?php echo $image_url[0] ; ?>" alt="" />
                        	<!-- <img src="<?php //echo get_stylesheet_directory_uri(); ?>/images/img-news-events01.png" alt="" /> -->
                        </div>
                        <div class="info">
                        	<!-- <h3>It is a long established fact that a reader will.</h3> -->
                            <h3><?php the_title() ; ?> </h3>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                <?php endwhile ; endif ;  ?>
                    <!-- <div class="item">
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
                    </div> -->
                </div>
                <div class="popular-news">
                	<h1>Popular News</h1>
                    <?php

                    $popularpost = new WP_Query( array( 'post_type'=>'news', 'posts_per_page' => 3 ) );
                        if($popularpost->have_posts() ) :
                        while ( $popularpost->have_posts() ) : $popularpost->the_post();
                    ?>
                	<div class="item">
                    	<div class="imagebox">
                            <?php 
                             if ( has_post_thumbnail()) {
                               $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                               //echo '<img src="' . $image_url[0] . '" title="' . the_title_attribute('echo=0') . '" width="260px" height="218px" >';
                             }
                             ?>
                             <img src="<?php echo $image_url[0] ; ?>" alt="" />
                        	<!-- <img src="<?php //echo get_stylesheet_directory_uri(); ?>/images/img-news-events01.png" alt="" /> -->
                        </div>
                        <!-- <div class="info"> -->
                            <?php the_content() ; ?>
                        	<!-- <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p> -->
                      <!--   </div> -->
                      <!--   <div class="clearfix"></div>
                        <div class="links">
                        	<ul>
                            	<li>There are many variations of passages of Lorem Ipsum.</li>
                                <li>There are many variations of passages of Lorem Ipsum.</li>
                                <li>There are many variations of passages of Lorem Ipsum.</li>
                            </ul>
                        </div> -->
                    </div>
                <?php endwhile; 
                        endif ; 
                ?>
                   <!--  <div class="item">
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
                    </div> -->
                </div>
            </div>
