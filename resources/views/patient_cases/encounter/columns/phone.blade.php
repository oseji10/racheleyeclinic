<div class="d-flex align-items-center mt-2">
    {{ empty($row->patientUser->phone) ? __('messages.common.n/a') : $row->patientUser->phone }}
</div>
