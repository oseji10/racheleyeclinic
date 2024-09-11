<form action="{{ route('update.refraction') }}" method="post">
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




        <h3>Refraction</h3>
        {{-- SPHERE SPH --}}
        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('sphere_right', __('messages.case.sphere_right') . ':', ['class' => 'form-label']) }}
            <select id="sphere_right" class="select2 form-select" name="sphere_right" data-control="select2">
                <option value="">Select Sphere Right</option>
                <?php 
                    $encounter = App\Models\Encounters::where('patient_id', session('patient_id') )->where('temporary_id', session('temporary_id'))->first();
                    $selected_visual_acuity_id = $encounter ? $encounter->sphere_right : null;
                    $visual_acuities = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'SPHR')->get(); 
                ?>
                @foreach($visual_acuities as $item)
                    <option value="{{ $item->id }}" {{ ($item->id == $selected_visual_acuity_id) ? 'selected' : '' }}>
                        {{ $item->acuity_value }}
                    </option>
                @endforeach
            </select>
        </div>



        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('sphere_left', __('messages.case.sphere_left') . ':', ['class' => 'form-label']) }}
            <select id="sphere_left" class="select2 form-select" name="sphere_left" data-control="select2">
                <option value="">Select Sphere Right</option>
                <?php 
                    $encounter = App\Models\Encounters::where('patient_id', session('patient_id') )->where('temporary_id', session('temporary_id'))->first();
                    $selected_visual_acuity_id = $encounter ? $encounter->sphere_left : null;
                    $visual_acuities = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'SPHL')->get(); 
                ?>
                @foreach($visual_acuities as $item)
                    <option value="{{ $item->id }}" {{ ($item->id == $selected_visual_acuity_id) ? 'selected' : '' }}>
                        {{ $item->acuity_value }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- CYLINDER CYL --}}
        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('cylinder_right', __('messages.case.cylinder_right') . ':', ['class' => 'form-label']) }}
            <select id="cylinder_right" class="select2 form-select" name="cylinder_right" data-control="select2">
                <option value="">Select Cylinder Right</option>
                <?php 
                    $encounter = App\Models\Encounters::where('patient_id', session('patient_id') )->where('temporary_id', session('temporary_id'))->first();
                    $selected_visual_acuity_id = $encounter ? $encounter->cylinder_right : null;
                    $visual_acuities = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'CYLR')->get(); 
                ?>
                @foreach($visual_acuities as $item)
                    <option value="{{ $item->id }}" {{ ($item->id == $selected_visual_acuity_id) ? 'selected' : '' }}>
                        {{ $item->acuity_value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('cylinder_left', __('messages.case.cylinder_left') . ':', ['class' => 'form-label']) }}
            <select id="cylinder_left" class="select2 form-select" name="cylinder_left" data-control="select2">
                <option value="">Select Cylinder Left</option>
                <?php 
                    $encounter = App\Models\Encounters::where('patient_id', session('patient_id') )->where('temporary_id', session('temporary_id'))->first();
                    $selected_visual_acuity_id = $encounter ? $encounter->cylinder_left : null;
                    $visual_acuities = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'CYLL')->get(); 
                ?>
                @foreach($visual_acuities as $item)
                    <option value="{{ $item->id }}" {{ ($item->id == $selected_visual_acuity_id) ? 'selected' : '' }}>
                        {{ $item->acuity_value }}
                    </option>
                @endforeach
            </select>
        </div>


        {{-- AXIS --}}
        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('axis_right', __('messages.case.axis_right') . ':', ['class' => 'form-label']) }}
            <select id="axis_right" class="select2 form-select" name="axis_right" data-control="select2">
                <option value="">Select Axis Right</option>
                <?php 
                    $encounter = App\Models\Encounters::where('patient_id', session('patient_id') )->where('temporary_id', session('temporary_id'))->first();
                    $selected_visual_acuity_id = $encounter ? $encounter->axis_right : null;
                    $visual_acuities = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'AXISR')->get(); 
                ?>
                @foreach($visual_acuities as $item)
                    <option value="{{ $item->id }}" {{ ($item->id == $selected_visual_acuity_id) ? 'selected' : '' }}>
                        {{-- {{ $item->acuity_value }} --}}
                        {{ str_replace('<sup>0</sup>', '°', $item->acuity_value) }}
                    </option>
                    <option value="{{ $item->id }}">{{ str_replace('<sup>0</sup>', '°', $item->acuity_value) }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('axis_left', __('messages.case.axis_left') . ':', ['class' => 'form-label']) }}
            <select id="axis_left" class="select2 form-select" name="axis_left" data-control="select2">
                <option value="">Select Axis Right</option>
                <?php 
                    $encounter = App\Models\Encounters::where('patient_id', session('patient_id') )->where('temporary_id', session('temporary_id'))->first();
                    $selected_visual_acuity_id = $encounter ? $encounter->axis_left : null;
                    $visual_acuities = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'AXISL')->get(); 
                ?>
                @foreach($visual_acuities as $item)
                    <option value="{{ $item->id }}" {{ ($item->id == $selected_visual_acuity_id) ? 'selected' : '' }}>
                        {{-- {{ $item->acuity_value }} --}}
                        {{ str_replace('<sup>0</sup>', '°', $item->acuity_value) }}
                    </option>
                    <option value="{{ $item->id }}">{{ str_replace('<sup>0</sup>', '°', $item->acuity_value) }}</option>
                @endforeach
            </select>
        </div>

        {{-- PRISM --}}
        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('prism_right', __('messages.case.prism_right') . ':', ['class' => 'form-label']) }}
            <select id="prism_right" class="select2 form-select" name="prism_right" data-control="select2">
                <option value="">Select Prism Right</option>
                <?php 
                    $encounter = App\Models\Encounters::where('patient_id', session('patient_id') )->where('temporary_id', session('temporary_id'))->first();
                    $selected_visual_acuity_id = $encounter ? $encounter->prism_right : null;
                    $visual_acuities = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'PRISMR')->get(); 
                ?>
                @foreach($visual_acuities as $item)
                    <option value="{{ $item->id }}" {{ ($item->id == $selected_visual_acuity_id) ? 'selected' : '' }}>
                        {{ $item->acuity_value }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('prism_left', __('messages.case.prism_left') . ':', ['class' => 'form-label']) }}
            <select id="prism_left" class="select2 form-select" name="prism_left" data-control="select2">
                <option value="">Select Prism Left</option>
                <?php 
                    $encounter = App\Models\Encounters::where('patient_id', session('patient_id') )->where('temporary_id', session('temporary_id'))->first();
                    $selected_visual_acuity_id = $encounter ? $encounter->prism_left : null;
                    $visual_acuities = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'PRISML')->get(); 
                ?>
                @foreach($visual_acuities as $item)
                    <option value="{{ $item->id }}" {{ ($item->id == $selected_visual_acuity_id) ? 'selected' : '' }}>
                        {{ $item->acuity_value }}
                    </option>
                @endforeach
            </select>
        </div>


        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('near_add_right', __('messages.case.near_add_right') . ':', ['class' =>
            'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $near_add_right = $encounter ? $encounter->near_add_right : null;
            ?>
            <textarea class="form-control" rows="4" name="near_add_right"
                placeholder="{{ __('messages.case.near_add_right') }}">
        @if($near_add_right !== null)
        {{ $near_add_right }}
        @endif
        </textarea>
        </div>


        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('near_add_left', __('messages.case.near_add_left') . ':', ['class' =>
            'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $near_add_left = $encounter ? $encounter->near_add_left : null;
            ?>
            <textarea class="form-control" rows="4" name="near_add_left"
                placeholder="{{ __('messages.case.near_add_left') }}">
        @if($near_add_left !== null)
        {{ $near_add_left }}
        @endif
        </textarea>
        </div>



        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('oct_right', __('messages.case.oct_right') . ':', ['class' =>
            'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $oct_right = $encounter ? $encounter->oct_right : null;
            ?>
            <textarea class="form-control" rows="4" name="oct_right"
                placeholder="{{ __('messages.case.oct_right') }}">
        @if($oct_right !== null)
        {{ $oct_right }}
        @endif
        </textarea>
        </div>


        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('oct_left', __('messages.case.oct_left') . ':', ['class' =>
            'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $oct_left = $encounter ? $encounter->oct_left : null;
            ?>
            <textarea class="form-control" rows="4" name="oct_left"
                placeholder="{{ __('messages.case.oct_left') }}">
        @if($oct_left !== null)
        {{ $oct_left }}
        @endif
        </textarea>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('ffa_right', __('messages.case.ffa_right') . ':', ['class' =>
            'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $ffa_right = $encounter ? $encounter->ffa_right : null;
            ?>
            <textarea class="form-control" rows="4" name="ffa_right"
                placeholder="{{ __('messages.case.ffa_right') }}">
        @if($ffa_right !== null)
        {{ $ffa_right }}
        @endif
        </textarea>
        </div>



        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('ffa_left', __('messages.case.ffa_left') . ':', ['class' =>
            'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $ffa_left = $encounter ? $encounter->ffa_left : null;
            ?>
            <textarea class="form-control" rows="4" name="ffa_left"
                placeholder="{{ __('messages.case.ffa_left') }}">
        @if($ffa_left !== null)
        {{ $ffa_left }}
        @endif
        </textarea>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('fundus_photography_right', __('messages.case.fundus_photography_right') . ':', ['class' =>
            'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $fundus_photography_right = $encounter ? $encounter->fundus_photography_right : null;
            ?>
            <textarea class="form-control" rows="4" name="fundus_photography_right"
                placeholder="{{ __('messages.case.fundus_photography_right') }}">
        @if($fundus_photography_right !== null)
        {{ $fundus_photography_right }}
        @endif
        </textarea>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('fundus_photography_left', __('messages.case.fundus_photography_left') . ':', ['class' =>
            'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $fundus_photography_left = $encounter ? $encounter->fundus_photography_left : null;
            ?>
            <textarea class="form-control" rows="4" name="fundus_photography_left"
                placeholder="{{ __('messages.case.fundus_photography_left') }}">
        @if($fundus_photography_left !== null)
        {{ $fundus_photography_left }}
        @endif
        </textarea>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('pachymetry_right', __('messages.case.pachymetry_right') . ':', ['class' =>
            'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $pachymetry_right = $encounter ? $encounter->pachymetry_right : null;
            ?>
            <textarea class="form-control" rows="4" name="pachymetry_right"
                placeholder="{{ __('messages.case.pachymetry_right') }}">
        @if($pachymetry_right !== null)
        {{ $pachymetry_right }}
        @endif
        </textarea>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('pachymetry_left', __('messages.case.pachymetry_left') . ':', ['class' =>
            'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $pachymetry_left = $encounter ? $encounter->pachymetry_left : null;
            ?>
            <textarea class="form-control" rows="4" name="pachymetry_left"
                placeholder="{{ __('messages.case.pachymetry_left') }}">
        @if($pachymetry_left !== null)
        {{ $pachymetry_left }}
        @endif
        </textarea>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('cuft_static_right', __('messages.case.cuft_static_right') . ':', ['class' =>
            'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $cuft_static_right = $encounter ? $encounter->cuft_static_right : null;
            ?>
            <textarea class="form-control" rows="4" name="cuft_static_right"
                placeholder="{{ __('messages.case.cuft_static_right') }}">
        @if($cuft_static_right !== null)
        {{ $cuft_static_right }}
        @endif
        </textarea>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('cuft_static_left', __('messages.case.cuft_static_left') . ':', ['class' =>
            'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $cuft_static_left = $encounter ? $encounter->cuft_static_left : null;
            ?>
            <textarea class="form-control" rows="4" name="cuft_static_left"
                placeholder="{{ __('messages.case.cuft_static_left') }}">
        @if($cuft_static_left !== null)
        {{ $cuft_static_left }}
        @endif
        </textarea>
        </div>


        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('cuft_kinetic_right', __('messages.case.cuft_kinetic_right') . ':', ['class' =>
            'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $cuft_kinetic_right = $encounter ? $encounter->cuft_kinetic_right : null;
            ?>
            <textarea class="form-control" rows="4" name="cuft_kinetic_right"
                placeholder="{{ __('messages.case.cuft_kinetic_right') }}">
        @if($cuft_kinetic_right !== null)
        {{ $cuft_kinetic_right }}
        @endif
        </textarea>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('cuft_kinetic_left', __('messages.case.cuft_kinetic_left') . ':', ['class' =>
            'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $cuft_kinetic_left = $encounter ? $encounter->cuft_kinetic_left : null;
            ?>
            <textarea class="form-control" rows="4" name="cuft_kinetic_left"
                placeholder="{{ __('messages.case.cuft_kinetic_left') }}">
        @if($cuft_kinetic_left !== null)
        {{ $cuft_kinetic_left }}
        @endif
        </textarea>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('pupil_distance', __('messages.case.pupil_distance') . ':',
            ['class' => 'form-label']) }}
            <?php
                // Check if the field is not null in the encounters table
                $encounter = App\Models\Encounters::where('patient_id', session('patient_id'))->where('temporary_id', session('temporary_id'))->first();
                $pupil_distance = $encounter ? $encounter->pupil_distance : null;
            ?>
            <input class="form-control" type="text" id="pupil_distance" name="pupil_distance"
                autofocus placeholder="Pupil Distance" @if($pupil_distance !==null)
                value="{{ $pupil_distance }}" @endif />
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