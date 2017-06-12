        <footer class="container-fluid">
            <hr style="border: 1px solid white" />
            <p>The Jackie Plank Team&trade; 2017</p>
            <img src="<?= base_url('img/realtor-icon.png')?>" alt="Realtor logo" class="img img-responsive logo-icon"/>
            <img src="<?= base_url('img/bbb-icon.png')?>" alt="BBB logo" class="img img-responsive logo-icon" />
            <img src="<?= base_url('img/equal-housing.png')?>" alt="Equal Housing Opportunity logo" class="img img-responsive logo-icon" />
        </footer>
    </div> <!-- End page container (opened in header) -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>   
   
    <!-- Fancybox Plugin -->
    <script src="<?= base_url('vendor/fancybox/jquery.fancybox.js')?>"></script>
    
    <!-- Flexslider Plugin -->
    <script src="<?= base_url('vendor/flexslider/jquery.flexslider-min.js') ?>"></script>
    <script>
        $(document).ready(function() {
        // The slider being synced must be initialized first
            $('#carousel-thumbnails').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 150,
                itemMargin: 5,
                asNavFor: '#homepage-slider',
                touch: true
            });
        
            $('#homepage-slider').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                sync: "#carousel-thumbnails",
                touch: true,
                multipleKeyboard: true
            });
        });
    </script>
    
    <!-- Scroll Reveal -->
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>

    <!-- Custom JavaScript & document.ready() initializations -->
    <!-- NOTE: For deployment, minimize & concat all files -->
    <script src="<?= base_url('js/jackie-plank.js'); ?>"></script>
    <script src="<?= base_url('js/listings.js'); ?>"></script>
    
    
    <!-- JavaScript code snippet for embedded Facebook page -->
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) 
		{
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
            fjs.parentNode.insertBefore(js, fjs);
	}
	(document, 'script', 'facebook-jssdk'));
    </script>
    
</body>
</html>