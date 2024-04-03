<form action="{{ route('encounter.store') }}" method="post">
    @csrf
    <div class="row">


        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('patient', __('messages.case.patient') . ':', ['class' => 'form-label']) }}
            <select id="patient_id" class="select2 form-select" name="patient_id" data-control="select2" required>
                <option value="">Select Patient</option>
                {{$patient_id = App\Models\Patient::select('patients.user_id', 'users.*')->join('users', 'users.id',
                '=', 'patients.user_id')->get();}}
                @forelse($patient_id as $item)
                <option value="{{$item->user_id}}">{{$item->first_name}} {{$item->last_name}}</option>
                @empty
                @endforelse
            </select>
        </div>


        <div class="form-group col-sm-6 mb-5">
        </div>

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



 
    

        {{-- REFRACTION TABLE --}}
        <h3>Refraction</h3>
        {{-- SPHERE SPH --}}
        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('sphere_right', __('messages.case.sphere_right') . ':', ['class' => 'form-label']) }}
            <select id="sphere_right" class="select2 form-select" name="sphere_right" data-control="select2">
                <option value="">Select Sphere Type Right</option>
                {{$visual_acuity = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=',
                'SPHR')->get();}}
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
                {{$visual_acuity = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=',
                'SPHL')->get();}}
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
                {{$visual_acuity = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=',
                'CYLR')->get();}}
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
                {{$visual_acuity = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=',
                'CYLL')->get();}}
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
                {{$visual_acuity = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=',
                'AXISR')->get();}}
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
                {{$visual_acuity = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=',
                'AXISL')->get();}}
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
                {{$visual_acuity = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=',
                'PRISMR')->get();}}
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
                {{$visual_acuity = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=',
                'PRISML')->get();}}
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
                {{$visual_acuity = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=',
                'DIAG')->get();}}
                @forelse($visual_acuity as $item)
                <option value="{{$item->id}}">{{$item->acuity_value}}</option>
                @empty
                @endforelse
            </select>
        </div>

        <div class="form-group col-sm-6 mb-5">
        </div>



        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('treatment_eyedrop', __('messages.case.treatment_eyedrop') . ':', ['class' => 'form-label'])
            }}
            <select id="treatment_eyedrop" class="select2 form-select" name="treatment_eyedrop" data-control="select2">
                <option value="">Select Treatment Eyedrops</option>
                {{$visual_acuity = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=',
                'TREATDROPS')->get();}}
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
                {{$visual_acuity = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=',
                'TREATTABS')->get();}}
                @forelse($visual_acuity as $item)
                <option value="{{$item->id}}">{{$item->acuity_value}}</option>
                @empty
                @endforelse
            </select>
        </div>

        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('investigations_required', __('messages.case.investigations_required') . ':', ['class' =>
            'form-label']) }}
            <select id="investigations_required" class="select2 form-select" name="investigations_required"
                data-control="select2">
                <option value="">Select Treatment Tablets</option>
                {{$visual_acuity = App\Models\VisualAcuity::select('acuity_value', 'id')->where('acuity_group_id', '=',
                'INVREQ')->get();}}
                @forelse($visual_acuity as $item)
                <option value="{{$item->id}}">{{$item->acuity_value}}</option>
                @empty
                @endforelse
            </select>
        </div>


        <div class="form-group col-sm-6 mb-5">
            {{ Form::label('followup_appointment_date', __('messages.case.followup_appointment_date') . ':', ['class' =>
            'form-label']) }}
            <input type="datetime-local" class="form-control" name="followup_appointment_date"
                placeholder="{{ __('messages.case.followup_appointment_date') }}">
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
<script src="{{ asset('vendor/fabric.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Create canvas and configure drawing options
        var canvas = new fabric.Canvas('myCanvas');
        canvas.isDrawingMode = true;
        var drawingHistory = []; // To store drawing history

        // Define brush options
        var brushOptions = {
            black: new fabric.PencilBrush(canvas),
            red: new fabric.PencilBrush(canvas)
        };

        // Configure brush properties
        brushOptions.black.color = 'black';
        brushOptions.black.width = 2;

        brushOptions.red.color = 'red';
        brushOptions.red.width = 2;

        // Set initial brush to black
        canvas.freeDrawingBrush = brushOptions.black;

        // Switch between brushes based on user input from radio buttons
        var brushSelectors = document.querySelectorAll('input[name="brushSelector"]');
        brushSelectors.forEach(function(selector) {
            selector.addEventListener('change', function() {
                var selectedColor = this.value;
                canvas.freeDrawingBrush = brushOptions[selectedColor];
            });
        });

        // Prevent page scroll when drawing on canvas
        canvas.on('mouse:down', function(event) {
            event.e.preventDefault();
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