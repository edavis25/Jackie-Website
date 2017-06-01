<?php require_once 'includes/header.php'; ?>

<!-- Show any flash data -->
<?php if (!empty($this->session->flashdata())) : ?>
    <div class="alert alert-dismissible alert-<?= $this->session->flashdata('message_type') ?>">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong><?= html_entity_decode($this->session->flashdata('message_content')) ?></strong>
    </div>
<?php endif; ?>

<h1>Add &amp; Edit Listings</h1>

<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">Add New Listing</h3>
    </div>
    <div class="panel-body">
        <?php include 'includes/edit-listing-form.php'; ?>
    </div>
</div>

<!-- Edit Existing Listings Panel -->
<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">Edit Listings</h3>
    </div>
    <div class="panel-body">
        
        <?php foreach ($listings as $listing) : ?>
            <section class="row">
                <div class="container-fluid well">
                    
                    <div class="help-block col-xs-12 col-sm-3">
                        <b><?= $listing->getAddress() ?></b>
                        <br />
                        <?= $listing->getPrice() ?>
                    </div>

                    <div class="help-block col-xs-12 col-sm-3">
                        <form class="inline edit-listing-btn">
                            <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#listing-modal">Edit Listing Info</button>
                            <input type="hidden" name="listing-id" value="<?= $listing->getId() ?>" />
                        </form>
                    </div>

                    <div class="help-block col-xs-12 col-sm-3">
                        <form class="inline edit-images-btn">
                            <button type="submit" class="btn btn-warning" data-toggle="modal" data-target="#images-modal">Edit Listing Photos</button>
                            <input type="hidden" name="listing-id" value="<?= $listing->getId() ?>" />
                        </form>
                    </div>

                    <div class="help-block col-xs-12 col-sm-3">
                        <div class="delete-wrapper">
                            <a href="##" class="btn btn-danger delete-button">Delete Listing</a>
                            <span class="confirm-delete" style="display: none;"> 
                                <form action="<?= base_url('listings/delete_listing') ?>" method="POST" class="inline">
                                    <input type="submit" class="btn" value="yes" />
                                    <input type="hidden" name='delete-id' value="<?= $listing->getId() ?>" />
                                </form>
                                /<a href="##" class="delete-button btn">no</a>
                            </span>
                        </div>
                    </div>
                </div>
            </section>
        <?php endforeach; ?>

    </div>
</div>


<!-- Edit Listing Modal -->
<div class="modal fade" id="listing-modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Listing</h4>
            </div>
            <div class="modal-body">

                <div id="edit-listing-modal-content"></div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Images Modal -->
<div class="modal fade" id="images-modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close close-images" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Listing Images</h4>
            </div>
            <div class="modal-body">
                
                <div id="edit-images-modal-content"></div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default close-images" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>

