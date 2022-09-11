<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

/**
 * Stores a specified category in the DB with updated data
 */
class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request The data to update
     * @param Category $category     The category to update
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('admin.category.show', compact('category'));
    }
}
