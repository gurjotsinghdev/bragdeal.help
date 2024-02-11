<?php 
    $boxes = get_sub_field('boxes');

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
<!-- Icon Boxes section start -->
<section class="nhfew-area-area custom-section <?php echo $section_width; ?> page_section_<?php echo $page_section; ?> <?php echo $background; ?> text-<?php echo $text_align; ?> <?php echo $classes; ?>" style="padding-top: <?php echo $padding_top.'px'; ?>; padding-bottom: <?php echo $padding_bottom.'px'; ?>; padding-left: <?php echo $padding_left.'px !important'; ?>; padding-right: <?php echo $padding_right.'px !important'; ?>;">
    <?php 
    if(!empty($boxes)){
        foreach($boxes as $box){
            echo '<div class="nhfew-item" style="background: linear-gradient(0deg, '.$box['background_overlay'].', '.$box['background_overlay'].'), url('.$box['background_image']['url'].'); background-size: cover;" >';
            if(!empty($box['icon'])){
                echo '<div class="icon-holder">'.$box['icon'].'</div>';
            }
            if(!empty($box['heading'])){
                echo '<h5>'.$box['heading'].'</h5>';
            }
            if(!empty($box['content'])){
                echo '<p>'.$box['content'].'</p>';
            }
            if(!empty($box['button']['text'])){
                echo '<a href="'.$box['button']['link'].'" target="'.$box['button']['target'].'" class="btn-style">'.$box['button']['text'].'</a>';
            }
            echo '</div>';
        }
    }
    ?>
</section>
<div class="clearfix"></div>
<!-- Icon Boxes section end -->