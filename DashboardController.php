<?php

namespace App\Http\Controllers;
use App\Models\Campaign;
use App\Models\AllUser;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }
    public function index()
    {
         $campaigns = Campaign::where('status', 'pending')->get();
         $activeCampaigns = Campaign::where('status', 'active')->get();
         $inactiveCampaigns = Campaign::where('status', 'inactive')->get();


         $allusers  = AllUser::all();
         $donations =  Donation::with('donor', 'campaign')->get();
         //print_r(Auth::guard('admin')->user()->toArray());  // dashboard method of AdminController

         return view('dashboard', compact('campaigns', 'allusers','donations','activeCampaigns','inactiveCampaigns'));

     
         //dd($allusers);

        //return view('allusertable', compact('allusers'));
        // return view('allusertable',compact('allusers'));
        

        // $userId = Auth::id();
    

        // // Fetch campaigns associated with the authenticated user
        // $campaigns = Campaign::where('user_id', $userId)->get();

        
    }

    public function refund($id)
    {
        DB::beginTransaction();
    
        try {
            $donation = Donation::findOrFail($id);
    
            $user = AllUser::find($donation->donor_id);
            $campaign = Campaign::find($donation->campaign_id);
    
            $user->balance += $donation->amount;
            $user->save();
    
            $campaign->current_amount -= $donation->amount;
            $campaign->save();
    
            $donation->delete();
    
            DB::commit();
    
            return redirect()->back()->with('success', 'Refund successful.');
        } catch (\Exception $e) {
            // If an exception occurs, rollback the transaction
            DB::rollback();
    
            // Optionally, log the error or display a user-friendly message
            return redirect()->back()->with('error', 'An error occurred while processing the refund.');
        }
    }



    public function approve($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->status = 'active';
        $campaign->save();

        return redirect()->route('dashboard')->with('success', 'Campaign approved successfully');
    }

    public function deny($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->status = 'inactive';
        $campaign->save();

        return redirect()->route('dashboard')->with('success', 'Campaign denied successfully');
    }
    public function disable($id)
    {
        $user = AllUser::findOrFail($id); // Find the user by ID
        $user->delete(); // Delete the user

        return redirect()->route('dashboard')->with('success', 'User disabled successfully.');
    }

}
