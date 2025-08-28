<?php

namespace App\Services;

use Illuminate\Http\Request;

class ProductService
{

    public function prepareProductData(Request $request): array
    {
        // dd("YES", $request->all());
        $thumbnailImg = "";

        if ($request->hasFile('thumbnail_img')) {
            $image = $request->file('thumbnail_img');
            $thumbnailImg = 'course_' . uniqid() . ".jpg";
            $path = public_path('images/product');
            $image->move($path, $thumbnailImg);
        }

        return [
            'title'             => $request->input('title'),
            'subtitle'          => $request->input('subtitle'),
            'description'       => $request->input('description'),
            'slug'              => $this->createSlug($request->input('slug')),
            'category_id'       => $request->input('category'),
            'level'             => $request->input('level', 'Beginner'),
            'language'          => $request->input('language', 'English'),
            'mode_of_class'     => $request->input('mode_of_class', 'Online'),
            'price'             => $request->input('price', 0),
            'discount_type'     => $request->input('discount_type'),
            'discount'          => $request->input('discount', 0),
            'actual_price'      => $this->calculatePrice($request->input('price', 0), $request->input('discount_type'), $request->input('discount', 0)),
            'commission_type'   => $request->input('commission_type'),
            'commission'        => $request->input('commission', 0),
            'total_commission'  => $this->calculateCommission($request->input('price', 0), $request->input('commission_type'), $request->input('commission', 0)),
            'currency'          => $request->input('currency', 'INR'),
            'content'           => $request->input('content'),
            'specification'     => $this->prepareSpecification($request->input('specification')),
            'thumbnail_img'     => $thumbnailImg,
            'status'            => $request->input('status', 2),

            // 'instructor_id'     => auth()->id(),
            // 'promo_video_url'  => $request->input('promo_video_url'),
            // 'requirements'     => $request->input('requirements') ? json_encode($request->input('requirements')) : null,
            // 'learning_outcomes' => $request->input('learning_outcomes') ? json_encode($request->input('learning_outcomes')) : null,
            // 'target_audience'  => $request->input('target_audience') ? json_encode($request->input('target_audience')) : null,
            // 'is_free'          => $request->boolean('is_free', 1),
        ];
    }

    private function createSlug($string)
    {
        $slug = strtolower($string);
        $slug = preg_replace('/[^a-z0-9\s]/', '', $slug);
        $slug = preg_replace('/\s+/', '-', $slug);
        $slug = trim($slug, '-');
        return $slug;
    }

    private function calculatePrice($price, $type, $value)
    {
        if ($type == 'fixed') {
            return $price - $value;
        }
        return $price - ($price * $value / 100);
    }

    private function calculateCommission($price, $type, $value)
    {
        if ($type == 'fixed') {
            return $value;
        }
        return $price * $value / 100;
    }

    private function prepareSpecification($specifications)
    {
        $arr = [];
        foreach ($specifications as $specification) {

            if ($specification['key'] != null) {
                $arr[$specification['key']] = $specification['value'];
            } else {
                return null;
            }
        }
        return $arr;
    }
}
