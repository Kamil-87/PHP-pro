<?php


namespace App\services;

use App\entities\User;
use App\repositories\UserRepository;

class UserServices
{
    public function add(Request $request, UserRepository $userRepository )
    {
        $id = $request->getId();
        if (empty($id)) {
            return false;
        }

        /** @var User $user */
        $user = $userRepository->getOne($id);
        if (empty($user)) {
            return false;
        }

        $users = $request->getSession('users');

        if (empty($products[$id])) {
            $products[$id] = [
                'user' => $user,
            ];
        }

        $request->setSession('users', $users);

        return true;
    }
}
