<?php
/**
 * Created by andrew.
 * Date: 11.08.2020
 * Mail 10.42@mail.ru
 */

namespace App;

class UserService
{
    public function updateUser($request, $user)
    {
        $clearAvatar = $this->getReqClearAvatar($request);
        $avatarNew = $this->getReqAvatar($request);
        $showPhone = $this->getReqShowPhone($request);

        $data = $request->except(['_token','clear_avatar','show_phone']);

        $data['show_phone'] = $showPhone;

        if ($clearAvatar) {
            $this->clearAvatarSrv($user);
            $data['avatar'] = null;
        } else {
            if ($avatarNew) {
                $data['avatar'] = $this->addAvatarSrv($avatarNew);
            }
        }

        $user->fill($data);

        if ($user->update()) {
            return true;
        }

        return false;
    }

}
