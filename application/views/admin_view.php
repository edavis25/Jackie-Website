<?php require_once 'includes/header.php'; ?>

<div class="jumbotron">
    <h2>Add &amp; Edit Listings</h2>
</div>

<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">Add New Listing</h3>
    </div>
    <div class="panel-body">
        <?php include_once 'includes/edit-listing-form.php'; ?>
    </div>
</div>


<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">Edit Listings</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <?php foreach($listings as $listing) : ?>
                <tr>
                    <td><?= $listing->getAddress() ?></td>
                    <td><?= $listing->getNeighborhood() ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>


<?php require_once 'includes/footer.php'; ?>