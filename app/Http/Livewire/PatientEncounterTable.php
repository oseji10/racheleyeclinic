<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Encounters;
use App\Models\Patient;
use App\Models\VisualAcuity;
use Livewire\WithPagination;
use Rappasoft\LaravelLivewireTables\Views\Column;
use DB;
// use Illuminate\Support\Facades\DB;

class PatientEncounterTable extends LivewireTableComponent
{
    public $patientId;

    use WithPagination;

    public $showButtonOnHeader = true;

    public $showFilterOnHeader = true;

    public $buttonComponent = 'patient_cases.encounter.add-button';

    public $FilterComponent = ['patients.filter-button', Patient::FILTER_STATUS_ARR];

    protected $model = Encounters::class;

    protected $listeners = ['refresh' => '$refresh', 'changeFilter', 'resetPage'];

    public function resetPage($pageName = 'page')
    {
        $rowsPropertyData = $this->getRows()->toArray();
        $prevPageNum = $rowsPropertyData['current_page'] - 1;
        $prevPageNum = $prevPageNum > 0 ? $prevPageNum : 1;
        $pageNum = count($rowsPropertyData['data']) > 0 ? $rowsPropertyData['current_page'] : $prevPageNum;

        $this->setPage($pageNum, $pageName);
    }

    public function changeFilter($param, $value)
    {
        $this->resetPage($this->getComputedPageName());
        $this->statusFilter = $value;
        $this->setBuilder($this->builder());
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('encounters.created_at', 'desc')
            ->setQueryStringStatus(false);
        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if ($columnIndex == '4') {
                return [
                    'width' => '8%',
                ];
            }

            return [];
        });
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.patients'), 'patientUser.first_name')->view('patient_cases.encounter.columns.patient')
                ->sortable()->searchable(),
            Column::make(__('messages.user.phone'), 'patientUser.phone')->view('patient_cases.encounter.columns.phone')
                ->sortable()->searchable(),
                Column::make(__('messages.encounters.created_at'), 'created_at')->view('patient_cases.encounter.columns.created_at')
                ->sortable()->searchable(),
            Column::make(__('messages.encounters.followup_appointment_date'), 'followup_appointment_date')->view('patient_cases.encounter.columns.followup_appointment_date')
                ->sortable()->searchable(),
            // Column::make(__('messages.common.status'), 'patientUser.status')->view('patients.columns.status'),
            Column::make(__('messages.common.action'), 'id')->view('patient_cases.encounter.action'),
        ];
    }

    public function builder(): Builder
    {
               
        // $id = $request->input('id');
        //        $query = Encounters::where('id', $id)->select('encounters.*');
               $query = Encounters::where('patient_id', $this->patientId)->select('encounters.*');
               return $query;
    }
}
