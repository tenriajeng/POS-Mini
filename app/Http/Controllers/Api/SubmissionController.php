<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\Models\Submission;

class SubmissionController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if (count($request->all()) < 1) {
            return Response::json([
                "status" => "error", "message" => "User not found"
            ], 404);
        }

        $submission = Submission::where('user_id', $request->userId)->get();

        if (count($submission) < 1) {
            return Response::json([
                "status" => "error", "message" => "User not found"
            ], 404);
        }

        return Response::json(
            $this->toJson($submission),
            200
        );
    }


    /**
     * Covert data to json.
     *
     * @param  array  $data
     * @return \Illuminate\Http\Response
     */
    public function toJson($data)
    {
        $productSubscription = array();

        foreach ($data as $value) {
            array_push(
                $productSubscription,
                [
                    "packageName" => $value->productSubscription->product_subscription_name,
                    "packageTag" => $value->productSubscription->product_tag,
                    "eligiblePrize" => $value->productSubscription->eligible_prize,
                    "submissionStatus" => $value->status == 1 ? "delivery" : ($value->status == 2 ? "rejected" : "created")
                ]
            );
        }

        return array(
            'status'    => "success",
            'message'   => "User found", "user" => [
                'userId' => $data[0]->user_id,
                'contact_number' => $data[0]->contact_number,
                'contact_person' => $data[0]->contact_person,
                'delivery_address' => $data[0]->delivery_address
            ], "packages" => $productSubscription,
        );
    }
}
