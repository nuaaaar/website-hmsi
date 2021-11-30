@extends('layouts.landingpage')

@section('style')

@endsection

@section('content')
<section class="section my-4" id="team">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="title text-center">
                    <h2>Struktur Organisasi</h2>
                    <span class="title-border"><i class="mdi mdi-set-none"></i></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mt-4 pt-4">
                    @if (count($departments)> 0)
                        <ul class="nav nav-pills justify-content-center" id="myTab" role="tablist">
                            @foreach ($departments as $key => $department)
                                <li class="nav-item {{ $key != 0 ? 'ml-1' : '' }}">
                                    <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="department-{{ $department->id }}-tab" data-toggle="tab"
                                        href="#department-{{ $department->id }}" role="tab"
                                        aria-controls="department-{{ $department->id }}" aria-selected="true">{{
                                        $department->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            @foreach ($departments as $key => $department)
                                <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="department-{{ $department->id }}" role="tabpanel"
                                    aria-labelledby="department-{{ $department->id }}-tab">
                                    <div class="row mt-4 pt-4">
                                        <div class="col-12">
                                            <p class="text-muted text-center">{{ $department->description }}</p>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        @foreach ($department->members as $member)
                                            <div class="col-lg-3 mt-3">
                                                <div class="team-box p-4">
                                                    <div class="team-img">
                                                        <img src="{{ $member->image }}" alt=""
                                                            class=" mx-auto d-block" height="200">
                                                    </div>
                                                    <div class="team-desc text-center mt-5">
                                                        <h6 class="team-name text-uppercase text-custom mb-1">{{ $member->name }}
                                                        </h6>
                                                        <p class="team-work text-muted">{{ $member->position }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
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
        </div>
    </div>
</section>
@endsection

@section('script')

@endsection
