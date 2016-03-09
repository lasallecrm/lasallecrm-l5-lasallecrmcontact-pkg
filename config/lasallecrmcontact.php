<?php

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



return [

    /*
    |--------------------------------------------------------------------------
    | Single Contact Display: Allowed Peoples' ID's
    |--------------------------------------------------------------------------
    |
    | For the single contact display, what are the people ID's allowed to display?
    |
    | These ID's are the ID field in the PEOPLES table
    |
    */
    'single_contact_display_people_id_allowed' => [
        1
    ],

    /*
    |--------------------------------------------------------------------------
    | Single Contact Display: Display the contact form?
    |--------------------------------------------------------------------------
    |
    | For the single contact display, do you want to display the contact form?
    |
    | THIS FORM USES MY LaSalleCMS Contact PACKAGE!
    |
    */
    'single_contact_display_contact_form' => true,

    /*
    |--------------------------------------------------------------------------
    | Multiple Contact Display: Which Peoples' ID to display?
    |--------------------------------------------------------------------------
    |
    | For the multiple contact display, what are the people ID's that you want display?
    |
    | These ID's are the ID field in the PEOPLES table
    |
    */
    'multiple_contact_display_people_ids' => [
        1,2
    ],

];