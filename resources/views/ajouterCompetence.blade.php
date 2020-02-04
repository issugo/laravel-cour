{{$insertion}}
<br />
<form action="{{route('ajouterCompetence')}}" method="POST">
    @csrf
    @foreach($skills as $skill)
        <label for="{{$skill->name}}">{{$skill->name}}</label>
        <input type="checkbox" id="{{$skill->name}}" name="{{$skill->name}}">
        <label for="{{$skill->name}}Level">niveau :</label>
        <input type="number" id="level" name="{{$skill->name}}Level">
        <br />
    @endforeach
    <input type="submit" name="valider" value="Valider">
</form>
