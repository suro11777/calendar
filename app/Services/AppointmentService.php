<?php

namespace App\Services;


use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AppointmentService
{
    /**
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function create()
    {
        return User::all(['id', 'name']);
    }

    /**
     * @param $data
     * @return bool
     */
    public function store($data)
    {
        $appointment = Appointment::whereBetween('start_time', [$data['start_time'], $data['finish_time']])
            ->orWhereBetween('finish_time', [$data['start_time'], $data['finish_time']])
            ->orWhere(function ($q) use ($data) {
                $q->where('start_time', '<', $data['start_time'])
                    ->where('finish_time', '>', $data['finish_time']);
            })
            ->first();

        if ($appointment){
            return false;
        }
        DB::transaction(function (){
            Appointment::create([
                'meaning' => auth()->id(),
                'with_whom' => request()->get('with_whom'),
                'start_time' => request()->get('start_time'),
                'finish_time' => request()->get('finish_time'),
            ]);
        });
        return true;
    }
}
