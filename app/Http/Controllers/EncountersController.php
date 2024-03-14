<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisualAcuity;
use App\Models\Encounters;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\PatientCase;
use App\Repositories\PatientCaseRepository;

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

      $encounter->intraoccular_pressure = $request->intraoccular_pressure;
      $encounter->chief_complaint = $request->chief_complaint;
      $encounter->detailed_history = $request->detailed_history;
      $encounter->findings = $request->findings;
      $encounter->eyelid = $request->eyelid;
      $encounter->conjunctiva = $request->conjunctiva;
      $encounter->cornea = $request->cornea;
      $encounter->AC = $request->AC;
      $encounter->iris = $request->iris;
      $encounter->pupil = $request->pupil;
      $encounter->lens = $request->lens;
      $encounter->vitreous = $request->vitreous;
      $encounter->retina = $request->retina;
      $encounter->other_findings = $request->other_findings;
      $encounter->free_handwriting_left = $request->free_handwriting_left;
      $encounter->free_handwriting_right = $request->free_handwriting_right;

      $encounter->diagnosis = $request->diagnosis;
      $encounter->treatment_eyedrop = $request->treatment_eyedrop;
      $encounter->treatment_tablet = $request->treatment_tablet;
      $encounter->investigations_required = $request->investigations_required;
      $encounter->followup_appointment_date = $request->followup_appointment_date;
      $encounter->new_developments = $request->new_developments;

      $encounter->save();
    //   redirect()->back()->with('Success');
    // return Redirect::back()->with('Success');
    return Redirect::back()->with('message', "Encounter has successfuly been updated.");
    }




    public function show($patientId)
    {
        $data = $this->patientRepository->getPatientAssociatedData($patientId);

        if (! $data) {
            return view('errors.404');
        }

        if (getLoggedinPatient() && checkRecordAccess($data->id)) {
            return view('errors.404');
        } else {
            $advancedPaymentRepo = App::make(AdvancedPaymentRepository::class);
            $patients = $advancedPaymentRepo->getPatients();
            $user = Auth::user();
            if ($user->hasRole('Doctor')) {
                $vaccinationPatients = getPatientsList($user->owner_id);
            } else {
                $vaccinationPatients = Patient::getActivePatientNames();
            }
            $vaccinations = Vaccination::toBase()->pluck('name', 'id')->toArray();
            natcasesort($vaccinations);

            return view('patients.show', compact('data', 'patients', 'vaccinations', 'vaccinationPatients'));
        }
    }

}
