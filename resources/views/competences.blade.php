<?php

use App\User;

?>
<table>
    <thead>
        <tr>
            <td>nom</td>
            <td>prenom</td>
            <td>competences</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->lastname}}</td>
                <td>{{$user->firstname}}</td>
            @foreach($user->skills as $skill)
                <td>{{$skill->name}}</td>
            @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
