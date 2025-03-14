<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CustomPage;

class PageSeeder extends Seeder {
    public function run() {
        CustomPage::create([
            'slug' => 'about-us',
            'title' => 'About Us',
            'content' => '<p>Welcome to our platform! We are committed to providing the best services with a focus on reliability, customer satisfaction, and transparency. Our team works tirelessly to ensure our users have a seamless experience.</p>
                          <p>We started with a vision to connect people with opportunities, and today, we are proud to serve a growing community. Thank you for being a part of our journey.</p>',
            'banner_image' => 'about_us_banner.jpg',
            'status' => 1,
        ]);

        CustomPage::create([
            'slug' => 'privacy-policy',
            'title' => 'Privacy Policy',
            'content' => '<p>Your privacy is important to us. This policy explains how we collect, use, and protect your personal information. We do not share your data with third parties without your consent.</p>
                          <p>By using our services, you agree to the collection and use of information in accordance with this policy.</p>',
            'banner_image' => 'privacy_policy_banner.jpg',
            'status' => 1,
        ]);

        CustomPage::create([
            'slug' => 'terms-conditions',
            'title' => 'Terms & Conditions',
            'content' => '<p>By accessing our website, you agree to comply with our terms and conditions. These include proper usage of our services, respecting intellectual property, and abiding by legal requirements.</p>
                          <p>Failure to comply may result in suspension or termination of your access.</p>',
            'banner_image' => 'terms_conditions_banner.jpg',
            'status' => 1,
        ]);
    }
}
