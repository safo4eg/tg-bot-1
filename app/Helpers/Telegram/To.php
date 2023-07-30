<?php

namespace App\Helpers\Telegram;

trait To
{
    private function createKeyboardMarkup($type, $structure, $one_time_keyboard = null) {
        return [
            $type => $structure,
            'one_time_keyboard' => is_null($one_time_keyboard)? false: true
        ];
    }

    private function createRequestUrl($url, $bot_token, $method) {
        return $url.$bot_token."/$method";
    }
}
