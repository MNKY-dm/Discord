<?php
class Channel {

    public function __construct (int $channel_id, string $channel_name)
    {
        $this->id = $channel_id;
        $this->name = $channel_name;
    }


}