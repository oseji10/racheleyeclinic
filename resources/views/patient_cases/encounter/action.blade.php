<div class="d-flex align-items-center">
    <a href="{{ url('encounter'.'/'.$row->patient_id.'') }}" title="{{__('messages.common.view') }}"
        class=" btn px-1 text-primary fs-3 ps-0">
         <i class="fa-solid fa-eye"></i>
     </a>

     <a href="{{ url('print-encounter'.'/'.$row->id.'') }}" title="{{__('messages.common.print') }}"
        class=" btn px-1 text-primary fs-3 ps-0" target="_blank">
         <i class="fa-solid fa-print"></i>
     </a>

    <a href="{{ url('encounter'.'/'.$row->patient_id.'') }}" title="{{__('messages.common.edit') }}"
       class=" btn px-1 text-primary fs-3 ps-0">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <a href="javascript:void(0)" title="{{__('messages.common.reschedule_appointment')}}" data-id="{{ $row->id }}"
       class="delete-patient-case-btn btn px-1 text-primary fs-3 pe-0" wire:key="{{$row->id}}">
        <i class="fa-solid fa-calendar"></i>
    </a>
</div>

