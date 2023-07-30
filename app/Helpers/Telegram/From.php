<?php

namespace App\Helpers\Telegram;

trait From
{
    private $data_types = ['message', 'callback_query'];

    private function checkDataType($data) {
        foreach ($this->data_types as $value) {
            if(array_key_exists($value, $data)) {
                return $value;
            }
        }
    }

    private function getDataFromCallbackQuery($data) {
        $result = [];
        $result['callback_data'] = $data['callback_query']['data'];
        $result['sender_id'] = $data['callback_query']['from']['id'];
        $result['message_id'] = $data['callback_query']['message']['id'];
    }

    private function getDataFromMessage($data) {
        $result = [];
        $result['text'] = trim($data['message']['text']);
        $result['sender_id'] = $data['message']['from']['id'];
    }
}
