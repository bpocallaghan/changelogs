<?php

namespace Bpocallaghan\Changelogs\Controllers\Admin;

use Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use Bpocallaghan\Changelogs\Models\Changelog;

class ChangelogsController extends AdminController
{
    /**
     * Display a listing of changelog.
     *
     * @return Response
     */
    public function index()
    {
        save_resource_url();

        $items = Changelog::all();

        return $this->view('changelogs::index')->with('items', $items);
    }

    /**
     * Show the form for creating a new changelog.
     *
     * @return Response
     */
    public function create()
    {
        return $this->view('changelogs::add_edit');
    }

    /**
     * Store a newly created changelog in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate(Changelog::$rules, Changelog::$messages);

        $changelog = $this->createEntry(Changelog::class, $attributes);

        return redirect_to_resource();
    }

    /**
     * Display the specified changelog.
     *
     * @param Changelog $changelog
     * @return Response
     */
    public function show(Changelog $changelog)
    {
        return $this->view('changelogs::show')->with('item', $changelog);
    }

    /**
     * Show the form for editing the specified changelog.
     *
     * @param Changelog $changelog
     * @return Response
     */
    public function edit(Changelog $changelog)
    {
        return $this->view('changelogs::add_edit')->with('item', $changelog);
    }

    /**
     * Update the specified changelog in storage.
     *
     * @param Changelog $changelog
     * @param Request   $request
     * @return Response
     */
    public function update(Changelog $changelog, Request $request)
    {
        $attributes = request()->validate(Changelog::$rules, Changelog::$messages);

        $this->updateEntry($changelog, $attributes);

        return redirect_to_resource();
    }

    /**
     * Remove the specified changelog from storage.
     *
     * @param Changelog $changelog
     * @param Request   $request
     * @return Response
     */
    public function destroy(Changelog $changelog, Request $request)
    {
        $this->deleteEntry($changelog, $request);

        return redirect_to_resource();
    }
}
