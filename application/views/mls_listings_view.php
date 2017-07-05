<?php include 'includes/header.php' ?>  
<?php include 'includes/navigation.php' ?>

<div class="row">
    <div class="container col-md-4 col-md-push-8">
        <div class="container col-md-12" style="margin-bottom: 25px;">
            <?php require_once 'includes/jackie-sidebar.php'; ?>
        </div>
    </div>

    <div class="container col-md-8 col-md-pull-4">
        <div class="row">
            <div id="search-container">
                <h1>Search MLS Listings</h1>
                <form class="form" method="post" action="<?= base_url('mls/listings') ?>">
                    <div class="input-group col-xs-11">
                        <input type="text" class="form-control" placeholder="Address, City, Zip, Neighborhood" name="search" id="search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container col-xs-5">
                            <div class="input-group" style="margin-top: 10px;">
                                <input type="text" class="form-control" placeholder="Min Price" name="min-price" />
                            </div>
                        </div>
                        <div class="container col-xs-5" style="margin-top: 10px;">
                            <div class="input-group">
                                <input type="text" class="form-control " placeholder="Max Price" name="max-price" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br />
        <div class="row">
            <h4>Total Results: <?= $count ?></h4>
            <div id="mls-preview-content">
                <?php if (count($listings) === 0) : ?>
                    <div class="alert alert-info">
                        <h3>Sorry, no listings found to match your search</h3>
                    </div>
                <?php else : ?>
                    <?php include 'includes/mls-listings-preview.php' ?>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

<?php include 'includes/footer.php' ?>
