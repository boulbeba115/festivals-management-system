<?php

use Illuminate\Database\Seeder;
use App\models\Actualite,App\models\Artist,App\models\Festivale,App\models\Music,App\models\PartMedia,App\models\PointVente,
App\models\Scene,App\models\Soire,App\models\Sponseur,App\models\FestivaleSponseur,App\models\FestivalepartMedia,
App\models\FestivaleMusic;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // $this->call(UsersTableSeeder::class);
        Festivale::create([
			'nomFes' => 'FESTIVALE DE SFAX',
            'tourFes' => 40,
            'dateDebFes'=>Carbon::parse('2018-09-17'),
            'dateFinFes'=>Carbon::parse('2018-10-17'),
            'coverFesImg'=>'',
            'logoFesImg'=>''
        ]);
        Festivale::create([
			'nomFes' => 'FESTIVALE CARTHAGE',
            'tourFes' => 54,
            'dateDebFes'=>Carbon::parse('2018-10-17'),
            'dateFinFes'=>Carbon::parse('2018-11-17'),
            'coverFesImg'=>'',
            'logoFesImg'=>''
        ]);

        PointVente::create([
			'nomPv' => 'carffeur',
            'adrPv' => 'route grema km 3,5',
            'telPv'=>23180613 ,  
            'faxPv'=>74275217,
            'pvMapx'=>10,
            'pvMapy'=>10,
            'pvImg'=>''
        ]);

        PointVente::create([
			'nomPv' => 'monoprix',
            'adrPv' => 'beb bhar',
            'telPv'=>23180613 ,  
            'faxPv'=>74275217,
            'pvMapx'=>30,
            'pvMapy'=>20,
            'pvImg'=>''
        ]);
        Sponseur::create([
			'nomSpon' => 'Tunisair',
            'siteSpon' => 'http://www.tunisair.com',
            'sponImg'=>'20.png'
            ]);
        Sponseur::create([
			'nomSpon' => 'Tunisie Telecom',
            'siteSpon' => 'https://www.tunisietelecom.tn',
            'sponImg'=>'21.png'
        ]);
        Sponseur::create([
			'nomSpon' => 'Total',
            'siteSpon' => 'https://www.total.tn',
            'sponImg'=>'22.png'
        ]);
        Sponseur::create([
			'nomSpon' => 'Odv plus',
            'siteSpon' => 'http://odvplus.com',
            'sponImg'=>'23.png'
        ]);
        Sponseur::create([
			'nomSpon' => 'Carrefour',
            'siteSpon' => 'https://www.carrefourtunisie.com/',
            'sponImg'=>'24.png'
        ]);
        FestivaleSponseur::create([
			'festivale_idFes' => 1,
            'sponseur_idSpon' => 1
        ]);
        FestivaleSponseur::create([
			'festivale_idFes' => 1,
            'sponseur_idSpon' => 2
        ]);
        FestivaleSponseur::create([
			'festivale_idFes' => 1,
            'sponseur_idSpon' => 3
        ]);
        FestivaleSponseur::create([
			'festivale_idFes' => 1,
            'sponseur_idSpon' => 4
        ]);
        FestivaleSponseur::create([
			'festivale_idFes' => 1,
            'sponseur_idSpon' => 5
        ]);
        PartMedia::create([
			'nomPm' => 'tv watanaia 1',
            'sitePm' => 'http://www.watania1.tn',
            'pmImg'=>'3-1.png'
        ]);
        PartMedia::create([
			'nomPm' => 'tv watanaia 2',
            'sitePm' => 'http://www.watania2.tn',
            'pmImg'=>'3-2.png'
        ]);
        PartMedia::create([
			'nomPm' => 'Radio nationale ',
            'sitePm' => 'www.radionationale.tn/',
            'pmImg'=>'1.png'
        ]);
        PartMedia::create([
			'nomPm' => 'Radio sfax',
            'sitePm' => 'http://www.radiosfax.tn',
            'pmImg'=>'4-1.png'
        ]);
        PartMedia::create([
			'nomPm' => 'Tunivisions',
            'sitePm' => 'https://tunivisions.net',
            'pmImg'=>'5.png'
        ]);
        FestivalepartMedia::create([
			'festivale_idFes' => 1,
            'part_media_idPm' => 1
        ]);
        FestivalepartMedia::create([
			'festivale_idFes' => 1,
            'part_media_idPm' => 2
        ]);
        FestivalepartMedia::create([
			'festivale_idFes' => 1,
            'part_media_idPm' => 3
        ]);
        FestivalepartMedia::create([
			'festivale_idFes' => 1,
            'part_media_idPm' => 4
        ]);
        FestivalepartMedia::create([
			'festivale_idFes' => 1,
            'part_media_idPm' => 5
        ]);

        Music::create([
			'libMu' => 'Something just like this',
            'musiclink' => 'mp3/SomethingJustLikeThis.mp3'
        ]);
        Music::create([
			'libMu' => 'Rise',
            'musiclink' => 'mp3/rise.mp3'
        ]);
        Music::create([
			'libMu' => 'Let her go',
            'musiclink' => 'mp3/Passenger.mp3'
        ]);
        FestivaleMusic::create([
			'festivale_idFes' => 1,
            'music_idMu' => 1
        ]);
        FestivaleMusic::create([
			'festivale_idFes' => 1,
            'music_idMu' => 2
        ]);
        FestivaleMusic::create([
			'festivale_idFes' => 1,
            'music_idMu' => 3
        ]);
        Actualite::create([
			'titreAct' => '24 PARFUMS DE MOHAMED ALI KAMMOUN',
            'sujAct' => 'La 54ème édition du Festival International de Carthage  ',
            'corpAct' => 'La 54ème édition du Festival International de Carthage a été clôturée
            vendredi 17 aout 2018 avec  les «  24 parfums », une nouvelle création orchestrale 
            de Mohamed-Ali Kammoun, compositeur, arrangeur et pianiste, accompagné de l’Orchestre et
            Chœur de l’Opéra de Tunis dirigé par Mohamed Bouslema et d’une sélection de 60 artistes 
            des régions tunisiennes.  Ce spectacle grandiose est l’aboutissement d’un long travail d’investigation 
            et de recherche musicale mené par Mohamed Ali Kammoun dans le cadre de résidences de création dans
             les 24 gouvernorats du pays. Agencés en 6 suites, chaque suite porte les couleurs d’une grande région. ',
            'imgAct' => '',
            'festivale_idFes'=>1
        ]);
        Actualite::create([
			'titreAct' => 'La 40ème édition du festival international de Sfax du 20 juillet au 15 aout',
            'sujAct' => 'La 54ème édition du Festival International de Carthage  ',
            'corpAct' => 'La 40ème édition du festival international de Sfax se déroulera
            du 20 juillet au 15 aout avec au programme 16 soirées en tout.
            L’ouverture sera assurée par le célèbre chanteur Lotfi Bouchneq.Le concert de clôture,quant 
            à lui, sera avec la star Saber Rebai.A Le théâtre sera présent avec la pièce “Makki et Zakia”
            de Lamine Nahdi (21 juillet) et l’humoriste Karim Gharbi (6 aout).L’art populaire a été également programmé à
            travers le trio Samir Loussif, Hedi Donya et Cheb Selim (23 juillet).
            Le public aura rendez-vous avec des sonorités soufies avec le spectacle à succès “Ziara” 
            de Sami Lajmi (25 juillet).La musique orientale marquera sa présence avec la montée sur scène de Nassif
            Zeitoun (26 juillet), ainsi qu’une soirée exclusive pour le festival international de Sousse avec la
            star libanaise Ragheb Allema pour la date du 30 juillet.Le festival international de Sfax a programmé
            également un concert de la jeune chanteuse Yosra Mahnouch (3 aout), du jeune Ahmed Cherif qui revient 
            après une longue absence (7 aout), une soirée aux couleurs de la Syrie avec “Chouyoukh Ettarab” (11 aout),
            le spectacle de Balti (12 aout) sans oublier le ballet chinois qui est un spectacle subventionné par le
             ministère des affaires culturelles (13 aout).',
            'imgAct' => '',
            'festivale_idFes'=>1
        ]);
        Artist::create([
			'NomArt' => 'lotfi',
            'PrenomArt' => 'bou chnak',
            'DesArt'=>'un grand acteur tunisien',
            'ImgArt'=>'\images\artist\1.jpg',
        ]);
        Artist::create([
			'NomArt' => 'Sami',
            'PrenomArt' => 'Lajmi',
            'DesArt'=>'la hathra est un art tradutionel tunisian est samo Lajmi a aura un grand succes 
            avec son spectacle el ziyara',
            'ImgArt'=>'\images\artist\2.jpg',
        ]);
        Scene::create([
			'nomScene' => 'Théâtre extérieur Sir Mansour Sfax',
            'adrScene' => 'Sidi Mansour km 4.5',
            'capScene'=>10000,
            'ImgScene'=>''
        ]);
        Scene::create([
			'nomScene' => 'Théâtre de Sfax',
            'adrScene' => '100 métre sfax',
            'capScene'=>1000,
            'ImgScene'=>''
        ]);
        Scene::create([
			'nomScene' => 'Théâtre extérieur Carthage',
            'adrScene' => 'tunis Carthage',
            'capScene'=>15000,
            'ImgScene'=>''
        ]);
        
        Soire::create([
			'nomSoi' => 'Concert Lotifi Bou chnak',
            'dateSoi' => Carbon::parse('2018-9-17'),
            'desSoi' => 'une belle soiré',
            'ImgSoi'=>'',
            'festivale_idFes'=>1,
            'scene_idScene'=>1
        ]);
        Soire::create([
			'nomSoi' => 'El ziyara',
            'dateSoi' => Carbon::parse('2018-9-18'),
            'desSoi' => 'une belle soiré',
            'ImgSoi'=>'',
            'festivale_idFes'=>1,
            'scene_idScene'=>1
        ]);
        Soire::create([
			'nomSoi' => 'MAJDA ERROUMI (EXCLUSIF)',
            'dateSoi' => Carbon::parse('2018-9-18'),
            'desSoi' => 'une belle soiré',
            'ImgSoi'=>'',
            'festivale_idFes'=>2,
            'scene_idScene'=>2
        ]);
    }
}
