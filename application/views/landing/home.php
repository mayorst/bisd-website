<div class="home page-body">
  <div class="hero-image vcenter-tbl-parent" >
    <div class="bg-blur" style="background-image:url('<?=PATH_IMAGES . 'img1.jpg'?>');"></div>
      <div class="hero-text vcenter-tbl">
        <h1 class="display-3">Welcome to BISD!</h1>
        <p class="lead">
          <font color="white">Benitez Institute for Sustainable Development</font>
        </p>
        <hr class="my-4">
        <p>Learn Education for Sustainability. Start your course now!</p>
        <p class="lead">
          <a class="btn btn-primary btn-lg" href="<?=base_url('courses')?>" role="button"><i class="fa fa-lightbulb"></i> View Courses</a>
        </p>
        <br>
      </div>
  </div>
  <div class="container">
    <!--info of BISD-->
    <article>
      <div class="row">
        <div class="col-md-8">
          <section>
            <h3> What is BISD? </h3>
            <ul class="whats-bisd list-unstyled">
              <li>
                <br>
                <p>A <strong>SYSTEM</strong> of learning developing promoting sustainable development theories, sustainble development theories, technologies and practices.
                </p>
              </li>
              <li>
                <p><strong>BUILDS ON</strong> the wealth of learnings experiences “community gardens” of PRRM.
                </p>
              </li>
              <li>
                <p><strong>DISTINCT</strong> in its integration of:
                  <ul>
                    <li> a critical school challenging the mainstream</li>
                    <li> action-based learning linked to local rural movements </li>
                    <li> advocacy for the legitimacy of alternative/ </li>non-traditional education
                  </ul>
                </p>
              </li>
              <li>
                <p><strong>FOUNDED</strong> on the principles of:
                  <ul>
                    <li> a co-determination of the learning agenda </li>
                    <li> context-content-method framework </li>
                    <li> integration of theory and practice of sustainable development </li>
                  </ul>
                </p>
              </li>
            </ul>
          </section>
        </div>
        <div class="col-md-4">
          <section class="upcoming-events">
            <h3>Upcoming Events</h3>
            <div class="list">
              <?php
                create_upcomingEvents($upcomingEvents);
              ?>
            </div>
          </section>
        </div>
      </div>
      <section>
        <blockquote>
          <div class="row">
            <div class="col-md-6">
              <div class="vcenter">
                <p class="quote"><i class="fa fa-quote-left"></i> PRRM is right on target to focus on education for sustainability…. We have yet to learn our way out of our unsustainable condition.... <i class="fa fa-quote-right"></i>
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="vcenter">
                <img class="round-img responsive-img h-benitez-img" alt="Helena-Benitez" src="<?=PATH_IMAGES . 'Helena-Benitez.jpg'?>" />
                <p>PRRM Chair Emeritus Helena Benitez (1914-2016)</p>
              </div>
            </div>
          </div>
        </blockquote>
      </section>
      <section class="website-message row">
         <div class="col-md-12">
          <?=create_WebsiteMessage($website_message)?>
        </div>
      </section >
      <section class="learning-center">
        <h3>Local Community Learning Center and Thrust</h3>
        <p>The Benitez Institute for Sustainable Development (BISD), since its establishment in 2002, has served as the main training, research and technical assistance arm of the Movement. It has a set of faculty drawn from among PRRM’s Board of Trustees, chapter members, staff and partner people’s organizations (POs), as well as from other training institutes, NGOs and POs.</p>
        <p>In other words, it operates as a community of knowledge, rather than as a single, isolated institution. This is to ensure that it is able to draw from the widest possible source of “exemplary practices” in sustainable development for sharing through its training programs and publications.
        </p>
        <p>
          A vital aspect of the BISD curriculum is the optimization of community projects implemented by the local organizations and/or advocates-practitioners. These will serve as demonstration and training sites in which learning may more effectively take place in complementation with classroom discourses.
        </p>
        <div class="learningCenter-ph">
          <img class="responsive-img" src="<?=PATH_IMAGES . 'local_community_learning_centers.jpg'?>" />
        </div>
      </section>
    </article>
  </div>
</div>
<?php
/**
 * Element Creator
 * -----------------------------
 */
function create_upcomingEvents($upcomingEvents)
{
    if (testVar($upcomingEvents))
    {
        foreach ($upcomingEvents as $key => $value)
        {

            $img = get_resc($value['ev_img_path']);
            // if $img is default- means ev_img_path doesn'nt exist
            if($img == IMG_DEF){
              $img = get_resc($value['fallback_img_path']);
            }

            $name = $value['name'];

            $unix_startTime = human_to_unix($value['time_start']);
            $date = date('M d, Y h:i a', $unix_startTime);
            $desc = $value['description'];

            ?>
  <div class="card">
    <div class="img_container">
      <img  src="<?=$img?>">
    </div>
    <h5><?=$name?></h5>
    <span><?=$date?></span>
    <p>
      <?=$desc?>
    </p>
  </div>
  <?php
}
    }
    else
    {
        echo '<div class="text-center">NO UPCOMING EVENTS</div>';
    }
}

function create_WebsiteMessage($publicMessage){
  if(!empty($publicMessage)){
    $top3 = (count($publicMessage) > 3) ? array_slice($publicMessage, 0, 3) : $publicMessage;

  ?>
  <div class="carousel-bg"></div>
  <div id="articleCarousel" class="carousel slide " data-ride="carousel">
    <div class="bg-img-reponsive bg-blur"  style="background-image: url('<?=PATH_IMAGES.'bg article.jpg'?>');"></div>
    <ol class="carousel-indicators">
      <?php 
        for($i = 0; $i<count($top3); $i++ ){
          $active = ($i==0) ? 'active': '';
          echo '<li data-target="#articleCarousel" data-slide-to="'.$i.'" class="'.$active.'"></li>';
        }
      ?>
    </ol>
    <div class="carousel-inner">
      <?php 
        foreach ($top3 as $key => $value) {
          $active = ($key==0) ? 'active': '';
          echo '<div class="carousel-item '.$active.'">';
          articleSlide($value);  
          echo  '</div>';
        }
      ?>
    </div>
    <a class="carousel-control-prev" href="#articleCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#articleCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

<?php
  }

}

function articleSlide($article){
  echo '<div class="bg-img-reponsive article-parent">';

    echo '<div class="article">';
    echo '<h4>'.$article['title'].'</h4>';
    echo '<p>'.carraigeReturn_to_tag($article['from_'],'<br>',' ' ).'</p>';

    $unix =human_to_unix($article['date_publish']);
    $published = date('M d, Y' , $unix);
    // echo '<p>'.$published .'</p>';

    echo '<div class="message">'.carraigeReturn_to_tag($article['message']).'</div>';



    echo '<a class="vcenter-tbl-parent" href="'.$article['external_link'].'" target="blank">
          <h5 class="vcenter-tbl">Read More</h5> 
          </a>';
    echo '</div>';


  echo '</div>';
}

?>
