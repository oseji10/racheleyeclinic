<form action="{{ route('update.free_handwriting_left') }}" method="post" id="canvasForm">
    @csrf
    <div class="row">


        <input type="hidden" name="patient_id" value="{{ session('patient_id') }}">
        <input type="hidden" name="temporary_id" value="{{ session('temporary_id') }}">

        @php
        $patients = App\Models\Patient::select('patients.*', 'users.*')
        ->join('users', 'users.id', '=', 'patients.user_id')
        ->where('user_id', '=', session('patient_id'))
        ->get();
        @endphp
        @foreach ($patients as $patient)

        @endforeach
        @include('patient_cases.encounter.patient_id_card_template.fields')


        {{-- <div class="form-group col-sm-6 mb-5">
        </div> --}}


        {{-- DRAWING --}}
        <h3>LEFT EYE</h3>


        <div class="form-group col-sm-6 mb-5">
            <div>
                <input type="radio" id="blackBrush" name="brushSelector" value="black" checked>
                <label for="blackBrush">Black</label>
            
                <input type="radio" id="redBrush" name="brushSelector" value="red">
                <label for="redBrush">Red</label>
            </div>
            
    
            
            <div class="form-group col-sm-6 mb-5">
                <table width="100%" style="text-align:center; border-collapse:collapse" border="1">
                    <td border="1" style="position: relative;">
                        <canvas id="myCanvas" height="250px"></canvas>
                        <input type="hidden" id="canvasData" name="canvasData">
    
                    </td>
                </table>
            </div>
        </div>








        <br /><br />
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary me-2" type="submit">{{ __('messages.common.save') }}</button>
        </div>







    </div>
</form>

<script src="{{ asset('vendor/fabric.js') }}" defer></script>
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

        // Configure black brush properties
        brushOptions.black.color = 'black';
        brushOptions.black.width = 2;

        // Configure red brush properties
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

        // Submit form when canvas is submitted
        document.getElementById('canvasForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            // Convert canvas to data URL
            var canvasData = canvas.toDataURL('image/png');
            
            // Set the data URL as the value of a hidden input field
            document.getElementById('canvasData').value = canvasData;
            
            // Submit the form
            this.submit();
        });
    });
</script>
