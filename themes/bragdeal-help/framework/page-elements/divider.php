<?php 
	$height = get_sub_field('height');
	if(empty($height)){
		$height = 40;
	}
    $background = get_sub_field('background');

	$page_section = $args['page_section'];
?>
<section class="divider-section page_section_<?php echo $page_section; ?>" style="height: <?php echo $height ?>px; width: 100%; background: <?php echo $background; ?>;"></section>
<div class="clr"></div>