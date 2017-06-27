<?php include 'includes/header.php' ?>
<?php include 'includes/navigation.php' ?>

<div class="row">
    
    <?php foreach($listings as $listing) :?>
        <div class="container">
            <img src='<?= $listing['photos'][0] ?>' />
            <p><?= $listing['address']['full'] ?></p>
        </div>
    <?php endforeach; ?>
    
</div>

<?php include 'includes/footer.php' ?>
