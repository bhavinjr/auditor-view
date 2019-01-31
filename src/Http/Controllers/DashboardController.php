<?php

namespace Bhavinjr\Viewdit\Http\Controllers;

use Illuminate\Http\Request;
use Msonowal\Audit\Models\AuditActivityMoloquent;
use DateTime;

class DashboardController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$limit = config('viewdit.paginate_limit', 25);

        $query = AuditActivityMoloquent::query();

        if ( $request->filled('start') && $request->filled('end') ) {
            $query  =   $query->where('created_at', '>=', new DateTime($request->start));
            $query  =   $query->where('created_at', '<=', new DateTime($request->end));
        }

    	$audit_activity = $query->latest()->paginate($limit);

    	return [
    		'audit_activity' => $audit_activity
    	];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $audit
     * @return \Illuminate\Http\Response
     */
    public function show($audit)
    {
    	$audit_log = AuditActivityMoloquent::with('subject', 'causer')->find($audit);

    	return [
    		'audit_log' => $audit_log
    	];
    }
}
