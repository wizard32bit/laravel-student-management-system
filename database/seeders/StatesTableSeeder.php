<?php
namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('states')->delete();
        $states = array(
            'Austrian' => ['Burgenland', 'Carinthia', 'Lower Austria', 'Upper Austria', 'Salzburg', 'Styria', 'Vienna'],
            'Belgian' => ['Brussels', 'Flanders', 'Wallonia', 'Antwerp', 'East Flanders', 'Flemish Brabant', 'Liege'],
            'British' => ['England', 'Scotland', 'Wales', 'Northern Ireland', 'Cornwall', 'Greater London', 'Yorkshire'],
            'Danish' => ['Capital Region', 'Central Denmark', 'North Denmark', 'Zealand', 'Southern Denmark', 'North Jutland', 'South Jutland'],
            'Dutch' => ['Drenthe', 'Flevoland', 'Friesland', 'Gelderland', 'Groningen', 'Limburg', 'North Brabant'],
            'French' => ['Île-de-France', 'Provence-Alpes-Côte d\'Azur', 'Nouvelle-Aquitaine', 'Brittany', 'Normandy', 'Hauts-de-France', 'Grand Est'],
            'German' => ['Baden-Württemberg', 'Bavaria', 'Berlin', 'Brandenburg', 'Hesse', 'Lower Saxony', 'North Rhine-Westphalia'],
            'Italian' => ['Lazio', 'Lombardy', 'Tuscany', 'Campania', 'Sicily', 'Piedmont', 'Veneto'],
            'Portuguese' => ['Lisbon', 'Porto', 'Algarve', 'Madeira', 'Azores', 'Braga', 'Coimbra'],
            'Russian' => ['Moscow', 'Saint Petersburg', 'Kazan', 'Novosibirsk', 'Yekaterinburg', 'Nizhny Novgorod', 'Samara'],
            'Spanish' => ['Andalusia', 'Catalonia', 'Madrid', 'Valencia', 'Galicia', 'Basque Country', 'Castile and León'],
            'Swedish' => ['Stockholm', 'Västra Götaland', 'Skåne', 'Östergötland', 'Uppsala', 'Halland', 'Värmland'],
            'Swiss' => ['Zurich', 'Geneva', 'Bern', 'Lucerne', 'Basel-Stadt', 'Ticino', 'Aargau']
        );
        

        foreach ($states as $nationality => $stateNames) {
            // Retrieve the nationality ID from the nationalities table
            $nationality_id = DB::table('nationalities')->where('name', $nationality)->value('id');
    
            if ($nationality_id) {
                foreach ($stateNames as $stateName) {
                    // Insert the state with the associated nationality_id
                    DB::table('states')->insert([
                        'name' => $stateName,
                        'nationality_id' => $nationality_id,
                    ]);
                }
            }
        }
    } 

}