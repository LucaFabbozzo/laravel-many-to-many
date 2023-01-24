@extends('layouts.app')

@section('content')
    <div class="container w-50 m-auto text-center pt-2 text">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{session('message')}}
             </div>
         @endif

        <form  action="{{route('admin.technologies.store')}}" method="POST">
            @csrf
            <div class="input-group my-5">
                <input type="text" class="form-control" name="name" placeholder="Add new technology">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                <i class="fa-solid fa-plus me-2"></i>Add</button>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Technologies</th>
                    <th scope="col">Projects Count</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($technologies as $technology )
                <tr>
                    <td>
                        <form action="{{ route('admin.technologies.update', $technology) }}" method="post" class="d-flex align-items-center justify-content-center">
                            @csrf
                            @method('PATCH')
                            <input type="text" class="border-0 p-2 rounded me-1" name="name" value="{{ $technology->name }}">
                            <button type="submit" class="btn btn-outline-success">Update</button>
                        </form>
                    </td>
                    <td>{{ count($technology->projects) }}</td>
                    <td>
                         @include('admin.partials.form-delete',[
                            'route' => 'technologies',
                            'message' => "Confermi l'eliminazione del tag: $technology->name ?",
                            'entity' => $technology
                        ])
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4"><h3>No result</h3></td>
                </tr>
                @endforelse
            </tbody>
     </table>
    </div>
@endsection

@section('title')
        Admin
@endsection
