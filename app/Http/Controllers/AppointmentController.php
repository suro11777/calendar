<?php


namespace App\Http\Controllers;


use App\Http\Requests\AppointmentRequest;
use App\Models\User;
use App\Services\AppointmentService;
use Illuminate\Http\Request;

class AppointmentController extends BaseController
{

    /**
     * AppointmentController constructor.
     * @param AppointmentService $appointmentService
     */
    public function __construct(AppointmentService $appointmentService)
    {
        $this->baseService = $appointmentService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $users = $this->baseService->create();
        return view('appointments', compact('users'));
    }


    /**
     * @param AppointmentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AppointmentRequest $request)
    {
        $isCreate = $this->baseService->store($request->all());
        if ($isCreate){
            return redirect()->route('calendar');
        }
        return redirect()->back()->withErrors(['error' => 'appointment already exists']);
    }
}
