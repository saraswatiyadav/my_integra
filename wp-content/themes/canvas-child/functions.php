<?php 

//Filter to display excerpt in pages like posts
add_post_type_support('page','excerpt');



//we can add php code by this function what we have to display in text widget in wordpress
function php_execute($html){
if(strpos($html,"<"."?php")!==false){ ob_start(); eval("?".">".$html);
$html=ob_get_contents();
ob_end_clean();
}
return $html;
}
add_filter('widget_text','php_execute',100);

//Display content in limits

function string_limit_words_more($string, $word_limit)
{ 
 global $post;
 global $authordata;
     $words = explode(' ', $string, ($word_limit + 1));
       if(count($words) > $word_limit) {
       array_pop($words);
       //add a ... at last article when more than limit word count
       echo implode(' ', $words); 
       } else {
       
       echo implode(' ', $words); }
}

//Code To disable add to cart button on pages
//add_filter( 'woocommerce_is_purchasable', false );


// Custom Post type Latest Event 


function custom_post_type_event()
{
	$labels=array(
		
			'name'=>_x('Event','Post Type General Name','canvas-child'),
			'singular_name'=>_x('Event','Post Type Singular Name','canvas-child'),
			'menu_name'=>__('Event','canvas-child'),
			'parent_item_colon'=>__('Parent Events','canvas-child'),
			'all_items'=>__('All Event','canvas-child'),
			'view_item'=>__('View Events','canvas-child'),
			'add_new_item'=>__('Add New Event','canvas-child'),
			'add_new'=>__('Add New', 'canvas-child'),
			'edit_item'=>__('Edit Event','canvas-child'),
			'update_item'=>__('Update Events','canvas-child'),
			'search_items'=>__('Search Event','canvas-child'),
			'not_found'=>__('Not Found','canvas-child'),
			'not_found_in_trash'=>__('Not Found In Trash','canvas-child')
		);
	$args =array(

			'label'=>__('events','canvas-child'),
			'labels'=>$labels,
			'supports'=>array('title','editor','excerpt','author','thumbnail','comments','revisions', 'custom-fields','post-formats'),
				
			//'taxonomies'=>array('category', 'post_tag'),
			'hierarchical'=>false,
			'public'=>true, 
			'show_ui'=>true, 
			'show_in_menu'=>true,
			'show_in_nav_menus'=>true,
			'show_in_admin_bar'=>true,
			'menu_position'=>5,
			'can_export'=>true,
			'has_archive'=>true,
			'exclude_from_search'=>false,
			'publicly_queryable'=>true,
			'capability_type'=>'page',
		);

	register_post_type('event',$args);
}
add_action('init', 'custom_post_type_event');



// Custom Post type Latest News 


function custom_post_type_news()
{
	$labels=array(
		
			'name'=>_x('News','Post Type General Name','canvas-child'),
			'singular_name'=>_x('News','Post Type Singular Name','canvas-child'),
			'menu_name'=>__('News','canvas-child'),
			'parent_item_colon'=>__('Parent News','canvas-child'),
			'all_items'=>__('All News','canvas-child'),
			'view_item'=>__('View News','canvas-child'),
			'add_new_item'=>__('Add New News','canvas-child'),
			'add_new'=>__('Add New', 'canvas-child'),
			'edit_item'=>__('Edit News','canvas-child'),
			'update_item'=>__('Update News','canvas-child'),
			'search_items'=>__('Search News','canvas-child'),
			'not_found'=>__('Not Found','canvas-child'),
			'not_found_in_trash'=>__('Not Found In Trash','canvas-child')
		);
	$args =array(

			'label'=>__('news','canvas-child'),
			'labels'=>$labels,
			'supports'=>array('title','editor','excerpt','author','thumbnail','comments','revisions', 'custom-fields','post-formats'),
				
			//'taxonomies'=>array('category', 'post_tag'),
			'hierarchical'=>false,
			'public'=>true, 
			'show_ui'=>true, 
			'show_in_menu'=>true,
			'show_in_nav_menus'=>true,
			'show_in_admin_bar'=>true,
			'menu_position'=>5,
			'can_export'=>true,
			'has_archive'=>true,
			'exclude_from_search'=>false,
			'publicly_queryable'=>true,
			'capability_type'=>'page',
		);

	register_post_type('news',$args);
}
add_action('init', 'custom_post_type_news');


// Function to display popular post by views

function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);

    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}



//add_action( 'product_vendors_tab_content_after' , 'display_vendor_fields', 2, 10 );
/**
 * display_vendor_fields
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/
/*function display_vendor_fields( $vendor_ID, $product_ID ) {
	
	$vendor     = get_vendor( $vendor_ID );
	$commission = $vendor->commission;
	
	echo 'Commission: ' . $commission . '%';
	
}
*/




?>