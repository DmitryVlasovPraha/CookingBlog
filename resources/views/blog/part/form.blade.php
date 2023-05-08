<h3 class="comment-reply-title" id="comment-form">Ваш комментарий</h3>
<form role="form" class="ts-form" method="post" action="{{ route('blog.comment', ['post' => $post->id]) }}">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <textarea class="form-control msg-box" name="content" id="message" placeholder="Ваш комментарий" rows="10" required=""  maxlength="500">{{ old('content') ?? '' }}</textarea>
            </div>
        </div>
        <!-- Col end -->
    </div>
    <!-- Form row end -->
    <div class="clearfix">
        <button class="comments-btn btn btn-primary" type="submit">Добавить</button>
    </div>
</form>
