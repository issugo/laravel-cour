<!DOCTYPE html>
<html>
<head>
    <title>users et filtres</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>

<body>
<div class="card-deck">
    <form method="post" action="{{url('/filtrage')}}">
    @csrf
    @foreach($skills as $skill)
        <div class="card bg-light mb-3" style="max-width: 18rem;">
            <div class="card-header">
                {{$skill->name}}
                <input type="checkbox" id="{{$skill->name . '-selected'}}" name="{{$skill->name . '-selected'}}" checked>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$skill->name}}</h5>
                <p class="card-text">{{$skill->description}}</p>
                <select name="{{$skill->name . '-level'}}" id="{{$skill->name . '-level'}}">
                    <option value="">--level--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
    @endforeach
        <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header">filtrage</div>
            <div class="card-body">
                <input type="submit" name="submitFiltrage" id="submitFiltrage" value="filtrer">
            </div>
        </div>
    </form>
</div>
<div class="container">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">prenom</th>
                <th scope="col">nom</th>
                <th scope="col">email</th>
                <th scope="col">competences</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $u)
                <tr>
                    <th scope="row">{{$u->id}}</th>
                    <td>{{$u->firstname}}</td>
                    <td>{{$u->lastname}}</td>
                    <td>{{$u->email}}</td>
                    <td>
                        @foreach($u->skills as $skill)
                            {{$skill->name}}  {{$skill->pivot->level}} <br>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
