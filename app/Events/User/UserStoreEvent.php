<?php

namespace App\Events\User;

use App\Http\Requests\User\StoreUserRequest;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserStoreEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public User $user;
    public StoreUserRequest $request;
    public function __construct(StoreUserRequest $request, User $user)
    {
        $this->request = $request;
        $this->user = $user;
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
