<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Http\Requests\SubscriptionRequest;
use App\Http\Resources\SubscriptionResource;

class SubscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store the subscription of user for website
     */
    public function subscribe(SubscriptionRequest $request)
    {
        $subscription = Subscription::create($request->all());

        return new SubscriptionResource($subscription);
    }
}
