<?php

namespace App\Http\Resources\Admin;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserIpActivityListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'user' => isset($this->user) ? $this->user->name : '',
            'email' => isset($this->user) ? $this->user->email : '',
            'event' => $this->event,
            'ip' => $this->ip,
            'extra' => $this->extra,
            'created_at' => Carbon::parse($this->created_at)->toDateTimeString(),
        ];
    }
}
