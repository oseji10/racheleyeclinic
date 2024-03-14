<div class="d-flex align-items-center mt-2">
    @if (empty($row->created_at))
        {{ __('messages.common.n/a') }}
    @else
        <span class="badge bg-light-success" style="color:black">{{ $row->created_at }}</span>
    @endif
</div>
