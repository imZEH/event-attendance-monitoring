<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'eventName' => $this->eventName,
            'location' => $this->location,
            'description' => $this->description,
            'eventStartDate' => $this->eventStartDate,
            'eventEndDate' => $this->eventEndDate,
            'startTimeAM' => $this->startTimeAM,
            'endTimeAM' => $this->endTimeAM,
            'gracePeriodAM' => $this->gracePeriodAM,
            'startTimePM' => $this->startTimePM,
            'endTimePM' => $this->endTimePM,
            'gracePeriodPM' => $this->gracePeriodPM,
            'created_at' => $this->created_at,
        ];
    }
}
