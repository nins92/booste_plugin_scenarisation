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
 * @copyright   2022 Arts & Métiers
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Booste';
$string['booste'] = 'Booste';
$string['local_booste'] = 'Booste';
$string['scenario'] = 'Script';
$string['myboostes'] = 'My scripts';

//////////////////////////////////////
// Index Header
//////////////////////////////////////
$string['heading'] = 'BOOSTE : Toolbox for scripting your lessons';
//$string['heading_desc'] = "<br>Welcome to BOOSTE, the toolbox who helps you to stage your education <br>";
$string['create_booste_button'] = "Create a script";
$string['author'] = "Author";
$string['read'] = "Consult";


//////////////////////////////////////
// Admin
//////////////////////////////////////

$string['manage'] = "Manage Booste";

$string['boostes_settings'] = "Manage scripts";

$string['activities_settings'] = "Manage activities suggestions";

$string['field'] = "Field";
$string['fields'] = "Fields";
$string['custom_tags'] = "Custom tags";
$string['ext_activity'] = "Activity outside Moodle";
$string['ext_activities'] = "Activities outside Moodle";
$string['informationformodule'] = 'More information about {$a}';
$string['ext_activities_settings'] = "Manage activities outside Moodle";
$string['create_ext_activity_button'] = "Add an activity outside Moodle";
$string['create_tag_button'] = "Create a tag";

$string['activities_tags'] = "Manage activities tags";

$string['tags_settings'] = "Manage tags";

$string['fields_settings'] = "Manage fields";

$string['elementnotfound'] = 'Element with ID {$a} not found.';
//////////////////////////////////////
// Criterias form
//////////////////////////////////////


// Informations
$string['header_informations'] = "Script informations";

$string['booste_name'] = "Script's name";
$string['name_help'] = "Give a name to your script, mandatory";

$string['privacy_ar'] = 'Script\'s privacy';
$string['privacy_0'] = 'Public';
$string['privacy_1'] = 'Private';
$string['privacy']		= 'Script\'s privacy';
$string['privacy_title']	= 'Script\'s privacy';
$string['privacy_help'] = 'Define your script\'s sharing settings :<ul>
                           <li><strong>Public :</strong> Your script appears in the bank of scripts.</li>
                           <li><strong>Private :</strong> Your script is only visible by you</li></ul>';

$string['discipline'] = 'Discipline';
$string['discipline_help'] = 'Indicate your script\'s discipline(s)';

$string['course_type'] = 'Course type';
$string['course_type_ar'] = 'Course type';
$string['course_type_help'] = 'Choose your script\'s course type';
$string['course_type_help'] = 'There are several course formats: :<ul>
                                    <li><strong>Lecture</strong> : Lecture-style course in an amphitheater</li>
                                    <li><strong>Small theoritical class</strong>: Directed study sessions</li>
                                    <li><strong>Small pratical class</strong>: Pratical work</li>
                                    <li><strong>Project</strong></li></ul>';
$string['no_particular_format'] = 'No specific format';

$string['course_time'] = 'Course time';
$string['course_time_help'] = 'Indicative duration of your script. It can be shorter than the duration of the course. It can be longer than the duration of the course if out-of-class work is planned. 
                               <br>You have the possibility to create several successive script for the same course. 
                               <br><br>Note: the duration of a teaching activity can vary greatly depending on the level of complexity and demands that you will impose in this activity. 
                               Choosing the maximum duration does not necessarily constrain you in time, but it will allow you to obtain a wider range of suggestions for teaching activities. <br><br> 
                               We advise you to vary this criterion if the suggestions resulting from your first choice do not satisfy you.';


$string['modality'] = 'Method';
$string['modality_help'] = 'The teaching method could be : <ul> 
                                 <li><strong>presential</strong> : Teaching with physical presence alongside students in a defined location.</li>
                                 <li><strong>hybrid</strong> : Teaching combining in-person and remote learning.</li>
                                 <li><strong>remote</strong> : Online teaching (via LMS platform, video conferencing, etc.)</li>
                                 <li><strong>comodal</strong> : Synchronous teaching with students both in person and at a distance.</li></ul>';

//$string['place'] = 'Place';
//$string['place_help'] = 'Precise places of your script';

$string['description'] = 'Description';
$string['description_help'] = 'Add complementary informations to briefly describe your script.';


// Concerned public
$string['header_public_concerned'] = "Concerned public";

//$string['cycle'] = 'Cycle';
//$string['cycle_help'] = 'Your education concerns students of :
  //                          <br>- primary : preschool and elementary school
    //                        <br>- secondary : middle and high school
      //                      <br>- superior : college';

$string['formation'] = 'Training';
$string['formation_help'] = 'Students level concerned by the script';

$string['students_level'] = 'Students level';
$string['students_level_help'] = 'Students year concerned by the script';

$string['group_size'] = 'Group size';
$string['group_size_help'] = 'Number of attendees to your education';

//$string['students_specs'] = 'Students specificities';
//$string['students_specs_help'] = 'Particularities of your students';

//////////////////////////////////////
// Parameters form
//////////////////////////////////////

$string['challenge'] = 'Teacher\'s challenge';
$string['challenge_help'] = 'It allows expressing an intention other than organizing the course. The script would then be the means to achieve this. For example: you have noticed a lack of student participation and you want to promote interaction.';

$string['add_challenge'] = 'New challenge';
$string['add_challenge_warning'] = 'Adding a personal challenge will be taken into account by the administrator as soon as possible. It will therefore have no impact on your suggestions for the time being.';
$string['add_challenge_help'] = 'Can\'t find your challenge in the list ? Click on the button « New challenge » to add yours.';

// Objectives
$string['header_objectives'] = "Learning Outcomes";

$string['objective_placeholder'] = "At the end of the course, students will be able to : ";
$string['canva'] = "Canva";
$string['objective_example'] = "<b>Learning outcomes' examples :</b>";

$string['objective_example_1'] = "[PUBLIC] will be able to [BEHAVIOR BY AN ACTION VERB] by showing that [PERFORMANCE LEVEL] when [BACKGROUND]. <br><i> At the end of their training, the students will be able to apply advanced concepts in computer science to solve complex problems and develop innovative software, thus demonstrating a high level of competency in programming and software design.</i>";
$string['objective_example_2'] = "[PUBLIC] will be capable of [ACTION VERB] [WHAT] in order to [WHY] by [HOW] at [PERFORMANCE LEVEL]. <br><i> At the end of the course, students will be able to take on the managerial role of the engineer and implement appropriate management tools. </i>";
$string['objective'] = 'Learning outcome';
$string['objectives'] = 'Learning outcomes';

$string['add_objective'] = 'Add a learning outcome';
$string['edit_objective'] = 'Edit a learning outcome';
$string['delete_objective'] = 'Delete a learning outcome';
$string['delete_objective_confirm'] = 'Delete this learning outcome ?';

$string['taxonomy'] = 'Bloom\'s taxonomy';
$string['taxonomy_manual'] = 'Manual';
$string['taxonomy_help'] = 'There are 6 taxonomy levels of BLOOM :
                                <li><strong>Remember</strong> : Retrieve meaningful knowledge from long-term memory.</li>
                                <li><strong>Understand</strong> : Construct the meaning of received information (oral, written, and graphical).</li>
                                <li><strong>Apply</strong> : Execute or use a procedure in a given situation.</li>
                                <li><strong>Analyze</strong> : Break down the constitutive parts of a whole and determine the links that unite these parts within a structure or purpose.</li>
                                <li><strong>Evaluate</strong> : Make a judgment based on criteria and standards.</li>
                                <li><strong>Create</strong> : Assemble elements to form a completely new and coherent whole, or produce something original.</li></ul><br>
                                Source : <i>Krathwohl, D. R. (2002). A revision of Bloom’s taxonomy : An overview. Theory Into Practice, 41(4), 212-218.</i>' ;


$string['verbs_example'] = 'Examples of verbs to use : ';
$string['complete_list_verbs'] = 'Complete list of verbs';
$string['taxonomy_verbs_link'] = 'https://view.genial.ly/642af479a673c1001856f9d2/interactive-content-taxonomie-bloom';

$string['objective_sentence'] = 'Write a learning outcome';
$string['objective_sentence_help'] = 'Write a a learning outcome';

$string['objectives:delete'] = 'Delete a learning outcome';


// Evaluations
$string['header_evaluations'] = "Assessments";
//$string['evaluation'] = 'Assessment';
$string['add_evaluation'] = 'Add an assessment';

$string['eval_type'] = 'Type of assessment';
$string['evaluation_type_help'] = 'Assessment could be : 
                                <li><strong>Diagnostic</strong> : It is placed before the learning sequence. It allows for an assessment of the student\'s achievements and for planning their teaching.</li>
                                <li><strong>Formative</strong> : It takes place during the sequence. It allows the teacher to adjust their course (pace, content, etc.) and the student to identify their weaknesses.</li>
                                <li><strong>Summative</strong> : It is a form of evaluating the achievements that takes place after the training action. Its function is to certify that the learners have mastered the objectives defined by the system, and it leads to a decision of acceptance or refusal at a higher level, or to a decision of ranking.</li></ul>';

$string['eval_description'] = 'Description';
$string['eval_description_help'] = 'Give some additional information to briefly describe the planned assessment(s). <br><br> This writing allows for reflection on pedagogical alignment from the beginning of the script creation.
                                    Definition of pedagogical alignment according to Biggs: pedagogical coherence between the learning objectives, learning strategies and activities, and the methods of assessment of these learnings.';


// Learning activities
$string['header_learning_activities'] = "Learning ways";

$string['learning_mode'] = 'Learning ways';
$string['learning_mode_ar'] = 'Learning ways';
$string['learning_mode_help'] = 'There are 5 learning ways :
                                        <br>- individual : Learners work on tasks individually or in pairs.
                                        <br>- collaborative : Work is done in small groups (3 to 6).
                                        <br>- participative : The teacher presents their ideas. Students react in one-way interactions with the teacher.
                                        <br>- interactive : The teacher\'s speech is intertwined with exchanges with and among the students.
                                        <br>- transmissive : The teacher delivers the material in a one-way direction. Even in a transmissive mode, there can be significant variations in activation: giving a demonstration on the board makes it more "directly accessible" than projecting it ready-made on a screen.';

$string['learning_mode_usage'] = 'Select learning ways you want to use :';
$string['learning_mode_source'] = ' <p>MASSON Olivier, « Chapitre 17. Design pédagogique et design spatial : intérêts mutuels », dans : Benoît Raucent éd., Accompagner les étudiants. Rôles de l\'enseignant, 
dispositifs et mises en oeuvre. Louvain-la-Neuve, De Boeck Supérieur, « Pédagogies en développement », 2021, p. 353-382. DOI : 10.3917/dbu.rauce.2021.01.0353. 
URL :<a href="https://www.cairn.info/accompagner-les-etudiants--9782807318960-page-353.htm">https://www.cairn.info/accompagner-les-etudiants--9782807318960-page-353.htm</a></p>';


//////////////////////////////////////
// Form structure
//////////////////////////////////////

// Objectives
$string['header_aav'] = 'Learning outcomes';
$string['header_aav_help'] = 'List of learning outcomes of your script';
$string['taxonomy_chart'] = 'Bloom taxonomy levels';
$string['taxonomy_details_show'] = 'Show taxonomy details';
$string['taxonomy_details_hide'] = 'Hide taxonomy details';
$string['objectives_number'] = 'Number of learning outcomes';

// Tags
$string['tag'] = 'Tag';
$string['tags'] = 'Tags';
$string['header_tags_help'] = 'List of criterias you have chosen';

// Suggestions
$string['header_suggestions'] = 'Suggestions';
$string['header_suggestions_help'] = 'List of activity proposals based on the previously chosen tags';
$string['match'] = 'Percentage of correspondence with your criteria and learning outcomes';
$string['more'] = 'Show more suggestions';
$string['less'] = 'Show less suggestions';

// Steps
$string['header_steps'] = 'Scripting my teaching';

$string['add_step'] = 'Add a step';
$string['edit_step'] = 'Edit name of step';
$string['booste_step'] = 'Step';
$string['delete_booste_step'] = 'Delete a step';
$string['delete_booste_step_confirm'] = 'Delete this step ?';

$string['add_activity'] = 'Add an activity';
$string['add_resource'] = 'Add a resource';
$string['add_guideline'] = 'Add an instruction';

$string['edit_element'] = 'Edit an element';
$string['delete_element'] = 'Delete an element';
$string['delete_element_confirm'] = 'Delete this element ?';
$string['saved_element'] = 'Your script has been modified and updated';

$string['element'] = 'Element';
$string['resource'] = 'Resource';
$string['activity'] = 'Activity';

// Deployment
$string['deploy'] = 'Deploy';
$string['deploy_help'] = 'There are two methods of deployement of your script :
                            <li><strong>in one section :</strong> your script will be deployed in a single section.</li>
                            <li><strong>several sections :</strong> your script will be deployed in multiple sections (in the case of scripting with multiple steps).</li></ul>';
$string['deploy_ar'] = 'I want to deploy my script in : ';
$string['deploy_0'] = 'One section';
$string['deploy_1'] = 'Several sections';
$string['deploy_on'] = 'Deploy on';

//////////////////////////////////////
// Errors
//////////////////////////////////////

$string['no_obj'] = 'You didn\'t put any learning outcome';
$string['no_suggestions'] = 'There\'s no suggestions for your script, change your criterias and learning outcomes to make suggestions appear';
$string['elements_missing'] = 'Elements missing in one of your steps';
$string['already_deployed'] = 'Your script is already deployed, edit some activities to deploy it again.';
$string['only_one_step_left'] = 'A step is mandatory to deploy your script.';
$string['no_link'] = 'No link';
$string['unavailable_in_moodle'] = 'This activity is not available in Moodle';
$string['no_access_to_booste'] = 'You don\'t have access to BOOSTE';

//////////////////////////////////////
// Taxonomies
//////////////////////////////////////

$string['all'] = 'All';
$string['synthesis'] = 'Create';
$string['evaluation'] = 'Evaluate';
$string['analysis'] = 'Analyze';
$string['application'] = 'Apply';
$string['comprehension'] = 'Understand';
$string['knowledge'] = 'Remember';

$string['detail_synthesis'] = 'Assemble elements to form a completely new and coherent whole, or produce something original.';
$string['detail_evaluation'] = 'Make a judgment based on criteria and standards.';
$string['detail_analysis'] = 'Break down the constitutive parts of a whole and determine the links that unite these parts within a structure or purpose.';
$string['detail_application'] = 'Execute or use a procedure in a given situation.';
$string['detail_comprehension'] = 'Construct the meaning of received information (oral, written, and graphical).';
$string['detail_knowledge'] = 'Retrieve meaningful knowledge from long-term memory.';

//////////////////////////////////////
// Buttons
//////////////////////////////////////

$string['booste_next'] = 'Next step';
$string['booste_before'] = 'Previous step';
$string['booste_duplicate'] = 'Duplicate script ';
$string['shared'] = 'Shared scripts';
$string['first_form'] = 'Add a script';
$string['second_form'] = 'Setting your script';
$string['third_form'] = 'Structure your script';
$string['booste_end'] = 'Save and quit';
$string['delete_ext_activity_confirm'] = "Delete the activity outside Moodle ?";
$string['delete_tag_confirm'] = "Delete tag ?";
$string['delete_booste'] = "Delete script";
$string['delete_booste_confirm'] = 'Delete this script ?';
$string['return_index'] = "Scripts' list";
$string['edit_params'] = 'Edit your parameters tags';
$string['edit_goals'] = 'Edit your challenges and learning outcomes';

//////////////////////////////////////
// Others
//////////////////////////////////////

$string['link'] = "Detailed description of the activity";
$string['ext_activity'] = "Activity outside Moodle";
$string['timemodified'] = "Last modified";
$string['you'] = "You";
$string['duplicate_on'] = 'Duplicate on ';
$string['duplicated'] = 'This script has been duplicated, click <a>here</a> to view it';
$string['deployednoyes_0'] = "All scripts";
$string['deployednoyes_1'] = "Deployed scripts";
$string['points'] = "Points";

//////////////////////////////////////
// Verbs
//////////////////////////////////////

//SYNTHESIS
$string['build'] = "Build";
$string['draw'] = "Draw";
$string['imagine'] = "Imagine";
$string['invent'] = "Invent";
$string['assemble'] = "Assemble";
$string['narrate'] = "Narrate";

//EVALUATION
$string['collaborate'] = "Collaborate";
$string['compare'] = "Compare";
$string['conclude'] = "Conclude";
$string['discuss'] = "Discuss";
$string['evaluate'] = "Evaluate";
$string['prioritize'] = "Prioritize";

//ANALYSIS
$string['analyze'] = "Analyze";
$string['categorize'] = "Catégorize";
$string['compare'] = "Compare";
$string['deduct'] = "Deduct";
$string['distinguish'] = "Distinguish";
$string['identify'] = "Identify";

//APPLICATION
$string['choose'] = "Choose";
$string['complete'] = "Complete";
$string['employ'] = "Employ";
$string['organize'] = "Organize";
$string['transfer'] = "Transfer";
$string['use'] = "Use";

//COMPREHENSION
$string['explain'] = "Explain";
$string['illustrate'] = "Illustrate";
$string['interpret'] = "Interpret";
$string['prepare'] = "Prepare";
$string['rewrite'] = "Rewrite";
$string['represent'] = "Represent";

//KNOWLEDGE
$string['describe'] = "Describe";
$string['identify'] = "Identify";
$string['name'] = "Name";
$string['remind'] = "Remind";
$string['recognize'] = "Recognize";

//////////////////////////////////////
// Autres champs
//////////////////////////////////////

$string['activity_time'] = "Activity time";
$string['helper'] = 'Help';
//$string['learning_goal'] = "Learning goal";
//$string['tools'] = "Tools";
//$string['oc_work'] = "Outside courses work";
//$string['group_type'] = 'Group type';
//$string['content_type'] = 'Content type';

//////////////////////////////////////
// Tags
//////////////////////////////////////

//Durée globale

$string["course_under_60_mn"] = "Under 60 min";
$string["course_between_1h_and_2h"] = "Between 1h and 2h";
$string["course_between_1h_and_1h30"] = "Between 1h and 1h30";
$string["course_over_2h"] = "Over 2h";

//Modalité

$string["hybrid"] = "Hybrid";
$string["async_remote"] = "Asynchronous remote";
$string["sync_remote"] = "Synchronous remote";
$string["presential"] = "Presential";
$string["comodal"] = "Comodal";
//$string["all_modality"] = "All modes";

//Semestres d'études

//$string["Sem_one"] = "Semester 1";
//$string["Sem_two"] = "Semester 2";
//$string["Sem_three"] = "Semester 3";
//$string["Sem_four"] = "Semester 4";
//$string["Sem_five"] = "Semester 5";
//$string["Sem_six"] = "Semester 6";
//$string["Sem_seven"] = "Semester 7";
//$string["Sem_eight"] = "Semester 8";
//$string["Sem_nine"] = "Semester 9";
//$string["Sem_ten"] = "Semester 10";
$string["sem_year_one"] = "S1-S2";
$string["sem_year_two"] = "S3-S4";
$string["sem_year_three"] = "S5-S6";
$string["sem_year_four"] = "S7-S8";
$string["sem_year_five"] = "S9-S10";

// Disciplines ENSAM

$string["conceive"] = "Conceive";
$string["eea"] = "EEA";
$string["energy"] = "Energy";
$string["languages"] = "Languages ";
$string["materials"] = "Materials";
$string["mathsinfo"] = "Maths-Info";
$string["mechanical"] = "Mechanical";
$string["organizer"] = "Organize";
$string["realizer"] = "Realize";
$string["management_science"] = "Sciences management";

//Espaces d'apprentissage

$string["auditorium"] = "Amphitheater";
$string["workshop"] = "Workshop";
$string["library"] = "Library";
$string["autonomy_room"] = "Autonomous workspace";
$string["group_room"] = "Group workspace";
$string["informal_space"] = "Informal space";
$string["outside"] = "Outside";
$string["comodal_room"] = "Comodal room";
$string["classroom"] = "Classroom";
$string["computer_room"] = "Computer room";
$string["modulable"] = "Modular room";

// Formation concernée

$string["PGE"] = "The Grande Ecole Engineering Programme";
$string["PIS"] = "The Apprenticeship Engineering Programme";
$string["Bachelor"] = "Bachelor (undergraduate)";
//$string["Licence"] = "License";
$string["Master"] = "Master's Programme";
$string["Doctorat"] = "Doctoral studies";

//Taille du groupe

$string["under_10"] = "Less 10 learners";
$string["between_11_30"] = "Between 11 et 30 learners";
//$string["under_30"] = "Under 30 learners";
$string["between_31_60"] = "Between 31 and 60 learners";
$string["between_61_100"] = "Between 61 and 100 learners";
$string["over_100"] = "Over 100 learners";

//Format du cours

$string["lecture"] = "Lecture";
$string["project"] = "Project";
$string["seminar"] = "Small theoritical class";
$string["practical"] = "Small practical class";
$string["all_course_type"] = "All course type";

//Défis

$string['climat'] = "Improve the classroom atmosphere";
$string['autonomy'] = "Develop autonomy";
$string['outside_class'] = "Develop involvement outside the classroom";
$string['teamwork'] = "Encourage teamwork";
$string['inclusiveness'] = "Promote inclusiveness";
$string['participation'] = "Make students active";
$string['studs_with_difficulties'] = "Support students with difficulties";
$string['introspection'] = "Stimulate questioning";
$string['rgpd'] = "Take GDPR into account";
$string['heterogene'] = "Manage heterogeneity";
$string['oddrse'] = "Integrate a Sustainable Development Goal (SDG) into my teaching";
$string['other_challenge'] = "Other challenge";

//Evaluation

$string["examination"] = "Diagnostic";
$string["formative"] = "Formative";
$string["sommative"] = "Summative";

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

$string["lm_individual"] = "Individual";
$string["lm_collaborative"] = "Collaborative";
$string["lm_participative"] = "Participative";
$string["lm_interactive"] = "Interactive";
$string["lm_transmissive"] = "Transmissive";
$string["all_lm_type"] = "All modes";

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


// Strings used by forms/modedit.php for the activity/resource edit page heading.
// Deliberately plugin-owned (rather than relying on core 'moodle' strings like
// 'updatinga'/'updatingain'/'addinganew'/'addinganewto'/'editinga') because those
// core identifiers have been renamed/removed across Moodle versions, which made
// the heading display as a literal unresolved '[[identifier]]' placeholder.
$string['booste_updatinga'] = 'Updating a {$a}';
$string['booste_updatingain'] = 'Updating {$a->what} in {$a->in}';
$string['booste_addinganew'] = 'Adding a new {$a}';
$string['booste_addinganewto'] = 'Adding a new {$a->what} to {$a->in}';
$string['booste_editinga'] = 'Editing {$a}';
