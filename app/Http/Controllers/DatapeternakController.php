<?php
    
namespace App\Http\Controllers;
    
use App\Models\datapeternak;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\datapeternakStoreRequest;
use App\Http\Requests\datapeternakUpdateRequest;
    
class datapeternakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $datapeternaks = datapeternak::latest()->paginate(5);
          
        return view('datapeternaks.index', compact('datapeternaks'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('datapeternaks.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(datapeternakStoreRequest $request): RedirectResponse
    {   
        datapeternak::create($request->validated());
           
        return redirect()->route('datapeternaks.index')
                         ->with('success', 'datapeternak created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(datapeternak $datapeternak): View
    {
        return view('datapeternaks.show',compact('datapeternak'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(datapeternak $datapeternak): View
    {
        return view('datapeternaks.edit',compact('datapeternak'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(datapeternakUpdateRequest $request, datapeternak $datapeternak): RedirectResponse
    {
        $datapeternak->update($request->validated());
          
        return redirect()->route('datapeternaks.index')
                        ->with('success','datapeternak updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(datapeternak $datapeternak): RedirectResponse
    {
        $datapeternak->delete();
           
        return redirect()->route('datapeternaks.index')
                        ->with('success','datapeternak deleted successfully');
    }
}