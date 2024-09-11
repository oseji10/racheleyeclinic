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
        <div class="form-group col-sm-6 mb-5">DIAGNOSIS</div>
        <div></div>

<div class="form-group col-sm-6 mb-5">
    {{ Form::label('diagnosis', __('messages.case.diagnosis_right_eye') . ':', ['class' => 'form-label']) }}
    <select id="diagnosis_right_eye" class="select2 form-select" name="diagnosis_right_eye" multiple data-control="select2">
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
    {{ Form::label('diagnosis', __('messages.case.diagnosis_left_eye') . ':', ['class' => 'form-label']) }}
    <select id="diagnosis_left_eye" class="select2 form-select" name="diagnosis_left_eye" multiple data-control="select2">
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
    <select id="investigations_required" class="select2 form-select" name="investigations_required[]" multiple data-control="select2">
        <option value="">Select Investigations Required</option>
        <?php 
            $encounter = App\Models\Encounters::where('patient_id', session('patient_id') )->where('temporary_id', session('temporary_id'))->first();
            $selected_visual_acuity_ids = $encounter ? explode(',', $encounter->investigations_required) : [];
            $visual_acuities = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'INVREQ')->get(); 
        ?>
        @foreach($visual_acuities as $item)
            <option value="{{ $item->id }}" {{ (in_array($item->id, $selected_visual_acuity_ids)) ? 'selected' : '' }}>
                {{ $item->acuity_value }}
            </option>
        @endforeach
    </select>
</div>


<div class="form-group col-sm-6 mb-5">
        
                
                <label for="external_investigation_required">External Investigations Required</label>
                <textarea name="external_investigation_required" class="form-control" rows="3" placeholder="External Investigations Required"></textarea>
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
       


<div></div>
<div></div>
<div></div>
<div class="form-group col-sm-6 mb-5">
            {{ Form::label('file_upload', __('messages.case.investigations_done') . ':',
            ['class' => 'form-label']) }}
           
           
            <textarea class="form-control" rows="2" type="text" id="investigations_done" name="investigations_done" placeholder="Investigations Done"></textarea>
        </div>


        <div class="form-group col-sm-6 mb-5">
            <h3>Physical Information</h3>
            <label for="hbp">HBP</label>
                <input type="checkbox" id="hbp" name="hbp" >
        
                <label for="diabetes">Diabetes</label>
                <input type="checkbox" id="diabetes" name="diabetes">

                <label for="pregnancy">Pregnancy</label>
                <input type="checkbox" id="pregnancy" name="pregnancy">
        
                <br/><br/>
                <label for="food">Food</label>
                {{-- <input type="text" id="food" name="food"> --}}
                <textarea name="food" class="form-control" rows="2" placeholder="Food"></textarea>
            <br/>
                <label for="drug-allergy">Drug Allergy</label>
                <textarea name="drug_allergy" class="form-control" rows="2" placeholder="Drug Allergy"></textarea>
        
                <br/>
                <label for="drug-allergy">Current Medication</label>
                <textarea name="current_medication" class="form-control" rows="2" placeholder="Current Medication"></textarea>
        
        
                
        </div>



  
     




      




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

        


        <div class="form-group col-sm-12 mb-5">
            <div style="overflow-x: auto;">
                <table class="table table-striped" id="dynamicAddRemove" width="auto" border="1">
            <tr>
                    <td colspan="7"><h3>Eye Drops</h3>
                    <a href="#" id="addNewMedicine" data-bs-toggle="modal" data-bs-target="#addMedicineModal">[+ Add New Medicine]</a>
                </td>
            </tr>
   <!-- Modal Structure -->
   

                    <tr>
                        <th>Medicine</th>
                        <th>Dosage</th>
                        <th>Dose Duration</th>
                        <th>Time</th>
                        <th>Dose Interval</th>
                        <th>Comment</th>
                        <th><button type="button" name="add" id="dynamic-ar" class="btn btn-primary text-star add-medicine-btn">Add</button></th>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" value="EYEDROP" name="treatment_type1"/>
                        
                            <select id="dynamicSelect2" name="addMoreEyedrops[' + i + '][eyedrop]" class="form-select select2" data-control="select2">
                            <option value="">Select...</option>
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
                                <option value="">Select Duration</option>
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
                                <option value="">Select Interval</option>
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
            </div>
            
        


         {{-- TABLETS --}}
         <div style="overflow-x: auto;">
            <table class="table table-striped" id="dynamicAddRemove2" width="100%" border="1">
                <tr>
                    <td colspan="7"><h3>Tablets</h3></td>
                </tr>
                <tr>
                    <th>Medicine</th>
                    <th>Dosage</th>
                    <th>Dose Duration</th>
                    <th>Time</th>
                    <th>Dose Interval</th>
                    <th>Comment</th>
                    <th><button type="button" name="add" id="dynamic-ar2" class="btn btn-primary text-star add-medicine-btn">Add</button></th>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" value="TABLET" name="treatment_type2"/>
                        <select id="dynamicSelect2" name="addMoreTablets[' + i + '][tablet]" class="form-select select2" data-control="select2">
                            <option value="">Select...</option>
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
                            <option value="">Select Duration</option>
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
                            <option value="">Select Interval</option>
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
        </div>
        

        {{-- OINTMENT --}}
        <div style="overflow-x: auto;">
            <table class="table table-striped" id="dynamicAddRemove3" width="100%" border="1">
                <tr>
                    <td colspan="7"><h3>Ointments</h3></td>
                </tr>
                <tr>
                    <th>Medicine</th>
                    <th>Dosage</th>
                    <th>Dose Duration</th>
                    <th>Time</th>
                    <th>Dose Interval</th>
                    <th>Comment</th>
                    <th><button type="button" name="add" id="dynamic-ar3" class="btn btn-primary text-star add-medicine-btn">Add</button></th>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" value="OINTMENT" name="treatment_type3"/>
                        <select id="dynamicSelect3" name="addMoreOintments[' + i + '][ointment]" class="form-select select2" data-control="select2">
                            <option value="">Select...</option>
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
                            <option value="">Select Duration</option>
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
                            <option value="">Select Interval</option>
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
        </div>
        
    </div>


    <div class="form-group col-sm-6 mb-5">
            {{ Form::label('frame', __('messages.case.frame') . ':',
            ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $frame = $encounter ? $encounter->frame : null;
            ?>
            <input class="form-control" type="text" id="frame" name="frame"
                autofocus placeholder="Frame" @if($frame !==null)
                value="{{ $frame }}" @endif />
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('lens_type', __('messages.case.lens_type') . ':',
            ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $lens_type = $encounter ? $encounter->lens_type : null;
            ?>
            <input class="form-control" type="text" id="lens_type" name="lens_type"
                autofocus placeholder="Lens Type" @if($frame !==null)
                value="{{ $lens_type }}" @endif />
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('cost_of_lens', __('messages.case.cost_of_lens') . ':',
            ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $cost_of_lens = $encounter ? $encounter->cost_of_lens : null;
            ?>
            <input class="form-control" type="text" id="cost_of_lens" name="cost_of_lens"
                autofocus placeholder="Cost Of Lens" @if($frame !==null)
                value="{{ $cost_of_lens }}" @endif />
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('cost_of_frame', __('messages.case.cost_of_frame') . ':',
            ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $cost_of_frame = $encounter ? $encounter->cost_of_frame : null;
            ?>
            <input class="form-control" type="text" id="cost_of_frame" name="cost_of_frame"
                autofocus placeholder="Cost Of Frame" @if($frame !==null)
                value="{{ $cost_of_frame }}" @endif />
        </div>
     


    <br /><br />
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary me-2" type="submit">{{ __('messages.common.save') }}</button>
        </div>



    </div>
</form>


<div class="modal fade" id="addMedicineModal" tabindex="-1" aria-labelledby="addMedicineModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Use modal-lg to make the modal wider -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMedicineModalLabel">Add New Medicine</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="addMedicineForm" action="{{ route('medicine.store_medicines') }}" method="post">
            @csrf
                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <label for="medicineName" class="form-label">Medicine Name</label>
                            <input type="text" class="form-control" id="medicineName" name="name" required>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label for="medicineDosage" class="form-label">Category</label>
                            <select class="select2 form-select" id="category" name="category_id" required>
                                        <option value="">Select a category</option>
                                        @php
                                            $categories = \App\Models\Category::all();
                                        @endphp
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <label for="medicineName" class="form-label">Brand</label>
                            <select class="select2 form-select" id="brand" name="brand_id" required>
                                        <option value="">Select a brand</option>
                                        @php
                                            $brands = \App\Models\Brand::all();
                                        @endphp
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label for="medicineDosage" class="form-label">Salt Composition</label>
                            <input type="text" class="form-control" id="medicineDosage" name="salt_composition" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <label for="medicineName" class="form-label">Buying Price</label>
                            <input type="text" class="form-control" id="medicineName" name="buying_price" required>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label for="medicineDosage" class="form-label">Selling Price</label>
                            <input type="text" class="form-control" id="medicineDosage" name="selling_price" required>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12 col-12 mb-3">
                            <label for="medicineName" class="form-label">Side Effects</label>
                            <textarea class="form-control" name="side_effects"></textarea>
                        </div>
                      
                    </div>


                    <div class="row">
                       
                        <div class="col-md-12 col-12 mb-3">
                            <label for="medicineDosage" class="form-label">Description</label>
                            <textarea class="form-control" name="description"></textarea>
                            
                        </div>

                        <input name="quantity" value="0" hidden/>
                        <input name="available_quantity" value="0" hidden/>
                    </div>

                    
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><select id="dynamicSelectSubject3" name="addMoreEyedrops[' + i +
            '][eyedrop]" class="select2 form-select"><option value="">Select...</option><?php $medicines = App\Models\Medicine::select("name", "id")->get(); foreach($medicines as $item){ ?><option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option><?php } ?></select></td><td><input type="text" name="addMoreEyedrops[' + i + '][dosage]" placeholder="Enter Dosage" class="form-control" /></td><td><select id="dynamicSelectDuration" name="addMoreEyedrops[' + i + '][day]" class="select2 form-select" data-control="select2"><option value="">Select Duration</option><?php foreach(\App\Models\Prescription::DOSE_DURATION as $day){ ?><option value="<?php echo $day; ?>"><?php echo $day; ?></option><?php } ?></select></td><td><select id="dynamicSelectTime" name="addMoreEyedrops[' + i + '][time]" class="select2 form-select" data-control="select2"><option value="">Select Time</option><?php foreach(\App\Models\Prescription::MEAL_ARR as $time){ ?><option value="<?php echo $time; ?>"><?php echo $time; ?></option><?php } ?></select></td><td><select id="dynamicSelectInterval" name="addMoreEyedrops[' + i + '][dose_interval]" class="select2 form-select" data-control="select2"><option value="">Select Interval</option><?php foreach(\App\Models\Prescription::DOSE_INTERVAL as $dose_interval){ ?><option value="<?php echo $dose_interval; ?>"><?php echo $dose_interval; ?></option><?php } ?></select></td><td><textarea name="addMoreEyedrops[' + i + '][comment]" class="form-control" rows="1" placeholder="{{ __('messages.prescription.comment')}}"></textarea></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
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
        $("#dynamicAddRemove2").append('<tr><td><select id="dynamicSelectSubject2" name="addMoreTablets[' + i +
            '][tablet]" class="form-control"><option value="">Select...</option><?php $medicines = App\Models\Medicine::select("name", "id")->get(); foreach($medicines as $item){ ?><option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option><?php } ?></select></td><td><input type="text" name="addMoreTablets[' + i + '][dosage]" placeholder="Enter Dosage" class="form-control" /></td><td><select id="dynamicSelectDuration" name="addMoreTablets[' + i + '][day]" class="select2 form-select" data-control="select2"><option value="">Select Duration</option><?php foreach(\App\Models\Prescription::DOSE_DURATION as $day){ ?><option value="<?php echo $day; ?>"><?php echo $day; ?></option><?php } ?></select></td><td><select id="dynamicSelectTime" name="addMoreTablets[' + i + '][time]" class="select2 form-select" data-control="select2"><option value="">Select Time</option><?php foreach(\App\Models\Prescription::MEAL_ARR as $time){ ?><option value="<?php echo $time; ?>"><?php echo $time; ?></option><?php } ?></select></td><td><select id="dynamicSelectInterval" name="addMoreTablets[' + i + '][dose_interval]" class="select2 form-select" data-control="select2"><option value="">Select Interval</option><?php foreach(\App\Models\Prescription::DOSE_INTERVAL as $dose_interval){ ?><option value="<?php echo $dose_interval; ?>"><?php echo $dose_interval; ?></option><?php } ?></select></td><td><textarea name="addMoreTablets[' + i + '][comment]" class="form-control" rows="1" placeholder="{{ __('messages.prescription.comment')}}"></textarea></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
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
        $("#dynamicAddRemove3").append('<tr><td><select id="dynamicSelectSubject3" name="addMoreOintments[' + i +
            '][ointment]" class="form-control"><option value="">Select...</option><?php $medicines = App\Models\Medicine::select("name", "id")->get(); foreach($medicines as $item){ ?><option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option><?php } ?></select></td><td><input type="text" name="addMoreOintments[' + i + '][dosage]" placeholder="Enter Dosage" class="form-control" /></td><td><select id="dynamicSelectDuration" name="addMoreOintments[' + i + '][day]" class="select2 form-select" data-control="select2"><option value="">Select Duration</option><?php foreach(\App\Models\Prescription::DOSE_DURATION as $day){ ?><option value="<?php echo $day; ?>"><?php echo $day; ?></option><?php } ?></select></td><td><select id="dynamicSelectTime" name="addMoreOintments[' + i + '][time]" class="select2 form-select" data-control="select2"><option value="">Select Time</option><?php foreach(\App\Models\Prescription::MEAL_ARR as $time){ ?><option value="<?php echo $time; ?>"><?php echo $time; ?></option><?php } ?></select></td><td><select id="dynamicSelectInterval" name="addMoreOintments[' + i + '][dose_interval]" class="select2 form-select" data-control="select2"><option value="">Select Interval</option><?php foreach(\App\Models\Prescription::DOSE_INTERVAL as $dose_interval){ ?><option value="<?php echo $dose_interval; ?>"><?php echo $dose_interval; ?></option><?php } ?></select></td><td><textarea name="addMoreOintments[' + i + '][comment]" class="form-control" rows="1" placeholder="{{ __('messages.prescription.comment')}}"></textarea></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );

        // Initialize select2 for newly added select elements
        $('.select2').select2();
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
<script>
    $(document).ready(function() {
        $('#addMedicineForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                success: function(response) {
                    // Handle success response
                    alert('Medicine added successfully!');
                    $('#addMedicineModal').modal('hide');
                    // Optionally, you can append the new medicine to the table dynamically
                },
                error: function(response) {
                    // Handle error response
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });
</script>

<style>
    @media (min-width: 992px) {
        .modal-lg {
            max-width: 80%; /* Adjust this value as needed */
        }
    }
</style>