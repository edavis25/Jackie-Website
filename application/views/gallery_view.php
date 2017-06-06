<div class="row">
    <?php $idx = 0; ?>
    <?php foreach ($images as $image) : ?>
        <div class="container col-sm-3 bot-10">
            <a data-fancybox="gallery" data-type="image" href="<?= base_url('img/uploads/') . $image->getFilename() ?>">
                <img src="<?= base_url('img/uploads/') . $image->getFilename() ?>" class="img img-thumbnail center-block" style="max-height: 150px; max-width: 200px;">
            </a>
        </div>
    <?php $idx += 1 ?>
    <?php if($idx % 4 == 0) : ?>
        <div class='clearfix'></div>
    <?php endif; ?>
    <?php endforeach; ?>
</div>