<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;


class LinkController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLinkRequest $request)
    {
        /** @var User $user */

$user = auth()->user();
$user->links()->create($request->validated());

        // Link::query()->create(
        //     array_merge($request->validated(),['user_id' => auth()->id()])
        // );

        return to_route('dashboard');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
    //    $link = Link::query()->findOrFail($id);


return view('links.edit', compact('link'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLinkRequest $request, Link $link)
    {



        $link->fill($request->validated());
        $link->save();

       return to_route('dashboard')->with('message', 'Link alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {


            $link->delete();

            return to_route('dashboard')
            ->with('message', 'Deletado com sucesso');
    }

public function up(Link $link){


$link->moveUp();



    return back();

}

public function down(Link $link){

$link->moveDown();



    return back();

}

}