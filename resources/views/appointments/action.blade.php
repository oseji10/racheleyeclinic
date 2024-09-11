@if (!$row->is_completed == 3)
    <a data-bs-toggle="tooltip" data-placement="top" data-bs-original-title="{{ __('messages.common.cancel') }}"
       data-id="{{ $row->id }}"
       class="cancel-appointment btn px-1 text-danger fs-3 pe-0 {{ $row->is_completed == 1 ? 'd-none' : '' }}">
        <i class="far fa-calendar-times {{ $row->is_completed == 1 ? 'text-danger' : '' }}"></i>
    </a>
@endif
@if (!getLoggedinPatient() && $row->is_completed == 0)
    <a title="{{ __('messages.common.confirm') }}" data-id="{{ $row->id }}"
    class="appointment-complete-status btn px-1 text-primary fs-3 pe-0">
        <i class="far fa-calendar-check"></i>
    </a>
@endif
@if (Auth::user()->hasRole('Admin|Doctor'))
    @if ($row->is_completed == 0 || $row->is_completed == 1)
        <a href="{{ route('appointments.edit',['appointment' => $row->id])}}" title="{{__('messages.common.edit') }}"
        class="btn px-1 text-primary fs-3 ps-0">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
    @endif
@endif


@if (Auth::user()->hasRole('Admin|Doctor'))
    @if ($row->is_completed == 0 || $row->is_completed == 1)
        <a href="{{ route('encounter_patient.show',['patient' => $row->patient_id])}}" title="{{__('messages.common.new_encounter') }}"
        class="btn px-1 text-primary fs-3 ps-0">
            <i class="fa-solid fa-user-doctor"></i>
        </a>
    @endif
@endif