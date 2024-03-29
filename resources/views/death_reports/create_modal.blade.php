<div id="add_death_reports_modal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">{{ __('messages.death_report.new_death_report') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{ Form::open(['id' => 'addDeathReportForm']) }}
            <div class="modal-body">
                <div class="alert alert-danger d-none hide" id="deathReportErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('case_id', __('messages.case.case') . ':', ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::select('case_id', $cases, null, ['class' => 'form-select', 'required', 'id' => 'deathCaseId', 'placeholder' => __('messages.common.choose') . ' ' . __('messages.case.case')]) }}
                    </div>
                    @if (Auth::user()->hasRole('Doctor'))
                        <input type="hidden" name="doctor_id" value="{{ Auth::user()->owner_id }}">
                    @else
                        <div class="form-group col-sm-12 mb-5">
                            {{ Form::label('doctor_name', __('messages.case.doctor') . ':', ['class' => 'form-label']) }}
                            <span class="required"></span>
                            {{ Form::select('doctor_id', $doctors, null, ['class' => 'form-select', 'required', 'id' => 'deathDoctorId', 'placeholder' => __('messages.web_appointment.select_doctor')]) }}
                        </div>
                    @endif
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('date', __('messages.death_report.date') . ':', ['class' => 'form-label']) }}
                        <span class="required"></span>
                        {{ Form::text('date', null, ['id'=>'deathDate', 'class' => (getLoggedInUser()->thememode ? 'bg-light form-control' : 'bg-white form-control'), 'required','autocomplete' => 'off','placeholder'=>__('messages.death_report.date')]) }}
                    </div>
                    <div class="form-group col-sm-12">
                        {{ Form::label('description', __('messages.death_report.description').(':'), ['class' => 'form-label']) }}
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4,'placeholder'=>__('messages.death_report.description')]) }}
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::button(__('messages.common.save'), ['type' => 'submit', 'class' => 'btn btn-primary m-0', 'id' => 'deathReportSave', 'data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                <button type="button" aria-label="Close" class="btn btn-secondary" data-bs-dismiss="modal">
                    {{ __('messages.common.cancel') }}</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
