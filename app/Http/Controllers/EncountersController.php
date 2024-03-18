<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use App\Models\VisualAcuity;
use App\Models\Encounters;
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

class EncountersController extends Controller
{
    // public function index()
    // {
    //     $data['statusArr'] = VisualAcuity::STATUS_ARR;

    //     return view('encounter.encounters.index', $data);
    // }


        /** @var PatientCaseRepository */
        private $patientCaseRepository;

        public function __construct(PatientCaseRepository $patientCaseManagerRepo)
        {
            $this->patientCaseRepository = $patientCaseManagerRepo;
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

    public function store(Request $request){
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
        $data = Encounters::with('patientUser')->select('encounters.*')->where('user_id', '=', $patientId);
        // $data = DB::table('encounters')->select('encounters.*', 'patients.*')
        // ->join('patients', 'patients.user_id', '=', 'encounters.patient_id')->get();
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
        return view('patient_cases.encounter.show', compact('data'));
        // return "Success";
    }

}
