<div class="modal-body">
    <!-- Form untuk input data create -->

    <div class="form-group mb-3">
        <label class="form-label " for="artist_name">Artist Name</label>
        <input type="text" class="form-control" id="artist_name" value="{{$data->ArtistName}}" placeholder="Enter name">
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="package_name">Package Name</label>
        <input type="text" class="form-control" id="package_name" value="{{$data->PackageName}}" placeholder="Enter Package">
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="release_date">Release Date</label>
        <input type="date" class="form-control" id="release_date" value="{{$data->ReleaseDate}}" placeholder="Enter Date">
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="price">Price</label>
        <input type="number" class="form-control" id="price" value="{{$data->Price}}" placeholder="Enter Price">
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="image_url">Image</label>

        <input type="file" name="image_url" id="image_url" value="{{$data->ImageURL}}" class="form-control" placeholder="Upload Image">
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="sample_url">Link Audio</label>
        <input type="text" class="form-control" id="sample_url" value="{{$data->SampleURL}}" placeholder="Enter Link Audio">
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button id="btn-save" class="btn btn-warning" onclick="update({{$data->id}})">Update</button>
</div>
