<?php

namespace App\Models\Lang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Lang\Noun
 *
 * @property int $id
 * @property string|null $singular_nominative
 * @property string|null $singular_genitive
 * @property string|null $singular_dative
 * @property string|null $singular_accusative
 * @property string|null $singular_instrumental
 * @property string|null $singular_prepositional
 * @property string|null $plural_nominative
 * @property string|null $plural_genitive
 * @property string|null $plural_dative
 * @property string|null $plural_accusative
 * @property string|null $plural_instrumental
 * @property string|null $plural_prepositional
 * @property string|null $genus
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Noun newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Noun newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Noun query()
 * @method static \Illuminate\Database\Eloquent\Builder|Noun whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noun whereGenus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noun whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noun wherePluralAccusative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noun wherePluralDative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noun wherePluralGenitive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noun wherePluralInstrumental($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noun wherePluralNominative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noun wherePluralPrepositional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noun whereSingularAccusative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noun whereSingularDative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noun whereSingularGenitive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noun whereSingularInstrumental($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noun whereSingularNominative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noun whereSingularPrepositional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noun whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Noun extends Model
{
    use HasFactory;
}
