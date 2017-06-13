<div class="row bordered" id="request-info-form">
    <form class="form">
        <div class="form-group col-xs-12">
            <h4>Request More Information</h4>
            <hr style="border-color: #D3D3D3" />
        </div>  
        <div class="form-group col-sm-6">
            <label for="first-name">First Name</label>
            <input type="text" class="form-control" id="first-name" name="first-name" />
        </div>

        <div class="form-group col-sm-6">
            <label for="last-name">Last Name</label>
            <input type="text" class="form-control" id="last-name" name="last-name" />
        </div>
        
        <div class="form-group col-xs-12">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" />
        </div>
        
        <div class="form-group col-xs-12">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" />
        </div>
        
        <div class="form-group col-xs-12">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5"><?= (isset($listing)) ? "I would like to receive more information about the listing at {$listing->getAddress()}." : "" ?></textarea>
        </div>
        
        <div class="form-group col-xs-12">
            <input type="submit" value="Submit" class="float-right" />
        </div>
    </form>
</div>
