<?php

namespace gadixsystem\visitors\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use gadixsystem\Visitors\Models\Unique;
use gadixsystem\visitors\VisitorsHelper;

class VisitorsController extends Controller
{
    /**
     * Return Dashboard Index
     */
    public function index()
    {
        $uniques = Unique::paginate(25);
        return view('visitors::iplist', ["uniques" => $uniques]);
    }

    /**
     * Function status
     */
    public function status()
    {
        return view('visitors::status', []);
    }

    /**
     * Function ip details
     * @param id
     */
    public function details($id)
    {
        $unique = Unique::findOrFail($id);

        return view('visitors::details', ["unique" => $unique]);
    }

    /**
     * Search methos
     * @param request
     */
    public function search(Request $request)
    {

        $q = $request->q;
        if ($q != "") {
            $unique = Unique::where(Unique::IP, 'LIKE', '%' . $q . '%')
                ->paginate(5);

            if (count($unique) > 0) {
                return view('visitors::iplist', ["uniques" => $unique, "query" => $q]);
            }
            return view('visitors::iplist')->withMessage('No Details found. Try to search again !');
        }
    }

    /**
     * Block IP
     */
    public function blockIP(Request $request, $id)
    {
        $unique = Unique::findOrFail($id);
        // You don't block yourself
        if ($request->getCLientIp() == $unique->ip) {
            return response()->json("ERROR", 403);
        }
        $unique->active = !$unique->active;

        $unique->save();

        return response()->json(["ok"], 200);
    }

    /**
     * Status Routes
     */
    public function today()
    {
        return VisitorsHelper::getToday();
    }

    /**
     * Return Total
     */
    public function total()
    {
        return VisitorsHelper::getTotal();
    }
    /**
     * Return Active visitors
     */
    public function active()
    {
        return VisitorsHelper::getActive();
    }

    /**
     * Return blocked visitors
     */
    public function blocked()
    {
        return VisitorsHelper::getBlocked();
    }


    /**
     * Return Graphic
     */
    public function graphic()
    {
        return response()->json(VisitorsHelper::graphic());
    }
}
