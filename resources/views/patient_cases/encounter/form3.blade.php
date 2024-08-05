<form action="{{ route('update.consultation') }}" method="post">
    @csrf
    <div class="row">
        <input type="hidden" name="patient_id" value="{{ session('patient_id') }}">
        <input type="hidden" name="temporary_id" value="{{ session('temporary_id') }}">

        @php
        if(session()->has('patient_id')) {
            $patients = App\Models\Patient::select('patients.*', 'users.*')
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
        {{-- INTRAOCULLAR PRESSURE --}}

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('intraoccular_pressure_right', __('messages.case.intraoccular_pressure_right') . ':',
            ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $intraoccular_pressure_right = $encounter ? $encounter->intraoccular_pressure_right : null;
            ?>
            <input class="form-control" type="text" id="intraoccular_pressure_right" name="intraoccular_pressure_right"
                autofocus placeholder="Intraocular Pressure Right" @if($intraoccular_pressure_right !==null)
                value="{{ $intraoccular_pressure_right }}" @endif />
        </div>


        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('intraoccular_pressure_left', __('messages.case.intraoccular_pressure_left') . ':', ['class'
            => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $intraoccular_pressure_left = $encounter ? $encounter->intraoccular_pressure_left : null;
            ?>
            <input class="form-control" type="text" id="intraoccular_pressure_left" name="intraoccular_pressure_left"
                autofocus placeholder="Intraocular Pressure Left" @if($intraoccular_pressure_left !==null)
                value="{{ $intraoccular_pressure_left }}" @endif />
        </div>



        {{-- CHIEF COMPLAINT --}}

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('chief_complaint_right', __('messages.case.chief_complaint_right') . ':', ['class' =>
            'form-label']) }}
            <select id="chief_complaint_right" class="select2 form-select" name="chief_complaint_right"
                data-control="select2">
                <option value="">Select Chief Complaint Right</option>
                <?php 
                    $encounter = App\Models\Encounters::where('patient_id', session('patient_id') )->where('temporary_id', session('temporary_id'))->first();
                    $selected_visual_acuity_id = $encounter ? $encounter->chief_complaint_right : null;
                    $visual_acuities = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'CC')->get(); 
                ?>
                @foreach($visual_acuities as $item)
                <option value="{{ $item->id }}" {{ ($item->id == $selected_visual_acuity_id) ? 'selected' : '' }}>
                    {{ $item->acuity_value }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('chief_complaint_left', __('messages.case.chief_complaint_left') . ':', ['class' =>
            'form-label']) }}
            <select id="chief_complaint_left" class="select2 form-select" name="chief_complaint_left"
                data-control="select2">
                <option value="">Select Chief Complaint Left</option>
                <?php 
                    $encounter = App\Models\Encounters::where('patient_id', session('patient_id') )->where('temporary_id', session('temporary_id'))->first();
                    $selected_visual_acuity_id = $encounter ? $encounter->chief_complaint_left : null;
                    $visual_acuities = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'CC')->get(); 
                ?>
                @foreach($visual_acuities as $item)
                <option value="{{ $item->id }}" {{ ($item->id == $selected_visual_acuity_id) ? 'selected' : '' }}>
                    {{ $item->acuity_value }}
                </option>
                @endforeach
            </select>
        </div>


        {{-- OTHER COMPLAINTS --}}


        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('other_complaints_right', __('messages.case.other_complaints_right') . ':', ['class' =>
            'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $other_complaints_right = $encounter ? $encounter->other_complaints_right : null;
            ?>
            <textarea class="form-control" rows="4" name="other_complaints_right"
                placeholder="{{ __('messages.case.other_complaints_right') }}">
        @if($other_complaints_right !== null)
        {{ $other_complaints_right }}
        @endif
        </textarea>
        </div>


        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('other_complaints_left', __('messages.case.other_complaints_left') . ':', ['class' =>
            'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $other_complaints_left = $encounter ? $encounter->other_complaints_left : null;
            ?>
            <textarea class="form-control" rows="4" name="other_complaints_left"
                placeholder="{{ __('messages.case.other_complaints_left') }}">
        @if($other_complaints_left !== null)
        {{ $other_complaints_left }}
        @endif
        </textarea>
        </div>





        {{-- DETIALED HISTORY --}}


<div class="form-group col-sm-6 mb-5">
    {{ Form::label('detailed_history_right', __('messages.case.detailed_history_right') . ':', ['class' =>
    'form-label']) }}
    <?php
        // Check if the field is not null in the encounters table
        $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
        $detailed_history_right = $encounter ? $encounter->detailed_history_right : null;
    ?>
    <textarea class="form-control" rows="4" name="detailed_history_right"
        placeholder="{{ __('messages.case.detailed_history_right') }}">
@if($detailed_history_right !== null)
{{ $detailed_history_right }}
@endif
</textarea>
</div>


<div class="form-group col-sm-6 mb-5">
    {{ Form::label('detailed_history_left', __('messages.case.detailed_history_left') . ':', ['class' =>
    'form-label']) }}
    <?php
        // Check if the field is not null in the encounters table
        $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
        $detailed_history_left = $encounter ? $encounter->detailed_history_left : null;
    ?>
    <textarea class="form-control" rows="4" name="detailed_history_left"
        placeholder="{{ __('messages.case.detailed_history_left') }}">
@if($detailed_history_left !== null)
{{ $detailed_history_left }}
@endif
</textarea>
</div>




        {{-- CASE FINDINGS --}}

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('findings_right', __('messages.case.findings_right') . ':', ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $findings_right = $encounter ? $encounter->findings_right : null;
            ?>
            <textarea class="form-control" rows="4" name="findings_right"
                placeholder="{{ __('messages.case.findings_right') }}">
        @if($findings_right !== null)
        {{ $findings_right }}
        @endif
        </textarea>
        </div>



        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('findings_left', __('messages.case.findings_left') . ':', ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $findings_left = $encounter ? $encounter->findings_left : null;
            ?>
            <textarea class="form-control" rows="4" name="findings_left"
                placeholder="{{ __('messages.case.findings_left') }}">
        @if($findings_left !== null)
        {{ $findings_left }}
        @endif
        </textarea>
        </div>

        {{-- EYELIDS --}}

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('eyelid_right', __('messages.case.eyelid_right') . ':', ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $eyelid_right = $encounter ? $encounter->findings_left : null;
            ?>
            <textarea class="form-control" rows="4" name="eyelid_right"
                placeholder="{{ __('messages.case.eyelid_right') }}">
        @if($eyelid_right !== null)
        {{ $eyelid_right }}
        @endif
        </textarea>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('eyelid_left', __('messages.case.eyelid_left') . ':', ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $eyelid_left = $encounter ? $encounter->eyelid_left : null;
            ?>
            <textarea class="form-control" rows="4" name="eyelid_left"
                placeholder="{{ __('messages.case.eyelid_left') }}">
        @if($eyelid_left !== null)
        {{ $eyelid_left }}
        @endif
        </textarea>
        </div>
        {{-- CONJUNCTIVA --}}

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('conjunctiva_right', __('messages.case.conjunctiva_right') . ':', ['class' => 'form-label'])
            }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $conjunctiva_right = $encounter ? $encounter->conjunctiva_right : null;
            ?>
            <textarea class="form-control" rows="4" name="conjunctiva_right"
                placeholder="{{ __('messages.case.conjunctiva_right') }}">
        @if($conjunctiva_right !== null)
        {{ $conjunctiva_right }}
        @endif
        </textarea>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('conjunctiva_left', __('messages.case.conjunctiva_left') . ':', ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $conjunctiva_left = $encounter ? $encounter->conjunctiva_left : null;
            ?>
            <textarea class="form-control" rows="4" name="conjunctiva_left"
                placeholder="{{ __('messages.case.conjunctiva_left') }}">
        @if($conjunctiva_left !== null)
        {{ $conjunctiva_left }}
        @endif
        </textarea>
        </div>
        {{-- CORNEA --}}

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('cornea_right', __('messages.case.cornea_right') . ':', ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $cornea_right = $encounter ? $encounter->cornea_left : null;
            ?>
            <textarea class="form-control" rows="4" name="cornea_right"
                placeholder="{{ __('messages.case.cornea_right') }}">
        @if($cornea_right !== null)
        {{ $cornea_right }}
        @endif
        </textarea>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('cornea_left', __('messages.case.cornea_left') . ':', ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $cornea_left = $encounter ? $encounter->cornea_left : null;
            ?>
            <textarea class="form-control" rows="4" name="cornea_left"
                placeholder="{{ __('messages.case.cornea_left') }}">
        @if($cornea_left !== null)
        {{ $cornea_left }}
        @endif
        </textarea>
        </div>



        {{-- AC --}}

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('AC_right', __('messages.case.AC_right') . ':', ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $AC_right = $encounter ? $encounter->AC_right : null;
            ?>
            <textarea class="form-control" rows="4" name="AC_right" placeholder="{{ __('messages.case.AC_right') }}">
        @if($AC_right !== null)
        {{ $AC_right }}
        @endif
        </textarea>
        </div>


        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('AC_left', __('messages.case.AC_left') . ':', ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $AC_left = $encounter ? $encounter->AC_left : null;
            ?>
            <textarea class="form-control" rows="4" name="AC_left" placeholder="{{ __('messages.case.AC_left') }}">
        @if($AC_right !== null)
        {{ $AC_right }}
        @endif
        </textarea>
        </div>


        {{-- IRIS --}}

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('iris_right', __('messages.case.iris_right') . ':', ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $iris_right = $encounter ? $encounter->iris_right : null;
            ?>
            <textarea class="form-control" rows="4" name="iris_right"
                placeholder="{{ __('messages.case.iris_right') }}">
        @if($iris_right !== null)
        {{ $iris_right }}
        @endif
        </textarea>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('iris_left', __('messages.case.iris_left') . ':', ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $iris_left = $encounter ? $encounter->AC_left : null;
            ?>
            <textarea class="form-control" rows="4" name="iris_left" placeholder="{{ __('messages.case.iris_left') }}">
        @if($iris_left !== null)
        {{ $iris_left }}
        @endif
        </textarea>
        </div>



        {{-- PUPIL --}}

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('pupil_right', __('messages.case.pupil_right') . ':', ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $pupil_right = $encounter ? $encounter->pupil_right : null;
            ?>
            <textarea class="form-control" rows="4" name="pupil_right"
                placeholder="{{ __('messages.case.pupil_right') }}">
        @if($pupil_right !== null)
        {{ $pupil_right }}
        @endif
        </textarea>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('pupil_left', __('messages.case.pupil_left') . ':', ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $pupil_left = $encounter ? $encounter->pupil_left : null;
            ?>
            <textarea class="form-control" rows="4" name="pupil_left"
                placeholder="{{ __('messages.case.pupil_left') }}">
        @if($pupil_left !== null)
        {{ $pupil_left }}
        @endif
        </textarea>
        </div>
        {{-- LENS --}}

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('lens_right', __('messages.case.lens_right') . ':', ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $lens_right = $encounter ? $encounter->lens_right : null;
            ?>
            <textarea class="form-control" rows="4" name="lens_right"
                placeholder="{{ __('messages.case.lens_right') }}">
        @if($lens_right !== null)
        {{ $lens_right }}
        @endif
        </textarea>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('lens_left', __('messages.case.lens_left') . ':', ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $lens_left = $encounter ? $encounter->lens_left : null;
            ?>
            <textarea class="form-control" rows="4" name="lens_left" placeholder="{{ __('messages.case.lens_left') }}">
        @if($lens_left !== null)
        {{ $lens_left }}
        @endif
        </textarea>
        </div>
        {{-- VITRREOUS --}}

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('vitreous_left', __('messages.case.vitreous_left') . ':', ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $vitreous_left = $encounter ? $encounter->vitreous_left : null;
            ?>
            <textarea class="form-control" rows="4" name="vitreous_left"
                placeholder="{{ __('messages.case.vitreous_left') }}">
        @if($vitreous_left !== null)
        {{ $vitreous_left }}
        @endif
        </textarea>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('vitreous_right', __('messages.case.vitreous_right') . ':', ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $vitreous_right = $encounter ? $encounter->vitreous_left : null;
            ?>
            <textarea class="form-control" rows="4" name="vitreous_right"
                placeholder="{{ __('messages.case.vitreous_right') }}">
        @if($vitreous_right !== null)
        {{ $vitreous_right }}
        @endif
        </textarea>
        </div>
        {{-- RETINA --}}
        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('retina_right', __('messages.case.retina_right') . ':', ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $retina_right = $encounter ? $encounter->retina_right : null;
            ?>
            <textarea class="form-control" rows="4" name="retina_right"
                placeholder="{{ __('messages.case.retina_right') }}">
        @if($retina_right !== null)
        {{ $retina_right }}
        @endif
        </textarea>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('retina_left', __('messages.case.retina_left') . ':', ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $retina_left = $encounter ? $encounter->retina_left : null;
            ?>
            <textarea class="form-control" rows="4" name="retina_left"
                placeholder="{{ __('messages.case.retina_left') }}">
        @if($retina_left !== null)
        {{ $retina_left }}
        @endif
        </textarea>
        </div>


        {{-- OTHER FINDINGS --}}
        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('other_findings_right', __('messages.case.other_findings_right') . ':', ['class' =>
            'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $other_findings_right = $encounter ? $encounter->other_findings_right : null;
            ?>
            <textarea class="form-control" rows="4" name="other_findings_right"
                placeholder="{{ __('messages.case.other_findings_right') }}">
        @if($other_findings_right !== null)
        {{ $other_findings_right }}
        @endif
        </textarea>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('other_findings_left', __('messages.case.other_findings_left') . ':', ['class' =>
            'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $other_findings_left = $encounter ? $encounter->other_findings_left : null;
            ?>
            <textarea class="form-control" rows="4" name="other_findings_left"
                placeholder="{{ __('messages.case.other_findings_left') }}">
        @if($other_findings_left !== null)
        {{ $other_findings_left }}
        @endif
        </textarea>
        </div>








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