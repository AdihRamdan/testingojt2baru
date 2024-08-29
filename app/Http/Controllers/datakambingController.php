<?php
    
namespace App\Http\Controllers;
    
use App\Models\datakambing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\datakambingStoreRequest;
use App\Http\Requests\datakambingUpdateRequest;
    
class datakambingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $datakambings = datakambing::latest()->paginate(5);
          
        return view('datakambings.index', compact('datakambings'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('datakambings.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(datakambingStoreRequest $request): RedirectResponse
    {   
        datakambing::create($request->validated());
           
        return redirect()->route('datakambings.index')
                         ->with('success', 'datakambing created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(datakambing $datakambing): View
    {
        return view('datakambings.show',compact('datakambing'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(datakambing $datakambing): View
    {
        return view('datakambings.edit',compact('datakambing'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(datakambingUpdateRequest $request, datakambing $datakambing): RedirectResponse
    {
        $datakambing->update($request->validated());
          
        return redirect()->route('datakambings.index')
                        ->with('success','datakambing updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(datakambing $datakambing): RedirectResponse
    {
        $datakambing->delete();
           
        return redirect()->route('datakambings.index')
                        ->with('success','datakambing deleted successfully');
    }
}