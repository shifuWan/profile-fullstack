<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactUsRequest;
use App\Http\Requests\UpdateContactUsRequest;
use App\Http\Resources\ContactUsCollection;
use App\Http\Resources\ContactUsResource;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $size = $request->query('size', 10);
        $page = $request->query('page', 1);


        $contactUsMessages = ContactUs::latest()->filter($request->query())->paginate($size, ['*'], 'page', $page);

        return new ContactUsCollection($contactUsMessages);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactUsRequest $request)
    {
        ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return response()->json([
            'message' => 'Contact Us message sent successfully',
            'data' => []
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactUs $contactUs)
    {
        return response()->json([
            'message' => 'Contact Us message retrieved successfully',
            'data' => $contactUs
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_is_read( ContactUs $contactUs)
    {
        $contactUs->is_read = true;
        $contactUs->save();

        return response()->json([
            'message' => 'Contact Us message marked as read',
            'data' => $contactUs
        ], 200);
    }
}
