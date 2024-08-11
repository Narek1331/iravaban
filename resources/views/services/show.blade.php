@extends('layouts.app')

@section('content')

@if($service && $serviceData = $service->languages()->where('slug', app()->getLocale())->first())
<section class="py-3 py-md-5">
    <div class="container">
      <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
        <div class="col-12 col-lg-6 col-xl-5">
          <img class="img-fluid rounded" loading="lazy" src="/storage/{{$service->img_path}}" alt="About" style=" height: 500px; width: 500px; margin: 20px auto 0;">
        </div>
        <div class="col-12 col-lg-6 col-xl-7">
          <div class="row justify-content-xl-center">
            <div class="col-12 col-xl-11">
              <h2 class="mb-3 text-gold-no-hover">
                {{$serviceData['pivot']['title']}}
              </h2>
              <p class="lead fs-4 text-gold-no-hover mb-3">
                {{$serviceData['pivot']['description']}}

              </p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif

@endsection

@section('style')
<style>
    html, body {
        height: 100%;
        margin: 0;
    }

    body {
        display: flex;
        flex-direction: column;
    }

    .content {
        flex: 1;
    }

    footer {
        margin-top: auto;
    }

</style>
@endsection
