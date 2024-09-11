
<form action="{{ route('update.visual.acuity') }}" method="post">
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

            {{-- @include('patient_cases.encounter.patient_id_card_template.fields') --}}

@include('patient_cases.encounter.patient_id_card_template.fields')
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


        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('visual_acuity_far_presenting_right', __('messages.case.visual_acuity_far_presenting_right') . ':', ['class' => 'form-label']) }}
            <select id="visual_acuity_far_presenting_right" class="select2 form-select" name="visual_acuity_far_presenting_right" data-control="select2">
                <option value="">Select Visual Acuity Far (Presenting) Right</option>
                <?php 
                    $encounter = App\Models\Encounters::where('patient_id', session('patient_id') )->where('temporary_id', session('temporary_id'))->first();
                    $selected_visual_acuity_id = $encounter ? $encounter->visual_acuity_far_presenting_right : null;
                    $visual_acuities = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'VAFPR')->get(); 
                ?>
                @foreach($visual_acuities as $item)
                    <option value="{{ $item->id }}" {{ ($item->id == $selected_visual_acuity_id) ? 'selected' : '' }}>
                        {{ $item->acuity_value }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('visual_acuity_far_presenting_left', __('messages.case.visual_acuity_far_presenting_left') . ':', ['class' => 'form-label']) }}
            <select id="visual_acuity_far_presenting_left" class="select2 form-select" name="visual_acuity_far_presenting_left" data-control="select2">
                <option value="">Select Visual Acuity Far (Presenting) Left</option>
                <?php 
                    $encounter = App\Models\Encounters::where('patient_id', session('patient_id') )->where('temporary_id', session('temporary_id'))->first();
                    $selected_visual_acuity_id = $encounter ? $encounter->visual_acuity_far_presenting_left : null;
                    $visual_acuities = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'VAFPL')->get(); 
                ?>
                @foreach($visual_acuities as $item)
                    <option value="{{ $item->id }}" {{ ($item->id == $selected_visual_acuity_id) ? 'selected' : '' }}>
                        {{ $item->acuity_value }}
                    </option>
                @endforeach
            </select>
        </div>



        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('visual_acuity_far_pinhole_right', __('messages.case.visual_acuity_far_pinhole_right') . ':', ['class' => 'form-label']) }}
            <select id="visual_acuity_far_pinhole_right" class="select2 form-select" name="visual_acuity_far_pinhole_right" data-control="select2">
                <option value="">Select Visual Acuity Far Pinhole Right</option>
                <?php 
                    $encounter = App\Models\Encounters::where('patient_id', session('patient_id') )->where('temporary_id', session('temporary_id'))->first();
                    $selected_visual_acuity_id = $encounter ? $encounter->visual_acuity_far_pinhole_right : null;
                    $visual_acuities = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'VAFPIN')->get(); 
                ?>
                @foreach($visual_acuities as $item)
                    <option value="{{ $item->id }}" {{ ($item->id == $selected_visual_acuity_id) ? 'selected' : '' }}>
                        {{ $item->acuity_value }}
                    </option>
                @endforeach
            </select>
        </div>


        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('visual_acuity_far_pinhole_left', __('messages.case.visual_acuity_far_pinhole_left') . ':', ['class' => 'form-label']) }}
            <select id="visual_acuity_far_pinhole_left" class="select2 form-select" name="visual_acuity_far_pinhole_left" data-control="select2">
                <option value="">Select Visual Acuity Far Pinhole Left</option>
                <?php 
                    $encounter = App\Models\Encounters::where('patient_id', session('patient_id') )->where('temporary_id', session('temporary_id'))->first();
                    $selected_visual_acuity_id = $encounter ? $encounter->visual_acuity_far_pinhole_left : null;
                    $visual_acuities = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'VAFPIN')->get(); 
                ?>
                @foreach($visual_acuities as $item)
                    <option value="{{ $item->id }}" {{ ($item->id == $selected_visual_acuity_id) ? 'selected' : '' }}>
                        {{ $item->acuity_value }}
                    </option>
                @endforeach
            </select>
        </div>



        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('visual_acuity_far_best_corrected_right', __('messages.case.visual_acuity_far_best_corrected_right') . ':', ['class' => 'form-label']) }}
            <select id="visual_acuity_far_best_corrected_right" class="select2 form-select" name="visual_acuity_far_best_corrected_right" data-control="select2">
                <option value="">Select Visual acuity Far (Best Corrected) Right</option>
                <?php 
                    $encounter = App\Models\Encounters::where('patient_id', session('patient_id') )->where('temporary_id', session('temporary_id'))->first();
                    $selected_visual_acuity_id = $encounter ? $encounter->visual_acuity_far_best_corrected_right : null;
                    $visual_acuities = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'VAFBC')->get(); 
                ?>
                @foreach($visual_acuities as $item)
                    <option value="{{ $item->id }}" {{ ($item->id == $selected_visual_acuity_id) ? 'selected' : '' }}>
                        {{ $item->acuity_value }}
                    </option>
                @endforeach
            </select>
        </div>


        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('visual_acuity_far_best_corrected_left', __('messages.case.visual_acuity_far_best_corrected_left') . ':', ['class' => 'form-label']) }}
            <select id="visual_acuity_far_best_corrected_left" class="select2 form-select" name="visual_acuity_far_best_corrected_left" data-control="select2">
                <option value="">Select Visual acuity Far (Best Corrected) Left</option>
                <?php 
                    $encounter = App\Models\Encounters::where('patient_id', session('patient_id') )->where('temporary_id', session('temporary_id'))->first();
                    $selected_visual_acuity_id = $encounter ? $encounter->visual_acuity_far_best_corrected_left : null;
                    $visual_acuities = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'VAFBC')->get(); 
                ?>
                @foreach($visual_acuities as $item)
                    <option value="{{ $item->id }}" {{ ($item->id == $selected_visual_acuity_id) ? 'selected' : '' }}>
                        {{ $item->acuity_value }}
                    </option>
                @endforeach
            </select>
        </div>


        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('visual_acuity_near_right', __('messages.case.visual_acuity_near_right') . ':', ['class' => 'form-label']) }}
            <select id="visual_acuity_near_right" class="select2 form-select" name="visual_acuity_near_right" data-control="select2">
                <option value="">Select Visual acuity Near Right</option>
                <?php 
                    $encounter = App\Models\Encounters::where('patient_id', session('patient_id') )->where('temporary_id', session('temporary_id'))->first();
                    $selected_visual_acuity_id = $encounter ? $encounter->visual_acuity_near_right : null;
                    $visual_acuities = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'VANL')->get(); 
                ?>
                @foreach($visual_acuities as $item)
                    <option value="{{ $item->id }}" {{ ($item->id == $selected_visual_acuity_id) ? 'selected' : '' }}>
                        {{ $item->acuity_value }}
                    </option>
                @endforeach
            </select>
        </div>


        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('visual_acuity_near_left', __('messages.case.visual_acuity_near_left') . ':', ['class' => 'form-label']) }}
            <select id="visual_acuity_near_left" class="select2 form-select" name="visual_acuity_near_left" data-control="select2">
                <option value="">Select Visual acuity Near Left</option>
                <?php 
                    $encounter = App\Models\Encounters::where('patient_id', session('patient_id') )->where('temporary_id', session('temporary_id'))->first();
                    $selected_visual_acuity_id = $encounter ? $encounter->visual_acuity_near_left : null;
                    $visual_acuities = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'VANL')->get(); 
                ?>
                @foreach($visual_acuities as $item)
                    <option value="{{ $item->id }}" {{ ($item->id == $selected_visual_acuity_id) ? 'selected' : '' }}>
                        {{ $item->acuity_value }}
                    </option>
                @endforeach
            </select>
        </div>
{{-- 
        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('visual_acuity_near_left', __('messages.case.visual_acuity_near_left') . ':', ['class' =>
            'form-label']) }}
            <select id="visual_acuity_near_left" class="select2 form-select" name="visual_acuity_near_left"
                data-control="select2">
                <option value="">Select Visual acuity Near Left</option>
                {{$visual_acuity = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=',
                'VANL')->get();}}
                @forelse($visual_acuity as $item)
                <option value="{{$item->id}}">{{$item->acuity_value}}</option>
                @empty
                @endforelse
            </select>
        </div> --}}
        
       
        <br /><br />
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary me-2" type="submit">{{ __('messages.common.save') }}</button>
        </div>



    </div>
</form>
