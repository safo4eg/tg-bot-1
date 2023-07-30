<?php

namespace App\Helpers\Telegram;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class Bot
{
    use From, To;
    const URL = 'https://api.telegram.org/bot';

    protected $http;
    protected $bot_token;

    public function __construct(Http $http, $bot_token)
    {
        $this->http = $http;
        $this->bot_token = $bot_token;
    }

    public function sendInlinePage($recipient_id, $text, $inline_page_number) {
        $keyboard_markup = $this->createKeyboardMarkup('inline_keyboard', config('bots.inline_page_keyboards.first'));
        $request_url = $this->createRequestUrl(self::URL, $this->bot_token, 'sendMessage');
        $this->http::post($request_url, [
            'chat_id' => $recipient_id,
            'text' => $text,
            'reply_markup' => $inline_page_number
        ]);
    }

}
