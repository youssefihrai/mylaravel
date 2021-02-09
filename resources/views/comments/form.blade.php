

    <h5>ajouter un commentaire </h5>
<form method="POST"  action="{{ route('posts.comments.store',['post'=>$id]) }}">
  @csrf
<div class="form-group">
  <label for="content">content</label>
  <textarea class="form-control my-6" name="content" id="content" rows="3"></textarea>
</div>

    <button  class="btn btn-light" type="submit">add </button>
</form>
<x-errors my-class="warning"> </x-errors>

<a href="{{ route('login') }}" class="btn btn-success">vous devez authentifier</a>
