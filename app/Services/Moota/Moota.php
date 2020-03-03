<?php

namespace App\Services\Moota;

use Illuminate\Support\Collection;

class Moota
{
    public function getStat(): Collection
    {
        $data = [
            "total_user" => 2020,
            "user_this_month" => 200,
            "user_active" => 80,
            "total_bank_account" => 7,
            "bank_account_this_month" => 3,
            "total_account_deleted" => 19
        ];

        return collect($data);
    }
}
