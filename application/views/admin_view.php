<?php require_once 'includes/header.php'; ?>

<div class="jumbotron">
    <h2>Add &amp; Edit Listings</h2>
</div>

<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">Add New Listing</h3>
    </div>
    <div class="panel-body">
        <?php include 'includes/edit-listing-form.php'; ?>
    </div>
</div>


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
                        <form class="inline">
                            <!--a class="btn btn-warning" value="Edit Listing Info" data-toggle="modal" data-target="#edit-listing" / -->
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#listing-modal">Edit Listing Info</button>
                            <input type="hidden" name="listing-id" value="" />
                        </form>
                    </div>

                    <!-- TODO: Create New Modal -->
                    <div class="help-block col-xs-12 col-sm-3">
                        <form class="inline">
                            <!--a class="btn btn-warning" value="Edit Listing Info" data-toggle="modal" data-target="#edit-listing" / -->
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#listing-modal">Edit Listing Photos</button>
                            <input type="hidden" name="listing-id" value="" />
                        </form>
                    </div>

                    <div class="help-block col-xs-12 col-sm-3">
                        <div class="delete-wrapper">
                            <a href="##" class="btn btn-danger delete-button">Delete</a>
                            <span class="confirm-delete" style="display: none;"> 
                                <form action=" " method="POST" class="inline">
                                    <input type="submit" class="btn" value="yes" />
                                    <input type="hidden" name='delete-id' value=" " />
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

<!-- Modal -->
<div class="modal fade" id="listing-modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
                <?php include 'includes/edit-listing-form.php'; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>

