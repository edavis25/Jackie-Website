<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navigation.php'; ?>

<!-- Portfolio Item Row -->
<div class="row">

    <?php include 'includes/jackie-sidebar.php' ?>
    
    <div class="container col-md-8 col-md-pull-4">
        <!--img class="img-responsive" src="http://placehold.it/750x500" alt=""-->
        
        <div id="homepage-slider" class="flexslider">
            <ul class="slides">
            <?php foreach($listings as $listing) : ?>
                <?php $image = Image::getImageById($listing->getFeaturedImage()); ?>
                <li>
                    <div class="img-container">
                        <img src="<?= base_url('img/uploads/') . $image->getFilename(); ?>" class="img img-responsive home-carousel" />
                        <span class="img-caption">
                            <h3 class=""><?= $listing->getAddress() ?></h3>
                            <span class="hidden-xs">$<?= $listing->getPrice() ?><br /></span>
                            <a href="#">View Listing</a>
                        </span>
                    </div>
                </li>
            <?php endforeach; ?>
            </ul><!-- items mirrored twice, total of 12 -->
        </div>
        
        <div id="carousel-thumbnails" class="flexslider hidden-xs">
            <ul class="slides">
            <?php foreach($listings as $listing) : ?>
                <?php $image = Image::getImageById($listing->getFeaturedImage()); ?>
                <li>
                    <img src="<?= base_url('img/uploads/') . $image->getFilename()?>" class="img img-responsive img-thumbnail" />
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
        
    </div>

</div>
<!-- /.row -->


<!-- Related Projects Row -->
<div class="row">

    <div class="col-lg-12">
        <h3 class="page-header">Related Projects</h3>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12 text-center">
        <a href="<?= base_url('listings') ?>" class="reveal">
            <!--img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt=""-->
            <img class="img img-responsive portfolio-item center-block" src="<?= base_url('img/icons/search-back.png')?>" />
            <h4 class="quick-links">Search Listings</h4>
        </a>
    </div>
   
        
    <div class="col-md-3 col-sm-6 col-xs-12  text-center">
        <a href="<?= base_url('faq/buyers') ?>" class="reveal">
            <img class="img-responsive portfolio-item center-block" src="<?= base_url('img/icons/buy-back-alt.png')?>" alt="">
            <h4 class="quick-links">Tips for Buyers</h4>
        </a>
    </div>
    
    <div class="hidden-xs hidden-md hidden-lg hidden-xl clearfix"></div>

    <div class="col-md-3 col-sm-6 col-xs-12 text-center">
        <a href="<?= base_url('faq/sellers') ?>" class="reveal">
            <img class="img-responsive portfolio-item center-block" src="<?= base_url('img/icons/sell-back.png')?>" alt="">
            <h4 class="quick-links">Tips for Sellers</h4>
        </a>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12 text-center">
        <a href="#" class="reveal">
            <img class="img-responsive portfolio-item center-block" src="<?= base_url('img/icons/info-back.png')?>" alt="">
            <h4 class="quick-links">Contact Us</h4>
        </a>
    </div>

</div>
<!-- /.row -->

<hr>

<?php include 'includes/footer.php' ?>