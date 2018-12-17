<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Libraries\Twitter\TwitterUsers;
use App\Influencer;

class InfluencersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show a list of influencers in the admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.influencers.index');
    }

    public function list()
    {
         $influencers = Influencer::orderBy('name')->paginate(20);
         return $influencers;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.influencers.create');
    }


    /**
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'screen_name' => 'required'
        ]);
        $screen_name = str_replace('@','', request('screen_name'));
        $tusers = new TwitterUsers();
        $data = $tusers->getUser($screen_name);
        if ( isset($data->errors) ){
            //return array('status'=>'error', 'code'=>$data->errors[0]->code, 'message'=>$data->errors[0]->message);
            if (request()->wantsJson()) {
                return 'Error - User not found !!!';
            }
            return redirect('/admin/influencers')
                ->with('flash', 'Error - User not found !!!');
        }else {
            $newInfluencer = [
                'screen_name' => $data->screen_name,
                'name' => $data->name,
                'twitter_id' => $data->id_str,
                'twitter_screen_name' => $data->screen_name,
                'twitter_name' => $data->name,
                'twitter_description' => $data->description,
                'twitter_personal_url' => $data->url,
                'twitter_url' => 'https://twitter.com/'.$data->screen_name,
                'twitter_followers_count' => $data->followers_count,
                'twitter_friends_count' => $data->friends_count,
                'twitter_statuses_count' => $data->statuses_count,
                'twitter_image_normal_url' => $data->profile_image_url_https,
                'twitter_image_url' => str_replace("_normal","",$data->profile_image_url_https)
            ];

            try {
                $influencer = Influencer::create($newInfluencer);
            } catch (\Illuminate\Database\QueryException $exception) {
                if (request()->wantsJson()) {
                    return 'Error saving a new influencer !!!';
                }
                return redirect('/admin/influencers')
                    ->with('flash', 'Error saving a new influencer !!!');
            }
            if (request()->wantsJson()) {
                return $influencer;
            }
            return redirect('/admin/influencers')
                ->with('flash', 'A new influencer has been stored !!!');
        }

    }
}
