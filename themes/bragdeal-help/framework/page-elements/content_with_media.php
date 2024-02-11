<?php 
    $subheading = get_sub_field('subheading');
    $heading = get_sub_field('heading');
    $content = get_sub_field('content');
    $image = get_sub_field('image');
    $image_style = get_sub_field('image_style');
    $image_position = get_sub_field('image_position');

    $button = get_sub_field('button');

    $video_popup = get_sub_field('video_popup');

    $styling = get_sub_field('styling');

    // Section padding
    $padding = $styling['padding'];
    $padding_top = $padding['top'];
    if(empty($padding_top)){ $padding_top = 0;}
    $padding_right = $padding['right'];
    if(empty($padding_right)){ $padding_right = 0;}
    $padding_bottom = $padding['bottom'];
    if(empty($padding_bottom)){ $padding_bottom = 0;}
    $padding_left = $padding['left'];
    if(empty($padding_left)){ $padding_left = 0;}

    // Section Background
    $background = $styling['background'];

    // Section width
    $section_width = $styling['section_width'];
    if($section_width == 'boxed'){
        $section_width = 'container';
        $row = 'row';
    } else {
        $section_width = 'container-fluid px-0';
        $row = 'row gx-0';
    }

    // Extra classes
    $classes = $styling['classes'];

    // Text align
    $text_align = $styling['text_align'];

	$page_section = $args['page_section'];

    if($image_style == 'style1'){
      include 'content-with-media/style1.php';
    }
    if($image_style == 'style2'){
        include 'content-with-media/style2.php';
    }
    if($image_style == 'style3'){
        include 'content-with-media/style3.php';
    }

?>