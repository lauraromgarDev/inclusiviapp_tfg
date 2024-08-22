<?php

namespace Database\Seeders;

use App\Http\Controllers\ProjectController;
use App\Models\Project;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


//class ProjectSeeder extends Seeder
//{
//    /**
//     * Run the database seeds.
//     */
//    public function run(): void
//    {
//
//        DB::statement('ALTER TABLE projects AUTO_INCREMENT = 1;');
//
//        $project = Project::factory()->create([
//            'name' => __('proyectos.musicoterapia'),
//            'description' => __('proyectos.musicoterapia_description'),
//            'image' => 'storage/images/p-musicoterapia.svg',
//            'team_description' => __('proyectos.musicoterapia_team_description'),
//            'objectives' => __('proyectos.musicoterapia_objectives'),
//            'destination' => __('proyectos.musicoterapia_destination'),
//
//        ]);
//
//        $project->slug = $project->generateSlug();
//        $project->save();
//
//        $project = Project::factory()->create([
//            'name' => __('proyectos.teatro_inclusivo'),
//            'description' => __('proyectos.teatro_inclusivo_description'),
//            'image' => 'storage/images/P-teatro.svg',
//            'team_description' => __('proyectos.teatro_inclusivo_team_description'),
//            'objectives' => __('proyectos.teatro_inclusivo_objectives'),
//            'destination' => __('proyectos.teatro_inclusivo_destination'),
//        ]);
//
//        $project->slug = $project->generateSlug();
//        $project->save();
//
//
//        $project = Project::factory()->create([
//            'name' => __('proyectos.escuela_lengua_signos'),
//            'description' => __('proyectos.escuela_lengua_signos_description'),
//            'image' => 'storage/images/P-signos.svg',
//            'team_description' => __('proyectos.escuela_lengua_signos_team_description'),
//            'objectives' => __('proyectos.escuela_lengua_signos_objectives'),
//            'destination' => __('proyectos.escuela_lengua_signos_destination'),
//        ]);
//
//        $project->slug = $project->generateSlug();
//        $project->save();
//
//        $project = Project::factory()->create([
//            'name' => __('proyectos.escuela_accesibilidad'),
//            'description' => __('proyectos.escuela_accesibilidad_description'),
//            'image' => 'storage/images/p-accesibilidad.svg',
//            'team_description' => __('proyectos.escuela_accesibilidad_team_description'),
//            'objectives' => __('proyectos.escuela_accesibilidad_objectives'),
//            'destination' => __('proyectos.escuela_accesibilidad_destination'),
//
//        ]);
//
//        $project->slug = $project->generateSlug();
//        $project->save();
//
//        $project = Project::factory()->create([
//            'name' => __('proyectos.ocio_inclusivo'),
//            'description' => __('proyectos.ocio_inclusivo_description'),
//            'image' => 'storage/images/P-ocio.svg',
//            'team_description' => __('proyectos.ocio_inclusivo_team_description'),
//            'objectives' => __('proyectos.ocio_inclusivo_objectives'),
//            'destination' => __('proyectos.ocio_inclusivo_destination'),
//        ]);
//
//        $project->slug = $project->generateSlug();
//        $project->save();
//    }
//}

//
//namespace Database\Seeders;
//
//use App\Http\Controllers\ProjectController;
//use App\Models\Project;
//use App\Models\Team;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
//use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;
//
//
//class ProjectSeeder extends Seeder
//{
//    /**
//     * Run the database seeds.
//     */
//    public function run(): void
//    {
//
//        DB::statement('ALTER TABLE projects AUTO_INCREMENT = 1;');
//
//        $project = Project::factory()->create([
//            'name' => __('proyectos.musicoterapia'),
//            'description' => __('proyectos.musicoterapia_description'),
//            'image' => 'storage/images/p-musicoterapia.svg',
//            'team_description' => __('proyectos.musicoterapia_team_description'),
//            'objectives' => __('proyectos.musicoterapia_objectives'),
//            'destination' => __('proyectos.musicoterapia_destination'),
//
//        //proyecto Musicoterapia para Tod@s y escuela de padres
//        $project = Project::factory()->create([
//            'name' => 'Musicoterapia para Tod@s y escuela de padres',
//            'description' => 'La musicoterapia (MT) es una terapia donde la música es la principal vía de comunicación y expresión. Favorece el desarrollo motriz, cognitivo, social y emocional hacia la mejora de la calidad de vida.<br>
//                      Potencia las funciones cognitivas como la atención, concentración, memoria, control de impulsos y fijación de nuevos contenidos. Además, fomenta la creatividad, la formación de conceptos y agilidad mental.<br>
//                      Asimismo, contribuye a fomentar el aprendizaje y la resolución de problemas.',
//            'image' => 'storage/images/p-musicoterapia.svg',
//            'team_description' => 'Profesional titulada en Máster en Musicoterapia y Maestra en Educación Musical se dedica a la Musicoterapia y brinda apoyo a través del taller de Musicoterapia y Escuela de Padres. <br>
//                          Con experiencia en Atención Infantil Temprana y ámbito Socio Educativo, esta experta utiliza la música como herramienta terapéutica para promover el desarrollo y el bienestar de las personas. Además, ofrece orientación y recursos a los padres, ayudándoles a fortalecer la crianza y el vínculo con sus hijos a través de la música. Con pasión por la igualdad, la diversidad y el amor, esta profesional busca el crecimiento y la transformación a través de la terapia musical y el apoyo a los padres en su labor educativa.',
//            'objectives' => '<p>La musicoterapia es una disciplina terapéutica que utiliza la música como herramienta principal para promover el bienestar y la salud de las personas. A través de la participación activa en experiencias musicales estructuradas, se busca trabajar en diferentes aspectos emocionales, cognitivos, físicos y sociales. Los objetivos que perseguimos son:</p>
//                      <ul>
//                          <li>Promover la expresión emocional.</li>
//                          <li>Mejorar la comunicación y la interacción social.</li>
//                          <li>Estimular el desarrollo cognitivo y sensorial.</li>
//                          <li>Reducir el estrés y promover la relajación.</li>
//                          <li>Mejorar la calidad de vida.</li>
//                      </ul>',
//            'destination' => 'El proyecto se desarrollará los LUNES de 17:00 a 18:30 en nuestra sede, en la Calle San Juan de Dios, 1, Córdoba.',
//        ]);
//
//
//        $project->slug = $project->generateSlug();
//        $project->save();
//
//        //proyecto Escuela de Teatro Inclusivo y Accesible Gloria Ramos
//        $project = Project::factory()->create([
//            'name' => 'Escuela de Teatro Inclusivo y Accesible Gloria Ramos',
//            'description' => '<p>“Si crees totalmente en ti misma, no habrá nada que esté fuera de tus posibilidades”</p>
//                                <p>La Asociación Inclusivos y Diversos da vida a este proyecto de Teatro Diverso, donde se fusionan arte e inclusión, dando un espacio a la preocupación y necesidad de crear una realidad donde personas con diferentes diversidades funcionales puedan desarrollar sus capacidades a través del Teatro.</p>',
//            'image' => 'storage/images/P-teatro.svg',
//            'team_description' => 'Tituladas en enseñanzas artísticas superiores de Arte Dramático, Educación Musical y Danza, se unen a profesionales especialistas en Accesibilidad e Inclusión, dando vida a La Escuela de Teatro Inclusivo y Accesible Gloria Ramos.  Juntas crean un tándem perfecto donde Arte, igualdad, diversidad y mucho amor encuentran el mismo camino para crecer a través de las Artes escénicas.',
//            'objectives' => '<p>Nacemos de la necesidad de crear una sociedad más justa e inclusiva que camine hacia la plena igualdad de las personas con algún tipo de diversidad funcional y luche contra las exclusiones y la discriminación, y todo de la mano del Arte.</p>
//                            <ul>
//                              <li>Ensalzar y poner en valor el teatro, el arte y la cultura en general.</li>
//                              <li>Crear un nuevo lenguaje escénico donde la diferencia sea la oportunidad para el enriquecimiento.</li>
//                              <li>Entender el teatro como una estrategia de mediación pedagógica para el desarrollo psicomotor, emocional, cognitivo y social de todas las personas.</li>
//                              <li>Concienciar y visibilizar la importancia de la creación de lugares inclusivos donde personas con y sin diversidad funcional coexistan, aprendan, crezcan y se sientan plenos.</li>
//                            </ul>',
//            'destination' => 'El proyecto se desarrollará los MARTES de 17:00 a 18:30 en nuestra sede, en la Calle San Juan de Dios, 1, Córdoba.',
//        ]);
//
//        $project->slug = $project->generateSlug();
//        $project->save();
//
//
//        //proyecto Escuela de Lengua de Signos
//        $project = Project::factory()->create([
//            'name' => 'Escuela de Lengua de Signos',
//            'description' => 'La sociedad en la que vivimos es mayoritariamente oyente, de manera que gran parte de
//                        los contactos comunicativos y los canales de transmisión de información son orales-auditivos, por lo que la información que perciben las personas SORDAS en sus relaciones comunicativas es mínima, influyendo en su aislamiento social y en su desarrollo personal e intelectual. Contribuir a paliar esta problemática lo entendemos de vital necesidad.
//                        En Inclusiv@s y Divers@s, deseamos concienciar y promover la responsabilidad social en
//                        la inclusión de las personas Sordas en la sociedad, tal y como refleja la ley 27/2007 del 23 de octubre por la que se reconoce las Lenguas de Signos Española y se regulan los medios de apoyo a la Comunicación de las Personas con Discapacidad Auditiva y Sordociegas, apostando así por una inclusión real.
//                        Contribuimos de esta forma al desarrollo  del objetivo 11 de la O.D.S. ciudades y comunidades sostenibles, apostando por unas ciudades más inclusivas, seguras, resilientes y sostenibles.
//                        </p>',
//            'image' => 'storage/images/P-signos.svg',
//            'team_description' => 'Profesionales tituladas en Lengua de Signos Española, con amplia experiencia en el ámbito de la educación y la inclusión, se unen para dar vida a la Escuela de Lengua de Signos de Inclusiv@s y Divers@s. Juntas crean un tándem perfecto donde Arte, igualdad, diversidad y mucho amor encuentran el mismo camino para crecer a través de las Artes escénicas.',
//            'objectives' => '<p>La lengua de signos es la lengua natural de las personas sordas, por lo que es de vital importancia que la sociedad la conozca y la aprenda para poder comunicarse con las personas sordas y así poder incluirlas en la sociedad. Por ello, los objetivos que perseguimos son:</p>
//                                <ul>
//                                  <li>Difundir el conocimiento sobre la diversidad funcional y concienciar sobre la importancia de la inclusión en la sociedad.</li>
//                                  <li>Facilitar el acceso a información, recursos y servicios que promuevan la igualdad de oportunidades para las personas con diversidad funcional.</li>
//                                  <li>Promover la interacción y la colaboración entre personas con y sin diversidad funcional, fomentando la creación de redes de apoyo y la participación activa.</li>
//                                </ul>',
//            'destination' => 'El proyecto se desarrollará los MIÉRCOLES de 17:00 a 18:30 en nuestra sede, en la Calle San Juan de Dios, 1, Córdoba.',
//        ]);
//        $project->slug = $project->generateSlug();
//        $project->save();
//
//        //proyecto Escuela de Accesibilidad
//        $project = Project::factory()->create([
//            'name' => 'Escuela de Accesibilidad',
//            'description' => '<p>La accesibilidad universal es aquella condición que deben cumplir los entornos, procesos, bienes, productos y servicios para que todas las personas puedan participar de manera autónoma y con las mismas oportunidades (Real Decreto Legislativo 1/2013, de 29 de noviembre, por el que se aprueba el Texto Refundido de la Ley General de derechos de las personas con discapacidad y de su inclusión social)</p>',
//            'image' => 'storage/images/p-accesibilidad.svg',
//            'team_description' => 'Lucía es una profesional especializada en accesibilidad universal, comprometida en garantizar que los entornos, procesos, bienes, productos y servicios sean accesibles para todas las personas, brindando igualdad de oportunidades y autonomía. Con un profundo conocimiento del marco legal, Lucía trabaja incansablemente para crear conciencia sobre la importancia de la inclusión y promover entornos accesibles. Su objetivo principal es colaborar con organizaciones y comunidades para construir un mundo donde todas las personas, sin importar sus capacidades, puedan participar plenamente en la sociedad.',
//            'objectives' => '<p>Inclusivos y Diversos es una iniciativa comprometida con la creación de una sociedad más justa e inclusiva, donde todas las personas, independientemente de sus diversidades funcionales, tengan igualdad de oportunidades. A través de nuestro trabajo, buscamos eliminar barreras y promover la inclusión a través del arte, la cultura y la educación.</p>
//                        <p>Objetivos:</p>
//                        <ul>
//                          <li>Difundir el conocimiento de la Lengua de Signos Española entre las personas oyentes con el fin de eliminar barreras comunicativas.</li>
//                          <li>Visibilizar y dar a conocer la importancia y los valores de la Comunidad Sorda.</li>
//                          <li>Sensibilizar sobre la importancia de generar una sociedad más inclusiva.</li>
//                          <li>Ensalzar y poner en valor el teatro, el arte y la cultura en general como herramientas de inclusión.</li>
//                          <li>Crear un nuevo lenguaje escénico donde la diferencia sea la oportunidad para el enriquecimiento.</li>
//                          <li>Entender el teatro como una estrategia de mediación pedagógica para el desarrollo integral de todas las personas.</li>
//                          <li>Concienciar y visibilizar la importancia de la creación de espacios inclusivos donde personas con y sin diversidad funcional coexistan, aprendan, crezcan y se sientan plenas.</li>
//                          <li>Generar recursos y materiales que promuevan la inclusión y la accesibilidad en todas las áreas de la sociedad.</li>
//                        </ul>
//                        ',
//            'destination' => 'El proyecto se desarrollará los JUEVES de 17:00 a 18:30 en nuestra sede, en la Calle San Juan de Dios, 1, Córdoba.',
//
//        ]);
//
//        $project->slug = $project->generateSlug();
//        $project->save();
//
//        //proyecto Ocio Inclusivo
//        $project = Project::factory()->create([
//            'name' => 'Ocio Inclusivo',
//            'description' => '<p>
//                              El ocio inclusivo es el conjunto de actividades destinadas a conseguir que las personas con discapacidad disfruten de su tiempo libre. Tanto la Constitución en su artículo 49 como la Convención de la Organización de Naciones Unidas (ONU) sobre los Derechos de las Personas con Discapacidad establecen que el ocio es un derecho para todas las personas con discapacidad.
//                              El ocio inclusivo requiere la implementación de actividades recreativas y lúdicas que puedan ser disfrutadas por todo tipo de personas con discapacidad. Para su correcto desarrollo es necesario garantizar la accesibilidad universal y contar con un equipo de profesionales especializados que puedan organizar y coordinar las actividades satisfaciendo las necesidades de cada persona.
//                            </p>',
//            'image' => 'storage/images/P-ocio.svg',
//            'team_description' => '<p> Sergio Pavón es un apasionado del ocio inclusivo y un especialista en la organización y coordinación de actividades recreativas y lúdicas para personas con discapacidad. Con una amplia experiencia en el campo, Sergio se ha dedicado a fomentar la inclusión y garantizar que todas las personas puedan disfrutar plenamente de su tiempo libre.</p>
//                              <p>
//                                Como profesional comprometido, Sergio se ha especializado en el diseño de actividades accesibles, adaptadas a las necesidades y capacidades de cada individuo. Su enfoque se basa en crear un ambiente seguro, respetuoso y enriquecedor, donde todas las personas se sientan incluidas y puedan participar de forma activa y satisfactoria.
//                              </p>',
//            'objectives' => ' <p>
//                            El ocio inclusivo es un mecanismo esencial para lograr el bienestar emocional, el desarrollo de las relaciones interpersonales y fomentar la integración de las personas con discapacidad.
//                          </p>
//                          <ul>
//                            <li>Promover la convivencia y el aprendizaje en grupo.</li>
//                            <li>Transmitir valores como la aceptación, el sentido de pertenencia, el respeto y la interdependencia.</li>
//                            <li>Favorecer el desarrollo personal y social de las personas con discapacidad.</li>
//                            <li>Garantizar el derecho fundamental al ocio para todos.</li>
//                            <li>Proporcionar apoyo a las familias.</li>
//                          </ul>',
//            'destination' => 'El proyecto se desarrollará los VIERNES de 17:00 a 18:30 en nuestra sede, en la Calle San Juan de Dios, 1, Córdoba.',
//        ]);
//
//        $project->slug = $project->generateSlug();
//        $project->save();
//
//    }
//}




class ProjectSeeder extends Seeder
{


    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('ALTER TABLE projects AUTO_INCREMENT = 1;');

        $project = Project::factory()->create([
            'name' => 'proyectos.musicoterapia',
            'description' => 'proyectos.musicoterapia_description',
            'image' => 'storage/images/p-musicoterapia.svg',
            'team_description' => 'proyectos.musicoterapia_team_description',
            'objectives' => 'proyectos.musicoterapia_objectives',
            'destination' => 'proyectos.musicoterapia_destination',

        ]);

        $project->slug = $project->generateSlug();
        $project->save();

        $project = Project::factory()->create([
            'name' => 'proyectos.teatro_inclusivo',
            'description' => 'proyectos.teatro_inclusivo_description',
            'image' => 'storage/images/P-teatro.svg',
            'team_description' => 'proyectos.teatro_inclusivo_team_description',
            'objectives' => 'proyectos.teatro_inclusivo_objectives',
            'destination' => 'proyectos.teatro_inclusivo_destination',
        ]);

        $project->slug = $project->generateSlug();
        $project->save();


        $project = Project::factory()->create([
            'name' => 'proyectos.escuela_lengua_signos',
            'description' => 'proyectos.escuela_lengua_signos_description',
            'image' => 'storage/images/P-signos.svg',
            'team_description' => 'proyectos.escuela_lengua_signos_team_description',
            'objectives' => 'proyectos.escuela_lengua_signos_objectives',
            'destination' => 'proyectos.escuela_lengua_signos_destination',
        ]);

        $project->slug = $project->generateSlug();
        $project->save();

        $project = Project::factory()->create([
            'name' => 'proyectos.escuela_accesibilidad',
            'description' => 'proyectos.escuela_accesibilidad_description',
            'image' => 'storage/images/p-accesibilidad.svg',
            'team_description' => 'proyectos.escuela_accesibilidad_team_description',
            'objectives' => 'proyectos.escuela_accesibilidad_objectives',
            'destination' => 'proyectos.escuela_accesibilidad_destination',

        ]);

        $project->slug = $project->generateSlug();
        $project->save();

        $project = Project::factory()->create([
            'name' => 'proyectos.ocio_inclusivo',
            'description' => 'proyectos.ocio_inclusivo_description',
            'image' => 'storage/images/P-ocio.svg',
            'team_description' => 'proyectos.ocio_inclusivo_team_description',
            'objectives' => 'proyectos.ocio_inclusivo_objectives',
            'destination' => 'proyectos.ocio_inclusivo_destination',
        ]);

        $project->slug = $project->generateSlug();
        $project->save();
    }
}
