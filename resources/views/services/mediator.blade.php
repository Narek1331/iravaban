@extends('layouts.app')

@section('content')
@include('partials.header', ['title' => __('main.Mediator')])

@if($mediatorService && isset($mediatorService[0]) && $mediatorData = $mediatorService[0]->languages()->where('slug', app()->getLocale())->first())
<main class="container my-4">

    <div class="row mb-5">
        <div class="col-12">
            <div class="text-center">
                <h3>
                    {{$mediatorData['pivot']['title']}}
                </h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 px-4">
            <div class="text-start">
                {!! $mediatorData['pivot']['description'] !!}
            </div>
        </div>
    </div>

</main>
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
