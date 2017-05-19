<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navigation.php'; ?>


<div class="row">
    <?php require_once 'includes/jackie-sidebar.php'; ?>
    <div class="container col-md-8 col-md-pull-4">
        <div class="row">

            <div id="featured-carousel" class="carousel slide">
                <div class="text-center">Featured Listings</div>

                <!-- Dot Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#featured-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#featured-carousel" data-slide-to="1"></li>
                    <li data-target="#featured-carousel" data-slide-to="2"></li>
                </ol>
                <!-- Carousel Items -->
                <div class="carousel-inner">
                    <div class="active item">  
                        <img src="<?= base_url('img/house1-800x450.jpg') ?>" class="img-responsive">
                        <div class="carousel-caption bg-trans">
                            655 City Park<br />
                            Columbus, Ohio 43206 <br />
                            <a>Learn More</a>
                        </div>
                    </div>

                    <div class="item">  
                        <img src="<?= base_url('img/house2-800x450.jpg') ?>" class="img-responsive">
                        <div class="carousel-caption bg-trans">
                            999 Real Street <br />
                            Columbus, Ohio 43214 <br />
                            <a>Learn More</a>
                        </div>
                    </div>

                    <div class="item">  
                        <img src="<?= base_url('img/house3-800x450.jpg') ?>" class="img-responsive">
                        <div class="carousel-caption bg-trans">
                            888 Another Street <br />
                            Columbus, Ohio 43201 <br />
                            <a>Learn More</a>
                        </div>
                    </div>
                </div>


                <!-- Carousel Navigation -->
                <a class="left carousel-control" href="#featured-carousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#featured-carousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
    </div>
</div> <!-- /.row -->

<br />

<!-- Call to Action Well -->
<div class="row">
    <div class="col-lg-12">
        <div class="well text-center">
            This is a well that is a great spot for a business tagline or phone number for easy access!
        </div>
    </div> <!-- /.col-lg-12 -->
</div> <!-- /.row -->


<!-- Content Row -->
<div class="row">
    <!-- Facebook Div -->
    <div class="col-md-6 col-md-offset-1">
        <div class="container col-xs-12 bordered">
            <h2>Follow Us</h2>
            <p>Keep up with our recent activity for a first look at new listings and specials!</p>
            <div id="fbook">
                <div class="fb-page z-index" data-width="800" data-height="600" data-href="https://www.facebook.com/The-Jackie-Plank-Team-156960047654474/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/The-Jackie-Plank-Team-156960047654474/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/The-Jackie-Plank-Team-156960047654474/">The Jackie Plank Team</a></blockquote></div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="container col-xs-12 bordered">
            <h2>Meet Our Team</h2>
            <div class="row">
                <img src="img/drew150.jpg" class="img-responsive" id="drew-picture" style="width: 87px; height: 115px;" />
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
            </div>
            <br />
            <div class="row">
                <img src="img/agnes150.jpg" class="img-responsive" id="agnes-picture" style="width: 87px; height: 115px;" />
                <p class="align-right">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>       
            </div>
            <br />
            <div class="row">
                <div class="container col-xs-12 bordered">
                    <h2>Selling Properties All Over Central Ohio</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <div id="map-container" class="z-index"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Google Maps API -->
<script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyDZeFnfnLaCtQMy8ewg2qceZekEyJYeLTw&callback=initMap" async defer></script>
<?php //require_once 'includes/listings-overlay.php'; ?>

<?php require_once 'includes/footer.php'; ?>