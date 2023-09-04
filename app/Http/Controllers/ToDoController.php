<?php

namespace App\Http\Controllers;

use App\Service\utilities\ApiResponseService;
use App\Models\ToDo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ToDoController extends Controller
{

    protected $apiResponseService;

    public function __construct(ApiResponseService $apiResponseService)
    {
        $this->apiResponseService = $apiResponseService;
    }

    public function index()
    {
        try{

            $todos = ToDo::all();
            return $this->apiResponseService->success($todos, 'Todo List', 200);
        } catch(Exception $e) {
            return $this->apiResponseService->error([], $e->getMessage(), 500);
        }
    }

    public function store(Request $request)
    {
        try {

            $todo = new ToDo([
                'title' => $request->input('title')
            ]);

            $todo->save();

            return $this->apiResponseService->success($todo, 'Todo Created', 200);
        } catch(Exception $e) {
            return $this->apiResponseService->error([], $e->getMessage(), 500);
        }

    }

    public function show(ToDo $todo)
    {
        if (!$todo) {
            return $this->apiResponseService->error('Todo not found', 404);
        }
        return $this->apiResponseService->success($todo, 'Todo Show', 200);
    }

    public function update(Request $request,ToDo $todo)
    {
        try {

            if (!$todo) {
                return $this->apiResponseService->error('Todo not found', 404);
            }
            $todo->update($request->all());
            return $this->apiResponseService->success($todo, 'Todo updated', 200);
        } catch(Exception $e) {
            return $this->apiResponseService->error([], $e->getMessage(), 500);
        }

    }

    public function destroy(ToDo $todo)
    {
        try {
            if (!$todo) {
                return $this->apiResponseService->error('Todo not found', 404);
            }
            $todo->delete();
            return $this->apiResponseService->success([], 'Todo deleted', 200);
        } catch(Exception $e) {
            return $this->apiResponseService->error([], $e->getMessage(), 500);
        }

    }
}
