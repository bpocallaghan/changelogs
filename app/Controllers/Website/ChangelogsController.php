<?php

namespace Bpocallaghan\Changelogs\Controllers\Website;

use Redirect;
use App\Http\Requests;
use Bpocallaghan\Changelogs\Models\Changelog;
use App\Http\Controllers\Website\WebsiteController;

class ChangelogsController extends WebsiteController
{
    /**
     * Show the changelog page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Changelog::orderBy('version', 'DESC')->get();

        return $this->view('changelogs::changelogs', compact('items'));
    }
}
