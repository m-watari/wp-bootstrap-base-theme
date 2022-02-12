
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <?php if ($posts->have_posts()) : ?>
            
                <?php while ($posts->have_posts()) : ?>
                    <?php $posts->the_post(); ?>
                <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                    </svg>

                    <div class="card-body">
                        <p class="card-text"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </div>
                            <small class="text-muted">9 mins</small>
                        </div>
                    </div>
                </div>
                </div>
                <?php endwhile; ?>
            
    <?php else : ?>
        <p>Posts not found!</p>
    <?php endif; ?>
</div>