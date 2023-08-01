@extends('layouts.estate')
@section('content')
<link rel="stylesheet" href="{{ url('estate/css/newcss/jquery.fancybox.min.css')}}" />
<link rel="stylesheet" href="{{ url('estate/js/toastr/toastr.min.css')}}" />
<section class="dashboard-section">
  <div class="container">
    <div class="dashboard-row d-flex flex-wrap">
      @include('partials.dashboardsidebar', ['user'=>$data['user'], 'propertycount'=>$data['p_count']])

      <div class="dashboard-content-col">
        <div class="step-content step-other-information box-style">
          <h3 class="dark-font text-center step-title mb-4">Add Images (jpeg or png. only)</h3>
          <div class="row mb-4">
            <div class="col-md-12">
              <div class="input-field">
                <h6 class="head-txt">Select Image</h6>
                <input type="file" class="form-control" name="image" id="imageInput" />
              </div>
              <div id="loader" class="loader">
                <div class="loader-inner"></div>
              </div>
            </div>
          </div>
          <div id="imagePreviewContainer" class="row">
    @foreach($data['property']->images as $image)
    <div class="image-grid property-doc-col">
        <a href="{{$image->url}}" data-fancybox="gallery">
            <img src="{{$image->url}}" class="property-doc-img">
        </a>
        <button class="delete-image-btn" data-image-id="{{$image->id}}">&times;</button>
    </div>
    @endforeach
</div>
<div class="row justify-content-end">
                                        <div class="step-form-group pt-xl-0 col-md-3">
                                            <div class="d-flex">
<button type="button" class="w-100 d-block step-next-btn btn-danger ms-2 transition">Next</button>
                                            </div>
                                        </div>
</div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
@section('scripts')
<script src="{{ url('estate/js/jquery.fancybox.min.js')}}"></script>
<script src="{{ url('estate/js/toastr/toastr.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $.fancybox.defaults.animationEffect = "none";
  $.fancybox.defaults.transitionEffect = "none";
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $('#imageInput').on('change', function() {
      var propertyId = "{{ $data['property']->id }}";
      var fileInput = $(this)[0];

      if (fileInput.files && fileInput.files[0]) {
        var file = fileInput.files[0];
        var fileType = file['type'];

        // Check if the file is an image
        if (fileType.indexOf('image') !== -1) {
          var formData = new FormData();
          formData.append('image', file);
          formData.append('property_id', propertyId);

          // Display loader
          $('#loader').show();

          $.ajax({
            url: "{{ route('frontuser.property.addimage') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
              'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
            },
            success: function(response) {
              // Handle success response
              $('.loader').hide();

              // Get the image ID from the response
              var imageId = response.image_id;
              var imageUrl = response.url;

              // Append the uploaded image to the grid view
              var imageHtml = '<div class="image-grid property-doc-col">' +
        '<a href="' + imageUrl + '" data-fancybox="gallery">' +
        '<img src="' + imageUrl + '" class="property-doc-img"></a>' +
        '<button class="delete-image-btn" data-image-id="' + imageId + '">&times;</button>' +
        '</div>';
    $('#imagePreviewContainer').append(imageHtml);

              // Reset the file input
              $('#imageInput').val('');

              // Initialize FancyBox for the new image
              $('[data-fancybox="gallery"]').fancybox();
              // Hide loader
              $('#loader').hide();
              toastr.success('Image uploaded successfully.');
            },
            error: function(xhr, status, error) {
              // Handle error response
              toastr.error(xhr.responseText, 'Error');
              // Hide loader
              $('#loader').hide();
            }
          });
        } else {
          // Not an image, show error message or perform desired action
          alert('Please select a valid image file (JPG or PNG).');
        }
      }
    });
    $('[data-fancybox="gallery"]').fancybox();

//DELETE IMAGE//
$('#imagePreviewContainer').on('click', '.delete-image-btn', function() {
            var imageId = $(this).data('image-id');
            
            // Ask for confirmation before proceeding with deletion
            if (confirm('Are you sure you want to delete this image?')) {
                // Send AJAX request to delete the image
                $.ajax({
                    type: 'DELETE',
                    url: "/frontuser/deleteimage/" + imageId,
                    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
                    success: function(response) {
                        if (response.success) {
                            // Image deleted successfully, remove the image from the DOM
                            $(this).parent('.image-grid').remove();
                            // Optionally, you can show a success message to the user
                            toastr.success(response.message, 'Success');
                        } else {
                            // Failed to delete image, show an error message
                            toastr.error(response.message, 'Error');
                        }
                    }.bind(this),
                    error: function() {
                        // Show an error message if the AJAX request fails
                        alert('Failed to delete image. Please try again later.');
                    }
                });
            }
        });

//!!DELETE IMAGE//
// Click event handler for the "Next" button
$('.step-next-btn').on('click', function() {
        // Show a success toast message
        var approved="{{$data['property']->approved}}";
       if(approved=='0'){
        toastr.success('Your Property will be live after verification');
       }else{
        toastr.success('Your Property details saved successfully');
       }
        // Set a small delay to give time for the toast to be displayed
        setTimeout(function() {
            // Redirect to the next page here
            window.location.href = "{{ route('frontuser.property.index') }}";
        }, 1500); // Adjust the delay time as needed
    });

  });
</script>
@endsection