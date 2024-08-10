@extends('layouts.app')

@section('content')
<div class="error-page">
    <h1>404</h1>
    <p>{{__('main.page_not_fount_title')}}</p>
    <p><a href="{{ route('home') }}">{{__('main.page_not_fount_description')}}</a></p>
</div>
@endsection

@section('style')
<style>
    .error-page {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        text-align: center;
    }
    .error-page h1 {
        font-size: 8rem;
        font-weight: bold;
        color: #dc3545;
    }
    .error-page p {
        font-size: 1.5rem;
        color: #b08d57;
    }
    .error-page a {
        color: #b08d57;
        text-decoration: none;
    }
    .error-page a:hover {
        text-decoration: underline;
    }
</style>
@endsection
