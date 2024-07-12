@foreach ($data as $data)
    
@endforeach

@foreach($encounterCounts as $encounterCounts )
@endforeach
<div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-xxl-5 col-12">
                    <div class="d-sm-flex align-items-center mb-5 mb-xxl-0 text-center text-sm-start">
                        <div class="image image-circle image-small">
                            <img src="{{URL::asset( !empty($data->image_url) ? $data->image_url : '' )}}"
                                alt="image" />
                        </div>
                        <div class="ms-0 ms-md-10 mt-5 mt-sm-0">
                            <h2><a href="javascript:void(0)"
                                    class="text-decoration-none">{{ !empty($data->first_name) ? $data->first_name : '' }} {{ !empty($data->last_name) ? $data->last_name : '' }}</a>
                            </h2>

                            <a href="mailto:{{ !empty($data->email) ? $data->email : '' }}"
                                class="text-gray-600 text-decoration-none fs-5">
                                {{ !empty($data->email) ? $data->email : '' }}
                            </a>
                            <span class="d-flex align-items-center me-2 mb-2 mt-2">
                                @if (
                                    !empty($data->address1) ||
                                        !empty($data->address2) ||
                                        !empty($data->city) ||
                                        !empty($data->zip))
                                    <span><i class="fas fa-location"></i></span>
                                @endif
                                <span class="p-2">
                                    {{ !empty($data->address1) ? $data->address1 : '' }}{{ !empty($data->address2) ? (!empty($data->address1) ? ',' : '') : '' }}
                                    {{ empty($data->address1) || !empty($data->address2) ? (!empty($data->address2) ? $data->address2 : '') : '' }}
                                    {{ empty($data->address1) && empty($data->address2) ? '' : '' }}{{ !empty($data->city) ? ',' . $data->city : '' }}{{ !empty($data->zip) ? ',' . $data->zip : '' }}
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="col-xxl-7 col-12">
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-sm-6 col-12 mb-6 mb-md-0">
                            <div class="border rounded-10 p-5 h-100">
                                <h2 class="text-primary mb-3">{{ !empty($encounterCounts->encounter_count) ? $encounterCounts->encounter_count : 0 }}
                                </h2>
                                <h3 class="fs-5 fw-light text-gray-600 mb-0">{{ __('messages.encounters.total_encounters') }}
                                </h3>
                            </div>
                        </div>
                    
                
                        {{-- <div class="col-md-4 col-sm-6 col-12 mb-6 mb-md-0">
                            <div class="border rounded-10 p-5 h-100">
                                <h2 class="text-primary mb-3">
                                    {{ !empty($data->admissions) ? $data->admissions->count() : 0 }}</h2>
                                <h3 class="fs-5 fw-light text-gray-600 mb-0">
                                    {{ __('messages.patient.total_admissions') }}</h3>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12 mb-6 mb-md-0">
                            <div class="border rounded-10 p-5 h-100">
                                <h2 class="text-primary mb-3">
                                    {{ !empty($data->appointments) ? $data->appointments->count() : 0 }}</h2>
                                <h3 class="fs-5 fw-light text-gray-600 mb-0">
                                    {{ __('messages.patient.total_appointments') }}</h3>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-7 overflow-hidden">
        <ul class="nav nav-tabs mb-5 pb-1 overflow-auto flex-nowrap text-nowrap">
            <li class="nav-item position-relative me-7 mb-3">
                <a class="nav-link active p-0" data-bs-toggle="tab"
                    href="#PatientOverview">{{ __('messages.overview') }}</a>
            </li>
            <li class="nav-item position-relative me-7 mb-3">
                <a class="nav-link p-0" data-bs-toggle="tab" href="#showPatientCases">{{ __('messages.encounters.page_title') }}</a>
            </li>
            <li class="nav-item position-relative me-7 mb-3">
                <a class="nav-link p-0" data-bs-toggle="tab"
                    href="#showVisualAcuity">{{ __('messages.case.visual_acuity') }}</a>
            </li>
            
            <li class="nav-item position-relative me-7 mb-3">
                <a class="nav-link p-0" data-bs-toggle="tab"
                    href="#showOtherInfo">{{ __('messages.case.other_info') }}</a>
            </li>
            <li class="nav-item position-relative me-7 mb-3">
                <a class="nav-link p-0" data-bs-toggle="tab" href="#showRefraction">{{ __('messages.case.refraction') }}</a>
            </li>
            <li class="nav-item position-relative me-7 mb-3">
                <a class="nav-link p-0" data-bs-toggle="tab"
                    href="#showFreehand">{{ __('messages.case.freehand') }}</a>
            </li>
            {{-- <li class="nav-item position-relative me-7 mb-3">
                <a class="nav-link p-0" data-bs-toggle="tab"
                    href="#showPatientAdvancedPayments">{{ __('messages.advanced_payments') }}</a>
            </li>
            <li class="nav-item position-relative me-7 mb-3">
                <a class="nav-link p-0" data-bs-toggle="tab"
                    href="#showPatientDocument">{{ __('messages.documents') }}</a>
            </li>
            <li class="nav-item position-relative me-7 mb-3">
                <a class="nav-link p-0" data-bs-toggle="tab"
                    href="#showPatientVaccinated">{{ __('messages.vaccinations') }}</a>
            </li> --}}
        </ul>
    </div>
</div>
<div class="tab-content" id="myPatientTabContent">
    <div class="tab-pane fade show active" id="PatientOverview" role="tabpanel">
        <div class="card mb-5 mb-xl-10">
            <div>
                <div class="card-body  border-top p-9">
                    <div class="row">
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.user.phone') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($data->phone) ? $data->phone : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.user.gender') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($data->phone) ? ($data->gender != 1 ? __('messages.user.male') : __('messages.user.female')) : '' }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.user.blood_group') }}</label>
                            <p>
                                @if (!empty($data->blood_group))
                                    <span
                                        class="badge fs-6 bg-light-{{ !empty($data->blood_group) ? 'success' : 'danger' }}">
                                        {{ $data->blood_group }} </span>
                                @else
                                    <span class="fs-5 text-gray-800">{{ __('messages.common.n/a') }}</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name" class="pb-2 fs-5 text-gray-600">{{ __('messages.user.dob') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($data->dob) ? \Carbon\Carbon::parse($data->dob)->translatedFormat('jS M, Y') : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                 
                    </div>
                </div>
            </div>
        </div>
    </div>


@php
       $visual_acuity = App\Models\Encounters::select('encounters.*', 
    'encounters.intraoccular_pressure_right as iopr',
    'encounters.intraoccular_pressure_left as iopl',
    'detailed_history_right as dhr',
    'detailed_history_left as dhl',
    'encounters.chief_complaint_right as ccr',
    'encounters.chief_complaint_left as ccl',
    'encounters.findings_right as fr',
    'encounters.findings_left as fl',
    'eyelid_right as eyelid_fright',
    'eyelid_left as eyelid_left',
    'conjunctiva_right as conjunctiva_right',
    'conjunctiva_left as conjunctiva_left',
    'cornea_right as cornea_right',
    'cornea_left as cornea_left',
    'AC_right as AC_right',
    'AC_left as AC_left',
    'iris_right as iris_right',
    'iris_left as iris_left',
    'pupil_right as pupil_right',
    'pupil_left as pupil_left',
    'lens_right as lens_right',
    'lens_left as lens_left',
    'vitreous_right as vitreous_right',
    'vitreous_left as vitreous_left',
    'retina_right as retina_right',
    'retina_left as retina_left',
    'other_findings_right as other_findings_right',
    'other_findings_left as other_findings_left',

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

    

    'free_handwriting_left_front as free_handwriting_left_front',
      'free_handwriting_left_back as free_handwriting_left_back',
      'free_handwriting_right_front as free_handwriting_right_front',
      'free_handwriting_right_back as free_handwriting_right_back',


     
     
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
    // ->leftjoin('visual_acuity as free_handwriting_right', 'free_handwriting_right.id', '=', 'encounters.free_handwriting_right')
    // ->leftjoin('visual_acuity as free_handwriting_left', 'free_handwriting_left.id', '=', 'encounters.free_handwriting_left')
    // // ->left('visual_acuity', 'visual_acuity.id', '=', 'encounters.')
    
    
    ->where('encounters.id', $data->encounter_id)
    
    ->first();
@endphp
        <div class="tab-pane fade" id="showVisualAcuity" role="tabpanel">
        <div class="card mb-5 mb-xl-10">
            <div>
                <div class="card-body  border-top p-9">
                    <div class="row">
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.visual_acuity_far_presenting_right') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->vafpr) ? $visual_acuity->vafpr : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.visual_acuity_far_presenting_left') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->vafpl) ? $visual_acuity->vafpl : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.visual_acuity_far_pinhole_right') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->vafpinr) ? $visual_acuity->vafpinr : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.visual_acuity_far_pinhole_left') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->vafpl) ? $visual_acuity->vafpl : __('messages.common.n/a') }}</span>
                            </p>
                        </div>

                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.visual_acuity_far_best_corrected_right') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->vafbcr) ? $visual_acuity->vafbcr : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.visual_acuity_far_best_corrected_left') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->vafbcl) ? $visual_acuity->vafbcl : __('messages.common.n/a') }}</span>
                            </p>
                        </div>

                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.visual_acuity_near_right') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->vanr) ? $visual_acuity->vanr : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.visual_acuity_near_left') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->vanl) ? $visual_acuity->vanl : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                 
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="tab-pane fade" id="showOtherInfo" role="tabpanel">
        <div class="card mb-5 mb-xl-10">
            <div>
                <div class="card-body  border-top p-9">
                    <div class="row">
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.intraoccular_pressure_right') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->iopr) ? $visual_acuity->iopr : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.intraoccular_pressure_left') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->iopl) ? $visual_acuity->iopl : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.chief_complaint_right') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->ccr) ? $visual_acuity->ccr : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.chief_complaint_left') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->ccl) ? $visual_acuity->ccl : __('messages.common.n/a') }}</span>
                            </p>
                        </div>

                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.detailed_history_right') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->dhr) ? $visual_acuity->dhr : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.detailed_history_left') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->dhl) ? $visual_acuity->dhl : __('messages.common.n/a') }}</span>
                            </p>
                        </div>

                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.findings_right') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->fr) ? $visual_acuity->fr : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.findings_left') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->fl) ? $visual_acuity->fl : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                 

                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.eyelid_right') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->eyelid_right) ? $visual_acuity->eyelid_right : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.eyelid_left') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->eyelid_left) ? $visual_acuity->eyelid_left : __('messages.common.n/a') }}</span>
                            </p>
                        </div>


                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.conjunctiva_right') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->conjunctiva_right) ? $visual_acuity->conjunctiva_right : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.conjunctiva_left') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->conjunctiva_left) ? $visual_acuity->conjunctiva_left : __('messages.common.n/a') }}</span>
                            </p>
                        </div>


                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.cornea_right') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->cornea_right) ? $visual_acuity->cornea_right : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.cornea_left') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->cornea_left) ? $visual_acuity->cornea_left : __('messages.common.n/a') }}</span>
                            </p>
                        </div>

                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.AC_right') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->AC_right) ? $visual_acuity->AC_right : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.AC_left') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->AC_left) ? $visual_acuity->AC_left : __('messages.common.n/a') }}</span>
                            </p>
                        </div>


                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.iris_right') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->iris_right) ? $visual_acuity->iris_right : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.iris_left') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->iris_left) ? $visual_acuity->iris_left : __('messages.common.n/a') }}</span>
                            </p>
                        </div>



                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.pupil_right') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->pupil_right) ? $visual_acuity->pupil_right : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.pupil_left') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->pupil_left) ? $visual_acuity->pupil_left : __('messages.common.n/a') }}</span>
                            </p>
                        </div>


                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.lens_right') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->lens_right) ? $visual_acuity->lens_right : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.lens_left') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->lens_left) ? $visual_acuity->lens_left : __('messages.common.n/a') }}</span>
                            </p>
                        </div>


                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.vitreous_right') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->vitreous_right) ? $visual_acuity->vitreous_right : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.vitreous_left') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->vitreous_left) ? $visual_acuity->vitreous_left : __('messages.common.n/a') }}</span>
                            </p>
                        </div>


                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.retina_right') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->retina_right) ? $visual_acuity->retina_right : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.retina_left') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->retina_left) ? $visual_acuity->retina_left : __('messages.common.n/a') }}</span>
                            </p>
                        </div>


                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.other_findings_right') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->other_findings_right) ? $visual_acuity->other_findings_right : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.other_findings_left') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->other_findings_left) ? $visual_acuity->other_findings_left : __('messages.common.n/a') }}</span>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>






{{-- Reraction --}}
    <div class="tab-pane fade" id="showRefraction" role="tabpanel">
        <div class="card mb-5 mb-xl-10">
            <div>
                <div class="card-body  border-top p-9">
                    <div class="row">
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.sphere_right') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->sphere_right) ? $visual_acuity->sphere_right : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.sphere_left') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->sphere_left) ? $visual_acuity->sphere_left : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.cylinder_right') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->cylinder_right) ? $visual_acuity->cylinder_right : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.cylinder_left') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->cylinder_left) ? $visual_acuity->cylinder_left : __('messages.common.n/a') }}</span>
                            </p>
                        </div>

                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.axis_right') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{!! !empty($visual_acuity->axis_right) ? $visual_acuity->axis_right : __('messages.common.n/a') !!}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.axis_left') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{!! !empty($visual_acuity->axis_left) ? $visual_acuity->axis_left : __('messages.common.n/a') !!}</span>
                            </p>
                        </div>

                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.prism_right') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->prism_right) ? $visual_acuity->prism_right : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.prism_left') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800">{{ !empty($visual_acuity->prism_left) ? $visual_acuity->prism_left : __('messages.common.n/a') }}</span>
                            </p>
                        </div>
                 
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- Freehandwriting --}}
    <div class="tab-pane fade" id="showFreehand" role="tabpanel">
        <div class="card mb-5 mb-xl-10">
            <div>
                <div class="card-body  border-top p-9">
                    <div class="row">
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.free_handwriting_right_front') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800"><img src="{{ $visual_acuity->free_handwriting_right_front }}" /></span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.free_handwriting_left_front') }}</label>
                            <p>
                                <span
                                class="fs-5 text-gray-800"><img src="{{ $visual_acuity->free_handwriting_left_front }}" /></span>
                            </p>
                        </div>
                   </div>

                   <div class="row">
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.free_handwriting_right_back') }}</label>
                            <p>
                                <span
                                    class="fs-5 text-gray-800"><img src="{{ $visual_acuity->free_handwriting_right_back }}" />
                                    <!-- <img src="{{ $visual_acuity->free_handwriting_right_back }}" /> -->
                                    <img src="{{ asset($visual_acuity->free_handwriting_right_back) }}" alt="Image">
                                    <img src="{{ asset('uploads/uploads/canvas_images/canvas_front_668fb526208aa.png') }}" alt="Image">

                                </span>
                            </p>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-5 text-gray-600">{{ __('messages.case.free_handwriting_left_back') }}</label>
                                
                            <p>
                                <span
                                class="fs-5 text-gray-800"><img src="{{ $visual_acuity->free_handwriting_left_back}}" /></span>
                            </p>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>


    <div class="tab-pane fade" id="showPatientCases" role="tabpanel">
        <livewire:patient-encounter-table patientId="{{ $data->patient_id }}" />
    </div>
    {{-- <div class="tab-pane fade" id="showVisualAcuity" role="tabpanel">
        <livewire:patient-admission-detail-table patientId="{{ $data->id }}" />
    </div> --}}
    {{-- <div class="tab-pane fade" id="showPatientAppointments" role="tabpanel">
        <livewire:patient-appoinment-detail-table patientId="{{ $data->id }}" />
    </div>
    <div class="tab-pane fade" id="showPatientBills" role="tabpanel">
        <livewire:patient-bill-detail-table patientId="{{ $data->id }}" />
    </div>
    <div class="tab-pane fade" id="showPatientInvoices" role="tabpanel">
        <livewire:patient-invoice-detail-table patientId="{{ $data->id }}" />
    </div>
    <div class="tab-pane fade" id="showPatientAdvancedPayments" role="tabpanel">
        <livewire:patient-advance-payment-detail-table patient-id="{{ $data->id }}" />
    </div>
    <div class="tab-pane fade" id="showPatientDocument" role="tabpanel">
        <livewire:patient-document-table patient-id="{{ $data->id }}" />
    </div>
    <div class="tab-pane fade" id="showPatientVaccinated" role="tabpanel">
        <livewire:patient-vaccination-detail-table patient-id="{{ $data->id }}" />
    </div> --}}
</div>
{{-- @endisset --}}