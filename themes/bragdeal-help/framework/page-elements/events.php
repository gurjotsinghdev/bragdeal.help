<?php
    $heading       = get_sub_field('heading');
    $events        = get_sub_field('events');
    $button        = get_sub_field('button');
    
    $show          = $events['show'];
    $no_of_events  = $events['number_of_events'];
    $offset        = $events['offset'];
    $order         = $events['order'];
    $select_events = $events['select_events'];
    $type          = $events['type'];
    $year          = $events['year'];
    $chapter       = $events['chapter'];
    $style         = $events['style'];
    
    $styling       = get_sub_field('styling');

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

    // Column
    $column = $styling['column'];

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

	if(!empty($type)){
        $type = array('taxonomy' => 'event_type', 'field' => 'term_id', 'terms' => $type);
	} else {
		$type = '';
	}

	if(!empty($year)){
        $year = array('taxonomy' => 'event_year', 'field' => 'term_id', 'terms' => $year);
	} else {
		$year = '';
	}

    // If show all events
    if($show == 'all'){
        $args = array(
            'post_type'      => 'im_events',
            'posts_per_page' => $no_of_events,
            'orderby'        => 'date',
            'order'          => $order,
            'offset'         => $offset,
            'status'         => 'publish',
            'tax_query'      => array(),
            'meta_query'     => array(), // Initialize meta_query
        );
        
        if (!empty($type)) {
            $args['tax_query'][] = array(
                'taxonomy' => 'event_type',
                'field'    => 'term_id',
                'terms'    => $type,
            );
        }
        
        if (!empty($year)) {
            $args['tax_query'][] = array(
                'taxonomy' => 'event_year',
                'field'    => 'term_id',
                'terms'    => $year,
            );
        }
        
        if (!empty($chapter)) {
            $args['meta_query'][] = array(
                'key'     => 'assign_chapter',
                'value'   => $chapter,
                'compare' => '=',
            );
        }        
        
    } else {
        $args = array(
            'post_type'      => 'im_events',
            'post__in'       => $select_events,
            'status'         => 'publish',
        );
    }
    
    $query = new WP_Query($args);
   
    if($style == 'style1'){
        include 'events/style1.php';
    }
    if($style == 'style2'){
        include 'events/style2.php';
    }
    if($style == 'style3'){
        include 'events/style3.php';
    }
    if($style == 'style4'){
        include 'events/style4.php';
    }
  
?>