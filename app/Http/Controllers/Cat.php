<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;

class Cat extends Controller
{
    public function add(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2',
            'parent' => 'required|int',

        ]);
        Cache::add('test','cokoliwek');
       // $cat = Category::create(['name' => $validated['name']], Category::find($validated['parent']));

        return response()->noContent();
    }

    public function delete($id)
    {
       // $fun = \App\Models\Category::query()->where('id', $id)->first();

       // if ($fun) {
      //      $fun->delete();
     //  }
$test = Cache::get('test');

        return response()->json(['test'=>$test]);
    }

    public function change(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2',
            'id' => 'required|int',

        ]);

        $fun = \App\Models\Category::query()->where('id', $validated['id'])->first();
        if (null == $fun) {
            throw ValidationException::withMessages(['id' => 'kategoria nie istnieje']);
        }
        $fun->name = $validated['name'];
        $fun->save();

        return response()->json($fun);
    }
}
