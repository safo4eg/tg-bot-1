<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class Telegram
{
    const URL = 'https://api.telegram.org/bot';

    protected $http;
    protected $bot_token;

    public function __construct(Http $http, $bot_token)
    {
        $this->http = $http;
        $this->bot_token = $bot_token;
    }
    public function sendMessage($chat_id, $message)
    {
        return $this->http::post(self::URL.$this->bot_token.'/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html'
        ]);
    }

    public function sendDocument($chat_id, $file)
    {
        return $this->http::attach('document', Storage::get('/public/'.$file), 'img.png')
            ->post(self::URL.$this->bot_token.'/sendDocument', [
                'chat_id' => $chat_id
            ]);
    }

    public function sendMessageWithButtons($chat_id, $message, $buttons)
    {
        return $this->http::post(self::URL.$this->bot_token.'/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $message,
            'reply_markup' => $buttons
        ]);
    }
}
