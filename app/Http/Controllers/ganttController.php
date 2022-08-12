<?php

namespace App\Http\Controllers;

use App\LinkGantt;
use App\Models\LinkGantt as ModelsLinkGantt;
use App\Models\TaskGantt as ModelsTaskGantt;
use App\TaskGantt;
use Illuminate\Http\Request;

class ganttController extends Controller
{
    //
    public function getData()
    {
        $tasks = new ModelsTaskGantt();
        $links = new ModelsLinkGantt();

        return response()->json([
            'data' => $tasks->all(),
            'links' => $links->all(),
        ]);
    }
}
