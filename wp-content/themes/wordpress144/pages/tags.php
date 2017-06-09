<?php 
/*
 	template name: 标签云
*/
get_header();
?>
<div class="pagewrapper clearfix">
	<aside class="pagesidebar">
		<ul class="pagesider-menu">
			<?php echo str_replace("</ul></div>", "", ereg_replace("<div[^>]*><ul[^>]*>", "", wp_nav_menu(array('theme_location' => 'pagemenu', 'echo' => false)) )); ?>
		</ul>
	</aside>
	<div class="pagecontent">
		<header class="pageheader clearfix">
			<h1 class="pull-left">
				<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
			</h1>
			<div class="pull-right">
				<?php deel_share() ?>
			</div>
		</header>
		<ul class="tag-clouds">
			<?php $tags_list = get_tags('orderby=count&order=DESC');
			if ($tags_list) { 
				foreach($tags_list as $tag) {
					echo '<li><a class="btn btn-mini" href="'.get_tag_link($tag).'">'. $tag->name .'</a><strong>x '. $tag->count .'</strong><br>'; 
					$posts = get_posts( "tag_id=". $tag->term_id ."&numberposts=1" );
					if( $posts ){
						foreach( $posts as $post ) {
							setup_postdata( $post );
							echo '<a href="'.get_permalink().'">'.get_the_title().'</a><br><span class="muted">'.get_the_time('Y-m-d').'</span class="muted">';
						}
					}
					echo '</li>';
				} 
			} 
			?>
		</ul>
	</div>
</div>
<?php get_footer(); ?>