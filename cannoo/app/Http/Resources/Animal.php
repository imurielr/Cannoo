<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Animal extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'type' => $this->getType(),
            'breed' => $this->getBreed(),
            'birthDate' => $this->getBirthDate(),
            'vaccinated' => $this->getVaccinated(),
            'adopted' => $this->getVaccinated(),
        ];
    }
}
