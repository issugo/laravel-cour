<table>
    <thead>
        <tr>
            <td>competences</td>
            <td>description</td>
            <td>niveau</td>
            <td>delete</td>
        </tr>
    </thead>
    <tbody>
        @foreach($skills as $skill)
            <tr>
                <td>{{$skill->name}}</td>
                <td>{{$skill->description}}</td>
                <td>{{$skill->pivot->level}}</td>
                <td><a href="{{url('deleteComp/'.$skill->name)}}">X</a></td>
            </tr>
        @endforeach
    </tbody>
    <a href="{{route('ajouterCompetence')}}">Ajouter competence</a>
</table>
