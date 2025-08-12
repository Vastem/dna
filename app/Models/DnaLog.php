<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DnaLog extends Model
{
    use HasFactory; 

    protected $table = 'dna_mutation_logs';
    protected $fillable = ['dna_sequence', 'has_mutation'];
}
