<?php include 'includes/header.php' ?>  
<?php include 'includes/navigation.php' ?>

<div class="row">
    <div class="container col-md-8">
        <div class="row">
            <div id="search-container" class='container col-xs-12'>
                <h1>Search MLS Listings</h1>
                <form class="form" method="post" action="<?= base_url('mls/listings') ?>">
                    <div class="input-group col-xs-11">
                        <input type="text" class="form-control" placeholder="Address, City, Zip, Neighborhood" name="search" id="search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container col-xs-5">
                            <div class="input-group" style="margin-top: 10px;">
                                <input type="text" class="form-control" placeholder="Min Price" name="min-price" />
                            </div>
                        </div>
                        <div class="container col-xs-5" style="margin-top: 10px;">
                            <div class="input-group">
                                <input type="text" class="form-control " placeholder="Max Price" name="max-price" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <br />
        
        <div class="row">
            <h4>Total Results: <?= $count ?></h4>
            <div id="mls-preview-content" class='container-fluid'>
                <?php if (count($listings) === 0) : ?>
                    <div class="alert alert-info">
                        <h3>Sorry, no listings found to match your search</h3>
                    </div>
                <?php else : ?>
                    <div class="container col-xs-12" id="listing-previews-modal-content">
                        <?php include 'includes/mls-listings-preview.php' ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class='loader-gif' style='display: none;'><img src='<?= base_url('img/ajax-loader.gif') ?>' /></div>      
        
        <div class='row'>
            <div class="container">
                 <ul class="pagination" id="pagination-demo">
                 </ul> 
            </div>
        </div>
        
        <script src="<?= base_url('vendor/pagination/jquery.twbsPagination.min.js') ?>"></script>
        <script>
            var totalPages =  parseInt('<?= ceil($count / $limit) ?>');
            var limit = parseInt('<?= $limit ?>');
            
            $('#pagination-demo').twbsPagination({
                //totalPages: 2,
                totalPages: totalPages,
                startPage: 1,
                onPageClick: function (page, evt) {
                    $('.page-link').on('click', function() {
                      // Prohibit events for disabled/active links
                      var parent = $(this).parent();
                      //if ($(this).parent().hasClass('disabled') || $(this).parent().hasClass('active')) {
                      if ($(parent).hasClass('disabled') || $(parent).hasClass('active')) {
                          return;
                      }
                      
                      // Active page #
                      var active = $('#pagination-demo .active').text();
                      // Selected page #
                      var selected = $(this).html();
                      // Set offset for ajax call
                      var offset = 1;
                      switch (selected) {
                          case 'First' :
                              offset = 0;
                              break;
                          case 'Last' :
                              offset = totalPages;
                              break;
                          case 'Previous' : 
                              offset = parseInt(active) - 1;
                              break;
                          case 'Next' :
                              offset = parseInt(active) + 1;
                              break;
                          default: 
                              offset = parseInt(selected);
                              break;
                      }
                     
                     offset = offset * limit - limit;
                      var last = getLastMls();
                      var search = $('#search-term').val();
                      
                      var url = getRootUrl() + 'mls/ajax_search/' + search + '/' + last + '/' + offset + '/' + limit;                 // CHANGE URL HERE!
                      //alert(url);
                      
                      $.get(url, function(data) {
                          $("#listing-previews-modal-content").html(data);
                      });

                   });
                }
            });     
            
            function loadResults() {
                
            }
            
            function getLastMls() {
                var listings = $('.listing-preview');
                var last = listings.slice(-1);
                //alert(last.find('.mls-id').html());
                return last.find('.mls-id').html();
            }
    
        </script>
    </div>
    
    <div class="container col-md-4">
        <div class="container col-md-12" style="margin-bottom: 25px;">
            <?php require_once 'includes/jackie-sidebar.php'; ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php' ?>
