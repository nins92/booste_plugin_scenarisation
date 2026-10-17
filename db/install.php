<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY"); without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Code to be executed after the plugin's database scheme has been installed is defined here.
 *
 * @package     local_booste
 * @category    upgrade
 * @copyright   2022 ENSAM <you@example.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Custom code to be run on installing the plugin.
 */
function xmldb_local_booste_install() {

    global $DB;

    $DB->execute("INSERT INTO {local_booste_list_fields} (name, field_order, is_important, points) VALUES ('taxonomy', 1, 1, 10)");
    $DB->execute("INSERT INTO {local_booste_list_fields} (name, field_order, points) VALUES ('challenge', 2, 8)");
    $DB->execute("INSERT INTO {local_booste_list_fields} (name, field_order, points) VALUES ('learning_mode', 3, 5)");
    $DB->execute("INSERT INTO {local_booste_list_fields} (name, field_order) VALUES ('activity_time', 4)");
    $DB->execute("INSERT INTO {local_booste_list_fields} (name, field_order, points) VALUES ('course_type', 5, 3)");
    $DB->execute("INSERT INTO {local_booste_list_fields} (name, field_order, is_important, points) VALUES ('modality', 6, 1, 10)");
    $DB->execute("INSERT INTO {local_booste_list_fields} (name, field_order, is_important, points) VALUES ('group_size', 7, 1, 10)");
    $DB->execute("INSERT INTO {local_booste_list_fields} (name, field_order, points) VALUES ('place', 8, 1)");
    $DB->execute("INSERT INTO {local_booste_list_fields} (name, points) VALUES ('course_time', 10)");
    $DB->execute("INSERT INTO {local_booste_list_fields} (name) VALUES ('students_level')");
    $DB->execute("INSERT INTO {local_booste_list_fields} (name) VALUES ('formation')");
    $DB->execute("INSERT INTO {local_booste_list_fields} (name) VALUES ('discipline')");
    $DB->execute("INSERT INTO {local_booste_list_fields} (name) VALUES ('eval_type')");
    $DB->execute("INSERT INTO {local_booste_list_fields} (name) VALUES ('other')");

    //$DB->execute("INSERT INTO {local_booste_list_fields} (name, field_order, points) VALUES ('students_specs', 9, 5)");
    //$DB->execute("INSERT INTO {local_booste_list_fields} (name, field_order) VALUES ('learning_goal', 10)");
    //$DB->execute("INSERT INTO {local_booste_list_fields} (name, field_order) VALUES ('tools', 13)");
    //$DB->execute("INSERT INTO {local_booste_list_fields} (name, field_order) VALUES ('oc_work', 14)");
    //$DB->execute("INSERT INTO {local_booste_list_fields} (name) VALUES ('cycle')");
    //$DB->execute("INSERT INTO {local_booste_list_fields} (name, field_order) VALUES ('group_type', 11)");
    //$DB->execute("INSERT INTO {local_booste_list_fields} (name, field_order) VALUES ('content_type', 12)");


//////////////////////////////////////
// ACTIVITES MOODLE
//////////////////////////////////////

//////////////////////////////////////
// Activités natives MOODLE
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_modules_link} (module, link) VALUES ((SELECT id FROM {modules} WHERE name='workshop'), 'https://docs.moodle.org/4x/fr/Atelier')");
    $DB->execute("INSERT INTO {local_booste_modules_link} (module, link) VALUES ((SELECT id FROM {modules} WHERE name='data'), 'https://docs.moodle.org/4x/fr/Activit%C3%A9_base_de_donn%C3%A9es')");
    $DB->execute("INSERT INTO {local_booste_modules_link} (module, link) VALUES ((SELECT id FROM {modules} WHERE name='assign'), 'https://docs.moodle.org/4x/fr/Devoir')");
    $DB->execute("INSERT INTO {local_booste_modules_link} (module, link) VALUES ((SELECT id FROM {modules} WHERE name='feedback'), 'https://docs.moodle.org/4x/fr/Feedback')");
    $DB->execute("INSERT INTO {local_booste_modules_link} (module, link) VALUES ((SELECT id FROM {modules} WHERE name='forum'), 'https://docs.moodle.org/4x/fr/Forum')");
    $DB->execute("INSERT INTO {local_booste_modules_link} (module, link) VALUES ((SELECT id FROM {modules} WHERE name='glossary'), 'https://docs.moodle.org/4x/fr/Glossaire')");
    $DB->execute("INSERT INTO {local_booste_modules_link} (module, link) VALUES ((SELECT id FROM {modules} WHERE name='h5pactivity'), 'https://docs.moodle.org/4x/fr/H5P')");
    $DB->execute("INSERT INTO {local_booste_modules_link} (module, link) VALUES ((SELECT id FROM {modules} WHERE name='lesson'), 'https://docs.moodle.org/4x/fr/Le%C3%A7on')");    
    $DB->execute("INSERT INTO {local_booste_modules_link} (module, link) VALUES ((SELECT id FROM {modules} WHERE name='choice'), 'https://docs.moodle.org/4x/fr/Param%C3%A8tres_du_sondage')");
    $DB->execute("INSERT INTO {local_booste_modules_link} (module, link) VALUES ((SELECT id FROM {modules} WHERE name='quiz'), 'https://docs.moodle.org/4x/fr/Test')");
    $DB->execute("INSERT INTO {local_booste_modules_link} (module, link) VALUES ((SELECT id FROM {modules} WHERE name='wiki'), 'https://docs.moodle.org/4x/fr/Wiki')");

    //$DB->execute("INSERT INTO {local_booste_modules_link} (module, link) VALUES ((SELECT id FROM {modules} WHERE name='lti'), 'https://docs.moodle.org/4x/fr/Outil_externe')");
    //$DB->execute("INSERT INTO {local_booste_modules_link} (module, link) VALUES ((SELECT id FROM {modules} WHERE name='scorm'), 'https://docs.moodle.org/4x/fr/Paquetage_SCORM')");
   
//////////////////////////////////////
// Activités additionnelles MOODLE
//////////////////////////////////////

    //A ACTIVER SI l'ACTIVITE EST INSTALLEE SUR VOTRE PLATEFORME
    
    //$DB->execute("INSERT INTO {local_booste_modules_link} (module, link) VALUES ((SELECT id FROM {modules} WHERE name='activequiz'), 'https://docs.moodle.org/4x/fr/Active_Quiz')");
    //$DB->execute("INSERT INTO {local_booste_modules_link} (module, link) VALUES ((SELECT id FROM {modules} WHERE name='choicegroup'), 'https://docs.moodle.org/4x/fr/Choix_de_groupe')");
    //$DB->execute("INSERT INTO {local_booste_modules_link} (module, link) VALUES ((SELECT id FROM {modules} WHERE name='realtimequiz'), 'https://docs.moodle.org/4x/fr/Active_Quiz')");
    //$DB->execute("INSERT INTO {local_booste_modules_link} (module, link) VALUES ((SELECT id FROM {modules} WHERE name='checklist'), 'https://docs.moodle.org/4x/fr/Liste_des_t%C3%A2ches')");
    //$DB->execute("INSERT INTO {local_booste_modules_link} (module, link) VALUES ((SELECT id FROM {modules} WHERE name='questionnaire'), 'https://docs.moodle.org/4x/fr/Questionnaire')"); 
    //$DB->execute("INSERT INTO {local_booste_modules_link} (module, link) VALUES ((SELECT id FROM {modules} WHERE name='scheduler'), 'https://docs.moodle.org/4x/fr/Rendez-Vous')");
    //$DB->execute("INSERT INTO {local_booste_modules_link} (module, link) VALUES ((SELECT id FROM {modules} WHERE name='chat'), 'https://docs.moodle.org/4x/fr/Chat')");
    //$DB->execute("INSERT INTO {local_booste_modules_link} (module, link) VALUES ((SELECT id FROM {modules} WHERE name='survey'), 'https://docs.moodle.org/4x/fr/Consultation')");

//////////////////////////////////////
// ACTIVITES HORS LIGNE POLYTECH MONTREAL
//////////////////////////////////////

    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom1", "Tournoi - Approfondissement des apprentissages dans un contexte compétitif", "https://www.polymtl.ca/vignettes/tournoi", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/tournoi_0.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom2", "Cartes conceptuelles - Organisation visuelle de l’information pour mieux l’intégrer", "https://www.polymtl.ca/vignettes/cartes-conceptuelles", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/cartes_conceptuelles.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom3", "Exposé par les pairs - Présentation pour mieux comprendre et vulgariser", "https://www.polymtl.ca/vignettes/expose-par-les-pairs", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/expose_par_les_pairs.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom4", "Questions à foison - Utilisation rapide de l’information nouvellement acquise", "https://www.polymtl.ca/vignettes/questions-foison", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/questions_a_foison.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom5", "Un-Deux-Tous - Processus de réflexion/discussion en trois étapes", "https://www.polymtl.ca/vignettes/un-deux-tous", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/un-deux-tous_think-pair-share.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom6", "Tutorat - Deux à deux, on s’entraide", "https://www.polymtl.ca/vignettes/tutorat", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/tutorat_0.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom7", "Aujourd’hui, j’ai appris… - Exercice d’identification des apprentissages réalisés", "https://www.polymtl.ca/vignettes/aujourdhui-jai-appris", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/aujourdhui_jai_appris.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom8", "Buzz-groupe - Échanger pour mieux comprendre", "https://www.polymtl.ca/vignettes/buzz-groupe", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/buzz-groupe.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom9", "Tournante - Échanger pour mieux comprendre", "https://www.polymtl.ca/vignettes/tournante", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/tournante.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom10", "Étude de cas - Dans la vraie vie, comment fait-on  ", "https://www.polymtl.ca/vignettes/etude-de-cas", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/etude_de_cas.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom11", "Panel - Qu’est-ce que les nouveaux experts en disent ", "https://www.polymtl.ca/vignettes/panel", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/panel.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom12", "Toile de questions - Construction visuelle collaborative d’éléments à clarifier ou à réviser", "https://www.polymtl.ca/vignettes/toile-de-questions", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/toile_de_questions_1.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom13", "La minute de réflexion - Exercice de synthèse court, direct et efficace", "https://www.polymtl.ca/vignettes/la-minute-de-reflexion", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/la_minute_de_reflexion_0.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom14", "Questionnaire sur les connaissances antérieures Questionnaire de vérification des apprentissages acquis antérieurement", "https://www.polymtl.ca/vignettes/questionnaire-sur-les-connaissances-anterieures", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/sondage_sur_les_connaissances_anterieures.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom15", "Énigme à résoudre - Élémentaire mon cher Watson !", "https://www.polymtl.ca/vignettes/enigme-resoudre", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_20.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom16", "Matrice plus ou moins (+/-) - À la croisée des chemins", "https://www.polymtl.ca/vignettes/matrice-plus-ou-moins", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_22.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom17", "Quoi, comment et pourquoi - Contenu, forme et fonction d’un message", "https://www.polymtl.ca/vignettes/quoi-comment-et-pourquoi", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_67.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom18", "Débat - Avec qui es-tu d’accord ", "https://www.polymtl.ca/vignettes/debat", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/debat.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom19", "Ressources du milieu - On sort !", "https://www.polymtl.ca/vignettes/ressources-du-milieu", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/ressources_du_milieu.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom20", "Billet d’entrée - D’où partons-nous  ", "https://www.polymtl.ca/vignettes/billet-dentree", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_19.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom21", "Apprentissage coopératif - Apprendre seul c’est bien, mais en groupe c’est mieux !", "https://www.polymtl.ca/vignettes/apprentissage-cooperatif-0", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_48.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom22", "C’est quoi le problème - Problème A = Méthode A et Problème B = Méthode B", "https://www.polymtl.ca/vignettes/cest-quoi-le-probleme", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_35.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom23", "Dans tes mots - Exercice de vulgarisation pour un public ciblé", "https://www.polymtl.ca/vignettes/dans-tes-mots", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_36.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom24", "Dilemmes éthiques - Le poids des valeurs", "https://www.polymtl.ca/vignettes/dilemmes-ethiques", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_45.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom25", "Évaluation de ses habiletés - À quel point es-tu confiant ", "https://www.polymtl.ca/vignettes/evaluation-de-ses-habiletes", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_46.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom26", "Grille « pour ou contre »  - Les deux côtés de la médaille", "https://www.polymtl.ca/vignettes/grille-pour-ou-contre", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_39.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom27", "Jeu de rôle – Technique centralisée - Moi, Léornard de Vinci, je…", "https://www.polymtl.ca/vignettes/jeu-de-role-technique-centralisee", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_51.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom28", "Jeu de rôle – Technique de l’aquarium - Moi, Léornard de Vinci, je…", "https://www.polymtl.ca/vignettes/jeu-de-role-technique-de-laquarium", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_52.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom29", "Journaux d’apprentissage - Lis et réagis !", "https://www.polymtl.ca/vignettes/journaux-dapprentissage-0", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_42.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom30", "Pecha Kucha - Top Chrono ! ", "https://www.polymtl.ca/vignettes/pecha-kucha", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_50.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom31", "Point à clarifier - Un point m’embrouille…", "https://www.polymtl.ca/vignettes/point-clarifier", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_41.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom32", "Profils admirables - Rôles modèles inspirants", "https://www.polymtl.ca/vignettes/profils-admirables", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_44.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom33", "Prospectus pour le cours - Exercice de préparation et de planification", "https://www.polymtl.ca/vignettes/prospectus-pour-le-cours", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_38.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom34", "Quatre coins - Explorons les 4 coins d’un sujet", "https://www.polymtl.ca/vignettes/quatre-coins", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_49.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom35", "Questionnement - Quand simplicité et efficacité vont de pair !", "https://www.polymtl.ca/vignettes/questionnement-0", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_40.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom36", "Rallye Photo - Cherche, trouve et clique !", "https://www.polymtl.ca/vignettes/rallye-photo", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_54.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom37", "Simulation  - Faire comme si c’était la réalité", "https://www.polymtl.ca/vignettes/simulation", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_53.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom38", "Sondages d’opinion - Ça ne prendra que 5 minutes…", "https://www.polymtl.ca/vignettes/sondages-dopinion", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_43.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom39", "Tableau vivant - Action, on tourne !", "https://www.polymtl.ca/vignettes/rallye-photo", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_37.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom40", "Laboratoire - Apprendre en faisant", "https://www.polymtl.ca/vignettes/laboratoire", "https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/laboratoire.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom41", "Blogue - Information continue","https://www.polymtl.ca/vignettes/blogue","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_23.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom42", "Mémos d’analyse - Analyse-moi ça","https://www.polymtl.ca/vignettes/memos-danalyse","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_24.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom43", "Billet de sortie - Mesure instantanée de la compréhension","https://www.polymtl.ca/vignettes/billet-de-sortie-0","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_47.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom44", "Le forum de discussion - Une foule d\'idées ou un fil d\'idées","https://www.polymtl.ca/vignettes/le-forum-de-discussion","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_69.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom45", "Classer les concepts - C’est le temps de faire un peu de ménage","https://www.polymtl.ca/vignettes/classer-les-concepts","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/classer_les_concepts.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom46", "Matrice de la mémoire - Mettre en relation des apprentissages","https://www.polymtl.ca/vignettes/matrice-de-la-memoire","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/matrice_de_la_memoire.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom47", "Rétroaction vidéo - Apprendre et comprendre en se regardant et en s’écoutant","https://www.polymtl.ca/vignettes/retroaction-video","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/retroaction_video.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom48", "Plénière - Échanger pour mieux comprendre","https://www.polymtl.ca/vignettes/pleniere","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/pleniere.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom49", "Création visuelle - Construis-moi ce que tu as appris !","https://www.polymtl.ca/vignettes/creation-visuelle","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/creation_visuelle_0.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom50", "Racine carrée (ou Puzzle) - Partage des connaissances : 2 temps, 2 manières","https://www.polymtl.ca/vignettes/racine-carree-ou-puzzle","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/racine_carree_ou_puzzle.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom51", "Listes d’intérêts et de compétences - À quel point ça t’intéresse","https://www.polymtl.ca/vignettes/listes-dinterets-et-de-competences","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_64.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom52", "Vidéo d’expert - Qu’est-ce qu’en disent les experts","https://www.polymtl.ca/vignettes/video-dexpert","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_56.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom53", "Recherche guidée - Je cherche, donc je trouve !","https://www.polymtl.ca/vignettes/recherche-guidee","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/recherche_guidee.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom54", "Portefolios annotés - Montre-moi ce que tu sais, ce que tu en penses et pourquoi !","https://www.polymtl.ca/vignettes/portefolios-annotes","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_30.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom55", "Phillips 6.6 - Six personnes, six minutes !","https://www.polymtl.ca/vignettes/phillips-66","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_76.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom56", "Séance d’affiches - Livrer un message","https://www.polymtl.ca/vignettes/seance-daffiches","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_60.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom57", "Inventaire de concepts - Est-ce que tu maitrises mieux les concepts à la fin du cours qu’au début","https://www.polymtl.ca/vignettes/inventaire-de-concepts","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_61.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom58", "Exercices répétés - La répétition mène à la perfection","https://www.polymtl.ca/vignettes/exercices-repetes","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_62.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom59", "Le conseil de coopération - Une prise de parole polygérée !","https://www.polymtl.ca/vignettes/le-conseil-de-cooperation","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_74.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom60", "Objectifs classés - Top 3","https://www.polymtl.ca/vignettes/objectifs-classes","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_66.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom61", "Organisateur de séquences - Tout d’abord, ensuite et finalement !","https://www.polymtl.ca/vignettes/organisateur-de-sequences","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_78.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom62", "SVA - Ce que je sais, ce que je veux savoir et ce que j’ai appris","https://www.polymtl.ca/vignettes/sva","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_79.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom63", "Profils d’apprenants - Toi, comment t’apprends","https://www.polymtl.ca/vignettes/profils-dapprenants","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_65.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom64", "Ligue d’improvisation - Prêt pas prêt, j’y vais!","https://www.polymtl.ca/vignettes/ligue-dimprovisation","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom65", "Questions guidées - Qui Quoi Quand Comment Pourquoi","https://www.polymtl.ca/vignettes/questions-guidees","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_72.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom66", "Équipe de réaction - Une équipe au nom de tous !","https://www.polymtl.ca/vignettes/equipe-de-reaction","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_75.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom67", "Autobiographies ciblées - Parle-moi de toi !","https://www.polymtl.ca/vignettes/autobiographies-ciblees","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_63.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom68", "Tapis de tri -  Classer les données","https://www.polymtl.ca/vignettes/tapis-de-tri","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_77.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom69", "L’entretien collectif - Discutons, ensemble !","https://www.polymtl.ca/vignettes/lentretien-collectif","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_70.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom70", "L’entretien en tête-à-tête - Discutons, en tête-à-tête!","https://www.polymtl.ca/vignettes/lentretien-en-tete-tete","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_71.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom71", "Comparaison des notes personnelles - Je note, tu notes, puis nous notons !","https://www.polymtl.ca/vignettes/comparaison-des-notes-personnelles","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_73.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom72", "Brise-glace - Faire les premiers pas","https://www.polymtl.ca/vignettes/brise-glace","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_59.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom73", "Résumé en une phrase - Fais ça court","https://www.polymtl.ca/vignettes/resume-en-une-phrase","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_26.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom74", "Analogies approximatives - C’est quoi ta métaphore","https://www.polymtl.ca/vignettes/analogies-approximatives","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_28.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom75", "Étude expérimentale - Expérience en laboratoire : de son élaboration à son application","https://www.polymtl.ca/vignettes/etude-experimentale","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_25.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom76", "Le bon mot - Si tu devais me résumer ça en un mot… Et pourquoi","https://www.polymtl.ca/vignettes/le-bon-mot","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_27.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom77", "Dialogues inventés - Je dis, tu dis, ils disent…","https://www.polymtl.ca/vignettes/dialogues-inventes","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_29.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom78", "Chaise de l’auteur - J’aimerais avoir votre opinion","https://www.polymtl.ca/vignettes/chaise-de-lauteur","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_55.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom79", "Les bombes - Formule explosive !","https://www.polymtl.ca/vignettes/les-bombes","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_58.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom80", "Les indices - Différencier pour mieux motiver","https://www.polymtl.ca/vignettes/les-indices","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_57.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom81", "Carte heuristique - Montre-moi à quoi tu penses","https://www.polymtl.ca/vignettes/carte-heuristique","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/carte_heuristique.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom82", "Chasse aux idées fausses - Vos préconceptions sont-elles exactes","https://www.polymtl.ca/vignettes/chasse-aux-idees-fausses","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_16.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom83", "Solutions documentées - Explique-moi comment et pourquoi tu le fais","https://www.polymtl.ca/vignettes/solutions-documentees","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/solution_documentee.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom84", "Liste ciblée - En quelques mots, voilà ce qu’il faut retenir","https://www.polymtl.ca/vignettes/liste-ciblee","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/liste_ciblee.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom85", "Symposium - La force de l’ensemble","https://www.polymtl.ca/vignettes/symposium","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/symposium.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom86", "Socrative - Évaluer en temps réel","https://www.polymtl.ca/vignettes/socrative","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/socrative.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom87", "Superlatifs - Le +","https://www.polymtl.ca/vignettes/superlatifs","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/superlatif.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom88", "Correction par les pairs - C’est bon ou pas Pourquoi","https://www.polymtl.ca/vignettes/correction-par-les-pairs","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/correction_par_les_pairs.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom89", "Documentation trouée - Qu’est-ce qui manque","https://www.polymtl.ca/vignettes/documentation-trouee","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/documentation_trouee.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom90", "Interruptions intelligentes - Qui, quoi, quand, comment et pourquoi","https://www.polymtl.ca/vignettes/interruptions-intelligentes","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/interruptions_intelligentes.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom91", "Interview - Bonjour ! Première question","https://www.polymtl.ca/vignettes/interview","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/interview.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom92", "Ateliers pratiques - Allons-y, on essaye !","https://www.polymtl.ca/vignettes/ateliers-pratiques","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/ateliers_pratiques_0.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom93", "Exemples d’application - Dis-moi à quoi ça sert","https://www.polymtl.ca/vignettes/exemples-dapplication","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/exemple_dapplication.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom94", "Baladodiffusion - Alpha Bravo Charli","https://www.polymtl.ca/vignettes/baladodiffusion","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/balado-diffusion.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom95", "Graffiti collectif - Construction collaborative de solutions en groupe","https://www.polymtl.ca/vignettes/graffiti-collectif","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/graffiti_collectif.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom96", "Démonstration - Il faut voir pour comprendre","https://www.polymtl.ca/vignettes/demonstration","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/demonstration.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom97", "Questions d’examen - C’est ça que tu devrais savoir !","https://www.polymtl.ca/vignettes/questions-dexamen","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/question_dexamen.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom98", "Quiz en ligne - Évaluation virtuelle","https://www.polymtl.ca/vignettes/quiz-en-ligne","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/quiz_en_ligne.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom99", "Télévoteurs - Devoir de citoyen, on vote !","https://www.polymtl.ca/vignettes/televoteurs","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/televoteurs.png")');
    $DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom100","Le Stage - Je pratique !","https://www.polymtl.ca/vignettes/le-stage","https://www.polymtl.ca/vignettes/sites/vignettes.lxpolywebprod.polymtl.ca/files/vignette_temporaire_68.png")');

//////////////////////////////////////
// ACTIVITES H5P - A VENIR DANS UNE PROCHAINE VERSION
//////////////////////////////////////

    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom102","Accordion (H5P)","https://h5p.org/accordion","https://h5p.org/sites/default/files/styles/small-logo/public/logos/accordion-icon.png?itok=3_FxT7D1")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom103","Advent Calendar (H5P)","https://h5p.org/content-types/advent-calendar","https://h5p.org/sites/default/files/styles/small-logo/public/logos/advent_calendar_0.png?itok=_V0I25Hl")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom104","Agamotto (H5P)","https://h5p.org/content-types/agamotto","https://h5p.org/sites/default/files/styles/small-logo/public/logos/icon_agamotto.png?itok=Clq7hvlx")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom101","AR Scavenger (H5P)","https://h5p.org/content-types/ar-scavenger","https://h5p.org/sites/default/files/styles/small-logo/public/logos/AR-Icon.png?itok=mEoi42k5")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom106","Arithmetic Quiz (H5P)","https://h5p.org/arithmetic-quiz","https://h5p.org/sites/default/files/styles/small-logo/public/logos/basic-arithmetic-quiz-icon-color.png?itok=3Z3UHvqk")');
    //A RETIRER ?//$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom107","Audio (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom108","Audio Recorder (H5P)","https://h5p.org/audio-recorder","https://h5p.org/sites/default/files/styles/small-logo/public/logos/audio-recorder-icon_0.png?itok=jSIQpAV-")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom109","Branching Scenario (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom110","Chart (H5P)","https://h5p.org/chart","https://h5p.org/sites/default/files/styles/small-logo/public/logos/chart-icon-color.png?itok=niyEDtPd")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom111","Collage (H5P)","https://h5p.org/collage","https://h5p.org/sites/default/files/styles/small-logo/public/logos/collage-icon.png?itok=Hoa8BcE9")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom112","Column (H5P)","https://h5p.org/column","https://h5p.org/sites/default/files/styles/small-logo/public/logos/column-icon%20%281%29.png?itok=z0xYLVPx")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom113","Cornell Notes (H5P)","https://h5p.org/cornell-notes","https://h5p.org/sites/default/files/styles/small-logo/public/logos/Cornell-logo.png?itok=sSV94EkO")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom114","Course Presentation(H5P)","https://h5p.org/presentation","https://h5p.org/sites/default/files/styles/small-logo/public/logos/course_presentation_icon-colors_0.png?itok=mgokaW3Q")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom115","Crossword (H5P)","https://h5p.org/content-types/crossword","https://h5p.org/sites/default/files/styles/small-logo/public/logos/crosswords.png?itok=oiPBRgDE")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom116","Dialog Cards (H5P)","https://h5p.org/dialog-cards","https://h5p.org/sites/default/files/styles/small-logo/public/logos/dialog_cards_icon-color.png?itok=xeROULBv")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom117","Dictation (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom118","Documentation tool (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom119","Drag and drop (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom120","Drag the Words (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom121","Essay (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom122","Fill in the Blanks (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom123","Find Multiple Hotspots (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom124","Find the Hotspot(H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom125","Find the words (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom126","Flashcards (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom127","Guess the Answer (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom128","Iframe Embedder (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom129","Image choice (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom130","Image Hotspots (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom131","Image Juxtaposition (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom132","Image Pairing (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom133","Image Sequencing (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom134","Image Slider(H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom135","Information Wall (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom136","Interactive Book (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom137","Interactive Video (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom138","KewAR Code (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom139","Mark the Words (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom140","Memory Game (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom141","Multiple Choice (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom142","Personality Quiz (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom143","Quiz (Question Set) (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom144","Single Choice Set (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom145","Sort the Paragraphs (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom146","Speak the Words (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom147","Speak the Words Set (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom148","Structure Strip (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom149","Summary (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom150","Timeline (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom151","True/False Question (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    //$DB->execute('INSERT INTO {local_booste_ext_activities} (shortname, name, link, icon) VALUES ("custom152","Virtual Tour 360 (H5P)","https://h5p.org/interactive-video","https://h5p.org/sites/default/files/logos/interactive_video_icon-colors_0.png")');
    
//////////////////////////////////////
// ITEMS TAGS
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='course_time'), 'course_under_60_mn')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='course_time'), 'course_between_1h_and_1h30')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='course_time'), 'course_between_1h_and_2h')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='course_time'), 'course_over_2h')");
 
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='discipline'), 'conceive')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='discipline'), 'eea')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='discipline'), 'energy')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='discipline'), 'languages')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='discipline'), 'materials')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='discipline'), 'mathsinfo')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='discipline'), 'mechanical')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='discipline'), 'organizer')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='discipline'), 'realizer')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='discipline'), 'management_science')");

    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='modality'), 'presential')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='modality'), 'hybrid')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='modality'), 'async_remote')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='modality'), 'sync_remote')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='modality'), 'comodal')");
    
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='students_level'), 'sem_year_one')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='students_level'), 'sem_year_two')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='students_level'), 'sem_year_three')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='students_level'), 'sem_year_four')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='students_level'), 'sem_year_five')");
    
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='taxonomy'), 'knowledge')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='taxonomy'), 'comprehension')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='taxonomy'), 'application')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='taxonomy'), 'analysis')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='taxonomy'), 'evaluation')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='taxonomy'), 'synthesis')");
    
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='challenge'), 'climat')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='challenge'), 'autonomy')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='challenge'), 'outside_class')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='challenge'), 'teamwork')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='challenge'), 'inclusiveness')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='challenge'), 'heterogene')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='challenge'), 'oddrse')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='challenge'), 'rgpd')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='challenge'), 'participation')");    
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='challenge'), 'studs_with_difficulties')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='challenge'), 'introspection')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='challenge'), 'other_challenge')");

    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='formation'), 'Programme Grande Ecole')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='formation'), 'Programme Ingénieur Spécialité')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='formation'), 'Bachelor')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='formation'), 'Master')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='formation'), 'Doctorat')");
    
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='course_type'), 'lecture')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='course_type'), 'seminar')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='course_type'), 'practical')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='course_type'), 'project')");
    
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='eval_type'), 'examination')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='eval_type'), 'formative')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='eval_type'), 'sommative')");
    
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='learning_mode'), 'lm_individual')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='learning_mode'), 'lm_collaborative')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='learning_mode'), 'lm_participative')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='learning_mode'), 'lm_interactive')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='learning_mode'), 'lm_transmissive')");
    
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='group_size'), 'under_10')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='group_size'), 'between_11_30')");
   // $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='group_size'), 'under_30')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='group_size'), 'between_31_60')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='group_size'), 'between_61_100')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='group_size'), 'over_100')");

    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='activity_time'), 'under_30mn')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='activity_time'), 'under_60mn')");
    $DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='activity_time'), 'over_60mn')");

    //A ACTIVER DANS UNE PROCHAINE VERSION
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='students_specs'), 'international_studs')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='students_specs'), 'mixed_studs')");    
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='students_specs'), 'disabled_students')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='students_specs'), 'remote_students')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='students_specs'), 'other_specs')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='students_specs'), 'no_specs')");

    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='learning_goal'), 'socialize')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='learning_goal'), 'learn')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='learning_goal'), 'eval_diagnostic')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='learning_goal'), 'eval_formative')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='learning_goal'), 'feedback')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='learning_goal'), 'auto_eval')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='learning_goal'), 'metacognition')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='learning_goal'), 'other')");

    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='tools'), 'Wooclap')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='tools'), 'MIRO')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='tools'), 'interactive_screen')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='tools'), 'digital')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='tools'), 'video_projector')");

    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='oc_work'), 'upstream')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='oc_work'), 'downstream')");

    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='cycle'), 'c_primary')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='cycle'), 'c_secondary')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='cycle'), 'c_tertiary')");

    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='group_type'), 'ls_individual')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='group_type'), 'ls_less_6')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='group_type'), 'ls_full_class')");

    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='content_type'), 'ct_basic')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='content_type'), 'ct_intermediate')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='content_type'), 'ct_advanced')");

    //$DB->insert_record("local_booste_list_tags", array("field" => $DB->get_field("local_booste_list_fields", "id", array("name" => "learning_mode")), "name" => "all_lm_type", "ignore_suggestions" => 1));

    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='place'), 'classroom')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='place'), 'practical_room')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='place'), 'auditorium')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='place'), 'workshop')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='place'), 'collaborative')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='place'), 'videoconferencing')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='place'), 'outside')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='place'), 'library')");
    //$DB->execute("INSERT INTO {local_booste_list_tags} (field, name) VALUES ((SELECT id FROM {local_booste_list_fields} WHERE name='place'), 'comodal_room')");

//////////////////////////////////////
// LISTE VERBES TAXONOMIE
//////////////////////////////////////  

    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'), 'build')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'), 'draw')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'), 'imagine')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'), 'invent')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'), 'assemble')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'), 'narrate')");

    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'), 'collaborate')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'), 'compare')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'), 'conclude')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'), 'discuss')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'), 'evaluate')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'), 'prioritize')");

    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'), 'analyze')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'), 'categorize')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'), 'compare')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'), 'deduct')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'), 'distinguish')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'), 'identify')");

    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'), 'choose')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'), 'complete')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'), 'employ')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'), 'organize')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'), 'transfer')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'), 'use')");

    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'), 'explain')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'), 'illustrate')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'), 'interpret')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'), 'prepare')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'), 'rewrite')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'), 'represent')");

    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'), 'describe')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'), 'distinguish')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'), 'identify')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'), 'name')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'), 'remind')");
    $DB->execute("INSERT INTO {local_booste_list_verb} (taxonomy, name) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'), 'recognize')");


//////////////////////////////////////
// TAGS SUGGESTIONS ACTIVITES MOODLE
//////////////////////////////////////

//////////////////////////////////////
// Workshop - Atelier
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");      
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),(SELECT id FROM {modules} WHERE name='workshop'),NULL)");

//////////////////////////////////////
// Data - Base de données
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),(SELECT id FROM {modules} WHERE name='data'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),(SELECT id FROM {modules} WHERE name='data'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),(SELECT id FROM {modules} WHERE name='data'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),(SELECT id FROM {modules} WHERE name='data'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),(SELECT id FROM {modules} WHERE name='data'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),(SELECT id FROM {modules} WHERE name='data'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),(SELECT id FROM {modules} WHERE name='data'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),(SELECT id FROM {modules} WHERE name='data'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),(SELECT id FROM {modules} WHERE name='data'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),(SELECT id FROM {modules} WHERE name='data'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='rgpd'),(SELECT id FROM {modules} WHERE name='data'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),(SELECT id FROM {modules} WHERE name='data'),NULL)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),(SELECT id FROM {modules} WHERE name='data'),NULL)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),(SELECT id FROM {modules} WHERE name='data'),NULL)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),(SELECT id FROM {modules} WHERE name='data'),NULL)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),(SELECT id FROM {modules} WHERE name='data'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),(SELECT id FROM {modules} WHERE name='data'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),(SELECT id FROM {modules} WHERE name='data'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),(SELECT id FROM {modules} WHERE name='data'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),(SELECT id FROM {modules} WHERE name='data'),NULL)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),(SELECT id FROM {modules} WHERE name='data'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),(SELECT id FROM {modules} WHERE name='data'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),(SELECT id FROM {modules} WHERE name='data'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),(SELECT id FROM {modules} WHERE name='data'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),(SELECT id FROM {modules} WHERE name='data'),NULL)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),(SELECT id FROM {modules} WHERE name='data'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),(SELECT id FROM {modules} WHERE name='data'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),(SELECT id FROM {modules} WHERE name='data'),NULL)");   
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),(SELECT id FROM {modules} WHERE name='data'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),(SELECT id FROM {modules} WHERE name='data'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),(SELECT id FROM {modules} WHERE name='data'),NULL)");        
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),(SELECT id FROM {modules} WHERE name='data'),NULL)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),(SELECT id FROM {modules} WHERE name='data'),NULL)");

//////////////////////////////////////
// Assign - Devoir
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");   
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");      
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),(SELECT id FROM {modules} WHERE name='assign'),NULL)");

//////////////////////////////////////
// Feedback - Feedback
//////////////////////////////////////
    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='rgpd'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_transmissive'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");   
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");  
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");      
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),(SELECT id FROM {modules} WHERE name='feedback'),NULL)");
    
//////////////////////////////////////
// Forum - Forum
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='outside_class'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");  
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),(SELECT id FROM {modules} WHERE name='forum'),NULL)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");      
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),(SELECT id FROM {modules} WHERE name='forum'),NULL)");

//////////////////////////////////////
// Glossary - Glossaire
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='outside_class'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");      
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),(SELECT id FROM {modules} WHERE name='glossary'),NULL)");

//////////////////////////////////////
// H5P
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");      
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),(SELECT id FROM {modules} WHERE name='h5pactivity'),NULL)");

//////////////////////////////////////
// Lesson - Leçon
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");      
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),(SELECT id FROM {modules} WHERE name='lesson'),NULL)");

//////////////////////////////////////
// Choice - Sondage
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");   
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");  
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");      
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),(SELECT id FROM {modules} WHERE name='choice'),NULL)");    
    
//////////////////////////////////////
// Quiz - Test en ligne
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");      
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),(SELECT id FROM {modules} WHERE name='quiz'),NULL)");
    
//////////////////////////////////////
// Wiki - Wiki 
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='outside_class'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");   
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");      
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),(SELECT id FROM {modules} WHERE name='wiki'),NULL)");

    
//////////////////////////////////////
// ACTIVITES ADDITIONNELLES - A ACTIVER SI MODULES INSTALLES SUR VOTRE MOODLE
//////////////////////////////////////

//////////////////////////////////////
// Advmindmap - Carte mentale
//////////////////////////////////////

    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");   
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");    
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");    
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");    
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");      
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");    
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),(SELECT id FROM {modules} WHERE name='advmindmap'),NULL)");
 
//////////////////////////////////////
// Chat - Chat
//////////////////////////////////////

    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),(SELECT id FROM {modules} WHERE name='chat'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),(SELECT id FROM {modules} WHERE name='chat'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),(SELECT id FROM {modules} WHERE name='chat'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),(SELECT id FROM {modules} WHERE name='chat'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),(SELECT id FROM {modules} WHERE name='chat'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),(SELECT id FROM {modules} WHERE name='chat'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),(SELECT id FROM {modules} WHERE name='chat'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),(SELECT id FROM {modules} WHERE name='chat'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),(SELECT id FROM {modules} WHERE name='chat'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),(SELECT id FROM {modules} WHERE name='chat'),NULL)");  
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),(SELECT id FROM {modules} WHERE name='chat'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),(SELECT id FROM {modules} WHERE name='chat'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),(SELECT id FROM {modules} WHERE name='chat'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),(SELECT id FROM {modules} WHERE name='chat'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),(SELECT id FROM {modules} WHERE name='chat'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),(SELECT id FROM {modules} WHERE name='chat'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),(SELECT id FROM {modules} WHERE name='chat'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),(SELECT id FROM {modules} WHERE name='chat'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),(SELECT id FROM {modules} WHERE name='chat'),NULL)");      
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),(SELECT id FROM {modules} WHERE name='chat'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),(SELECT id FROM {modules} WHERE name='chat'),NULL)");        
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),(SELECT id FROM {modules} WHERE name='chat'),NULL)");

//////////////////////////////////////
// Offlinequiz - Test hors-ligne
//////////////////////////////////////

    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),(SELECT id FROM {modules} WHERE name='offlinequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),(SELECT id FROM {modules} WHERE name='offlinequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),(SELECT id FROM {modules} WHERE name='offlinequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),(SELECT id FROM {modules} WHERE name='offlinequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),(SELECT id FROM {modules} WHERE name='offlinequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),(SELECT id FROM {modules} WHERE name='offlinequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),(SELECT id FROM {modules} WHERE name='offlinequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_transmissive'),(SELECT id FROM {modules} WHERE name='offlinequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),(SELECT id FROM {modules} WHERE name='offlinequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),(SELECT id FROM {modules} WHERE name='offlinequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),(SELECT id FROM {modules} WHERE name='offlinequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),(SELECT id FROM {modules} WHERE name='offlinequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),(SELECT id FROM {modules} WHERE name='offlinequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),(SELECT id FROM {modules} WHERE name='offlinequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),(SELECT id FROM {modules} WHERE name='offlinequiz'),NULL)");  
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),(SELECT id FROM {modules} WHERE name='offlinequiz'),NULL)");    
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),(SELECT id FROM {modules} WHERE name='offlinequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),(SELECT id FROM {modules} WHERE name='offlinequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),(SELECT id FROM {modules} WHERE name='offlinequiz'),NULL)");      
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),(SELECT id FROM {modules} WHERE name='offlinequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),(SELECT id FROM {modules} WHERE name='offlinequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),(SELECT id FROM {modules} WHERE name='offlinequiz'),NULL)");

//////////////////////////////////////
// Activequiz - Active quiz
//////////////////////////////////////

    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='rgpd'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='pratical'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");    
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");      
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),(SELECT id FROM {modules} WHERE name='activequiz'),NULL)");

//////////////////////////////////////
// Wooclap - Wooclap
//////////////////////////////////////

    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");    
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");    
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");   
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");      
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),(SELECT id FROM {modules} WHERE name='wooclap'),NULL)");

//////////////////////////////////////
// Game - Jeux
//////////////////////////////////////

    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),(SELECT id FROM {modules} WHERE name='game'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),(SELECT id FROM {modules} WHERE name='game'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),(SELECT id FROM {modules} WHERE name='game'),NULL)"); 
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),(SELECT id FROM {modules} WHERE name='game'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),(SELECT id FROM {modules} WHERE name='game'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),(SELECT id FROM {modules} WHERE name='game'),NULL)"); 
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),(SELECT id FROM {modules} WHERE name='game'),NULL)");    
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),(SELECT id FROM {modules} WHERE name='game'),NULL)");    
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),(SELECT id FROM {modules} WHERE name='game'),NULL)");    
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),(SELECT id FROM {modules} WHERE name='game'),NULL)");    
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),(SELECT id FROM {modules} WHERE name='game'),NULL)");    
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),(SELECT id FROM {modules} WHERE name='game'),NULL)");    
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),(SELECT id FROM {modules} WHERE name='game'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),(SELECT id FROM {modules} WHERE name='game'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),(SELECT id FROM {modules} WHERE name='game'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),(SELECT id FROM {modules} WHERE name='game'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),(SELECT id FROM {modules} WHERE name='game'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),(SELECT id FROM {modules} WHERE name='game'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),(SELECT id FROM {modules} WHERE name='game'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),(SELECT id FROM {modules} WHERE name='game'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),(SELECT id FROM {modules} WHERE name='game'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),(SELECT id FROM {modules} WHERE name='game'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),(SELECT id FROM {modules} WHERE name='game'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),(SELECT id FROM {modules} WHERE name='game'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),(SELECT id FROM {modules} WHERE name='game'),NULL)");      
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),(SELECT id FROM {modules} WHERE name='game'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),(SELECT id FROM {modules} WHERE name='game'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),(SELECT id FROM {modules} WHERE name='game'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),(SELECT id FROM {modules} WHERE name='game'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),(SELECT id FROM {modules} WHERE name='game'),NULL)");

//////////////////////////////////////
// Realtimequiz - Test en temps réel (ADDITIONNEL)
//////////////////////////////////////

    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='rgpd'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='pratical'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");    
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");      
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),(SELECT id FROM {modules} WHERE name='realtimequiz'),NULL)");
    
//////////////////////////////////////
// TAGS ACTIVITES H5P - A VENIR DANS  UNE PROCHAINE VERSION
//////////////////////////////////////

//////////////////////////////////////
// AR Scavenger (H5P)
//////////////////////////////////////
                                                                                  
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,101)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,101)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),NULL,101)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,101)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,101)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,101)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,101)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,101)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,101)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,101)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,101)");    
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,101)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,101)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,101)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,101)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,101)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,101)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,101)");      
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,101)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,101)");

//////////////////////////////////////
// Accordion (H5P)
//////////////////////////////////////

    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),(SELECT id FROM {modules} WHERE name='accordion'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),(SELECT id FROM {modules} WHERE name='accordion'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),(SELECT id FROM {modules} WHERE name='accordion'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),(SELECT id FROM {modules} WHERE name='accordion'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),(SELECT id FROM {modules} WHERE name='accordion'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),(SELECT id FROM {modules} WHERE name='accordion'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),(SELECT id FROM {modules} WHERE name='accordion'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),(SELECT id FROM {modules} WHERE name='accordion'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),(SELECT id FROM {modules} WHERE name='accordion'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),(SELECT id FROM {modules} WHERE name='accordion'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),(SELECT id FROM {modules} WHERE name='accordion'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),(SELECT id FROM {modules} WHERE name='accordion'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),(SELECT id FROM {modules} WHERE name='accordion'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),(SELECT id FROM {modules} WHERE name='accordion'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),(SELECT id FROM {modules} WHERE name='accordion'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),(SELECT id FROM {modules} WHERE name='accordion'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),(SELECT id FROM {modules} WHERE name='accordion'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),(SELECT id FROM {modules} WHERE name='accordion'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),(SELECT id FROM {modules} WHERE name='accordion'),NULL)");      
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),(SELECT id FROM {modules} WHERE name='accordion'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),(SELECT id FROM {modules} WHERE name='accordion'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),(SELECT id FROM {modules} WHERE name='accordion'),NULL)");

//////////////////////////////////////
// Advent Calendar (H5P)
//////////////////////////////////////

    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),(SELECT id FROM {modules} WHERE name='advent_calendar'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),(SELECT id FROM {modules} WHERE name='advent_calendar'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),(SELECT id FROM {modules} WHERE name='advent_calendar'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),(SELECT id FROM {modules} WHERE name='advent_calendar'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),(SELECT id FROM {modules} WHERE name='advent_calendar'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),(SELECT id FROM {modules} WHERE name='advent_calendar'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),(SELECT id FROM {modules} WHERE name='advent_calendar'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),(SELECT id FROM {modules} WHERE name='advent_calendar'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),(SELECT id FROM {modules} WHERE name='advent_calendar'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),(SELECT id FROM {modules} WHERE name='advent_calendar'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),(SELECT id FROM {modules} WHERE name='advent_calendar'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),(SELECT id FROM {modules} WHERE name='advent_calendar'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),(SELECT id FROM {modules} WHERE name='advent_calendar'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),(SELECT id FROM {modules} WHERE name='advent_calendar'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),(SELECT id FROM {modules} WHERE name='advent_calendar'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),(SELECT id FROM {modules} WHERE name='advent_calendar'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),(SELECT id FROM {modules} WHERE name='advent_calendar'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),(SELECT id FROM {modules} WHERE name='advent_calendar'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),(SELECT id FROM {modules} WHERE name='advent_calendar'),NULL)");      
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),(SELECT id FROM {modules} WHERE name='advent_calendar'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),(SELECT id FROM {modules} WHERE name='advent_calendar'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),(SELECT id FROM {modules} WHERE name='advent_calendar'),NULL)");

//////////////////////////////////////
// Agamotto (H5P)
//////////////////////////////////////

    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),(SELECT id FROM {modules} WHERE name='agamotto'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),(SELECT id FROM {modules} WHERE name='agamotto'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),(SELECT id FROM {modules} WHERE name='agamotto'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),(SELECT id FROM {modules} WHERE name='agamotto'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),(SELECT id FROM {modules} WHERE name='agamotto'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),(SELECT id FROM {modules} WHERE name='agamotto'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),(SELECT id FROM {modules} WHERE name='agamotto'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),(SELECT id FROM {modules} WHERE name='agamotto'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),(SELECT id FROM {modules} WHERE name='agamotto'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),(SELECT id FROM {modules} WHERE name='agamotto'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),(SELECT id FROM {modules} WHERE name='agamotto'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),(SELECT id FROM {modules} WHERE name='agamotto'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),(SELECT id FROM {modules} WHERE name='agamotto'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),(SELECT id FROM {modules} WHERE name='agamotto'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),(SELECT id FROM {modules} WHERE name='agamotto'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),(SELECT id FROM {modules} WHERE name='agamotto'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),(SELECT id FROM {modules} WHERE name='agamotto'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),(SELECT id FROM {modules} WHERE name='agamotto'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),(SELECT id FROM {modules} WHERE name='agamotto'),NULL)");      
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),(SELECT id FROM {modules} WHERE name='agamotto'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),(SELECT id FROM {modules} WHERE name='agamotto'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),(SELECT id FROM {modules} WHERE name='agamotto'),NULL)");

//////////////////////////////////////
// Arithmetic Quiz (H5P)
//////////////////////////////////////

    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),(SELECT id FROM {modules} WHERE name='arithmetic_quiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),(SELECT id FROM {modules} WHERE name='arithmetic_quiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),(SELECT id FROM {modules} WHERE name='arithmetic_quiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),(SELECT id FROM {modules} WHERE name='arithmetic_quiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),(SELECT id FROM {modules} WHERE name='arithmetic_quiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),(SELECT id FROM {modules} WHERE name='arithmetic_quiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),(SELECT id FROM {modules} WHERE name='arithmetic_quiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),(SELECT id FROM {modules} WHERE name='arithmetic_quiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),(SELECT id FROM {modules} WHERE name='arithmetic_quiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),(SELECT id FROM {modules} WHERE name='arithmetic_quiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),(SELECT id FROM {modules} WHERE name='arithmetic_quiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),(SELECT id FROM {modules} WHERE name='arithmetic_quiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),(SELECT id FROM {modules} WHERE name='arithmetic_quiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),(SELECT id FROM {modules} WHERE name='arithmetic_quiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),(SELECT id FROM {modules} WHERE name='arithmetic_quiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),(SELECT id FROM {modules} WHERE name='arithmetic_quiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),(SELECT id FROM {modules} WHERE name='arithmetic_quiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),(SELECT id FROM {modules} WHERE name='arithmetic_quiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),(SELECT id FROM {modules} WHERE name='arithmetic_quiz'),NULL)");      
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),(SELECT id FROM {modules} WHERE name='arithmetic_quiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),(SELECT id FROM {modules} WHERE name='arithmetic_quiz'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),(SELECT id FROM {modules} WHERE name='arithmetic_quiz'),NULL)");

//////////////////////////////////////
// Audio (H5P)
//////////////////////////////////////

    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),(SELECT id FROM {modules} WHERE name='audio'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),(SELECT id FROM {modules} WHERE name='audio'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),(SELECT id FROM {modules} WHERE name='audio'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),(SELECT id FROM {modules} WHERE name='audio'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),(SELECT id FROM {modules} WHERE name='audio'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),(SELECT id FROM {modules} WHERE name='audio'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),(SELECT id FROM {modules} WHERE name='audio'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),(SELECT id FROM {modules} WHERE name='audio'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),(SELECT id FROM {modules} WHERE name='audio'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),(SELECT id FROM {modules} WHERE name='audio'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),(SELECT id FROM {modules} WHERE name='audio'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),(SELECT id FROM {modules} WHERE name='audio'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),(SELECT id FROM {modules} WHERE name='audio'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),(SELECT id FROM {modules} WHERE name='audio'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),(SELECT id FROM {modules} WHERE name='audio'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),(SELECT id FROM {modules} WHERE name='audio'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),(SELECT id FROM {modules} WHERE name='audio'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),(SELECT id FROM {modules} WHERE name='audio'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),(SELECT id FROM {modules} WHERE name='audio'),NULL)");      
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),(SELECT id FROM {modules} WHERE name='audio'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),(SELECT id FROM {modules} WHERE name='audio'),NULL)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),(SELECT id FROM {modules} WHERE name='audio'),NULL)");

//////////////////////////////////////
// Audio Recorder (H5P)
//////////////////////////////////////
  
//////////////////////////////////////
// Branching Scenario (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Chart (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Collage (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Column (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Cornell Notes (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Course Presentation (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Crossword (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Dialog Cards (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Dictation (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Documentation tool (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Drag and drop (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Drag the words (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Essay (H5P)
//////////////////////////////////////
   
//////////////////////////////////////
// Fill in the blanks (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Find multiple hotspots (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Find the hotspot (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Find the words (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Flashcards (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Guess the answer (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Iframe embedder (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Image choice (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Image hotspots (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Image juxtaposition (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Image pairing (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Image sequencing (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Image slider (H5P)
//////////////////////////////////////
  
//////////////////////////////////////
// Information wall (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Interactive book (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Interactive video (H5P)
//////////////////////////////////////


//////////////////////////////////////
// KeWar Code (H5P)
//////////////////////////////////////
    
//////////////////////////////////////
// Mark the words (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Memory game (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Multiple choice (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Personality quiz (H5P)
//////////////////////////////////////
  
//////////////////////////////////////
// Quiz (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Single choice set (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Sort the paragraphs (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Speak the words (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Speak the words set (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Structure strip (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Summary (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Timeline (H5P)
//////////////////////////////////////

//////////////////////////////////////
// True/False question (H5P)
//////////////////////////////////////

//////////////////////////////////////
// Virtual tour 360 (H5P)
//////////////////////////////////////

    
//////////////////////////////////////
// TAGS SUGGESTIONS ACTIVITES HORS LIGNE MONTREAL
//////////////////////////////////////

//////////////////////////////////////
// Tournoi - Approfondissement des apprentissages dans un contexte compétitif
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,1)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,1)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,1)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,1)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,1)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,1)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,1)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='outside_class'),NULL,1)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,1)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,1)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,1)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,1)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,1)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,1)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,1)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,1)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,1)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,1)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,1)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,1)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,1)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,1)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,1)");

//////////////////////////////////////
// Cartes conceptuelles - Organisation visuelle de l'information pour mieux l'intégrer
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,2)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,2)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,2)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,2)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,2)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,2)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,2)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,2)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,2)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,2)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,2)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,2)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,2)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,2)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,2)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,2)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,2)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,2)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,2)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,2)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,2)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,2)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,2)");
    
//////////////////////////////////////
// Exposé par les pairs - Présentation pour mieux comprendre et vulgariser
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,3)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,3)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,3)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,3)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,3)");   
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,3)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,3)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='outside_class'),NULL,3)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,3)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,3)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,3)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,3)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,3)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,3)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,3)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,3)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,3)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,3)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,3)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,3)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,3)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,3)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,3)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,3)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,3)");

//////////////////////////////////////
// Questions à foison - Utilisation rapide de l'information nouvellement acquise
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,4)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,4)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,4)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,4)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,4)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,4)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,4)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,4)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,4)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,4)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,4)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,4)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,4)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,4)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,4)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,4)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,4)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,4)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,4)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,4)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,4)");

//////////////////////////////////////
// Un-Deux-Tous - Processus de réflexion/discussion en trois étapes
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,5)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,5)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,5)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,5)");

//////////////////////////////////////
// Tutorat - Deux à deux, on s'entraide
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,6)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,6)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,6)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,6)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,6)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,6)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,6)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,6)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,6)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,6)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,6)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,6)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,6)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,6)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,6)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,6)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,6)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,6)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,6)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,6)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,6)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,6)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,6)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,6)");

//////////////////////////////////////
// Aujourd'hui, j'ai appris - Exercice d'identification des apprentissages réalisés
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,7)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,7)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,7)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,7)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,7)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,7)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,7)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,7)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,7)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,7)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,7)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,7)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,7)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,7)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,7)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,7)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,7)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,7)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,7)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,7)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,7)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,7)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,7)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,7)");

//////////////////////////////////////
// Buzz-groupe - Échanger pour mieux comprendre
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,8)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,8)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,8)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,8)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,8)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,8)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,8)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,8)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,8)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,8)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,8)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,8)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,8)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,8)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,8)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,8)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,8)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,8)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,8)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,8)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,8)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,8)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,8)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,8)");

//////////////////////////////////////
// Tournante - Échanger pour mieux comprendre
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,9)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,9)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,9)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,9)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,9)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,9)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,9)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,9)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,9)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,9)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,9)");   
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,9)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,9)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,9)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,9)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,9)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,9)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,9)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,9)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,9)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,9)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,9)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,9)");

//////////////////////////////////////
// Etude de cas - Dans la vraie vie, comment fait-on ?
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,10)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,10)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,10)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,10)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,10)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,10)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,10)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,10)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,10)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,10)");     
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,10)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,10)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,10)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,10)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,10)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,10)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,10)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,10)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,10)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,10)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,10)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,10)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,10)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,10)");

//////////////////////////////////////
// Panel - Qu'est-ce que les nouveaux experts en disent ?
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,11)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,11)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,11)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,11)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,11)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,11)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,11)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,11)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,11)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,11)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,11)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,11)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,11)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,11)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,11)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,11)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,11)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,11)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,11)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,11)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,11)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,11)");

//////////////////////////////////////
// Toile de questions - Construction visuelle collaborative d'éléments à clarifier ou à réviser
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,12)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,12)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,12)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,12)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,12)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,12)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,12)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,12)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,12)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,12)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,12)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,12)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,12)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,12)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,12)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,12)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,12)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,12)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,12)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,12)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,12)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,12)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,12)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,12)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,12)");
    
//////////////////////////////////////
// La minute de réflexion - Exercice de synthèse court, direct et efficace
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,13)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,13)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,13)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,13)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,13)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,13)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,13)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,13)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,13)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,13)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,13)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,13)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,13)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,13)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,13)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,13)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,13)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,13)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,13)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,13)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,13)");

//////////////////////////////////////
// Questionnaire sur les connaissances antérieures - Petit questionnaire de vérification des apprentissages acquis antérieurement
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,14)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),NULL,14)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,14)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,14)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,14)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,14)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,14)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,14)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,14)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,14)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,14)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,14)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,14)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,14)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,14)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,14)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,14)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,14)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,14)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,14)");

//////////////////////////////////////
// Énigme à résoudre - Élémentaire mon cher Watson !
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,15)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,15)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,15)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,15)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,15)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,15)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,15)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,15)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,15)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,15)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,15)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,15)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,15)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,15)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,15)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,15)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,15)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,15)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,15)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,15)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,15)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,15)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,15)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,15)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,15)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,15)");

//////////////////////////////////////
// Matrice plus ou moins (+/-) - À la croisée des chemins
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,16)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,16)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,16)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,16)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,16)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,16)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,16)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,16)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,16)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,16)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,16)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,16)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,16)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,16)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,16)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,16)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,16)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,16)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,16)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,16)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,16)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,16)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,16)");

//////////////////////////////////////
// Quoi, comment et pourquoi - Contenu, forme et fonction d’un message
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,17)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,17)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,17)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,17)");

//////////////////////////////////////
// Débat - Avec qui es-tu d’accord 
//////////////////////////////////////
    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,18)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,18)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,18)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,18)");   
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,18)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,18)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,18)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,18)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,18)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,18)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,18)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,18)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,18)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,18)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,18)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,18)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,18)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,18)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,18)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,18)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,18)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,18)");

//////////////////////////////////////
// Ressources du milieu - On sort !
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,19)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,19)");  
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,19)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,19)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,19)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,19)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,19)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,19)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,19)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='outside_class'),NULL,19)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='oddrse'),NULL,19)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,19)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,19)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,19)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,19)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,19)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,19)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,19)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,19)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,19)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,19)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,19)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,19)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,19)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,19)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,19)");

//////////////////////////////////////
// Billet d'entrée - D'où partons-nous ?
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,20)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,20)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,20)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,20)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,20)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,20)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,20)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,20)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,20)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,20)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,20)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,20)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,20)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,20)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,20)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,20)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,20)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,20)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,20)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,20)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,20)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,20)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,20)");

//////////////////////////////////////
// Apprentissage coopératif - Apprendre seul c'est bien, mais en groupe c'est mieux !
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,21)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,21)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,21)");

//////////////////////////////////////
// C’est quoi le problème - Problème A = Méthode A et Problème B = Méthode B
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,22)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,22)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,22)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,22)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,22)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,22)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,22)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,22)");      
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,22)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,22)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,22)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,22)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,22)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,22)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,22)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,22)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,22)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,22)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,22)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,22)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,22)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,22)");

//////////////////////////////////////
// Dans tes mots - Exercice de vulgarisation pour un public ciblé
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,23)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,23)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,23)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,23)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,23)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,23)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,23)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,23)");      
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,23)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,23)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,23)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,23)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,23)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,23)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,23)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,23)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,23)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,23)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,23)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,23)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,23)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,23)");

//////////////////////////////////////
// Dilemmes éthiques - Le poids des valeurs
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,24)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,24)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,24)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,24)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,24)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,24)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,24)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,24)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,24)");      
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,24)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,24)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,24)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,24)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,24)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,24)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,24)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,24)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,24)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,24)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,24)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,24)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,24)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,24)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,24)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,24)");

//////////////////////////////////////
// Evaluation de ses habiletés - À quel point es-tu confiant ?
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,25)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,25)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,25)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,25)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,25)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,25)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,25)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,25)");       
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,25)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,25)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,25)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,25)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,25)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,25)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,25)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,25)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,25)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,25)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,25)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,25)");

//////////////////////////////////////
// Grille « pour ou contre »  - Les deux côtés de la médaille
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,26)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,26)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,26)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,26)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,26)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,26)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,26)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,26)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,26)");          
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,26)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,26)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,26)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,26)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,26)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,26)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,26)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,26)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,26)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,26)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,26)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,26)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,26)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,26)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,26)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,26)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,26)");

//////////////////////////////////////
// Jeu de rôle – Technique centralisée - Moi, Léornard de Vinci, je…
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,27)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,27)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,27)");  
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,27)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,27)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,27)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,27)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,27)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,27)");          
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,27)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,27)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,27)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,27)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,27)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,27)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,27)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,27)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,27)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,27)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,27)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,27)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,27)");    

//////////////////////////////////////
// Jeu de rôle – Technique de l’aquarium - Moi, Léornard de Vinci, je…
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,28)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,28)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,28)");  
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,28)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,28)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,28)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,28)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,28)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,28)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,28)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,28)");          
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,28)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,28)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,28)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,28)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,28)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,28)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,28)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,28)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,28)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,28)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,28)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,28)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,28)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,28)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,28)");

//////////////////////////////////////
// Journaux d’apprentissage - Lis et réagis !
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,29)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,29)");  
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,29)");          
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,29)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,29)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,29)");

//////////////////////////////////////
// Pecha Kucha - Top Chrono ! 
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,30)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,30)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,30)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,30)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,30)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,30)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,30)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,30)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,30)");            
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,30)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,30)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,30)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,30)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,30)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,30)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,30)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,30)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,30)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,30)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,30)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,30)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,30)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,30)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,30)");
    
//////////////////////////////////////
// Point à clarifier - Un point m’embrouille…
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,31)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,31)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,31)");      
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,31)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,31)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,31)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,31)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,31)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,31)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,31)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,31)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,31)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,31)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,31)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,31)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,31)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,31)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,31)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,31)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,31)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,31)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,31)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,31)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,31)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,31)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,31)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,31)");

//////////////////////////////////////
// Profils admirables - Rôles modèles inspirants
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='oddrse'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='outside_class'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,32)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,32)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,32)");

//////////////////////////////////////
// Prospectus pour le cours - Exercice de préparation et de planification
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,33)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,33)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,33)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,33)");

//////////////////////////////////////
// Quatre coins - Explorons les 4 coins d’un sujet
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,34)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,34)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,34)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,34)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,34)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,34)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,34)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,34)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,34)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,34)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,34)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,34)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,34)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,34)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,34)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,34)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,34)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,34)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,34)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,34)");

//////////////////////////////////////
// Questionnement - Quand simplicité et efficacité vont de pair !
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,35)");  
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,35)");  
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,35)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,35)");

//////////////////////////////////////
// Rallye Photo - Cherche, trouve et clique !
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,36)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,36)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,36)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,36)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,36)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,36)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,36)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,36)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,36)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,36)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,36)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,36)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,36)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,36)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,36)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,36)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,36)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,36)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,36)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,36)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,36)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,36)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,36)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,36)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,36)");

//////////////////////////////////////
// Simulation  - Faire comme si c’était la réalité
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,37)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,37)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,37)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,37)");

//////////////////////////////////////
// Sondages d’opinion - Ça ne prendra que 5 minutes…
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,38)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,38)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,38)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,38)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,38)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,38)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,38)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,38)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,38)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,38)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,38)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,38)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,38)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,38)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,38)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,38)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,38)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,38)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,38)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,38)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,38)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,38)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,38)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,38)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,38)");

//////////////////////////////////////
// Tableau vivant - Action, on tourne !
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,39)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,39)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,39)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,39)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,39)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,39)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,39)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,39)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,39)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,39)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,39)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,39)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,39)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,39)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,39)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,39)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,39)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,39)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,39)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,39)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,39)");

//////////////////////////////////////
// Laboratoire - Apprendre en faisant
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,40)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,40)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,40)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,40)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,40)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,40)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,40)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,40)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,40)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,40)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,40)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,40)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,40)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,40)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,40)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,40)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,40)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,40)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,40)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,40)");

//////////////////////////////////////
// Blogue - Information continue
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,41)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,41)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,41)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,41)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,41)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,41)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='outside_class'),NULL,41)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,41)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,41)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,41)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,41)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,41)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,41)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,41)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,41)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,41)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,41)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,41)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,41)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,41)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,41)");

//////////////////////////////////////
// Mémos d’analyse - Analyse-moi ça
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,42)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,42)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,42)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,42)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,42)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,42)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,42)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,42)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,42)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,42)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,42)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,42)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,42)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,42)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,42)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,42)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,42)");

//////////////////////////////////////
// Billet de sortie - Mesure instantanée de la compréhension
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,43)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,43)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),NULL,43)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,43)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,43)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,43)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,43)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,43)");       
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,43)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,43)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,43)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,43)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,43)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,43)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,43)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,43)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,43)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,43)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,43)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,43)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,43)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,43)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,43)");

//////////////////////////////////////
// Le forum de discussion _ Une foule d'idées ou un fil d'idées ?
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,44)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,44)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,44)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,44)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,44)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='outside_class'),NULL,44)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,44)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,44)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,44)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,44)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,44)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,44)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,44)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,44)");   
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,44)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,44)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,44)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,44)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,44)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,44)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,44)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,44)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,44)");

//////////////////////////////////////
// Classer les concepts - C’est le temps de faire un peu de ménage
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,45)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,45)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,45)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,45)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,45)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,45)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,45)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,45)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,45)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,45)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,45)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,45)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,45)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,45)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,45)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,45)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,45)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,45)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,45)");

//////////////////////////////////////
// Matrice de la mémoire - Mettre en relation des apprentissages
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,46)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,46)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,46)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,46)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,46)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,46)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,46)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,46)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,46)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,46)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,46)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,46)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,46)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,46)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,46)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,46)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,46)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,46)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,46)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,46)");

//////////////////////////////////////
// Rétroaction vidéo - Apprendre et comprendre en se regardant et en s’écoutant
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,47)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,47)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,47)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,47)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,47)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,47)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,47)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,47)");  
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,47)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,47)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,47)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,47)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,47)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,47)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,47)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,47)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,47)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,47)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,47)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,47)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,47)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,47)");

//////////////////////////////////////
// Plénière - Échanger pour mieux comprendre
//////////////////////////////////////
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,48)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,48)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,48)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,48)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,48)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,48)");   
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,48)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,48)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,48)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,48)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,48)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,48)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,48)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,48)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,48)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,48)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,48)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,48)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,48)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,48)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,48)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,48)");

//////////////////////////////////////
// Création visuelle - Construis-moi ce que tu as appris !
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,49)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,49)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,49)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,49)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,49)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,49)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,49)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,49)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,49)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,49)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,49)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,49)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,49)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,49)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,49)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,49)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,49)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,49)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,49)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,49)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,49)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,49)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,49)");

//////////////////////////////////////
// Racine carrée (ou Puzzle) - Partage des connaissances : 2 temps, 2 manières
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,50)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,50)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,50)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,50)");   
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,50)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,50)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,50)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,50)");  
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,50)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,50)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,50)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,50)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,50)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,50)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,50)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,50)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,50)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,50)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,50)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,50)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,50)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,50)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,50)");

//////////////////////////////////////
// Listes d’intérêts et de compétences - À quel point ça t’intéresse ?
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,51)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,51)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,51)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,51)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,51)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,51)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,51)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,51)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,51)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,51)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,51)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,51)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,51)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,51)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,51)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,51)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,51)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,51)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,51)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,51)");

//////////////////////////////////////
// Vidéo d’expert - Qu’est-ce qu’en disent les experts ?
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,52)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,52)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,52)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_transmissive'),NULL,52)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,52)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,52)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,52)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,52)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,52)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,52)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,52)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,52)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,52)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,52)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,52)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,52)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,52)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,52)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,52)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,52)");

//////////////////////////////////////
// Recherche guidée - Je cherche, donc je trouve !
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,53)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,53)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,53)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,53)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,53)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,53)");  
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,53)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,53)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,53)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,53)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,53)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,53)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,53)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,53)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,53)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,53)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,53)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,53)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,53)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,53)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,53)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,53)");

//////////////////////////////////////
// Portefolios annotés - Montre-moi ce que tu sais, ce que tu en penses et pourquoi !
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,54)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,54)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,54)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,54)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,54)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,54)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,54)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,54)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,54)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,54)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,54)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,54)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,54)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,54)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,54)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,54)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,54)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,54)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,54)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,54)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,54)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,54)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,54)");

//////////////////////////////////////
// Phillips 6.6 - Six personnes, six minutes !
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,55)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,55)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,55)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,55)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,55)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,55)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,55)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,55)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,55)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,55)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,55)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,55)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,55)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,55)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,55)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,55)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,55)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,55)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,55)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,55)");

//////////////////////////////////////
// Séance d’affiches - Livrer un message
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,56)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,56)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,56)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,56)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,56)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,56)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,56)");   
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,56)");     
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,56)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,56)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,56)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,56)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,56)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,56)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,56)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,56)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,56)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,56)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,56)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,56)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,56)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,56)");

//////////////////////////////////////
// Inventaire de concepts - Est-ce que tu maitrises mieux les concepts à la fin du cours qu’au début ?
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,57)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,57)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),NULL,57)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,57)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,57)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,57)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,57)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,57)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,57)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,57)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,57)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,57)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,57)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,57)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,57)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,57)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,57)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,57)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,57)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,57)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,57)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,57)");

//////////////////////////////////////
// Exercices répétés - La répétition mène à la perfection
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,58)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,58)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),NULL,58)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,58)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,58)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,58)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,58)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,58)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,58)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,58)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,58)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,58)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,58)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,58)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,58)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,58)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,58)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,58)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,58)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,58)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,58)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,58)");

//////////////////////////////////////
// Le conseil de coopération - Une prise de parole polygérée !
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,59)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,59)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,59)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,59)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,59)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,59)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,59)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,59)");   
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,59)");   
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,59)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,59)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,59)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,59)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,59)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,59)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,59)");     
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,59)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,59)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,59)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,59)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,59)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,59)");

//////////////////////////////////////
// Objectifs classés - Top 3
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,60)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,60)");   
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,60)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,60)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,60)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,60)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,60)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,60)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,60)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,60)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,60)"); 
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,60)");        
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,60)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,60)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,60)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,60)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,60)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,60)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,60)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,60)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,60)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,60)");

//////////////////////////////////////
// Organisateur de séquences - Tout d’abord, ensuite et finalement !
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,61)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,61)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,61)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,61)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,61)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,61)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,61)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,61)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,61)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,61)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,61)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,61)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,61)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,61)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,61)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,61)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,61)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,61)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,61)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,61)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,61)");

//////////////////////////////////////
// SVA - Ce que je sais, ce que je veux savoir et ce que j’ai appris
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,62)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,62)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,62)");

//////////////////////////////////////
// Profils d’apprenants - Toi, comment t’apprends ?"
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,63)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,63)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,63)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,63)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,63)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,63)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,63)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,63)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,63)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,63)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,63)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,63)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,63)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,63)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,63)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,63)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,63)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,63)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,63)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,63)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,63)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,63)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,63)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,63)");

//////////////////////////////////////
// Ligue d’improvisation - Prêt pas prêt, j’y vais!
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,64)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,64)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,64)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,64)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,64)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,64)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,64)");   
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,64)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,64)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,64)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,64)");       
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,64)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,64)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,64)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,64)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,64)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,64)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,64)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,64)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,64)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,64)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,64)");

//////////////////////////////////////
// Questions guidées - Qui ? Quoi ? Quand ? Comment ? Pourquoi ?
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,65)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,65)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,65)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,65)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,65)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,65)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,65)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,65)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,65)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,65)");      
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,65)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,65)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,65)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,65)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,65)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,65)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,65)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,65)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,65)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,65)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,65)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,65)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,65)");

//////////////////////////////////////
// Équipe de réaction - Une équipe au nom de tous !
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,66)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,66)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,66)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,66)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,66)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,66)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,66)");   
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,66)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,66)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,66)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,66)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,66)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,66)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,66)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,66)");      
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,66)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,66)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,66)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,66)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,66)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,66)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,66)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,66)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,66)");

//////////////////////////////////////
// Autobiographies ciblées - Parle-moi de toi !
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,67)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,67)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),NULL,67)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,67)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,67)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,67)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,67)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,67)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,67)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,67)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,67)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,67)");
    //$DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,67");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,67)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,67)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,67)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,67)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,67)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,67)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,67)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,67)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,67)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,67)");

//////////////////////////////////////
// Tapis de tri -  Classer les données
//////////////////////////////////////
   
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,68)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,68)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,68)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,68)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,68)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,68)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,68)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,68)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,68)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,68)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,68)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,68)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,68)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,68)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,68)");     
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,68)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,68)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,68)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,68)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,68)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,68)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,68)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,68)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,68)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,68)");

//////////////////////////////////////
// L’entretien collectif - Discutons, ensemble!
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,69)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,69)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,69)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,69)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,69)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,69)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,69)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,69)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,69)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,69)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,69)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,69)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,69)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,69)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,69)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,69)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,69)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,69)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,69)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,69)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,69)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,69)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,69)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,69)");

//////////////////////////////////////
// L’entretien en tête-à-tête - Discutons, en tête-à-tête!
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,70)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,70)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,70)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,70)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,70)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,70)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,70)");   
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,70)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,70)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,70)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,70)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,70)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,70)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,70)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,70)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,70)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,70)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,70)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,70)");

//////////////////////////////////////
// Comparaison des notes personnelles - Je note, tu notes, puis nous notons !
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,71)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),NULL,71)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,71)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,71)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,71)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,71)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,71)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,71)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,71)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,71)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,71)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,71)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,71)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,71)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,71)");     
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,71)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,71)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,71)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,71)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,71)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,71)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,71)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,71)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,71)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,71)");

//////////////////////////////////////
// Brise-glace - Faire les premiers pas
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,72)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,72)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),NULL,72)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,72)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,72)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,72)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,72)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,72)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,72)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,72)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,72)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,72)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,72)");     
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,72)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,72)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,72)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,72)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,72)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,72)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,72)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,72)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,72)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,72)");

//////////////////////////////////////
// Résumé en une phrase - Fais ça court
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,73)");     
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,73)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,73)");

//////////////////////////////////////
// Analogies approximatives - C’est quoi ta métaphore ?
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,74)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,74)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,74)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,74)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,74)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,74)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,74)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,74)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,74)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,74)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,74)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,74)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,74)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,74)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,74)");     
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,74)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,74)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,74)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,74)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,74)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,74)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,74)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,74)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,74)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,74)");

//////////////////////////////////////
// Étude expérimentale - Expérience en laboratoire : de son élaboration à son application
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,75)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='appilcation'),NULL,75)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,75)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,75)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,75)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,75)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,75)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,75)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,75)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,75)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,75)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,75)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,75)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,75)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,75)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,75)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,75)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,75)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,75)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,75)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,75)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,75)");

//////////////////////////////////////
// Le bon mot - Si tu devais me résumer ça en un mot… Et pourquoi ?
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,76)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,76)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,76)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,76)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,76)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,76)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,76)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,76)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,76)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,76)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,76)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,76)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,76)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,76)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,76)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,76)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,76)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,76)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,76)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,76)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,76)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,76)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,76)");

//////////////////////////////////////
// Dialogues inventés - Je dis, tu dis, ils disent…
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,77)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,77)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,77)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,77)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,77)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,77)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,77)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,77)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,77)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,77)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,77)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,77)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,77)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,77)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,77)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,77)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,77)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,77)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,77)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,77)");

//////////////////////////////////////
// Chaise de l’auteur - J’aimerais avoir votre opinion
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,78)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,78)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,78)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,78)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,78)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,78)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,78)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,78)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,78)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,78)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,78)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,78)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,78)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,78)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,78)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,78)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,78)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,78)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,78)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,78)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,78)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,78)");
    
//////////////////////////////////////
// Les bombes - Formule explosive !
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,79)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,79)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,79)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,79)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,79)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,79)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,79)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,79)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,79)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,79)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,79)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,79)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,79)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,79)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,79)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,79)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,79)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,79)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,79)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,79)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,79)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,79)");
    
//////////////////////////////////////
// Les indices - Différencier pour mieux motiver
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,80)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,80)");
       
//////////////////////////////////////
// Carte heuristique - Montre-moi à quoi tu penses
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,81)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,81)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,81)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,81)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,81)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,81)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,81)");   
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,81)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,81)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,81)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,81)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,81)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,81)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,81)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,81)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,81)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,81)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,81)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,81)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,81)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,81)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,81)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,81)");
       
//////////////////////////////////////
// Chasse aux idées fausses - Vos préconceptions sont-elles exactes ?
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,82)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,82)");
       
//////////////////////////////////////
// Solutions documentées - Explique-moi comment et pourquoi tu le fais
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,83)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluer'),NULL,83)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,83)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,83)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,83)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,83)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,83)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,83)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,83)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,83)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,83)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,83)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,83)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,83)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,83)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,83)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,83)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,83)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,83)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,83)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,83)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,83)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,83)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,83)");
       
//////////////////////////////////////
// Liste ciblée - En quelques mots, voilà ce qu’il faut retenir
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,84)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,84)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,84)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,84)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomu'),NULL,84)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,84)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,84)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,84)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,84)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,84)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,84)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,84)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,84)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,84)");       
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,84)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,84)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,84)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,84)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,84)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,84)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,84)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,84)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,84)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,84)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,84)");
       
//////////////////////////////////////
// Symposium - La force de l’ensemble
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,85)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,85)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,85)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,85)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,85)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,85)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,85)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,85)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,85)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,85)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,85)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,85)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,85)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,85)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,85)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,85)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,85)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,85)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,85)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,85)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,85)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,85)");
       
//////////////////////////////////////
// Socrative - Évaluer en temps réel
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,86)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),NULL,86)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,86)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,86)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,86)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,86)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,86)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,86)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,86)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,86)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,86)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,86)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,86)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,86)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,86)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,86)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,86)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,86)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,86)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,86)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,86)");
       
//////////////////////////////////////
// Superlatifs - Le +
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,87)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,87)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,87)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,87)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,87)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,87)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,87)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,87)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,87)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,87)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,87)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,87)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,87)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,87)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,87)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,87)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,87)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,87)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,87)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,87)");
       
//////////////////////////////////////
// Correction par les pairs - C’est bon ou pas ? Pourquoi ?
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,88)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,88)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,88)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,88)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,88)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,88)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,88)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,88)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,88)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,88)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,88)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,88)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,88)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,88)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,88)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,88)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,88)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,88)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,88)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,88)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,88)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,88)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,88)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,88)");
       
//////////////////////////////////////
// Documentation trouée - Qu’est-ce qui manque ?
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,89)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,89)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,89)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,89)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,89)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,89)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,89)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,89)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,89)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,89)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,89)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,89)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,89)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,89)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,89)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,89)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,89)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,89)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,89)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,89)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,89)");
       
//////////////////////////////////////
// Interruptions intelligentes - Qui, quoi, quand, comment et pourquoi ?
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,90)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,90)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,90)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,90)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,90)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,90)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,90)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,90)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,90)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,90)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,90)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,90)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,90)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,90)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,90)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,90)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,90)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,90)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,90)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,90)");
       
//////////////////////////////////////
// Interview - Bonjour ! Première question
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,91)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,91)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,91)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,91)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,91)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,91)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='outside_class'),NULL,91)");  
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,91)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,91)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,91)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,91)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,91)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,91)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,91)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,91)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,91)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,91)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,91)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,91)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,91)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,91)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,91)");
       
//////////////////////////////////////
// Ateliers pratiques - Allons-y, on essaye !
//////////////////////////////////////
   
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,92)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,92)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,92)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,92)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,92)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,92)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,92)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,92)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,92)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,92)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,92)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,92)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,92)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,92)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,92)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,92)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,92)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,92)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,92)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,92)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,92)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,92)");
       
//////////////////////////////////////
// Exemples d’application - Dis-moi à quoi ça sert
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,93)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,93)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,93)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,93)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,93)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,93)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,93)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,93)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,93)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,93)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,93)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,93)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,93)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,93)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,93)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,93)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,93)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,93)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,93)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,93)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,93)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,93)");
       
//////////////////////////////////////
// Baladodiffusion - Alpha Bravo Charli
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,94)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,94)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,94)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,94)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,94)");  
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='outside_class'),NULL,94)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,94)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,94)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,94)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,94)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,94)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,94)");        
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,94)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,94)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,94)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,94)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,94)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,94)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,94)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,94)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,94)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,94)");
       
//////////////////////////////////////
// Graffiti collectif - Construction collaborative de solutions en groupe
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,95)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,95)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,95)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,95)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,95)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='inclusiveness'),NULL,95)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='teamwork'),NULL,95)");   
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,95)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,95)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,95)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,95)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,95)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,95)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,95)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,95)");       
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,95)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,95)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,95)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,95)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,95)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,95)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,95)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,95)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,95)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,95)");
       
//////////////////////////////////////
// Démonstration - Il faut voir pour comprendre
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,96)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,96)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,96)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,96)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,96)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,96)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_transmissive'),NULL,96)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,96)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,96)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,96)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,96)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,96)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,96)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,96)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,96)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,96)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,96)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,96)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,96)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,96)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,96)");
       
//////////////////////////////////////
// Questions d’examen - C’est ça que tu devrais savoir !
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,97)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),NULL,97)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,97)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,97)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,97)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,97)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,97)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,97)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,97)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,97)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,97)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,97)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,97)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,97)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,97)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,97)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,97)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,97)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,97)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,97)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,97)");
          
//////////////////////////////////////
// Quiz en ligne - Évaluation virtuelle
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,98)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='knowledge'),NULL,98)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,98)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,98)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='heterogene'),NULL,98)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,98)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,98)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,98)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,98)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,98)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,98)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,98)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='all_course_type'),NULL,98)");   
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,98)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,98)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,98)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,98)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,98)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,98)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,98)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,98)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,98)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,98)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_30mn'),NULL,98)");
             
//////////////////////////////////////
// Télévoteurs - Devoir de citoyen, on vote !
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comprehension'),NULL,99)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,99)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='evaluation'),NULL,99)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='participation'),NULL,99)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='introspection'),NULL,99)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='climat'),NULL,99)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,99)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_interactive'),NULL,99)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,99)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lecture'),NULL,99)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='seminar'),NULL,99)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,99)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,99)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,99)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,99)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,99)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,99)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,99)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,99)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,99)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_60mn'),NULL,99)");
             
//////////////////////////////////////
// Le Stage - Je pratique !
//////////////////////////////////////

    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='application'),NULL,100)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='analysis'),NULL,100)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='synthesis'),NULL,100)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='studs_with_difficulties'),NULL,100)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='autonomy'),NULL,100)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='outside_class'),NULL,100)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_collaborative'),NULL,100)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_participative'),NULL,100)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='lm_individual'),NULL,100)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='project'),NULL,100)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='practical'),NULL,100)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='comodal'),NULL,100)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='sync_remote'),NULL,100)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='async_remote'),NULL,100)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='hybrid'),NULL,100)");    
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='presential'),NULL,100)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='under_10'),NULL,100)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_11_30'),NULL,100)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_31_60'),NULL,100)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='between_61_100'),NULL,100)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_100'),NULL,100)");
    $DB->execute("INSERT INTO {local_booste_suggestions} (tag,activity,ext_activity) VALUES ((SELECT id FROM {local_booste_list_tags} WHERE name='over_60mn'),NULL,100)");

    return true;
}
