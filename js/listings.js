// AJAX calls & events for editing/viewing listings

// Note: Check URLs when deploying to live server - ('jackie') used in localhost will need removed

$(document).ready(function () {

    // Open edit listing info modal
    $('.edit-listing-btn').on('submit', function (event) {
        event.preventDefault();
        var url = getRootUrl() + 'jackie/listings/edit_listing?';        // UPDATE URL HERE
        url += $(this).serialize();

        loadDoc('edit-listing-modal-content', url);
    });


    // Open edit listing images modal and delegate events
    $('.edit-images-btn').on('submit', function (event) {
        event.preventDefault();
        var url = getRootUrl() + 'jackie/images/edit_images?';          // UPDATE URL HERE
        url += $(this).serialize();

        loadDoc('edit-images-modal-content', url);

        // Image selection events (inside edit listing images modal)
        // Adds or removes the selected class when image is clicked to find user selections
        // Also enables/disables the Set Featured Image and Delete Images buttons
        $('#edit-images-modal-content').off('click', '.img-click').on('click', '.img-click', function () {
            if ($(this).hasClass('img-selected')) {
                $(this).removeClass('img-selected');
                $(this).css('border', 'none');

                $('#hide-' + $(this).attr('id')).remove();
            } else {
                $(this).addClass('img-selected');
                $(this).css('border', '3px solid blue');
                
                // Add hidden fields containing the ID of selected images
                $('#hidden-div').append('<input type="hidden" id="hide-' + $(this).attr('id') + '" name="delete-ids[]" value="' + $(this).attr('id') + '" />');
            }

            // Enable/Disable Set Featured Image and Delete buttons
            var selections = $('.img-selected');
            // Delete button
            if (selections.length > 0) {
                $('#delete-image-button').prop('disabled', false);
            }
            else {
                $('#delete-image-button').prop('disabled', true);
            }
            // Set featured image buton
            if (selections.length === 1) {
                $('#set-featured-image-button').prop('disabled', false);
            }
            else {
                $('#set-featured-image-button').prop('disabled', true);
            }
            
            return false;
        });


        // Set featured image button click
        $('#edit-images-modal-content').off('click', '#set-featured-image-button').on('click', '#set-featured-image-button', function () {

            if ($('.img-selected').length !== 1) {
                var str = '0 or more than 1 images selected. Please select exactly 1 image from the "Edit Available Images" section to set as featured image.\n\n' +
                        'Note: If you are trying to upload a featured image, you must first upload image with "Upload Images" (top of screen) and then select \nthe image thumbnail from the list of available images before you can use "Set Featured Image"';
                alert(str);
                return;
            }

            //var url = getRootUrl() + 'jackie/images/set_featured_image/';        // UPDATE URL HERE
            //location.href = url + $('.img-selected').attr('id') + "/" + $('#listing-id').val();
            
            var imgId = $('.img-selected').attr('id');
            var listingId = $('#listing-id').val();
            var url = getRootUrl() + 'jackie/images/set_featured_image/' + imgId +'/' + listingId;          // UPDATE URL HERE
            
            $.get(url, function(data) {
                $('#edit-images-modal-content').html(data);
            });

        });
        
        
        // Upload images button click / form submit
        $('#edit-images-modal-content').off('submit', '#upload-images-form').on('submit', '#upload-images-form', function(event) {
            event.preventDefault();
            var formData = new FormData($('#upload-images-form')[0]);
            
            $.ajax({
                url: $('#upload-images-form').attr('action'),
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success:function(data) {
                    $('#edit-images-modal-content').html(data);
                },
                error:function() {
                    alert("ERROR: AJAX upload error.");
                }
            });
        });
        
        
        // Delete images button click / form submit
        $('#edit-images-modal-content').off('submit', '#delete-images-form').on('submit', '#delete-images-form', function(event) {
            event.preventDefault();
            var formData = $(this).serializeArray();
            // Append listing id to serialized data
            formData.push({
                name: 'listing-id',
                value: $('#listing-id').val()
            });
            
            $.ajax({
               url: $(this).attr('action'),
               type: 'POST',
               data: formData,
               traditional: true,
               success:function(data) {
                   $('#edit-images-modal-content').html(data);
               },
               error:function() {
                   alert("ERROR: AJAX submit error.");
               }
            });
        });
        
        
    }); // End edit listing images events


    // When edit images modal closed, remove data from dom
    $('.close-images').on('click', function () {
        $('#edit-images-modal-content').remove('#edit-images-form');
    });
});