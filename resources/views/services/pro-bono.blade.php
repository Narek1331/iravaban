@extends('layouts.app')

@section('content')
@include('partials.header', ['title' => __('main.PRO BONO / Free Legal Aid')])

@if($proBonoService && isset($proBonoService[0]) && $proBonoData = $proBonoService[0]->languages()->where('slug', app()->getLocale())->first())
<div class="container mt-5 mb-5">
    <div class="card border-0 bg-light" style="width: 100%;">
        <img src="/storage/{{$proBonoService[0]->img_path}}" class="card-img-top">
        <div class="card-body text-center">
          <h5 class="card-title">
            {{$proBonoData['pivot']['title']}}
          </h5>
          <p class="card-text">
            {{$proBonoData['pivot']['description']}}
          </p>
        </div>
      </div>
</div>
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
