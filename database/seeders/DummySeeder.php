<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTimestamp = \DB::raw('CURRENT_TIMESTAMP');

        $store = [
            [
                'seller_id' => 2,
                'name' => 'Loja do Vendedor',
                'phone_number' => '(35) 11111-1111',
                'address' => 'Rua da Loja do Vendedor',
                'address_number' => '27',
                'neighborhood' => 'Bairro dos Vendedores',
                'zipcode' => '37503-144',
                'city' => 'Itajubá',
                'state' => 'MG',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ]
        ];
        \DB::table('stores')->insert($store);

        $products = [
            [
                'store_id' => 1,
                'name' => 'Nike SB Dunk High Pro Test Pattern Green',
                'description' => 'Tênis aleatório colocado no seeder só para propósito de testar.',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'store_id' => 1,
                'name' => 'Nike SB Dunk High Pro Test Pattern Red',
                'description' => 'Tênis aleatório colocado no seeder só para propósito de testar.',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'store_id' => 1,
                'name' => 'Nike Air Jordan 3 Mid Chicago Blue',
                'description' => 'Tênis aleatório colocado no seeder só para propósito de testar.',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'store_id' => 1,
                'name' => 'Nike Air Jordan 3 Mid Chicago Light Green',
                'description' => 'Tênis aleatório colocado no seeder só para propósito de testar.',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],[
                'store_id' => 1,
                'name' => 'Nike SB Dunk High Pro Orange',
                'description' => 'Tênis aleatório colocado no seeder só para propósito de testar.',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'store_id' => 1,
                'name' => 'Nike SB Dunk High Pro Colored',
                'description' => 'Tênis aleatório colocado no seeder só para propósito de testar.',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'store_id' => 1,
                'name' => 'Nike SB Dunk High Pro Black I',
                'description' => 'Tênis aleatório colocado no seeder só para propósito de testar.',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'store_id' => 1,
                'name' => 'Nike SB Dunk Rattlesnake Safari',
                'description' => 'Tênis aleatório colocado no seeder só para propósito de testar.',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ]
        ];
        \DB::table('products')->insert($products);

        $products_infos = [
            [
                'product_id' => 1,
                'size' => 42,
                'brand' => 'Nike',
                'model' => 'SB Dunk High',
                'stock' => 5,
                'price' => 1290.00,
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],[
                'product_id' => 2,
                'size' => 42,
                'brand' => 'Nike',
                'model' => 'SB Dunk High',
                'stock' => 5,
                'price' => 1290.00,
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],[
                'product_id' => 3,
                'size' => 42,
                'brand' => 'Nike',
                'model' => 'Air Jordan 3',
                'stock' => 5,
                'price' => 1290.00,
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],[
                'product_id' => 4,
                'size' => 42,
                'brand' => 'Nike',
                'model' => 'Air Jordan 3',
                'stock' => 5,
                'price' => 1290.00,
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],[
                'product_id' => 5,
                'size' => 42,
                'brand' => 'Nike',
                'model' => 'SB Dunk High',
                'stock' => 5,
                'price' => 1290.00,
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],[
                'product_id' => 6,
                'size' => 42,
                'brand' => 'Nike',
                'model' => 'SB Dunk High',
                'stock' => 5,
                'price' => 1290.00,
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],[
                'product_id' => 7,
                'size' => 42,
                'brand' => 'Nike',
                'model' => 'SB Dunk High',
                'stock' => 5,
                'price' => 1290.00,
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],[
                'product_id' => 8,
                'size' => 42,
                'brand' => 'Nike',
                'model' => 'SB Dunk',
                'stock' => 5,
                'price' => 1290.00,
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
        ];
        \DB::table('product_infos')->insert($products_infos);

        $delivery_infos = [
            [
                'user_id' => 2,
                'recipient_name' => 'Fábio',
                'zipcode' => '37503-144',
                'address' => 'Rua Teste',
                'number' => '00',
                'neighborhood' => 'Bairro teste',
                'city' => 'Itajubá',
                'state' => 'MG',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ]
        ];
        \DB::table('delivery_infos')->insert($delivery_infos);

        $orders = [
            [
                'buyer_id' => 2,
                'store_id' => 1,
                'delivery_info_id' => 1,
                'total_price' => '1500',
                'shipping_fee' => '12',
                'is_paid' => true,
                'is_delivered' => true,
                'order_date' => $currentTimestamp,
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ]
        ];
        \DB::table('orders')->insert($orders);

        $order_product = [
            [
                'order_id' => 1,
                'product_info_id' => 1,
                'quantity' => 1,
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ]
        ];
        \DB::table('order_product')->insert($order_product);
    }
}
