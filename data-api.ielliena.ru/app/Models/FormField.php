<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    use HasFactory;

    protected $fillable = [
        "form_id",
        "name",
        "type",
        "inputType",
        "description",
        "selectOptions"
    ];

    public function options() {
        return json_decode($this->selectOptions);
    }
}
