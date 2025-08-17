<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class CmsPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'slug' => 'terms-conditions',
            'keyword' => 'a:7:{i:0;s:5:"terms";i:1;s:10:"conditions";i:2;s:5:"hello";i:3;s:3:"one";i:4;s:3:"two";i:5;s:5:"three";i:6;s:3:"six";}',
            'title' => 'Terms and Conditions',
            'description' => 'This is TC page',
            'page' => '<h2>Terms and Conditions</h2>',
            'status' => 1,
        ]);
        Page::create([
            'slug' => 'term-services',
            'keyword' => 'a:1:{i:0;s:4:"term";}',
            'title' => 'Term and Service',
            'description' => 'This is TS page',
            'page' => '<h2>Terms and Service</h2>',
            'status' => 1,
        ]);
        Page::create([
            'slug' => 'refund-cancellation',
            'keyword' => 'a:2:{i:0;s:6:"refund";i:1;s:12:"cancellation";}',
            'title' => 'Refund and Cancellations',
            'description' => 'This is RC page',
            'page' => '<h2>Refund and Cancellations</h2>',
            'status' => 1,
        ]);
        Page::create([
            'slug' => 'privacy-policy',
            'keyword' => 'a:2:{i:0;s:7:"privacy";i:1;s:6:"policy";}',
            'title' => 'Privacy Policy',
            'description' => 'This is PP page',
            'page' => '<h2>Privacy Policy</h2>',
            'status' => 1,
        ]);
    }
}
