<?php

namespace App\Exports;

use App\Models\Family;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FamilyMemberExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function view(): View
    {
        if($this->request->sector == 'All') {
            $families = Family::with('familyMembers')->get();
            
            return view('dashboard.print.member', [
                'families' => $families,
                'sector' => $this->request->sector,
            ]);
        } else {
            $families = Family::with('familyMembers')->where('sector_id', $this->request->sector)->get();
            
            return view('dashboard.print.member', [
                'families' => $families,
                'sector' => $this->request->sector
            ]);
        }
    }
}
