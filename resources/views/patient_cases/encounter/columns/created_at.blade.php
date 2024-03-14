<div class="d-flex align-items-center mt-2">
    @if (empty($row->created_at))
        {{ __('messages.common.n/a') }}
    @else
    <?php $carbonDate = \Carbon\Carbon::parse($row->created_at); ?>
    {{-- Format the date as "Monday 12th March, 2024" --}}
    <span class="badge bg-light-success" style="color:black">{{ $carbonDate->format('l jS F, Y') }}</span>

        {{-- <span class="badge bg-light-success" style="color:black">{{ $row->created_at }}</span> --}}
    @endif
</div>
