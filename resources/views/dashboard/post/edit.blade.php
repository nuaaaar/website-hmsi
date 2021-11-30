@extends('layouts.dashboard')

@section('title', 'Edit Postingan')

@section('style')
    <style>
        ul.error{
            list-style-position: inside;
            padding-left: 0;
        }
        .error>.bx{
            font-size: 0.857rem;
            margin-right: 6px;
        }
    </style>
@endsection

@section('content')
    <div class="row mb-2">
        <div class="col-12">
            <a href="{{ route('dashboard.post.index') }}" class="btn btn-primary btn-icon">
                <span class="livicon-evo livicon-evo-holder" data-options="name: arrow-left.svg; style: lines; size: 1.2rem; strokeColor: #ffffff "></span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p class="card-title font-weight-bold">Edit Postingan</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('dashboard.post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="form-group">
                                    <label for="thumbnail">Thumbnail</label>
                                    <img src="{{ $post->thumbnail }}" style="height: 256px !important; width: auto !important" class="d-block image-preview mb-1">
                                    <input type="file" name="thumbnail" class="form-control input-image" accept="image/*">
                                </div>
                                <div class="form-group">
                                    <label for="title">Judul</label>
                                    <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="url">Alamat URL</label>
                                    <input type="url" name="url" class="form-control" value="{{ $post->url }}" required>
                                    <small class="text-muted">Wajib sertakan http atau https pada awal alamat url</small>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

        let indexRoute = "{{ route('dashboard.post.index') }}";
        if ($("a[href='" + indexRoute + "']")[0])
        {
            $("a[href='" + indexRoute + "']").closest("li").addClass("active");
        }

        $(document).on("change", ".input-image", function()
        {
            var previewElement = $(this).siblings(".image-preview");
            readURL(this, previewElement);
        });

        function readURL(input, previewElement) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(previewElement).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }else{
                $(previewElement).attr('src', '{{ $post->thumbnail }}');
            }
        }
    </script>
@endsection
