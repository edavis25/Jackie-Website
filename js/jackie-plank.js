$(document).ready(function () {
    // Add "modal-resizable" class to the Bootstap "modal-content" div class property
    $('.modal-resizable').resizable({
        minHeight: 300,
        minWidth: 300
    });

    $('.modal-dialog').draggable();
    
    $('.collapse').on('shown.bs.collapse', function(){
        $(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
    }).on('hidden.bs.collapse', function(){
        $(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
    });
});

