<?php require_once 'includes/header.php' ?>
<?php require_once 'includes/navigation.php' ?>

<!-- Main page row -->
<div class="row row-fluid">

    <div class="container col-md-8  tab-container"> 
        <!--a href="" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;&nbsp;Back to Listings</a>
        <br /><br / -->
        
        <h1>
            <?= $listing->getAddress() ?>
            <small><span class="text-muted"><?= $listing->getNeighborhood() . ', ' . $listing->getZip()?></span></small>
        </h1>
        
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#info-tab">Listing Information</a></li>
            <li><a data-toggle="tab" href="#demo-tab">Neighborhood Demographics</a></li>
        </ul>
        
        <!-- Tab content wrapper -->
        <div class="tab-content">  
            <!-- Listing info tab -->
            <div id="info-tab" class="tab-pane fade in active">
                <div class="row">
                    <!-- Image Slider -->
                    <div id="homepage-slider" class="flexslider">
                        <ul class="slides">
                            <!-- Featured Image -->
                            <li>
                                <div class="img-container">
                                    <img src="<?= base_url('img/uploads/') . $featured_image->getFilename();?>" class="img img-responsive home-carousel" />
                                </div>
                            </li>

                            <!-- Gallery Images -->
                            <?php foreach ($gallery_images as $image) : ?>
                                <li>
                                    <img src="<?= base_url('img/uploads/') . $image->getFilename() ?>" class="img img-responsive home-carousel" />
                                </li>
                            <?php endforeach; ?>
                        </ul><!-- items mirrored twice, total of 12 -->
                    </div>

                    <div id="carousel-thumbnails" class="flexslider hidden-xs">
                        <ul class="slides">
                            <!-- Featured Image -->
                            <li>
                                <img src="<?= base_url('img/uploads/') . $featured_image->getFilename() ?>" class="img img-responsive img-thumbnail" />
                            </li>

                            <!-- Gallery Images -->
                            <?php foreach ($gallery_images as $image) : ?>
                                <li>
                                    <img src="<?= base_url('img/uploads/') . $image->getFilename() ?>" class="img img-responsive img-thumbnail"
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <h4>Details</h4>
                    <p class='larger-text'>
                        <b>$<?= $listing->getPrice() ?></b>&nbsp;&bull;&nbsp;
                        <?= $listing->getBedrooms() ?> Beds&nbsp;&bull;&nbsp;
                        <?= $listing->getBathrooms() ?> Bathrooms&nbsp;&bull;&nbsp;
                        <?= $listing->getSq_ft() ?> Square Feet
                    </p>
                    <hr />
                    <h4>Description</h4>
                    <p class='larger-text'>
                        <?= $listing->getDescription() ?>
                    </p>
                </div>

            </div> <!-- End listing info tab content -->
            
            <!-- Demographics tab -->
            <div id="demo-tab" class="tab-pane fade">
                <div class="row">
                    <h3 class="orange">Population</h3>
                    <div class="bot-pad-10 col-xs-5">
                        <b>Total Population</b><br />
                        <?= $demo['Population']['Total'] ?>
                    </div>
                    <div class="bot-pad-10 col-xs-5">
                        <b>Population Density</b><br />
                        <?= $demo['Population']['Density'] ?>
                    </div>
                    <div class="bot-pad-10 col-xs-5">
                        <b>Total Households</b><br />
                        <?= $demo['Households']['Total'] ?>
                    </div>
                    <div class="bot-pad-10 col-xs-5">
                        <b>Median Age</b><br />
                        <?= $demo['Population']['MedianAge'] ?>
                    </div>
                    <div class="bot-pad-10 col-xs-5">
                        <b>Average Household Size</b><br />
                        <?= $demo['Households']['AveSize'] ?>
                    </div>
                    <div class="bot-pad-10 col-xs-5">
                        <b>Median Rent</b><br />
                        <?= $demo['Households']['MedianRent'] ?>
                    </div>
                </div>
                
                <br />
                <hr style="border-color: #D3D3D3" />
                
                <div class="row">
                    <h3 class="orange">Population by Age</h3>
                    <div id="age-chart" style="width:100%; height:350px;"></div>
                </div>
                
                
                <div class="row">
                    <h3 class="orange">Education</h3>
                    <div class="col-sm-6">
                        <div id="highest-education-chart" style="width:100%; height:350px;"></div>
                    </div>
                    <div class="col-sm-6">
                        <div id="current-enrollment-chart" style="width:100%; height:350px;"></div>
                    </div>
                </div>
                
                <div class="row">
                    <h3 class="orange">Income &amp; Employment</h3>
                    <div class="col-sm-6">
                        <div id="annual-income-chart" style="width:100%; height:350px;"></div>
                    </div>
                    <div class="col-sm-6">
                        <div id="commute-chart" style="width:100%; height:350px;"></div>
                    </div>
                </div>
                
                <br />
                
                <div class="row">
                    <div class="col-sm-7">
                        <div id="employment-type-chart" style="width:100%; height:350px"></div>
                    </div>
                    <div class="col-sm-5">
                        <div id="collar-type-chart" style="width:100%; height:300px"></div>
                    </div>
                </div>
                
            </div> <!-- End Demographics Tab -->    
        </div>
         
    </div>
    
    <div class="container col-md-4 ">
        <div class="container col-md-12">
            <?php require 'includes/jackie-sidebar.php'; ?>
            <br />
            <?php require 'includes/request-info-form.php'; ?>
        </div>
    </div>
    
</div>

<script src="<?= base_url('js/charts.js'); ?>"></script>
<script>
    $(document).ready(function() {
        // Call Highcharts initilization functions with JSON data
        ageChart(<?= json_encode($demo['Population']['Ages']['Keys']) ?>, <?= json_encode($demo['Population']['Ages']['Values']) ?>);
        highestEducationChart(<?= json_encode($demo['Education']['Level']['Keys']) ?>, <?= json_encode($demo['Education']['Level']['Values']['Highest Level Completed']) ?>);
        currentEnrollmentChart(<?= json_encode($demo['Education']['Enrolled']['Keys'])?>, <?= json_encode($demo['Education']['Enrolled']['Values']['Current Enrollment']) ?>);
        annualIncomeChart(<?= json_encode($demo['Wealth']['Incomes']['Keys']) ?>, <?= json_encode($demo['Wealth']['Incomes']['Values']['Incomes']) ?>);        
        commuteChart(<?= json_encode($demo['Wealth']['Commute']['Keys']) ?>, <?= json_encode($demo['Wealth']['Commute']['Values']['Commute']) ?>);
        employmentTypeChart(<?= json_encode($demo['Wealth']['Occupations']['Keys']) ?>, <?= json_encode($demo['Wealth']['Occupations']['Values']['Occupations']) ?>);
        collarTypeChart(<?= json_encode($demo['Wealth']['EmployeeClass']['Keys']) ?>, <?= json_encode($demo['Wealth']['EmployeeClass']['Values']['Employment Class']) ?>);
    });
</script>
<?php require_once 'includes/footer.php' ?>
