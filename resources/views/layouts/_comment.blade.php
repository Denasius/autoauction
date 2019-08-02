<div class="leave-comment">
	<h2>Оставить комметнтарий</h2>
	<form class="row comment-form" role="form" action="{{ route('comment.add') }}" method="post">
		@csrf
		<input type="hidden" name="post_id" value="{{ $page->id }}">
		<input type="hidden" name="title" value="{{ $page->title }}">
		
		<div class="col-md-12">
			<textarea id="message" class="message" name="message" placeholder="Ваше сообщение"></textarea>
		</div>
		<div class="col-md-12">
			<div class="advanced-button">
				<button type="submit" class="go_comment">Отправить<i class="fa fa-paper-plane"></i></button>
			</div>
		</div>
	</form>
</div>