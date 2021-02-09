<div class="form-group">
    <label for="title">your title</label><input  class="form-control"type="text"name="title" id="title" value="{{ old('title',$post->title ?? null) }}"></div>
    <div class="form-group">
        <label for="content">your content </label>
        <input  class="form-control" type="text" name="content" id="content"value="{{ old('content',$post->content ?? null) }}" >
    </div>
    <div class="form-group">
      <label for="picture">picture</label>
      <input type="file" name="picture" id="picture" class="form-control-file"></div>

    </div>
