@extends('../app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <button  class="btn btn-primary btn-sm rounded shadow float-start btn-add" onclick="create()">
                            <span class="span-btn-add">Add New</span>
                        </button>
                    </div>
                    <div id="read"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                <div id="page" class="p-2"></div>
            </div>
        </div>
    </div>

    <!-- Dialog Modal Konfirmasi -->
    <div id="confirmationModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        @include('artist.modal.delete')
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            read();
        });

        function read() {
            $.get("{{url('/read')}}", {}, function(data, status){
                $('#read').html(data);
            });
        }
        
        function create() {
            $.get("{{url('create')}}", {}, function(data, status){
                $('#exampleModalLabel').html('Add Data')
                $('#page').html(data);
                $('#exampleModal').modal('show');
            });
        }

        function show(id) {
            $.get("{{url('show')}}/" + id, {}, function(data, status){
                $('#exampleModalLabel').html('Edit Data')
                $('#page').html(data);
                $('#exampleModal').modal('show');
            });
        }

        function showDestroyModal(id) {
            console.log(id);
            $('#confirmationModal').modal('show');

            $('#btn-confirm-delete').on('click', function() {

                console.log(id);
                $.ajax({
                    type: "post",
                    url: "{{ url('destroy') }}/" + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        console.log("Data deleted successfully");
                        $('.btn-close').click();
                        read();
                    },
                    error: function(xhr, status, error) {
                        console.log("Error deleting data: " + error);
                    }
                });
            });
        }

        function store() {
            var formData = new FormData();
            
            formData.append('artist_name', $('#artist_name').val());
            formData.append('package_name', $('#package_name').val());
            formData.append('release_date', $('#release_date').val());
            formData.append('price', $('#price').val());
            formData.append('image_url', $('#image_url').prop('files')[0]);
            formData.append('sample_url', $('#sample_url').val());

            $.ajax({
                type : "post",
                url :"{{url('store')}}",
                data : formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    $('.btn-close').click();
                    read();
                }
            })
        }

        function update(id) {

            let formData = new FormData();
            
            formData.append('artist_name', $('#artist_name').val());
            formData.append('package_name', $('#package_name').val());
            formData.append('release_date', $('#release_date').val());
            formData.append('image_url', $('#image_url').prop('files')[0]);
            formData.append('price', $('#price').val());
            formData.append('sample_url', $('#sample_url').val());


            $.ajax({
                type: "post",
                url: "{{ url('update') }}/" + id,
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $('.btn-close').click();
                    read();
                }
            });
            
        }

        function playSample(key) {
                
            var audioElement = $('#player-' + key)[0];
            var playButton = $('#audio-button-' + key);
            var defaultButton = $('.btn-playing1');
            defaultButton.html('<i class="bi bi-play-fill text-white"></i>');

            if (audioElement.paused) {
                $('audio').each(function() {
                    if (!this.paused) {
                        this.pause();
                        $('#audio-button-' + this.id.split('-')[2]).html('<i class="bi bi-play-fill text-white"></i>');
                    }
                });
                audioElement.play();
                playButton.html('<i class="bi bi-stop-fill text-white"></i>');
            } else {
                audioElement.pause();
                audioElement.currentTime = 0;
                playButton.html('<i class="bi bi-play-fill text-white"></i>');
            }
        }  
        
    </script>
@endsection
