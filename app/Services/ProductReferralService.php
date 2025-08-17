<?php

namespace App\Services;

use App\Models\User;
use App\Models\Product;
use App\Models\ReferralReward;
use App\Models\ProductReferral;

class ProductReferralService
{

    public function handleProductPurchase(User $buyer, int $courseId)
    {
        $referral = ProductReferral::where('course_id', $courseId)
            ->where('referred_user_id', $buyer->id)
            ->where('purchased', false)
            ->first();

        if (!$referral) {
            return;
        }

        $referral->update(['purchased' => true]);

        $this->giveReward($referral->referrer_id, 50, "Earned for referring product #{$courseId} purchased by {$buyer->name}");
        $this->giveReward($buyer->id, 10, "Earned for purchasing product #{$courseId} via referral");
    }

    public function handleProductPurchaseCASE2(User $buyer, int $courseId)
    {
        $product = Product::find($courseId);
        if (!$product) {
            return;
        }

        // Find referral record
        $referral = ProductReferral::where('course_id', $courseId)
            ->where('referred_user_id', $buyer->id)
            ->where('purchased', false)
            ->first();

        if (!$referral) {
            return;
        }

        // Mark referral as purchased
        $referral->update(['purchased' => true]);

        // Calculate percentage-based points
        $referrerPoints = $this->calculatePoints($product->price, config('referral.referrer_percentage', 10));
        $buyerPoints    = $this->calculatePoints($product->price, config('referral.buyer_percentage', 5));

        // Give rewards
        $this->giveReward($referral->referrer_id, $referrerPoints, "Earned {$referrerPoints} points for referring product #{$courseId} bought by {$buyer->name}");
        $this->giveReward($buyer->id, $buyerPoints, "Earned {$buyerPoints} points for buying product #{$courseId} via referral");
    }

    public function handleProductPurchaseCASE3(User $buyer, int $courseId)
    {
        $product = Product::find($courseId);
        if (!$product) {
            return;
        }

        // Find referral record
        $referral = ProductReferral::where('course_id', $courseId)
            ->where('referred_user_id', $buyer->id)
            ->where('purchased', false)
            ->first();

        if (!$referral) {
            return;
        }

        // Mark as purchased
        $referral->update(['purchased' => true]);

        // Get percentages based on tier
        [$referrerPercent, $buyerPercent] = $this->getPercentagesByPrice($product->price);

        // Calculate points
        $referrerPoints = $this->calculatePoints($product->price, $referrerPercent);
        $buyerPoints    = $this->calculatePoints($product->price, $buyerPercent);

        // Rewards
        $this->giveReward(
            $referral->referrer_id,
            $referrerPoints,
            "Earned {$referrerPoints} points for referring product #{$courseId} bought by {$buyer->name}"
        );

        $this->giveReward(
            $buyer->id,
            $buyerPoints,
            "Earned {$buyerPoints} points for buying product #{$courseId} via referral"
        );
    }

    public function trackProductReferral(User $buyer, string $referralCode, int $courseId)
    {
        $referrer = User::where('referral_code', $referralCode)->first();

        if ($referrer && $referrer->id !== $buyer->id) {
            ProductReferral::create([
                'referrer_id' => $referrer->id,
                'course_id' => $courseId,
                'referred_user_id' => $buyer->id
            ]);
        }
    }

    private function giveReward($userId, int $points, string $description)
    {
        $user = User::find($userId);
        if (!$user) {
            return;
        }

        $user->increment('reward_points', $points);

        ReferralReward::create([
            'user_id' => $user->id,
            'points' => $points,
            'description' => $description,
        ]);
    }

    private function calculatePoints(float $price, float $percentage)
    {
        return floor(($price * $percentage) / 100);
    }

    private function getPercentagesByPrice(float $price): array
    {
        $tiers = config('referral.tiers', []);

        foreach ($tiers as $tier) {
            $min = $tier['min'];
            $max = $tier['max'];

            if (($max === null && $price >= $min) || ($price >= $min && $price <= $max)) {
                return [$tier['referrer_percentage'], $tier['buyer_percentage']];
            }
        }

        return [0, 0];
    }
}
