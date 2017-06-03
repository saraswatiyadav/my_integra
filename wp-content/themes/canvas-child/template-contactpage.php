<?php
/**
 * Template Name: Contact Page
 *
 * The contact form page template displays the a
 * simple contact form in your website's content area.
 *
 * @package WooFramework
 * @subpackage Template
 */

get_header();
global $woo_options;
?>
	<?php woo_content_before(); ?>
	<div class="contact-us-container">
    	<div class="main">
        	<div class="contact-us-title">
                <h1><span>Cont</span>act</h1>
            </div>
            <?php the_content() ; ?>
        	<!-- <div class="contact-us">
            	<ul>
                	<li>
                    	<div class="item">
                        	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-contact01.png" alt="" />
                            <h4>Accounting</h4>
                            <a href="javascript:;">accounting@innctech.com</a>
                        </div>
                    </li>
                    <li>
                    	<div class="item">
                        	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-contact02.png" alt="" />
                            <h4>Product Support</h4>
                            <a href="javascript:;">support@innctech.com</a>
                        </div>
                    </li>
                    <li>
                    	<div class="item">
                        	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-contact03.png" alt="" />
                            <h4>Sales Inquiries</h4>
                            <a href="javascript:;">sales@innctech.com</a>
                        </div>
                    </li>
                    <li>
                    	<div class="item">
                        	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-contact04.png" alt="" />
                            <h4>Shipping &amp; Receiving</h4>
                            <a href="javascript:;">shipping@innctech.com</a>
                        </div>
                    </li>
                </ul>	
          	</div>
            <div class="address">
            	<div class="info">
                	<h4>Address</h4>
                    <h5>Integra Traffice Services Ltd.</h5>
                    <p>3454, Lorum Ipsum, Telecup Services, Lorum Ipsum, 564854</p>
                    <h5>Phone</h5>
                    <p>123-456-789-000</p>
                    <h5>Fax</h5>
                    <p>123-456-789-000</p>
                    <h5>Email</h5>
                    <p>info@innctech.com</p>
                </div>
          	</div> -->
            <div class="google-map">
            	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1398.1343491517782!2d-73.57315097198742!3d45.50466936896623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc91a467b0e97af%3A0xf70fad31d8d8c2b8!2sGroupe+Conseil+Amar+inc!5e0!3m2!1sen!2sca!4v1479566628595" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
	<?php woo_content_after(); ?>

<?php get_footer(); ?>