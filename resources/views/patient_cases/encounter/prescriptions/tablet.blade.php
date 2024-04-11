<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <title>Laravel 8 Add/Remove Multiple Input Fields Example</title> --}}
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <style>
      .container {
            max-width: 600px;
        }
    </style>

</head>
<body>
    <div class="">
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (Session::has('success'))
        <div class="alert alert-success text-center">
            <p>{{ Session::get('success') }}</p>
        </div>
        @endif
        <table class="table table-striped" id="dynamicAddRemove" width="100%" border="1">
            <tr><td colspan="7"><h3>Tablets</h3></td></tr>
            <tr>
                <th>Medicine</th>
                <th>Dosage</th>
                <th>Dose Duration</th>
                <th>Time</th>
                <th>Dose Interval</th>
                <th>Comment</th>
                <th><button type="button" name="add" id="dynamic-ar" class="btn btn-primary text-star add-medicine-btn">Add </button></th>
            </tr>
            <tr>
                <td>
                    <input type="hidden" value="TABLET" name="treatment_type3"/>
                    <select id="dynamicSelect" name="addMoreTablets[' + i + '][tablet]" class="form-select select2" data-control="select2">
                        <option value="">Select Tablets</option>
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
                        <option value="">Select Dose Duration</option>
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
                        <option value="">Select Dose Interval</option>
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
</body>
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>





</html>

<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><select id="dynamicSelectSubject" name="addMoreTablets[' + i +
            '][tablet]" class="form-control"><option value="">Select Tablets</option><?php $medicines = App\Models\Medicine::select("name", "id")->get(); foreach($medicines as $item){ ?><option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option><?php } ?></select></td><td><input type="text" name="addMoreTablets[' + i + '][dosage]" placeholder="Enter Dosage" class="form-control" /></td><td><select id="dynamicSelectDuration" name="addMoreTablets[' + i + '][day]" class="select2 form-select" data-control="select2"><option value="">Select Dose Duration</option><?php foreach(\App\Models\Prescription::DOSE_DURATION as $day){ ?><option value="<?php echo $day; ?>"><?php echo $day; ?></option><?php } ?></select></td><td><select id="dynamicSelectTime" name="addMoreTablets[' + i + '][time]" class="select2 form-select" data-control="select2"><option value="">Select Time</option><?php foreach(\App\Models\Prescription::MEAL_ARR as $time){ ?><option value="<?php echo $time; ?>"><?php echo $time; ?></option><?php } ?></select></td><td><select id="dynamicSelectInterval" name="addMoreTablets[' + i + '][dose_interval]" class="select2 form-select" data-control="select2"><option value="">Select Dose Interval</option><?php foreach(\App\Models\Prescription::DOSE_INTERVAL as $dose_interval){ ?><option value="<?php echo $dose_interval; ?>"><?php echo $dose_interval; ?></option><?php } ?></select></td><td><textarea name="addMoreTablets[' + i + '][comment]" class="form-control" rows="1" placeholder="{{ __('messages.prescription.comment')}}"></textarea></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );

        // Initialize select2 for newly added select elements
        $('.select2').select2();
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
</html>
