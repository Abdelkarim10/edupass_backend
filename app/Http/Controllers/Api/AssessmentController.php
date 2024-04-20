<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\AssessmentTaken;
use App\Models\McqsTaken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssessmentController extends Controller
{
    public function getAssessment(Request $request)
    {
        $assessment = Assessment::findOrFail($request->input("assessment_id"));
        $mcqs = $assessment->mcqs()->get();

        for ($i = 0; $i < count($mcqs); $i++) {
            $mcqs[$i]['answers'] = $mcqs[$i]->answers()->get();
            if($mcqs[$i]->mcq_pic != null){
                $mcqs[$i]['mcq_pic'] = env('url') . "/public/assets/mcq_pics/" . $mcqs[$i]->mcq_pic;
            }
        }

        return [
            'assessment' => $assessment,
            'mcqs' => $mcqs,
        ];
    }

    public function getAssessmentTaken()
    {
        $user = Auth::user();
        $assessmentTakens = $user->assessmentTakens()->get();

        for ($i = 0; $i < count($assessmentTakens); $i++) {
            $assessmentTakens[$i]['mcqs'] = $assessmentTakens[$i]->mcqsTakens()->get();
        }

        return [
            'assessments_taken' => $assessmentTakens,
        ];
    }

    public function AssessmentGrading(Request $request)
    {
        $user_id = Auth::id();

        $assessmentTaken = AssessmentTaken::create([
            "assessment_id" => $request->input("assessment_id"),
            "user_id" => $user_id
        ]);
        $mcqs =  $request->input("mcqs");
        for ($i = 0; $i < count($mcqs); $i++) {
            McqsTaken::create([
                "mcq_id" => $mcqs[$i]['mcq_id'],
                "answer_id" => $mcqs[$i]['answer_id'],
                "assessment_taken_id" => $assessmentTaken->id
            ]);
        }
        return Response([
            "message" => "Assessment Submitted"
        ], 201);
    }
}
