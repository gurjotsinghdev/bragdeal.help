<?php 
    $subheading = get_sub_field('subheading');
    $heading    = get_sub_field('heading');
    $content    = get_sub_field('content');
    $plans      = get_sub_field('select_plans');
    $button  = get_sub_field('button');

    $styling = get_sub_field('styling');

    // Section padding
    $padding = $styling['padding'];
    $padding_top = $padding['top'];
    if(empty($padding_top)){ $padding_top = 40;}
    $padding_right = $padding['right'];
    if(empty($padding_right)){ $padding_right = 0;}
    $padding_bottom = $padding['bottom'];
    if(empty($padding_bottom)){ $padding_bottom = 40;}
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
    <!-- Membership section start -->
	<section class="membership-section custom-section page_section_<?php echo $page_section; ?> text-<?php echo $text_align; ?> <?php echo $background; ?> <?php echo $classes; ?>" style="padding-top: <?php echo $padding_top.'px'; ?>;">
      <div class="<?php echo $section_width; ?>" style="padding-left: <?php echo $padding_left.'px !important'; ?>; padding-right: <?php echo $padding_right.'px !important'; ?>">
        <div class="<?php echo $row; ?>">
          <div class="col-md-12 text-center">
            <?php 
            if(!empty($subheading)){
                echo '<h2>'.$subheading.'</h2>';
            }
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
    <?php if(!empty($plans)){ ?>
    <section style="padding-bottom: <?php echo $padding_bottom.'px'; ?>;">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="associate-area mb-5">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <?php 
                $count = 0;
                foreach($plans as $plan){
                if($count == 0){
                  $active = ' active';
                } else{
                  $active = '';
                }
                $plan_tab = 'plan'.$plan.$page_section.$count;
                ?>
                <li class="nav-item" role="presentation">
                  <button class="nav-link<?php echo $active; ?>" id="pills-<?php echo $plan_tab; ?>-tab"
                    data-bs-toggle="pill" data-bs-target="#pills-<?php echo $plan_tab; ?>"
                    type="button" role="tab" aria-controls="pills-<?php echo $plan_tab; ?>"
                    aria-selected="true"><?php echo get_the_title($plan); ?></button>
                </li>
                <?php $count++; } ?>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <?php 
                $count = 0;
                foreach($plans as $plan){
                if($count == 0){
                  $active = ' show active';
                } else{
                  $active = '';
                }
                $plan_tab = 'plan'.$plan.$page_section.$count;
                ?>
                <div class="tab-pane fade<?php echo $active; ?>" id="pills-<?php echo $plan_tab; ?>"
                  role="tabpanel" aria-labelledby="pills-<?php echo $plan_tab; ?>-tab">
                  <h2 class="mt-60"><?php echo get_the_title($plan); ?></h2>
                  <p class="mt-60"><?php echo get_post_meta($plan, 'pms_subscription_plan_description', true); ?></p>
                  <?php 
                  if(!empty($button['text'])){
                    echo '<a href="'.$button['link'].'?plan='.$plan.'" target="'.$button['target'].'" class="btn-style">'.$button['text'].'</a>';
                  }
                  ?>
                </div>
                <?php $count++; } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php } ?>
	<div class="clearfix"></div>
	<!-- Membership section end -->