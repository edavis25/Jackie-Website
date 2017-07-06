<div class="row">
    Showing results <?= $page ?> to <?= $page + count($listings) - 1 ?> of <?= $count ?>
</div>
<div class='row'>
    <?php foreach ($listings as $listing) : ?>
        <div class="row listing-preview">
            <div class="col-sm-4">
                <img src='<?= $listing['photos'][0] ?>' class="img img-responsive" />
            </div>
            <div class="col-sm-8">
                <h3><a href="<?= base_url('listings/view_listing/') ?>"><?= $listing['address']['streetNumber'] . ' ' . $listing['address']['streetName'] ?></a></h3>
                <h5 class="float-right">$<?= number_format($listing['listPrice'], 0, '.', ',') ?></h5>
                <p>
                    <?= $listing['property']['subdivision'] ?><br />
                    <?= $listing['address']['city'] . ', ' . $listing['address']['state'] . ' ' . $listing['address']['postalCode']?><br />
                    <i class="fa fa-bed" aria-hidden="true"></i>
                    <?= $listing['property']['bedrooms'] ?> Bedrooms&nbsp;|&nbsp;
                    <i class="fa fa-bath" aria-hidden="true"></i>
                    <?= $listing['property']['bathsFull'] . '.' . $listing['property']['bathsHalf'] ?> Bathrooms&nbsp;|&nbsp;
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    <?= $listing['property']['area'] ?> SqFt<br />
                    MLS # <span class='mls-id'><?= $listing['mlsId'] ?></span><br />
                    Agent: <?= $listing['agent']['firstName'] . ' ' . $listing['agent']['lastName'] ?><br />
                    
                </p>
                <p>
                    <a href=''><i class="fa fa-list orange" aria-hidden="true"></i>&nbsp;View Details</a>&nbsp;&nbsp;&nbsp;
                    <a href="javascript:" data-toggle="modal" data-href="<?= base_url('contact/show_request_form/') ?>" data-target="#contact-modal" class="request-info-link"><i class="fa fa-envelope-o orange" aria-hidden="true"></i>&nbsp;Request Information</a>
                </p>
            </div>
            <input type="hidden" value="<?= $listing['mlsId'] ?>" class="mls-id" />
        </div>
    <?php endforeach; ?>
    <input type='hidden' value='<?= $search ?>' id='search-term' />
    <input type='hidden' value='<?= $limit ?>' id='search-limit' />
</div>
