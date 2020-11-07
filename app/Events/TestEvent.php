<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TestEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id, $temperature, $humidity, $airPressure, $rain;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($id, $temperature, $humidity, $airPressure, $rain)
    {
        //
        $this->id = $id;
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->airPressure = $airPressure;
        $this->rain = $rain;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return 'mociTest';
        return new Channel('my-channel');
        // return ['mociTest'];
        // return ['my-channel'];
    }


    public function broadcastAs()
    {
        // return 'my-event';
        return 'my-event';
    }
}
