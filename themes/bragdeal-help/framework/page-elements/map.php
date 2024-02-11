<?php 
    $heading = get_sub_field('heading');
    $content = get_sub_field('content');

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

    // Text aligh
    $text_align = $styling['text_align'];

    $page_section = $args['page_section'];

    
?>
<!-- Map start -->
<section class="map-section custom-section page_section_<?php echo $page_section; ?> text-<?php echo $text_align; ?> <?php echo $background; ?> <?php echo $classes; ?>" style="padding-top: <?php echo $padding_top.'px'; ?>; padding-bottom: <?php echo $padding_bottom.'px'; ?>;">
      <div class="<?php echo $section_width; ?>" style="padding-left: <?php echo $padding_left.'px !important'; ?>; padding-right: <?php echo $padding_right.'px !important'; ?>">
        <div class="<?php echo $row; ?>">
          <div class="col-12">
            <div class="map-area">
              <div class="vmap"></div>
              <div class="map-text">
                <?php 
                if(!empty($heading)){
                    echo '<h4>'.$heading.'</h4>';
                }
                if(!empty($content)){
                    echo $content;
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>
<div class="clr"></div>
<!-- Map end -->