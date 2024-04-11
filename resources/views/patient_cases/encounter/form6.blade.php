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