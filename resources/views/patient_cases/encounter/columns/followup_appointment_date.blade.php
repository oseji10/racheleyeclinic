<div class="d-flex align-items-center mt-2">
    @if (empty($row->followup_appointment_date))
        {{ __('messages.common.n/a') }}
    @else
        <span class="badge bg-light-warning" style="color:black">{{ $row->followup_appointment_date }}</span>
    @endif
</div>
