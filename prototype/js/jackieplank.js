/*
 * Switch Plus/Minus on collapsable panels
 */
$('.collapse').on('shown.bs.collapse', function(){
$(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
}).on('hidden.bs.collapse', function(){
$(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
});


/*
 * Resizable & Draggable Modals
 */
// Add "modal-resizable" class to the Bootstap "modal-content" div class property
$('.modal-resizable').resizable
({
	//alsoResize: ".modal-dialog",
		minHeight : 300,
		minWidth : 300
});

$('.modal-dialog').draggable();

// Test this for removal
$('#listings-modal').on('show.bs.modal', function() 
{
	$(this).find('.modal-body').css({'max-height' : '100%'});
});