<?php

namespace App\Models\Lang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Lang\Adjective
 *
 * @property int $id
 * @property string|null $singular_masculine_nominative
 * @property string|null $singular_masculine_genitive
 * @property string|null $singular_masculine_dative
 * @property string|null $singular_masculine_accusative
 * @property string|null $singular_masculine_accusative_animated
 * @property string|null $singular_masculine_instrumental
 * @property string|null $singular_masculine_prepositional
 * @property string|null $singular_feminine_nominative
 * @property string|null $singular_feminine_genitive
 * @property string|null $singular_feminine_dative
 * @property string|null $singular_feminine_accusative
 * @property string|null $singular_feminine_instrumental
 * @property string|null $singular_feminine_prepositional
 * @property string|null $singular_neuter_nominative
 * @property string|null $singular_neuter_genitive
 * @property string|null $singular_neuter_dative
 * @property string|null $singular_neuter_accusative
 * @property string|null $singular_neuter_instrumental
 * @property string|null $singular_neuter_prepositional
 * @property string|null $plural_nominative
 * @property string|null $plural_genitive
 * @property string|null $plural_dative
 * @property string|null $plural_accusative
 * @property string|null $plural_accusative_animated
 * @property string|null $plural_instrumental
 * @property string|null $plural_prepositional
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective query()
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective wherePluralAccusative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective wherePluralAccusativeAnimated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective wherePluralDative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective wherePluralGenitive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective wherePluralInstrumental($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective wherePluralNominative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective wherePluralPrepositional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective whereSingularFeminineAccusative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective whereSingularFeminineDative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective whereSingularFeminineGenitive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective whereSingularFeminineInstrumental($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective whereSingularFeminineNominative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective whereSingularFemininePrepositional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective whereSingularMasculineAccusative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective whereSingularMasculineAccusativeAnimated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective whereSingularMasculineDative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective whereSingularMasculineGenitive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective whereSingularMasculineInstrumental($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective whereSingularMasculineNominative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective whereSingularMasculinePrepositional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective whereSingularNeuterAccusative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective whereSingularNeuterDative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective whereSingularNeuterGenitive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective whereSingularNeuterInstrumental($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective whereSingularNeuterNominative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective whereSingularNeuterPrepositional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adjective whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Adjective extends Model
{
    use HasFactory;
}
