<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Articles</h2>
    <form action="{{route('article-create')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter  name">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" id="description"
                      placeholder="Enter Description"></textarea>
        </div>

        <div class="form-group mb-6">
            <input type="file" name="image" class="form-control-file" id="image">
            <img src="#" alt="Preview" id="imagePreview" style="max-width: 200px; display: none;">
        </div>
        <div class="form-group">
            <label for="name">Select Tag:</label>
            @if($tags)
                <select class="selectpicker" name="tags[]" multiple aria-label="Default select example" data-live-search="true">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Function to handle image preview
    function previewImage(event) {
        const imageFile = event.target.files[0];
        const imagePreview = document.getElementById('imagePreview');

        if (imageFile) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            }
            reader.readAsDataURL(imageFile);
        }
    }

    // Event listener for the image input change
    const imageInput = document.getElementById('image');
    imageInput.addEventListener('change', previewImage);
</script>
</body>
</html>
