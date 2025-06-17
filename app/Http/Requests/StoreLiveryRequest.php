<?php

namespace App\Http\Requests;

use App\Enums\AircraftType;
use App\Enums\LiveryType;
use App\Enums\Role;
use App\Services\AirlineIATA;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLiveryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->role === Role::ADMIN->value;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'aircraft' => ['required', Rule::in(AircraftType::toArray())],
            'airline' => ['required', Rule::in(array_keys(AirlineIATA::$airlines))],
            'IATA' => ['required', Rule::in(array_values(AirlineIATA::$airlines))],
            'type' => ['required', Rule::in(LiveryType::toArray())],
            'file' => 'required|file|mimes:jpg,jpeg',
            'price_jpg' => 'required|numeric|decimal:2',
            'price_png' => 'required|numeric|decimal:2',
            'featured' => 'sometimes',
        ];
    }

    public function messages(): array
    {
        return [
            'aircraft.required' => 'Letadlo je povinné.',
            'aircraft.in' => 'Letadlo musí být zvoleno z nabídky.',
            'airline.required' => 'Aerolinka je povinná.',
            'airline.in' => 'Aerolinka musí být zvolena z nabídky.',
            'IATA.required' => 'Kód IATA je povinný.',
            'IATA.in' => 'Kód IATA musí být zvolen z nabídky.',
            'type.required' => 'Typ livery je povinný.',
            'type.in' => 'Typ livery musí být zvolen z nabídky.',
            'file.required' => 'Soubor je povinný.',
            'file.file' => 'Soubor musí být typu soubor.',
            'file.mimes' => 'Soubor musí být typu JPG nebo JPEG.',
            'price_jpg.required' => 'Cena za JPG je povinná.',
            'price_jpg.numeric' => 'Cena za JPG musí být číslo.',
            'price_jpg.decimal' => 'Cena za JPG musí být číslo s dvěma desetinnými místy.',
            'price_png.required' => 'Cena za PNG je povinná.',
            'price_png.numeric' => 'Cena za PNG musí být číslo.',
            'price_png.decimal' => 'Cena za PNG musí být číslo s dvěma desetinnými místy.',
        ];
    }
}
