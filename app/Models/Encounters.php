<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;
/**
 * Class Patient
 *
 * @version February 14, 2020, 5:53 am UTC
 *
 * @property int user_id
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User $patientUser
 *
 * @method static Builder|Patient newModelQuery()
 * @method static Builder|Patient newQuery()
 * @method static Builder|Patient query()
 * @method static Builder|Patient whereCreatedAt($value)
 * @method static Builder|Patient whereId($value)
 * @method static Builder|Patient whereUpdatedAt($value)
 * @method static Builder|Patient whereUserId($value)
 *
 * @mixin Model
 *
 * @property int $is_default
 * @property-read \App\Models\Address|null $address
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PatientAdmission[] $admissions
 * @property-read int|null $admissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AdvancedPayment[] $advancedpayments
 * @property-read int|null $advancedpayments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Appointment[] $appointments
 * @property-read int|null $appointments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Bill[] $bills
 * @property-read int|null $bills_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PatientCase[] $cases
 * @property-read int|null $cases_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Document[] $documents
 * @property-read int|null $documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Invoice[] $invoices
 * @property-read int|null $invoices_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\VaccinatedPatients[] $vaccinations
 * @property-read int|null $vaccinations_count
 *
 * @method static Builder|Patient whereIsDefault($value)
 */




class Encounters extends Model
{
    protected $table = 'encounters';
    public $fillable = ['id', 
    'patient_id', 
    'doctor_id', 
    'visual_acuity_far_presenting_left', 
    'visual_acuity_far_presenting_right', 
    'visual_acuity_far_pinhole_left', 
    'visual_acuity_far_pinhole_right', 
    'visual_acuity_far_best_corrected_left', 
    'visual_acuity_far_best_corrected_right', 
    'visual_acuity_near_left', 
    'visual_acuity_near_right', 

    'intraoccular_pressure_left',
    'intraoccular_pressure_right',  
    'chief_complaint_left',
    'chief_complaint_right',
    'other_complaints_left',
    'other_complaints_right', 
    'detailed_history_left', 
    'detailed_history_right', 
    'findings_left',
    'findings_right', 
    'eyelid_left', 
    'eyelid_right', 
    'conjunctiva_left',
    'conjunctiva_right', 
    'cornea_left', 
    'cornea_right', 
    'AC_left', 
    'AC_right', 
    'iris_left', 
    'iris_right', 
    'pupil_left', 
    'pupil_right', 
    'lens_left', 
    'lens_right',
    'vitreous_left',  
    'vitreous_right', 
    'retina_left', 
    'retina_right', 
    'other_findings_left',
    'other_findings_right',

    'free_handwriting_right_front', 
    'free_handwriting_right_back',
    'free_handwriting_left_front',
    'free_handwriting_left_back',

    'sphere_left',
    'sphere_right',
    'cylinder_left',
    'cylinder_right',
    'axis_left',
    'axis_right',
    'prism_left',
    'prism_right',
    'diagnosis',
    'treatment_eyedrop',
    'treatment_tablet',
    'investigations_required',
    'followup_appointment_date',
    'new_developments',
    'temporary_id',
    'is_complete',
    'prescription_id',
    'other_complaints',
    'diagnosis_left_eye',
    'diagnosis_right_eye',
    'external_investigation_required',

    'near_add_right',
    'near_add_left',
    'oct_left',
    'oct_right',
    'ffa_left',
    'ffa_right',
    'fundus_photography_right',
    'fundus_photography_left',
    'pachymetry_right',
    'pachymetry_left',
    'cuft_static_right',
    'cuft_static_left',
    'cuft_kinetic_right',
    'cuft_kinetic_left',
    
    'pupil_distance',
    'frame',
    'lens_type',
    'cost_of_lens',
    'cost_of_frame',
    'payment_status',
    'payment_method',
    
];
    
    
    // public $table = 'patients';

    // public $fillable = [
    //     'user_id',
    //     'patient_unique_id',
    //     'template_id',
    // ];

    const STATUS_ALL = 2;

    const ACTIVE = 1;

    const INACTIVE = 0;

    const STATUS_ARR = [
        self::STATUS_ALL => 'All',
        self::ACTIVE => 'Active',
        self::INACTIVE => 'Deactive',
    ];

    const FILTER_STATUS_ARR = [
        0 => 'All',
        1 => 'Active',
        2 => 'Deactive',
    ];

    protected $casts = [
        'id' => 'integer',
        'patient_id' => 'integer',
    ];

    public static $rules = [
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'email' => 'required|email:filter|unique:users,email',
        'password' => 'required|same:password_confirmation|min:6',
        'gender' => 'required',
        'dob' => 'nullable|date',
        'phone' => 'nullable|numeric',
        'address1' => 'nullable|string',
        'address2' => 'nullable|string',
        'city' => 'nullable|string',
        'zip' => 'nullable|integer',
    ];

    public static function generateUniquePatientId()
    {
        $patientAdmissionId = Str::random(8);
        while (true) {
            $isExist = self::where('patient_unique_id',$patientAdmissionId)->exists();
            if ($isExist) {
                self::generateUniquePatientId();
            }
            break;
        }

        return $patientAdmissionId;
    }

    public static function getActivePatientNames()
    {
        // $patients = DB::table('users')
        //     ->where('status', '=', 1)
        //     ->join('patients', 'users.id', '=', 'patients.user_id')
        //     ->select(['users.first_name', 'users.last_name', 'patients.id'])
        //     ->orderBy('first_name')
        //     ->get();
        // $patientsNames = collect();
        // foreach ($patients as $patient) {
        //     $patientsNames[$patient->id] = ucfirst($patient->first_name).' '.ucfirst($patient->last_name);
        // }

        // return $patientsNames;
    }

    public function prepareData()
    {
        return [
            'id' => $this->id,
            'patient_name' => $this->patientUser->full_name,
        ];
    }

    public function patientUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'owner');
    }

    public function cases(): HasMany
    {
        return $this->hasMany(PatientCase::class, 'patient_id');
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }

    public function admissions(): HasMany
    {
        return $this->hasMany(PatientAdmission::class, 'patient_id');
    }

    public function bills(): HasMany
    {
        return $this->hasMany(Bill::class, 'patient_id');
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class, 'patient_id');
    }

    public function advancedpayments(): HasMany
    {
        return $this->hasMany(AdvancedPayment::class, 'patient_id');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'patient_id');
    }

    public function vaccinations(): HasMany
    {
        return $this->hasMany(VaccinatedPatients::class, 'patient_id');
    }

    public function opd()
    {
        return $this->hasMany(OpdPatientDepartment::class, 'patient_id');
    }

    public function opdDepartment(): HasOne
    {
        return $this->hasOne(OpdPatientDepartment::class, 'patient_id');
    }

    public function idCardTemplate(): BelongsTo
    {
        return $this->belongsTo(PatientIdCardTemplate::class, 'template_id');
    }
}
