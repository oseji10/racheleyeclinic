<div class="d-flex align-items-center">
    <div class="image image-mini me-3">
        <a href="{{ url('encounter'.'/'.$row->patient_id.'') }}">
            <img src="{{$row->patientUser->image_url}}" alt="user" class="user-img image rounded-circle object-contain">
        </a>
    </div>
    <div class="d-flex flex-column">
        <a href="{{ url('encounter'.'/'.$row->patient_id.'') }}" class="mb-1 text-decoration-none fs-6">
            {{$row->patientUser->full_name}}
        </a>
        <span class="fs-6">{{$row->patientUser->email}}</span>
    </div>
</div>
