<form action="{{ route('encounter.store') }}" method="post">
    @csrf
<div class="row">


    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('patient', __('messages.case.patient') . ':', ['class' => 'form-label']) }}
       <select id="patient_id" class="select2 form-select" name="patient_id" data-control="select2" required>
            <option value="">Select Patient</option>
            {{$patient_id =  App\Models\Patient::select('patients.user_id', 'users.*')->join('users', 'users.id', '=', 'patients.user_id')->get();}}
            @forelse($patient_id as $item)
            <option value="{{$item->user_id}}">{{$item->first_name}} {{$item->last_name}}</option>
            @empty
            @endforelse
          </select>
    </div>


    <div class="form-group col-sm-6 mb-5">
    </div>

<table width="100%" style="text-align:center">
    <tr>
        <td width="50%"><h2>RIGHT</h2></td>
        <td><h2>LEFT</h2></td>
    </tr>
</table>


<div class="form-group col-sm-6 mb-5">
    {{ Form::label('visual_acuity_far_presenting_right', __('messages.case.visual_acuity_far_presenting_right') . ':', ['class' => 'form-label']) }}
    <select id="visual_acuity_far_presenting_right" class="select2 form-select" name="visual_acuity_far_presenting_right" data-control="select2">
        <option value="">Select Visual Acuity Far (Presenting) Right </option>
        {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'VAFPR')->get();}}
        @forelse($visual_acuity as $item)
        <option value="{{$item->id}}">{{$item->acuity_value}}</option>
        @empty
        @endforelse
    </select>
</div>

<div class="form-group col-sm-6 mb-5">
    {{ Form::label('visual_acuity_far_presenting_left', __('messages.case.visual_acuity_far_presenting_left') . ':', ['class' => 'form-label']) }}
    <span class="required"></span>

    <select id="visual_acuity_far_presenting_left" class="select2 form-select" name="visual_acuity_far_presenting_left" data-control="select2">
        <option value="">Select Visual Acuity Far (Presenting) Left</option>
        {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'VAFPL')->get();}}
        @forelse($visual_acuity as $item)
        <option value="{{$item->id}}">{{$item->acuity_value}}</option>
        @empty
        @endforelse
      </select>
</div>



<div class="form-group col-sm-6 mb-5">
    {{ Form::label('visual_acuity_far_pinhole_right', __('messages.case.visual_acuity_far_pinhole_right') . ':', ['class' => 'form-label']) }}
    <select id="visual_acuity_far_pinhole_right" class="select2 form-select" name="visual_acuity_far_pinhole_right" data-control="select2">
        <option value="">Select Visual Acuity Far (Pinhole) Right</option>
        {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'VAFPIN')->get();}}
        @forelse($visual_acuity as $item)
        <option value="{{$item->id}}">{{$item->acuity_value}}</option>
        @empty
        @endforelse
    </select>
</div>

<div class="form-group col-sm-6 mb-5">
    {{ Form::label('visual_acuity_far_pinhole_left', __('messages.case.visual_acuity_far_pinhole_left') . ':', ['class' => 'form-label']) }}
    <select id="visual_acuity_far_pinhole_left" class="select2 form-select" name="visual_acuity_far_pinhole_left" data-control="select2">
        <option value="">Select Visual Acuity Far (Pinhole) Left</option>
        {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'VAFPIN')->get();}}
        @forelse($visual_acuity as $item)
        <option value="{{$item->id}}">{{$item->acuity_value}}</option>
        @empty
        @endforelse
      </select>
</div>




<div class="form-group col-sm-6 mb-5">
    {{ Form::label('visual_acuity_far_best_corrected_right', __('messages.case.visual_acuity_far_best_corrected_right') . ':', ['class' => 'form-label']) }}
    <select id="visual_acuity_far_best_corrected_right" class="select2 form-select" name="visual_acuity_far_best_corrected_right" data-control="select2">
        <option value="">Select Visual acuity Far (Best Corrected) Right</option>
        {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'VAFBC')->get();}}
        @forelse($visual_acuity as $item)
        <option value="{{$item->id}}">{{$item->acuity_value}}</option>
        @empty
        @endforelse
    </select>
</div>

<div class="form-group col-sm-6 mb-5">
    {{ Form::label('visual_acuity_far_best_corrected_left', __('messages.case.visual_acuity_far_best_corrected_left') . ':', ['class' => 'form-label']) }}
    <select id="visual_acuity_far_best_corrected_left" class="select2 form-select" name="visual_acuity_far_best_corrected_left" data-control="select2">
        <option value="">Select Visual acuity Far (Best Corrected) Left</option>
        {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'VAFBC')->get();}}
        @forelse($visual_acuity as $item)
        <option value="{{$item->id}}">{{$item->acuity_value}}</option>
        @empty
        @endforelse
      </select>
</div>





<div class="form-group col-sm-6 mb-5">
    {{ Form::label('visual_acuity_near_right', __('messages.case.visual_acuity_near_right') . ':', ['class' => 'form-label']) }}
    <select id="visual_acuity_near_right" class="select2 form-select" name="visual_acuity_near_right" data-control="select2">
        <option value="">Select Visual acuity Near Right</option>
        {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'VANR')->get();}}
        @forelse($visual_acuity as $item)
        <option value="{{$item->id}}">{{$item->acuity_value}}</option>
        @empty
        @endforelse
    </select>
</div>

<div class="form-group col-sm-6 mb-5">
    {{ Form::label('visual_acuity_near_left', __('messages.case.visual_acuity_near_left') . ':', ['class' => 'form-label']) }}
    <select id="visual_acuity_near_left" class="select2 form-select" name="visual_acuity_near_left" data-control="select2">
        <option value="">Select Visual acuity Near Left</option>
        {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'VANL')->get();}}
        @forelse($visual_acuity as $item)
        <option value="{{$item->id}}">{{$item->acuity_value}}</option>
        @empty
        @endforelse
      </select>
</div>
    <hr/>
    {{-- INTRAOCULLAR PRESSURE --}}
    
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('intraoccular_pressure_right', __('messages.case.intraoccular_pressure_right') . ':', ['class' => 'form-label']) }}
        <input class="form-control"  type="text" id="intraoccular_pressure_right" name="intraoccular_pressure_right" autofocus placeholder="Intraocular Pressure Right" />
    </div>
    
    <div class="form-group col-sm-6 mb-5">
     {{ Form::label('intraoccular_pressure_left', __('messages.case.intraoccular_pressure_left') . ':', ['class' => 'form-label']) }}
    <input class="form-control"  type="text" id="intraoccular_pressure_left" name="intraoccular_pressure_left" autofocus placeholder="Intraocular Pressure Left" />
    </div>

{{-- CHIEF COMPLAINT --}}

<div class="form-group col-sm-6 mb-5">
    {{ Form::label('chief_complaint_right', __('messages.case.chief_complaint_right') . ':', ['class' => 'form-label']) }}
    <select id="chief_complaint_right" class="select2 form-select" name="chief_complaint_right" data-control="select2">
        <option value="">Select Chief Complaint Right</option>
        {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'CC')->get();}}
        @forelse($visual_acuity as $item)
        <option value="{{$item->id}}">{{$item->acuity_value}}</option>
        @empty
        @endforelse
    </select>
</div>

<div class="form-group col-sm-6 mb-5">
    {{ Form::label('chief_complaint_left', __('messages.case.chief_complaint_left') . ':', ['class' => 'form-label']) }}
    <select id="chief_complaint_left" class="select2 form-select" name="chief_complaint_left" data-control="select2">
        <option value="">Select Chief Complaint Right</option>
        {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'CC')->get();}}
        @forelse($visual_acuity as $item)
        <option value="{{$item->id}}">{{$item->acuity_value}}</option>
        @empty
        @endforelse
      </select>
</div>
    {{-- DETIALED HISTORY --}}
    
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('detailed_history_right', __('messages.case.detailed_history_right') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="4" name="detailed_history_right" placeholder="{{ __('messages.case.detailed_history_right') }}"></textarea>
    </div>
    
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('detailed_history_left', __('messages.case.detailed_history_left') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="4" name="detailed_history_left" placeholder="{{ __('messages.case.detailed_history_left') }}"></textarea>
    </div>
    {{-- CASE FINDINGS --}}
    
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('findings_right', __('messages.case.findings_right') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="4" name="findings_right" placeholder="{{ __('messages.case.findings_right') }}"></textarea>
    </div>
    
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('findings_left', __('messages.case.findings_left') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="4" name="findings_left" placeholder="{{ __('messages.case.findings_left') }}"></textarea>
    </div>

{{-- EYELIDS --}}

<div class="form-group col-sm-6 mb-5">
    {{ Form::label('eyelid_right', __('messages.case.eyelid_right') . ':', ['class' => 'form-label']) }}
    <textarea class="form-control" rows="3" name="eyelid_right" placeholder="{{ __('messages.case.eyelid_right') }}"></textarea>
</div>

<div class="form-group col-sm-6 mb-5">
    {{ Form::label('eyelid_left', __('messages.case.eyelid_left') . ':', ['class' => 'form-label']) }}
    <textarea class="form-control" rows="3" name="eyelid_left" placeholder="{{ __('messages.case.eyelid_left') }}"></textarea>
</div>
{{-- CONJUNCTIVA --}}

<div class="form-group col-sm-6 mb-5">
    {{ Form::label('conjunctiva_right', __('messages.case.conjunctiva_right') . ':', ['class' => 'form-label']) }}
    <textarea class="form-control" rows="3" name="conjunctiva_right" placeholder="{{ __('messages.case.conjunctiva_right') }}"></textarea>
</div>

<div class="form-group col-sm-6 mb-5">
    {{ Form::label('conjunctiva_left', __('messages.case.conjunctiva_left') . ':', ['class' => 'form-label']) }}
    <textarea class="form-control" rows="3" name="conjunctiva_left" placeholder="{{ __('messages.case.conjunctiva_left') }}"></textarea>
</div>
    {{-- CORNEA --}}
    
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('cornea_right', __('messages.case.cornea_right') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="3" name="cornea_right" placeholder="{{ __('messages.case.cornea_right') }}"></textarea>
    </div>
    
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('cornea_left', __('messages.case.cornea_left') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="3" name="cornea_left" placeholder="{{ __('messages.case.cornea_left') }}"></textarea>
    </div>

{{-- AC --}}

<div class="form-group col-sm-6 mb-5">
    {{ Form::label('AC_right', __('messages.case.AC_right') . ':', ['class' => 'form-label']) }}
    <textarea class="form-control" rows="3" name="AC_right" placeholder="{{ __('messages.case.AC_right') }}"></textarea>
</div>

<div class="form-group col-sm-6 mb-5">
    {{ Form::label('AC_left', __('messages.case.AC_right') . ':', ['class' => 'form-label']) }}
    <textarea class="form-control" rows="3" name="AC_left" placeholder="{{ __('messages.case.AC_left') }}"></textarea>
</div>
{{-- IRIS --}}

<div class="form-group col-sm-6 mb-5">
    {{ Form::label('iris_right', __('messages.case.iris_right') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="3" name="iris_right" placeholder="{{ __('messages.case.iris_right') }}"></textarea>
    </div>
    
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('iris_left', __('messages.case.iris_left') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="3" name="iris_left" placeholder="{{ __('messages.case.iris_left') }}"></textarea>
    </div>
{{-- PUPIL --}}

<div class="form-group col-sm-6 mb-5">
    {{ Form::label('pupil_right', __('messages.case.pupil_right') . ':', ['class' => 'form-label']) }}
    <textarea class="form-control" rows="3" name="pupil_right" placeholder="{{ __('messages.case.pupil_right') }}"></textarea>
</div>

<div class="form-group col-sm-6 mb-5">
    {{ Form::label('pupil_left', __('messages.case.pupil_left') . ':', ['class' => 'form-label']) }}
    <textarea class="form-control" rows="3" name="pupil_left" placeholder="{{ __('messages.case.pupil_left') }}"></textarea>
</div>
    {{-- LENS --}}
    
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('lens_right', __('messages.case.lens_right') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="3" name="lens_right" placeholder="{{ __('messages.case.lens_right') }}"></textarea>
    </div>
    
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('lens_left', __('messages.case.lens_left') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="3" name="lens_left" placeholder="{{ __('messages.case.lens_left') }}"></textarea>
    </div>
    {{-- VITRREOUS --}}
    
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('vitreous_right', __('messages.case.vitreous_right') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="3" name="vitreous_right" placeholder="{{ __('messages.case.vitreous_right') }}"></textarea>
    </div>
    
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('vitreous_left', __('messages.case.vitreous_left') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="3" name="vitreous_left" placeholder="{{ __('messages.case.vitreous_left') }}"></textarea>
    </div>
    {{-- RETINA --}}
    
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('retina_right', __('messages.case.retina_right') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="3" name="retina_right" placeholder="{{ __('messages.case.retina_right') }}"></textarea>
    </div>
    
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('retina_left', __('messages.case.retina_left') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="3" name="retina_left" placeholder="{{ __('messages.case.retina_left') }}"></textarea>
    </div>
    {{-- OTHER FINDINGS --}}
    
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('other_findings_right', __('messages.case.other_findings_right') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="3" name="other_findings_right" placeholder="{{ __('messages.case.other_findings_right') }}"></textarea>
    </div>
    
    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('other_findings_left', __('messages.case.other_findings_left') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="3" name="other_findings_left" placeholder="{{ __('messages.case.other_findings_left') }}"></textarea>
    </div>
    {{-- DRAWING --}}
<h3>Free Hand Drawing</h3>
    <div class="form-group col-sm-6 mb-5">
    <table width="100%" style="text-align:center; border-collapse:collapse" border="1" >
        <td border="1" style="position: relative;">
            <canvas id="myCanvas" height="250px"></canvas>
            <input type="hidden" id="canvasData" name="canvasData">
            {{-- <div id="watermark" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 0.5;">
                Left Eye
            </div> --}}
        </td>
    </table>
    </div>

    <div class="form-group col-sm-6 mb-5">
        <table width="100%" style="text-align:center; border-collapse:collapse" border="1" >
            <tr>
                {{-- <td colspan="2" height="250px"><h2>RIGHT EYE</h2></td> --}}
                <td border="1" style="position: relative;">
                    <canvas id="myCanvas2" height="250px"></canvas>
                    <input type="hidden" id="canvasData2" name="canvasData2">
                    {{-- <div id="watermark" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 0.5;">
                        Right Eye
                    </div> --}}
                </td>
            </tr>
        </table>
        </div>

        {{-- REFRACTION TABLE --}}
        <h3>Refraction</h3>
        {{-- SPHERE SPH --}}
        <div class="form-group col-sm-6 mb-5">
                    {{ Form::label('sphere_right', __('messages.case.sphere_right') . ':', ['class' => 'form-label']) }}
                    <select id="sphere_right" class="select2 form-select" name="sphere_right" data-control="select2">
                        <option value="">Select Sphere Type Right</option>
                        {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'SPHR')->get();}}
                        @forelse($visual_acuity as $item)
                        <option value="{{$item->id}}">{{$item->acuity_value}}</option>
                        @empty
                        @endforelse
                      </select>
                </div>
                
                <div class="form-group col-sm-6 mb-5">
                    {{ Form::label('sphere_left', __('messages.case.sphere_left') . ':', ['class' => 'form-label']) }}
                    <select id="sphere_left" class="select2 form-select" name="sphere_left" data-control="select2">
                        <option value="">Select Sphere Type Left</option>
                        {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'SPHL')->get();}}
                        @forelse($visual_acuity as $item)
                        <option value="{{$item->id}}">{{$item->acuity_value}}</option>
                        @empty
                        @endforelse
                      </select>
                </div>

{{-- CYLINDER CYL --}}
<div class="form-group col-sm-6 mb-5">
    {{ Form::label('cylinder_right', __('messages.case.cylinder_right') . ':', ['class' => 'form-label']) }}
    <select id="cylinder_right" class="select2 form-select" name="cylinder_right" data-control="select2">
        <option value="">Select Cylinder Type Right</option>
        {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'CYLR')->get();}}
        @forelse($visual_acuity as $item)
        <option value="{{$item->id}}">{{$item->acuity_value}}</option>
        @empty
        @endforelse
      </select>
</div>

<div class="form-group col-sm-6 mb-5">
    {{ Form::label('cylinder_left', __('messages.case.cylinder_left') . ':', ['class' => 'form-label']) }}
    <select id="cylinder_left" class="select2 form-select" name="cylinder_left" data-control="select2">
        <option value="">Select Sphere Cylinder Left</option>
        {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'CYLL')->get();}}
        @forelse($visual_acuity as $item)
        <option value="{{$item->id}}">{{$item->acuity_value}}</option>
        @empty
        @endforelse
      </select>
</div>


{{-- AXIS --}}
<div class="form-group col-sm-6 mb-5">
    {{ Form::label('axis_right', __('messages.case.axis_right') . ':', ['class' => 'form-label']) }}
    <select id="axis_right" class="select2 form-select" name="axis_right" data-control="select2">
        <option value="">Select Axis Type Right</option>
        {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'AXISR')->get();}}
        @forelse($visual_acuity as $item)
        {{-- <option value="{{$item->id}}">{{htmlspecialchars($item->acuity_value)}}</option> --}}
        <option value="{{ $item->id }}">{{ str_replace('<sup>0</sup>', '°', $item->acuity_value) }}</option>


        @empty
        @endforelse
      </select>
</div>

<div class="form-group col-sm-6 mb-5">
    {{ Form::label('axis_left', __('messages.case.axis_left') . ':', ['class' => 'form-label']) }}
    <select id="axis_left" class="select2 form-select" name="axis_left" data-control="select2">
        <option value="">Select Axis Type Left</option>
        {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'AXISL')->get();}}
        @forelse($visual_acuity as $item)
        {{-- <option value="{{$item->id}}">{{$item->acuity_value}}</option> --}}
        <option value="{{ $item->id }}">{{ str_replace('<sup>0</sup>', '°', $item->acuity_value) }}</option>

        @empty
        @endforelse
      </select>
</div>

{{-- PRISM --}}
<div class="form-group col-sm-6 mb-5">
    {{ Form::label('prism_right', __('messages.case.prism_right') . ':', ['class' => 'form-label']) }}
    <select id="prism_right" class="select2 form-select" name="prism_right" data-control="select2">
        <option value="">Select Prism Type Right</option>
        {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'PRISMR')->get();}}
        @forelse($visual_acuity as $item)
        <option value="{{$item->id}}">{{$item->acuity_value}}</option>
        @empty
        @endforelse
      </select>
</div>

<div class="form-group col-sm-6 mb-5">
    {{ Form::label('prism_left', __('messages.case.prism_left') . ':', ['class' => 'form-label']) }}
    <select id="prism_left" class="select2 form-select" name="prism_left" data-control="select2">
        <option value="">Select Prism Type Left</option>
        {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'PRISML')->get();}}
        @forelse($visual_acuity as $item)
        <option value="{{$item->id}}">{{$item->acuity_value}}</option>
        @empty
        @endforelse
      </select>
</div>


        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('diagnosis', __('messages.case.diagnosis') . ':', ['class' => 'form-label']) }}
            <select id="diagnosis" class="select2 form-select" name="diagnosis" data-control="select2">
                <option value="">Select Diagnosis Type</option>
                {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'DIAG')->get();}}
                @forelse($visual_acuity as $item)
                <option value="{{$item->id}}">{{$item->acuity_value}}</option>
                @empty
                @endforelse
              </select>
        </div>
    
        <div class="form-group col-sm-6 mb-5">
        </div>



        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('treatment_eyedrop', __('messages.case.treatment_eyedrop') . ':', ['class' => 'form-label']) }}
            <select id="treatment_eyedrop" class="select2 form-select" name="treatment_eyedrop" data-control="select2">
                <option value="">Select Treatment Eyedrops</option>
                {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'TREATDROPS')->get();}}
                @forelse($visual_acuity as $item)
                <option value="{{$item->id}}">{{$item->acuity_value}}</option>
                @empty
                @endforelse
              </select>
        </div>
    
    
    
        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('treatment_tablet', __('messages.case.treatment_tablet') . ':', ['class' => 'form-label']) }}
            <select id="treatment_tablet" class="select2 form-select" name="treatment_tablet" data-control="select2">
                <option value="">Select Treatment Tablets</option>
                {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'TREATTABS')->get();}}
                @forelse($visual_acuity as $item)
                <option value="{{$item->id}}">{{$item->acuity_value}}</option>
                @empty
                @endforelse
              </select>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('investigations_required', __('messages.case.investigations_required') . ':', ['class' => 'form-label']) }}
            <select id="investigations_required" class="select2 form-select" name="investigations_required" data-control="select2">
                <option value="">Select Treatment Tablets</option>
                {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'INVREQ')->get();}}
                @forelse($visual_acuity as $item)
                <option value="{{$item->id}}">{{$item->acuity_value}}</option>
                @empty
                @endforelse
              </select>
        </div>


        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('followup_appointment_date', __('messages.case.followup_appointment_date') . ':', ['class' => 'form-label']) }}
            <input type="datetime-local" class="form-control" name="followup_appointment_date" placeholder="{{ __('messages.case.followup_appointment_date') }}">
        </div>

        



<br/><br/>
    <div class="d-flex justify-content-end">
    <button class="btn btn-primary me-2" type="submit">{{ __('messages.common.save') }}</button>
    </div>  


    
    
    {{-- <div class="d-flex justify-content-end">
        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2', 'id' => 'saveCaseBtn']) }}
        <a href="{{ route('patient-cases.index') }}"
            class="btn btn-secondary me-2">{{ __('messages.common.cancel') }}</a>
    </div> --}}






</div>
</form>
<script src="{{ asset('vendor/fabric.js') }}"></script>
<script>
   document.addEventListener('DOMContentLoaded', function() {
    var canvas = new fabric.Canvas('myCanvas');
    canvas.isDrawingMode = true;
    canvas.freeDrawingBrush.color = 'red';
    canvas.freeDrawingBrush.width = 2;

    document.querySelector('form').addEventListener('submit', function(event) {
        canvas.toBlob(function(blob) {
            if (blob) {
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    // Set the canvas data to the hidden input field
                    document.getElementById('canvasData').value = reader.result;
                    
                    // Submit the form
                    document.querySelector('form').submit();
                }
            } else {
                // Handle error if blob creation fails (e.g., show an alert)
                console.error('Error converting canvas to Blob');
            }
        });

        // Prevent the default form submission
        event.preventDefault();
    });
});
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
     var canvas2 = new fabric.Canvas('myCanvas2');
     canvas2.isDrawingMode = true;
     canvas2.freeDrawingBrush.color = 'red';
     canvas2.freeDrawingBrush.width = 2;
 
     document.querySelector('form').addEventListener('submit', function(event) {
         canvas.toBlob(function(blob) {
             if (blob) {
                 var reader = new FileReader();
                 reader.readAsDataURL(blob);
                 reader.onloadend = function() {
                     // Set the canvas data to the hidden input field
                     document.getElementById('canvasData2').value = reader.result;
                     
                     // Submit the form
                     document.querySelector('form').submit();
                 }
             } else {
                 // Handle error if blob creation fails (e.g., show an alert)
                 console.error('Error converting canvas to Blob');
             }
         });
 
         // Prevent the default form submission
         event.preventDefault();
     });
 });
 </script>
 