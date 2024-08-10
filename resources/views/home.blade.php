@extends('layouts.app')

@section('content')

@if ($banners && $banners->count())
    <div class="image-container">
        @foreach ($banners as $index => $banner)
        <img src="/storage/{{$banner->img_path}}" alt="Placeholder Image" @if($index == 0) class="active" @endif>
        @endforeach
        <a href="https://calendly.com/test1212012/30min" target="_blank">{{__('main.Get An Pppointment')}}</a>
    </div>
@endif

{{-- <div class="container my-5">

    <div class="row">
        <div class="col-lg-6 mb-4">
            <h2>Section 1</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque ante sit amet mauris faucibus, sit amet gravida nisi convallis.</p>
            <button type="button" class="btn btn-gold">Read More</button>
        </div>
        <div class="col-lg-6 mb-4">
            <h2>Section 2</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque ante sit amet mauris faucibus, sit amet gravida nisi convallis.</p>
            <button type="button" class="btn btn-gold">Read More</button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-gold">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-gold">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-gold">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div> --}}


<div class="container mt-4">
    @if ($ourVisionPage && $ourVisionData = $ourVisionPage->languages()->where('slug',app()->getLocale())->first())
    <div class="row mb-0" style="background: rgb(185, 139, 115);">
        <div class="col-sm-6 d-flex align-items-start p-2" style="background: #FFFFFF;">
            <div class="module-container text-center">
                <div class="module-image">
                    <img src="/storage/{{$ourVisionPage->img_path}}" alt="">
                </div>
            </div>
        </div>
        <div class="col-sm-6 d-flex flex-column justify-content-center p-2" style="background: #FFFFFF;">
            <div class="module-container">
                <h2 style="font-size: 38px" class="text-gold">
                    {{__('main.Our Vision')}}
                </h2>
            </div>
            <div class="module-container">
                <p style="font-size: 16px;">
                    {{$ourVisionData['pivot']['description']}}
                </p>
            </div>
            <div class="module-divider"></div>

            <div class="module-container">
                <h5>{{__('main.Address')}}: {{__('contact.address')}}</h5>
                <h5>{{__('main.Phone Number')}}: {{__('contact.phone')}}</h5>
                <h5>{{__('main.email')}}: {{__('contact.email')}}</h5>
            </div>
        </div>
    </div>
</div>
@endif
<!-- services -->

  @if ($legalServices && count($legalServices))
    @php
        // Chunk the legal services into groups of 3 for each carousel item
        $chunkedServices = $legalServices->chunk(3);
    @endphp

    <div class="services_section">
        <div class="container text-center">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-4 text-gold">{{__('main.Services')}}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="services_section_2">
        <div id="main_slider" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($chunkedServices as $index => $servicesChunk)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="container">
                            <div class="row">
                                @foreach ($servicesChunk as $legalService)
                                    @php
                                        $legalServiceData = $legalService->languages()->where('slug', app()->getLocale())->first();
                                    @endphp
                                    <div class="col-md-4">
                                        <div class="service_box">
                                            <div class="house_icon"></div>
                                            <h3 class="h5">{{ $legalServiceData['pivot']['title'] }}</h3>
                                            <p class="text-truncate">{{ $legalServiceData['pivot']['description'] }}</p>
                                            <div class="readmore_button">
                                                <a href="{{route('service.legal')}}" class="btn text-gold">{{__('main.Read More')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- <button class="carousel-control-prev" type="button" data-bs-target="#main_slider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#main_slider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button> --}}
        </div>
    </div>
@endif


<!-- about us -->
@if ($aboutPage && $aboutData = $aboutPage->languages()->where('slug',app()->getLocale())->first())

<div class="about_section py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="about_img mb-4">
            <img src="/storage/{{$aboutPage->img_path}}" class="img-fluid" alt="About Us Image" width="500" height="500">
          </div>
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center">
          <div class="about_text_main">
            <h1 class="about_taital display-4 mb-3 text-gold">{{__('main.About Us')}}</h1>
            <p class="about_text lead">
                {{$aboutData['pivot']['description']}}
            </p>
            <a href="{{route('about')}}" class="btn text-gold mt-3">{{__('main.Read More')}}</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif
  <!-- chart -->
  <div class="container my-5">
    <section class="text-center">
        <div class="row">
            <div class="col-6 col-md-3 mb-4">
                <div class="chart-container">
                    <canvas id="chart1"></canvas>
                    {{-- <div class="chart-percentage">99%</div> --}}
                </div>
                <p><a class="btn btn-custom " >{{__('main.Experienced Legal Expertise')}}</a></p>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <div class="chart-container">
                    <canvas id="chart2"></canvas>
                    {{-- <div class="chart-percentage">99%</div> --}}
                </div>
                <p><a class="btn btn-custom " >{{__('main.Personalized Legal Solutions')}}</a></p>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <div class="chart-container">
                    <canvas id="chart3"></canvas>
                </div>
                <p><a class="btn btn-custom " >{{__('main.Transparent Communication')}}</a></p>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <div class="chart-container">
                    <canvas id="chart4"></canvas>
                </div>
                <p><a class="btn btn-custom " >{{__('main.Client-Centered Approach')}}</a></p>
            </div>
        </div>
    </section>
</div>

@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Create pie charts using Chart.js
        new Chart(document.getElementById('chart1').getContext('2d'), {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [1, 99],
                    backgroundColor: ['#e9ecef','#c0bb91'],
                    borderWidth: 0
                }]
            },
            options: {
                cutout: '70%'
            }
        });

        new Chart(document.getElementById('chart2').getContext('2d'), {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [1, 99],
                    backgroundColor: ['#e9ecef','#c0bb91'],
                    borderWidth: 0
                }]
            },
            options: {
                cutout: '70%'
            }
        });

        new Chart(document.getElementById('chart3').getContext('2d'), {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [1, 99],
                    backgroundColor: ['#e9ecef','#c0bb91'],
                    borderWidth: 0
                }]
            },
            options: {
                cutout: '70%'
            }
        });

        new Chart(document.getElementById('chart4').getContext('2d'), {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [1, 99],
                    backgroundColor: ['#e9ecef','#c0bb91'],
                    borderWidth: 0
                }]
            },
            options: {
                cutout: '70%'
            }
        });

      });
</script>
@endsection
