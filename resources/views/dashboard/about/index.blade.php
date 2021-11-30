@extends('layouts.dashboard')

@section('title', 'Tentang HMSI')

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
            <a href="{{ route('dashboard.organizational-structure.index') }}" class="btn btn-primary btn-icon">
                <span class="livicon-evo livicon-evo-holder" data-options="name: arrow-left.svg; style: lines; size: 1.2rem; strokeColor: #ffffff "></span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p class="card-title font-weight-bold">Tentang HMSI</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('dashboard.about.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="hmsi_profile">Profil HMSI</label>
                                    <textarea name="hmsi_profile" class="form-control" id="hmsi-profile" required>{{ $about->hmsi_profile ?? '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="hmsi_vision_and_mission">Visi dan Misi</label>
                                    <textarea name="hmsi_vision_and_mission" class="form-control" id="hmsi-vision-and-mission" required>{{ $about->hmsi_vision_and_mission ?? '' }}</textarea>
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
        CKEDITOR.replace('hmsi-profile');
        CKEDITOR.replace('hmsi-vision-and-mission');
    </script>
@endsection
