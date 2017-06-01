<div class="container-fluid" id="edit-images-form">
    
    <div class="row">
        <div class="container-fluid">
            <div class="panel panel-success">
                <div class="panel-heading">
                    Upload New Images
                </div>
                <div class="panel-body">
                    <form method="POST" action="<?= base_url('images/add_images') ?>" class="container-fluid form-horizontal" enctype="multipart/form-data">
                        <input type="file" name="uploads[]" accept="image/*" class="btn btn-default btn-file inline-block" multiple required />
                        <input type="submit" id="upload-images-button" value="Upload Images" class="btn btn-success img-btn float-right" /> 
                        <input type="reset" class="btn btn-default img-btn float-right" />
                        <input type="hidden" name="listing-id" value="<?= $listing->getId() ?>" />
                    </form>
                </div>
            </div>
        </div>   
    </div>
    
    <hr />
    
    <div class="row">
        <b>Featured Image:</b><br />
        <?php if($featured_image->getId() !== NULL) : ?>
            <img src="<?= base_url('img/uploads/') . $featured_image->getFilename() ?>" class='img col-xs-12' style="max-height: 250px; width: auto" />
        <?php else: ?>
            <h4>No Featured Image Selected</h4>
        <?php endif; ?>
    </div>
    
    <hr />
    
    <div class="row">
    <b>Edit Available Images:</b><br />
    <?php
        // TODO: Remove the featured border logic (if not used)
        $idx = 1;
        foreach($gallery_images as $image) {
            $featured_str = null;
            
            if ($image->getId() == $featured_image->getId()) {
               // $featured_str = 'border: 3px solid red; border-radius: 3px';
            }
            
            $url = base_url('img/uploads/') . $image->getFilename();
            echo "<div class='container col-xs-12 col-sm-4' style='$featured_str'>
                    <img src='$url' class='img img-thumbnail img-click' id='{$image->getId()}' />
                  </div>";
            
            if ($idx % 3 == 0) {
                // Clearfix handles broken grid
                echo "<div class='clearfix'></div><br>";
            }
            $idx += 1;
        }
    ?>
    </div>
    
    <hr />
    
    <div class="row">
        
        <input type="hidden" id="listing-id" value="<?= $listing->getId() ?>" />

        <form method="POST" action="<?= base_url('images/delete_images') ?>">
            <input type="submit" id="delete-image-button" value="Delete Images" class="btn btn-danger float-right img-btn" />
            <div id="hidden-div"></div>
        </form>

        <input type="button" id="set-featured-image-button" value="Set Featured Image" class="btn btn-info float-right img-btn">


    </div>
</div>
    
    


