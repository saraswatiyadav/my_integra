
<?php 

get_header();

the_post();
$post;

?>


<div id="inner">
        
     <div class="sub-header"></div>
     <?php the_content(); ?>
     <?php get_sidebar();?>
	
</div>

<?php get_footer();?>

 