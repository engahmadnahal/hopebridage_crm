<?php

namespace App\Events;

use App\Models\Need;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NeedAction
{
    private $need;
    private $action;

    use InteractsWithSockets, SerializesModels;

    public function getNeed()
    {
        return $this->need;
    }
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Create a new event instance.
     * TaskAction constructor.
     * @param Task $task
     * @param $action
     */
    public function __construct(Need $need, $action)
    {
        $this->need = $need;
        $this->action = $action;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
