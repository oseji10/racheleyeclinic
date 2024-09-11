<div style="overflow-x: auto;">
    <div class="card main-div d-flex flex-xxl-row flex-column-reverse">
        <div class="col-xl-12 p-5 col-xxl-8">
            @php
                $settingValue = getSettingValue();
                $styles = 'style';
            @endphp
            <div {{ $styles }}="border:solid black 1px;border-radius:5px;width:auto;">
                <table class="w-100">
                    <tbody>
                        <div class="d-flex smart-card-header align-items-center"
                            {{ $styles }}="border-radius: 12px 12px 0 0;background-color: {{ !empty($patientIdCardTemplateData->color) ? $patientIdCardTemplateData->color : '' }}">
                            <div class="flex-1 d-flex align-items-center me-3">
                                <div class="logo me-4">
                                    <img src="{{ asset($settingValue['app_logo']['value']) }}" alt="logo"
                                        {{ $styles }}="height:40px" />
                                </div>
                                <h4 class="text-white mb-0 fw-bold">{{ getAppName() }}</h4>
                            </div>
                            <div class="flex-1 text-end">
                                <address class="text-white fs-12 mb-0">
                                    <p class="mb-0">
                                        {{ $settingValue['hospital_address']['value'] }}
                                    </p>
                                </address>
                            </div>
                        </div>
                    </tbody>
                </table>
                <table class="w-100">
                    <tbody>
                        <tr class="d-sm-flex d-md-block flex-md-row flex-column">
                            <td class="patient-card-body" {{ $styles }}="width:20%;">
                                <div class="user-profile pb-5 ms-3">
                                    <a>
                                        <div>
                                            <img src="{{ asset('/assets/img/avatar.png') }}" alt=""
                                                id="card_profilePicture" width="110px"
                                                class="user-img rounded-circle image">
                                        </div>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <table class="table table-borderless patient-desc my-3 ms-2">
                                    <tr>
                                        <td class="text-dark" {{ $styles }}="width:80px;">
                                            {{ __('messages.bill.patient_name') }}:</td>
                                        <td class="text-dark">{{ $patient->first_name }} {{ $patient->last_name }}</td>
                                    </tr>
                                    <tr id="ShowCreateEmail"
                                        class="lh-1 {{ isset($patientIdCardTemplateData) && $patientIdCardTemplateData->email == 0 ? 'd-none' : '' }}">
                                        <td class="text-dark">{{ __('messages.user.email') }}:</td>
                                        <td class="text-dark" {{ $styles }}="word-break: break-all;width:120px;">
                                            {{ $patient->email }}</td>
                                    </tr>
                                    <tr id="ShowCreatePhone"
                                        class="lh-1 {{ isset($patientIdCardTemplateData) && $patientIdCardTemplateData->phone == 0 ? 'd-none' : '' }}">
                                        <td class="text-dark">{{ __('messages.user.phone') }}:</td>
                                        <td class="text-dark">{{ $patient->phone }}</td>
                                    </tr>
                                    <tr id="ShowCreateDob"
                                        class="lh-1 {{ isset($patientIdCardTemplateData) && $patientIdCardTemplateData->dob == 0 ? 'd-none' : '' }}">
                                        <td class="text-dark">{{ __('messages.user.dob') }}:</td>
                                        <td class="text-dark">{{ $patient->dob }}</td>
                                    </tr>
                                    <tr id="ShowCreateBloodGroup"
                                        class="lh-1 {{ isset($patientIdCardTemplateData) && $patientIdCardTemplateData->blood_group == 0 ? 'd-none' : '' }}">
                                        <td class="text-dark">{{ __('messages.user.blood_group') }}:</td>
                                        <td class="text-dark">{{ $patient->blood_group }}</td>
                                    </tr>
                                    <tr id="ShowCreateAddress"
                                        class="lh-1 {{ isset($patientIdCardTemplateData) && $patientIdCardTemplateData->address == 0 ? 'd-none' : '' }}">
                                        <td class="text-dark">{{ __('messages.common.address') }}:</td>
                                        <td class="card_address text-dark">D.No.1 Street name Address</td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <div class="text-center">
                                    <div>
                                        {{ QrCode::generate($patient->id) }}
                                    </div>
                                </div>
                                <h5 class="text-center mt-3 {{ isset($patientIdCardTemplateData) && $patientIdCardTemplateData->patient_unique_id == 0 ? 'd-none' : '' }}"
                                    id="ShowUniqueId">
                                    {{ $patient->id }}
                                </h5>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
