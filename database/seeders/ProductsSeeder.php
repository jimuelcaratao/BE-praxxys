<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // from google
        DB::table('products')->insert([
            [
                'name' => 'Electronics and gadgets',
                'description' => 'Electronics and gadgets are among the most high-demand products in the Philippines. From smartphones and laptops to smart home devices, the demand for high-quality electronics remains strong. Keep an eye on the latest technological advancements and popular trends in the Philippines to cater to tech-savvy consumers.',
                'price' => 100,
                'manual_date' => '2024-09-14',
                'manual_time' => '12:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Home Office Electronics',
                'description' => 'With the rise of remote work and online businesses, home office electronics have become essential for many Filipinos. Products like ergonomic chairs, standing desks, printers, and monitors are in high demand. Focus on offering functional and ergonomic solutions to enhance productivity and create a comfortable workspace. Once you cover these bases, you are sure to experience great success for your business.',
                'price' => 223,
                'manual_date' => '2024-09-14',
                'manual_time' => '12:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Second-hand electronics',
                'description' => 'Second-hand electronics also have a significant market in the Philippines. Many consumers prefer affordable options for gadgets like smartphones, laptops, and cameras. Ensure the quality of these products by thoroughly inspecting and testing them before resale. Platforms like online classifieds and dedicated second-hand marketplaces can be great avenues for selling these items.',
                'price' => 123,
                'manual_date' => '2024-09-14',
                'manual_time' => '12:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Home and kitchen items',
                'description' => 'Home and kitchen items encompass a broad range of products, including cookware, appliances, home decor, and storage solutions. Filipinos take pride in their homes and seek products that enhance functionality and aesthetics. Consider offering practical and stylish home essentials like kitchen gadgets, organizers, and decorative items to cater to this market.',
                'price' => 3122,
                'manual_date' => '2024-09-14',
                'manual_time' => '12:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
