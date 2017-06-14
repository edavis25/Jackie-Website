<div class="row bordered" id="request-info-container">
    <form class="form" id="request-info-form" method="POST" action="<?= base_url('contact/send_email') ?>">
        <div class="form-group col-xs-12">
            <h4>Request More Information</h4>
            <hr style="border-color: #D3D3D3" />
        </div>

        <div id="message-sent-status"></div>

        <div class="form-group col-sm-6">
            <label for="first-name" class="required">First Name</label>
            <input type="text" class="form-control" id="first-name" name="first-name" required />
        </div>

        <div class="form-group col-sm-6">
            <label for="last-name" class="required">Last Name</label>
            <input type="text" class="form-control" id="last-name" name="last-name" required />
        </div>

        <div class="form-group col-xs-12">
            <label for="email" class="required">Email</label>
            <input type="email" class="form-control" id="email" name="email" required />
        </div>

        <div class="form-group col-xs-12">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" />
        </div>

        <div class="form-group col-xs-12">
            <label for="message" class="required">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" required><?= (isset($listing)) ? "I would like to receive more information about the listing at {$listing->getAddress()}." : "" ?></textarea>
        </div>

        <input type="hidden" name="modal" value="<?= isset($modal) ? 'true' : '' ?>" />

        <div class="form-group col-xs-12">
            <input type="submit" value="Submit" class="float-right btn btn-success" id="request-info-submit" />
        </div>
    </form>
</div>
