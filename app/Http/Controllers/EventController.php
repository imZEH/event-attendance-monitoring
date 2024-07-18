<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Prompts\Concerns\Events;
use App\Http\Resources\EventResource;

class EventController extends Controller
{
    public function index()
    {
        return EventResource::collection( Events::all() );
    }

    public function store( EventPostRequest $request )
    {
        $userDetail = Events::create( [
            'eventName' => $request->input( 'eventName' ),
            'location' => $request->input( 'location' ),
            'description' => $request->input( 'description' ),
            'eventDate' => $request->input( 'eventDate' ),
            'startTimeMorning' => $request->input( 'startTimeMorning' ),
            'endTimeMorning' => $request->input( 'endTimeMorning' ),
            'gracePeriodMorning' => $request->input( 'gracePeriodMorning' ),
            'startTimeAfternoon' => $request->input( 'startTimeAfternoon' ),
            'endTimeAfternoon' => $request->input( 'endTimeAfternoon' ),
            'gracePeriodAfternoon' => $request->input( 'gracePeriodAfternoon' ),
            'eventType' => $request->input( 'eventType' ),
            'userId' => $request->input( 'userId' )
        ] );

        return response()->json( [
            'message' => 'Event created successfully',
            'status_code' => 201
        ], 201 );
    }

    public function show( $id )
    {
        $events = Events::with( 'user' )->find( $id );

        if ( !$userDetails ) {
            return response()->json( [ 'message' => 'Event details not found' ], 404 );
        }

        return EventResource::make( $events );
    }

    public function update( EventPostRequest $request, $id )
    {
        // Find the user details by ID
        $event = Events::find( $id );

        if ( !$event ) {
            return response()->json( [
                'message' => 'Event not found'
            ], 404 );
        }

        // Update user detail fields if provided
        $event->eventName = $request->input( 'eventName' );
        $event->location = $request->input( 'location' );
        $event->description = $request->input( 'description' );
        $event->eventDate = $request->input( 'eventDate' );
        $event->startTimeMorning = $request->input( 'startTimeMorning' );
        $event->endTimeMorning = $request->input( 'endTimeMorning' );
        $event->gracePeriodMorning = $request->input( 'gracePeriodMorning' );
        $event->startTimeAfternoon = $request->input( 'startTimeAfternoon' );
        $event->endTimeAfternoon = $request->input( 'endTimeAfternoon' );
        $event->gracePeriodAfternoon = $request->input( 'gracePeriodAfternoon' );
        $event->eventType = $request->input( 'eventType' );
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
        $events = Events::find( $id );

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
