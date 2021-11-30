@extends('layouts.landingpage')

@section('style')
    <style>
        .itk-text{
            font-size: 16px;
        }
    </style>
@endsection

@section('content')
<section class="bg-home" id="home">
    <div class="bg-overlay"></div>
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h6 class="home-title text-white">HMSI</h6>
                        <h5 class="pt-4 text-white mx-auto mb-0 pb-0">Himpunan Mahasiswa Sistem Informasi</h5>
                        <h4 class="text-white mx-auto mb-0 font-weight-bold">Institut Teknologi Kalimantan</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section" id="about">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="title text-center">
                    <h2>Tentang <b>HMSI ITK</b></h2>
                    <span class="title-border"><i class="mdi mdi-set-none"></i></span>
                </div>
            </div>
        </div>
        <div class="row mt-4 pt-4 vertical-content">
            <div class="col-lg-6 mt-2">
                <div>
                    <img src="/app-assets/images/logo/logo-hmsi-text-bottom.png" alt=""
                        class="img-fluid mx-auto d-block" style="height: 256px">
                </div>
            </div>
            <div class="col-lg-6 mt-2 text-justify">
                <div class="features-desc">
                    <h2 class="text-center">Profil HMSI</h2>
                    <div class="features-border mx-auto mt-3"></div>
                    <div class="text-muted mt-3">{!! $about->hmsi_profile ?? '' !!}</div>
                </div>
            </div>
        </div>
        <div class="row mt-5 vertical-content">
            <div class="col-lg-6 mt-2">
                <div class="features-desc text-justify">
                    <h2 class="text-center">Visi & Misi</h2>
                    <div class="features-border mx-auto mt-3"></div>
                    <div class="text-muted mt-3">{!! $about->hmsi_vision_and_mission ?? '' !!}</div>

                </div>
            </div>
            <div class="col-lg-6 mt-2">
                <div>
                    <img src="/app-assets/images/icon/vision-mission-3.png" alt="" class="img-fluid mx-auto d-block">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-5 pb-5 bg-custom">
    <div class="container">
        <div class="row">
            <div class="col-md-9 text-white critarea-desc mt-3 mb-3">
                Selalu terhubung dengan kami
            </div>
            <div class="col-md-3 mt-3 mb-3 text-md-right">
                <a href="https://www.instagram.com/hmsi_itk/" class="text-white" target="_blank"><i class="la la-instagram" style="font-size: 40px"></i></a>
                <a href="https://page.line.me/?liff.state=%3FaccountId%3Dmbo8814x" class="text-white" target="_blank"><i class="lab la-line" style="font-size: 40px"></i></a>
            </div>
        </div>
    </div>
</section>

<section class="section bg-light" id="posts">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="title text-center">
                    <h2>Informasi <b>Terbaru</b></h2>
                    <span class="title-border"><i class="mdi mdi-set-none"></i></span>
                </div>
            </div>
        </div>

        <div class="row pt-4 mt-4">
            <div class="col-sm-12">
                @if (count($posts) > 0)
                    <div class="owl-carousel owl-theme">
                        @foreach ($posts as $post)
                            <div class="item">
                                <a href="{{ $post->url }}" target="_blank" class="text-dark">
                                    <div class="card">
                                        <div class="card-img-top text-center justify-content-center" style="height: 160px; overflow: hidden !important">
                                            <img src="{{ $post->thumbnail }}" alt="Card image cap" class="mx-auto" style="height: 160px; width: auto !important;">
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">{{ Str::limit($post->title, 50)}}</p>
                                            <p class="card-text"><small class="text-muted">{{ date('Y-m-d',
                                                    strtotime($post->updated_at)) }}</small></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="w-100 text-center my-4">
                        <img src="/app-assets/images/icon/empty.png" height="256px" class="text-center">
                        <p class="text-muted">Belum ada data tersedia</p>
                    </div>
                @endif
            </div>
        </div>
    </div><!-- end container -->
</section>
@endsection

@section('script')

@endsection
