<?php

namespace App\Http\Resources;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

/**
 * @mixin ContactUs
 */
class ContactUsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "subject" => $this->subject,
            "message" => Str::limit($this->message, 50, '...'),
            "is_read" => $this->is_read,
            "submitted_at" => $this->created_at->diffForHumans(),
        ];
    }
}
