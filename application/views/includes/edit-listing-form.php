<form action="<?= base_url('listings/add_listing')?>" method="post" class="form-horizontal" enctype="multipart/form-data">
    <fieldset>
        
        <div class="col-xs-12 form-group">
            <label for="input-address">Address</label>
            <input class="form-control" id="input-address" name="address" placeholder="Address" type="text">
        </div>
        
        <div class="col-xs-12 form-group">
            <label for="input-neighborhood">Neighborhood</label>
            <input class="form-control" id="input-neighborhood" name="neighborhood" placeholder="Neighborhood" type="text">
        </div>
        
        <div class="form-group col-xs-12 ">
            <div class="col-xs-6 col-sm-3">
                <label for="input-price">Price</label>
                <input class="form-control" id="input-price" name="price" placeholder="Price" type="text">
            </div>
            <div class="col-xs-6 col-sm-3">
                <label for="input-square-footage">Square Footage</label>
                <input class="form-control" id="input-square-footage" name="sq_ft" placeholder="Square Footage" type="text">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                <label for="input-bedrooms">Bedrooms</label>
                <input class="form-control" id="input-bedrooms" name="bedrooms" placeholder="# Bedrooms" type="text">
            </div>
            
            <div class="col-xs-6 col-sm-3">
                <label for="input-bathrooms">Bathrooms</label>
                <input class="form-control" id="input-bathrooms" name="bathrooms" placeholder="# Bathrooms" type="text">
            </div>
        </div>
        
        <div class="col-xs-12 form-group">
            <label for="input-additional">Additional Information</label>
            <input class="form-control" id="input-additional" name="additional" placeholder="Additional info (separate with commas - not required)" type="text">
        </div>
        
        <div class="col-xs-12 form-group">
            <div class="col-xs-6 col-sm-4 col-md-3">
                <label for="input-featured-image">Featured Image</label>
                <input type="file" id="input-featured-image" name="featured-image" accept="image/*" />
            </div>
            
            <div class="col-xs-6 col-sm-4 col-md-3">
                <label for="input-featured-image">Gallery Images</label>
                <input type="file" id="input-gallery-images" name="gallery-images[]" accept="image/*" multiple />
            </div>
            
            <div class="col-xs-6 col-sm-4 col-md-3">
                <label>Listing Type</label>
                <div class="radio">
                    <label>
                        <input name="listing-type" id="input-listing" value="listing" checked="" default type="radio">
                        For Sale
                    </label>
                    <label>
                        <input name="listing-type" id="input-rental" value="rental" type="radio">
                        Rental
                    </label>
                </div>
            </div>
               
        </div>
        
        <br />
        <div class="form-group col-xs-12 align-right">
            <div>
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        
    </fieldset>
</form>