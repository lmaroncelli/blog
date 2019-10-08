<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'id' => $this->id,
            'titolo' => $this->titolo,
            'corpo' => $this->corpo,
            'giorno_mese' => $this->created_at->locale('it_IT')->format('d F'),
            'anno' => $this->created_at->format('Y'),
            'categorie' => $this->getCategorie(),
            'excerpt' => $this->getExcerpt(),
            'modifica' => $this->updated_at->locale('it_IT')->diffForHumans()
        ];
    }
}
