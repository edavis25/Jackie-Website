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
            <div class="container">
                Showing results 1 of .
                <?= $links ?>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="container-fluid">
            <?php foreach($listings as $listing) :?>            

                <div class="row listing-preview">
                    <div class="col-sm-4">
                        <img src='<?= $listing['photos'][0] ?>' class="img img-responsive" />
                    </div>
                    <div class="col-sm-8">
                        <h3><a href="<?= base_url('listings/view_listing/') ?>">Addy</a></h3>
                        <h5 class="float-right">$10000</h5>
                        <p>
                            Testing
                        </p>
                        <p>
                            <a href=''><i class="fa fa-list orange" aria-hidden="true"></i>&nbsp;View Details</a>&nbsp;&nbsp;&nbsp;
                            <a href="javascript:" data-toggle="modal" data-href="<?= base_url('contact/show_request_form/') ?>" data-target="#contact-modal" class="request-info-link"><i class="fa fa-envelope-o orange" aria-hidden="true"></i>&nbsp;Request Information</a>
                        </p>
                    </div>
                </div>  
            
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php' ?>
