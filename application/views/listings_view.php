<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navigation.php'; ?>

<!-- Page Content -->
<div class="row">

    <?php require_once 'includes/jackie-sidebar.php'; ?>
    
    <!-- Tabbed content container -->
    <div class="container col-md-8 col-md-pull-4 tab-container">
        <div class="row bordered">
            <ul class="larger-text nav nav-tabs">
                <li class="active"><a href="#listings" data-toggle="tab">Featured Listings</a></li>
                <li><a href="#rentals" data-toggle="tab">Rental Properties</a></li>
            </ul>

            <!-- All Tabs Content -->
            <div id="myTabContent" class="tab-content">
                <!-- Listings Tab -->
                <div class="tab-pane fade active in" id="listings">
                    <div>
                        <p>This is the active tab!</p>
                    
                        <?php include_once 'includes/listings-slider.php'; ?>
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

<?php require_once 'includes/footer.php'; ?>