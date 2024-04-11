<form action="{{ route('update.diagnosis') }}" method="post">
    @csrf
    <div class="row">


        <input type="hidden" name="patient_id" value="{{ session('patient_id') }}">
        <input type="hidden" name="temporary_id" value="{{ session('temporary_id') }}">

        @php
        if(session()->has('patient_id')) {
            $patients = App\Models\Patient::select('patients.*', 'patients.id as pid', 'users.*')
                        ->join('users', 'users.id', '=', 'patients.user_id')
                        ->where('user_id', '=', session('patient_id'))
                        ->get();
        } else {
            // Redirect to the login page
            return redirect()->route('login');
        }
    @endphp
    
    @foreach ($patients as $patient)
        <!-- Your code to display patient information goes here -->
    @endforeach
        @include('patient_cases.encounter.patient_id_card_template.fields')

        <input type="hidden" name="pid" value="{{ $patient->pid }}">
        {{-- <table width="100%" style="text-align:center">
            <tr>
                <td width="50%">
                    <h2>RIGHT</h2>
                </td>
                <td>
                    <h2>LEFT</h2>
                </td>
            </tr>
        </table> --}}



 
    

  
{{-- Diagnosis --}}


        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('diagnosis', __('messages.case.diagnosis') . ':', ['class' => 'form-label']) }}
            <select id="diagnosis" class="select2 form-select" name="diagnosis" data-control="select2">
                <option value="">Select Diagnosis Type</option>
                <?php 
                    $encounter = App\Models\Encounters::where('patient_id', session('patient_id') )->where('temporary_id', session('temporary_id'))->first();
                    $selected_visual_acuity_id = $encounter ? $encounter->diagnosis : null;
                    $visual_acuities = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'DIAG')->get(); 
                ?>
                @foreach($visual_acuities as $item)
                    <option value="{{ $item->id }}" {{ ($item->id == $selected_visual_acuity_id) ? 'selected' : '' }}>
                        {{ $item->acuity_value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-sm-6 mb-5">
        </div>





        {{--Treatment Eyedrops  --}}
        @include('patient_cases.encounter.prescriptions.eye-drops')



        {{-- Treatment tablets --}}
        {{-- @include('patient_cases.encounter.prescriptions.med-table') --}}

        {{-- Ointments--}}
        {{-- @include('patient_cases.encounter.prescriptions.ointment') --}}

        {{-- Investigations Required --}}
        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('investigations_required', __('messages.case.investigations_required') . ':', ['class' => 'form-label']) }}
            <select id="investigations_required" class="select2 form-select" name="investigations_required" data-control="select2">
                <option value="">Select Investigations Required</option>
                <?php 
                    $encounter = App\Models\Encounters::where('patient_id', session('patient_id') )->where('temporary_id', session('temporary_id'))->first();
                    $selected_visual_acuity_id = $encounter ? $encounter->investigations_required : null;
                    $visual_acuities = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'INVREQ')->get(); 
                ?>
                @foreach($visual_acuities as $item)
                    <option value="{{ $item->id }}" {{ ($item->id == $selected_visual_acuity_id) ? 'selected' : '' }}>
                        {{ $item->acuity_value }}
                    </option>
                @endforeach
            </select>
        </div>

{{-- Appintment Date --}}
        {{-- <div class="form-group col-sm-6 mb-5">
            {{ Form::label('followup_appointment_date', __('messages.case.followup_appointment_date') . ':', ['class' =>
            'form-label']) }}
            <input type="datetime-local" class="form-control" name="followup_appointment_date"
                placeholder="{{ __('messages.case.followup_appointment_date') }}">
        </div> --}}

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('followup_appointment_date', __('messages.case.followup_appointment_date') . ':',
            ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $followup_appointment_date = $encounter ? $encounter->followup_appointment_date : null;
            ?>
            <input class="form-control" type="datetime-local" id="followup_appointment_date" name="followup_appointment_date"
                autofocus placeholder="Followup Appointment Date" @if($followup_appointment_date !==null)
                value="{{ $followup_appointment_date }}" @endif />
        </div>



        {{-- @include('patient_cases.encounter.columns.medical-table') --}}
        {{-- @include('patient_cases.encounter.prescriptions.med-table') --}}

        <br /><br />
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary me-2" type="submit">{{ __('messages.common.save') }}</button>
        </div>




        {{-- <div class="d-flex justify-content-end">
            {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2', 'id' => 'saveCaseBtn']) }}
            <a href="{{ route('patient-cases.index') }}" class="btn btn-secondary me-2">{{ __('messages.common.cancel')
                }}</a>
        </div> --}}






    </div>
</form>
