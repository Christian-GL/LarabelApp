<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;
use App\Models\Room;
use App\Models\Booking;
use Database\Seeders\ActivitySeeder;  // Asegúrate de importar el ActivitySeeder

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Insertar datos en la tabla contacts
        $contacts = [
            [
                'publish_date' => '2024-12-29 23:16:50',
                'full_name' => 'Essie Bogisich',
                'email' => 'Nadia53@gmail.com',
                'phone_number' => '453763707',
                'comment' => 'Quos ait substantia attonbitus thorax officia barba ipsum. Vobis tum a…',
                'archived' => 'archived',
            ],
            [
                'publish_date' => '2024-06-15 23:16:50',
                'full_name' => 'Pepe Luís',
                'email' => 'Pepito@hotmail.com',
                'phone_number' => '971 44 55 66',
                'comment' => 'Quos ait substantia attonbitus thorax officia barba ipsum. Sakaletum ketum',
                'archived' => 'notArchived',
            ],
        ];

        foreach ($contacts as $data) {
            Contact::create($data);
        }

        // Insertar datos en la tabla rooms
        $rooms = [
            [
                'photos' => json_encode([
                    "https://picsum.photos/seed/ee2ZHNgM02/2707/3299?grayscale&blur=4",
                    "https://picsum.photos/seed/82bQ6spwAL/3443/324?blur=3",
                    "https://picsum.photos/seed/koaHxbj8/3508/1945?grayscale&blur=4"
                ]),
                'number' => '001',
                'type' => 'Single Bed',
                'amenities' => json_encode(["Minibar", "WiFi", "3 Bed Space"]),
                'price' => 85150.41,
                'discount' => 70.47,
            ],
            [
                'photos' => json_encode([
                    "https://picsum.photos/seed/82bQ6spwAL/3443/324?blur=3",
                    "https://picsum.photos/seed/ee2ZHNgM02/2707/3299?grayscale&blur=4",
                    "https://picsum.photos/seed/koaHxbj8/3508/1945?grayscale&blur=4"
                ]),
                'number' => '002',
                'type' => 'Suite',
                'amenities' => json_encode(["WiFi"]),
                'price' => 394.55,
                'discount' => 25.55,
            ],
        ];

        foreach ($rooms as $data) {
            Room::create($data);
        }

        // Insertar datos en la tabla bookings
        $bookings = [
            [
                'photo' => 'https://avatars.githubusercontent.com/u/2865354',
                'full_name_guest' => 'Dana Leuschke-Dare',
                'order_date' => '2025-02-21 20:52:16',
                'check_in_date' => '2026-11-06 16:46:13',
                'check_out_date' => '2027-04-14 12:58:30',
                'special_request' => 'Uter statim vivo vorax verus cibus coaegresco ater surgo vetus cursus …',
                'room_id' => 1,
            ],
            [
                'photo' => 'https://avatars.githubusercontent.com/u/33528283',
                'full_name_guest' => 'Jeff Gottlieb',
                'order_date' => '2025-02-25 15:15:11',
                'check_in_date' => '2026-07-07 05:16:22',
                'check_out_date' => '2026-08-13 14:00:53',
                'special_request' => 'Usus decens tabernus totam tempus quod umquam deporto velut cursim utr…',
                'room_id' => 1,
            ],
            [
                'photo' => 'https://cdn.jsdelivr.net/gh/faker-js/assets-person-portrait/male/512/61.jpg',
                'full_name_guest' => 'Wallace Emard',
                'order_date' => '2025-02-23 23:41:11',
                'check_in_date' => '2025-03-12 00:11:41',
                'check_out_date' => '2025-03-12 19:42:13',
                'special_request' => 'Odit carus bestia virgo amet caries peior accusator vergo crinis bellu…',
                'room_id' => 1,
            ],
        ];

        foreach ($bookings as $data) {
            Booking::create($data);
        }

        // Llamada al seeder de actividades
        $this->call(ActivitySeeder::class);  // Aquí se llama el ActivitySeeder
    }
}
