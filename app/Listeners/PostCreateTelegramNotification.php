<?php

namespace App\Listeners;

use App\Events\PostCreate;
use App\Helpers\Telegram;

class PostCreateTelegramNotification
{
    public $telegram;
    public function __construct(Telegram $telegram)
    {
        $this->telegram = $telegram;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PostCreate  $event
     * @return void
     */
    public function handle(PostCreate $event)
    {
        $message = (string)view('telegram.posts-create-notification', ['post' => $event->post]);
        $this->telegram->sendMessage('1454972838', $message);
    }
}
