<?php

namespace App\Exports;

use App\Models\FamilyMember;
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
        $start = $this->request->start . " " . "00:00:00";
        $end = $this->request->end . " " . "23:59:59";
        if($this->request->sector == 'All') {
            $members = FamilyMember::with('families', 'marrieds', 'sidis', 'baptism', 'mondings')->whereBetween('family_members.created_at', [$start, $end])->get();
            
            return view('dashboard.print.member', [
                'members' => $members
            ]);
        } else {
            $members = FamilyMember::with('families', 'marrieds', 'sidis', 'baptism', 'mondings')->whereBetween('family_members.created_at', [$start, $end])->whereHas('families', function($query) {
                return $query->where('sector_id', $this->request->sector);
            })->get();
            
            return view('dashboard.print.member', [
                'members' => $members
            ]);
        }
    }
}
