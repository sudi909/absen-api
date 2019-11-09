<?php

namespace App\Console\Commands;

use App\Models\Mahasiswa\MahasiswaList;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class SyncMahasiswa extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mahasiswa:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync Mahasiswa with Siakad BTP & ITEBA';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $students = [];
        if (env('USE_SIAKAD_BTP')) {
            $btp = DB::connection('siakad_btp')
                ->select(
                    DB::raw("
                    SELECT nim, name, 'btp' as `uni`, (
                        SELECT name FROM prodi WHERE prodi.uuid = mr.prodi_uuid
                    ) as prodi_name
                    FROM mahasiswa_details md
                    INNER JOIN mahasiswa_registers mr ON md.uuid = mr.mahasiswa_uuid
                    ORDER BY nim ASC
                    ")
                );
            
            $students = array_merge($students, $btp);
        }
        
        if (env('USE_SIAKAD_ITEBA')) {
            $iteba = DB::connection('siakad_iteba')
                ->select(
                    DB::raw("
                    SELECT nim, name, 'iteba' as `uni`, (
                        SELECT name FROM prodi WHERE prodi.uuid = mr.prodi_uuid
                    ) as prodi_name
                    FROM mahasiswa_details md
                    INNER JOIN mahasiswa_registers mr ON md.uuid = mr.mahasiswa_uuid
                    ORDER BY nim ASC
                    ")
                );
            
            $students = array_merge($students, $iteba);
        }
        
        $students = collect($students);
        
        foreach ($students as $student) {
            MahasiswaList::updateOrCreate([
                'nim' => $student->nim
            ], collect($student)->toArray());
        }
        
    }
}
