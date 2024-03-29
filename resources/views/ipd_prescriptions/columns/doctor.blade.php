<div class="d-flex align-items-center">
    @if(Auth::user()->hasRole('Patient'))
        <div class="image image-mini me-3">
            <div>
                <img src="{{ $row->patient->doctor->doctorUser->imageUrl }}" alt="" class="user-img image image-circle object-contain"
                     width="35px" height="35px">
            </div>
        </div>
        <div class="d-flex flex-column">
            <span class="mb-1 text-dark text-decoration-none object-contain">{{ $row->patient->doctor->doctorUser->full_name }}</span>
            <span>{{ $row->patient->doctor->doctorUser->email }}</span>
        </div>
    @else
        <div class="image image-circle image-mini me-3">
            <a href="{{ url('doctors',$row->patient->doctor_id) }}">
                <div>
                    <img src="{{ $row->patient->doctor->doctorUser->imageUrl }}"
                         alt=""
                         class="user-img image image-circle object-contain" width="35px" height="35px">
                </div>
            </a>
        </div>
        <div class="d-flex flex-column">
            <a href="{{ url('doctors',$row->patient->doctor_id) }}"
               class="mb-1 text-decoration-none">{{ $row->patient->doctor->doctorUser->full_name}}</a>
            <span>{{ $row->patient->doctor->doctorUser->email }}</span>
        </div>
    @endif
</div>
