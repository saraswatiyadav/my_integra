<?php
/**
 * Template Name: Support
 *
 * The Support page template displays technical support and contact details... 
 *
 * @package WooFramework
 * @subpackage Template
 */

 global $woo_options; 
 global $post ;
 get_header();

?>
   	<?php woo_content_before(); ?>
    <div class="support-container">
    	<div class="support-info">
        	<div class="main">
            	<div class="support-info-title">
                	<h1><span>Supp</span>ort</h1>
                </div>
                <div class="imagebox">
                 <?php the_post_thumbnail();?>
                   <!--  <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/img-support.jpg" alt="" /> -->
                </div>
                <div class="details">
                     <?php the_content() ; ?>
                   <!--  <h2>Technical Product Support</h2>
                   	<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p> -->
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="contact-info">
        	<div class="main">
            	<ul>
                	<li>
                    	<div class="item">
                        	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-support-phone.png" class="show-white" alt="" />
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-support-phone-hover.png" class="show-orange" alt="" />
                            <h4>Phone</h4>
                            <a href="#">123-456-689-000</a>
                        </div>
                    </li>
                    <li>
                    	<div class="item">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-support-fax.png" class="show-white" alt="" />
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-support-fax-hover.png" class="show-orange" alt="" />
                            <h4>Fax</h4>
                            <a href="#">123-456-689-000</a>
                        </div>
                    </li>
                    <li>
                    	<div class="item">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-support-email.png" class="show-white" alt="" />
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-support-email-hover.png" class="show-orange" alt="" />
                            <h4>E-mail</h4>
                            <a href="#">support@innctech.com</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="support-info">
        	<div class="main">
            	<div class="info">
                	<!-- <h2>ITS Experienced Technical Expertise</h2> -->
                    <?php $post_id = 319 ;
                        $post_data = get_post($post_id);
                    ?>
                    <h2><?php echo $post_data->post_title ; ?></h2>
                    <?php echo $post_data->post_content ; ?>
                    <!-- 
                   	<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p> -->
                </div>
            </div>
        </div>
        <div class="business-hours">
        	<div class="main">
            	<ul>
                	<li>
                    	<div class="business-hours-title">
                        	<h1>Business Hours<br/> Pacific Standard Time</h1>
                        </div>
                    </li>
                    <li>
                    	<div class="imagebox">
                        	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-support.png" alt="" />
                        </div>
                    </li>
                    <li>
                    	<div class="hours">
                        <br>
                        <?php echo do_shortcode('[table id=1 /]'); ?>
                        	<!-- <table>
                            	<tbody>
                            		<tr>
                                    	<td>Monday</td>
                                        <td>8:00AM – 4:30PM</td>
                                    </tr>
                                    <tr>
                                    	<td>Tuesday</td>
                                        <td>8:00AM – 4:30PM</td>
                                    </tr>
                                    <tr>
                                    	<td>Wednesday</td>
                                        <td>8:00AM – 4:30PM</td>
                                    </tr>
                                    <tr>
                                    	<td>Thursday</td>
                                        <td>8:00AM – 4:30PM</td>
                                    </tr>
                                    <tr>
                                    	<td>Friday</td>
                                        <td>8:00AM – 4:30PM</td>
                                    </tr>
                                </tbody>
                            </table> -->
                       	</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
	<?php woo_content_after(); ?>

<?php get_footer(); ?>