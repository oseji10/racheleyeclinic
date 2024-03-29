<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Repositories\AppointmentCalendarRepository;
use App\Repositories\AppointmentRepository;
use Carbon\Carbon;

class AppointmentCalendarController extends AppBaseController
{
    /** @var AppointmentCalendarRepository */
    private $appointmentCalendarRepository;

    /** @var AppointmentRepository */
    private $appointmentRepository;

    public function __construct(
        AppointmentCalendarRepository $appointmentCalendarRepo,
        AppointmentRepository $appointmentRepository
    ) {
        $this->appointmentCalendarRepository = $appointmentCalendarRepo;
        $this->appointmentRepository = $appointmentRepository;
    }

    public function index()
    {
        $patients = $this->appointmentRepository->getPatients();
        $doctorArr = $this->appointmentRepository->getDoctorLists();
        $statusArr = Appointment::STATUS_PENDING;

        return view('appointment_calendars.index', compact('patients', 'doctorArr', 'statusArr'));
    }

    public function calendarList()
    {
        $appointments = $this->appointmentCalendarRepository->getAppointments();

        return $this->sendResponse($appointments, 'Appointment list retrieved successfully.');
    }

    public function getAppointmentDetails(Appointment $appointment)
    {
        $appointmentDetails['patient'] = $appointment->patient->patientUser->full_name;
        $appointmentDetails['department'] = $appointment->doctor->department->title;
        $appointmentDetails['doctor'] = $appointment->doctor->doctorUser->full_name;
        $appointmentDetails['opdDate'] = Carbon::parse($appointment->opd_date)->format('jS M, Y g:i A');
        $appointmentDetails['status'] = ($appointment->is_completed === Appointment::STATUS_COMPLETED) ? __('messages.appointment.completed') : __('messages.appointment.pending');
        $appointmentDetails['problem'] = $appointment->problem;
        $appointmentDetails['is_completed'] = ($appointment->is_completed) ? 'completed' : 'pending';

        return $this->sendResponse($appointmentDetails, 'Appointment Retrieved Successfully.');
    }
}
