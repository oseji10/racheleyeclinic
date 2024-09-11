<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'El :attribute debe ser aceptado.',
    'active_url' => 'El :attribute no es una URL válida.',
    'after' => 'El :attribute debe ser una fecha después de :date.',
    'after_or_equal' => 'El :attribute debe ser una fecha posterior o igual a :date.',
    'alpha' => 'El :attribute solo puede contener letras.',
    'alpha_dash' => 'El :attribute solo puede contener letras, números, guiones y guiones bajos.',
    'alpha_num' => 'El :attribute solo puede contener letras y números.',
    'array' => 'El :attribute debe ser una matriz.',
    'before' => 'El :attribute debe ser una fecha anterior a :date.',
    'before_or_equal' => 'El :attribute debe ser una fecha anterior a :date',
    'between' => [
        'numeric' => 'El :attribute debe estar entre :min y :max.',
        'file' => 'El :attribute debe estar entre :min y :max kilobytes.',
        'string' => 'El :attribute debe estar entre :min y :max caracteres.',
        'array' => 'El :attribute debe tener entre :min y :max items.',
    ],
    'boolean' => 'El campo: :attribute debe ser verdadero o falso.',
    'confirmed' => 'La confirmación de :attribute no coincide.',
    'date' => 'El :attribute no es una fecha válida.',
    'date_equals' => 'El :attribute debe ser una fecha igual a :date.',
    'date_format' => 'El :attribute no coincide con el formato :format.',
    'different' => 'El :attribute y :otro deben ser diferentes.',
    'digits' => 'El :attribute debe ser :dígitos dígitos.',
    'digits_between' => 'El :attribute debe estar entre :min y dígitos :max imos.',
    'dimensions' => 'El :attribute tiene dimensiones de imagen no válidas.',
    'distinct' => 'El campo :attribute tiene un valor duplicado.',
    'email' => 'El :attribute debe ser una dirección de correo electrónico válida.',
    'ends_with' => 'El :attribute debe terminar con uno de los siguientes :values.',
    'exists' => 'El :attribute seleccionado: no es válido.',
    'file' => 'El :attribute debe ser un archivo.',
    'filled' => 'El campo :attribute debe tener un valor.',
    'gt' => [
        'numeric' => 'El :attribute debe ser mayor que :value.',
        'file' => 'El :attribute debe ser mayor que :value kilobytes.',
        'string' => 'El :attribute debe ser mayor que caracteres de :value.',
        'array' => 'El :attribute debe tener más de elementos de :value.',
    ],
    'gte' => [
        'numeric' => 'El :attribute debe ser mayor o igual que :value.',
        'file' => 'El :attribute debe ser mayor o igual :value kilobytes.',
        'string' => 'El :attribute debe ser mayor o igual que caracteres de :value.',
        'array' => 'El :attribute debe tener elementos de :valor o más.',
    ],
    'image' => 'El :attribute debe ser una imagen.',
    'in' => 'El :attribute seleccionado: no es válido.',
    'in_array' => 'El campo :attribute no existe en :other.',
    'integer' => 'El: :attribute debe ser un entero.',
    'ip' => 'El: :attribute debe ser una dirección IP válida.',
    'ipv4' => 'El: :attribute debe ser una dirección IPv4 válida.',
    'ipv6' => 'El: :attribute debe ser una dirección IPv6 válida.',
    'json' => 'El :attribute debe ser una cadena JSON válida.',
    'lt' => [
        'numeric' => 'El :attribute debe ser menor que :value.',
        'file' => 'El :attribute debe ser menor que :value kilobytes.',
        'string' => 'El :attribute debe ser menor que caracteres de :value.',
        'array' => 'El :attribute debe tener menos de elementos de :value.',
    ],
    'lte' => [
        'numeric' => 'El :attribute debe ser menor o igual que :value.',
        'file' => 'El :attribute debe ser menor o igual :value kilobytes.',
        'string' => 'El :attribute debe ser menor o igual que caracteres de :value.',
        'array' => 'El :attribute no debe tener más de elementos de :value.',
    ],
    'max' => [
        'numeric' => 'El :attribute no puede ser mayor que :max.',
        'file' => 'El :attribute no puede ser mayor que: kilobytes :max imos.',
        'string' => 'El :attribute no puede ser mayor que: caracteres :max imos.',
        'array' => 'El :attribute no puede tener más de: elementos :max imos.',
    ],
    'mimes' => 'El :attribute debe ser un archivo de tipo :values.',
    'mimetypes' => 'El :attribute debe ser un archivo de tipo :values.',
    'min' => [
        'numeric' => 'El :attribute debe ser al menos :min.',
        'file' => 'El :attribute debe ser al menos :min kilobytes.',
        'string' => 'El :attribute debe tener al menos caracteres :min.',
        'array' => 'El :attribute debe tener al menos elementos :min imos.',
    ],
    'not_in' => 'El :attribute seleccionado: no es válido.',
    'not_regex' => 'El formato del :attribute no es válido.',
    'numeric' => 'El :attribute debe ser un número.',
    'password' => 'La contraseña es incorrecta.',
    'present' => 'El campo de :attribute debe estar presente.',
    'regex' => 'El formato del :attribute no es válido.',
    'required' => 'El campo de :attribute es obligatorio.',
    'required_if' => 'El campo: :attribute es obligatorio cuando :other es :value.',
    'required_unless' => 'El campo: :attribute es obligatorio a menos que :other esté en :values.',
    'required_with' => 'El campo: :attribute es obligatorio cuando :values están presentes.',
    'required_with_all' => 'El campo: :attribute es obligatorio cuando los :values están presentes.',
    'required_without' => 'El campo: :attribute es obligatorio cuando los :values no están presentes.',
    'required_without_all' => 'El campo: :attribute es obligatorio cuando ninguno de los :values está presente.',
    'same' => 'El :attribute y :other deben coincidir.',
    'size' => [
        'numeric' => 'El :attribute debe ser: size.',
        'file' => 'El :attribute debe ser: size kilobytes.',
        'string' => 'El :attribute debe ser caracteres de :size.',
        'array' => 'El :attribute debe contener artículos de :size.',
    ],
    'starts_with' => 'El :attribute debe comenzar con uno de los siguientes :values.',
    'string' => 'El: :attribute debe ser una cadena.',
    'timezone' => 'El: :attribute debe ser una zona válida.',
    'unique' => 'El :attribute ya se ha tomado.',
    'uploaded' => 'El :attribute no se pudo cargar.',
    'url' => 'El formato del :attribute no es válido.',
    'uuid' => 'El: :attribute debe ser un UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'mensaje personalizado',
        ],

        //doctor opd charge keys
        'doctor_id' => [
            'unique' => 'El nombre del médico ya ha sido tomado.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'email' => __('messages.user.email'),
        'last_name' => __('messages.user.last_name'),
        'first_name' => __('messages.user.first_name'),
        'password' => __('messages.department'),
        'gender' => __('messages.user.gender'),
        'city' => __('messages.user.city'),
        'zip' => __('messages.user.zip'),
        'name' => __('messages.common.name'),
        'status' => __('messages.account.status'),
        'description' => __('messages.account.description'),
        'patient_id' => __('messages.invoice.patient_id'),
        'receipt_no' => __('messages.advanced_payment.receipt_no'),
        'amount' => __('messages.advanced_payment.amount'),
        'date' => __('messages.advanced_payment.date'),
        'vehicle_number' => __('messages.ambulance.vehicle_number'),
        'vehicle_model' => __('messages.ambulance.vehicle_model'),
        'driver_contact' => __('messages.ambulance.driver_contact'),
        'year_made' => __('messages.ambulance.year_made'),
        'driver_license' => __('messages.ambulance.driver_license'),
        'doctor_id' => __('messages.ipd_patient.doctor_id'),
        'opd_date' => __('messages.appointment.opd_date'),
        'bed_type' => __('messages.bed.bed_type'),
        'charge' => __('messages.bed.charge'),
        'bed_id' => __('messages.bed.bed_id'),
        'case_id' => __('messages.bed_assign.case_id'),
        'assign_date' => __('messages.bed_assign.assign_date'),
        'discharge_date' => __('messages.bed_assign.discharge_date'),
        'title' => __('messages.document.title'),
        'bill_date' => __('messages.bill.bill_date'),
        'qty' => __('messages.bill.qty'),
        'price' => __('messages.bill.price'),
        'blood_group' => __('messages.user.blood_group'),
        'remained_bags' => __('messages.hospital_blood_bank.remained_bags'),
        'bags' => __('messages.blood_donation.bags'),
        'last_donate_date' => __('messages.blood_donation.last_donate_date'),
        'issue_date' => __('messages.blood_issue.issue_date'),
        'remarks' => __('messages.blood_issue.remarks'),
        'charge_type' => __('messages.charge_category.charge_type'),
        'code' => __('messages.charge.code'),
        'standard_charge' => __('messages.charge.standard_charge'),
        'currency_name' => __('messages.currency.currency_name'),
        'currency_code' => __('messages.currency.currency_code'),
        'currency_icon' => __('messages.currency.currency_icon'),
        'sr_no' => __('messages.employee_payroll.sr_no'),
        'payroll_id' => __('messages.employee_payroll.payroll_id'),
        'type' => __('messages.account.type'),
        'month' => __('messages.employee_payroll.month'),
        'year' => __('messages.employee_payroll.year'),
        'net_salary' => __('messages.employee_payroll.net_salary'),
        'basic_salary' => __('messages.employee_payroll.basic_salary'),
        'message' => __('messages.enquiry.message'),
        'expense_head' => __('messages.expense.expense_head'),
        'invoice_number' => __('messages.expense.invoice_number'),
        'short_description' => __('messages.short_description'),
        'about_us_title' => __('messages.front_setting.about_us_title'),
        'about_us_mission' => __('messages.front_setting.about_us_mission'),
        'about_us_image' => __('messages.front_setting.about_us_image'),
        'income_head' => __('messages.incomes.income_head'),
        'service_tax' => __('messages.insurance.service_tax'),
        'insurance_no' => __('messages.insurance.insurance_no'),
        'insurance_code' => __('messages.insurance.insurance_code'),
        'discount' => __('messages.insurance.discount'),
        'disease_name' => __('messages.insurance.diseases_name'),
        'disease_charge' => __('messages.insurance.diseases_charge'),
        'invoice_date' => __('messages.invoice.invoice_date'),
        'quantity' => __('messages.service.quantity'),
        'total_payments' => __('messages.dashboard.total_payments'),
        'gross_total' => __('messages.ipd_bill.gross_total'),
        'discount_in_percentage' => __('messages.ipd_bill.discount_in_percentage'),
        'tax_in_percentage' => __('messages.ipd_bill.tax_in_percentage'),
        'other_charges' => __('messages.ipd_bill.other_charges'),
        'net_payable_amount' => __('messages.ipd_bill.net_payable_amount'),
        'charge_type_id' => __('messages.ipd_patient_charges.charge_type_id'),
        'charge_category_id' => __('messages.ipd_patient_charges.charge_category_id'),
        'charge_id' => __('messages.ipd_patient_charges.charge_id'),
        'applied_charge' => __('messages.ipd_patient_charges.applied_charge'),
        'instruction' => __('messages.ipd_patient_consultant_register.instruction'),
        'instruction_date' => __('messages.ipd_patient_consultant_register.instruction_date'),
        'report_type' => __('messages.ipd_patient_diagnosis.report_type'),
        'report_date' => __('messages.ipd_patient_diagnosis.report_date'),
        'bed_type_id' => __('messages.ipd_patient.bed_type_id'),
        'weight' => __('messages.ipd_patient.weight'),
        'height' => __('messages.ipd_patient.height'),
        'bp' => __('messages.ipd_patient.bp'),
        'payment_mode' => __('messages.ipd_payments.payment_mode'),
        'notes' => __('messages.document.notes'),
        'category_id' => __('messages.ipd_patient_prescription.category_id'),
        'issued_by' => __('messages.issued_item.issued_by'),
        'issued_date' => __('messages.issued_item.issued_date'),
        'return_date' => __('messages.issued_item.return_date'),
        'unit' => __('messages.item.unit'),
        'consultation_title' => __('messages.live_consultation.consultation_title'),
        'consultation_date' => __('messages.live_consultation.consultation_date'),
        'consultation_duration_minutes' => __('messages.live_consultation.consultation_duration_minutes'),
        'type_number' => __('messages.live_consultation.type_number'),
        'to' => __('messages.common.to'),
        'subject' => __('messages.email.subject'),
        'selling_price' => __('messages.medicine.selling_price'),
        'buying_price' => __('messages.medicine.buying_price'),
        'side_effects' => __('messages.medicine.side_effects'),
        'salt_composition' => __('messages.medicine.salt_composition'),
        'appointment_date' => __('messages.opd_patient.appointment_date'),
        'rate' => __('messages.package.rate'),
        'test_name' => __('messages.radiology_test.test_name'),
        'short_name' => __('messages.radiology_test.short_name'),
        'test_type' => __('messages.radiology_test.test_type'),
        'policy_no' => __('messages.patient_admission.policy_no'),
        'fee' => __('messages.case.fee'),
        'payment_date' => __('messages.payment.payment_date'),
        'pay_to' => __('messages.payment.pay_to'),
        'from_title' => __('messages.postal.from_title'),
        'to_title' => __('messages.postal.to_title'),
        'reference_no' => __('messages.postal.reference_no'),
        'subcategory' => __('messages.radiology_test.subcategory'),
        'available_on' => __('messages.schedule.available_on'),
        'available_from' => __('messages.schedule.available_from'),
        'available_to' => __('messages.schedule.available_to'),
        'per_patient_time' => __('messages.schedule.per_patient_time'),
        'app_name' => __('messages.setting.app_name'),
        'company_name' => __('messages.setting.company_name'),
        'favicon' => __('messages.setting.favicon'),
        'zoom_api_key' => __('messages.live_consultation.zoom_api_key'),
        'zoom_api_secret' => __('messages.live_consultation.zoom_api_secret'),
        'dose_given_date' => __('messages.vaccinated_patient.dose_given_date'),
        'manufactured_by' => __('messages.vaccination.manufactured_by'),
        'brand' => __('messages.vaccination.brand'),
        'purpose' => __('messages.visitor.purpose'),
        'no_of_person' => __('messages.visitor.number_of_person'),
        'in_time' => __('messages.visitor.in_time'),
        'out_time' => __('messages.visitor.out_time'),
    ],

];
