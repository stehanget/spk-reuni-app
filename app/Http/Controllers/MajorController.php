<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Major, University, Location, Alternative};

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majors         = Major::select('id', 'title')->orderBy('title')->get();
        $universities   = University::select('id', 'title')->orderBy('title')->get();
        $locations      = Location::select('id', 'city')->orderBy('city')->get();

        return view('home', [
            'majors'        => $majors,
            'universities'  => $universities,
            'locations'     => $locations
        ]);
    }

    public function result(Request $request)
    {
        if ($request->major == 0) {
            $alternatives = new Alternative;
        } else {
            $alternatives = Alternative::where('major_id', $request->major);
        }

        if($request->university != 0) {
            $alternatives = $alternatives->where('university_id', $request->university);
        }

        if($request->category != 0) {
            $alternatives = $alternatives->whereHas('university', function ($university) {
                global $request;

                if ($request->category == 1) {
                    $category = 'negeri';
                } else {
                    $category = 'swasta';
                }
                
                $university->where('category', $category);
            });
        }

        if ($request->entryFee != 0) {
            switch ($request->entryFee) {
                case 1:
                    $alternatives = $alternatives->whereBetween('entry_fee', [1000000, 2999999]);
                    break;
                case 2:
                    $alternatives = $alternatives->whereBetween('entry_fee', [3000000, 4999999]);
                    break;
                case 3:
                    $alternatives = $alternatives->whereBetween('entry_fee', [5000000, 6999999]);
                    break;
                case 4:
                    $alternatives = $alternatives->whereBetween('entry_fee', [7000000, 10000000]);
                    break;
            }
        }

        if ($request->location != 0) {
            $alternatives = $alternatives->whereHas('university', function ($university) {
                global $request;

                $university->where('location_id', $request->location);
            });
        }

        $minEntryFee = $alternatives->min('entry_fee');
        $maxAccreditation = $alternatives->max('accreditation');

        if (!$alternatives->get()->isEmpty()) {

            $maxCategory = 50;
            foreach ($alternatives->get() as $alternative) {
                if ($alternative->university->category == 'negeri') {
                    $maxCategory = 100;
                }
            }

            $minStandardOfLiving = $alternatives->get()->first()->university->location->standard_of_living;

            foreach ($alternatives->get() as $alternative) {
                $temp = $alternative->university->location->standard_of_living;

                if ($temp < $minStandardOfLiving) {
                    $minStandardOfLiving = $temp;
                }
            }

            // dump('minEntryFee: '.$this->getEntryFee($minEntryFee));
            // dump('maxAccreditation: '.$this->getAccreditation($maxAccreditation));
            // dump('maxCategory: '.$maxCategory);
            // dump('minStandardOfLiving: '.$this->getStandardOfLiving($minStandardOfLiving));

            foreach ($alternatives->get() as $alternative) {
                $c1 = ($this->getEntryFee($minEntryFee) / $this->getEntryFee($alternative->entry_fee)) * 30;

                $c2 = ($this->getAccreditation($alternative->accreditation) / $this->getAccreditation($maxAccreditation)) * 35;

                if ($alternative->university->category == 'swasta') {
                    $x = 50;
                } else {
                    $x = 100;
                }

                $c3 = ($x / $maxCategory) * 15;

                $c4 = ($this->getStandardOfLiving($minStandardOfLiving) / $this->getStandardOfLiving($alternative->university->location->standard_of_living)) * 20;

                $result = $c1 + $c2 + $c3 + $c4;

                Alternative::where('id', $alternative->id)->update(['score' => $result]);
            }
        }

        return view('result', [
            'alternatives' => $alternatives->orderBy('score', 'DESC')->get()
        ]);
    }

    public function show ()
    {
        $alternatives = Alternative::all();
        return view('all', [
            'alternatives' => $alternatives
        ]);
    }

    private function getEntryFee ($value) {
        if ($value >= 1000000 && $value <= 2999999) {
            $x = 25;
        } else if ($value >= 3000000 && $value <= 4999999) {
            $x = 50;
        } else if ($value >= 5000000 && $value <= 6999999) {
            $x = 75;
        } else {
            $x = 100;
        }

        return $x;
    }

    private function getAccreditation ($value) {
        if ($value >= 0 && $value <= 24) {
            $x = 25;
        } else if ($value >= 25 && $value <= 49) {
            $x = 50;
        } else if ($value >= 50 && $value <= 74) {
            $x = 75;
        } else {
            $x = 100;
        }

        return $x;
    }

    private function getStandardOfLiving ($value) {
        if ($value >= 0 && $value <= 499999) {
            $x = 25;
        } else if ($value >= 500000 && $value <= 999999) {
            $x = 50;
        } else if ($value >= 1000000 && $value <= 1499999) {
            $x = 75;
        } else {
            $x = 100;
        }

        return $x;
    }
}
