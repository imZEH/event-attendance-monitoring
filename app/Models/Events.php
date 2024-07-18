<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Events extends Model
 {
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'eventName',
        'location',
        'description',
        'eventDate',
        'startTimeMorning',
        'endTimeMorning',
        'gracePeriodMorning',
        'startTimeAfternoon',
        'endTimeAfternoon',
        'gracePeriodAfternoon',
        'eventType',
        'userId'
    ];

    public function user()
    {
        return $this->belongsTo( User::class, 'userId' );
    }
}