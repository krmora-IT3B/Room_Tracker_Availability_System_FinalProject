<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            [
                'name' => 'Room 001',
                'capacity' => 40,
                'equipment' => 'White Board, Arm Chair, Ceiling Fan',
                'floor' => 'Ground Floor',
                'status' => 'available',
            ],
            [
                'name' => 'Room 002',
                'capacity' => 50,
                'equipment' => 'Whiteboard, Arm Chair, Ceiling Fan, Teacher Table Chair',
                'floor' => 'Ground Floor',
                'status' => 'available',
            ],
            [
                'name' => 'Room 003',
                'capacity' => 50,
                'equipment' => 'White Board, Arm Chair, Ceiling Fan, Teacher Table',
                'floor' => 'Ground Floor',
                'status' => 'maintenance',
            ],
            [
                'name' => 'Room 004',
                'capacity' => 50,
                'equipment' => 'White Board, Arm Chair, Ceiling Fan, Teacher Table',
                'floor' => 'Ground Floor',
                'status' => 'available',
            ],
            [
                'name' => 'Room 005',
                'capacity' => 50,
                'equipment' => 'White Board, Arm Chair, Ceiling Fan, Teacher Table',
                'floor' => 'Ground Floor',
                'status' => 'available',
            ],
            [
                'name' => 'Room 006',
                'capacity' => 50,
                'equipment' => 'White Board, Projector, Arm Chair, Ceiling Fan, Teacher Table',
                'floor' => 'Ground Floor',
                'status' => 'available',
            ],
            [
                'name' => 'MAC Lab',
                'capacity' => 55,
                'equipment' => 'Lab Equipment, Computers, Chairs, Aircon, Ceiling Fan, TV, Clearboard, Standing Desk',
                'floor' => '2nd Floor',
                'status' => 'occupied',
            ],
            [
                'name' => 'Open Lab',
                'capacity' => 55,
                'equipment' => 'Lab Equipment, Computers, Chairs, Aircon, Ceiling Fan, TV, Clearboard, Standing Desk',
                'floor' => '2nd Floor',
                'status' => 'available',
            ],
            [
                'name' => 'IT Lab 1',
                'capacity' => 55,
                'equipment' => 'Lab Equipment, Computers, Chairs, Aircon, Ceiling Fan, TV, Clearboard, Standing Desk',
                'floor' => '3rd Floor',
                'status' => 'available',
            ],
            [
                'name' => 'IT Lab 2',
                'capacity' => 55,
                'equipment' => 'Lab Equipment, Computers, Chairs, Aircon, Ceiling Fan, TV, Clearboard, Standing Desk',
                'floor' => '3rd Floor',
                'status' => 'available',
            ],
            [
                'name' => 'ERP Lab',
                'capacity' => 55,
                'equipment' => 'Lab Equipment, Computers, Chairs, Aircon, Ceiling Fan, TV, Clearboard, Standing Desk',
                'floor' => '3rd Floor',
                'status' => 'maintenance',
            ],
            [
                'name' => 'CS Lab',
                'capacity' => 55,
                'equipment' => 'Lab Equipment, Computers, Chairs, Aircon, Ceiling Fan, TV, Clearboard, Standing Desk',
                'floor' => '3rd Floor',
                'status' => 'occupied',
            ],
            [
                'name' => 'Research Room',
                'capacity' => 55,
                'equipment' => 'Lab Equipment, Computers, Chairs, Aircon, Ceiling Fan, TV, Clearboard, Standing Desk',
                'floor' => '4th Floor',
                'status' => 'available',
            ],
            [
                'name' => 'LIS Lab',
                'capacity' => 55,
                'equipment' => 'Lab Equipment, Computers, Chairs, Aircon, Ceiling Fan, TV, Clearboard, Standing Desk',
                'floor' => '4th Floor',
                'status' => 'available',
            ],
            [
                'name' => 'NAS Lab',
                'capacity' => 60,
                'equipment' => 'Lab Equipment, Computers, Chairs, Aircon, Ceiling Fan, TV, Clearboard, Standing Desk',
                'floor' => '4th Floor',
                'status' => 'available',
            ],
            [
                'name' => 'RISE Lab',
                'capacity' => 55,
                'equipment' => 'Lab Equipment, Computers, Chairs, Aircon, Ceiling Fan, TV, Clearboard, Standing Desk',
                'floor' => '4th Floor',
                'status' => 'available',
            ],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}

