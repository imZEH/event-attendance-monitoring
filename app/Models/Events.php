<?php

namespace App\Models;

use App\Models\UserDetail;
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
        'eventStartDate',
        'eventEndDate',
        'startTimeAM',
        'endTimeAM',
        'gracePeriodAM',
        'startTimePM',
        'endTimePM',
        'gracePeriodPM',
        'userId'
    ];

    public function user()
    {
        return $this->belongsTo( UserDetail::class, 'userId' );
    }
}