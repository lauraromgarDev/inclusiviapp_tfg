<?php
//
//namespace Database\Seeders;
//
//use App\Models\Team;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
//use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Lang;

//class TeamsSeeder extends Seeder
//{
//    /**
//     * Run the database seeds.
//     */
//    public function run(): void
//    {
//
//        DB::statement('ALTER TABLE teams AUTO_INCREMENT = 1;');
//
//        $team = Team::factory()->create([
//            'name' => 'CHELI GUIJARRO JIMÉNEZ',
//            'position' => 'RESPONSABLE DE LA ESCUELA DE TEATRO INCLUSIVO Y ACCESIBLE GLORIA RAMOS',
//            'description' => 'Intérprete de Lengua de Signos Española, Guía Intérprete de Personas Sordo Ciegas, Mediadora Comunicativa y Especialista en Lengua de Signos. Formación y Experiencia en Accesibilidad e Inclusión.',
//            'admin_id' => 2,
//            'is_director' => false,
//            'project_id' => 2,
//        ]);
//
//        $team->slug = $team->generateSlug();
//        $team->save();
//
//
//        $team = Team::factory()->create([
//            'name' => 'LUCIA SERRANO RAYA',
//            'position' => 'RESPONSABLE DE ACCESIBILIDAD',
//            'description' => 'Máster en Educación Secundaria, Especialización En Orientación Educativa. Maestra de Educación Infantil. Intérprete y Especialista Lengua de Signos Española.',
//            'admin_id' => 3 ,
//            'is_director' => false,
//            'project_id' => 4,
//        ]);
//
//        $team->slug = $team->generateSlug();
//        $team->save();
//
//        $team = Team::factory()->create([
//            'name' => 'RAQUEL ALIAGA GARCIA',
//            'position' => 'RESPONSABLE DE “MUSICOTERAPIA PARA TODOS” Y ESCUELA DE PADRES',
//            'description' => 'Máster en Musicoterapia y Maestra en Educación Musical. Musicoterapeuta en Atención Infantil Temprana y ámbito Socio Educativo',
//            'admin_id' => null,
//            'is_director' => false,
//            'project_id' => 1,
//        ]);
//
//        $team->slug = $team->generateSlug();
//        $team->save();
//
//        $team = Team::factory()->create([
//            'name' => 'SERGIO MARTÍN PAVÓN',
//            'position' => 'RESPONSABLE DE OCIO INCLUSIVO',
//            'description' => 'Graduado en Historia. Activista y participante de la comunidad Sordociega.',
//            'admin_id' => null,
//            'is_director' => true,
//            'project_id' => 5,
//            'director_position' => 'VICEPRESIDENTE',
//            'director_description' => 'Graduado en Historia. Activista y participante de la comunidad Sordociega.',
//        ]);
//
//        $team->slug = $team->generateSlug();
//        $team->save();
//
//
//        $team = Team::factory()->create([
//            'name' => 'JOSÉ MARÍA DOBADO LUNA',
//            'position' => null,
//            'description' => null,
//            'admin_id' => null,
//            'is_director' => true,
//            'project_id' => null,
//            'director_position' => 'PRESIDENTE',
//            'director_description' => 'Licenciado en Filología Hispánica. Profesor de Lengua Española y Literatura. Conocedor de la Comunidad Sorda y su lengua, gracias a su experiencia docente dentro de la misma.',
//        ]);
//
//        $team->slug = $team->generateSlug();
//        $team->save();
//
//        $team = Team::factory()->create([
//            'name' => 'MARÍA DEL CARMEN ANTÚNEZ MIRANDA',
//            'position' => null,
//            'description' => null,
//            'admin_id' => null,
//            'is_director' => true,
//            'project_id' => null,
//            'director_position' => 'SECRETARIA',
//            'director_description' => 'Diplomada Universitaria de Enfermería. Defensora y participante de los derechos de las personas con enfermedades raras. Su hija Alba, su mayor razón.',
//        ]);
//
//        $team->slug = $team->generateSlug();
//        $team->save();
//
//
//        $team = Team::factory()->create([
//            'name' => 'LUCIA SERRANO Y CHELI GUIJARRO',
//            'position' => 'RESPONSABLES DE LA ESCUELA DE LENGUA DE SIGNOS ESPAÑOLA',
//            'description' => null,
//            'admin_id' => null,
//            'is_director' => false,
//            'project_id' => 3,
//        ]);
//
//        $team->slug = $team->generateSlug();
//        $team->save();
//
//    }
//}
//
//


namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;


class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('ALTER TABLE teams AUTO_INCREMENT = 1;');

        $team = Team::factory()->create([
            'name' => 'sobreNosotros.cheli_name',
            'position' => 'sobreNosotros.cheli_position',
            'description' => 'sobreNosotros.cheli_description',
            'admin_id' => 2,
            'is_director' => false,
            'project_id' => 2,
        ]);

        $team->slug = $team->generateSlug();
        $team->save();


        $team = Team::factory()->create([
            'name' => 'sobreNosotros.lucia_name',
            'position' => 'sobreNosotros.lucia_position',
            'description' => 'sobreNosotros.lucia_description',
            'admin_id' => 3,
            'is_director' => false,
            'project_id' => 4,
        ]);

        $team->slug = $team->generateSlug();
        $team->save();

        $team = Team::factory()->create([
            'name' => 'sobreNosotros.raquel_name',
            'position' => 'sobreNosotros.raquel_position',
            'description' => 'sobreNosotros.raquel_description',
            'admin_id' => null,
            'is_director' => false,
            'project_id' => 1,
        ]);

        $team->slug = $team->generateSlug();
        $team->save();

        $team = Team::factory()->create([
            'name' => 'sobreNosotros.sergio_name',
            'position' => null,
            'description' => null,
            'admin_id' => null,
            'is_director' => true,
            'project_id' => 5,
            'director_position' => 'sobreNosotros.sergio_director_position',
            'director_description' => 'sobreNosotros.sergio_director_description',
        ]);

        $team->slug = $team->generateSlug();
        $team->save();


        $team = Team::factory()->create([
            'name' => 'JOSÉ MARÍA DOBADO LUNA',
            'position' => null,
            'description' => null,
            'admin_id' => null,
            'is_director' => true,
            'project_id' => null,
            'director_position' => 'sobreNosotros.jose_maria_director_position',
            'director_description' => 'sobreNosotros.jose_maria_director_description',
        ]);

        $team->slug = $team->generateSlug();
        $team->save();

        $team = Team::factory()->create([
            'name' => 'MARÍA DEL CARMEN ANTÚNEZ MIRANDA',
            'position' => null,
            'description' => null,
            'admin_id' => null,
            'is_director' => true,
            'project_id' => null,
            'director_position' => 'sobreNosotros.maria_carmen_director_position',
            'director_description' => 'sobreNosotros.maria_carmen_director_description',
        ]);

        $team->slug = $team->generateSlug();
        $team->save();


        $team = Team::factory()->create([
            'name' => 'sobreNosotros.lucia_cheli_name',
            'position' => 'sobreNosotros.lucia_cheli_position',
            'description' => null,
            'admin_id' => null,
            'is_director' => false,
            'project_id' => 3,
        ]);

        $team->slug = $team->generateSlug();
        $team->save();

    }
}

//namespace Database\Seeders;
//
//use App\Models\Team;
//use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Lang;
//
//class TeamsSeeder extends Seeder
//{
//    /**
//     * Run the database seeds.
//     */
//    public function run(): void
//    {
//        DB::statement('ALTER TABLE teams AUTO_INCREMENT = 1;');
//
//        $team = Team::factory()->create([
//            'name' => Lang::get('sobreNosotros.cheli_name'),
//            'position' => Lang::get('sobreNosotros.cheli_position'),
//            'description' => Lang::get('sobreNosotros.cheli_description'),
//            'admin_id' => 2,
//            'is_director' => false,
//            'project_id' => 2,
//        ]);
//
//        $team->slug = $team->generateSlug();
//        $team->save();
//
//        $team = Team::factory()->create([
//            'name' => Lang::get('sobreNosotros.lucia_name'),
//            'position' => Lang::get('sobreNosotros.lucia_position'),
//            'description' => Lang::get('sobreNosotros.lucia_description'),
//            'admin_id' => 3,
//            'is_director' => false,
//            'project_id' => 4,
//        ]);
//
//        $team->slug = $team->generateSlug();
//        $team->save();
//
//        $team = Team::factory()->create([
//            'name' => Lang::get('sobreNosotros.raquel_name'),
//            'position' => Lang::get('sobreNosotros.raquel_position'),
//            'description' => Lang::get('sobreNosotros.raquel_description'),
//            'admin_id' => null,
//            'is_director' => false,
//            'project_id' => 1,
//        ]);
//
//        $team->slug = $team->generateSlug();
//        $team->save();
//
//        $team = Team::factory()->create([
//            'name' => Lang::get('sobreNosotros.sergio_name'),
//            'position' => null,
//            'description' => null,
//            'admin_id' => null,
//            'is_director' => true,
//            'project_id' => 5,
//            'director_position' => Lang::get('sobreNosotros.sergio_director_position'),
//            'director_description' => Lang::get('sobreNosotros.sergio_director_description'),
//        ]);
//
//        $team->slug = $team->generateSlug();
//        $team->save();
//
//        $team = Team::factory()->create([
//            'name' => 'JOSÉ MARÍA DOBADO LUNA',
//            'position' => null,
//            'description' => null,
//            'admin_id' => null,
//            'is_director' => true,
//            'project_id' => null,
//            'director_position' => Lang::get('sobreNosotros.jose_maria_director_position'),
//            'director_description' => Lang::get('sobreNosotros.jose_maria_director_description'),
//        ]);
//
//        $team->slug = $team->generateSlug();
//        $team->save();
//
//        $team = Team::factory()->create([
//            'name' => 'MARÍA DEL CARMEN ANTÚNEZ MIRANDA',
//            'position' => null,
//            'description' => null,
//            'admin_id' => null,
//            'is_director' => true,
//            'project_id' => null,
//            'director_position' => Lang::get('sobreNosotros.maria_carmen_director_position'),
//            'director_description' => Lang::get('sobreNosotros.maria_carmen_director_description'),
//        ]);
//
//        $team->slug = $team->generateSlug();
//        $team->save();
//
//        $team = Team::factory()->create([
//            'name' => Lang::get('sobreNosotros.lucia_cheli_name'),
//            'position' => Lang::get('sobreNosotros.lucia_cheli_position'),
//            'description' => null,
//            'admin_id' => null,
//            'is_director' => false,
//            'project_id' => 3,
//        ]);
//
//        $team->slug = $team->generateSlug();
//        $team->save();
//    }
//}
//namespace Database\Seeders;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Database\Seeder;
//use App\Models\Team;
//
//class TeamsSeeder extends Seeder
//{
//    public function run(): void
//    {
//        DB::statement('ALTER TABLE teams AUTO_INCREMENT = 1;');
//
//        $teams = [
//            [
//                'name' => __('sobreNosotros.cheli_name'),
//                'position' => __('sobreNosotros.cheli_position'),
//                'description' => __('sobreNosotros.cheli_description'),
//                'admin_id' => 2,
//                'is_director' => false,
//                'project_id' => 2,
//            ],
//            [
//                'name' => __('sobreNosotros.lucia_name'),
//                'position' => __('sobreNosotros.lucia_position'),
//                'description' => __('sobreNosotros.lucia_description'),
//                'admin_id' => 3,
//                'is_director' => false,
//                'project_id' => 4,
//            ],
//            // Agrega más equipos aquí según sea necesario
//        ];
//
//        foreach ($teams as $teamData) {
//            $team = Team::factory()->create([
//                'name' => $teamData['name'],
//                'position' => $teamData['position'],
//                'description' => $teamData['description'],
//                'admin_id' => $teamData['admin_id'],
//                'is_director' => $teamData['is_director'],
//                'project_id' => $teamData['project_id'],
//            ]);
//
//            $team->slug = $team->generateSlug();
//            $team->save();
//        }
//    }
//}
