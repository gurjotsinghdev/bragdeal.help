<!-- Content with media start -->
<section class="national-area custom-section page_section_<?php echo $page_section; ?> <?php echo $background; ?> text-<?php echo $text_align; ?> image-<?php echo $image_position; ?> <?php echo $classes; ?>" style="padding-top: <?php echo $padding_top.'px'; ?>; padding-bottom: <?php echo $padding_bottom.'px'; ?>;">
      <div class="<?php echo $section_width; ?>" style="padding-left: <?php echo $padding_left.'px !important'; ?>; padding-right: <?php echo $padding_right.'px !important'; ?>;">
        <div class="<?php echo $row; ?>">
          <div class="col-md-6">
            <div class="img-national with-video">
              <?php 
              if(!empty($image)){
                echo '<img src="'.$image['url'].'" alt="">';
              }
              
              if($video_popup['show'] == 1 && !empty($video_popup['video_link'])){
                ?>
                <div class="play-btn">
                  <a  class="video-play-button" href="<?php echo $video_popup['video_link']; ?>" data-toggle="lightbox" data-gallery="youtubevideos">
                    <span></span>
                  </a>
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="col-md-6">
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
            if(!empty($button['text'])){
              if($button['target'] != 'popup'){
                echo '<a href="'.$button['link'].'" target="'.$button['target'].'" class="btn-style">'.$button['text'].'</a>';
              } else {
                echo '<a href="'.$button['link'].'" target="'.$button['target'].'" class="btn-style" data-toggle="lightbox">'.$button['text'].'</a>';
              }
            }
            ?>
          </div>
        </div>
      </div>
    </section>
	<div class="clearfix"></div>
<!-- Content with media end -->