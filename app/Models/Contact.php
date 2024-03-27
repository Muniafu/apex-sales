<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Contact extends Model
{
    // Create a new contact
    public function create(Request $request)
    {
        $contact = $this->contact::create($request->all());

        return response()->json($contact, 201);
    }

    // Read a specific contact
    public function show($id)
    {
        $contact = Contact::findOrFail($id);

        return response()->json($contact);
    }

    // Update an existing contact
    public function updateContact(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());

        return response()->json($contact);
    }
    // Delete a contact
    public function deleteContact($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return response()->json(null, 204);
    }

    // Search or Filter Contact
    public function search(Request$request)
    {
        $query = Contact::query();

        if($request->has('name')) {
            $query->where('first_name', 'like', '%' . $request->name . '%')
                ->orWhere('last_name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->has('phone')) {
            $query->where('phone', 'like', '%' . $request->phone . '%');
        }

        if ($request->has('organization')) {
            $query->whereHas('organization', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->organization . '%');
            });
        }

        $contacts = $query->get();

        return response()->json($contacts);
    }

    public function getOrganization()
    {
        return $this->belongsTo('App\Organization');
    }

    protected $table = 'contacts';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'job_title', 'organization_id'
    ];

    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }
}
