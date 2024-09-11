@extends('layouts.app')
@section('title')
    {{ __('messages.frontdesks') }}
@endsection
@section('css')
{{--    <link rel="stylesheet" href="{{ asset('assets/css/sub-header.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            {{ Form::hidden('frontdeskUrl', url('frontdesks'), ['id' => 'frontdeskURL']) }}
            {{ Form::hidden('frontdesk', __('messages.frontdesk.frontdesk'), ['id' => 'Nurse']) }}
            <livewire:front-desk-table/>
            @include('frontdesks.templates.templates')
            @include('partials.page.templates.templates')
        </div>
    </div>
@endsection

@section('scripts')
    {{--  assets/js/frontdesks/frontdesks.js--}}
@endsection

