@extends('datapeternaks.layout')
   
@section('content')
  
<div class="card mt-5">
  <h2 class="card-header text-center">DATA PETERNAK</h2>
  <div class="card-body">
          
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession
  
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('datapeternaks.create') }}"> <i class="fa fa-plus"></i> Create New kambing</a>
        </div>
  
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>
  
            <tbody>
            @forelse ($datapeternaks as $kambing)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $kambing->name }}</td>
                    <td>{{ $kambing->detail }}</td>
                    <td>
                        <form action="{{ route('datapeternaks.destroy',$kambing->id) }}" method="POST">
             
                            <a class="btn btn-info btn-sm" href="{{ route('datapeternaks.show',$kambing->id) }}"><i class="fa-solid fa-list"></i> Show</a>
              
                            <a class="btn btn-primary btn-sm" href="{{ route('datapeternaks.edit',$kambing->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
             
                            @csrf
                            @method('DELETE')
                
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">There are no data.</td>
                </tr>
            @endforelse
            </tbody>
  
        </table>
        
        {!! $datapeternaks->links() !!}
  
  </div>
</div>  
@endsection