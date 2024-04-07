<<<<<<< HEAD
@extends('layouts.app')
@section('title')
    {{ __('messages.prescription.new_prescription') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <a href="{{ route('prescriptions.index') }}"
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
                    @include('flash::message')
                </div>
            </div>
            {{ Form::hidden('createMedicineFromPrescriptionPost', route('prescription.medicine.store'), ['id' => 'createMedicineFromPrescriptionPost']) }}
            {{Form::hidden('uniqueId',2,['id'=>'prescriptionUniqueId'])}}
            {{Form::hidden('associateMedicines',json_encode($medicineList),['class'=>'associatePrescriptionMedicines'])}}
            {{Form::hidden('associateMeals',json_encode($mealList),['class'=>'associatePrescriptionMeals'])}}
            {{Form::hidden('associateDuration',json_encode($doseDurationList),['class'=>'associatePrescriptionDurations'])}}
            {{Form::hidden('associateInterval',json_encode($doseIntervalList),['class'=>'associatePrescriptionIntervals'])}}
            {{ Form::open(['route' => 'prescriptions.store', 'id' => 'createPrescription']) }}
            @csrf
            <div class="card">
                <div class="card-body">
                    @include('prescriptions.fields')
                </div>
            </div>
            <div class="card mt-5">
                <div class="card-header">
                    <h3>{{ __('messages.medicines') }}</h3>
                    <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_new_medicine">
                        {{__('messages.prescription.new_medicine')}}
                    </a>
                </div>
                <div class="card-body">
                    @include('prescriptions.medical-table')
                </div>
            </div>
            <div class="card mt-5">
                <div class="card-header">
                    <h3>{{ __('messages.prescription.physical_information') }}</h3>
                </div>
                <div class="card-body">
                    @include('prescriptions.physical-info-fields')
                </div>
            </div>
            <div class="card mt-5">
                <div class="card-body">
                    @include('prescriptions.other-fields')
                </div>
            </div>
            {{ Form::close() }}
            @include('prescriptions.add_new_medicine')
            @include('prescriptions.templates.templates')
        </div>
    </div>
@endsection
@section('scripts')
    {{--  assets/js/prescriptions/create-edit.js --}}
@endsection
=======
<div class="row gx-10 mb-5">
    <div class="form-group col-md-3 mb-5">
        {{ Form::label('patient_id', __('messages.prescription.patient') . ':', ['class' => 'form-label']) }}
        <span class="required"></span>
        {{ Form::select('patient_id', $patients, null, ['class' => 'form-select', 'required', 'id' => 'prescriptionPatientId', 'placeholder' => __('messages.document.select_patient')]) }}
    </div>
    @if (Auth::user()->hasRole('Doctor'))
        <input type="hidden" name="doctor_id" value="{{ Auth::user()->owner_id }}">
    @else
        <div class="form-group col-md-3 mb-5">
            {{ Form::label('doctor_name', __('messages.case.doctor') . ':', ['class' => 'form-label']) }}
            <span class="required"></span>
            {{ Form::select('doctor_id', $doctors, null, ['class' => 'form-select', 'required', 'id' => 'prescriptionDoctorId', 'placeholder' => __('messages.web_home.select_doctor')]) }}
        </div>
    @endif
    <div class="col-md-3">
        <div class="form-group mb-5">
            {{ Form::label('health_insurance', __('messages.prescription.health_insurance').(':'), ['class' => 'form-label']) }}
            {{ Form::text('health_insurance', null, ['class' => 'form-control','placeholder'=>__('messages.prescription.health_insurance')]) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-5">
            {{ Form::label('low_income', __('messages.prescription.low_income').(':'), ['class' => 'form-label']) }}
            {{ Form::text('low_income', null, ['class' => 'form-control','placeholder'=>__('messages.prescription.low_income')]) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-5">
            {{ Form::label('reference', __('messages.prescription.reference').(':'), ['class' => 'form-label']) }}
            {{ Form::text('reference', null, ['class' => 'form-control','placeholder'=>__('messages.prescription.reference')]) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-5">
            {{ Form::label('status', __('messages.common.status') . ':', ['class' => 'form-label']) }}
            <br>
            <div class="form-check form-switch">
                <input name="status" class="form-check-input  is-active" value="1" type="checkbox" checked>
                <label class="form-check-label" for="allowmarketing"></label>
            </div>
        </div>
    </div>
</div>
{{-- <div class="d-flex justify-content-end"> --}}
{{--    {!! Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2 btnPrescriptionSave','id' => 'prescriptionSave']) !!} --}}
{{--    <a href="{!! route('prescriptions.index') !!}" --}}
{{--       class="btn btn-secondary">{!! __('messages.common.cancel') !!}</a> --}}
{{-- </div> --}}
>>>>>>> origin/main
