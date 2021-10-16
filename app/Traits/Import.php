<?php

namespace App\Traits;



use App\Participants;
use App\User;


use Illuminate\Support\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;

trait Import
{

    public function getUserId($row)
    {
        $id = isset($row['user_id']) ? $row['user_id'] : null;

        if (empty($id) && !empty($row['user_name'])) {
            $id = $this->getUserIdFromName($row);
        }

        return (int) $id;
    }

    public function getDate($row)
    {

        return $row['date'] ? \Date::parse(ExcelDate::excelToDateTimeObject($row['date']))->format('Y-m-d') : null ;

    }


    public function getModelId($row)
    {

        return  optional(Participants::query()->firstOrCreate([
        'dni'              => $row['dni'],
    ],[ 'tipo' => $row['tipo'],'firstname' => $row['firstname'], 'lastname' => $row['lastname'], 'email' => $row['email']]))->id;



    }



}
