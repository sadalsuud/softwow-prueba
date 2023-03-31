@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Post</h2>
            </div>
            <div class="pull-right">
                @can('post-create')
                    <a class="btn btn-success" href="{{ route('posts.create') }}"> Publique un nuevo post </a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Título</th>
            <th>Contenido</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($posts as $unPost)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $unPost->titulo }}</td>
                <td>{{ $unPost->contenido }}</td>
                <td>
                    <form action="{{ route('posts.destroy',$unPost->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('posts.show',$unPost->id) }}">Listar</a>
                        @can('product-edit')
                            <a class="btn btn-primary" href="{{ route('posts.edit',$unPost->id) }}">Editar</a>
                        @endcan


                        @csrf
                        @method('DELETE')
                        @can('post-delete')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $posts->links() !!}

@endsection
