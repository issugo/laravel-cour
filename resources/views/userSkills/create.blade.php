@extends('userSkills.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Skill</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('userSkills.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($skills as $skill)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $skill->name }}</td>
                <td>{{ $skill->description }}</td>
                <td>
                    <form action="{{ route('userSkills.store',$skill->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
