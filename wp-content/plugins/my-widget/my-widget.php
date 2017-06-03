<?php 
/*
Plugin Name: 	My Widget
Plugin URI: 	http://innctech
Description: 	This plugin adds widget in your page or post
Version:		1.0.0
Author: 		Innctech Team Member (Saras)
Author URI:		http://innctech.com
License:    	GPL2
License URI:    https://www.gnu.org/licenses/gpl-2.0.html
*/

//namespace a\b\c;

//class SA_Widget extends \WP_Widget{
class SA_Widget extends WP_Widget{

	public function __construct(){
		parent:: __construct(
			//'a\b\c\SA_Widget',
			'SA_Widget',
			__('Sample SA Widget','sa_widget_domain'),
			array('description'=>__('Add Widget Anywhere','sa_widget_domain'))
			);
	}


	public function widget($args,$instance){
		$title = apply_filters('widget_title',$instance['title']) ;

		$description = (!empty($instance['description'])) ? $instance['description']:'' ;
		$description = apply_filters('widget_text',$instance['description']) ;

		echo $args['before_widget'] ;
		if(!empty($title)){
			echo $args['before_title'] . $title . "<br>" . $args['after_title'];
			
		}
		 echo  $description;

		echo $args['after_widget'] ;
		/*if(!empty($description )){
			echo $args['before_title'] . $description . "<br>" . $args['after_title'];
			echo "<br>" ;
		}*/
		
		
	}

	public function form($instance){

		if(isset($instance['title'])){
			$title = $instance['title'] ;
		}
		
?>
	<p>
	<label for="<?php echo $this->get_field_id('title') ?>"> <?php _e('Title') ?> </label>
	<br>
	<input type="text" class="" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title') ?>" value="<?php echo esc_attr($title) ?>" >
	</p>
	<label for="<?php echo $this->get_field_id('description') ?>"><?php _e('Description')?></label>
	<p>
	<textarea rows="10" column="15" id="<?php echo $this->get_field_id('description') ?>" name="<?php echo $this->get_field_name('description') ?>"> <?php echo esc_textarea($instance['description']) ?> </textarea>
	
	</p>
<?php

	}

	public function update($new_instance, $old_instance){
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '' ;
		$instance['description'] = (!empty($new_instance['description'])) ? strip_tags($new_instance['description']) : '' ;

		return $instance ;
	}

	
}

/*function register_sa_widget(){
	register_widget('SA_Widget') ;
}
add_action('widgets_init','register_sa_widget') ;*/

function register_sa_widget() {
    //register_widget('a\b\c\SA_Widget');
    register_widget('SA_Widget');
}

add_action('widgets_init', 'register_sa_widget');


/*class My_Widget extends WP_Widget {
 
    public function __construct() {
        // widget actual processes
        WP_Widget::__construct( string $id_base, string $name, array $widget_options = array(), array $control_options = array() )
    }
 
    public function form( $instance ) {
        // outputs the options form on admin
    }
 
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
    }
 
    public function widget( $args, $instance ) {
        // outputs the content of the widget
    }
 
}
function method_name() {
	register_widget( 'child_class_name' );
}
add_action( 'widgets_init', 'method_name' );

*/
