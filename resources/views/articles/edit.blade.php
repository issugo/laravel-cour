<form method='post' action="{{ route('articles.update', $article->id) }}">
    @method('PATCH')
    <div>
        <label for="content">Content :</label>
        <input type="text" name="content" />
    </div>
    <button type='submit'>Valider</button>
</form>
