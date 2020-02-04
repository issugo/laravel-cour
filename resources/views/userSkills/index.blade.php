@extends('skills.layout')

<?php use App\User; ?>

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRUD User_Skills</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('userSkills.create') }}"> Add New Skills</a>
            </div>
        </div>
    </div>
    @if($user->role->toArray()[0]['role'] == 'admin')
        <table class="table table-bordered">
            <tr>
                <th>prenom</th>
                <th>nom</th>
                <th>competences</th>
            </tr>
            @foreach(User::all() as $temp)
                <tr>
                    <td>{{$temp->firstname}}</td>
                    <td>{{$temp->lastname}}</td>
                    <td>
                        @foreach($temp->skills as $skill)
                            {{$skill->name}}
                        @endforeach
                    </td>
                </tr>
             @endforeach
        </table>
    @else
        <table class="table table-bordered">
            <tr>
                <th>Competences</th>
                <th>Description</th>
                <th>niveau</th>
                <th>Action</th>
            </tr>
            @foreach($user->skills as $skill)
                <tr>
                    <td>{{$skill->name}}</td>
                    <td>{{$skill->description}}</td>
                    <td>{{$skill->pivot->level}}</td>
                    <td>
                        <form action="{{ route('userSkills.destroy',$skill->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('userSkills.show',$skill->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('userSkills.edit',$skill->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection
