<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navigation.php'; ?>

<!-- Page Content -->
<div class="row">
    <!-- Show any flash data -->
    <?php if (!empty($this->session->flashdata())) : ?>
        <div class="alert alert-dismissible alert-<?= $this->session->flashdata('message_type') ?>">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong><?= html_entity_decode($this->session->flashdata('message_content')) ?></strong>
        </div>
    <?php endif; ?>


    <div class="container col-md-4 col-md-push-8">
        <div class="container col-md-12" style="margin-bottom: 25px;">
            <?php require_once 'includes/jackie-sidebar.php'; ?>
        </div>
        <h3 id="calculator">Mortgage Calculator</h3>
        <div id="mortgage-calculator"></div>
    </div>
    
    <!-- Tabbed content container -->
    <div class="container col-md-8 col-md-pull-4 tab-container">
        <div class="row">
            <ul class="larger-text nav nav-tabs">
                <li class="active"><a href="#listings" data-toggle="tab">Featured Listings</a></li>
                <li><a href="#rentals" data-toggle="tab">Rental Properties</a></li>
            </ul>

            <!-- All Tabs Content -->
            <div id="myTabContent" class="tab-content">
                
                <!-- Featured Listings Tab -->
                <div class="tab-pane fade active in" id="listings">
                    <!-- div -->
                        <div class="container col-xs-12">
                            <?php foreach($listings as $listing) :?>
                                <?php include 'includes/listing-preview.php' ?>
                            <?php endforeach; ?>
                        </div> 
                    <!-- /div -->
                </div> <!-- End listings tab content -->
             
                <!-- Rentals Tab -->
                <div class="tab-pane fade" id="rentals">
                    <div class="container col-xs-12">
                        <?php foreach($rentals as $listing) : ?>
                            <?php include 'includes/listing-preview.php' ?>
                        <?php endforeach; ?>
                    </div>
                </div> <!-- End rentals tab content -->
                
            </div> <!-- End all tab content -->
        </div> <!-- End main tabbed content row -->
    </div> <!-- End main tabbed content container -->
    
</div> <!-- End main page row -->


<!-- Request Info Modal -->
<div class="modal fade" id="contact-modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <!-- Populated with AJAX -->
                <div id="contact-modal-content"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
       $('#mortgage-calculator').homenote();
    });
</script>

<?php require_once 'includes/footer.php'; ?>



