<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
   // Define Properti
   public $status;
   public $message;
   public $resource;

   public function __construct($status, $message, $resource)
   {
       $this->status  = $status;
       $this->message = $message;
       $this->resource = $resource;
   }

   public function toArray(Request $request): array
   {
       return [
           'success'   => $this->status,
           'message'   => $this->message,
           'data'      => $this->resource
       ];
   }
}
