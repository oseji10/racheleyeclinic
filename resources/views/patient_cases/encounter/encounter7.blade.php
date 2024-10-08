@extends('layouts.app')
@section('title')
    {{ __('messages.encounters.page6') }}
@endsection

@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <a href="{{ route('patient.encounter6') }}"
               class="btn btn-outline-primary">{{ __('messages.common.back') }}</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('layouts.errors')
                </div>
            </div>
            <div class="card">
                {{Form::hidden('utilsScript',asset('assets/js/int-tel/js/utils.min.js'),['class'=>'utilsScript'])}}
                {{Form::hidden('isEdit',false,['class'=>'isEdit'])}}
                <div class="card-body p-12">
                    {{-- {{ Form::open(['route' => 'patient-cases.store', 'id' => 'createPatientCaseForm']) }} --}}
                    {{-- @include('patient_cases.encounter.column.timeline') --}}
                    @include('patient_cases.encounter.form7')
                    {{-- @include('patient_cases.encounter.prescriptions.medical-table') --}}

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
{{--
    JS File :- assets/js/patient_cases/create-edit.js
               assets/js/custom/input_price_format.js
--}}



