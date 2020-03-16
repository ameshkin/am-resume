
<?php if($fields['show_print_button'] || $fields['show_download_button']): ?>

  <?php


if($fields['animations'])
{
    if($fields['animations_type']) {
      $animation_classes = ' wow '.$fields['animations_type'];
    } else {
      $animation_classes = ' wow fadeInUp';
    }
}


  ?>

    <div class="footer-buttons hide-print <?php echo $animation_classes; ?> hide">
        <?php if($fields['show_print_button']): ?>
            <div class="button-wrapper">
                <a class="btn-primary print-resume">PRINT RESUME</a>
            </div>
        <?php endif; ?>

        <?php if($fields['show_share_button']): ?>
            <div class="button-wrapper">
                <a class="btn-primary share-resume">SHARE RESUME</a>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
<?php wp_footer(); ?>
    </body>
    </html>
<?php

/*
 *      <?php if($fields['show_download_button']): ?>
          <div class="button-wrapper">
              <a class="btn-primary download-resume" href="#download-resume">DOWNLOAD RESUME</a>
          </div>
      <?php endif; ?>
 */
