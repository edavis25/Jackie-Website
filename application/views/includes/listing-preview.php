<?php $image = Image::getImageById($listing->getFeaturedImage()) ?>
<div class="row listing-preview">
    <div class="col-sm-4">
        <img src="<?= base_url('img/uploads/') . $image->getFilename() ?>" class="img img-responsive" />
    </div>
    <div class="col-sm-8">
        <a href="<?= base_url('listings/view_listing/') . $listing->getId() ?>"><h3><?= $listing->getAddress() ?></h3></a>
        <h4 class="float-right">$<?= $listing->getPrice() ?></h4>
        <p><?= $listing->getNeighborhood() ?></p>
        <p>
            <?= $listing->getBedrooms() ?> Beds&nbsp;&bull;&nbsp;
            <?= $listing->getBathrooms() ?> Baths&nbsp;&bull;&nbsp;
            <?= $listing->getSq_ft() ?> sq ft
        </p>
        <p>
            <a href='<?= base_url('listings/view_listing/') . $listing->getId(); ?>'><i class="fa fa-list orange" aria-hidden="true"></i>&nbsp;View Details</a>&nbsp;&nbsp;&nbsp;
            <a href="javascript:" data-toggle="modal" data-href="<?= base_url('contact/show_request_form/') . $listing->getId() ?>" data-target="#contact-modal" class="request-info-link"><i class="fa fa-envelope-o orange" aria-hidden="true"></i>&nbsp;Request Information</a>
        </p>
    </div>
</div>   