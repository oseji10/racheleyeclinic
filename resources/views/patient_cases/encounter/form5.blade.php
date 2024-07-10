<form action="{{ route('update.free_handwriting_left') }}" method="post" id="canvasForm">
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
            return redirect()->route('login');
        }
        @endphp
        
        @foreach ($patients as $patient)
            <!-- <div class="patient-info">
                <h4>Patient Information</h4>
                <p>Name: {{ $patient->name }}</p>
                <p>Age: {{ $patient->age }}</p>
                <p>Gender: {{ $patient->gender }}</p>
                           </div> -->
        @endforeach
        @include('patient_cases.encounter.patient_id_card_template.fields')
    
        <h3>LEFT EYE</h3>
    
        <div class="form-group col-sm-12 mb-5">
            <div>
                <input type="radio" id="blackBrush" name="brushSelector" value="black" checked>
                <label for="blackBrush">Black</label>
            
                <input type="radio" id="redBrush" name="brushSelector" value="red">
                <label for="redBrush">Red</label>
            </div>
            
            <div class="form-group col-sm-12 mb-5 d-flex justify-content-between">
                <div class="canvas-container" style="border: 1px solid #000; padding: 10px;">
                    <h4>Left Eye Front</h4>
                    <canvas id="canvasFront" height="250px" width="250px"></canvas>
                    <input type="hidden" id="canvasDataFront" name="canvasDataFront">
                    <button type="button" class="btn btn-secondary mt-2" id="clearCanvasFront">{{ __('Clear Front') }}</button>
                </div>
                <div class="canvas-container" style="border: 1px solid #000; padding: 10px;">
                    <h4>Left Eye Back</h4>
                    <canvas id="canvasBack" height="250px" width="250px"></canvas>
                    <input type="hidden" id="canvasDataBack" name="canvasDataBack">
                    <button type="button" class="btn btn-secondary mt-2" id="clearCanvasBack">{{ __('Clear Back') }}</button>
                </div>
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
        // Create canvases and configure drawing options
        var canvasFront = new fabric.Canvas('canvasFront');
        var canvasBack = new fabric.Canvas('canvasBack');
        canvasFront.isDrawingMode = true;
        canvasBack.isDrawingMode = true;
    
        // Define brush options for canvasFront
        var brushOptionsFront = {
            black: new fabric.PencilBrush(canvasFront),
            red: new fabric.PencilBrush(canvasFront)
        };
    
        // Define brush options for canvasBack
        var brushOptionsBack = {
            black: new fabric.PencilBrush(canvasBack),
            red: new fabric.PencilBrush(canvasBack)
        };
    
        // Configure black brush properties for both canvases
        brushOptionsFront.black.color = 'black';
        brushOptionsFront.black.width = 2;
        brushOptionsBack.black.color = 'black';
        brushOptionsBack.black.width = 2;
    
        // Configure red brush properties for both canvases
        brushOptionsFront.red.color = 'red';
        brushOptionsFront.red.width = 2;
        brushOptionsBack.red.color = 'red';
        brushOptionsBack.red.width = 2;
    
        // Set initial brush to black for both canvases
        canvasFront.freeDrawingBrush = brushOptionsFront.black;
        canvasBack.freeDrawingBrush = brushOptionsBack.black;
    
        // Switch between brushes based on user input from radio buttons
        var brushSelectors = document.querySelectorAll('input[name="brushSelector"]');
        brushSelectors.forEach(function(selector) {
            selector.addEventListener('change', function() {
                var selectedColor = this.value;
                canvasFront.freeDrawingBrush = brushOptionsFront[selectedColor];
                canvasBack.freeDrawingBrush = brushOptionsBack[selectedColor];
            });
        });
    
        // Prevent page scroll when drawing on canvas
        canvasFront.on('mouse:down', function(event) {
            event.e.preventDefault();
        });
        canvasBack.on('mouse:down', function(event) {
            event.e.preventDefault();
        });
    
        // Clear front canvas
        document.getElementById('clearCanvasFront').addEventListener('click', function() {
            canvasFront.clear();
        });
    
        // Clear back canvas
        document.getElementById('clearCanvasBack').addEventListener('click', function() {
            canvasBack.clear();
        });
    
        // Submit form when canvases are submitted
        document.getElementById('canvasForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            // Convert canvases to data URL
            var canvasDataFront = canvasFront.toDataURL('image/png');
            var canvasDataBack = canvasBack.toDataURL('image/png');
            
            // Set the data URLs as the values of hidden input fields
            document.getElementById('canvasDataFront').value = canvasDataFront;
            document.getElementById('canvasDataBack').value = canvasDataBack;
            
            // Submit the form
            this.submit();
        });
    });
</script>
