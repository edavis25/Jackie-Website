<!-- Listings Image Slider -->
<div class="container col-xs-12 listings-slider">
    <div id="main_area">
        <!-- Slider -->
        <div class="row">
            <div class="col-xs-12" id="slider">
                <!-- Top part of the slider -->
                <div class="row">
                    <div class="col-sm-8" id="carousel-bounding-box">
                        <div class="carousel slide" id="myCarousel">
                            <div class="text-center">Featured Listings</div>	
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                <div class="active item" data-slide-number="0">
                                    <img src="img/house1-800x450.jpg">
                                </div>

                                <div class="item" data-slide-number="1">
                                    <img src="img/house2-800x450.jpg">
                                </div>

                                <div class="item" data-slide-number="2">
                                    <img src="img/house3-800x450.jpg">
                                </div>

                                <div class="item" data-slide-number="3">
                                    <img src="http://placehold.it/770x300&text=four">
                                </div>
                            </div>
                            <!-- Carousel nav -->
                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>                                       
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>                                       
                            </a>                                
                        </div>
                    </div>

                    <!-- Slide Text -->
                    <div class="col-sm-4" id="carousel-text"></div>
                    <div id="slide-content" style="display: none;">
                        <div id="slide-content-0">
                            <h2>655 City Park Avenue</h2>
                            <p>Columbus, OH 43206</p>
                            <p>Neighborhood: German Village</p>
                            <p>3 Beds &bull; 4.5 Bath &bull; 2-Car Garage</p>
                            <p>4,186 sq ft</p>
                            <h4>$1,550,000</h4>
                            <a class="btn btn-default" href="http://www.homecentralrealty.com/listings/detail.php?lid=109993473&" target="_blank">See Listing</a>
                            <input type="button" class="btn btn-default" value="Pictures" data-toggle="modal" data-target="#listing1"/>
                            <p class="sub-text">October 24 2014 - <a href="#">Read more</a></p>
                        </div>

                        <div id="slide-content-1">
                            <h2>123 Fake St.</h2>
                            <p>Columbus, OH 43201</p>
                            <p>Neighborhood: German Village</p>
                            <p>3 Beds &bull; 2 Bath</p>
                            <p>1,300 sq ft</p>
                            <p>Listed: November 28, 2016</p>
                            <h4>$345,900</h4>
                            <a class="btn btn-default" href="https://google.com" target="_blank">See Listing</a>
                            <input type="button" class="btn btn-default" value="Pictures" />
                            <p class="sub-text">October 24 2014 - <a href="#">Read more</a></p>
                        </div>

                        <div id="slide-content-2">
                            <h2>123 Fake St.</h2>
                            <p>Columbus, OH 43201</p>
                            <p>Neighborhood: German Village</p>
                            <p>3 Beds &bull; 2 Bath</p>
                            <p>1,300 sq ft</p>
                            <p>Listed: November 28, 2016</p>
                            <h4>$345,900</h4>
                            <a class="btn btn-default" href="https://google.com" target="_blank">See Listing</a>
                            <input type="button" class="btn btn-default" value="Pictures" />
                            <p class="sub-text">October 24 2014 - <a href="#">Read more</a></p>
                        </div>

                        <div id="slide-content-3">
                            <h2>123 Fake St.</h2>
                            <p>Columbus, OH 43201</p>
                            <p>3 Beds &bull; 2 Bath</p>
                            <p>1,300 sq ft</p>
                            <p>Listed: November 28, 2016</p>
                            <h4>$345,900</h4>
                            <a class="btn btn-default" href="https://google.com" target="_blank">See Listing</a>
                            <input type="button" class="btn btn-default" value="Pictures" />
                            <p class="sub-text">October 24 2014 - <a href="#">Read more</a></p>
                        </div>

                    </div>
                </div> 	  
            </div>
        </div> <!-- End Row 1 - The Slider & Text-->
        
        <!-- Thumbnails -->
        <div class="row hidden-xs" id="slider-thumbs">
            <!-- Bottom switcher of slider -->
            <ul class="hide-bullets" >
                <li class="col-sm-2 margin-right"><a class="thumbnail" id="carousel-selector-0"><img src="img/655-City-Park/655-city-park-800x450.jpg"></a></li>
                <li class="col-sm-2"><a class="thumbnail" id="carousel-selector-1"><img src="img/house2-800x450.jpg"></a></li>
                <li class="col-sm-2"><a class="thumbnail" id="carousel-selector-2"><img src="img/house3-800x450.jpg"></a></li>
                <li class="col-sm-2"><a class="thumbnail" id="carousel-selector-3"><img src="http://placehold.it/170x100&text=four"></a></li>
                <li class="col-sm-2"><a class="thumbnail" id="carousel-selector-4"><img src="img/house2-800x450.jpg"></a></li>
                <li class="col-sm-2"><a class="thumbnail" id="carousel-selector-5"><img src="img/house3-800x450.jpg"></a></li>
                <div class="row">
                <li class="col-sm-2"><a class="thumbnail" id="carousel-selector-6"><img src="img/house2-800x450.jpg"></a></li>
                <li class="col-sm-2"><a class="thumbnail" id="carousel-selector-7"><img src="img/house3-800x450.jpg"></a></li>
                </div>
            </ul>                 
        </div>
    </div>
</div> <!-- End entire slider container & thumbnails container -->