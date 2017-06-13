
<!-- Navigation -->
<nav class="navbar navbar-fixed-top navbar-default no-jump" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--a class="navbar-brand" href="#index-alternate.html">
                <img src="http://placehold.it/150x50&text=Logo" alt="">


            </a-->
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?= base_url('listings')?>" class="<?= ($active == 'listings') ? 'active' : ''?>">Listings</a></li>
                <li><a href="<?= base_url('faq/buyers')?>" class="<?= ($active == 'buyers') ? 'active' : ''?>">Buyers</a></li>
                <li><a href="<?= base_url('faq/sellers')?>" class="<?= ($active == 'sellers') ? 'active' : ''?>">Sellers</a></li>
                <li><a href="<?= base_url('home')?>"><i class="fa fa-home <?= ($active == 'home') ? 'active' : ''?>" aria-hidden="true"></i></a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>