<?php

namespace App;

/**
 *
 * I made this trait because i use myown websocket server
 */
trait Broadcast
{

    public function broadcast($data)
    {

        $this->dispatch('okta:broadcast', $data);
        // $c = collect([""])
    }

    public function send($data)
    {
        $this->dispatch('okta:send', $data);
    }
}
