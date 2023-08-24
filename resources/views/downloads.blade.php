@extends('layouts.main')
@section('title', 'Brochure Downloads Soil Sampling Technology Peters Bodenprobetehnik Company')
@section('css')
@endsection
@section('content')
    <main class="main-content" id="main-content">
        <section class="position-relative overflow-hidden text-white pt-lg-12 z-0">
            <img src="{{asset('assets/img/soil_sampling.jpg')}}"
                 alt="Soil Sampling Technology Peters Bodenprobetehnik Company"
                 class="bg-image bg-cover">
            <div class="container position-relative my-6 my-lg-10">
                <div class="row mt-12 mt-lg-12 ms-lg-2 align-items-center">
                    <div class="col-12 me-auto mb-4 mb-lg-0">

                    </div>
                </div>
            </div>
        </section>

        <section class="position-relative">
            <div class="container py-6 py-lg-9 position-relative">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <h2 class="text-capitalize">{{ __('messages.brochure') }} {{ __('menu.downloads') }}</h2>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle">
                                <thead class="text-uppercase small text-body-tertiary">
                                <tr>
                                    <th>
                                        <div class="text-uppercase" style="min-width:180px">{{ __('messages.brochure') }}</div>
                                    </th>
                                    <th class="text-uppercase text-end">{{ __('menu.downloads') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brochures as $brochure)
                                    <tr>
                                        <td>
                                            <span class="fs-6 fw-semibold">
                                                {{$brochure->name}}
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{$brochure->getFirstMediaUrl($brochure->collection_name)}}" target="_blank">
                                                <i class="bx bxs-file-pdf fs-2"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('js')

@endsection
