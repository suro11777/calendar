<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'start_time',
        'finish_time',
        'meaning',
        'with_whom',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function meaning()
    {
        return $this->belongsTo(User::class, 'meaning', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function with_whom()
    {
        return $this->belongsTo(User::class, 'with_whom', 'id');
    }
}
