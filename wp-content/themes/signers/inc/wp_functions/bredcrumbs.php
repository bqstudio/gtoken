<?php
/*
Gets an unordered list of page ancestors.

$post_id = the id of the post to get the ancestors for. If not set, the current post in the loop is used.
$last_item_link = if true, the last item in the list will be a link to the current page. If false, it will be text.
*/
function palermo_breadcrumbs( $post_id = '', $last_item_link = false ) {

	global $post;

	if ( !empty($post_id) ) {
		$ancestors =  get_post_ancestors( $post_id) ;	
	} else {
		$ancestors =  get_post_ancestors( $post) ;
		$post_id = $post->ID;
	}
	
	foreach ($ancestors as $postid) {
		?>
		<li>
		<a href="<?php echo get_permalink($postid); ?>">
			<?php echo get_the_title($postid); ?>
		</a>
		</li>
		<?php
	}

	if ( !empty($post_id) ) {
		$title =  get_the_title($post_id);
	} else {
		$title =  get_the_title();
	}

	echo '<li>';

	if ( !$last_item_link ) {
		echo $title;
	} else {
		echo '<a href="'.get_permalink($post_id).'">'.$title.'</a>';
	}
	
	echo '</li>';
}