<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use App\Models\VisualAcuity;
use App\Models\Encounters;
use App\Models\TemporaryEncounters;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\PatientCase;
use App\Repositories\PatientCaseRepository;
use App\Repositories\PatientRepository;
use Flash;
use Illuminate\Support\Facades\Validator;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Prescription;
// use App\Models\User;
use App\Repositories\DoctorRepository;
use App\Repositories\MedicineRepository;
use App\Repositories\PrescriptionRepository;
use App\Models\PrescriptionMedicineModal;
use App\Models\PhysicalInformation;
use App\Models\Investigation;
use App\Models\EncounterImage;


class EncountersController extends Controller
{
   
    /** @var  PrescriptionRepository
     * @var DoctorRepository
     */
    private $prescriptionRepository;

    private $doctorRepository;

    private $medicineRepository;

  
   
    public $patientId;
    // public function index()
    // {
    //     $data['statusArr'] = VisualAcuity::STATUS_ARR;

    //     return view('encounter.encounters.index', $data);
    // }


        /** @var PatientCaseRepository */
        private $patientCaseRepository;

        public function __construct(PatientCaseRepository $patientCaseManagerRepo,
        PrescriptionRepository $prescriptionRepo,
        DoctorRepository $doctorRepository,
        MedicineRepository $medicineRepository)
        {
            $this->patientCaseRepository = $patientCaseManagerRepo;
            $this->prescriptionRepository = $prescriptionRepo;
        $this->doctorRepository = $doctorRepository;
        $this->medicineRepository = $medicineRepository;
        }


    public function index()
    {
        $patients = $this->patientCaseRepository->getPatients();
        $doctors = $this->patientCaseRepository->getDoctors();

        return view('patient_cases.encounter.index', compact('patients', 'doctors'));
    }

    public function encounter(){
        return view('patient_cases.encounter.encounter');
    }

    public function encounter2(){
        return view('patient_cases.encounter.encounter2');
    }

    public function encounter3(){
        return view('patient_cases.encounter.encounter3');
    }

    public function encounter4(){
        return view('patient_cases.encounter.encounter4');
    }

    public function encounter5(){
        return view('patient_cases.encounter.encounter5');
    }

    public function encounter6(){
        return view('patient_cases.encounter.encounter6');
    }


    public function encounter41(){
        return view('patient_cases.encounter.encounter41');
    }

    // public function encounter7(){
    //     return view('patient_cases.encounter.encounter7');
    // }

    public function encounter7()
    { 
        
        $patients = $this->prescriptionRepository->getPatients();
        $medicines = $this->prescriptionRepository->getMedicines();
        $doctors = $this->doctorRepository->getDoctors();
        $data = $this->medicineRepository->getSyncList();
        $medicineList = $this->medicineRepository->getMedicineList($medicines['medicines']);
        $mealList = $this->medicineRepository->getMealList();
        $doseDurationList = $this->medicineRepository->getDoseDurationList();
        $doseIntervalList = $this->medicineRepository->getDoseIntervalList();

        return view('patient_cases.encounter.encounter7',
            compact('patients', 'doctors', 'medicines', 'medicineList', 'mealList', 'doseDurationList', 'doseIntervalList'))->with($data);
    }

    public function store(Request $request)
    {
        $temporary_id = Str::random(10);
        
        // Validation rules
        $validator = Validator::make($request->all(), [
            'patient_id' => 'required|integer',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
    
        // Begin transaction
        DB::beginTransaction();
    
        try {
            // Save encounter
            $encounter = new Encounters();
            $encounter->patient_id = $request->patient_id;
            $encounter->doctor_id = Auth::user()->id;
            $encounter->temporary_id = $temporary_id;
            $encounter->save();
    
             // Save encounter
             $encounter = new TemporaryEncounters();
             $encounter->patient_id = $request->patient_id;
             $encounter->doctor_id = Auth::user()->id;
             $encounter->temporary_id = $temporary_id;
             $encounter->save();
    
            // Commit the transaction
            DB::commit();
    
            // Store patient_id and temporary_id in the session
            $request->session()->put('patient_id', $request->patient_id);
            $request->session()->put('temporary_id', $temporary_id);
    
            // Redirect to the next page with success message
            return redirect()->route('patient.encounter2')->with('success', __('messages.encounters.encounter_created'));
        } catch (\Exception $e) {
            // If an error occurs, rollback the transaction
            DB::rollBack();
    
            // Log the error
            Log::error('Encounter creation failed: ' . $e->getMessage());
    
            // Return to the previous page with an error message
            return redirect()->back()->withErrors(['error' => 'Encounter creation failed! Please try again later.']);
        }
    }
    

    public function updateVisualAcuity(Request $request)
{
   
    try {
        // Find the encounter by patient_id and temporary_id
        $encounter = Encounters::where('patient_id', $request->patient_id)
            ->where('temporary_id', $request->temporary_id)
            ->firstOrFail();

        // Update the visual acuity fields
        $encounter->update([
            'visual_acuity_far_presenting_left' => $request->visual_acuity_far_presenting_left,
            'visual_acuity_far_presenting_right' => $request->visual_acuity_far_presenting_right,
            'visual_acuity_far_pinhole_left' => $request->visual_acuity_far_pinhole_left,
            'visual_acuity_far_pinhole_right' => $request->visual_acuity_far_pinhole_right,
            'visual_acuity_far_best_corrected_left' => $request->visual_acuity_far_best_corrected_left,
            'visual_acuity_far_best_corrected_right' => $request->visual_acuity_far_best_corrected_right,
            'visual_acuity_near_left' => $request->visual_acuity_near_left,
            'visual_acuity_near_right' => $request->visual_acuity_near_right,
        ]);

        // Redirect with success message
        return redirect()->route('patient.encounter3')->with('success', __('messages.encounters.visual_acuity'));
    } catch (\Exception $e) {
        // Log the error
        Log::error('Error updating visual acuity: ' . $e->getMessage());

        // Return to the previous page with an error message
        return redirect()->back()->withErrors(['error' => 'Failed to update visual acuity']);
    }
}


public function updateConsultation(Request $request)
{
    try {
        // Find the encounter by patient_id and temporary_id
        $encounter = Encounters::where('patient_id', $request->patient_id)
            ->where('temporary_id', $request->temporary_id)
            ->firstOrFail();

        // Update the visual acuity fields
        $encounter->update([
            // Left Eye
            'intraoccular_pressure_left' => $request->intraoccular_pressure_left,
            'chief_complaint_left' => $request->chief_complaint_left,
            'other_complaints_left' => $request->other_complaints_left,
            'detailed_history_left' => $request->detailed_history_left,
            'findings_left' => $request->findings_left,
            'eyelid_left' => $request->eyelid_left,
            'conjunctiva_left' => $request->conjunctiva_left,
            'cornea_left' => $request->cornea_left,
            'AC_left' => $request->AC_left,
            'iris_left' => $request->iris_left,
            'pupil_left' => $request->pupil_left,
            'lens_left' => $request->lens_left,
            'vitreous_left' => $request->vitreous_left,
            'retina_left' => $request->retina_left,
            'other_findings_left' => $request->other_findings_left,

            // Right Eye
            'intraoccular_pressure_right' => $request->intraoccular_pressure_right,
            'chief_complaint_right' => $request->chief_complaint_right,
            'other_complaints_right' => $request->other_complaints_right,
            'detailed_history_right' => $request->detailed_history_right,
            'findings_right' => $request->findings_right,
            'eyelid_right' => $request->eyelid_right,
            'conjunctiva_right' => $request->conjunctiva_right,
            'cornea_right' => $request->cornea_right,
            'AC_right' => $request->AC_right,
            'iris_right' => $request->iris_right,
            'pupil_right' => $request->pupil_right,
            'lens_right' => $request->lens_right,
            'vitreous_right' => $request->vitreous_right,
            'retina_right' => $request->retina_right,
            'other_findings_right' => $request->other_findings_right,
        ]);

        // Redirect with success message
        return redirect()->route('patient.encounter4')->with('success', __('messages.encounters.visual_acuity'));
    } catch (\Exception $e) {
        // Log the error
        Log::error('Error updating consultations: ' . $e->getMessage());

        // Return to the previous page with an error message
        return redirect()->back()->withErrors(['error' => 'Failed to update consultations']);
    }
}



// public function freeHandwritingRightEye(Request $request)
// {
//     // Validate the request
//     $request->validate([
//         // 'canvasData' => 'required|string', // Adjust this validation rule as needed
//         'patient_id' => 'required', // Add validation rules for patient_id and temporary_id if necessary
//         'temporary_id' => 'required',
//     ]);

//     // Decode the base64-encoded image data
//     $imageData = $request->input('canvasData');
//     $decodedImageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
    
//     // Generate a unique file name
//     $fileName = 'canvas_image_' . uniqid() . '.png';
    
//     // Save the image to the storage directory
//      Storage::disk('public')->put('uploads/canvas_images/' . $fileName, $decodedImageData);
//     $filePath = "main2/public/uploads/uploads/canvas_images/$fileName";
//     // Find the encounter by patient_id and temporary_id
//     $encounter = Encounters::where('patient_id', $request->patient_id)
//         ->where('temporary_id', $request->temporary_id)
//         ->firstOrFail();

//     // Update the visual acuity fields
//     $encounter->update([
//         'free_handwriting_right_front' => $filePath,
//     ]);
//     Flash::success(__('messages.encounters.encounter_created'));
//     return redirect()->route('patient.encounter5')->with('success', __('messages.encounters.visual_acuity'));
//     // return redirect()->back()->with('success', 'Free hand image saved successfully.');
// }


public function freeHandwritingRightEye(Request $request)
{
    // Validate the request
    $request->validate([
        'canvasDataFront' => 'required|string',
        'canvasDataBack' => 'required|string',
        'patient_id' => 'required',
        'temporary_id' => 'required',
    ]);

    // Function to handle image saving
    function saveCanvasImage($imageData, $prefix) {
        // Decode the base64-encoded image data
        $decodedImageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
        
        // Generate a unique file name
        $fileName = $prefix . '_' . uniqid() . '.png';
        
        // Save the image to the storage directory
        Storage::disk('public')->put('uploads/canvas_images/' . $fileName, $decodedImageData);
        
        // Return the correct path format
        return "home/ecolemod/rachel.ecolemoderne.com/new/public/$fileName";
    }

    // Save front image
    $frontImageData = $request->input('canvasDataFront');
    $frontImagePath = saveCanvasImage($frontImageData, 'canvas_front');

    // Save back image
    $backImageData = $request->input('canvasDataBack');
    $backImagePath = saveCanvasImage($backImageData, 'canvas_back');

    // Find the encounter by patient_id and temporary_id
    $encounter = Encounters::where('patient_id', $request->patient_id)
        ->where('temporary_id', $request->temporary_id)
        ->firstOrFail();

    // Update the visual acuity fields with paths to the saved images
    $encounter->update([
        'free_handwriting_right_front' => $frontImagePath,
        'free_handwriting_right_back' => $backImagePath,
    ]);

    Flash::success(__('messages.encounters.encounter_created'));
    return redirect()->route('patient.encounter5')->with('success', __('messages.encounters.visual_acuity'));
}



public function freeHandwritingLeftEye(Request $request)
{
    // Validate the request
    $request->validate([
        'canvasDataFront' => 'required|string',
        'canvasDataBack' => 'required|string',
        'patient_id' => 'required',
        'temporary_id' => 'required',
    ]);

    // Function to handle image saving
    function saveCanvasImage($imageData, $prefix) {
        // Decode the base64-encoded image data
        $decodedImageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
        
        // Generate a unique file name
        $fileName = $prefix . '_' . uniqid() . '.png';
        
        // Save the image to the storage directory
        Storage::disk('public')->put('uploads/canvas_images/' . $fileName, $decodedImageData);
        
        // Return the correct path format
        return "home/ecolemod/rachel.ecolemoderne.com/new/public/$fileName";
        // return "main2/public/uploads/uploads/canvas_images/$fileName";
        
    }

    // Save front image
    $frontImageData = $request->input('canvasDataFront');
    $frontImagePath = saveCanvasImage($frontImageData, 'canvas_front');

    // Save back image
    $backImageData = $request->input('canvasDataBack');
    $backImagePath = saveCanvasImage($backImageData, 'canvas_back');

    // Find the encounter by patient_id and temporary_id
    $encounter = Encounters::where('patient_id', $request->patient_id)
        ->where('temporary_id', $request->temporary_id)
        ->firstOrFail();

    // Update the visual acuity fields with paths to the saved images
    $encounter->update([
        'free_handwriting_left_front' => $frontImagePath,
        'free_handwriting_left_back' => $backImagePath,
    ]);

    Flash::success(__('messages.encounters.encounter_created'));
    return redirect()->route('patient.encounter6')->with('success', __('messages.encounters.visual_acuity'));
}


public function refraction(Request $request)
{
    try {
        // Find the encounter by patient_id and temporary_id
        $encounter = Encounters::where('patient_id', $request->patient_id)
            ->where('temporary_id', $request->temporary_id)
            ->firstOrFail();

        // Update the visual acuity fields
        $encounter->update([
            // Left Eye
            'sphere_right' => $request->sphere_right,
            'sphere_left' => $request->sphere_left,
            'cylinder_right' => $request->cylinder_right,
            'cylinder_left' => $request->cylinder_left,
            'axis_right' => $request->axis_right,
            'axis_left' => $request->axis_left,
            'prism_right' => $request->prism_right,
            'prism_left' => $request->prism_left,

            'near_add_right' => $request->near_add_right,
            'near_add_left' => $request->near_add_left,
            'oct_left' => $request->oct_left,
            'oct_right' => $request->oct_right,
            'ffa_left' => $request->ffa_left,
            'ffa_right' => $request->ffa_right,
            'fundus_photography_right' => $request->fundus_photography_right,
            'fundus_photography_left' => $request->fundus_photography_left,
            'pachymetry_right' => $request->pachymetry_right,
            'pachymetry_left' => $request->pachymetry_left,
            'cuft_static_right' => $request->cuft_static_right,
            'cuft_static_left' => $request->cuft_static_left,
            'cuft_kinetic_right' => $request->cuft_kinetic_right,
            'cuft_kinetic_left' => $request->cuft_kinetic_left,
            
            'pupil_distance' => $request->pupil_distance,
           
     
        ]);

        // Redirect with success message
        // return redirect()->route('patient.encounter7')->with('success', __('messages.encounters.visual_acuity'));
        // Redirect with success message and query parameter
return redirect()->route('patient.encounter7', ['reload' => 'true'])->with('success', __('messages.encounters.visual_acuity'));
// return view('patient_cases.encounter.encounter7');

    } catch (\Exception $e) {
        // Log the error
        Log::error('Error updating consultations: ' . $e->getMessage());

        // Return to the previous page with an error message
        return redirect()->back()->withErrors(['error' => 'Failed to update consultations']);
    }
}


public function diagnosis(Request $request)
{
    try {
        // Start a database transaction
        DB::beginTransaction();

        $randomNumber = random_int(100000, 999999);
        $randomNumber2 = random_int(100000, 999999);
        $patient_id = $request->patient_id;
        $pid = $request->pid;

        // Generate the new prescription
        $new_prescription = new Prescription();
        $new_prescription->patient_id = $pid;
        $new_prescription->save();

        // Retrieve the auto-generated ID of the new prescription
        $prescription_id = $new_prescription->id;

        // Loop through the input fields and create PrescriptionMedicineModal instances
        foreach ($request->addMoreEyedrops as $data) {
            $prescription = new PrescriptionMedicineModal();
            $prescription->medicine = $data['eyedrop'];
            $prescription->dosage = $data['dosage'];
            $prescription->day = $data['day'];
            $prescription->time = $data['time'];
            $prescription->comment = $data['comment'];
            $prescription->prescription_id = $prescription_id;
            $prescription->treatment_type = $request->treatment_type1;
            $prescription->save();
        }

        foreach ($request->addMoreTablets as $data2) {
            $prescription = new PrescriptionMedicineModal();
            $prescription->medicine = $data2['tablet'];
            $prescription->dosage = $data2['dosage'];
            $prescription->day = $data2['day'];
            $prescription->time = $data2['time'];
            $prescription->comment = $data2['comment'];
            $prescription->prescription_id = $prescription_id;
            $prescription->treatment_type = $request->treatment_type2;
            $prescription->save();
        }

        foreach ($request->addMoreOintments as $data3) {
            $prescription = new PrescriptionMedicineModal();
            $prescription->medicine = $data3['ointment'];
            $prescription->dosage = $data3['dosage'];
            $prescription->day = $data3['day'];
            $prescription->time = $data3['time'];
            $prescription->comment = $data3['comment'];
            $prescription->prescription_id = $prescription_id;
            $prescription->treatment_type = $request->treatment_type3;
            $prescription->save();
        }

        // Find the encounter by patient_id and temporary_id
        $encounter = Encounters::where('patient_id', $patient_id)
            ->where('temporary_id', $request->temporary_id)
            ->firstOrFail();

        // Update the encounter record with the prescription_id
        $encounter->update([
            
            'diagnosis_left_eye' => $request->diagnosis_left_eye,
            'diagnosis_right_eye' => $request->diagnosis_right_eye,
            'external_investigation_required' => $request->external_investigation_required,
            'prescription_id' => $prescription_id,
            'treatment_eyedrop' => $request->treatment_eyedrop,
            'treatment_tablet' => $request->treatment_tablet,
            'investigations_required' => $request->investigations_required,
            'followup_appointment_date' => $request->followup_appointment_date,
            'new_developments' => $request->new_developments,
            'prescription_id' => $prescription_id,

            'frame' => $request->frame,
            'lens_type' => $request->lens_type,
            'cost_of_lens' => $request->cost_of_lens,
            'cost_of_frame' => $request->cost_of_frame,


            'is_complete' => "1",
        ]);

        Encounters::where('patient_id', $patient_id)
            ->where('is_complete', 0)
            ->delete();

        TemporaryEncounters::where('patient_id', $request->patient_id)
            ->delete();

        if ($request->filled('followup_appointment_date')) {
            $doctor = Doctor::select('doctor_department_id', 'id')->where('user_id', Auth::user()->id)->first();
            if (!$doctor) {
                throw new \Exception("Doctor not found for the authenticated user.");
            }

            Log::info('Doctor details: ', ['doctor' => $doctor]);

            $patient = Patient::select('id')->where('user_id', $request->patient_id)->first();
            if (!$patient) {
                throw new \Exception("Patient not found for the given user ID.");
            }

            Log::info('Patient details: ', ['patient' => $patient]);

            $appointment = new Appointment();
            $appointment->patient_id = $patient->id;
            $appointment->doctor_id = $doctor->id;
            $appointment->department_id = $doctor->doctor_department_id;
            $appointment->opd_date = $request->followup_appointment_date;
            $appointment->is_completed = "0";
            $appointment->save();
        }

        // Store Physical Information
        $physical_information = new PhysicalInformation();
        $physical_information->encounter_id = $encounter->id;
        $physical_information->hbp = $request->hbp;
        $physical_information->diabetes = $request->diabetes;
        $physical_information->pregnancy = $request->pregnancy;
        $physical_information->food = $request->food;
        $physical_information->drug_allergy = $request->drug_allergy;
        $physical_information->current_medication = $request->current_medication;
        $physical_information->save();

        // Extract the selected values from the request
        $investigationsRequired = $request->input('investigations_required');

        // Save each selected value as a new row in the investigations table
        if (!empty($investigationsRequired)) {
            foreach ($investigationsRequired as $investigation_type) {
                Investigation::create([
                    'encounter_id' => $encounter->id,
                    'investigation_type' => $investigation_type,
                ]);
            }
        }

        // Commit the transaction
        DB::commit();

        // Redirect with success message
        Flash::success(__('messages.encounters.encounter_created'));
        return redirect()->route('encounter.index')->with('success', __('messages.encounters.visual_acuity'));
    } catch (\Exception $e) {
        // Rollback the transaction if an error occurs
        DB::rollback();

        // Log the error
        Log::error('Error updating consultations: ' . $e->getMessage());

        // Return to the previous page with an error message
        return redirect()->back()->withErrors(['error' => 'Failed to update consultations']);
    }
}


// public function freeHandwriting(Request $request)
// {
   
//     try {
//         // Find the encounter by patient_id and temporary_id
//         $encounter = Encounters::where('patient_id', $request->patient_id)
//             ->where('temporary_id', $request->temporary_id)
//             ->firstOrFail();

//         // Update the visual acuity fields
//         $encounter->update([
//             'free_handwriting_left' => $request->input('canvasData'),
//             // 'free_handwriting_right' => $request->input('canvasData2'),
            
          
//         ]);

//         // Redirect with success message
//         return redirect()->route('patient.encounter5')->with('success', __('messages.encounters.visual_acuity'));
//     } catch (\Exception $e) {
//         // Log the error
//         Log::error('Error updating visual acuity: ' . $e->getMessage());

//         // Return to the previous page with an error message
//         return redirect()->back()->withErrors(['error' => 'Failed to update visual acuity']);
//     }
// }



    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'patient_id' => 'required|integer',
            // 'visual_acuity_far_presenting_left' => 'required|string',
            // ... other field validations ...
            // 'canvasData' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
      $encounter =  new Encounters();
      $encounter->patient_id = $request->patient_id;
      $encounter->doctor_id = Auth::user()->id;
      $encounter->visual_acuity_far_presenting_left = $request->visual_acuity_far_presenting_left;
      $encounter->visual_acuity_far_presenting_right = $request->visual_acuity_far_presenting_right;
      $encounter->visual_acuity_far_pinhole_left = $request->visual_acuity_far_pinhole_left;
      $encounter->visual_acuity_far_pinhole_right = $request->visual_acuity_far_pinhole_right;
      $encounter->visual_acuity_far_best_corrected_left = $request->visual_acuity_far_best_corrected_left;
      $encounter->visual_acuity_far_best_corrected_right = $request->visual_acuity_far_best_corrected_right;
      $encounter->visual_acuity_near_left = $request->visual_acuity_near_left;
      $encounter->visual_acuity_near_right = $request->visual_acuity_near_right;

    //   Left Eye
      $encounter->intraoccular_pressure_left = $request->intraoccular_pressure_left;
      $encounter->chief_complaint_left = $request->chief_complaint_left;
      $encounter->detailed_history_left = $request->detailed_history_left;
      $encounter->findings_left = $request->findings_left;
      $encounter->eyelid_left = $request->eyelid_left;
      $encounter->conjunctiva_left = $request->conjunctiva_left;
      $encounter->cornea_left = $request->cornea_left;
      $encounter->AC_left = $request->AC_left;
      $encounter->iris_left = $request->iris_left;
      $encounter->pupil_left = $request->pupil_left;
      $encounter->lens_left = $request->lens_left;
      $encounter->vitreous_left = $request->vitreous_left;
      $encounter->retina_left = $request->retina_left;
      $encounter->other_findings_left = $request->other_findings_left;

    //   Right Eye
    $encounter->intraoccular_pressure_right = $request->intraoccular_pressure_right;
    $encounter->chief_complaint_right = $request->chief_complaint_right;
    $encounter->detailed_history_right = $request->detailed_history_right;
    $encounter->findings_right = $request->findings_right;
    $encounter->eyelid_right = $request->eyelid_right;
    $encounter->conjunctiva_right = $request->conjunctiva_right;
    $encounter->cornea_right = $request->cornea_right;
    $encounter->AC_right = $request->AC_right;
    $encounter->iris_right = $request->iris_right;
    $encounter->pupil_right = $request->pupil_right;
    $encounter->lens_right = $request->lens_right;
    $encounter->vitreous_right = $request->vitreous_right;
    $encounter->retina_right = $request->retina_right;
    $encounter->other_findings_right = $request->other_findings_right;

    $encounter->sphere_right = $request->sphere_right;
    $encounter->sphere_left = $request->sphere_left;
    $encounter->cylinder_right = $request->cylinder_right;
    $encounter->cylinder_left = $request->cylinder_left;
    $encounter->axis_right = $request->axis_right;
    $encounter->axis_left = $request->axis_left;
    $encounter->prism_right = $request->prism_right;
    $encounter->prism_left = $request->prism_left;

    //   $encounter->free_handwriting_left = $request->free_handwriting_left;
      $encounter->free_handwriting_left = $request->input('canvasData');
      $encounter->free_handwriting_right = $request->free_handwriting_right;

      $encounter->diagnosis = $request->diagnosis;
      $encounter->treatment_eyedrop = $request->treatment_eyedrop;
      $encounter->treatment_tablet = $request->treatment_tablet;
      $encounter->investigations_required = $request->investigations_required;
      $encounter->followup_appointment_date = $request->followup_appointment_date;
      $encounter->new_developments = $request->new_developments;

      try {
        $encounter->save();
        Flash::success(__('messages.encounters.encounter_created'));
        return redirect(route('encounter.index'));
    } catch (Exception $e) {
        // Handle saving encounter exception (e.g., log the error)
        return redirect()->back()->withErrors(['error' => 'Encounter creation failed!']);
    }
    // return $this->sendSuccess(__('messages.common.status_updated_successfully'));
    }

    public function show($patientId)
    {
        
        // $data = Patient::where('user_id', '=', $patientId);
        // $data = Encounters::with('patientUser')->select('encounters.*')->where('user_id', '=', $patientId)->get();
        $data = DB::table('encounters')
        ->select('encounters.*', 'patients.*', 'users.*', 'addresses.*', 'encounters.id as encounter_id')
        ->leftJoin('patients', 'patients.user_id', '=', 'encounters.patient_id')
        ->leftJoin('users', 'users.id', '=', 'encounters.patient_id') 
        ->leftJoin('addresses', 'addresses.owner_id', '=', 'users.owner_id') 
        ->where('encounters.patient_id', $patientId)
        ->get();
    

        $encounterCounts = DB::table('encounters')
        ->select('patient_id', DB::raw('COUNT(*) as encounter_count'))
        ->where('encounters.patient_id', $patientId)
        ->groupBy('patient_id')
        ->get();

    
        // $data = $this->patientRepository->getPatientEncounterData($patientId);

        // if (! $data) {
        //     return view('errors.404');
        // }

        // if (getLoggedinPatient() && checkRecordAccess($data->id)) {
        //     return view('errors.404');
        // } else {
        //     $advancedPaymentRepo = App::make(AdvancedPaymentRepository::class);
        //     $patients = $advancedPaymentRepo->getPatients();
        //     $user = Auth::user();
        //     if ($user->hasRole('Doctor')) {
        //         $vaccinationPatients = getPatientsList($user->owner_id);
        //     } else {
        //         $vaccinationPatients = Patient::getActivePatientNames();
        //     }
        //     $vaccinations = Vaccination::toBase()->pluck('name', 'id')->toArray();
        //     natcasesort($vaccinations);

            // return view('patients.show', compact('data', 'patients', 'vaccinations', 'vaccinationPatients'));
        // }
        return view('patient_cases.encounter.show', compact('data', 'encounterCounts'));
        // return response()->json($data);
        // return $data;
    }


    // UPDATE ENCOUNTER


    public function uploadImage(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // adjust validation rules as needed
        ]);

        // Store the uploaded image in the 'public' disk
        // $path = $request->file('image')->store('images', 'public');

        // Generate the full URL of the uploaded image
        // $url = Storage::disk('public')->url($path);
        
        $imageData = $request->file('image');
$extension = $imageData->getClientOriginalExtension(); // Get the original file extension
$fileName = 'uploaded_image_' . uniqid() . '.' . $extension; // Generate a unique filename

// Get the full path for the "sketches" folder within the storage disk
$storagePath = Storage::disk('public')->path('sketches');

// Combine the storage path and filename for the final destination
$destinationPath = $storagePath . '/' . $fileName;

// Store the image directly at the full path
$imageData->storeAs('sketches', $fileName); // Using storeAs method for clarity

// Update URL to point to the stored image
$url = "uploads/sketches/" . $fileName; 

        
        

       

        $encounter = Encounters::where('patient_id', $request->patient_id)
            ->where('temporary_id', $request->temporary_id)
            ->firstOrFail();

        $encounter_image = new EncounterImage();
        $encounter_image->encounter_id = $encounter->id;
        $encounter_image->image_url = $url;
        $encounter_image->save();

        Flash::success(__('messages.encounters.encounter_created'));
        return redirect()->route('patient.encounter6')->with('success', __('messages.encounters.visual_acuity'));
        // return redirect()->back()->with('success', 'Image uploaded successfully.');
    }


//     public function uploadImage(Request $request)
// {
//     // Validate the request
//     $request->validate([
//         // 'canvasData' => 'required|string', // Adjust this validation rule as needed
//         'patient_id' => 'required', // Add validation rules for patient_id and temporary_id if necessary
//         'temporary_id' => 'required',
//     ]);

//     // Decode the base64-encoded image data
//     $imageData = $request->input('canvasData');
//     // $decodedImageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
    
//     // Generate a unique file name
//     $fileName = 'canvas_image_' . uniqid() . '.png';
    
//     // Save the image to the storage directory
//     Storage::disk('public')->put('/sketches' . $fileName, $imageData);
//     $filePath = "/sketches/$fileName$imageData";
//     // Find the encounter by patient_id and temporary_id
//     $encounter = Encounters::where('patient_id', $request->patient_id)
//         ->where('temporary_id', $request->temporary_id)
//         ->firstOrFail();

//     // Update the visual acuity fields
//     $encounter_image = new EncounterImage();
//         $encounter_image->encounter_id = $encounter->id;
//         $encounter_image->image_url = $url;
//         $encounter_image->save();
//     Flash::success(__('messages.encounters.encounter_created'));
//     // return redirect()->route('patient.encounter6')->with('success', __('messages.encounters.visual_acuity'));
//     return redirect()->back()->with('success', 'Free hand image saved successfully.');
// }
    
}
