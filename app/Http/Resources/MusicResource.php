<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MusicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'music';


    public function toArray($request)
    {
       // return parent::toArray($request);

       return [
           'id'=>$this->resource->id,
           'title'=>$this->resource->title,
           'author'=>$this->resource->author,
           'duration'=>$this->resource->duration,
           'published'=>$this->resource->published,
           'genre'=>$this->resource->genre,
           'user'=> new UserResource($this->resource->user_creator)    
           

       ];
    }
}
