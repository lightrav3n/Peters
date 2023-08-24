@extends('layouts.main')
@section('title', 'Contact Peters Bodenprobetehnik Company')
@section('css')
    <style>
        .pt-grid-cards {
            grid-template-columns: repeat(auto-fill, minmax(310px, 1fr));
        }

        @media only screen and (max-width: 768px) {
            .pt-grid-cards {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
        }
    </style>
@endsection
@section('content')
    <main class="main-content" id="main-content">
        <section class="position-relative overflow-hidden text-white pt-lg-12 z-0">
            <img src="{{asset('assets/img/soil_sampling.jpg')}}" alt="Contact Peters Bodenprobetehnik Company"
                 class="bg-image bg-cover">
            <div class="container position-relative my-12">
                <div class="row mt-6 mt-lg-12 ms-0 ms-lg-2">
                    <div class="col-11 col-md-8 col-lg-6 text-white p-3 p-sm-0">
                        <!--:Title:-->
                        <div class="headline">
                            <h1 class="text-left text-capitalize fs-50">
                                {{ __('messages.get_in_touch') }}
                            </h1>
                        </div>
                        <div class="sub-headline my-4 my-lg-5 fs-20">
                            Sichere, schnelle und bezahlbare Probeentnahmegeräte sind unser Kompetenzgebiet. Sie finden
                            uns in Badbergen, Niedersachsen, Norddeutschland zwischen Bremen und Osnabrück, in der Nähe
                            der A1.
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="position-relative">
            <div class="container py-9 py-lg-11">
                <div class="row">
                    <div class="col-md-8 col-lg-7 mb-7 mb-md-0 me-auto">
                        <div class="position-relative">
                            <h2 class="text-capitalize">
                                {{ __('menu.contact_form_title') }}                             </h2>
                            <p class="mb-3">
                                {{ __('messages.contact_form_text') }}
                            </p>
                            <div class="width-7x pt-1 pt-bg-red mb-5"></div>
                            <!-- Contacts Form -->
                            <form action="{{route('site.contact.send', session()->get('language'))}}" method="post"
                                  role="form" class="needs-validation mb-5 mb-lg-7"
                                  novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label text-capitalize"
                                               for="name">{{ __('messages.contact_name') }}</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                               placeholder="John Doe" maxlength="50" required>
                                        <div class="invalid-feedback">
                                            {{ __('messages.validate_name') }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label text-capitalize"
                                               for="email">{{ __('messages.contact_email') }}</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                               placeholder="john@gmail.com" id="email"
                                               aria-label="jackwayley@gmail.com" maxlength="50" required>
                                        <div class="invalid-feedback">
                                            {{ __('messages.validate_email') }}
                                        </div>
                                    </div>
                                    <div class="w-100"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="message"
                                           class="form-label text-capitalize">{{ __('messages.contact_message') }}</label>
                                    <textarea class="form-control" name="message" placeholder="Hi there...."
                                              maxlength="500" required></textarea>
                                    <div class="invalid-feedback">
                                        {{ __('messages.validate_message') }}
                                    </div>
                                </div>
                                <div class="d-md-flex justify-content-between align-items-center">
                                    <div class="mb-3">
                                        {!! htmlFormSnippet() !!}
                                    </div>
                                    <button
                                        class="btn btn-lg pt-btn-outline-light-blue border-1 px-8 text-capitalize rounded-1">
                                        {{ __('messages.send') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <h4 class="mb-0">Office</h4>
                            <div class="border-top border-2 border-secondary mb-4 mt-2"></div>
                        </div>
                        <div>
                            <h5>Germany</h5>
                            <div class="position-relative">
                                <p>
                                    <strong>{{$siteSettings['company_name']->option_value}}</strong><br>
                                    {{$siteSettings['contact_address']->option_value}}
                                </p>
                                <p>Phone: {{$siteSettings['contact_phone']->option_display}}<br>
                                    Fax: {{$siteSettings['contact_fax']->option_display}}<br>
                                    Email: <a rel="noopener"
                                              href="mailto:{{$siteSettings['contact_email']->option_value}}">{{$siteSettings['contact_email']->option_value}}</a>
                                </p>
                            </div>
                        </div>
                        <div style="width: 100%">
                            <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0"
                                    marginwidth="0"
                                    src="https://maps.google.com/maps?width=100%25&amp;height=400&amp;hl=en&amp;q=Bahnhofstra%C3%9Fe%2036,%20D-49635%20Badbergen+(Bodenprobetechnik%20Peters%20GmbH)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="overflow-hidden py-6 py-lg-10" style="background-color: #F2F5F6;">
            <div class="container position-relative z-1">
                <div class="row position-relative justify-content-center">
                    <div class="col-12">
                        <div class="d-grid gap-4 pt-grid-cards">
                            <!-- card -->
                            <div class="card overflow-hidden rounded-2 shadow-sm hover-shadow-lg hover-lift">
                                <div class="card-body h-100">
                                    <h5 class="fw-bold">Croatia:</h5>
                                    <div class="py-2">
                                        <div class="mb-2">
                                            <p>Poljoopskrba Međunarodna trgovina d.o.o.</p>
                                            <p>Tomislav Šolić</p>
                                            <p>+385 1 2335 166</p>
                                            <p>Tomislav.solic@pmt.hr</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card -->
                           
                            <!-- card -->
                            <div class="card overflow-hidden rounded-2 shadow-sm hover-shadow-lg hover-lift">
                                <div class="card-body h-100">
                                    <h5 class="fw-bold">Poland:</h5>
                                    <div class="py-2">
                                        <div class="mb-2">
                                            <p>Usługi Doradcze Krzysztof Kopeć</p>
                                            <p>Zbigniew Krajczewski</p>
                                            <p>+48 534427319</p>
                                            <p>z.krajczewski@agrisystem.pl</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              <!-- card -->
                              <div class="card overflow-hidden rounded-2 shadow-sm hover-shadow-lg hover-lift">
                                <div class="card-body h-100">
                                    <h5 class="fw-bold">Netherlands:</h5>
                                    <div class="py-2">
                                        <div class="mb-2">
                                            <p>Royal Eijkelkamp</p>
                                            <p>Markus Reißig</p>
                                            <p>+31 682503501</p>
                                            <p>m.reissig@eijkelkamp.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <!-- card -->
                            <div class="card overflow-hidden rounded-2 shadow-sm hover-shadow-lg hover-lift">
                                <div class="card-body h-100">
                                    <h5 class="fw-bold">Kazakhstan:</h5>
                                    <div class="py-2">
                                        <div class="mb-2">
                                            <p>IP “NUR INVEST“</p>
                                            <p>Marat Baituyakov</p>
                                            <p>+7 7012456375</p>
                                            <p>bai_m2011@mail.ru</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
