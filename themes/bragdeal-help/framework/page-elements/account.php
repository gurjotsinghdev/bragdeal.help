<?php 
$tabs = get_sub_field('tabs');

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
if(!empty($tabs)){
?>
<!-- Account section start -->
<section class="shortcode-section custom-section page_section_<?php echo $page_section; ?> text-<?php echo $text_align; ?> <?php echo $background; ?> <?php echo $classes; ?>" style="padding-top: <?php echo $padding_top.'px'; ?>; padding-bottom: <?php echo $padding_bottom.'px'; ?>;">
    <div class="<?php echo $section_width; ?>" style="padding-left: <?php echo $padding_left.'px !important'; ?>; padding-right: <?php echo $padding_right.'px !important'; ?>">
        <div class="<?php echo $row; ?>">
        
          <div class="col-md-12">
            <?php 
            if (is_user_logged_in()) {
            ?>
            <div class="associate-area mb-5">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <?php 
                $count = 0;
                foreach($tabs as $tab ){
                if($count == 0){
                    $active = ' active';
                } else {
                    $active = '';
                }
                ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link<?php echo $active; ?>" id="pills-<?php echo $tab['value'].$page_section.$count; ?>-tab"
                        data-bs-toggle="pill" data-bs-target="#pills-<?php echo $tab['value'].$page_section.$count; ?>"
                        type="button" role="tab" aria-controls="pills-<?php echo $tab['value'].$page_section.$count; ?>"
                        aria-selected="true"><?php echo $tab['label']; ?></button>
                </li>
                <?php $count++; } ?>
                <li class="nav-item" role="presentation">
                    <a href="<?php echo wp_logout_url(home_url('/')); ?>" class="nav-link">Logout</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <?php 
                $count = 0;
                foreach($tabs as $tab ){
                if($count == 0){
                    $active = ' fade show active';
                } else {
                    $active = '';
                }
                ?>
                <div class="tab-pane<?php echo $active; ?>" id="pills-<?php echo $tab['value'].$page_section.$count; ?>"
                  role="tabpanel" aria-labelledby="pills-<?php echo $tab['value'].$page_section.$count; ?>-tab">
                  <?php include 'account/'.$tab['value'].'.php'; ?>
                </div>
                <?php $count++; } ?>
              </div>
            </div>
            <?php } else {
              echo do_shortcode('[pms-login register_url="'.site_url().'/become-a-member/" lostpassword_url="'.site_url().'/recover-password"]'); 
            } ?>
          </div>
        </div>
    </div>
</section>
<div class="clr"></div>
<!-- Account section end -->
<?php } ?>