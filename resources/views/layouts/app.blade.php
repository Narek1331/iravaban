<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Իրավաբանի ծառայություններ</title>

    <meta name="description" content="Իրավաբանական ծառայություններ, ներառյալ կորպորատիվ իրավունք, ընտանեկան իրավունք, աշխատակիցների իրավունք և այլն։ Հետևեք մեզ՝ իրավաբանական լուծումների համար։">
    <meta name="keywords" content="իրավաբան, իրավաբանական ծառայություններ, կորպորատիվ իրավունք, ընտանեկան իրավունք, աշխատակիցների իրավունք, իրավաբանական խորհրդատվություն">
    <meta name="author" content="Ձեր Կազմակերպության Անունը">

    <!-- Open Graph Meta Tags for Facebook -->
    <meta property="og:title" content="Իրավաբանի ծառայություններ">
    <meta property="og:description" content="Իրավաբանական ծառայություններ՝ ներառյալ կորպորատիվ իրավունք, ընտանեկան իրավունք և աշխատակիցների իրավունք։ Ձեր իրավաբանական խնդիրների լուծում։">
    <meta property="og:image" content="https://iravaban.org/images/logos/main.png">
    <meta property="og:url" content="https://iravaban.org">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Իրավաբանի Ծառայություններ">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Իրավաբանի ծառայություններ">
    <meta name="twitter:description" content="Իրավաբանական ծառայություններ՝ ներառյալ կորպորատիվ իրավունք, ընտանեկան իրավունք և աշխատակիցների իրավունք։ Ձեր իրավաբանական խնդիրների լուծում։">
    <meta name="twitter:image" content="https://iravaban.org/images/logos/main.png">
    {{-- <meta name="twitter:site" content="@yourtwitterhandle"> --}}

    <!-- Telegram Meta Tags -->
    {{-- <meta name="twitter:site" content="@yourtelegramchannel"> --}}

    <!-- VK Meta Tags -->
    {{-- <meta property="vk:page" content="https://vk.com/yourpage"> --}}

    <link href="/styles/style.css" rel="stylesheet">
    <link href="/styles/bootstrap.css" rel="stylesheet">
    <link href="/styles/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    @yield('style')

</head>
<body>
    <nav style="background-color: #4f3c21!important" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/images/logos/main.png" alt="Logo" width="60" height="60" class="d-inline-block align-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link text-gold {{ request()->routeIs('home') ? 'nav-active' : '' }}" aria-current="page" href="{{route('home')}}">{{__('main.Home')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-gold {{ request()->routeIs('about') ? 'nav-active' : '' }}" href="{{route('about')}}">{{__('main.About Us')}}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-gold {{ in_array(request()->route()->getName(), ['service.index','service.pro-bono','service.mediator']) ? 'nav-active' : '' }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{__('main.Services')}}
                        </a>
                        <ul class="dropdown-menu text-gold-no-hover " style="background-color: #4f3c21!important" aria-labelledby="navbarDropdown">
                            @if(isset($services) && $services->count())

                                @foreach ($services as $service)
                                @php
                                    $serviceData = $service->languages()->where('slug', app()->getLocale())->first();
                                @endphp
                                    <li>
                                        <a style="text-decoration: none !important;" class="dropdown-item text-gold-no-hover {{request()->route()->getName() === 'service.show' && request()->route('id') == $service->id ? 'nav-active' : '' }}" href="{{route('service.show',['id'=>$service->id])}}">
                                            {{$serviceData['pivot']['title']}}
                                        </a>
                                    </li>
                                @endforeach
                            @endif

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-gold {{ request()->routeIs('contact') ? 'nav-active' : '' }}" href="{{route('contact')}}">{{__('main.Contact Us')}}</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link text-gold" href="{{route('about')}}">Pricing</a>
                    </li> --}}
                </ul>
                <div class="d-flex" style="background-color: #4f3c21!important">
                    @if(isset($languages) && $languages->count())
                        <form method="POST" action="{{ route('change.language') }}">
                            @csrf
                            <select style="background-color: #4f3c21!important" name="language" class="form-select border-0" onchange="this.form.submit()">
                                @foreach ($languages as $language)
                                    <option value="{{ $language->slug }}" {{ app()->getLocale() == $language->slug ? 'selected' : '' }}>
                                        {{ $language->flag }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </nav>

  @yield('content')



    <footer class="bg-dark text-center text-lg-start text-gold-no-hover">
        <div class="container p-5">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="mb-6">
                    <div class="">
                        <h5>{{__('main.Address')}}: {{__('contact.address')}}</h5>
                        <h5>{{__('main.Phone Number')}}: {{__('contact.phone')}}</h5>
                        <h5>{{__('main.email')}}: {{__('contact.email')}}</h5>
                    </div>
                </div>
                <div class="social-icons mb-6 ">
                    <!-- Social Media Icons -->
                    <a href="https://www.facebook.com/yourpage" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                        <span class="visually-hidden">Facebook</span>
                    </a>
                    <a href="https://www.instagram.com/yourprofile" target="_blank">
                        <i class="fab fa-instagram"></i>
                        <span class="visually-hidden">Instagram</span>
                    </a>
                    <a href="https://t.me/yourchannel" target="_blank">
                        <i class="fab fa-telegram-plane"></i>
                        <span class="visually-hidden">Telegram</span>
                    </a>
                    <a href="https://www.linkedin.com/in/yourprofile" target="_blank">
                        <i  class="fab fa-linkedin-in"></i>
                        <span class="visually-hidden">LinkedIn</span>
                    </a>
                </div>
            </div>
        </div>
        {{-- <div class="text-center p-3 bg-dark text-white">
            © {{date('Y')}}
        </div> --}}
    </footer>


    <!-- Include Chart.js -->
    @yield('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="/js/carousel.js"></script>
</body>
</html>
