<div id="editIpdChargesModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.ipd_patient_charges.edit_charge') }}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{ Form::open(['id' => 'editIpdChargesForm']) }}
            {{ Form::hidden('currency_symbol', getCurrentCurrency(), ['class' => 'currencySymbol']) }}
            <div class="modal-body">
                @if ($ipdPatientDepartment->bill)
                    <div class="alert alert-warning">
                        <span>{{ __('messages.bill.note_Bill') }}</span>
                    </div>
                @endif
                <div class="alert alert-danger d-none hide" id="editIpdChargeErrorsBox"></div>
                {{ Form::hidden('id', null, ['id' => 'ipdChargesId']) }}
                <div class="row">
                    <div class="form-group col-md-6 mb-5">
                        {{ Form::label('date', __('messages.ipd_patient_charges.date') . ':', ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::text('date', null, ['placeholder'=>__('messages.ipd_patient_charges.date'),'class' => getLoggedInUser()->thememode ? 'bg-light form-control modelDataPickerzindex' : 'bg-white form-control modelDataPickerzindex', 'id' => 'ipdEditChargeDate', 'autocomplete' => 'off', 'required']) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('charge_type_id', __('messages.ipd_patient_charges.charge_type_id') . ':', ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::select('charge_type_id', $chargeTypes, null, ['class' => 'form-select select2Selector', 'id' => 'editIpdChargeTypeId', 'required', 'placeholder' => __('messages.common.choose') . ' ' . __('messages.charge_category.charge_type'), 'data-is-charge-edit' => 1]) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('charge_category_id', __('messages.ipd_patient_charges.charge_category_id') . ':', ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::select('charge_category_id', [null], null, ['placeholder' => __('messages.common.choose') . ' ' . __('messages.ipd_patient_charges.charge_category_id'),'class' => 'form-select select2Selector', 'id' => 'editIpdChargeCategoryId', 'required', 'disabled', 'data-is-charge-edit' => 1]) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('charge_id', __('messages.ipd_patient_charges.charge_id') . ':', ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::select('charge_id', [null], null, ['placeholder' => __('messages.common.choose') . ' ' . __('messages.ipd_patient_charges.charge_id'),'class' => 'form-select select2Selector', 'id' => 'editIpdChargeId', 'required', 'disabled', 'data-is-charge-edit' => 1]) }}
                    </div>
                    <div class="form-group col-md-6 mb-5">
                        <div class="form-group">
                            {{ Form::label('standard_charge', __('messages.ipd_patient_charges.standard_charge') . ':', ['class' => 'form-label']) }}
                            {{ Form::text('standard_charge', null, ['placeholder' =>  __('messages.ipd_patient_charges.standard_charge'),'class' => 'form-control price-input', 'id' => 'editIpdStandardCharge', 'readonly']) }}
                        </div>
                    </div>
                    <div class="form-group col-md-6 mb-5">
                        <div class="form-group">
                            {{ Form::label('applied_charge', __('messages.ipd_patient_charges.applied_charge') . ':', ['class' => 'form-label']) }}
                            (<span id="appliedChargeId"></span>)
                            {{ Form::text('applied_charge', null, ['placeholder' => __('messages.ipd_patient_charges.applied_charge'),'class' => 'form-control price-input', 'id' => 'editIpdAppliedCharge', 'required']) }}
                        </div>
                    </div>
                </div>
                <div class="modal-footer p-0">
                    {{ Form::button(__('messages.common.save'), ['type' => 'submit', 'class' => 'btn btn-primary me-3', 'id' => 'btnEditCharges', 'data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
