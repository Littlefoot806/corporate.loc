

		<li id="li-comment-{{ $data['id'] }}" class="comment even borGreen">
			<div id="comment-{{ $data['id'] }}" class="comment-container">
				<div class="comment-author vcard">
				<img alt="" src="https://www.gravatar.com/avatar/{{ $data['hash'] }}?d=mm&s=55" class="avatar" />
					<cite class="fn">{{ $data['name'] }}</cite>                 
				</div>
				<!-- .comment-author .vcard -->
				<div class="comment-meta commentmetadata">
					<div class="intro">
						<div class="commentDate">
							<a href="#comment-2">
							</div>
							<div class="commentNumber">#&nbsp;</div>
						</div>
						<div class="comment-body">
							<p>{{ $data['text'] }}</p>
						</div>
						<div class="reply group">
							<a class="comment-reply-link" href="#respond" onclick="return addComment.moveForm(&quot;comment-{{$data['id']}}&quot;, &quot;{{$data['id']}}&quot;, &quot;respond&quot;, &quot;{{ $data['article_id'] }}&quot;)">Ответить</a>                    
						</div>
						<!-- .reply -->
					</div>
					<!-- .comment-meta .commentmetadata -->
				</div>
				<!-- #comment-##  -->

			</li>
