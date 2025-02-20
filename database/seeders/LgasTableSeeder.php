<?php
namespace Database\Seeders;

use App\Models\Lga;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class LgasTableSeeder extends Seeder
{

    public function run()
    {
        // Delete any existing records in the lgas table to avoid duplicates
        DB::table('lgas')->delete();

        // Define the LGAs for each state
        $lgas = [
            'Austrian' => [
                'Burgenland' => ['Eisenstadt', 'Oberwart', 'Neusiedl am See'],
                'Carinthia' => ['Klagenfurt', 'Villach', 'Spittal an der Drau'],
                'Lower Austria' => ['St. Pölten', 'Krems', 'Amstetten'],
                'Upper Austria' => ['Linz', 'Wels', 'Steyr'],
                'Salzburg' => ['Salzburg', 'Hallein', 'Bischofshofen'],
                'Styria' => ['Graz', 'Leoben', 'Kapfenberg'],
                'Vienna' => ['Vienna', 'Favoriten', 'Simmering'],
            ],
            'Belgian' => [
                'Brussels' => ['Brussels-City', 'Schaerbeek', 'Ixelles'],
                'Flanders' => ['Antwerp', 'Ghent', 'Bruges'],
                'Wallonia' => ['Liège', 'Namur', 'Charleroi'],
                'Antwerp' => ['Antwerp', 'Mechelen', 'Boom'],
                'East Flanders' => ['Ghent', 'Sint-Niklaas', 'Lokeren'],
                'Flemish Brabant' => ['Leuven', 'Halle', 'Tienen'],
                'Liege' => ['Liège', 'Verviers', 'Herstal'],
            ],
            'British' => [
                'England' => ['London', 'Manchester', 'Birmingham'],
                'Scotland' => ['Edinburgh', 'Glasgow', 'Aberdeen'],
                'Wales' => ['Cardiff', 'Swansea', 'Newport'],
                'Northern Ireland' => ['Belfast', 'Derry', 'Lisburn'],
                'Cornwall' => ['Truro', 'Falmouth', 'Penzance'],
                'Greater London' => ['Westminster', 'Camden', 'Hackney'],
                'Yorkshire' => ['Leeds', 'Sheffield', 'Bradford'],
            ],
            'Danish' => [
                'Capital Region' => ['Copenhagen', 'Frederiksberg', 'Helsingør'],
                'Central Denmark' => ['Aarhus', 'Randers', 'Viborg'],
                'North Denmark' => ['Aalborg', 'Hjørring', 'Thisted'],
                'Zealand' => ['Roskilde', 'Næstved', 'Greve'],
                'Southern Denmark' => ['Odense', 'Kolding', 'Vejle'],
                'North Jutland' => ['Aalborg', 'Hjørring', 'Thisted'],
                'South Jutland' => ['Esbjerg', 'Kolding', 'Vejle'],
            ],
            'Dutch' => [
                'Drenthe' => ['Assen', 'Emmen', 'Hoogeveen'],
                'Flevoland' => ['Lelystad', 'Almere', 'Dronten'],
                'Friesland' => ['Leeuwarden', 'Heerenveen', 'Drachten'],
                'Gelderland' => ['Arnhem', 'Nijmegen', 'Ede'],
                'Groningen' => ['Groningen', 'Delfzijl', 'Appingedam'],
                'Limburg' => ['Maastricht', 'Venlo', 'Roermond'],
                'North Brabant' => ['Eindhoven', 'Tilburg', 'Breda'],
            ],
            'French' => [
                'Île-de-France' => ['Paris', 'Versailles', 'Boulogne-Billancourt'],
                'Provence-Alpes-Côte d\'Azur' => ['Marseille', 'Nice', 'Toulon'],
                'Nouvelle-Aquitaine' => ['Bordeaux', 'Limoges', 'Poitiers'],
                'Brittany' => ['Rennes', 'Brest', 'Quimper'],
                'Normandy' => ['Rouen', 'Caen', 'Le Havre'],
                'Hauts-de-France' => ['Lille', 'Amiens', 'Arras'],
                'Grand Est' => ['Strasbourg', 'Reims', 'Metz'],
            ],
            'German' => [
                'Baden-Württemberg' => ['Stuttgart', 'Mannheim', 'Karlsruhe'],
                'Bavaria' => ['Munich', 'Nuremberg', 'Augsburg'],
                'Berlin' => ['Berlin', 'Charlottenburg', 'Mitte'],
                'Brandenburg' => ['Potsdam', 'Cottbus', 'Frankfurt (Oder)'],
                'Hesse' => ['Frankfurt', 'Wiesbaden', 'Darmstadt'],
                'Lower Saxony' => ['Hanover', 'Göttingen', 'Braunschweig'],
                'North Rhine-Westphalia' => ['Cologne', 'Düsseldorf', 'Dortmund'],
            ],
            'Italian' => [
                'Lazio' => ['Rome', 'Frosinone', 'Tivoli'],
                'Lombardy' => ['Milan', 'Bergamo', 'Brescia'],
                'Tuscany' => ['Florence', 'Pisa', 'Siena'],
                'Campania' => ['Naples', 'Salerno', 'Caserta'],
                'Sicily' => ['Palermo', 'Catania', 'Messina'],
                'Piedmont' => ['Turin', 'Alessandria', 'Cuneo'],
                'Veneto' => ['Venice', 'Verona', 'Vicenza'],
            ],
            'Portuguese' => [
                'Lisbon' => ['Lisbon', 'Amadora', 'Oeiras'],
                'Porto' => ['Porto', 'Vila Nova de Gaia', 'Matosinhos'],
                'Algarve' => ['Faro', 'Portimão', 'Lagos'],
                'Madeira' => ['Funchal', 'Caniço', 'Machico'],
                'Azores' => ['Ponta Delgada', 'Angra do Heroísmo', 'Horta'],
                'Braga' => ['Braga', 'Guimarães', 'Fafe'],
                'Coimbra' => ['Coimbra', 'Figueira da Foz', 'Montemor-o-Velho'],
            ],
            'Russian' => [
                'Moscow' => ['Moscow', 'Zelenograd', 'Tushino'],
                'Saint Petersburg' => ['Saint Petersburg', 'Pushkin', 'Pavlovsk'],
                'Kazan' => ['Kazan', 'Zelenodolsk', 'Naberezhnye Chelny'],
                'Novosibirsk' => ['Novosibirsk', 'Iskitim', 'Berëzovo'],
                'Yekaterinburg' => ['Yekaterinburg', 'Verkhnyaya Pyshma', 'Karpinsk'],
                'Nizhny Novgorod' => ['Nizhny Novgorod', 'Arzamas', 'Dzerzhinsk'],
                'Samara' => ['Samara', 'Tolyatti', 'Syzran'],
            ],
            'Spanish' => [
                'Andalusia' => ['Seville', 'Malaga', 'Córdoba'],
                'Catalonia' => ['Barcelona', 'Girona', 'Lleida'],
                'Madrid' => ['Madrid', 'Alcalá de Henares', 'Getafe'],
                'Valencia' => ['Valencia', 'Alicante', 'Castellón'],
                'Galicia' => ['Santiago de Compostela', 'A Coruña', 'Vigo'],
                'Basque Country' => ['Bilbao', 'San Sebastián', 'Vitoria-Gasteiz'],
                'Castile and León' => ['Valladolid', 'Burgos', 'León'],
            ],
            'Swedish' => [
                'Stockholm' => ['Stockholm', 'Sundbyberg', 'Solna'],
                'Västra Götaland' => ['Gothenburg', 'Boras', 'Uddevalla'],
                'Skåne' => ['Malmö', 'Lund', 'Helsingborg'],
                'Östergötland' => ['Linköping', 'Norrköping', 'Motala'],
                'Uppsala' => ['Uppsala', 'Enköping', 'Tierp'],
                'Halland' => ['Halmstad', 'Varberg', 'Kungsbacka'],
                'Värmland' => ['Karlstad', 'Arvika', 'Kristinehamn'],
            ],
            'Swiss' => [
                'Zurich' => ['Zurich', 'Winterthur', 'Kloten'],
                'Geneva' => ['Geneva', 'Carouge', 'Nyon'],
                'Bern' => ['Bern', 'Thun', 'Frutigen'],
                'Lucerne' => ['Lucerne', 'Emmen', 'Sursee'],
                'Basel-Stadt' => ['Basel', 'Riehen', 'Bettingen'],
                'Ticino' => ['Lugano', 'Bellinzona', 'Locarno'],
                'Aargau' => ['Aarau', 'Zurzach', 'Lenzburg'],
            ],
        ];

        // Loop through each nationality and its states, then insert the LGAs
        foreach ($lgas as $nationality => $states) {
            foreach ($states as $stateName => $lgaNames) {
                // Retrieve the state ID from the database
                $state_id = DB::table('states')->where('name', $stateName)->value('id');
                
                if ($state_id) {
                    foreach ($lgaNames as $lgaName) {
                        // Insert the LGA with the associated state_id
                        DB::table('lgas')->insert([
                            'name' => $lgaName,
                            'state_id' => $state_id,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }
        }
    }
}






