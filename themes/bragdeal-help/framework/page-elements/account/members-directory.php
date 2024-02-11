<div class="members-tab-contnet">
    <?php 
    $user_id = get_current_user_id();
    $args = array(
        'post_type'      => 'im_directories',
        'posts_per_page' => -1,
        'status'         => 'publish',
    );
    $query = new WP_Query($args);
    ?>
    <h2 class="mt-60 text-center mb-4"><?php echo __($tab['label'], 'ches'); ?></h2>
    <div class="forum-table account-table">
                <table class="table directory-table">
                  <thead>
                    <tr>
                      <th scope="col">First Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">Organization</th>
                      <th scope="col">Address</th>
                      <th scope="col">Telephone</th>
                      <th scope="col">Extension</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    while ( $query->have_posts() ) : $query->the_post();
                    ?>
                    <tr>
                      <th scope="row" class="view-data-details">
                        <?php echo get_field('first_name'); ?>
                      </th>
                      <td>
                      <?php echo get_field('last_name'); ?>
                      </td>
                      <td>
                        <?php echo get_field('organization'); ?><br>
                        <a href="mailto:<?php echo get_field('email_address'); ?>"><?php echo get_field('email_address'); ?></a>
                      </td>
                      <td style="max-width: 200px;">
                          <?php echo get_field('address'); ?>
                      </td>
                      <td>
                          <?php echo get_field('telephone'); ?>
                      </td>
                      <td>                      
                          <?php echo get_field('extension'); ?>
                      </td>
                    </tr>
                    <?php endwhile; wp_reset_query(); ?>
                  </tbody>
                </table>
              </div>
</div>