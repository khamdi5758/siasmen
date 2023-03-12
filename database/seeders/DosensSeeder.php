<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            ['nip'=>'198805122019032016',
            'nama'=>'Laili Cahyani, S.Kom., M.Kom.',
            'jenkel'=>'Perempuan',
            'status'=>'aktif',
            'pendidikan_terakhir'=>'S2',
            'pangkat' => 'Asisten Ahli',
            'foto'=> 'defaultpr.png',
            ],
            ['nip'=>'198410222014042002',
            'nama'=>'Medika Risnasari, S.ST., M.T',
            'jenkel'=>'Perempuan',
            'status'=>'aktif',
            'pendidikan_terakhir'=>'S2',
            'pangkat' => 'Lektor',
            'foto'=> 'defaultpr.png',
            ],
            ['nip'=>'198611192014042001',
            'nama'=>'Puji Rahayu Ningsih, S.Pd., M.Pd.',
            'jenkel'=>'Perempuan',
            'status'=>'aktif',
            'pendidikan_terakhir'=>'S2',
            'pangkat' => 'Lektor',
            'foto'=> 'defaultpr.png',
            ],
            ['nip'=>'198806292015041001',
            'nama'=>'Sigit Dwi Saputro, S.Pd., M.Pd.',
            'jenkel'=>'Laki-Laki',
            'status'=>'aktif',
            'pendidikan_terakhir'=>'S3',
            'pangkat' => 'Lektor',
            'foto'=> 'defaultlk.jpg',
            ],
            ['nip'=>'198808232018031001',
            'nama'=>'Muhamad Afif Effindi, S.Kom., M.T.',
            'jenkel'=>'Laki-Laki',
            'status'=>'aktif',
            'pendidikan_terakhir'=>'S2',
            'pangkat' => 'Asisten Ahli',
            'foto'=> 'defaultlk.jpg',
            ],
            ['nip'=>'198906032019032017',
            'nama'=>'Etistika Yuni Wijaya, S.Pd., M.Pd.',
            'jenkel'=>'Perempuan',
            'status'=>'aktif',
            'pendidikan_terakhir'=>'S2',
            'pangkat' => 'Asisten Ahli',
            'foto'=> 'defaultpr.png',
            ],
            ['nip'=>'199003052019032019',
            'nama'=>'Prita Dellia, S.Kom., M.Kom',
            'jenkel'=>'Perempuan',
            'status'=>'aktif',
            'pendidikan_terakhir'=>'S2',
            'pangkat' => 'Asisten Ahli',
            'foto'=> 'defaultpr.png',
            ],
            ['nip'=>'199003132019032014',
            'nama'=>'Nuru Aini, S.Kom., M.Kom.',
            'jenkel'=>'Perempuan',
            'status'=>'aktif',
            'pendidikan_terakhir'=>'S2',
            'pangkat' => 'Asisten Ahli',
            'foto'=> 'defaultpr.png',
            ],
            ['nip'=>'199105242020121012',
            'nama'=>'Muhlis Tahir, S.Pd., M.Tr.Kom',
            'jenkel'=>'Laki-Laki',
            'status'=>'aktif',
            'pendidikan_terakhir'=>'S2',
            'pangkat' => 'Asisten Ahli',
            'foto'=> 'defaultlk.jpg',
            ],
            ['nip'=>'198207242014041003',
            'nama'=>'Muchamad Arif, S.Pd., M.Pd.',
            'jenkel'=>'Laki-Laki',
            'status'=>'aktif',
            'pendidikan_terakhir'=>'S2',
            'pangkat' => 'Lektor',
            'foto'=> 'defaultlk.jpg',
            ],
        ];

        foreach ($data as $value) {
            
            DB::table('dosens')->insert([
                'nip'=>$value['nip'],
                'nama'=>$value['nama'],
                'jenkel'=>$value['jenkel'],
                'status'=>$value['status'],
                'pendidikan_terakhir'=>$value['pendidikan_terakhir'],
                'pangkat' => $value['pangkat'],
                'foto'=> $value['foto'],
                'created_at'=> Carbon::now(),
                'updated_at'=>Carbon::now()
            ]);
        }
    }
}
