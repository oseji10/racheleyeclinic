<form action="{{ route('encounter.store') }}" method="post">
    @csrf
    <div class="row">


        <div class="form-group col-sm-8 mb-5">
            {{ Form::label('patient', __('messages.encounters.select_patient') . ':', ['class' => 'form-label']) }}
            <select id="patient_id" class="select2 form-select" name="patient_id" data-control="select2" required>
                <option value="">Select Patient</option>
                {{$patient_id = App\Models\Patient::select('patients.user_id', 'users.*')->join('users', 'users.id',
                '=', 'patients.user_id')->get();}}
                @forelse($patient_id as $item)
                <option value="{{$item->user_id}}">ID: {{$item->id}} Name: {{$item->first_name}} {{$item->last_name}} - Phone: {{$item->phone}} -  Email: {{$item->email}}</option>
                @empty
                @endforelse
            </select>
        </div>


        <div class="form-group col-sm-6 mb-5">
        </div>

      
        <div class="d-flex justify-content-start">
            <button class="btn btn-primary me-2" type="submit">{{ __('messages.encounters.continue_button') }}</button>
            <a href="{{ route('encounter.index') }}" class="btn btn-secondary me-2">{{ __('messages.common.cancel')
            }}</a>
        </div>




        {{-- <div class="d-flex justify-content-end">
            {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-2', 'id' => 'saveCaseBtn']) }}
            <a href="{{ route('patient-cases.index') }}" class="btn btn-secondary me-2">{{ __('messages.common.cancel')
                }}</a>
        </div> --}}
        
</form>
