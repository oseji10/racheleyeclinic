<div class="row">
    {{ Form::hidden('currency_symbol', getCurrentCurrency(), ['class' => 'currencySymbol']) }}
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('patient_name', __('messages.case.patient') . ':', ['class' => 'form-label']) }}
        <span class="required"></span>
        {{ Form::select('patient_id', $patients, null, ['class' => 'form-select select2Selector', 'required', 'id' => 'casePatientId', 'placeholder' => __('messages.document.select_patient'), 'data-control' => 'select2', 'required']) }}
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{-- {{ Form::label('doctor_name', __('messages.case.doctor') . ':', ['class' => 'form-label']) }}
        <span class="required"></span>
        {{ Form::select('doctor_id', $doctors, null, ['class' => 'form-select select2Selector', 'required', 'id' => 'caseDoctorId', 'placeholder' => __('messages.web_home.select_doctor'), 'data-control' => 'select2', 'required']) }} --}}
    </div>


    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('visual_acuity_far_left', __('messages.case.visual_acuity_far_left') . ':', ['class' => 'form-label']) }}
        <span class="required"></span>
       
        {{-- {{ Form::select('doctor_id', $visual_acuity, null, ['class' => 'form-select select2Selector', 'required', 'id' => 'caseDoctorId', 'placeholder' => __('messages.web_home.select_doctor'), 'data-control' => 'select2', 'required']) }} --}}


        <select id="vapl" class="select2 form-select" name="vapl" data-control="select2">
            <option value="">Select Visual Acuity Far (Presenting) Left</option>
            {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'VAFPL')->get();}}
            @forelse($visual_acuity as $item)
            <option value="{{$item->id}}">{{$item->acuity_value}}</option>
            @empty
            @endforelse
          </select>


    
    </div>


    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('visual_acuity_far_right', __('messages.case.visual_acuity_far_right') . ':', ['class' => 'form-label']) }}
        {{-- <span class="required"></span> --}}
       
        {{-- {{ Form::select('doctor_id', $visual_acuity, null, ['class' => 'form-select select2Selector', 'required', 'id' => 'caseDoctorId', 'placeholder' => __('messages.web_home.select_doctor'), 'data-control' => 'select2', 'required']) }} --}}
    <select id="vapr" class="select2 form-select" name="vapr" data-control="select2">
            <option value="">Select Visual Acuity Far (Presenting) Right </option>
            {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'VAFPR')->get();}}
            @forelse($visual_acuity as $item)
            <option value="{{$item->id}}">{{$item->acuity_value}}</option>
            @empty
            @endforelse
          </select>
    </div>

    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('visual_acuity_far_pinhole_left', __('messages.case.visual_acuity_far_pinhole_left') . ':', ['class' => 'form-label']) }}
        {{-- <span class="required"></span> --}}
       
        {{-- {{ Form::select('doctor_id', $visual_acuity, null, ['class' => 'form-select select2Selector', 'required', 'id' => 'caseDoctorId', 'placeholder' => __('messages.web_home.select_doctor'), 'data-control' => 'select2', 'required']) }} --}}
    <select id="vafpinl" class="select2 form-select" name="vafpinl" data-control="select2">
            <option value="">Select Visual Acuity Far (Pinhole) Left</option>
            {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'VAFPR')->get();}}
            @forelse($visual_acuity as $item)
            <option value="{{$item->id}}">{{$item->acuity_value}}</option>
            @empty
            @endforelse
          </select>
    </div>


    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('visual_acuity_far_pinhole_right', __('messages.case.visual_acuity_far_pinhole_right') . ':', ['class' => 'form-label']) }}
        {{-- <span class="required"></span> --}}
       
        {{-- {{ Form::select('doctor_id', $visual_acuity, null, ['class' => 'form-select select2Selector', 'required', 'id' => 'caseDoctorId', 'placeholder' => __('messages.web_home.select_doctor'), 'data-control' => 'select2', 'required']) }} --}}
    <select id="vafpinr" class="select2 form-select" name="vafpinr" data-control="select2">
            <option value="">Select Visual Acuity Far (Pinhole) Right</option>
            {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'VAFPR')->get();}}
            @forelse($visual_acuity as $item)
            <option value="{{$item->id}}">{{$item->acuity_value}}</option>
            @empty
            @endforelse
          </select>
    </div>


    {{-- <div class="form-group col-sm-6 mb-5">
        {{ Form::label('date', __('messages.case.case_date') . ':', ['class' => 'form-label']) }}
        <span class="required"></span>
        {{ Form::text('date', null, ['placeholder' => __('messages.case.case_date') ,'id' => 'caseDate', 'class' => getLoggedInUser()->thememode ? 'bg-light form-control' : 'bg-white form-control', 'required', 'autocomplete' => 'off']) }}
    </div>
    <div class="form-group col-md-6 mb-5">
        {{ Form::label('phone', __('messages.case.phone') . ':', ['class' => 'form-label']) }}
        <br>
        {!! Form::tel('phone', isset($patientCase) ? $patientCase->phone ?? getCountryCode() : getCountryCode(), [
            'class' => 'form-control iti phoneNumber',
            'id' => 'casePhoneNumber',
        ]) !!}
        {!! Form::hidden('prefix_code', null, ['class' => 'prefix_code']) !!}
        <span class="text-success valid-msg d-none fw-400 fs-small">✓ &nbsp; {{ __('messages.valid') }}</span>
        <span class="text-danger error-msg d-none fw-400 fs-small"></span>
    </div> --}}
    {{-- <div class="form-group col-md-6 mb-5">
        {{ Form::label('status', __('messages.common.status') . ':', ['class' => 'form-label']) }}
        <br>
        <div class="form-check  form-switch">
            <input name="status" class="form-check-input w-35px h-20px is-active" value="1" type="checkbox"
                {{ !isset($patientCase) ? 'checked' : ($patientCase->status ? 'checked' : '') }}>
        </div>
    </div>
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('fee', __('messages.case.fee') . ':', ['class' => 'form-label']) }}
        <span class="required"></span>
        {{ Form::text('fee', null, ['class' => 'form-control price-input price','required','placeholder'=>__('messages.case.fee')]) }}
    </div> --}}
  
    
    
    
    
    
    <div class="d-flex justify-content-end">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2', 'id' => 'saveCaseBtn']) }}
        <a href="{{ route('patient-cases.index') }}"
            class="btn btn-secondary me-2">{{ __('messages.common.cancel') }}</a>
    </div>






</div>
