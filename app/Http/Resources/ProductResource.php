<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'id'=>$this->id,
          'user'=>[
            'id'=>$this->user->id,
            'name'=>$this->user->name
          ],
          'category'=>[
            'id'=>$this->category->id,
            'name'=>$this->category->name,
          ],
          'name'=>$this->name,
          'price'=>$this->price,
          'description'=>$this->description,
          'img'=>$this->img,
          'available_quantity'=>$this->available_quantity
        ];
    }
}
