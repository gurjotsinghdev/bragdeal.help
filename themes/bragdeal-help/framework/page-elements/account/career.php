<div class="career-tab-contnet">
    <?php 
    $user_id = get_current_user_id();
    $args = array(
        'post_type'      => 'im_jobs',
        'posts_per_page' => -1,
        'status'         => 'publish',
    );
    $query = new WP_Query($args);
    $external_link = get_field('external_link');
    ?>
    <h2 class="mt-60 text-center mb-4"><?php echo __($tab['label'], 'ches'); ?></h2>
    <div class="forum-table account-table">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Title</th>
                      <th scope="col">Position</th>
                      <th scope="col">City</th>
                      <th scope="col">Province</th>
                      <th scope="col">Closing Date</th>
                      <th scope="col">Detail</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    while ( $query->have_posts() ) : $query->the_post();
                    ?>
                    <tr>
                      <th scope="row" class="view-data-details">
                        <a href="<?php echo $external_link; ?>">
                            <?php the_title(); ?>
                        </a>  
                      </th>
                      <td>
                        <?php echo get_field('position'); ?>
                      </td>
                      <td>
                          <?php echo get_field('city'); ?>
                      </td>
                      <td>
                          <?php echo get_field('province'); ?>
                      </td>
                      <td>
                          <?php echo get_field('closing_date'); ?>
                      </td>
                      <td>
                          <?php 
                            echo '<a style="text-decoration: none;" target="_blank" href="'.$external_link.'" class="">View</a>';
                          ?>
                      </td>
                    </tr>
                    <?php endwhile; wp_reset_query(); ?>
                  </tbody>
                </table>
              </div>
</div>