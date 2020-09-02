<?php

use App\Models\Identifier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class IdentifierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::beginTransaction();
        
        $path = database_path('base'.DIRECTORY_SEPARATOR.'data-identifier.json');
        if (file_exists($path)) {
            $identifiers = json_decode(file_get_contents($path), true);

            foreach ($identifiers as $identifier) {
                $perm = Identifier::updateOrCreate([
                    'identifier' => $identifier['identifier'],
                ], $identifier);
                if ($perm->wasRecentlyCreated) {
                    $this->command->info("Data for $identifier[identifier] created");
                } else {
                    $this->command->warn("Data for $identifier[identifier] updated");
                }
            }
        }

        DB::commit();
        Model::reguard();
    }
}
