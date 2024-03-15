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
        <td width="50%"><h2>LEFT</h2></td>
        <td><h2>RIGHT</h2></td>
    </tr>
</table>
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
    
    <hr/>
    <div class="form-group col-sm-6 mb-5">
     {{ Form::label('intraoccular_pressure', __('messages.case.intraoccular_pressure') . ':', ['class' => 'form-label']) }}
    <input class="form-control"  type="text" id="intraoccular_pressure" name="intraoccular_pressure" autofocus placeholder="Intraocular Pressure" />
    </div>


    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('chief_complaint', __('messages.case.chief_complaint') . ':', ['class' => 'form-label']) }}
        <select id="chief_complaint" class="select2 form-select" name="chief_complaint" data-control="select2">
            <option value="">Select Chief Complaint</option>
            {{$visual_acuity =  App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=', 'CC')->get();}}
            @forelse($visual_acuity as $item)
            <option value="{{$item->id}}">{{$item->acuity_value}}</option>
            @empty
            @endforelse
          </select>
    </div>

    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('detailed_history', __('messages.case.detailed_history') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="4" name="detailed_history" placeholder="{{ __('messages.case.detailed_history') }}"></textarea>
    </div>


    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('findings', __('messages.case.findings') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="4" name="findings" placeholder="{{ __('messages.case.findings') }}"></textarea>
    </div>

    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('eyelid', __('messages.case.eyelid') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="3" name="eyelid" placeholder="{{ __('messages.case.eyelid') }}"></textarea>
    </div>


    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('conjunctiva', __('messages.case.conjunctiva') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="3" name="conjunctiva" placeholder="{{ __('messages.case.conjunctiva') }}"></textarea>
    </div>


    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('cornea', __('messages.case.cornea') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="3" name="cornea" placeholder="{{ __('messages.case.cornea') }}"></textarea>
    </div>
    


    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('AC', __('messages.case.AC') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="3" name="AC" placeholder="{{ __('messages.case.AC') }}"></textarea>
    </div>


    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('iris', __('messages.case.iris') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="3" name="iris" placeholder="{{ __('messages.case.iris') }}"></textarea>
    </div>


    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('pupil', __('messages.case.pupil') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="3" name="pupil" placeholder="{{ __('messages.case.pupil') }}"></textarea>
    </div>

    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('lens', __('messages.case.lens') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="3" name="lens" placeholder="{{ __('messages.case.lens') }}"></textarea>
    </div>

    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('vitreous', __('messages.case.vitreous') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="3" name="vitreous" placeholder="{{ __('messages.case.vitreous') }}"></textarea>
    </div>

    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('retina', __('messages.case.retina') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="3" name="retina" placeholder="{{ __('messages.case.retina') }}"></textarea>
    </div>

    <div class="form-group col-sm-6 mb-5">
        {{ Form::label('other_findings', __('messages.case.other_findings') . ':', ['class' => 'form-label']) }}
        <textarea class="form-control" rows="3" name="other_findings" placeholder="{{ __('messages.case.other_findings') }}"></textarea>
    </div>

<h3>Refraction</h3>
    <div class="form-group col-sm-6 mb-5">
    <table width="100%" style="text-align:center; border-collapse:collapse" border="1" >
        <td border="1" style="position: relative;">
            <canvas id="myCanvas" height="250px"></canvas>
            <input type="hidden" id="canvasData" name="canvasData">
            <div id="watermark" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 0.5;">
                Left Eye
            </div>
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
                    <div id="watermark" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 0.5;">
                        Right Eye
                    </div>
                </td>
            </tr>
        </table>
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
 