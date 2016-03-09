<?php

namespace Lasallecrm\Lasallecrmcontact\Http\Controllers;

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

// LaSalle Software
use Lasallecms\Lasallecmsfrontend\Http\Controllers\FrontendBaseController;
use Lasallecrm\Lasallecrmapi\Repositories\PeopleRepository;
use Lasallecrm\Lasallecrmapi\Models\People;
use Lasallecrm\Lasallecrmcontact\Helpers\Helpers;

// Laravel facades
use Illuminate\Support\Facades\Config;


class LasallecrmcontactController extends FrontendBaseController
{
    /**
     * @var Lasallecrm\Lasallecrmapi\Repositories\PeopleRepository
     */
    protected $peopleRepository;

    /**
     * @var Lasallecrm\Lasallecrmcontact\Helpers
     */
    protected $helpers;


    /**
     * LasallecrmcontactController constructor.
     * @param PeopleRepository $peopleRepository
     * @param Helpers $helpers
     */
    public function __construct(PeopleRepository $peopleRepository, Helpers $helpers) {

        // execute parent's construct method first in order to run the middleware
        parent::__construct();

        $this->peopleRepository = $peopleRepository;

        $this->helpers          = $helpers;
    }


    /**
     * Display a single contact from the LaSalleCRM database
     *
     * @param  mixed        $id        LaSalleCRM people ID (int) or "Firstname@Lastname" (text)
     * @return response
     */
    public function show($id) {

        // $id can be an integer -- the actual ID of the PEOPLES table; or,
        // $id can be a string, in the format "Firstname@Lastname"
        $peopleID = $this->helpers->determinePeopleID($id);

        if (!$this->helpers->isAllowedPeopleIdSingleContactDisplay($peopleID)) {
            return redirect()->back();
        }

        $people    = $this->peopleRepository->getFind($peopleID);
        $email     = $this->peopleRepository->getFirstWorkEmail($peopleID);
        $telephone = $this->peopleRepository->getFirstWorkTelephone($peopleID);

        return view('lasallecrmcontact::single_crmcontact_basic', [
            'people'    => $people,
            'email'     => $email,
            'telephone' => $telephone,
            'Config'    => Config::class,
        ]);
    }


    /**
     * Display multiple contacts from the LaSalleCRM database
     *
     * @return response
     */
    public function multipleshow() {

        $displayTheseIDs = Config::get('lasallecrmcontact.multiple_contact_display_people_ids');

        $contacts = [];

        $i = 0;

        foreach ($displayTheseIDs as $displayThisID) {
            $people    = $this->peopleRepository->getFind($displayThisID);
            $email     = $this->peopleRepository->getFirstWorkEmail($displayThisID);
            $telephone = $this->peopleRepository->getFirstWorkTelephone($displayThisID);

            $contacts[$i]['first_name']     = $people->first_name;
            $contacts[$i]['middle_name']    = $people->middle_name;
            $contacts[$i]['surname']        = $people->surname;
            $contacts[$i]['link']           = $people->first_name.'@'.$people->middle_name.'@'.$people->surname;
            $contacts[$i]['position']       = $people->position;
            $contacts[$i]['featured_image'] = $people->featured_image;
            $contacts[$i]['email']          = $email ;
            $contacts[$i]['telephone']      = $telephone;

            $i++;
        }


        //echo "<pre>";
        //print_r($contacts);
        //dd("moh");


        return view('lasallecrmcontact::multiple_crmcontact_basic', [
            'contacts'  => $contacts,
            'Config'    => Config::class,
        ]);
    }
}

