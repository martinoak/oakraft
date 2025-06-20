<?php

namespace App\Services;

class AirlineIATA
{
    public static array $airlines = [
        'Aeroflot' => 'SU',
        'Air France' => 'AF',
        'Airbus' => 'AB',
        'Air Canada' => 'AC',
        'Air China' => 'CA',
        'Air Dolomiti' => 'EN',
        'Air Europa' => 'UX',
        'Air India' => 'AI',
        'Air New Zealand' => 'NZ',
        'Air Serbia' => 'JU',
        'Air Tahiti Nui' => 'TN',
        'Air Transat' => 'TS',
        'AirAsia' => 'AK',
        'Alaska Airlines' => 'AS',
        'Alitalia' => 'AZ',
        'ANA (All Nippon Airways)' => 'NH',
        'American Airlines' => 'AA',
        'Austrian Airlines' => 'OS',
        'Avianca' => 'AV',
        'British Airways' => 'BA',
        'Cathay Pacific' => 'CX',
        'China Airlines' => 'CI',
        'Condor' => 'DE',
        'Delta Air Lines' => 'DL',
        'easyJet' => 'U2',
        'Edelweiss Air' => 'WK',
        'Emirates' => 'EK',
        'Ethiopian Airlines' => 'ET',
        'Etihad Airways' => 'EY',
        'Eurowings' => 'EW',
        'Finnair' => 'AY',
        'Garuda Indonesia' => 'GA',
        'Gol Linhas Aéreas' => 'G3',
        'Hainan Airlines' => 'HU',
        'Iberia' => 'IB',
        'IndiGo' => '6E',
        'Indonesian Airlines' => 'QG',
        'Japan Airlines' => 'JL',
        'Jet2' => 'LS',
        'KLM' => 'KL',
        'Korean' => 'KE',
        'LOT Polish Airlines' => 'LO',
        'Lufthansa' => 'LH',
        'Luxair' => 'LG',
        'Malaysia Airlines' => 'MH',
        'Middle East Airlines' => 'ME',
        'Norwegian' => 'DY',
        'Pegasus Airlines' => 'PC',
        'Qanot Sharq' => 'HH',
        'Qantas' => 'QF',
        'Qatar Airways' => 'QR',
        'Royal Jordanian' => 'RJ',
        'Ryanair' => 'FR',
        'SAS' => 'SK',
        'Silkavia' => 'US',
        'Singapore Airlines' => 'SQ',
        'Skymark Airlines' => 'BC',
        'Smartwings' => 'QS',
        'South African Airways' => 'SA',
        'Spirit Airlines' => 'NK',
        'Starlux Airlines' => 'JX',
        'Swiss' => 'LX',
        'TAP Portugal' => 'TP',
        'Tigerair Taiwan' => 'IT',
        'Turkish Airlines' => 'TK',
        'United Airlines' => 'UA',
        'Ural Airlines' => 'U6',
        'UTair' => 'UT',
        'VietJet Air' => 'VJ',
        'Vietnam Airlines' => 'VN',
        'Vueling Airlines' => 'VY',
        'Wizz Air' => 'W6',
        'World 2 Fly' => 'W2',
        'Xiamen Airlines' => 'MF',
    ];

    /**
     * Get the IATA code for the given airline.
     *
     * @param string $airline
     * @return string
     */
    public static function getIATA(string $airline): string
    {
        return self::$airlines[$airline] ?? 'XX';
    }

    public static function getAirline(string $iata): string
    {
        return array_search($iata, self::$airlines) ?? 'N/A';
    }
}
