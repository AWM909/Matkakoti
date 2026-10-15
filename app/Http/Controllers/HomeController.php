<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $month = now()->month;

        $season = match (true) {
            in_array($month, [12, 1, 2]) => 'winter',
            in_array($month, [3, 4, 5]) => 'spring',
            in_array($month, [6, 7, 8]) => 'summer',
            default => 'autumn',
        };

        $content = [
            'winter' => ['title' => 'Talvi Matkakodissa', 'text' => 'Lumi peittää maatilan ja hiljaisuus on täydellinen. Tule lepäämään ja nauti talven rauhasta.'],
            'spring' => ['title' => 'Kevät Matkakodissa', 'text' => 'Luonto herää henkiin, linnut palaavat ja päivät pitenevät. Täydellinen aika kävelyretkille.'],
            'summer' => ['title' => 'Kesä Matkakodissa', 'text' => 'Valoisat yöt, lämpimät päivät ja maaseudun rauha. Nauti kesästä pihalla ja luonnossa.'],
            'autumn' => ['title' => 'Syksy Matkakodissa', 'text' => 'Ruska värjää metsän ja ilma on raikas. Tule keräämään sieniä ja marjoja ja nauti syksyn tunnelmasta.'],
        ];

        $photos = collect(['1', '2'])
            ->map(fn ($n) => "images/seasons/{$season}{$n}.png")
            ->filter(fn ($path) => file_exists(public_path($path)))
            ->values();

        return view('home.index', [
            'season' => $season,
            'content' => $content[$season],
            'photos' => $photos,
        ]);
    }
}
