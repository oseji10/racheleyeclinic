@extends('layouts.app')
@section('title')
    {{ __('messages.encounters.page3') }}
@endsection

@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <a href="{{ route('patient.encounter3') }}"
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

                    
                    
                    
                    
                    <div class="form-group col-sm-6 mb-5">
                        <h3>Upload Sketched Diagram</h3>
                        <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="patient_id" value="{{ session('patient_id') }}">
                            <input type="hidden" name="temporary_id" value="{{ session('temporary_id') }}">
                        <input class="form-control" type="file" name="image"><br/>
                        <button class="btn btn-outline-primary" type="submit">Upload Image</button>
                    </form>
                    <br/>
                    <h1>OR</h1>
                    <A href="patient-encounter-page-41">CLICK HERE TO SKETCH</A>
                    </div>

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
