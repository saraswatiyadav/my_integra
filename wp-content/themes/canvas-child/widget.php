<?php
/*
  Plugin Name: Designmodo Social Profile Widget
  Plugin URI: http://designmodo
  Description: Links to Author social media profile
  Author: Agbonghama Collins
  Author URI: https://designmodo.com
*/

class Designmodo_Social_Profile extends WP_Widget { 

function __construct() {
    parent::__construct(
            'Designmodo_Social_Profile',
            __('Social Networks Profiles', 'translation_domain'), // Name
            array('description' => __('Links to Author social media profile', 'translation_domain'),)
    );
}


public function form($instance) {
        isset($instance['title']) ? $title = $instance['title'] : null;
        empty($instance['title']) ? $title = 'My Social Profile' : null;
 
        isset($instance['facebook']) ? $facebook = $instance['facebook'] : null;
        isset($instance['twitter']) ? $twitter = $instance['twitter'] : null;
        isset($instance['google']) ? $google = $instance['google'] : null;
        isset($instance['linkedin']) ? $linkedin = $instance['linkedin'] : null;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
 
        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>">
        </p>
 
        <p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>">
        </p>
 
        <p>
            <label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('Google+:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" type="text" value="<?php echo esc_attr($google); ?>">
        </p>
 
        <p>
            <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>">
        </p>
 
        <?php
    }


    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        $instance['facebook'] = (!empty($new_instance['facebook']) ) ? strip_tags($new_instance['facebook']) : '';
        $instance['twitter'] = (!empty($new_instance['twitter']) ) ? strip_tags($new_instance['twitter']) : '';
        $instance['google'] = (!empty($new_instance['google']) ) ? strip_tags($new_instance['google']) : '';
        $instance['linkedin'] = (!empty($new_instance['linkedin']) ) ? strip_tags($new_instance['linkedin']) : '';
 
        return $instance;
    }


public function widget($args, $instance) {
 
        $title = apply_filters('widget_title', $instance['title']);
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $google = $instance['google'];
        $linkedin = $instance['linkedin'];
 
// social profile link
        $facebook_profile = '<a class="facebook" href="' . $facebook . '"><i class="fa fa-facebook"></i></a>';
        $twitter_profile = '<a class="twitter" href="' . $twitter . '"><i class="fa fa-twitter"></i></a>';
        $google_profile = '<a class="google" href="' . $google . '"><i class="fa fa-google-plus"></i></a>';
        $linkedin_profile = '<a class="linkedin" href="' . $linkedin . '"><i class="fa fa-linkedin"></i></a>';
 
echo $args['before_widget'];
if (!empty($title)) {
echo $args['before_title'] . $title . $args['after_title'];
}
 
        echo '<div class="social-icons">';
        echo (!empty($facebook) ) ? $facebook_profile : null;
        echo (!empty($twitter) ) ? $twitter_profile : null;
        echo (!empty($google) ) ? $google_profile : null;
        echo (!empty($linkedin) ) ? $linkedin_profile : null;
        echo '</div>';
        echo $args['after_widget'];
}


// register Designmodo_Social_Profile widget
function register_designmodo_social_profile() {
register_widget('Designmodo_Social_Profile');
}
 
add_action('widgets_init', 'register_designmodo_social_profile');




// enqueue css stylesheet
        function designmodo_social_profile_widget_css() {
        wp_enqueue_style('social-profile-widget', plugins_url('designmodo-social-profile-widget.css', __FILE__));
}
        add_action('wp_enqueue_scripts', 'designmodo_social_profile_widget_css');









 }


?>

<style> 

@import "//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css";
.social-icons {
    color: #FFFFFF;
    text-align: center;
    padding-top: 5px;
    position: relative;
    margin: 1px 10px;
}
.social-icons a {
    font-size: 21px;
    padding: 8px 10px 6px;
    color: #FFFFFF;
    margin-bottom: 5px;
    display: inline-block;
    margin: 1px 5px;
    width: 30px;
    height: 30px;
}
 
.social-icons a:hover {
    color: #fff;
    text-decoration: none;
    border-radius: 50%;
}
 
.social-icons .fa-facebook, .social-icons .facebook {
    background: #3B5998;
}
 
.social-icons .fa-twitter, .social-icons .twitter {
    background: #00abe3;
}
 
.social-icons .fa-google, .social-icons .google {
    background: #d3492c;
}
 
.social-icons .fa-linkedin, .social-icons .linkedin {
    background: #01669c;
}



</style>