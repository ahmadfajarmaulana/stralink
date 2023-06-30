<div class="card-body" id="read">
    <table class="table table-bordered table-stiped">
        <thead>
            <tr>
                <th class="text-center" width="50px">No</th>
                <th class="text-center" width="300px">Package Name</th>
                <th class="text-center" width="150px">Artist Name</th>
                <th class="text-center">Date Release</th>
                <th class="text-center">Audio</th>
                <th class="text-center">Price</th>
                <th class="text-center" width="100px"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $item)
            <tr>
                <td>
                    {{ $key+1 }}
                </td>
                <td>
                    <div class="row" >
                        <div class="col col-lg-5">
                            <img src="{{ url('image_url/' . $item->ImageURL) }}" width="100px" height="100px" style="margin-right: 50px;">
                        </div>
                        <div class="col col-lg-7">
                            {{ $item->PackageName }}
                        </div>
                    </div>
                </td>
                <td><h6><b>{{ $item->ArtistName }}</b></h6></td>
                <td class="text-center"><h6>{{ $item->ReleaseDate }}</h6></td>
                <td class="text-center">
                    <audio id="player-{{$key+1}}" src="{{ $item->SampleURL }}"></audio>
                    <button id="audio-button-{{$key+1}}" onclick="playSample({{$key+1}})" class="btn btn-sm btn-playing1 text-center"><i class="bi bi-play-fill text-white"></i></button>
                </td>
                <td><h6>{{ $item->Price }}</h6></td>
                <td>
                    <div class="d-grid gap-2">
                        <a class="btn btn-primary btn-sm btn-edit rounded shadow" onclick="show({{$item->id}})"><span class="span-btn-edit">Edit</span></a>

                        <a class="btn btn-sm btn-danger btn-delete rounded shadow" onclick="showDestroyModal({{$item->id}})"><span class="span-btn-delete">Delete</span></a>
                    </div>
                </td>
            </tr>
                @endforeach
        </tbody>
    </table>
</div>
