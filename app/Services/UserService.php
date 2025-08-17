<?php

namespace App\Services;

use Illuminate\Http\Request;

class UserService
{

    public function prepareUserData(Request $request): array
    {
        $data = $request->input();

        return [
            'name' => $data['name'],
            'organization' => $data['organization'],
            'street' => $data['street'],
            'city' => $data['city'],
            'state' => $data['state'],
            'country' => $data['country'],
            'email' => $data['email'],
            'contact' => $data['contact'],
            'establishment_year' => $data['establishment_year'],
            'business_type' => $data['business_type'],
            'about' => $data['about'],
            'is_admin' => 2,
            'status_id' => $data['status'],
            'password' => isset($data['password']) ? $data['password'] : ""
        ];
    }
}
