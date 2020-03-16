<?php
/**
 * Template Name: Resume
 *
 */

if ( ! function_exists( 'add_filter' ) ) {
  header( 'Status: 403 Forbidden' );
  header( 'HTTP/1.1 403 Forbidden' );
  exit();
}
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

// All templates should include this common code
require_once (dirname(dirname(__FILE__)).'/common.php');

// set animation class
$animation_classes = '';
if($fields['animations'])
{
  if($fields['animation_class']) {
    $animation_classes = ' wow '.$fields['animation_class'];
  } else {
    $animation_classes = ' wow fadeInUp';
  }
}

?>

    <main>
        <div class="resume-print-wrapper">
            <div class="row">
                <div class="resume-header">
                    <div class="header-top row">
                        <div class="header-contact col-sm-6 col-md-4 col-lg-3">
                          <?php if($fields['phone']): ?>
                              <div class="contact-wrapper">
                                <span class="resume-icon hide-print">
                                    <i class="fa fa-phone circle-icon"></i>
                                </span>
                                  <span class="words"><a href="tel:<?php echo $fields['phone']; ?>"><?php echo $fields['phone']; ?></a></span>
                              </div>
                          <?php endif; ?>

                          <?php if($fields['email']): ?>
                              <div class="contact-wrapper">
                                  <span class="resume-icon hide-print"><i class="fa fa-envelope circle-icon"></i></span>
                                  <span class="words"><a href="mailto:<?php echo $fields['email']; ?>" target="_blank"><?php echo $fields['email']; ?></a> </span>
                              </div>
                          <?php endif; ?>
                        </div>

                        <div class="header-info col-sm-6 col-md-8 col-lg-9">
                            <h1><?php echo $fields['name']; ?></h1>
                            <h2><?php echo $fields['job_title']; ?></h2>
                        </div>

                    </div>

                    <div class="header-bottom row">
                        <div class="headshot-wrapper hide-print col-md-3 col-lg-2">
                            <div class="headshot">
                                <img src="<?php echo $fields['portrait']; ?> " alt="<?php echo $fields['name']; ?> Resume" />
                            </div>
                        </div>

                        <div class="about-me col-md-9 col-lg-10">
                            <h3><?php echo $fields['summary_title']; ?></h3>
                            <!--                        <p>I am well versed with legacy programming languages such as PHP and MYSQL, but work mostly with REACT, MONGO DB and GRAPH QL these days.  I have experience with most CMS systems such as Drupal and Wordpress.  I have experience in building custom CMS systems as well as REACT/ANGULAR integrations with existing CMS systems.</p>-->
                            <!--                        <p>Over the years I've also built and sold several brands such as My Tunes Live, Roya Spices and Pic Monkey.  My Tunes Live was a site with over 400K users that allowed users to upload mp3 files and create playlists, years before Spotify came out.  Pic Monkey was a gif site with 35k unique monthly users, sold to a team that built Picassa for Google.</p>-->
                          <?php echo $fields['summary']; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="resume-left col-sm-12 col-md-5 col-lg-4">
                  <?php if($fields['skills_repeater']): ?>
                      <div class="left-column">
                          <h2><i class="fa fa-code"></i> Skills</h2>

                          <div class="skill-wrapper">
                              <div class="skill-left">
                                  <ul class="skill-sliders">
                                    <?php
                                    foreach($fields['skills_repeater'] as $key=>$skill)
                                    {
                                      if($key < 5) {
                                        echo <<<EOS
<li class="$animation_classes">
    <label for="{$skill['skill_slug']}">{$skill['skill_name']}<span class="show-printv">  -  {$skill['skill_rating']}</span></label>
    <input type="range" class="custom-range range {$skill['skill_class']}" min="0" max="5" step="1" id="{$skill['skill_slug']}" value="{$skill['skill_rating']}" disabled />
</li>
EOS;
                                      }
                                    }
                                    ?>


                                  </ul>
                              </div>
                              <!--  <span class="show-print">5</span> -->
                              <div class="skill-right">
                                  <ul class="skill-sliders">
                                    <?php
                                    foreach($fields['skills_repeater'] as $key=>$skill)
                                    {

                                      if($key >= 5) {
                                        echo <<<EOS
<li class="$animation_classes">
    <label for="{$skill['skill_slug']}">{$skill['skill_name']}<span class="show-printv">  -  {$skill['skill_rating']}</span></label>
    <input type="range" class="custom-range range {$skill['skill_class']}" min="0" max="5" step="1" id="{$skill['skill_slug']}" value="{$skill['skill_rating']}" disabled />
</li>
EOS;
                                      }
                                    }
                                    ?>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  <?php endif; ?>
                  <?php if($fields['education_repeater']): ?>
                      <div class="left-column">

                          <div class="education-wrapper">
                              <h2><i class="fa fa-graduation-cap"></i> Education</h2>
                            <?php

                            $eduhtml = '';
                            foreach($fields['education_repeater'] as $school)
                            {


                              $eduhtml .=<<<EOS
    <div class="school $animation_classes">
                        <h3>{$school['school_name']}</h3>
                        <h6><i class="fa fa-calendar"></i>{$school['date_graduated']}</h6>
                        <p>{$school['degree']}</p>
                    </div> 
EOS;

                            }

                            echo $eduhtml;

                            ?>
                          </div>
                      </div>


                  <?php endif; ?>
                  <?php if($fields['references_repeater']): ?>
                      <div class="left-column">
                          <div class="reference-wrapper">
                              <h2><i class="fa fa-user"></i>References</h2>

                            <?php
                            $refhtml = '';
                            foreach($fields['references_repeater'] as $reference)
                            {

                              $refhtml .=<<<EOS
    <div class="reference $animation_classes">
                <h3>{$reference['name']}</h3>
                <p>{$reference['job_title']}</p>
                <h4><a href="mailto:{$reference['email']}" target="_blank"><i class="fa fa-envelope"></i>{$reference['email']}</a> </h4>
                <h4><a href="tel:{$reference['phone']}"><i class="fa fa-phone"></i>{$reference['phone']}</a></h4>
    
            </div>
EOS;


                            }

                            echo $refhtml;         ?>
                          </div>
                      </div>

                  <?php
                  endif;

                  if($fields['portfolio_links']): ?>
                      <div class="left-column">
                          <h2><i class="fa fa-external-link"></i>Links</h2>
                          <div class="link-wrapper <?php echo $animation_classes; ?>">
                              <ul class="link-list">

                                <?php
                                $linkhtml = '';
                                foreach($fields['portfolio_links'] as $link)
                                {

                                  $linkhtml .= <<<EOS
<li>
    <span class="show-print">{$link['link_url']}</span>
    <span class="hide-print"><a href="{$link['link_url']}" target="_blank">{$link['link_name']}</a></span>
</li>
EOS;
                                }

                                echo $linkhtml;

                                ?>

                              </ul>
                          </div>
                      </div>
                  <?php endif; ?>
                  <?php if($fields['social_media_repeater']): ?>
                      <div class="left-column">
                          <h2><i class="fa fa-user-circle"></i>Social Media</h2>
                          <div class="social-wrapper <?php echo $animation_classes; ?>">
                              <ul class="link-list">

                                <?php
                                $socialhtml = '';
                                foreach($fields['social_media_repeater'] as $site)
                                {

                                  $socialhtml .= <<<EOS
<li>
    <span class="show-print"><i class="fa fsocial {$site['site_icon']}"></i>{$site['site_link']}</span>
    <span class="hide-print"><a href="{$site['site_link']}" target="_blank"><i class="fa fsocial {$site['site_icon']}"></i>{$site['site_name']}</a></span>
</li>
EOS;
                                }

                                echo $socialhtml;

                                ?>

                              </ul>
                          </div>
                      </div>
                  <?php endif; ?>
                </div>


                <div class="resume-right col-sm-12 col-md-7 col-lg-8">

                    <div class="experience-box">
                <span class="work-fa">
                    <i class="fa fa-briefcase"></i>
                </span>
                        <h2>Work Experience</h2>

                      <?php
                      $workhtml = $imagehtml = $end_date_html = '';
                      foreach($fields['work_experience'] as $work)
                      {


                        if($work['company_logo']['url']) {
                          $imagehtml = <<<EOS
     <div class="col-3">
        <div class="company-logo">
            <img src="{$work['company_logo']['url']}" alt="{$work['company_logo']['title']}" />
        </div>
    </div>
EOS;
                        }
                        if($work['current_position']) {
                          $end_date_html = 'current';
                        } else {
                          $end_date_html = $work['end_date'];
                        }


                        $workhtml .= <<<EOS
<div class="company-box $animation_classes">
    <div class="row">
        $imagehtml

        <div class="col-9">
            <h4>{$work['company_name']}  |  {$work['job_title']}</h4>
            <h6><i class="fa fa-calendar"></i>{$work['start_date']}  -  {$end_date_html} </h6>
            <div class="company-summary">{$work['company_summary']}</div>
        </div>
    </div>
</div>
EOS;
                      }

                      echo $workhtml;

                      ?>
                    </div>
                </div>
            </div>

        </div>
    </main>
<?php
$footer_template = $template_dir.'/footer.php';


if($fields['custom_footer'] && file_exists($footer_template))
{
  require_once($footer_template );
} else {
  get_footer();
}
