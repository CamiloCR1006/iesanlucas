<?php

namespace App\Models;

use Faker\Provider\ar_EG\Text;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Graduate extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'year',
        'level_of_study',
        'undergraduate',
        'postgraduate',
        'phone_number',
        'email',
        'permision',
    ];

    protected $casts = [
        'permision' => 'boolean',
    ];

    public static function getForm(): array
    {
        return [
            Section::make()
                ->schema([
                    TextInput::make('name')
                        ->label('Nombre completo')
                        ->required(),
                    TextInput::make('year')
                        ->label('Año de graduación')
                        ->required(),
                    TextInput::make('level_of_study')
                        ->formatStateUsing(fn(?string $state) => config('settings.levels_of_study')[$state])
                        ->label('Nivel de estudio'),
                    TextInput::make('undergraduate')
                        ->required()
                        ->visible(fn(Get $get) => in_array($get('level_of_study'), ['undergraduate']))
                        ->label('Programa Académico (Carrera)'),
                    TextInput::make('postgraduate')
                        ->required()
                        ->visible(fn(Get $get) => in_array($get('level_of_study'), ['doctorate', 'master', 'specialization']))
                        ->label('Estudios Especializados o Posgrado'),
                    TextInput::make('phone_number')
                        ->numeric()
                        ->label('Número de teléfono')
                        ->required(),
                    TextInput::make('email')
                        ->email()
                        ->label('Correo electrónico')
                        ->required(),
                    Radio::make('permision')
                        ->label('¿Desea ser incluido en el envío de notificaciones de egresados vía WhatsApp o Redes Sociales?')
                        ->helperText('Tenga en cuenta que solo será enviada exclusivamente información relacionada con egresados de la institución. Al contestar "SI ACEPTO" usted autoriza a la Institución Educativa San Lucas a usar su información de contacto para enviar información exclusivamente relacionada con iniciativas o eventos que vinculen egresados de la Institución.')
                        ->options([
                            true => 'Sí',
                            false => 'No',
                        ])
                        ->required(),
                ])
        ];
    }

    public static function getColumns(): array
    {
        return [
            TextColumn::make('name')
                ->label('Nombre completo'),
            TextColumn::make('year')
                ->label('Año de graduación'),
            TextColumn::make('level_of_study')
                ->formatStateUsing(fn(?string $state) => config('settings.levels_of_study')[$state])
                ->label('Nivel de estudio'),
        ];
    }
}
