<form action="<?= base_url('listings/add_listing') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
    <fieldset>        
        <!-- div class="container-fluid form-group">
            <label for="input-address">Address</label>
            <input class="form-control" id="input-address" name="address" placeholder="Address" type="text" value="">
        </div>

        <div class="container-fluid form-group">
            <label for="input-neighborhood">Neighborhood</label>
            <input class="form-control" id="input-neighborhood" name="neighborhood" placeholder="Neighborhood" type="text" value="">
        </div -->
        
        <div class="form-group">
            <div class="col-xs-12 col-sm-3">
                <label for="input-address">Address</label>
                <input class="form-control" id="input-address" name="address" placeholder="Address" type="text" value="<?= isset($listing) ? $listing->getAddress() : '' ?>">
            </div>
            <div class="col-xs-12 col-sm-3">
                <label for="input-zip">Zip Code</label>
                <input class="form-control" id="input-zip" name="zip" placeholder="Zip Code" type="text" value="<?= isset($listing) ? $listing->getZip() : '' ?>">
            </div>
            <div class="col-xs-12 col-sm-3">
                <label for="input-neighborhood">Neighborhood</label>
                <input class="form-control" id="input-neighborhood" name="neighborhood" placeholder="Neighborhood" type="text" value="<?= isset($listing) ? $listing->getNeighborhood() : '' ?>">
            </div>
            
            <div class="col-xs-12 col-sm-3 input-group">
                <div class="col-xs-12">
                    <label>Listing Type</label>
                    <div class="radio">
                        <label>
                            <input name="listing-type" id="input-listing" value="sale" default type="radio" <?= (isset($listing) && $listing->getListingType() == 1) ? 'checked' : '' ?> >
                            For Sale
                        </label>
                        &nbsp;&nbsp;
                        <label>
                            <input name="listing-type" id="input-rental" value="rental" type="radio" <?= (isset($listing) && $listing->getListingType() == 2) ? 'checked' : '' ?> >
                            Rental
                        </label>
                    </div>
                </div>
            </div>

        </div>

        
        
        <div class="form-group">
            <div class="col-xs-6 col-sm-3">
                <label for="input-price">Price</label>
                <input class="form-control" id="input-price" name="price" placeholder="Price" type="text" value="<?= isset($listing) ? $listing->getPrice() : ''?>">
            </div>

            <div class="col-xs-6 col-sm-3">
                <label for="input-square-footage">Square Footage</label>
                <input class="form-control" id="input-square-footage" name="sq_ft" placeholder="Square Footage" type="text" value="<?= isset($listing) ? $listing->getSq_Ft() : ''?>">
            </div>

            <div class="col-xs-6 col-sm-3">
                <label for="input-bedrooms">Bedrooms</label>
                <input class="form-control" id="input-bedrooms" name="bedrooms" placeholder="# Bedrooms" type="text" value="<?= isset($listing) ? $listing->getBedrooms() : ''?>">
            </div>

            <div class="col-xs-6 col-sm-3">
                <label for="input-bathrooms">Bathrooms</label>
                <input class="form-control" id="input-bathrooms" name="bathrooms" placeholder="# Bathrooms" type="text" value="<?= isset($listing) ? $listing->getBathrooms() : ''?>">
            </div>
        </div>

        <div class="container-fluid form-group">
            <label for="input-additional">Description</label>
            <textarea class="form-control" id="input-desciption" name="description" rows="5"><?= isset($listing) ? $listing->getDescription() : 'Listing description' ?></textarea>
            <!--input class="form-control" id="input-additional" name="additional" placeholder="Additional info (separate with commas - not required)" type="text" value="PHP HERE IF USED"-->
        </div>

        <!-- Check flag for allowing image uploads in add listing form (only shown for new listing adds) -->
        <?php if (isset($new_listing_flag)) : ?>
            <div class="form-group">
                <div class="col-sm-5">
                    <label for="input-featured-image">Featured Image</label>
                    <input type="file" id="input-featured-image" name="featured-image" class="btn btn-default" accept="image/*" />
                </div>

                <div class="container-fluid col-sm-5">
                    <label for="input-featured-image">Gallery Images</label>
                    <input type="file" id="input-gallery-images" name="gallery-images[]" class="btn btn-default" accept="image/*" multiple />
                </div>
            </div>
        <?php endif; ?>

        
        
        <input type="hidden" name="listing-id" value="<?= (isset($listing)) ? $listing->getId() : '' ?>" />

        <br />
        <div class="form-group col-xs-12 align-right">
            <div>
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>

    </fieldset>
</form>