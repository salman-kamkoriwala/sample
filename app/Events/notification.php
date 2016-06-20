<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class notification extends Event implements ShouldBroadcast
{
    use SerializesModels;
    
    public $notification;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(notification $notification)
    {
        $this->notification = $notification;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['notification'];
    }
    
    
    public function broadcastWith(){
    	return ['notification' => $this->notification];
    }
}
