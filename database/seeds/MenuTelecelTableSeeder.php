<?php

namespace Database\Seeders;
use App\Models\TypeMenu;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\User;
use App\Models\Menu;
use Illuminate\Support\Str;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        $faker=Factory::create();
        $users=User::all();

        $sousmenu1 = [
            ['id' => 1 ,'ordre' => 1,'selecteur'=> 1,'nom' => 'HORSOCOPE','parent_id'=>2,'sc_id'=>'','keyword'=>'','description'=>''],
            ['id' => 2 ,'ordre' => 2,'selecteur'=> 2,'nom' => 'ACTUALITE','parent_id'=>2,'sc_id'=>'','keyword'=>'','description'=>''],
            ['id' => 3 ,'ordre' => 3,'selecteur'=> 3,'nom' => 'SORTIE ET LOISIRS','parent_id'=>2,'sc_id'=>'','keyword'=>'','description'=>''],
            ['id' => 4 ,'ordre' => 4,'selecteur'=> 4,'nom' => 'PMU','parent_id'=>2,'sc_id'=>'','keyword'=>'','description'=>''],
            ['id' => 5 ,'ordre' => 5,'selecteur'=> 5,'nom' => 'DIVERTISSEMENT','parent_id'=>2,'sc_id'=>'','keyword'=>'','description'=>''],
            ['id' => 7 ,'ordre' => 7,'selecteur'=> 7,'nom' => 'RELIGIONS','parent_id'=>2,'sc_id'=>'','keyword'=>'','description'=>''],
            ['id' => 8 ,'ordre' => 8,'selecteur'=> 8,'nom' => 'METEO','parent_id'=>2,'sc_id'=>'','keyword'=>'','description'=>''],
            
        ];
        $sousmenu2 = [
            ['id' => 1 ,'ordre' => 1,'selecteur'=> 1,'nom' => 'HOROSCOPE Quotidien','parent_id'=>1,'sc_id'=>'','keyword'=>'','description'=>''],
            ['id' => 2 ,'ordre' => 2,'selecteur'=> 2,'nom' => 'HOROSCOPE Amour','parent_id'=>1,'sc_id'=>'','keyword'=>'','description'=>''],
            ['id' => 3 ,'ordre' => 3,'selecteur'=> 3,'nom' => 'HOROSCOPE Argent','parent_id'=>1,'sc_id'=>'','keyword'=>'','description'=>''],
            ['id' => 4 ,'ordre' => 4,'selecteur'=> 4,'nom' => 'HOROSCOPE Sante','parent_id'=>1,'sc_id'=>'','keyword'=>'','description'=>''],
            ['id' => 5 ,'ordre' => 5,'selecteur'=> 5,'nom' => 'HOROSCOPE Travail','parent_id'=>1,'sc_id'=>'','keyword'=>'','description'=>''],
            ['id' => 7 ,'ordre' => 7,'selecteur'=> 7,'nom' => 'HOROSCOPE Famille','parent_id'=>1,'sc_id'=>'','keyword'=>'','description'=>''],
            ['id' => 8 ,'ordre' => 8,'selecteur'=> 8,'nom' => 'ACTUALITE','parent_id'=>2,'sc_id'=>'','keyword'=>'','description'=>''],
            ['id' => 8 ,'ordre' => 8,'selecteur'=> 8,'nom' => 'MEDIAS','parent_id'=>2,'sc_id'=>'','keyword'=>'','description'=>''],
            ['id' => 8 ,'ordre' => 8,'selecteur'=> 8,'nom' => 'SPORTS','parent_id'=>2,'sc_id'=>'','keyword'=>'','description'=>''],
            ['id' => 8 ,'ordre' => 8,'selecteur'=> 8,'nom' => 'ACTUALITE','parent_id'=>2,'sc_id'=>'','keyword'=>'','description'=>''],
            ['id' => 8 ,'ordre' => 8,'selecteur'=> 8,'nom' => 'ACTUALITE','parent_id'=>2,'sc_id'=>'','keyword'=>'','description'=>''],
            ['id' => 8 ,'ordre' => 8,'selecteur'=> 8,'nom' => 'ACTUALITE','parent_id'=>2,'sc_id'=>'','keyword'=>'','description'=>''],
        ];
        $liste = [
                    [
                        'nom' => 'Météo',
                        'parent_id' => ,
                        'liste' =>[
                            'Gaoua',
                            'Dori',
                            'Fada',
                            'Manga',
                            'Ziniaré',
                            'Kaya',
                            'Tenkodogo',
                            'Dédougou',
                            'Koudougou',
                            'Banfora',
                            'Ouahigouya',
                            'Bobo Dioulasso',
                            'Ouagadougou',
                        ]
                    ],
                    [
                        'nom' => 'PMU',
                        'parent_id' => '',
                        'liste' =>[
                            'Pronostiqueurs 4',
                            'Pronostiqueurs 3',
                            'Pronostiqueurs 2',
                            'Pronostiqueurs 1',
                            'Coup de Coeur',
                            'Cheval du jour',
                            'Dernière minute',
                            'Non partant officiel',
                            'Rapport Gains du jour',
                            'Résultats du jour',
                            '5 dernières années',
                            'Tocards du jours',
                            'Pronostiques hippiques',
                        ]
                    ],

                    [
                            'nom' => 'SERVICE FOOT',
                            'parent_id' => '',
                            'liste' =>[
                                'Can',
                                'Copa',
                                'Coupe du monde',
                                'Euro',
                                'Europa League',
                                'League des Champions',
                                'National',
                                'Autres'
                            ]
                    ],

                    [
                            'nom' => 'Actu SPORT',
                            'parent_id' => '',
                            'liste' =>[
                                'Coupe du monde',
                                'Coupe d\'Afrique',
                                'Coupe d\'Europe',
                                'League',
                                'National',
                                'Autres'
                            ]
                    ],
                    [
                        'nom' => 'Actu REGION',
                        'parent_id' => '',
                        'liste' =>[
                            'Asie Pacifique',
                            'Ameriques',
                            'Moyen Orient',
                            'Afrique',
                            'France',
                            'Monde',
                            'Burkina Faso'
                        ]
                    ],
                    [
                            'nom' => 'Actu THEMATIQUE',
                            'parent_id' => '',
                            'liste' =>[
                                'Découvertes',
                                'Planète',
                                'Culture',
                                'Sports',
                                'Economie',
                            ]
                    ],
                    [
                            'nom' => 'AEROPORTS',
                            'parent_id' => '',
                            'liste' =>[
                                'BOBO DIOULASSO',
                                'OUAGADOUGOU',
                            ]
                    ],
                    [
                        'nom' => 'AGENCE IMMOBLIIERES',
                        'parent_id' => '',
                        'liste' =>[
                            'BOBO DIOULASSO',
                            'OUAGADOUGOU',
                        ]
                    ],
                    [
                    'nom' => 'AGENCE LOCATION VEHICULE',
                    'parent_id' => '',
                    'liste' =>[
                        'MOGG(Magic Ophir Garage Général)',
                        'National Location',
                        'Kili Kili',
                        'Europcar GR. Bangrin',
                        'Diacfa auto national',
                        'CFAO motors avis',
                        'Avis',
                        'Dez Auto',
                        'ADA',
                        'BOBO DIOULASSO',
                        'OUAGADOUGOU',
                    ]
                    ],
                    [
                    'nom' => 'AMBULANCE',
                    'parent_id' => '',
                    'liste' =>[
                        'BOBO DIOULASSO',
                        'OUAGADOUGOU',
                    ]
                    ],
                    [
                    'nom' => 'ASSURANCES',
                    'parent_id' => '',
                    'liste' =>[
                        'GLOBUS-RE',
                        'YELEN',
                        'JACKSON',
                        'CORIS',
                        'SAHAM',
                        'GA IARD',
                        'UAB IARDT',
                        'SUNU IARD',
                        'SONAR IARD',
                        'SAHAM VIE',
                        'CORIS VIE',
                        'CIF VIE',
                        'SUNU VIE',
                        'GA VIE',
                        'UAB VIE',
                        'SONAR VIE',
                        'ASSURANCE BOBO',
                        'ASSURANCE OUAGA',
                    ]
                    ],
                    [
                    'nom' => 'BANQUES',
                    'parent_id' => '',
                    'liste' =>[
                    'SAFCA',
                    'SOFIGIB',
                    'SOBCA',
                    'FIDELIS',
                    'CBAO',
                    'ORABANK',
                    'UBA',
                    'SOCIETE GENERALE',
                    'BDU BF',
                    'ECOBANK',
                    'CORIS BANK',
                    'BSIC',
                    'BICIAB',
                    'IB BANK',
                    'BCB',
                    'BADF',
                    'BANQUE ATLANTIQUE',
                    'BOA',
                    'WBI',
                    'Banque Bobo',
                    'Banque Ouaga',                                             
                    ]
                    ],
                    [
                    'nom' => 'Boite de nuit',
                    'parent_id' => '',
                    'liste' =>[
                        'Sud Ouest Gaoua',
                        'Sahel Dori',
                        'Est FADA',
                        'Centre Sud Manga',
                        'Plateau Central Ziniaré',
                        'Centre Nord Kaya',
                        'Centre Est Tenkodogo',
                        'Boucle du Mouhoun Dédougou',
                        'Centre Ouest Koudougou',
                        'Cascades Banfora',
                        'Nord Ouahigouya',
                        'Haut Bassins Bobo Dioulasso',
                        'Centre Ouagadougou',
                    ]
                    ],
                    [
                    'nom' => 'CASINOS',
                    'parent_id' => '',
                    'liste' =>[
                        'BOBO DIOULASSO',
                        'OUAGADOUGOU',
                    ]
                    ],
                    [
                    'nom' => 'CLINIQUES',
                    'parent_id' => '',
                    'liste' =>[
                    'Sud Ouest Gaoua',
                    'Sahel Dori',
                    'Est FADA',
                    'Centre Sud Manga',
                    'Plateau Central Ziniaré',
                    'Centre Nord Kaya',
                    'Centre Est Tenkodogo',
                    'Boucle du Mouhoun Dédougou',
                    'Centre Ouest Koudougou',
                    'Cascades Banfora',
                    'Nord Ouahigouya',
                    'Haut Bassins Bobo Dioulasso',
                    'Centre Ouagadougou',
                    ]
                    ],
                    [
                    'nom' => 'Compagnies Aériennes',
                    'parent_id' => '',
                    'liste' =>[
                    'Air Antrack',
                    'Point Afrique',
                    'Brussels Airlines',
                    'Air Cote divoir',
                    'Faso Airway',
                    'Cameroon Airlines',
                    'Air lines',
                    'Air Mali',
                    'Air Pointafrik',
                    'Air mauritanie',
                    'Air Ghana',
                    'Air Sénégal',
                    'Air DHL',
                    'Air Asky',
                    'Air Ethiopia',
                    'Air Algérie',
                    'Air Maroc',
                    'Air Afriquya',
                    'Air Ivoire',
                    'Air France',
                    'Air Burkina',
                    ]
                    ],
                    [
                    'nom' => 'AMBULANCE',
                    'parent_id' => '',
                    'liste' =>[
                    'BOBO DIOULASSO',
                    'OUAGADOUGOU',
                    ]
                    ],
                    [
                            'nom' => 'Actu THEMATIQUE',
                            'parent_id' => '',
                            'liste' =>[
                                'Découvertes',
                                'Planète',
                                'Culture',
                                'Sports',
                                'Economie',
                            ]
                    ],
                    [
                            'nom' => 'AEROPORTS',
                            'parent_id' => '',
                            'liste' =>[
                                'BOBO DIOULASSO',
                                'OUAGADOUGOU',
                            ]
                    ],
                    [
                        'nom' => 'AGENCE IMMOBLIIERES',
                        'parent_id' => '',
                        'liste' =>[
                            'BOBO DIOULASSO',
                            'OUAGADOUGOU',
                        ]
                    ],
                    [
                    'nom' => 'AGENCE LOCATION VEHICULE',
                    'parent_id' => '',
                    'liste' =>[
                        'MOGG(Magic Ophir Garage Général)',
                        'National Location',
                        'Kili Kili',
                        'Europcar GR. Bangrin',
                        'Diacfa auto national',
                        'CFAO motors avis',
                        'Avis',
                        'Dez Auto',
                        'ADA',
                        'BOBO DIOULASSO',
                        'OUAGADOUGOU',
                    ]
                    ],
                    [
                    'nom' => 'AMBULANCE',
                    'parent_id' => '',
                    'liste' =>[
                        'BOBO DIOULASSO',
                        'OUAGADOUGOU',
                    ]
                    ],
                    [
                    'nom' => 'ASSURANCES',
                    'parent_id' => '',
                    'liste' =>[
                        'GLOBUS-RE',
                        'YELEN',
                        'JACKSON',
                        'CORIS',
                        'SAHAM',
                        'GA IARD',
                        'UAB IARDT',
                        'SUNU IARD',
                        'SONAR IARD',
                        'SAHAM VIE',
                        'CORIS VIE',
                        'CIF VIE',
                        'SUNU VIE',
                        'GA VIE',
                        'UAB VIE',
                        'SONAR VIE',
                        'ASSURANCE BOBO',
                        'ASSURANCE OUAGA',
                    ]
                    ],
                    [
                    'nom' => 'BANQUES',
                    'parent_id' => '',
                    'liste' =>[
                    'SAFCA',
                    'SOFIGIB',
                    'SOBCA',
                    'FIDELIS',
                    'CBAO',
                    'ORABANK',
                    'UBA',
                    'SOCIETE GENERALE',
                    'BDU BF',
                    'ECOBANK',
                    'CORIS BANK',
                    'BSIC',
                    'BICIAB',
                    'IB BANK',
                    'BCB',
                    'BADF',
                    'BANQUE ATLANTIQUE',
                    'BOA',
                    'WBI',
                    'Banque Bobo',
                    'Banque Ouaga',                                             
                    ]
                    ],
                    [
                    'nom' => 'Boite de nuit',
                    'parent_id' => '',
                    'liste' =>[
                        'Sud Ouest Gaoua',
                        'Sahel Dori',
                        'Est FADA',
                        'Centre Sud Manga',
                        'Plateau Central Ziniaré',
                        'Centre Nord Kaya',
                        'Centre Est Tenkodogo',
                        'Boucle du Mouhoun Dédougou',
                        'Centre Ouest Koudougou',
                        'Cascades Banfora',
                        'Nord Ouahigouya',
                        'Haut Bassins Bobo Dioulasso',
                        'Centre Ouagadougou',
                    ]
                    ],
                    [
                    'nom' => 'CASINOS',
                    'parent_id' => '',
                    'liste' =>[
                        'BOBO DIOULASSO',
                        'OUAGADOUGOU',
                    ]
                    ],
                    [
                    'nom' => 'CLINIQUES',
                    'parent_id' => '',
                    'liste' =>[
                    'Sud Ouest Gaoua',
                    'Sahel Dori',
                    'Est FADA',
                    'Centre Sud Manga',
                    'Plateau Central Ziniaré',
                    'Centre Nord Kaya',
                    'Centre Est Tenkodogo',
                    'Boucle du Mouhoun Dédougou',
                    'Centre Ouest Koudougou',
                    'Cascades Banfora',
                    'Nord Ouahigouya',
                    'Haut Bassins Bobo Dioulasso',
                    'Centre Ouagadougou',
                    ]
                    ],
                    [
                    'nom' => 'Compagnies Aériennes',
                    'parent_id' => '',
                    'liste' =>[
                    'Air Antrack',
                    'Point Afrique',
                    'Brussels Airlines',
                    'Air Cote divoir',
                    'Faso Airway',
                    'Cameroon Airlines',
                    'Air lines',
                    'Air Mali',
                    'Air Pointafrik',
                    'Air mauritanie',
                    'Air Ghana',
                    'Air Sénégal',
                    'Air DHL',
                    'Air Asky',
                    'Air Ethiopia',
                    'Air Algérie',
                    'Air Maroc',
                    'Air Afriquya',
                    'Air Ivoire',
                    'Air France',
                    'Air Burkina',
                    ]
                    ],
                    [
                    'nom' => 'CULTURE',
                    'parent_id' => '',
                    'liste' =>[
                    'Culture Sitho',
                    'Culture SNC',
                    'Culture Fespaco',
                    'Culture Siao',
                    'Culture Autres'
                    ]
                    ],
                    [
                    'nom' => 'DIVERTISSEMENT',
                    'parent_id' => '',
                    'liste' =>[
                    'Net de la semaine',
                    'Astuce ce la semaine',
                    'Proverbe de la semaine',
                    'Pensée de la semaine',
                    'Citation du jour',
                    'Blague du jour',
                    ]
                    ],
                    [
                    'nom' => 'HOPITAUX',
                    'parent_id' => '',
                    'liste' =>[
                    'Sud Ouest GaouSa',
                    'Sahel Dori',
                    'Est FADA',
                    'Centre Sud Manga',
                    'Plateau Central Ziniaré',
                    'Centre Nord Kaya',
                    'Centre Est Tenkodogo',
                    'Boucle du Mouhoun Dédougou',
                    'Centre Ouest Koudougou',
                    'Cascades Banfora',
                    'Nord Ouahigouya',
                    'Haut Bassins Bobo Dioulasso',
                    'Centre Ouagadougou',
                    ]
                    ],
                    [
                    'nom' => 'HOROSCOPE AMOUR',
                    'parent_id' => '',
                    'liste' =>[
                    'Poisson',
                    'Verseau',
                    'Capricorne',
                    'Sagittaire',
                    'Scorpion',
                    'Balance',
                    'Vierge',
                    'Lion',
                    'Gemeaux',
                    'taureau',
                    'Bélier',
                    ]
                    ],
                    [
                    'nom' => 'HOROSCOPE ARGENT',
                    'parent_id' => '',
                    'liste' =>[
                    'Poisson',
                    'Verseau',
                    'Capricorne',
                    'Sagittaire',
                    'Scorpion',
                    'Balance',
                    'Vierge',
                    'Lion',
                    'Gemeaux',
                    'taureau',
                    'Bélier',
                    ]
                    ],
                    [
                    'nom' => 'HOROSCOPE FAMILLE',
                    'parent_id' => '',
                    'liste' =>[
                    'Poisson',
                    'Verseau',
                    'Capricorne',
                    'Sagittaire',
                    'Scorpion',
                    'Balance',
                    'Vierge',
                    'Lion',
                    'Gemeaux',
                    'taureau',
                    'Bélier',
                    ]
                    ],
                    [
                    'nom' => 'HOROSCOPE QUOTIDIEN',
                    'parent_id' => '',
                    'liste' =>[
                    'Poisson',
                    'Verseau',
                    'Capricorne',
                    'Sagittaire',
                    'Scorpion',
                    'Balance',
                    'Vierge',
                    'Lion',
                    'Gemeaux',
                    'taureau',
                    'Bélier',
                    ]
                    ],
                    [
                    'nom' => 'HOROSCOPE SANTE',
                    'parent_id' => '',
                    'liste' =>[
                    'Poisson',
                    'Verseau',
                    'Capricorne',
                    'Sagittaire',
                    'Scorpion',
                    'Balance',
                    'Vierge',
                    'Lion',
                    'Gemeaux',
                    'taureau',
                    'Bélier',
                    ]
                    ],
                    [
                    'nom' => 'HOROSCOPE TRAVAIL',
                    'parent_id' => '',
                    'liste' =>[
                    'Poisson',
                    'Verseau',
                    'Capricorne',
                    'Sagittaire',
                    'Scorpion',
                    'Balance',
                    'Vierge',
                    'Lion',
                    'Gemeaux',
                    'taureau',
                    'Bélier',
                    ]
                    ],
                    [
                    'nom' => 'HOTEL',
                    'parent_id' => '',
                    'liste' =>[
                    'Sud Ouest Gaoua',
                    'Sahel Dori',
                    'Est FADA',
                    'Centre Sud Manga',
                    'Plateau Central Ziniaré',
                    'Centre Nord Kaya',
                    'Centre Est Tenkodogo',
                    'Boucle du Mouhoun Dédougou',
                    'Centre Ouest Koudougou',
                    'Cascades Banfora',
                    'Nord Ouahigouya',
                    'Haut Bassins Bobo Dioulasso',
                    'Centre Ouagadougou',
                    ]
                    ],
                    [
                    'nom' => 'INFOS DIVERSES',
                    'parent_id' => '',
                    'liste' =>[
                    'Info denrées',
                    'Info métaux',
                    'Info matériaux',
                    'Info bourse',
                    'Info devises',
                    ]
                    ],
                    [
                    'nom' => 'INSTITUTIONS',
                    'parent_id' => '',
                    'liste' =>[
                    'Assemblee Nationale',
                    'UEMOA',
                    'CILSS',
                    'CES',
                    'CNVA',
                    ]
                    ],
                    [
                    'nom' => 'MARCHÉS',
                    'parent_id' => '',
                    'liste' =>[
                    'Date concours',
                    'Date examens',
                    'Marché Bobo',
                    'Marché Ouaga',
                    ]
                    ],
                    [
                    'nom' => 'MEDIA',
                    'parent_id' => '',
                    'liste' =>[
                    'Closer',
                    'Planète enfant',
                    'Planète jeune',
                    'Brune',
                    'Afrique fashion',
                    'Amina',
                    'Le Diplomatique',
                    'Afrique Magazine',
                    'Jeune Afrique',
                    'JJ',
                    'Pays',
                    'Observateur',
                    'Sidwaya',
                    ]
                    ],
                    [
                    'nom' => 'MICRO FINANCES',
                    'parent_id' => '',
                    'liste' =>[
                    'SID',
                    'PRODIA AC',
                    'PAMF B',
                    'MUFEDE',
                    'MIFA SA',
                    'MICROFI SA',
                    'MICROAID',
                    'MICRO START',
                    'MECP "Laafi Sira Kwieogo"',
                    'MECAP BF',
                    'MECAD PO',
                    'MEC Song Taaba',
                    'GRAINE SARL',
                    'FIPROXI SA',
                    'FINEC Burkina SA',
                    'FINACOM',
                    'FCPB',
                    'ETNA MICROFINANCE',
                    'CPB',
                    'COOPEC GALOR',
                    'COOPEC AFA',
                    'CODEC OUAGA',
                    'CIF',
                    'CEC SI',
                    'CAISSE LIGDI BAORE',
                    'C.E.C',
                    'BAOBAB',
                    'CIF',
                    'VCBM',
                    'ASSOCIATION YIKIRI',
                    'ASSIENA',
                    'APFI',
                    'ACEP BURKINA',
                    'ACFIME',
                    'Microfinance Bobo',
                    'Microfinance Ouaga'
                    ]
                    ],
                    [
                    'nom' => 'ONEA',
                    'parent_id' => '',
                    'liste' =>[
                    'Gaoua',
                    'Dori',
                    'Fada',
                    'Manga',
                    'Ziniaré',
                    'Kaya',
                    'Tenkodogo',
                    'Dédougou',
                    'Koudougou',
                    'Banfora',
                    'Ouahigouya',
                    'Bobo Dioulasso',
                    'Ouagadougou',
                    ]
                    ],
                    [
                    'nom' => 'PHARMACIES',
                    'parent_id' => '',
                    'liste' =>[
                    'Sud Ouest Gaoua',
                    'Sahel Dori',
                    'Est FADA',
                    'Centre Sud Manga',
                    'Plateau Central Ziniaré',
                    'Centre Nord Kaya',
                    'Centre Est Tenkodogo',
                    'Boucle du Mouhoun Dédougou',
                    'Centre Ouest Koudougou',
                    'Cascades Banfora',
                    'Nord Ouahigouya',
                    'Haut Bassins Bobo Dioulasso',
                    'Centre Ouagadougou',
                    ]
                    ],
                    [
                    'nom' => 'POLICE NATIONALE',
                    'parent_id' => '',
                    'liste' =>[
                    'Sud Ouest Gaoua',
                    'Sahel Dori',
                    'Est FADA',
                    'Centre Sud Manga',
                    'Plateau Central Ziniaré',
                    'Centre Nord Kaya',
                    'Centre Est Tenkodogo',
                    'Boucle du Mouhoun Dédougou',
                    'Centre Ouest Koudougou',
                    'Cascades Banfora',
                    'Nord Ouahigouya',
                    'Haut Bassins Bobo Dioulasso',
                    'Centre Ouagadougou',
                    ]
                    ],
                    [
                    'nom' => 'GENDARMERIE NATIONALE',
                    'parent_id' => '',
                    'liste' =>[
                    'Sud Ouest Gaoua',
                    'Sahel Dori',
                    'Est FADA',
                    'Centre Sud Manga',
                    'Plateau Central Ziniaré',
                    'Centre Nord Kaya',
                    'Centre Est Tenkodogo',
                    'Boucle du Mouhoun Dédougou',
                    'Centre Ouest Koudougou',
                    'Cascades Banfora',
                    'Nord Ouahigouya',
                    'Haut Bassins Bobo Dioulasso',
                    'Centre Ouagadougou',
                    ]
                    ],
                    [
                    'nom' => 'PROGRAMME CINE',
                    'parent_id' => '',
                    'liste' =>[
                    'Cine CCF',
                    'Cine Cana Olympia Yennega',
                    'Cine Melies',
                    'Cine Sagnon',
                    'Cine neerwaya',
                    'Cine Burkina',
                    ]
                    ],
                    [
                    'nom' => 'PROGRAMME TV AUTRES',
                    'parent_id' => '',
                    'liste' =>[
                    'TV arte',
                    'TV canal +',
                    'TV France 3',
                    'TV FRANCE 5',
                    'TV FRANCE 2',
                    'TV Itele',
                    'TV tf1',
                    ]
                    ],
                    [
                    'nom' => 'PROGRAMME TV BURKINA',
                    'parent_id' => '',
                    'liste' =>[
                    'Burkina Infos TV',
                    'TV Neerwaya',
                    '3TV',
                    'Savane TV',
                    'LCA tv',
                    'Omega TV',
                    'TV Tele Citoyenne',
                    'Soleil TV',
                    'Sanmatenga TV (STV)',
                    'TV Alhouda',
                    'TV MuslimTelevision Ahmadiyya (MTVA)',
                    'Impact TV',
                    'TV EL Bethel TV',
                    'TV Canal Viim Koega (CVK)',
                    'TVZ Africa',
                    'TV BF1',
                    'TV Canal3',
                    'TV smtv',
                    'TV africable',
                    'TV tv5',
                    'TV tnb',
                    'TV canal',
                    'TV arte',
                    'TV canal +',
                    'TV France 3',
                    'TV FRANCE 5',
                    'TV FRANCE 2',
                    'TV Itele',
                    'TV tf1',
                    ]
                    ],
                    [
                    'nom' => 'RELIGION CHRISTIANISME',
                    'parent_id' => '',
                    'liste' =>[
                    'Prière du Soir',
                    'Angelus',
                    'Prière du matin',
                    'Centre Sud Manga',
                    'Verset biblique du jour',
                    'Psaume du jour',
                    'Parabole du jour',
                    'Evangile du jour',
                    ]
                    ],
                    [
                    'nom' => 'RELIGION ISLAM',
                    'parent_id' => '',
                    'liste' =>[
                        'Islam Nafila',
                        'Verset Corannique du jour',
                        'Hadith du jour',
                        'Sud Ouest Gaoua',
                        'Sahel Dori',
                        'Est FADA',
                        'Centre Sud Manga',
                        'Plateau Central Ziniaré',
                        'Centre Nord Kaya',
                        'Centre Est Tenkodogo',
                        'Boucle du Mouhoun Dédougou',
                        'Centre Ouest Koudougou',
                        'Cascades Banfora',
                        'Nord Ouahigouya',
                        'Haut Bassins Bobo Dioulasso',
                        'Centre Ouagadougou',
                    ]
                    ],
                    [
                        'nom' => 'RESTAURANTS',
                        'parent_id' => '',
                        'liste' =>[
                            'Sud Ouest Gaoua',
                            'Sahel Dori',
                            'Est FADA',
                            'Centre Sud Manga',
                            'Plateau Central Ziniaré',
                            'Centre Nord Kaya',
                            'Centre Est Tenkodogo',
                            'Boucle du Mouhoun Dédougou',
                            'Centre Ouest Koudougou',
                            'Cascades Banfora',
                            'Nord Ouahigouya',
                            'Haut Bassins Bobo Dioulasso',
                            'Centre Ouagadougou',
                        ]
                        ],
                        [
                            'nom' => 'SERVICES PUBLIQUES',
                            'parent_id' => '',
                            'liste' =>[
                                'Armée de Terre',
                                'Armée de l\'air',
                                'Eau et Foret',
                                'Douane',
                                'Renseignement',
                            ]
                            ],
                            [
                                'nom' => 'SOCIETES',
                                'parent_id' => '',
                                'liste' =>[
                                    'SOCIETE mecanique',
                                    'SOCIETE jardinage',
                                    'SOCIETE maconnerie',
                                    'SOCIETE electricite',
                                    'SOCIETE gardiennage',
                                    'SOCIETE plomberie',
                                ]
                                ],
                                [
                                    'nom' => 'SERVICES ',
                                    'parent_id' => '',
                                    'liste' =>[
                                        'Armée de Terre',
                                        'Armée de l\'air',
                                        'Eau et Foret',
                                        'Douane',
                                        'Renseignement',
                                    ]
                                    ],
                                    [
                                        'nom' => 'SONABEL',
                                        'parent_id' => '',
                                        'liste' =>[
                                            'Gaoua',
                                            'Dori',
                                            'Fada',
                                            'Manga',
                                            'Ziniaré',
                                            'Kaya',
                                            'Tenkodogo',
                                            'Dédougou',
                                            'Koudougou',
                                            'Banfora',
                                            'Ouahigouya',
                                            'Bobo Dioulasso',
                                            'Ouagadougou',
                                        ]
                                    ],
                                    [
                                        'nom' => 'SPECTACLE DE LA SEMAINE',
                                        'parent_id' => '',
                                        'liste' =>[
                                            'Gaoua',
                                            'Dori',
                                            'Fada',
                                            'Manga',
                                            'Ziniaré',
                                            'Kaya',
                                            'Tenkodogo',
                                            'Dédougou',
                                            'Koudougou',
                                            'Banfora',
                                            'Ouahigouya',
                                            'Bobo Dioulasso',
                                            'Ouagadougou',
                                        ]
                                    ],
                                    [
                                        'nom' => 'SUPER MARCHE',
                                        'parent_id' => '',
                                        'liste' =>[
                                            'Sud Ouest Gaoua',
                                            'Sahel Dori',
                                            'Est FADA',
                                            'Centre Sud Manga',
                                            'Plateau Central Ziniaré',
                                            'Centre Nord Kaya',
                                            'Centre Est Tenkodogo',
                                            'Boucle du Mouhoun Dédougou',
                                            'Centre Ouest Koudougou',
                                            'Cascades Banfora',
                                            'Nord Ouahigouya',
                                            'Haut Bassins Bobo Dioulasso',
                                            'Centre Ouagadougou',
                                        ]
                                        ],
                                        [
                                            'nom' => 'GENDARMERIE NATIONALE',
                                            'parent_id' => '',
                                            'liste' =>[
                                                'Bobo Dioulasso',
                                                'Ouagadougou',
                                            ]
                                            ],
                                            [
                                                'nom' => 'INFOS TELECEL',
                                                'parent_id' => '',
                                                'liste' =>[
                                                    'infos promo',
                                                    'infos mms',
                                                    'infos navitel',
                                                    'infos postpaidpro',
                                                    'infos smscorporate',
                                                    'infos kit',
                                                    'infos bonusappel',
                                                    'infos privilege',
                                                    'infos web2sms',
                                                    'infos conference',
                                                    'infos flotte',
                                                    'infos forfait',
                                                    'infos postpaid',
                                                    'infos faxinternet',
                                                    'infos publiphones',
                                                    'infos sonneries',
                                                    'infos sms2mail',
                                                    'infos complices',
                                                    'infos asim',
                                                    'infos services',
                                                    'Couv centre',
                                                    'Couv sud',
                                                    'Couv nord',
                                                    'Couv est',
                                                    'Couv ouest',
                                                    'anonymat postpaid',
                                                    'anonymat prepaid',
                                                ]
                                                ]
        ];
        for ($i=0; $i < count($liste); $i++) {
            $uuid = Str::uuid();
            Menu::create(
                [
                'nom'                    =>$liste[$i]['nom'],
                'operateur'                    =>$operateurs[0]['nom'],
                'type_menu_id'           =>1,
                'uuid'                   =>$uuid,
                'description'            =>'[description]'
                ]
            );
            $id =  Menu::where('uuid', $uuid)->first()->id;
            $nom =  $liste[$i]['nom'];
            foreach($liste[$i]['liste'] as $list){
                $slug = Str::slug($operateurs[0]['nom'].' '.$nom.' '.$list);
                $sousmenu = Menu::create(
                    [
                    'nom'                         => $list,
                    'pseudo'                         =>$slug,
                    'operateur'                    =>$operateurs[0]['nom'],
                    'cache'                         =>false,
                    'type_menu_id'                => 2,
                    'automate_id'                => $nom == 'PMU' || $nom == 'PMU PROFESSIONEL' ? 1 : null,
                    'uuid'                        => Str::uuid(),
                    'parent_id'                   =>$id,
                    'parent_uuid'                 => $uuid,
                    'description'                 => '[juste une explication de ce que est censé faire ce sous menu]'
                    ]
                );
            }
        }
    }
}
