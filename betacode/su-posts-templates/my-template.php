<div class="row row-top row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <?php if ($posts->have_posts()) : ?>
            
                <?php while ($posts->have_posts()) : ?>
                    <?php $posts->the_post(); ?>
                <div class="col col-top">
                <div class="card shadow-sm">
                
                    <?php if (has_post_thumbnail()) { ?>
                        <a href="<?php the_permalink(); ?>"><?php  echo the_post_thumbnail( array(500) ); ?></a>
                           
                        <?php } else { ?>
                            <a href="<?php the_permalink(); ?>"><svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">NoImage</text>
                        </svg> </a>
                    <?php } ?>


                    <div class="card-body"><a href="<?php the_permalink(); ?>"><h3 class="postCardTitle"><?php the_title(); ?></h3></a><p class="card-text"><?php
                            $content = get_the_content();
                            $content = str_replace(array("\r\n", "\r", "\n"), '', $content);
                            $content = str_replace('\n', '', mb_substr(strip_tags($content), 0, 100,'UTF-8'));
                            $backspace = '/[\x08]/';
                            $content  = preg_replace("/( |　)/", "", $content );
                            $content = preg_replace ( $backspace , '' , $content );
                            echo $content.'…';
                        ?>
                    </div>
                </div>
                </div>
                <?php endwhile; ?>
    <?php else : ?>
        <p>Posts not found!</p>
    <?php endif; ?>
</div>