<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class ProductsSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        // Seed dữ liệu cho sản phẩm
        $data = [
            [
                'name' => 'iPhone 14',
                'price' => 999.99,
                'description' => 'Điện thoại iPhone 14 với công nghệ mới nhất.',
                'thumbnail' => 'https://example.com/images/iphone14_thumbnail.jpg',
                'category_id' => 27,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'MacBook Pro 16"',
                'price' => 2399.99,
                'description' => 'Laptop MacBook Pro 16 inch, hiệu năng mạnh mẽ.',
                'thumbnail' => 'https://example.com/images/macbookpro16_thumbnail.jpg',
                'category_id' => 26,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Tai nghe không dây',
                'price' => 149.99,
                'description' => 'Phụ kiện tai nghe không dây chất lượng cao.',
                'thumbnail' => 'https://example.com/images/wireless_headphones_thumbnail.jpg',
                'category_id' => 28,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            // Thêm 37 sản phẩm mới
            [
                'name' => 'Samsung Galaxy S23',
                'price' => 899.99,
                'description' => 'Điện thoại Samsung Galaxy S23, thiết kế sang trọng.',
                'thumbnail' => 'https://example.com/images/galaxy_s23_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Sony WH-1000XM5',
                'price' => 349.99,
                'description' => 'Tai nghe Sony WH-1000XM5, chống ồn chủ động.',
                'thumbnail' => 'https://example.com/images/sony_wh1000xm5_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'iPad Pro 11"',
                'price' => 799.99,
                'description' => 'Máy tính bảng iPad Pro 11 inch, hiệu năng cao.',
                'thumbnail' => 'https://example.com/images/ipad_pro_11_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'LG OLED TV 55"',
                'price' => 1499.99,
                'description' => 'TV OLED LG 55 inch, hình ảnh sắc nét.',
                'thumbnail' => 'https://example.com/images/lg_oled_tv_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Apple Watch Series 8',
                'price' => 399.99,
                'description' => 'Đồng hồ thông minh Apple Watch Series 8.',
                'thumbnail' => 'https://example.com/images/apple_watch_series8_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'GoPro HERO10',
                'price' => 499.99,
                'description' => 'Camera hành động GoPro HERO10, chống nước.',
                'thumbnail' => 'https://example.com/images/gopro_hero10_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Dell XPS 13',
                'price' => 1299.99,
                'description' => 'Laptop Dell XPS 13, thiết kế mỏng nhẹ.',
                'thumbnail' => 'https://example.com/images/dell_xps13_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'OnePlus 10 Pro',
                'price' => 749.99,
                'description' => 'Điện thoại OnePlus 10 Pro, camera chất lượng.',
                'thumbnail' => 'https://example.com/images/oneplus_10_pro_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Amazon Echo Dot (5th Gen)',
                'price' => 49.99,
                'description' => 'Loa thông minh Amazon Echo Dot thế hệ 5.',
                'thumbnail' => 'https://example.com/images/echo_dot5_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Xiaomi Mi Band 7',
                'price' => 49.99,
                'description' => 'Vòng đeo tay thông minh Xiaomi Mi Band 7.',
                'thumbnail' => 'https://example.com/images/xiaomi_mi_band7_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Fitbit Charge 5',
                'price' => 149.99,
                'description' => 'Vòng tay theo dõi sức khỏe Fitbit Charge 5.',
                'thumbnail' => 'https://example.com/images/fitbit_charge5_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Razer DeathAdder V3',
                'price' => 69.99,
                'description' => 'Chuột chơi game Razer DeathAdder V3, độ chính xác cao.',
                'thumbnail' => 'https://example.com/images/razer_deathadder_v3_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Logitech G Pro X',
                'price' => 129.99,
                'description' => 'Bàn phím chơi game Logitech G Pro X, thiết kế cơ khí.',
                'thumbnail' => 'https://example.com/images/logitech_g_pro_x_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Bose SoundLink Flex',
                'price' => 149.99,
                'description' => 'Loa di động Bose SoundLink Flex, âm thanh sống động.',
                'thumbnail' => 'https://example.com/images/bose_soundlink_flex_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Microsoft Surface Pro 8',
                'price' => 1099.99,
                'description' => 'Máy tính bảng Microsoft Surface Pro 8, đa năng.',
                'thumbnail' => 'https://example.com/images/surface_pro8_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Apple AirPods Pro',
                'price' => 249.99,
                'description' => 'Tai nghe không dây Apple AirPods Pro.',
                'thumbnail' => 'https://example.com/images/airpods_pro_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Samsung Galaxy Watch 5',
                'price' => 249.99,
                'description' => 'Đồng hồ thông minh Samsung Galaxy Watch 5.',
                'thumbnail' => 'https://example.com/images/galaxy_watch5_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Nikon Z6 II',
                'price' => 1999.99,
                'description' => 'Máy ảnh Nikon Z6 II, khả năng chụp ảnh tốt.',
                'thumbnail' => 'https://example.com/images/nikon_z6ii_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Samsung Galaxy Tab S8',
                'price' => 699.99,
                'description' => 'Máy tính bảng Samsung Galaxy Tab S8, thiết kế đẹp.',
                'thumbnail' => 'https://example.com/images/galaxy_tab_s8_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Apple TV 4K',
                'price' => 179.99,
                'description' => 'Thiết bị giải trí Apple TV 4K, trải nghiệm xem phim tuyệt vời.',
                'thumbnail' => 'https://example.com/images/apple_tv_4k_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Google Nest Hub',
                'price' => 99.99,
                'description' => 'Màn hình thông minh Google Nest Hub.',
                'thumbnail' => 'https://example.com/images/google_nest_hub_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Microsoft Xbox Series X',
                'price' => 499.99,
                'description' => 'Máy chơi game Microsoft Xbox Series X.',
                'thumbnail' => 'https://example.com/images/xbox_series_x_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'PlayStation 5',
                'price' => 499.99,
                'description' => 'Máy chơi game PlayStation 5, trải nghiệm game tuyệt vời.',
                'thumbnail' => 'https://example.com/images/playstation5_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Dell Alienware M15',
                'price' => 1999.99,
                'description' => 'Laptop chơi game Dell Alienware M15.',
                'thumbnail' => 'https://example.com/images/alienware_m15_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Acer Predator Helios 300',
                'price' => 1299.99,
                'description' => 'Laptop chơi game Acer Predator Helios 300.',
                'thumbnail' => 'https://example.com/images/predator_helios300_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'HP Spectre x360',
                'price' => 1399.99,
                'description' => 'Laptop HP Spectre x360, thiết kế đẹp và hiệu năng cao.',
                'thumbnail' => 'https://example.com/images/hp_spectre_x360_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Oculus Quest 2',
                'price' => 299.99,
                'description' => 'Kính thực tế ảo Oculus Quest 2, trải nghiệm game chân thật.',
                'thumbnail' => 'https://example.com/images/oculus_quest2_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Apple Mac Mini M1',
                'price' => 699.99,
                'description' => 'Máy tính để bàn Apple Mac Mini M1, hiệu năng vượt trội.',
                'thumbnail' => 'https://example.com/images/mac_mini_m1_thumbnail.jpg',
                'category_id' => rand(26, 36),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];

        // Mỗi thumbnail trong dữ liệu trên đều là một URL trực tiếp, đảm bảo có thể tải hình ảnh mà không gặp lỗi.



        // Kiểm tra và thêm dữ liệu vào bảng product
        $productTable = $this->table('product');
        $productTable->insert($data)->saveData();
    }
}
