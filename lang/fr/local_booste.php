<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Plugin strings are defined here.
 *
 * @package     local_booste
 * @category    string
 * @copyright   2022 Arts et Métiers
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Booste';
$string['booste'] = 'Booste';
$string['local_booste'] = 'Booste';
$string['scenario'] = 'Scénario';
$string['myboostes'] = 'Mes scénarios';

//////////////////////////////////////
// Index Header
//////////////////////////////////////

$string['heading'] = 'BOOSTE : <b>BO</b>îte à <b>O</b>utils pour ton <b>S</b>cénariser <b>T</b>on <b>E</b>nseignement<br>';
//$string['heading_desc'] = "<br>Bienvenue sur BOOSTE, la <b>BO</b>îte à <b>O</b>utils pour ton <b>S</b>cénariser <b>T</b>on <b>E</b>nseignement <br>";
$string['create_booste_button'] = "Créer un scénario";
$string['author'] = "Auteur";
$string['read'] = "Consulter";


//////////////////////////////////////
// Admin
//////////////////////////////////////

$string['manage'] = "Paramétrer Booste";

$string['boostes_settings'] = "Paramétrer les scénarios";

$string['activities_settings'] = "Paramétrer les suggestions d'activités";

$string['field'] = "Champ";
$string['fields'] = "Champs";
$string['custom_tags'] = "Tags personnalisés";
$string['ext_activity'] = "Activité hors Moodle";
$string['ext_activities'] = "Activités hors Moodle";
$string['informationformodule'] = 'Plus d\'informations sur {$a}';
$string['ext_activities_settings'] = "Paramétrer les activités hors Moodle";
$string['create_ext_activity_button'] = "Ajouter une activité hors Moodle";
$string['create_tag_button'] = "Ajouter un tag";

$string['activities_tags'] = "Paramétrer les tags de l'activité";

$string['tags_settings'] = "Paramétrer les tags";

$string['fields_settings'] = "Paramétrer les champs";

$string['elementnotfound'] = 'Élément avec l\'ID {$a} non trouvé.';

//////////////////////////////////////
// Formulaire de critères
//////////////////////////////////////

// Informations
$string['header_informations'] = "Informations sur le scénario";

$string['booste_name'] = "Nom du scénario";
$string['name_help'] = "Donner un titre à votre scénario. <br> C'est un élément obligatoire.";

$string['privacy_ar'] = 'Partage du scénario';
$string['privacy_0'] = 'Public';
$string['privacy_1'] = 'Privé';
$string['privacy']		= 'Confidentialité du scénario';
$string['privacy_title']	= 'Confidentialité du scénario';
$string['privacy_help'] = 'Définir les paramètres de partage de votre scénario :<ul>
                                    <li><strong>Scénario public</strong> : Le scénario est partagé dans la banque de scénario.</li>
                                    <li><strong> Scénario privé</strong> : Le scénario est visible uniquement pour vous.</li></ul>';

$string['discipline'] = 'Discipline';
$string['discipline_help'] = 'Indiquer le(s) discipline(s) de votre scénario.';

$string['course_type'] = 'Format du cours ';
$string['course_type_ar'] = 'Format du cours ';
$string['course_type_help'] = 'Plusieurs format de cours existent :<ul>
                                    <li><strong>CM</strong> : Cours magistral en amphithéâtre</li>
                                    <li><strong>ED/TD</strong>: Cours dirigés</li>
                                    <li><strong>TP</strong>: Travaux pratiques</li>
                                    <li><strong>Projet</strong></li></ul>';
$string['no_particular_format'] = 'Pas de format particulier';

$string['course_time'] = 'Durée globale';
$string['course_time_help'] = 'Durée indicative de votre scénario. Elle peut-être inférieure à la durée du cours. Elle peut-être supérieure à la durée du cours 
                                si du travail hors classe est prévu. <br />Vous avez la possiblité de créer plusieurs scénarios successifs pour un même cours. 
                                <br /><br />Attention : la durée d\'une activité pédagogique peut être très variable en fonction du niveau de complexité et d\'exigence 
                                que vous imposerez dans cette activité. Choisir la durée maximale ne vous contraint pas forcément en temps mais elle va vous
                                 permettre d\'obtenir un plus large panel de suggestions d\'activités pédagogiques. <br /><br />Nous vous conseillons de faire varier 
                                 ce critère si les suggestions issues de votre premier choix ne vous satisfont pas.';

$string['modality'] = 'Modalité';
$string['modality_help'] = 'La modalité d\'enseignement peut être : <ul>
                                <li><strong>présentiel</strong>  : Enseignement avec une présence physique auprès des élèves/étudiants dans un lieu défini.</li>
                                <li><strong>hybride</strong>  : Enseignement mêlant des temps en présence ou à distance.</li>
                                <li><strong>distanciel</strong> : Enseignement en ligne (via plateforme LMS, visioconférence, etc.).</li>
                                <li><strong>comodal</strong>  : Enseignement synchrone avec des élèves/étudiants en présence et à distance.</li></ul>';

//$string['place'] = 'Lieu';
//$string['place_help'] = 'Préciser le(s) lieu(x) de votre scénario.';

$string['description'] = 'Description';
$string['description_help'] = 'Donner quelques informations complémentaires pour décrire brièvement votre scénario.';

// Public visé
$string['header_public_concerned'] = "Public concerné";

//$string['cycle'] = 'Cycle';
//$string['cycle_help'] = 'Votre enseignement concerne des élèves/étudiants de : <ul>
                            //<li><strong>primaire</strong> : classes de la maternelle au CM2.</li>
                            //<li><strong>secondaire</strong> : classes de la 6e à la Terminale.</li>
                            //<li><strong>supérieur</strong> : formations après le Bac.</li></ul>';

$string['formation'] = 'Formation concernée ';
$string['formation_help'] = 'Niveau d\'études des élèves/étudiants concernés par le scénario.';

$string['students_level'] = 'Semestres d\'études';
$string['students_level_help'] = 'Semestres d\'études des élèves/étudiants concernés par le scénario.';

$string['group_size'] = 'Taille du groupe';
$string['group_size_help'] = 'Nombre total de participants à votre enseignement.';

//$string['students_specs'] = 'Spécificités du groupe classe';
//$string['students_specs_help'] = 'Particularités liées à votre groupe-classe.';


//////////////////////////////////////
// Formulaire de rédaction
//////////////////////////////////////

$string['challenge'] = 'Défi de l\'enseignant';
$string['challenge_help'] = 'Il permet d\'exprimer une intention autre que celle d\'organiser son cours. Le scénario serait alors le moyen d\'y parvenir. Par exemple : vous avez noté un manque de participation des étudiants et vous souhaitez favoriser l\'interaction.
';
$string['add_challenge'] = 'Nouveau défi';
$string['add_challenge_warning'] = 'L\'ajout d\'un défi personnel sera pris en compte dans les plus brefs délais par l\'administrateur. Il n\'aura donc pour le moment aucun impact sur vos suggestions.';
$string['add_challenge_help'] = 'Vous ne trouvez pas votre défi dans la liste ? Cliquez sur l’option « Nouveau défi » pour ajouter le vôtre.';

// Objectifs
$string['header_objectives'] = "Rédiger les Acquis d'Apprentissages Visés (AAV)";

$string['objective_placeholder'] = "À l'issue du cours, les personnes étudiantes seront en mesure de : ";
$string['canva'] = "Canevas";
$string['objective_example'] = "<b>Canevas de rédaction d'un acquis d'apprentissage visé</b>";

$string['objective_example_1'] = "Les [PUBLICS] seront en mesure de [COMPORTEMENT PAR UN VERBE D'ACTION] en montrant que [NIVEAU DE PERFORMANCE] lorsque [MISE EN SITUATION]. <br><i>Exemple : À l’issue de sa formation, les étudiants se seront appropriés un corpus de connaissances en sciences fondamentales et sciences de l’ingénieur, lui assurant une rigueur de raisonnement et une intelligence pratique en ingénierie mécanique, énergétique et industrielle.</i>";
$string['objective_example_2'] = "Les [PUBLICS] seront capables de [VERBE D’ACTION] [QUOI] afin de [POURQUOI] en [COMMENT] à [NIVEAU DE PERFORMANCE]. <br><i> Exemple : À l’issue de l’UE, les étudiants seront capables de s’approprier le rôle managérial de l’ingénieur et mettre en oeuvre les outils de gestion adaptés.</i>";
$string['objective'] = 'Acquis d\'apprentissage visé';
$string['objectives'] = 'Acquis d\'Apprentissage Visés';

$string['add_objective'] = 'Ajouter un Acquis d\'Apprentissage Visé';
$string['edit_objective'] = 'Modifier l\'Acquis d\'Apprentissage Visé';
$string['delete_objective'] = 'Supprimer l\'Acquis d\'Apprentissage Visé';
$string['delete_objective_confirm'] = 'Supprimer l\'Acquis d\'Apprentissage Visé ?';

$string['taxonomy'] = 'Taxonomie de Bloom';
$string['taxonomy_manual'] = 'Manuel';
$string['taxonomy_help'] = 'Il existe 6 niveaux de taxonomie (BLOOM) : <ul>
                                <li><strong>Mémoriser</strong> : Extraire les connaissances significatives issues de sa mémoire à long-terme.</li>
                                <li><strong>Comprendre</strong> : Construire la signification d\'informations reçues (orales, écrites et graphiques).</li>
                                <li><strong>Appliquer</strong> : Exécuter ou utiliser une procédure dans une situation donnée.</li>
                                <li><strong>Analyser</strong> : Décomposer les parties constitutives d\'un tout et déterminer les liens qui unissent ces parties entre elles et à une structure ou une finalité.</li>
                                <li><strong>Évaluer</strong> : Porter un jugement sur la base de critères et de normes.</li>
                                <li><strong>Créer</strong> : Assembler des éléments pour former un tout nouveau et cohérent, ou faire une production originale.</li></ul><br>
                                Source : <i>Krathwohl, D. R. (2002). A revision of Bloom’s taxonomy : An overview. Theory Into Practice, 41(4), 212-218.</i>' ;


$string['verbs_example'] = 'Exemples de verbes à utiliser : ';
$string['complete_list_verbs'] = 'Liste complète des verbes';
$string['taxonomy_verbs_link'] = 'https://view.genial.ly/642af479a673c1001856f9d2/interactive-content-taxonomie-bloom';

$string['objective_sentence'] = 'Saisir un Acquis d\'Apprentissage Visé';
$string['objective_sentence_help'] = 'Saisir un Acquis d\'Apprentissage Visé ';

$string['objectives:delete'] = 'Supprimer un Acquis d\'Apprentissage Visé';


// Evaluations
$string['header_evaluations'] = "Évaluations";

$string['add_evaluation'] = 'Ajouter une évaluation';

$string['eval_type'] = 'Type d\'évaluation';
$string['evaluation_type_help'] = 'L\'évaluation peut être : <ul>
                                <li><strong>diagnostique</strong> : elle est placée avant la séquence d\'apprentissage. Elle permet de faire le point sur les acquis de l\'élève et de prévoir son enseignement.</li>
                                <li><strong>formative</strong> : elle se situe pendant la séquence. Elle permet à l\'enseignant de réguler son cours (rythme, contenu ...) et à l\'élève d\'identifier ses lacunes.</li>
                                <li><strong>sommative</strong> : elle est une forme d’évaluation des acquis se déroulant après l’action de formation. Sa fonction est de certifier que les apprenants maîtrisent les objectifs définis par le système, et qui débouche sur une décision d\'acceptation ou de refus dans un niveau supérieur, ou sur une décision de classement.</li></ul>';

$string['eval_description'] = 'Description';
$string['eval_description_help'] = 'Donner quelques informations complémentaires pour décrire brièvement la/les évaluation(s) prévue(s).<br /><br />Cette rédaction permet de réflechir à l\'alignement pédagogique dès le début de la création du scénario.<br/><br/>
                                        Définition de l\'alignement pédagogique selon Biggs : cohérence pédagogique entre les visées d\'apprentissage, les stratégies et activités d\'apprentissage et les méthodes d\'évaluation de ces apprentissages.';


// Activités pédagogiques
$string['header_learning_activities'] = "Modes pédagogiques";

$string['learning_mode'] = 'Mode pédagogique';
$string['learning_mode_ar'] = 'Modes pédagogiques';
$string['learning_mode_help'] = 'Il existe 5 modes pédagogiques : <ul>
                                        <li><strong>Individuel</strong> : Les apprenants s\'attellent à des tâches de manière individuelle ou à deux.</li>
                                        <li><strong>Collaboratif</strong> : Le travail se fait en petits groupes (de 3 à 6).</li>
                                        <li><strong>Participatif</strong> : L\'enseignant expose son propos. Les étudiants réagissent dans des relations unilatérales avec l\'enseignant.</li>
                                        <li><strong>Interactif</strong> : La parole de l\'enseignant se mêle d\'échanges avec et entre les étudiants.</li>
                                        <li><strong>Transmissif</strong> : L\'enseignant dispense la matière dans un sens unique. Même en mode transmissif, il peut y avoir de grandes variations d\'activation :
                                            qui fait une démonstration au tableau la rend plus "directement rencontrable" qu\'en la projetant toute faite sur un écran.</li></ul>';
$string['learning_mode_usage'] = 'Sélectionner le(s) mode(s) pédagogique(s) que vous souhaitez utiliser :';

$string['learning_mode_source'] = ' <p>MASSON Olivier, « Chapitre 17. Design pédagogique et design spatial : intérêts mutuels », dans : Benoît Raucent éd., Accompagner les étudiants. Rôles de l\'enseignant, 
dispositifs et mises en oeuvre. Louvain-la-Neuve, De Boeck Supérieur, « Pédagogies en développement », 2021, p. 353-382. DOI : 10.3917/dbu.rauce.2021.01.0353. 
URL : <a href="https://www.cairn.info/accompagner-les-etudiants--9782807318960-page-353.htm">https://www.cairn.info/accompagner-les-etudiants--9782807318960-page-353.htm</a></p>';

//////////////////////////////////////
// Formulaire structure
//////////////////////////////////////

// AAV
$string['header_aav'] = 'Acquis d\'Apprentissages Visés';
$string['header_aav_help'] = 'Liste des Acquis d\'Apprentissage Visés de votre scénario.';
$string['taxonomy_chart'] = 'Niveaux de taxonomie de Bloom';
$string['taxonomy_details_show'] = 'Afficher le détail de la taxonomie';
$string['taxonomy_details_hide'] = 'Cacher le détail de la taxonomie';
$string['objectives_number'] = 'Nombre d\'objectifs ';

// Tags
$string['tag'] = 'Tag';
$string['tags'] = 'Tags';
$string['header_tags_help'] = 'Liste des critères que vous avez choisi.';

// Suggestions
$string['header_suggestions'] = 'Suggestions';
$string['header_suggestions_help'] = 'Liste des propositions d\'activités en fonctions des tags choisis précédemment.';
$string['match'] = 'Pourcentage de correspondance avec vos critères et objectifs';
$string['more'] = 'Afficher d\'autres suggestions';
$string['less'] = 'Afficher moins de suggestions';

// Etapes
$string['header_steps'] = 'Scénariser mon enseignement';

$string['add_step'] = 'Ajouter une étape';
$string['edit_step'] = 'Modifier le nom de l\'étape';
$string['booste_step'] = 'Etape';
$string['delete_booste_step'] = 'Supprimer une étape';
$string['delete_booste_step_confirm'] = 'Supprimer l\'étape ?';

$string['add_activity'] = 'Ajouter une activité';
$string['add_resource'] = 'Ajouter une ressource';
$string['add_guideline'] = 'Ajouter une consigne';

$string['edit_element'] = 'Modifier l\'élément';
$string['delete_element'] = 'Supprimer l\'élément';
$string['delete_element_confirm'] = 'Supprimer l\'élément ?';
$string['saved_element'] = 'Votre scénario a été sauvegardé et mis à jour';

$string['element'] = 'Element';
$string['resource'] = 'Ressource';
$string['activity'] = 'Activité';

// Déploiement
$string['deploy'] = 'Déployer';
$string['deploy_help'] = 'Il y a deux méthodes de déploiement de votre scénario : <ul>
                            <li><strong>dans une seule section</strong> : votre scénario sera déployé dans une seule et unique section.</li>
                            <li><strong> dans plusieurs sections</strong> : votre scénario sera déployé dans plusieurs sections (dans le cas d\'une scénarisation avec plusieurs étapes).</li></ul>';
$string['deploy_ar'] = 'Je souhaite déployer le scénario dans : ';
$string['deploy_0'] = 'Une section';
$string['deploy_1'] = 'Plusieurs sections';
$string['deploy_on'] = 'Déployer sur';

//////////////////////////////////////
// Erreurs
//////////////////////////////////////

$string['no_obj'] = 'Vous n\'avez pas saisi d\'Acquis d\'Apprentissage Visé';
$string['no_suggestions'] = 'Il n\'y a aucune suggestion pour votre scénario, changez vos critères ou AAV pour en faire apparaître';
$string['elements_missing'] = 'Il manque des éléments dans une de vos étapes';
$string['already_deployed'] = 'Votre scénario a déjà été déployé, modifiez les activités pour pouvoir le déployer à nouveau.';
$string['only_one_step_left'] = 'Une étape est obligatoire pour la création de votre scénario';
$string['no_link'] = 'Aucun lien';
$string['unavailable_in_moodle'] = 'Cette activité n\'est pas présente sur Moodle';
$string['no_access_to_booste'] = 'Vous n\'avez pas accès à BOOSTE';

//////////////////////////////////////
// Taxonomies
//////////////////////////////////////

$string['all'] = 'Toutes';
$string['synthesis'] = 'Créer';
$string['evaluation'] = 'Évaluer';
$string['analysis'] = 'Analyser';
$string['application'] = 'Appliquer';
$string['comprehension'] = 'Comprendre';
$string['knowledge'] = 'Mémoriser';

$string['detail_synthesis'] = 'Assembler des éléments pour former un tout nouveau et cohérent, ou faire une production originale.';
$string['detail_evaluation'] = 'Porter un jugement sur la base de critères et de normes.';
$string['detail_analysis'] = 'Décomposer les parties constitutives d\'un tout et déterminer les liens qui unissent ces parties entre elles et à une structure ou une finalité.';
$string['detail_application'] = 'Exécuter ou utiliser une procédure dans une situation donnée.';
$string['detail_comprehension'] = 'Construire la signification d\'informations reçues (orales, écrites et graphiques).';
$string['detail_knowledge'] = 'Extraire les connaissances significatives issues de sa mémoire à long-terme.';

//////////////////////////////////////
// Boutons
//////////////////////////////////////

$string['booste_next'] = 'Étape suivante';
$string['booste_before'] = 'Étape précédente';
$string['booste_duplicate'] = 'Dupliquer le scénario ';
$string['shared'] = 'Scénarios partagés';
$string['first_form'] = 'Ajouter un scénario';
$string['second_form'] = 'Paramétrer le scénario';
$string['third_form'] = 'Structurer le scénario';
$string['booste_end'] = 'Enregistrer et quitter';
$string['delete_ext_activity_confirm'] = "Supprimer l'activité extérieure à Moodle ?";
$string['delete_tag_confirm'] = "Supprimer le tag ?";
$string['delete_booste'] = "Supprimer le scénario";
$string['delete_booste_confirm'] = 'Supprimer le scénario ?';
$string['return_index'] = "Index des scénarios";
$string['edit_params'] = 'Modifier vos paramètres de tags';
$string['edit_goals'] = 'Modifier vos défis et AAV';

//////////////////////////////////////
// Autre
//////////////////////////////////////

$string['link'] = "Description détaillée de l'activité";
$string['ext_activity'] = "Activité hors Moodle";
$string['timemodified'] = "Modifié dernièrement";
$string['you'] = "Vous";
$string['duplicate_on'] = 'Dupliquer sur ';
$string['duplicated'] = 'Ce scénario a été dupliqué, cliquez <a>ici</a> pour y accéder';
$string['deployednoyes_0'] = "Tous les scénarios";
$string['deployednoyes_1'] = "Scénarios déployés";
$string['points'] = "Points";

//////////////////////////////////////
// Verbes
//////////////////////////////////////

//SYNTHESIS
$string['build'] = "Construire";
$string['draw'] = "Dessiner";
$string['imagine'] = "Imaginer";
$string['invent'] = "Inventer";
$string['assemble'] = "Monter";
$string['narrate'] = "Raconter";

//EVALUATION
$string['collaborate'] = "Collaborer";
$string['compare'] = "Comparer";
$string['conclude'] = "Conclure";
$string['discuss'] = "Discuter";
$string['evaluate'] = "Evaluer";
$string['prioritize'] = "Prioriser";

//ANALYSIS
$string['analyze'] = "Analyser";
$string['categorize'] = "Catégoriser";
$string['compare'] = "Comparer";
$string['deduct'] = "Déduire";
$string['distinguish'] = "Distinguer";
$string['identify'] = "Identifier";

//APPLICATION
$string['choose'] = "Choisir";
$string['complete'] = "Compléter";
$string['employ'] = "Employer";
$string['organize'] = "Organiser";
$string['transfer'] = "Transférer";
$string['use'] = "Utiliser";

//COMPREHENSION
$string['explain'] = "Expliquer";
$string['illustrate'] = "Illustrer";
$string['interpret'] = "Interpréter";
$string['prepare'] = "Préparer";
$string['rewrite'] = "Réécrire";
$string['represent'] = "Représenter";

//KNOWLEDGE
$string['describe'] = "Décrire";
$string['identify'] = "Identifier";
$string['name'] = "Nommer";
$string['remind'] = "Rappeler";
$string['recognize'] = "Reconnaître";

//////////////////////////////////////
// Autres champs
//////////////////////////////////////

$string['activity_time'] = "Durée de l'activité";
$string['helper'] = 'Aide';
//$string['learning_goal'] = "Intention pédagogique";
//$string['tools'] = "Outil";
//$string['oc_work'] = "Travail en autonomie";
//$string['group_type'] = 'Organisation de l\'effectif';
//$string['content_type'] = 'Médiatisation des contenus';

//////////////////////////////////////
// Tags
//////////////////////////////////////

//Durée globale

$string["course_under_60_mn"] = "Moins de 60 min";
$string["course_between_1h_and_2h"] = "Entre 1h et 2h";
$string["course_between_1h_and_1h30"] = "Entre 1h et 1h30";
$string["course_over_2h"] = "Plus de 2h";

//Modalité

$string["comodal"] = "Comodal";
$string["async_remote"] = "Distanciel asynchrone";
$string["sync_remote"] = "Distanciel synchrone";
$string["hybrid"] = "Hybride";
$string["presential"] = "Présentiel";
//$string["all_modality"] = "Tous modes";

//Semestres d'études

//$string["Sem_one"] = "Semestre 1";
//$string["Sem_two"] = "Semestre 2";
//$string["Sem_three"] = "Semestre 3";
//$string["Sem_four"] = "Semestre 4";
//$string["Sem_five"] = "Semestre 5";
//$string["Sem_six"] = "Semestre 6";
//$string["Sem_seven"] = "Semestre 7";
//$string["Sem_eight"] = "Semestre 8";
//$string["Sem_nine"] = "Semestre 9";
//$string["Sem_ten"] = "Semestre 10";
$string["sem_year_one"] = "S1-S2";
$string["sem_year_two"] = "S3-S4";
$string["sem_year_three"] = "S5-S6";
$string["sem_year_four"] = "S7-S8";
$string["sem_year_five"] = "S9-S10";

// Disciplines ENSAM

$string["conceive"] = "Concevoir";
$string["eea"] = "EEA";
$string["energy"] = "Energétique";
$string["languages"] = "Langues vivantes";
$string["materials"] = "Matériaux";
$string["mathsinfo"] = "Maths-Info";
$string["mechanical"] = "Mécanique";
$string["organizer"] = "Organiser";
$string["realizer"] = "Réaliser";
$string["management_science"] = "Sciences de gestion";

//Espaces d'apprentissage

$string["auditorium"] = "Amphithếâtre";
$string["workshop"] = "Atelier";
$string["library"] = "Bibliothèque";
$string["autonomy_room"] = "Espace de travail en autonomie";
$string["group_room"] = "Espace de travail en groupe";
$string["informal_space"] = "Espace informel";
$string["outside"] = "Hors les murs";
$string["comodal_room"] = "Salle comodale";
$string["classroom"] = "Salle de cours";
$string["computer_room"] = "Salle informatique";
$string["modulable"] = "Salle modulable";

// Formation concernée

$string["PGE"] = "Programme Grande Ecole";
$string["PIS"] = "Programme Ingénieur Spécialité";
$string["Bachelor"] = "Bachelor";
//$string["Licence"] = "Licence";
$string["Master"] = "Master";
$string["Doctorat"] = "Doctorat";

//Taille du groupe

$string["under_10"] = "Moins de 10 apprenants";
$string["between_11_30"] = "Entre 11 et 30 apprenants";
//$string["under_30"] = "Moins de 30 apprenants";
$string["between_31_60"] = "Entre 31 et 60 apprenants";
$string["between_61_100"] = "Entre 61 et 100 apprenants";
$string["over_100"] = "Plus de 100 apprenants";

//Format du cours

$string["lecture"] = "Cours magistral";
$string["project"] = "Projet";
$string["seminar"] = "Travaux dirigés";
$string["practical"] = "Travaux pratiques";
$string["all_course_type"] = "Tout format";

//Défis

$string['climat'] = "Améliorer le climat de la classe";
$string['autonomy'] = "Développer l'autonomie";
$string['outside_class'] = "Développer l'implication en dehors de la classe";
$string['teamwork'] = "Encourager le travail en groupe";
$string['inclusiveness'] = "Favoriser l'inclusivité";
$string['participation'] = "Rendre les étudiants actifs";
$string['studs_with_difficulties'] = "Soutenir les étudiants en difficulté";
$string['introspection'] = "Susciter le questionnement";
$string['rgpd'] = "Prendre en compte le RGPD";
$string['heterogene'] = "Gérer l'hétérogénéité";
$string['oddrse'] = "Intégrer un ODD dans mon enseignement";
$string['other_challenge'] = "Autre défi";

//Evaluation

$string["examination"] = "Diagnostique";
$string["formative"] = "Formative";
$string["sommative"] = "Sommative";

//Type d'évaluation
//$string["peers_eval"] = "Evaluation par les pairs";
//$string["video_eval"] = "Evaluation par une production vidéo";
//$string["oral_eval"] = "Evaluation par une production orale";
//$string["quiz_eval"] = "Evaluation par un quiz";
//$string["writing_eval"] = "Evaluation par une production écrite";
//$string["poster_eval"] = "Evaluation par un poster";
//$string["role_eval"] = "Evaluation par jeu de rôle";
//$string["mindmap_eval"] = "Evaluation par cartes conceptuelles";
//$string["portfolio_eval"] = "Evaluation par portfolio";

//Modes pédagogiques

$string["lm_individual"] = "Individuel";
$string["lm_collaborative"] = "Collaboratif";
$string["lm_participative"] = "Participatif";
$string["lm_interactive"] = "Interactif";
$string["lm_transmissive"] = "Transmissif";
//$string["all_lm_type"] = "Tout type";

// Durée de l'activité

$string['under_30mn'] = "< 30 min";
$string['under_60mn'] = "< 60 min";
$string['over_60mn'] = "> 60 min";


//////////////////////////////////////
// Procédures activités HL
//////////////////////////////////////

//Custom 1 : 

//$string['custom1_procedure'] = "Procédure :

    //1. Demander aux élèves d’étudier des notions qui ont préalablement été abordées en classe.
    //2. Former des équipes d’élèves pour le déroulement du tournoi. Il est possible soit de former plusieurs petites équipes qui s’affronteront dans le tournoi, soit de former deux grandes équipes. Dans un cas ou dans l'autre, il est possible de nommer des chefs d’équipe qui, à leur tour, choisissent librement leurs coéquipiers.
    //3. Dans le cas d’un tournoi avec plusieurs petites équipes, l'enseignant peut proposer des épreuves sous différentes formes : répondre à un questionnaire, faire un jeu ou encore résoudre un problème.
    //4. Dans le cas d’un tournoi avec deux grandes équipes, l'enseignant pose des questions à chaque membre d'une même équipe à tour de rôle. Dès qu’il y a une mauvaise réponse, la question est adressée à l’équipe adverse et ainsi de suite.
    //5. Pour les deux étapes précédentes, il est important que les épreuves imposées et les questions posées soient toujours en lien avec les objectifs d’apprentissage et les contenus concernés par l’activité.
    //6. Lors du déroulement du tournoi, l'enseignant affiche les points cumulés par chaque équipe.
    //7. L'enseignant peut prévoir un prix ou une récompense pour l’équipe gagnante.

//";

//Custom 2:

//$string['custom2_procedure'] = "Procédure :

    //1. Choisir un sujet principal et global (thème, unité, chapitre, etc.) qui comporte plusieurs relations avec divers concepts.
    //2. Expliquer l’exercice de conception d’une carte conceptuelle aux élèves et leur montrer des exemples (idéalement sur des notions préalablement vues dans le cours).
    //   Deux options sont suggérées : distribuer des feuilles blanches pour que les élèves puissent y tracer leur carte conceptuelle ou distribuer une feuille contenant une liste des principaux concepts. Cette dernière option est plus simple et peut être utilisée dans un contexte où les élèves sont moins expérimentés avec les cartes conceptuelles.
    //3. Pendant que les élèves sont à la tâche, circuler dans la classe afin de prendre le pouls et de répondre aux questions.
    //4. Il est possible de procéder au partage des cartes entre les élèves afin qu’ils comparent leur compréhension des notions acquises et qu’ainsi ils enrichissent leur travail. L’enseignant peut aussi présenter quelques bons exemples de cartes conceptuelles en plénière et les commenter.

//n";

//Custom 3 : 

//$string['custom3_procedure'] = "Procédure :

    //1. Présenter aux élèves les consignes relatives à l’exposé (sujet libre ou imposé, travail individuel ou en équipe, durée de l’exposé, utilisation ou non de moyens audio-scripto-visuels).
    //2. Préparer la grille d’évaluation et la transmettre aux élèves.
    //3. Être disponible afin de répondre aux questions des élèves et de les encadrer dans leur travail lors de la préparation de l’exposé.
    //4. Établir un ordre de passage pour les exposés et en faire part aux élèves.
    //5. Le jour des exposés, s’assurer d’avoir les ressources nécessaires au déroulement de l’activité (par exemple, prévoir un projecteur pour les présentations PowerPoint, le cas échéant).
    //6. Pendant les exposés, remplir les grilles d’évaluation et gérer le temps en avertissant les élèves lorsqu’il reste peu de temps avant la fin de la période allouée.
    //7. À la fin de chacun des exposés, inviter l’auditoire, composé des autres élèves de la classe, à poser des questions aux orateurs.

//";

//////////////////////////////////////
// Autres tags pour version ultérieure
//////////////////////////////////////

//$string["international_studs"] = "Etudiants internationaux";
//$string["mixed_studs"] = "Hétérogénéité du groupe";
//$string["disabled_students"] = "Etudiants en situation de handicap";
//$string["remote_students"] = "Etudiants à distance";
//$string["other_specs"] = "Autre";
//$string["no_specs"] = "Aucune spécificité";

//$string['socialize'] = "Socialisation";
//$string['learn'] = "Apprentissage";

//$string['eval_diagnostic'] = "Evaluation-diagnostic";
//$string['eval_formative'] = "Evaluation-formative-sommative";
//$string['feedback'] = "Feedback";
//$string['auto_eval'] = "Auto-évaluation";
//$string['metacognition'] = "Métacognition";

//$string['interactive_screen'] = "Ecran interactif";
//$string['digital'] = "Jumeau numérique";
//$string['video_projector'] = "Vidéo projecteur";

//$string['upstream'] = "En amont";
//$string['downstream'] = "En aval";

//$string['c_primary'] = "Primaire";
//$string['c_secondary'] = "Secondaire";
//$string['c_tertiary'] = "Supérieur";

//$string['ls_individual'] = 'Individuel';
//$string['ls_less_6'] = 'Petit groupe (< 6)';
//$string['ls_full_class'] = 'Classe entière';

//$string['ct_basic'] = 'Basique';
//$string['ct_intermediate'] = 'Intermédiaire';
//$string['ct_advanced'] = 'Avancé';


// Chaînes utilisées par forms/modedit.php pour le titre de la page d'édition d'un
// élément (activité/ressource). Volontairement propres au plugin plutôt que de
// dépendre des chaînes 'moodle' du noyau ('updatinga'/'updatingain'/'addinganew'/
// 'addinganewto'/'editinga'), qui ont été renommées/supprimées selon les versions
// de Moodle, ce qui faisait apparaître le titre sous la forme littérale '[[identifiant]]'.
$string['booste_updatinga'] = 'Modification de {$a}';
$string['booste_updatingain'] = 'Modification de {$a->what} dans {$a->in}';
$string['booste_addinganew'] = 'Ajout d\'un nouveau {$a}';
$string['booste_addinganewto'] = 'Ajout d\'un nouveau {$a->what} à {$a->in}';
$string['booste_editinga'] = 'Modification de {$a}';
