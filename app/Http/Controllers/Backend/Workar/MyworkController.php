<?php
namespace App\Http\Controllers\Backend\Workar;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Work;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class MyworkController extends Controller
{

    /**
     * Magicmethod
     *
     * @return \Illuminate\Http\Response
     */
    public function __consturct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $myWorks = auth()->user()->works();
        $myWorksCount = $myWorks->get();

        if ($request->date_to || $request->date_on) {
            $myWorks = $myWorks->whereBetween($request->column,[$request->date_to,$request->date_on]);
        }

        if ($request->statusDate) {
            $myWorks = $myWorks->whereDate('dateline_to',$request->statusDate);
        }

        if (request('status') == 'complete') {
            $myWorks = $myWorks->whereNotNull('completed_at')->orderBy('completed_at','desc')->paginate(10);
        }elseif (request('status') == 'pending'){
            $myWorks = $myWorks->whereNull('completed_at')->orderBy('dateline_to','asc')->paginate(10);
        }else{
            $myWorks = $myWorks->paginate(10);
        }
        
        return view('backend.mywork.view', compact('myWorks','myWorksCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        return view('');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        return view('');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $mywork)
    {
        $update = $mywork->update(['worker_note' => $request->note]);

        return returnMassage($update, 'Your Note Update this Item');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        //
    }
}

