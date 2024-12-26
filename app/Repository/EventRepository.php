<?php
namespace App\Repository;

use App\Models\Event;

class EventRepository 
{
    private Event $model;

    public function __construct()
    {
        $this->model = new Event();
    }

    public function storeEvent(array $data)
    {
       return $this->model->query()->create($data);
    }

    public function getEvents()
    {
        $query = Event::query();
        return $this->model->
        query()->
        filter()->
        paginate();
    }

}