<?php 
    $subheading = get_sub_field('subheading');
    $heading = get_sub_field('heading');
    $content = get_sub_field('content');
    $contact_info = get_sub_field('contact_info');
    $shortcode = get_sub_field('shortcode');

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

    // Text align
    $text_align = $styling['text_align'];

    $page_section = $args['page_section'];
  
?>
    <!-- Contact section start -->
	<section class="contact custom-section <?php echo $section_width; ?> page_section_<?php echo $page_section; ?> <?php echo $background; ?> text-<?php echo $text_align; ?> <?php echo $classes; ?>" style="padding-top: <?php echo $padding_top.'px'; ?>; padding-bottom: <?php echo $padding_bottom.'px'; ?>; padding-left: <?php echo $padding_left.'px !important'; ?>; padding-right: <?php echo $padding_right.'px !important'; ?>;">
      <div class="cont-text">
        <?php 
        if(!empty($content)){
            echo $content;
        }
        if(!empty($heading)){
            echo '<h1>'.$heading.'</h1>';
        }
        if(!empty($contact_info)){
            foreach($contact_info as $info)
            echo '<p class="d-flex align-items-center"><i class="'.$info['icon'].'"></i> '.$info['content'].'</p>';
        }
        ?>
      </div>
      <div class="contact-form-area">
        <?php echo do_shortcode('[contact-form-7 id="9ad12ce" title="Contact form"]'); ?>
      </div>
    </section>
	<div class="clearfix"></div>
	<!-- Contact section end -->