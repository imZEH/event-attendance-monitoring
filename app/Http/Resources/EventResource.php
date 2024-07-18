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
            'eventDate' => $this->eventDate,
            'startTimeMorning' => $this->startTimeMorning,
            'endTimeMorning' => $this->endTimeMorning,
            'gracePeriodMorning' => $this->gracePeriodMorning,
            'startTimeAfternoon' => $this->startTimeAfternoon,
            'endTimeAfternoon' => $this->endTimeAfternoon,
            'gracePeriodAfternoon' => $this->user->gracePeriodAfternoon,
            'eventType' => $this->user->eventType,
            'created_at' => $this->created_at,
        ];
    }
}
