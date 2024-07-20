<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events as MEvents;
use App\Http\Controllers\Controller;
use Laravel\Prompts\Concerns\Events;
use App\Http\Resources\EventResource;
use App\Http\Requests\EventPostRequest;

class EventController extends Controller
{
    public function index()
    {
        return EventResource::collection( MEvents::all() );
    }

    public function store( EventPostRequest $request )
    {
        $userDetail = MEvents::create( [
            'eventName' => $request->input( 'eventName' ),
            'location' => $request->input( 'location' ),
            'description' => $request->input( 'description' ),
            'eventStartDate' => $request->input( 'eventStartDate' ),
            'eventEndDate' => $request->input( 'eventEndDate' ),
            'startTimeAM' => $request->input( 'startTimeAM' ),
            'endTimeAM' => $request->input( 'endTimeAM' ),
            'gracePeriodAM' => $request->input( 'gracePeriodAM' ),
            'startTimePM' => $request->input( 'startTimePM' ),
            'endTimePM' => $request->input( 'endTimePM' ),
            'gracePeriodPM' => $request->input( 'gracePeriodPM' ),
            'userId' => $request->input( 'userId' )
        ] );

        return response()->json( [
            'message' => 'Event created successfully',
            'status_code' => 201
        ], 201 );
    }

    public function show( $id )
    {
        $events = MEvents::find( $id );

        if ( !$events ) {
            return response()->json( [ 'message' => 'Event details not found' ], 404 );
        }

        return EventResource::make( $events );
    }

    public function update( EventPostRequest $request, $id )
    {
        // Find the user details by ID
        $event = MEvents::find( $id );

        if ( !$event ) {
            return response()->json( [
                'message' => 'Event not found'
            ], 404 );
        }

        // Update user detail fields if provided
        $event->eventName = $request->input( 'eventName' );
        $event->location = $request->input( 'location' );
        $event->description = $request->input( 'description' );
        $event->eventStartDate = $request->input( 'eventStartDate' );
        $event->eventEndDate = $request->input( 'eventEndDate' );
        $event->startTimeAM = $request->input( 'startTimeAM' );
        $event->endTimeAM = $request->input( 'endTimeAM' );
        $event->gracePeriodAM = $request->input( 'gracePeriodAM' );
        $event->startTimePM = $request->input( 'startTimePM' );
        $event->endTimePM = $request->input( 'endTimePM' );
        $event->gracePeriodPM = $request->input( 'gracePeriodPM' );
        $event->userId = $request->input( 'userId' );

        $event->save();

        return response()->json( [
            'message' => 'Event updated successfully',
            'status_code' => 200,
            'data' => new EventResource( $event ),
        ], 200 );
    }

    public function destroy( $id )
    {
        // Find the user details by ID
        $events = MEvents::find( $id );

        if ( !$events ) {
            return response()->json( [
                'message' => 'Event not found',
                'status_code' => 404
            ], 404 );
        }

        $events->delete();

        return response()->json( [
            'message' => 'Event deleted successfully',
            'status_code' => 200
        ], 200 );
    }
}
