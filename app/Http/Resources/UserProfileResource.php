<?php
/**
 * Created by andrew.
 * Date: 28.08.2020
 * Mail 10.42@mail.ru
 */

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'avatar' =>$this->userProfile->avatar ?? '/avatars/default_avatar.png',
            'sex' => $this->userProfile->sex,
            'badges' => $this->userSocialNetworkBadges,
        ];
    }
}
