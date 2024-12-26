<?php

namespace App\Http\Controllers;

use App\Http\Requests\event\CreateEventRequest;
use App\Http\Resources\event\EventListResource;
use App\Repository\EventRepository;
use App\Service\Response;
use App\Services\EventService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class EventController extends Controller
{
    private EventRepository $eventRepo;

    public function __construct()
    {
        $this->eventRepo = app('eventRepository');
    }

    public function store(CreateEventRequest $request)
    {
        $this->eventRepo->storeEvent($request->all());

        return Response::responseSuccess([
            'message' => 'event_create_sucess'
        ],HttpFoundationResponse::HTTP_CREATED);
    }

    public function index()
    {
        $events = $this->eventRepo->getEvents();

        return EventListResource::collection($events);
    }
}