<table>
    <thead>
        <tr>
            <td>ID</td>
            <td>Content</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($articles as $article)
        <tr>
            <td>{{$article->id}}</td>
            <td>{{$article->content}}</td>
            <td><a href="{{route('articles.edit', $article->id)}}">Modifier</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
