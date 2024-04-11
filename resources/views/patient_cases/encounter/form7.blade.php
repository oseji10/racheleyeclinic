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



 
    

  


        <div class="form-group col-sm-6 mb-5">TREATMENT
        </div>





        {{--Treatment Eyedrops  --}}
        {{-- @include('patient_cases.encounter.prescriptions.eye-drops') --}}



        {{-- Treatment tablets --}}
        {{-- @include('patient_cases.encounter.prescriptions.med-table') --}}

        {{-- Ointments--}}
        {{-- @include('patient_cases.encounter.prescriptions.ointment') --}}

     

{{-- Appintment Date --}}
        {{-- <div class="form-group col-sm-6 mb-5">
            {{ Form::label('followup_appointment_date', __('messages.case.followup_appointment_date') . ':', ['class' =>
            'form-label']) }}
            <input type="datetime-local" class="form-control" name="followup_appointment_date"
                placeholder="{{ __('messages.case.followup_appointment_date') }}">
        </div> --}}

        



        <table class="table table-striped" id="dynamicAddRemove" width="auto" border="1">
            <tr><td colspan="7"><h3>Eye Drops</h3></td></tr>
            <tr>
                <th>Medicine</th>
                <th>Dosage</th>
                <th>Dose Duration</th>
                <th>Time</th>
                <th>Dose Interval</th>
                <th>Comment</th>
                <th><button type="button" name="add" id="dynamic-ar" class="btn btn-primary text-star add-medicine-btn">Add </button></th>
            </tr>
            <tr>
                <td>
                    <input type="hidden" value="EYEDROP" name="treatment_type1"/>
                    <select id="dynamicSelect" name="addMoreEyedrops[' + i + '][eyedrop]" class="form-select select2" data-control="select2">
                        <option value="">Select Eyedrops</option>
                        <?php 
                            $medicines = App\Models\Medicine::select('name', 'id')->get(); 
                            ?>
                        @foreach($medicines as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->name }}
                        </option>
                        @endforeach
                    </select>
                    
                </td>
                <td><input type="text" name="addMoreEyedrops[' + i + '][dosage]" placeholder="Enter Dosage" class="form-control" /></td>
                <td>
                    <select class="select2 form-select" name="addMoreEyedrops[' + i + '][day]" data-control="select2">
                        <option value="">Select Dose Duration</option>
                        @foreach(\App\Models\Prescription::DOSE_DURATION as $day)
                            <option value="{{ $day }}">{{ $day }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select class="select2 form-select" name="addMoreEyedrops[' + i + '][time]" data-control="select2">
                        <option value="">Select Time</option>
                        @foreach(\App\Models\Prescription::MEAL_ARR as $time)
                            <option value="{{ $time }}">{{ $time }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select class="select2 form-select" name="addMoreEyedrops[' + i + '][dose_interval]" data-control="select2">
                        <option value="">Select Dose Interval</option>
                        @foreach(\App\Models\Prescription::DOSE_INTERVAL as $dose_interval)
                            <option value="{{ $dose_interval }}">{{ $dose_interval }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <textarea name="addMoreEyedrops[' + i + '][comment]" class="form-control" rows="1" placeholder="{{ __('messages.prescription.comment')}}"></textarea>
                </td>
                <td></td>
            </tr>
        </table>



         {{-- TABLETS --}}
         <table class="table table-striped" id="dynamicAddRemove2" width="100%" border="1">
            <tr><td colspan="7"><h3>Tablets</h3></td></tr>
            <tr>
                <th>Medicine</th>
                <th>Dosage</th>
                <th>Dose Duration</th>
                <th>Time</th>
                <th>Dose Interval</th>
                <th>Comment</th>
                <th><button type="button" name="add" id="dynamic-ar2" class="btn btn-primary text-star add-medicine-btn">Add </button></th>
            </tr>
            <tr>
                <td>
                    <input type="hidden" value="TABLET" name="treatment_type2"/>
                    <select id="dynamicSelect" name="addMoreTablets[' + i + '][tablet]" class="form-select select2" data-control="select2">
                        <option value="">Select Tablets</option>
                        <?php 
                            $medicines = App\Models\Medicine::select('name', 'id')->get(); 
                            ?>
                        @foreach($medicines as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->name }}
                        </option>
                        @endforeach
                    </select>
                    
                </td>
                <td><input type="text" name="addMoreTablets[' + i + '][dosage]" placeholder="Enter Dosage" class="form-control" /></td>
                <td>
                    <select class="select2 form-select" name="addMoreTablets[' + i + '][day]" data-control="select2">
                        <option value="">Select Dose Duration</option>
                        @foreach(\App\Models\Prescription::DOSE_DURATION as $day)
                            <option value="{{ $day }}">{{ $day }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select class="select2 form-select" name="addMoreTablets[' + i + '][time]" data-control="select2">
                        <option value="">Select Time</option>
                        @foreach(\App\Models\Prescription::MEAL_ARR as $time)
                            <option value="{{ $time }}">{{ $time }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select class="select2 form-select" name="addMoreTablets[' + i + '][dose_interval]" data-control="select2">
                        <option value="">Select Dose Interval</option>
                        @foreach(\App\Models\Prescription::DOSE_INTERVAL as $dose_interval)
                            <option value="{{ $dose_interval }}">{{ $dose_interval }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <textarea name="addMoreTablets[' + i + '][comment]" class="form-control" rows="1" placeholder="{{ __('messages.prescription.comment')}}"></textarea>
                </td>
                <td></td>
            </tr>
        </table>



        {{-- OINTMENT --}}
        <table class="table table-striped" id="dynamicAddRemove3" width="100%" border="1">
            <tr><td colspan="7"><h3>Ointments</h3></td></tr>
            <tr>
                <th>Medicine</th>
                <th>Dosage</th>
                <th>Dose Duration</th>
                <th>Time</th>
                <th>Dose Interval</th>
                <th>Comment</th>
                <th><button type="button" name="add" id="dynamic-ar3" class="btn btn-primary text-star add-medicine-btn">Add </button></th>
            </tr>
            <tr>
                <td>
                    <input type="hidden" value="OINTMENT" name="treatment_type3"/>
                    <select id="dynamicSelect" name="addMoreOintments[' + i + '][ointment]" class="form-select select2" data-control="select2">
                        <option value="">Select Ointments</option>
                        <?php 
                            $medicines = App\Models\Medicine::select('name', 'id')->get(); 
                            ?>
                        @foreach($medicines as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->name }}
                        </option>
                        @endforeach
                    </select>
                    
                </td>
                <td><input type="text" name="addMoreOintments[' + i + '][dosage]" placeholder="Enter Dosage" class="form-control" /></td>
                <td>
                    <select class="select2 form-select" name="addMoreOintments[' + i + '][day]" data-control="select2">
                        <option value="">Select Dose Duration</option>
                        @foreach(\App\Models\Prescription::DOSE_DURATION as $day)
                            <option value="{{ $day }}">{{ $day }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select class="select2 form-select" name="addMoreOintments[' + i + '][time]" data-control="select2">
                        <option value="">Select Time</option>
                        @foreach(\App\Models\Prescription::MEAL_ARR as $time)
                            <option value="{{ $time }}">{{ $time }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select class="select2 form-select" name="addMoreOintments[' + i + '][dose_interval]" data-control="select2">
                        <option value="">Select Dose Interval</option>
                        @foreach(\App\Models\Prescription::DOSE_INTERVAL as $dose_interval)
                            <option value="{{ $dose_interval }}">{{ $dose_interval }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <textarea name="addMoreOintments[' + i + '][comment]" class="form-control" rows="1" placeholder="{{ __('messages.prescription.comment')}}"></textarea>
                </td>
                <td></td>
            </tr>
        </table>


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

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('file_upload', __('messages.case.file_upload') . ':',
            ['class' => 'form-label']) }}
           
            <input class="form-control" type="file" id="file_upload" name="file_upload" placeholder="Followup Appointment Date"  />
        </div>


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
       

        <br /><br />
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary me-2" type="submit">{{ __('messages.common.save') }}</button>
        </div>










    </div>
</form>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><select id="dynamicSelectSubject" name="addMoreEyedrops[' + i +
            '][eyedrop]" class="form-control"><option value="">Select Eyedrops</option><?php $medicines = App\Models\Medicine::select("name", "id")->get(); foreach($medicines as $item){ ?><option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option><?php } ?></select></td><td><input type="text" name="addMoreEyedrops[' + i + '][dosage]" placeholder="Enter Dosage" class="form-control" /></td><td><select id="dynamicSelectDuration" name="addMoreEyedrops[' + i + '][day]" class="select2 form-select" data-control="select2"><option value="">Select Dose Duration</option><?php foreach(\App\Models\Prescription::DOSE_DURATION as $day){ ?><option value="<?php echo $day; ?>"><?php echo $day; ?></option><?php } ?></select></td><td><select id="dynamicSelectTime" name="addMoreEyedrops[' + i + '][time]" class="select2 form-select" data-control="select2"><option value="">Select Time</option><?php foreach(\App\Models\Prescription::MEAL_ARR as $time){ ?><option value="<?php echo $time; ?>"><?php echo $time; ?></option><?php } ?></select></td><td><select id="dynamicSelectInterval" name="addMoreEyedrops[' + i + '][dose_interval]" class="select2 form-select" data-control="select2"><option value="">Select Dose Interval</option><?php foreach(\App\Models\Prescription::DOSE_INTERVAL as $dose_interval){ ?><option value="<?php echo $dose_interval; ?>"><?php echo $dose_interval; ?></option><?php } ?></select></td><td><textarea name="addMoreEyedrops[' + i + '][comment]" class="form-control" rows="1" placeholder="{{ __('messages.prescription.comment')}}"></textarea></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );

        // Initialize select2 for newly added select elements
        $('.select2').select2();
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar2").click(function () {
        ++i;
        $("#dynamicAddRemove2").append('<tr><td><select id="dynamicSelectSubject" name="addMoreTablets[' + i +
            '][tablet]" class="form-control"><option value="">Select Tablets</option><?php $medicines = App\Models\Medicine::select("name", "id")->get(); foreach($medicines as $item){ ?><option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option><?php } ?></select></td><td><input type="text" name="addMoreTablets[' + i + '][dosage]" placeholder="Enter Dosage" class="form-control" /></td><td><select id="dynamicSelectDuration" name="addMoreTablets[' + i + '][day]" class="select2 form-select" data-control="select2"><option value="">Select Dose Duration</option><?php foreach(\App\Models\Prescription::DOSE_DURATION as $day){ ?><option value="<?php echo $day; ?>"><?php echo $day; ?></option><?php } ?></select></td><td><select id="dynamicSelectTime" name="addMoreTablets[' + i + '][time]" class="select2 form-select" data-control="select2"><option value="">Select Time</option><?php foreach(\App\Models\Prescription::MEAL_ARR as $time){ ?><option value="<?php echo $time; ?>"><?php echo $time; ?></option><?php } ?></select></td><td><select id="dynamicSelectInterval" name="addMoreTablets[' + i + '][dose_interval]" class="select2 form-select" data-control="select2"><option value="">Select Dose Interval</option><?php foreach(\App\Models\Prescription::DOSE_INTERVAL as $dose_interval){ ?><option value="<?php echo $dose_interval; ?>"><?php echo $dose_interval; ?></option><?php } ?></select></td><td><textarea name="addMoreTablets[' + i + '][comment]" class="form-control" rows="1" placeholder="{{ __('messages.prescription.comment')}}"></textarea></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );

        // Initialize select2 for newly added select elements
        $('.select2').select2();
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>

<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar3").click(function () {
        ++i;
        $("#dynamicAddRemove3").append('<tr><td><select id="dynamicSelectSubject" name="addMoreOintments[' + i +
            '][ointment]" class="form-control"><option value="">Select Ointment</option><?php $medicines = App\Models\Medicine::select("name", "id")->get(); foreach($medicines as $item){ ?><option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option><?php } ?></select></td><td><input type="text" name="addMoreOintments[' + i + '][dosage]" placeholder="Enter Dosage" class="form-control" /></td><td><select id="dynamicSelectDuration" name="addMoreOintments[' + i + '][day]" class="select2 form-select" data-control="select2"><option value="">Select Dose Duration</option><?php foreach(\App\Models\Prescription::DOSE_DURATION as $day){ ?><option value="<?php echo $day; ?>"><?php echo $day; ?></option><?php } ?></select></td><td><select id="dynamicSelectTime" name="addMoreOintments[' + i + '][time]" class="select2 form-select" data-control="select2"><option value="">Select Time</option><?php foreach(\App\Models\Prescription::MEAL_ARR as $time){ ?><option value="<?php echo $time; ?>"><?php echo $time; ?></option><?php } ?></select></td><td><select id="dynamicSelectInterval" name="addMoreOintments[' + i + '][dose_interval]" class="select2 form-select" data-control="select2"><option value="">Select Dose Interval</option><?php foreach(\App\Models\Prescription::DOSE_INTERVAL as $dose_interval){ ?><option value="<?php echo $dose_interval; ?>"><?php echo $dose_interval; ?></option><?php } ?></select></td><td><textarea name="addMoreOintments[' + i + '][comment]" class="form-control" rows="1" placeholder="{{ __('messages.prescription.comment')}}"></textarea></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );

        // Initialize select2 for newly added select elements
        $('.select2').select2();
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>