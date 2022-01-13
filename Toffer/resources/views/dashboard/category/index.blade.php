@extends('dashboard.template.template')

@section('body')
        
        <div class="dashboard__header"> 
            <h4>Categoia</h4>
            <a class="btn btn-info" href="{{route("category.create")}}">Nova +</a>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome da categoia</th>
                    <th scope="col">slug da categoia</th>
                    <th class="action">Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td class="action">
                        <a class="btn btn-warning" href="{{route('category.editar',$category->id)}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger" href="{{route('category.delete',$category->id)}}"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>Nenhuma categoria encontrada.</td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
@endsection