<?php
    $heading       = get_sub_field('heading');
    $content       = get_sub_field('content');
    $button        = get_sub_field('button');
    $images        = get_sub_field('images');
    
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
<!-- Carousel start -->
<section class="custom-section page_section_<?php echo $page_section; ?> text-<?php echo $text_align; ?> <?php echo $background; ?> <?php echo $classes; ?>" style="padding-top: <?php echo $padding_top.'px'; ?>;">
      <div class="<?php echo $section_width; ?>" style="padding-left: <?php echo $padding_left.'px !important'; ?>; padding-right: <?php echo $padding_right.'px !important'; ?>">
        <div class="<?php echo $row; ?>">
          <div class="col-md-12 text-center">
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
</section>
<section class="<?php echo $background; ?>" style="padding-bottom: <?php echo $padding_bottom.'px'; ?>; padding-top: 100px;">
    <div class="<?php echo $section_width; ?>" style="padding-left: <?php echo $padding_left.'px !important'; ?>; padding-right: <?php echo $padding_right.'px !important'; ?>">
        <div class="<?php echo $row; ?>">
          <div class="col-md-12 text-center">
            <?php if(!empty($images)){ ?>
            <div class="brand-slider">
              <div class="owl-carousel owl-drag">
                <?php 
                    foreach($images as $image){
                        echo '<div class="img-size"> <img src="'.$image['url'].'" alt="'.$image['alt'].'"> </div>';
                    }
                ?>
              </div>
            </div>
            <?php } ?>
          </div>
          <?php 
          if(!empty($button['text'])){
            echo '<div class="col-md-12 text-center mt-5">';
              echo '<a href="'.$button['link'].'" target="'.$button['target'].'" class="btn-style">'.$button['text'].'</a>';
            echo '</div>';
          }
          ?>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<!-- Carousel end -->