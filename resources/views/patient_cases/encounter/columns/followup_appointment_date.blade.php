<div class="d-flex align-items-center mt-2">
    @if (empty($row->followup_appointment_date))
        {{ __('messages.common.n/a') }}
    @else
        {{-- Convert the date to a Carbon instance --}}
        <?php $carbonDate = \Carbon\Carbon::parse($row->followup_appointment_date); ?>
        {{-- Format the date as "Monday 12th March, 2024" --}}
        <span class="badge bg-light-warning" style="color:black">{{ $carbonDate->format('l jS F, Y') }} at {{ $carbonDate->format('h:i A') }}</span>
    @endif
</div>
