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
 * @package     local_greetings
 * @category    string
 * @copyright   2024 Gustavo <gustavormoreiraflamengo@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

 function local_greetings_get_greeting($user) {
    if ($user == null) {
        return get_string('greetinguser', 'local_greetings');
    }

    // Verificar se $user é um objeto
    if (!is_object($user)) {
        // Tratar o caso em que $user não é um objeto
        return get_string('greetinguser', 'local_greetings');
    }

    // Verificar se a propriedade "country" está presente no objeto $user
    if (property_exists($user, 'country')) {
        $country = $user->country;
    } else {
        // Tratar o caso em que a propriedade "country" não está presente
        return get_string('greetinguser', 'local_greetings');
    }

    switch ($country) {
        case 'ES':
            $langstr = 'greetinguseres';
            break;
        case 'BR':
            $langstr = 'greetinguserbr';
        break;
        default:
            $langstr = 'greetingloggedinuser';
            break;
    }

    return get_string($langstr, 'local_greetings', fullname($user));
}
