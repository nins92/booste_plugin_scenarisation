<?php
// This file is part of Moodle - http://moodle.org/
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
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
define('CLI_SCRIPT', true);

require(__DIR__ . '/../../../config.php');
require_once("{$CFG->libdir}/clilib.php");
require_once($CFG->libdir.'/csvlib.class.php');
list($options, $unrecognized) = cli_get_params(
        [
                'csv' => null,
            'help' => false

        ], [
                'h' => 'help',
                'c' => 'csv',
        ]
);

if ($unrecognized) {
    $unrecognized = implode("\n  ", $unrecognized);
    cli_error(get_string('cliunknowoption', 'local_booste', $unrecognized));
}

if ($options['help'] or empty($options['csv'])) {
    $help = <<<EOT
Upload CSV.

Options:
 -h, --help                Print out this help
 -c, --csvpath             Path to CSV

Example:
\$sudo -u www-data /usr/bin/php local/boostee/cli/setup.php --csv='/home/xxx.csv'

EOT;

    echo $help;
    die;
}

if (empty($options['csv'])) {
    echo "You must provide a CSV file.\n";
    exit(1);
}
$content = file_get_contents($options['csv']);
$iid = \csv_import_reader::get_new_iid('uploadadmin');
$csvparse =  new csv_import_reader($iid, 'uploadadmin');
$csvparse->load_csv_content($content,
        'utf-8', 'semicolumn');
$csvparse->init();
cli_writeln("columns:" . json_encode($csvparse->get_columns()));
while($value = $csvparse->next()) {
    cli_writeln("value" . json_encode($value));
}
