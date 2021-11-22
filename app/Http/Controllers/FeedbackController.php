<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Controllers\Controller;
use App\Repositories\FeedbackRepository;
use Input;
use Response;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * The user repository instance.
     *
     * @var FeedbackRepository
     */
    protected $feedback;

    /**
     * Create a new controller instance.
     *
     * @param  FeedbackRepository  $feedback
     * @return void
     */
    public function __construct(FeedbackRepository $feedback)
    {
        $this->feedback = $feedback;
    }

    protected function feedbackValidator($data)
    {
        return Validator::make($data, [            
                    'rating' => 'required',
                    'comment' => 'required',
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|', 
                ],
                [
                    'required' => 'The :attribute is required.',
                ]);
    }

    public function jsModalfeedback()
    {
        return view('feedback.feedback');
    }

    public function saveFeedback(Request $request) {
        
        $validator = $this->feedbackValidator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        
        $status = $this->feedback->saveFeedback($request);

        $request->session()->flash($status['type'], $status['msg']);
        $response = array(
                   'type' => $status['type'],
                   'msg' => $status['msg']
        );
        return Response::json($response);
        exit();
    }  
}