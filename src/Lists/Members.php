<?php

namespace Coderjerk\ElephantBird\Lists;

use Coderjerk\ElephantBird\ApiBase;

class Members extends ApiBase
{
    protected array $credentials;

    protected string $path;

    public function __construct($credentials)
    {
        $this->credentials = $credentials;
    }

    public function add($list_id, $member)
    {
        $member_id = $this->getUserId($member);

        $path = "lists/{$list_id}/members";
        $data = [
            'user_id' => $member_id
        ];

        return $this->post($this->credentials, $path, null, $data, false, true);
    }


    public function remove($list_id, $member)
    {
        $member_id = $this->getUserId($member);

        $path = "lists/{$list_id}/members/{$member_id}";

        return $this->delete($this->credentials, $path, null, null, false, true);
    }
}
