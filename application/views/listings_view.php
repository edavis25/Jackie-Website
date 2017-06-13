<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navigation.php'; ?>

<!-- Page Content -->
<div class="row">

    <div class="container col-md-4 col-md-push-8">
        <div class="container col-md-12">
            <?php require_once 'includes/jackie-sidebar.php'; ?>
        </div>
    </div>
    
    <!-- Tabbed content container -->
    <div class="container col-md-8 col-md-pull-4 tab-container">
        <div class="row">
            <ul class="larger-text nav nav-tabs">
                <li class="active"><a href="#listings" data-toggle="tab">Listings</a></li>
                <li><a href="#rentals" data-toggle="tab">Rental Properties</a></li>
            </ul>

            <!-- All Tabs Content -->
            <div id="myTabContent" class="tab-content">
                <!-- Listings Tab -->
                <div class="tab-pane fade active in" id="listings">
                    <div>
                        
                        <div class="container col-xs-12">
                            <?php foreach($listings as $listing) :?>
                                <?php $image = Image::getImageById($listing->getFeaturedImage()) ?>
                                <div class="row listing-preview">
                                    <div class="col-sm-4">
                                        <img src="<?= base_url('img/uploads/') . $image->getFilename() ?>" class="img img-responsive" />
                                    </div>
                                    <div class="col-sm-8">
                                        <a href="<?= base_url('listings/view_listing/') . $listing->getId() ?>"><h3><?= $listing->getAddress() ?></h3></a>
                                        <h5 class="float-right">$<?= $listing->getPrice() ?></h5>
                                        <p><?= $listing->getNeighborhood() ?></p>
                                        <p>
                                            <?= $listing->getBedrooms() ?> Beds&nbsp;&bull;&nbsp;
                                            <?= $listing->getBathrooms() ?> Baths&nbsp;&bull;&nbsp;
                                            <?= $listing->getSq_ft() ?> sq ft
                                        </p>
                                        <p>
                                            <a href='<?= base_url('listings/view_listing/') . $listing->getId(); ?>'><i class="fa fa-list orange" aria-hidden="true"></i>&nbsp;View Details</a>&nbsp;&nbsp;&nbsp;
                                            <a><i class="fa fa-envelope-o orange" aria-hidden="true"></i>&nbsp;Request Information</a>
                                        </p>
                                    </div>
                                    
                                    <!--form class="gallery-form">
                                        <input type="hidden" value="" name="listing-id" />
                                        <button type="submit" class="btn btn-default" data-toggle="modal" data-target="#gallery-modal">View Photos</button>
                                    </form-->
                                    
                                </div>
                            
                            <?php endforeach; ?>
                        </div>
                        
                        
                        
                    </div>
                </div> <!-- End listings tab content -->

                <!-- Rentals Tab -->
                <div class="tab-pane fade" id="rentals">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div> <!-- End rentals tab content -->

            </div> <!-- End all tab content -->
        </div> <!-- End main tabbed content row -->
    </div> <!-- End main tabbed content container -->
    
</div> <!-- End main page fluid row -->

<!-- MARKED FOR REMOVAL (ALSO CHECK AJAX CALL -->
<!-- Gallery Images Modal -->
<div class="modal fade" id="gallery-modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Title</h4>
            </div>
            <div class="modal-body">
                <div id="gallery-modal-content"></div>
                
                <!--a data-fancybox="gallery" href="img/agnes150.jpg"><img src="img/agnes150.jpg"></a>
                <a data-fancybox="gallery" href="img/agnes150.jpg"><img src="img/agnes150.jpg"></a-->
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>



