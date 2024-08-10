@extends('layouts.app')

@section('content')
@include('partials.header', ['title' => __('main.About Us')])

@if ($aboutPage && $aboutData = $aboutPage->languages()->where('slug',app()->getLocale())->first())

<section class="py-3 py-md-5">
    <div class="container">
      <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
        <div class="col-12 col-lg-6 col-xl-5">
          <img class="img-fluid rounded" loading="lazy" src="/storage/{{$aboutPage->img_path}}" alt="About">
        </div>
        <div class="col-12 col-lg-6 col-xl-7">
          <div class="row justify-content-xl-center">
            <div class="col-12 col-xl-11">
              <h2 class="mb-3 text-gold">
                {{$aboutData['pivot']['title']}}
              </h2>
              <p class="lead fs-4 text-secondary mb-3">
                {{$aboutData['pivot']['description']}}

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
