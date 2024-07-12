<?php

namespace App\Broadcasting;

use App\User;

class ModelChannel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */

    public $model;
    public function __construct(ModelEventBase $model)
    {
        //
        $this->model = $model;
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param  \App\User  $user
     * @return array|bool
     */
    public function join(User $user)
    {
        \Log::info('joined', $user, $this->model);
        return true;
    }
}
