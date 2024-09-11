<?php

namespace App\Http\Controllers;

use App\Exports\frontDeskExportExport;
use App\Http\Requests\CreateFrontDeskRequest;
use App\Http\Requests\UpdateFrontDeskRequest;
use App\Models\EmployeePayroll;
use App\Models\FrontDesk;
use App\Repositories\FrontDeskRepository;
use Flash;
use Maatwebsite\Excel\Facades\Excel;

class FrontDeskController extends AppBaseController
{
    /** @var FrontDeskController */
    private $frontDeskRepository;

    public function __construct(FrontDeskController $frontDeskRepo)
    {
        $this->frontDeskRepository = $frontDeskRepo;
    }

    public function index()
    {
        $data['statusArr'] = FrontDeskController::STATUS_ARR;
        // $data = FrontDesk::all();

        return view('frontdesks.index', $data);
    }

    public function create()
    {
        $bloodGroup = getBloodGroups();

        return view('frontdesk.create', compact('bloodGroup'));
    }

    public function store(CreateFrontDeskRequest $request)
    {
        $input = $request->all();
        $input['status'] = isset($input['status']) ? 1 : 0;

        $receptionist = $this->frontDeskRepository->store($input);

        Flash::success(__('messages.frontdesk.frontdesk').' '.__('messages.common.saved_successfully'));

        return redirect(route('frontdesk.index'));
    }

    public function show(FrontDesk $frontdesk)
    {
        $payrolls = $frontdesk->payrolls;

        return view('frontdesk.show', compact('frontdesk', 'payrolls'));
    }

    public function edit(FrontDesk $frontdesk)
    {
        $user = $frontdesk->user;
        $bloodGroup = getBloodGroups();

        return view('frontdesk.edit', compact('frontdesk', 'user', 'bloodGroup'));
    }

    public function update(FrontDesk $frontdesk, UpdateFrontDeskRequest $request)
    {
        $input = $request->all();
        $input['status'] = isset($input['status']) ? 1 : 0;

        $frontdesk = $this->frontDeskRepository->update($frontdesk, $input);

        Flash::success(__('messages.frontdesk.frontdesk').' '.__('messages.common.updated_successfully'));

        return redirect(route('frontdesk.index'));
    }

    public function destroy(FrontDesk $frontdesk)
    {
        $empPayRollResult = canDeletePayroll(EmployeePayroll::class, 'owner_id', $frontdesk->id, $frontdesk->user->owner_type);

        if ($empPayRollResult) {
            return $this->sendError(__('messages.receptionist.receptionist').' '.__('messages.common.cant_be_deleted'));
        }

        $frontdesk->user()->delete();
        $frontdesk->address()->delete();
        $frontdesk->delete();

        return $this->sendSuccess(__('messages.receptionist.receptionist').' '.__('messages.common.deleted_successfully'));
    }

    public function activeDeactiveStatus($id)
    {
        $frontdesk = FrontDesk::find($id);
        $status = ! $frontdesk->user->status;
        $frontdesk->user()->update(['status' => $status]);

        return $this->sendSuccess(__('messages.common.status_updated_successfully'));
    }

    public function frontDeskExport()
    {
        return Excel::download(new FrontDeskExport, 'frontdesk-'.time().'.xlsx');
    }
}
