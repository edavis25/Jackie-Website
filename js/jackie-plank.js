
$(document).ready(function() {
    // Add "modal-resizable" class to the Bootstap "modal-content" div class property
    $('.modal-resizable').resizable({
        minHeight: 300,
        minWidth: 300
    });
    
    $('.modal-dialog').draggable();

    // +/- menu collapse toggle
    $('.collapse').on('shown.bs.collapse', function () {
        $(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
    }).on('hidden.bs.collapse', function () {
        $(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
    });
    
    
    // Homepage Google map
    if ($("#map-container").length) {
        initMap();
    }
    
    
    $('#myCarousel').carousel({
        interval: false
    });
 
    $('#carousel-text').html($('#slide-content-0').html());
 
    //Handles the carousel thumbnails
    $('[id^=carousel-selector-]').click( function(){
        var id = this.id.substr(this.id.lastIndexOf("-") + 1);
        var id = parseInt(id);
        $('#myCarousel').carousel(id);
    });
 
    // When the carousel slides, auto update the text
    $('#myCarousel').on('slid.bs.carousel', function (e) {
        var id = $('.item.active').data('slide-number');
        $('#carousel-text').html($('#slide-content-'+id).html());
    });
});



function initMap() {
    var var_location = new google.maps.LatLng(39.94409, -82.99682);
    var var_location1 = new google.maps.LatLng(39.93632, -82.97733);
    var var_location2 = new google.maps.LatLng(39.95528, -82.92274);
    var var_location3 = new google.maps.LatLng(40.01236, -82.97664);
    var var_location4 = new google.maps.LatLng(40.03654, -83.00606);

    var var_mapoptions = {
        center: var_location,
        zoom: 10
    };

    var var_marker = new google.maps.Marker({
        position: var_location,
        map: var_map,
        title: "123 Fake St."});

    var var_marker1 = new google.maps.Marker({
        position: var_location1,
        map: var_map,
        title: "123 Fake St."});

    var var_marker2 = new google.maps.Marker({
        position: var_location2,
        map: var_map,
        title: "123 Fake St."});

    var var_marker3 = new google.maps.Marker({
        position: var_location3,
        map: var_map,
        title: "123 Fake St."});

    var var_marker4 = new google.maps.Marker({
        position: var_location4,
        map: var_map,
        title: "123 Fake St."});

    var var_map = new google.maps.Map(document.getElementById("map-container"),
            var_mapoptions);

    var_marker.setMap(var_map);
    var_marker1.setMap(var_map);
    var_marker2.setMap(var_map);
    var_marker3.setMap(var_map);
    var_marker4.setMap(var_map);
}


