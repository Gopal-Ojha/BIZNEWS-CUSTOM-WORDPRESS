
<?php get_header();?>
<body>

<!-- News With Sidebar Start -->
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                            <?php
                        if(have_posts()) { 
                            the_archive_title('<h4 class="m-0 text-uppercase font-weight-bold">', '</h4>');
                            ?>    
                            </div>
                        </div>
                        <?php
                        while(have_posts()) {
                            the_post(); ?>
                        <div class="col-lg-4">
                            <div class="position-relative mb-3">
                            <a href="<?php the_permalink() ?>" class="img-fluid w-100" style="object-fit: cover;">
                                        <?php the_post_thumbnail('biznews-featured') ?>
                                    </a>
                                
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href=""><?php $cat = get_the_category(); echo $cat[0]->cat_name; ?></a>
                                        <a class="text-body" href=""><small><?php echo get_the_date(); ?></small></a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="<?php the_permalink() ?>"><?php the_title() ?></a>
                                    <p class="m-0"><?php the_excerpt() ?></p>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                        <small><?php echo get_the_author() ?></small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                                        <small class="ml-3"><i class="far fa-comment mr-2"></i><?php echo get_comments_number( ) ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }
                    } ?>

                        
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->


   <?php get_footer();?>