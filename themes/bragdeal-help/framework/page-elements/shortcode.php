<?php 
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

$page_section = $args['page_section'];

if(!empty($shortcode)){
?>
<!-- Shortcode start -->
<section class="shortcode-section custom-section page_section_<?php echo $page_section; ?> text-<?php echo $text_align; ?> <?php echo $background; ?> <?php echo $classes; ?>" style="padding-top: <?php echo $padding_top.'px'; ?>; padding-bottom: <?php echo $padding_bottom.'px'; ?>;">
      <div class="<?php echo $section_width; ?>" style="padding-left: <?php echo $padding_left.'px !important'; ?>; padding-right: <?php echo $padding_right.'px !important'; ?>">
        <div class="<?php echo $row; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <?php echo do_shortcode($shortcode); ?>
            </div>
        </div>
    </div>
</section>
<div class="clr"></div>
<!-- Shortcode end -->
<?php } ?>