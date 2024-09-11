<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use PDF;
use App\Models\Encounters;

class PdfController extends Controller
{
   

public function generatePdf($id)
{
   

    $encounter = Encounters::select('encounters.*', 
    'vafpr.acuity_value as vafpr',
    'vafpl.acuity_value as vafpl',
    'vafpinr.acuity_value as vafpinr',
    'vafpinl.acuity_value as vafpinl',
    'vafbcr.acuity_value as vafbcr',
    'vafbcl.acuity_value as vafbcl',
    'vanr.acuity_value as vanr',
    'vanl.acuity_value as vanl',

    'ccr.acuity_value as ccr',
    'ccl.acuity_value as ccl',

    'sphere_right.acuity_value as sphere_right',
    'sphere_left.acuity_value as sphere_left',
    'cylinder_right.acuity_value as cylinder_right',
    'cylinder_left.acuity_value as cylinder_left',
    'axis_right.acuity_value as axis_right',
    'axis_left.acuity_value as axis_left',
    'prism_right.acuity_value as prism_right',
    'prism_left.acuity_value as prism_left',

     'encounters.free_handwriting_left_front as free_handwriting_left_front',
      'encounters.free_handwriting_left_back as free_handwriting_left_back',
      'encounters.free_handwriting_right_front as free_handwriting_right_front',
      'encounters.free_handwriting_right_back as free_handwriting_right_back',

      'patients.first_name as patient_first_name', 'patients.last_name as patient_last_name', 'patients.gender as patient_gender', 'patients.blood_group as patient_blood_group', 'patients.dob as patient_dob', 'patients.email as patient_email', 'patients.phone as patient_phone', 'patients.id as patient_id', 'doctors.first_name as doctor_first_name', 'doctors.last_name as doctor_last_name')
    ->leftJoin('users as patients', 'patients.id', '=', 'encounters.patient_id')
    ->leftJoin('users as doctors', 'doctors.id', '=', 'encounters.doctor_id')
    ->leftjoin('visual_acuity as vafpr', 'vafpr.id', '=', 'encounters.visual_acuity_far_presenting_right')
    ->leftjoin('visual_acuity as vafpl', 'vafpl.id', '=', 'encounters.visual_acuity_far_presenting_left')
    ->leftjoin('visual_acuity as vafpinr', 'vafpinr.id', '=', 'encounters.visual_acuity_far_pinhole_right')
    ->leftjoin('visual_acuity as vafpinl', 'vafpinl.id', '=', 'encounters.visual_acuity_far_pinhole_left')
    ->leftjoin('visual_acuity as vafbcr', 'vafbcr.id', '=', 'encounters.visual_acuity_far_best_corrected_right')
    ->leftjoin('visual_acuity as vafbcl', 'vafbcl.id', '=', 'encounters.visual_acuity_far_best_corrected_left')
   ->leftjoin('visual_acuity as vanr', 'vanr.id', '=', 'encounters.visual_acuity_near_right')
    ->leftjoin('visual_acuity as vanl', 'vanl.id', '=', 'encounters.visual_acuity_near_left')
   
    ->leftjoin('visual_acuity as ccr', 'ccr.id', '=', 'encounters.chief_complaint_right')
    ->leftjoin('visual_acuity as ccl', 'ccl.id', '=', 'encounters.chief_complaint_left')

    ->leftjoin('visual_acuity as sphere_right', 'sphere_right.id', '=', 'encounters.sphere_right')
    ->leftjoin('visual_acuity as sphere_left', 'sphere_left.id', '=', 'encounters.sphere_left')
    ->leftjoin('visual_acuity as cylinder_right', 'cylinder_right.id', '=', 'encounters.cylinder_right')
    ->leftjoin('visual_acuity as cylinder_left', 'cylinder_left.id', '=', 'encounters.cylinder_left')
    ->leftjoin('visual_acuity as axis_right', 'axis_right.id', '=', 'encounters.axis_right')
    ->leftjoin('visual_acuity as axis_left', 'axis_left.id', '=', 'encounters.axis_left')
    ->leftjoin('visual_acuity as prism_right', 'prism_right.id', '=', 'encounters.prism_right')
    ->leftjoin('visual_acuity as prism_left', 'prism_left.id', '=', 'encounters.prism_left')
    
    
    
    ->where('encounters.id', $id)
    ->get();

    $pdf = PDF::loadView('patient_cases.encounter.print_encounter', ['data' => $encounter])->setPaper('letter', 'portrait');

    // $pdf->setMargins(10, 10, 10, 10);
    $pdf->set_option('isPhpEnabled', true);
    $pdf->set_option('isHtml5ParserEnabled', true);
    $pdf->set_option('isFontSubsettingEnabled', true);

    // Add the footer to each page
    // $pdf->getCanvas()->page_text(270, 760, $footer, $font, 12);
    // $pdf = PDF::loadView('invoice'); // Replace 'pdf.invoice' with the name of your Blade view
    return $pdf->stream('print-encounter.pdf');

}

}
