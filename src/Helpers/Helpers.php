<?php

namespace Lasallecrm\Lasallecrmcontact\Helpers;

/**
 *
 * Contact package for LaSalle Customer Relationship Management, based on the Laravel 5 Framework
 * Copyright (C) 2015 - 2016  The South LaSalle Trading Corporation
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *
 * @package    Contact package for LaSalle Customer Relationship Management
 * @link       http://LaSalleCRM.com
 * @copyright  (c) 2015 - 2016, The South LaSalle Trading Corporation
 * @license    http://www.gnu.org/licenses/gpl-3.0.html
 * @author     The South LaSalle Trading Corporation
 * @email      info@southlasalle.com
 *
 */

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Helpers
{

    /**
     * Determine what the ID is from the PEOPLES table, whether the actual ID is specified; or, whether the
     * full name is specified in the URL
     *
     * @param  mixed  $id can be an integer -- the actual ID of the PEOPLES table; or,
     *                $id can be a string, in the format "Firstname@Lastname"
     *
     * @return int
     */
    public function determinePeopleID($id) {

        // $id is an integer, so just return
        // http://php.net/manual/en/function.ctype-digit.php
        if (ctype_digit($id)) {
            return $id;
        }

        // $id is a slug, in the form "Firstname@Middlename@Lastname".
        // At minimum, need Firstname and Lastname.
        // URL in the form http://domain.com/lasallecrmcontact/George@Jetson

        return $this->getPeopleIdFromFullName($id);
    }


    /**
     * get the peoples' ID from the full name
     *
     * @param   string    $fullName    The full name in the URL in the form "Firstname@Middlename@Lastname"
     * @return int
     */
    public function getPeopleIdFromFullName($fullName) {
        $result = DB::table('peoples')
            ->where('first_name',  $this->getFirstName($fullName))
            ->where('middle_name', $this->getMiddleName($fullName))
            ->where('surname',     $this->getLastName($fullName))
            ->first()
        ;

        if (count($result) > 0) {
            return $result->id;
        }
        return 0;
    }


    /**
     * Get the first name in the URL
     *
     * @param   string    $fullName    The full name in the URL in the form "Firstname@Middlename@Lastname"
     * @return  mixed
     */
    public function getFirstName($fullName) {
        $names = explode("@", $fullName);

        return $names[0];
    }

    /**
     * Get the middle name in the URL
     *
     * @param   string    $fullName    The full name in the URL in the form "Firstname@Middlename@Lastname"
     * @return  mixed
     */
    public function getMiddleName($fullName) {
        $names = explode("@", $fullName);

        if (count($names) == 3) {
            return $names[1];
        }
        return "";
    }

    /**
     * Get the surname in the URL
     *
     * @param   string    $fullName    The full name in the URL in the form "Firstname@Middlename@Lastname"
     * @return  mixed
     */
    public function getLastName($fullName) {
        $names = explode("@", $fullName);

        if (count($names) == 2) {
            return $names[1];
        }
        return $names[2];
    }



    /**
     * Is this people ID allowed to be displayed in the single contact display?
     *
     * @param  int        $id        LaSalleCRM people ID
     * @return bool
     */
    public function isAllowedPeopleIdSingleContactDisplay($id) {

        if ($id == 0) {
            return false;
        }

        $allowedIDs = Config::get('lasallecrmcontact.single_contact_display_people_id_allowed');

        foreach ($allowedIDs as $allowedID) {
            if ($allowedID == $id) {
                return true;
            }
        }
        return false;
    }
}
