<div id="edit_operations_reports_modal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.operation_report.edit_operation_report') }}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{ Form::open(['id' => 'editOperationReportsForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none hide" id="editOperationErrorsBox"></div>
                <div class="row">
                    {{ Form::hidden('operation_report_id', null, ['id' => 'operationReportId']) }}
                    <div class="col-md-12">
                        <div class="form-group mb-5">
                            {{ Form::label('case_id', __('messages.case.case') . ':', ['class' => 'form-label']) }}
                            <span class="required"></span>
                            {{ Form::select('case_id', $cases, null, ['class' => 'form-select', 'required', 'id' => 'editOperationCaseId', 'placeholder' => __('messages.common.choose') . ' ' . __('messages.case.case')]) }}
                        </div>
                    </div>
                    @if (Auth::user()->hasRole('Doctor'))
                        <input type="hidden" name="doctor_id" value="{{ Auth::user()->owner_id }}">
                    @else
                        <div class="col-md-12">
                            <div class="form-group mb-5">
                                {{ Form::label('doctor_id', __('messages.case.doctor') . ':', ['class' => 'form-label']) }}
                                <span class="required"></span>
                                {{ Form::select('doctor_id', $doctors, null, ['class' => 'form-select', 'required', 'id' => 'editOperationDoctorId', 'placeholder' => __('messages.web_appointment.select_doctor')]) }}
                            </div>
                        </div>
                    @endif
                    <div class="col-md-12">
                        <div class="form-group mb-5">
                            {{ Form::label('date', __('messages.operation_report.date') . ':', ['class' => 'form-label']) }}
                            <span class="required"></span>
                            {{ Form::text('date', null, ['placeholder'=>__('messages.operation_report.date'),'class' => getLoggedInUser()->thememode ? 'bg-light form-control' : 'bg-white form-control', 'required', 'id' => 'editOperationDate', 'autocomplete' => 'off']) }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-5">
                            {{ Form::label('description', __('messages.operation_report.description') . ':', ['class' => 'form-label']) }}
                            {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'editOperationDescription', 'rows' => 5,'placeholder'=>__('messages.operation_report.description')]) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::button(__('messages.common.save'), ['type' => 'submit', 'class' => 'btn btn-primary m-0', 'id' => 'editOperationSave', 'data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
