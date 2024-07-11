<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Patient Encounter Report</title>
</head>
<body>
  
@foreach ($data as $item)
<center><img src="assets/images/rachel-logo.png" style="width:30%;" /></center>
  
<p style="text-align: center; font-size:22px; margin-top:0em; margin-bottom:0em;"><u>PATIENT ENCOUNTER FORM</u></p>
<br/>
<div class="row">
  <div class="col-sm-6 col-lg-6 m-b-20">
   
    <table width="100%" border="1" style="border-collapse:collapse">
      <tr>
        <td style="width: 25%"><h3>Patient ID: {{ $item->patient_id ?? null }}</h3></td>
        <td style="width: 25%"><h5>Patient Name:</h5> <h3 class="text-uppercase">{{ $item->patient_first_name ?? null }} {{ $item->patient_last_name ?? null }}</h3></td>
        <td style="width: 25%"><h5>Email:</h5> <h3 class="text-uppercase">{{ $item->patient_email ?? null }}</h3></td>
        <td  style="width: 25%"><h5>Phone Number:</h5> <h3 class="text-uppercase">{{ $item->patient_phone ?? null }}</h3></td>
      </tr>
      <tr>
        <td>
            <h5>Gender:</h5>
            <h3 class="text-uppercase">
                {{ $item->patient_gender == 0 ? 'Male' : ($item->patient_gender == 1 ? 'Female' : 'Unknown') }}
            </h3>
        </td>
        
        {{-- <td><h5>Age:</h5> <h3 class="text-lowercase">{{ \Carbon\Carbon::parse($item->patient_dob ?? null ) }}</h3></td> --}}
        <td><h5>Age:</h5> <h3 class="text-lowercase">{{ \Carbon\Carbon::parse($item->patient_dob ?? null )->diffInYears(\Carbon\Carbon::now()) }}</h3></td>

        </h3></td>
        <td><h5>Blood Group:</h5> <h3 class="text-uppercase">{{ $item->patient_blood_group ?? null}}</h3></td>
        <td colspan="1"><h5>Doctor:</h5> <h3 class="text-uppercase">{{ $item->doctor_first_name }} {{ $item->doctor_last_name }}</h3></td>
      </tr>
     
     
    </table>

<br/>
    {{-- Visual Acuity --}}
    
    <table width="100%" border="1" style="border-collapse:collapse">
        <tr>
            <td><h4>VISUAL ACUITY</h4></td>
            <td><h5>RIGHT EYE</h5></td>
            <td><h5>LEFT EYE</h5></td>
          </tr>
        <tr>
          <td style="width: 25%"><h5>Visual Acuity Far (Presenting):</h5></td>
          <td style="width: 25%"><h3 class="text-uppercase">{{ $item->vafpr }}</h3></td>
          <td style="width: 25%"><h3 class="text-uppercase">{{ $item->vafpl }}</h3></td>
        </tr>

        <tr>
            <td style="width: 25%"><h5>Visual Acuity Far (Pinhole):</h5></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->vafpinr }}</h3></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->vafpinl }}</h3></td>
        </tr>

        <tr>
            <td style="width: 25%"><h5>Visual Acuity Far (Best Corrected):</h5></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->vafbcr }}</h3></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->vafbcl }}</h3></td>
        </tr>

        <tr>
            <td style="width: 25%"><h5>Visual Acuity Near:</h5></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->vanr }}</h3></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->vanl }}</h3></td>
        </tr>
      </table>

<br/>
      {{-- OTHER INFOR --}}
      <table width="100%" border="1" style="border-collapse:collapse">
        <tr>
            <td><h4>OTHER INFORMATION</h4></td>
            <td><h5>RIGHT EYE</h5></td>
            <td><h5>LEFT EYE</h5></td>
          </tr>
        <tr>
          <td style="width: 25%"><h5>Intraoccular Pressure:</h5></td>
          <td style="width: 25%"><h3 class="text-uppercase">{{ $item->intraoccular_pressure_right }} (mmHg)</h3></td>
          <td style="width: 25%"><h3 class="text-uppercase">{{ $item->intraoccular_pressure_left }} (mmHg)</h3></td>
        </tr>

        <tr>
            <td style="width: 25%"><h5>Chief Complaint:</h5></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->ccr }}</h3></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->ccl }}</h3></td>
        </tr>

        <tr>
            <td style="width: 25%"><h5>Detailed History:</h5></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->detailed_history_right }}</h3></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->detailed_history_left }}</h3></td>
        </tr>

        <tr>
            <td style="width: 25%"><h5>Findings:</h5></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->findings_right }}</h3></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->findings_left }}</h3></td>
        </tr>

        <tr>
            <td style="width: 25%"><h5>Eyelid:</h5></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->eyelid_right }}</h3></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->eyelid_left }}</h3></td>
        </tr>

        <tr>
            <td style="width: 25%"><h5>Conjunctiva:</h5></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->conjunctiva_right }}</h3></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->conjunctiva_left }}</h3></td>
        </tr>

        <tr>
            <td style="width: 25%"><h5>Cornea:</h5></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->cornea_right }}</h3></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->cornea_left }}</h3></td>
        </tr>

        <tr>
            <td style="width: 25%"><h5>AC:</h5></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->AC_right }}</h3></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->AC_left }}</h3></td>
        </tr>

        <tr>
            <td style="width: 25%"><h5>IRIS:</h5></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->iris_right }}</h3></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->iris_left }}</h3></td>
        </tr>

        <tr>
            <td style="width: 25%"><h5>Pupil:</h5></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->pupil_right }}</h3></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->pupil_left }}</h3></td>
        </tr>


        <tr>
            <td style="width: 25%"><h5>LENS:</h5></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->lens_right }}</h3></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->lens_left }}</h3></td>
        </tr>

        <tr>
            <td style="width: 25%"><h5>Vitreous:</h5></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->vitreous_right }}</h3></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->vitreous_left }}</h3></td>
        </tr>

        <tr>
            <td style="width: 25%"><h5>Retina:</h5></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->retina_right }}</h3></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->retina_left }}</h3></td>
        </tr>

        <tr>
            <td style="width: 25%"><h5>Other Findings:</h5></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->other_findings_right }}</h3></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->other_findings_left }}</h3></td>
        </tr>
      </table>

      <br/>
      {{-- Refraction --}}
      <table width="100%" border="1" style="border-collapse:collapse">
        <tr>
            <td><h4>REFRACTION</h4></td>
            <td><h5>RIGHT EYE</h5></td>
            <td><h5>LEFT EYE</h5></td>
          </tr>
        <tr>
          <td style="width: 25%"><h5>Sphere:</h5></td>
          <td style="width: 25%"><h3 class="text-uppercase">{{ $item->sphere_right }}</h3></td>
          <td style="width: 25%"><h3 class="text-uppercase">{{ $item->sphere_left }}</h3></td>
        </tr>

        <tr>
            <td style="width: 25%"><h5>Cylinder:</h5></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->cylinder_right }}</h3></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->cylinder_left }}</h3></td>
        </tr>

        <tr>
            <td style="width: 25%"><h5>Axis:</h5></td>
            <td style="width: 25%"><h3 class="text-uppercase">{!! $item->axis_right !!}</h3></td>
            <td style="width: 25%"><h3 class="text-uppercase">{!! $item->axis_left !!}</h3></td>
        </tr>

        <tr>
            <td style="width: 25%"><h5>Prism:</h5></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->prism_right }}</h3></td>
            <td style="width: 25%"><h3 class="text-uppercase">{{ $item->prism_left }}</h3></td>
        </tr>
      </table>

      
      {{-- FREE HANDWRITING --}}
    <h4>FREE HANDWRITING</h4>
<table width="100%" border="1" style="border-collapse:collapse">
<tr>
        <td style="color:black; align-content:center;" colspan="3"> <h5>Left Eye Front:</h5><img src="{{ $item->free_handwriting_left_front  }}" /></td>
        <td style="color:black" colspan="3"> <h5>Left Eye Back:</h5><img src="{{ $item->free_handwriting_left_back }}" /></td>
      </tr>

      <tr>
        <td style="color:black; align-content:center;" colspan="3"> <h5>Right Eye Front:</h5><img src="{{ $item->free_handwriting_right_front  }}" /></td>
        <td style="color:black" colspan="3"> <h5>Right Eye Back:</h5><img src="{{ $item->free_handwriting_right_back }}" /></td>
      </tr>
    </table>
  </div>
</div>
@endforeach

</body>
</html>
