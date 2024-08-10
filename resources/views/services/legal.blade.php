@extends('layouts.app')

@section('content')
@include('partials.header', ['title' => __('main.Services')])

<div class="container mt-5 mb-5">
    <div class="accordion" id="accordionExample">
        @if ($legalServices && count($legalServices))
            @foreach ($legalServices as $index => $legalService)
                @php
                    $legalServiceData = $legalService->languages()->where('slug', app()->getLocale())->first();
                @endphp
                <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{$index}}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$index}}" aria-expanded="true" aria-controls="collapse{{$index}}">
                        {{$legalServiceData['pivot']['title']}}
                    </button>
                </h2>
                <div id="collapse{{$index}}" class="accordion-collapse collapse" aria-labelledby="heading{{$index}}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                    <strong>
                        {{$legalServiceData['pivot']['description']}}
                    </strong>
                    </div>
                </div>
                </div>
            @endforeach
        @endif

    </div>
</div>
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
