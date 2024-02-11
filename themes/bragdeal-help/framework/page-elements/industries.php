<?php
    $industries        = get_sub_field('industries');
    $button            = get_sub_field('button');
    
    $show              = $industries['show'];
    $no_of_industries  = $industries['number_of_industries'];
    $order             = $industries['order'];
    $select_industries = $industries['select_industries'];

    $style             = $industries['style'];
    
    $styling           = get_sub_field('styling');

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
    
    // Section background
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

    $page_section = $args['page_section'];

    // If show all industries
    if($show == 'all'){
        $args = array(
            'post_type'      => 'im_industries',
            'posts_per_page' => $no_of_industries,
            'orderby'        => 'date',
            'order'          => $order,
            'status'         => 'publish',
        );
    } else {
        $args = array(
            'post_type'      => 'im_industries',
            'post__in'       => $select_industries,
            'status'         => 'publish',
        );
    }
    
    $query = new WP_Query($args);
   
    if($style == 'style1'){
        include 'industries/style1.php';
    }
  
?>