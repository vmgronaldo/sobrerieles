<?php

namespace App\Imports;

use App\Certificates as Model;
use App\Abstracts\Import;
use App\Http\Requests\Common\Certificates as Request;
use App\Notifications\SeendCertificates;

class Certificates extends import
{
    public function model(array $row)
    {
        return new Model($row);
    }

    public function map($row): array
    {
        $row = parent::map($row);

        $row['model_type'] = 'App\Participants';
        $row['model_id'] = $this->getModelId($row);
        $row['date'] = $this->getDate($row);

       // var_dump($row);->send(new NotInmuebleSeend($details));
        //exit();
        //$this->getModelId($row)->notify(new SeendCertificates(compact('certificate')));
        //$this->getModelId($row)->notify(new SeendCertificates(compact('certificate')));

        return $row;
    }

    public function rules(): array
    {
        return (new Request())->rules();
    }

}
