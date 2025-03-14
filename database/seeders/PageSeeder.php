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
            'meta_title' => 'About Us - Learn More About Our Company',
            'meta_description' => 'Discover our mission, values, and the story behind our platform. We are dedicated to connecting people with opportunities.',
            'meta_keywords' => 'about us, our mission, company information'
        ]);

        CustomPage::create([
            'slug' => 'privacy-policy',
            'title' => 'Privacy Policy',
            'content' => '<p>Your privacy is important to us. This policy explains how we collect, use, and protect your personal information. We do not share your data with third parties without your consent.</p>
                          <p>By using our services, you agree to the collection and use of information in accordance with this policy.</p>',
            'banner_image' => 'privacy_policy_banner.jpg',
            'status' => 1,
            'meta_title' => 'Privacy Policy - How We Protect Your Data',
            'meta_description' => 'Learn how we collect, store, and protect your personal data. Your privacy matters to us.',
            'meta_keywords' => 'privacy policy, data protection, user privacy',
        ]);

        CustomPage::create([
            'slug' => 'terms-conditions',
            'title' => 'Terms & Conditions',
            'content' => '<p>By accessing our website, you agree to comply with our terms and conditions. These include proper usage of our services, respecting intellectual property, and abiding by legal requirements.</p>
                          <p>Failure to comply may result in suspension or termination of your access.</p>',
            'banner_image' => 'terms_conditions_banner.jpg',
            'status' => 1,
            'meta_title' => 'Terms & Conditions - Rules of Using Our Services',
            'meta_description' => 'Read our terms and conditions to understand the rules for using our platform. Stay informed and compliant.',
            'meta_keywords' => 'terms and conditions, website rules, user agreement',
        ]);

        CustomPage::create([
            'slug' => 'disclaimer',
            'title' => 'Disclaimer',
            'content' => '<p>The information provided on our website is for general informational purposes only. We make no representations or warranties about the completeness, accuracy, or reliability of the content.</p>
                          <p>Any action you take upon the information is strictly at your own risk, and we will not be liable for any losses or damages in connection with the use of our website.</p>',
            'banner_image' => 'disclaimer_banner.jpg',
            'status' => 1,
            'meta_title' => 'Disclaimer - Important Information',
            'meta_description' => 'Read our disclaimer to understand the limitations of the information provided on our platform.',
            'meta_keywords' => 'disclaimer, website disclaimer, liability',
        ]);
    }
}
