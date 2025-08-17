<?php

namespace App\Services;

use App\Models\User;
use App\Models\ReferralReward;

class JoiningReferralService
{
    public function handleReferral(User $newUser, ?string $referralCode)
    {
        if (!$referralCode) {
            return;
        }

        $referrer = User::where('referral_code', $referralCode)->first();

        if (!$referrer || $referrer->id == $newUser->id) {
            return;
        }

        // Assign referrer
        $newUser->referred_by = $referrer->id;
        $newUser->save();

        // Rewards
        $this->giveReward($referrer, get_setting('referral_points'), "Referral reward for inviting {$newUser->name}");
        $this->giveReward($newUser, get_setting('referree_points'), "Welcome bonus for joining with referral code {$referralCode}");
    }

    private function giveReward(User $user, int $points, string $description)
    {
        $user->increment('reward_points', $points);

        ReferralReward::create([
            'user_id' => $user->id,
            'points' => $points,
            'description' => $description,
        ]);
    }
}
