<div class="container-fluid" id="edit-images-form">
    <div class="row">
    <?php
        $idx = 1;
        foreach($gallery_images as $image) {
            $featured_str = null;
            
            if ($image->getId() == $featured_image->getId()) {
                $featured_str = 'border: 3px solid red;';
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
    <div class="row">
        <input type="button" id="set-featured-image-button" value="Set Featured Image" class="btn btn-info float-right img-btn" />
        <form method="POST" action="<?= base_url('images/delete_images')?>">
            <input type="submit" id="delete-image-button" value="Delete Images" class="btn btn-danger float-right img-btn" />
            <div id="hidden-div"></div>
        </form>
    </div>
</div>
    
    


