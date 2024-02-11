<?php 
    $title = get_sub_field('title');
    if(empty($title)){
        $title = get_the_title();
    }

    $image = get_sub_field('image');

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
    $background_image = $styling['background_image'];
    $background_overlay = $styling['background_overlay'];

    // Section width
    $section_width = $styling['section_width'];
    if($section_width == 'boxed'){
        $section_width = 'container';
        $row = 'row';
    } else {
        $section_width = 'container-fluid px-0';
        $row = 'row gx-0';
    }

    // Text aligh
    $text_align = $styling['text_align'];
    
    $page_section = $args['page_section'];
    
?>
    <!-- Title start -->
    <section class="sub-banner custom-section <?php echo $section_width; ?> page_section_<?php echo $page_section; ?> <?php echo $background; ?> text-<?php echo $text_align; ?> <?php echo $classes; ?>" style="padding-top: <?php echo $padding_top.'px'; ?>; padding-bottom: <?php echo $padding_bottom.'px'; ?>; padding-left: <?php echo $padding_left.'px !important'; ?>; padding-right: <?php echo $padding_right.'px !important'; ?>;">
      <div class="img-area">
        <?php 
        if(!empty($background_image)){
            echo '<img src="'.$background_image['url'].'" alt="">';
        }
        ?>
      </div>
      <div class="sub-banner-text">
        <?php
            if(!empty($image)){
                echo '<img src="'.$image['url'].'" alt="">';
            }
            if(!empty($title)){
                echo '<h1>'.$title.'</h1>';
            }
        ?>
      </div>
    </section>
    <div class="clr"></div>
    <!-- Title end -->