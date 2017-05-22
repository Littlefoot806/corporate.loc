@if (!empty($result['error']))
  <div class="box error-box">
    <ul>
        <li>{{ $result['error'] }}</li>
    </ul>
  </div>
@endif
<div id="content-page" class="content group">
	<div class="hentry group">
		{!! Form::open(['url' => (isset($article->id)) ? route('admin.articles.update', ['articles' => $article->alias]) : route('admin.articles.store'), 'class' => 'contact-form', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}

		<ul>
			<li class="text-field">
				<label for="name-contact-us">
					<span class="label"> Название: </span>
					<br />
					<span class="sublabel">Заголовок материала</span><br />
				</label>
				<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
					{!! Form::text('title', isset($article->title) ? $article->title : old('title'), ['placeholder' => 'Заголовок']) !!}
				</div>
				<div class="msg-error"></div>
			</li>

			<li class="text-field">
				<label for="name-contact-us">
					<span class="label"> Ключевые слова: </span>
					<br />
					<span class="sublabel">Заголовок материала</span><br />
				</label>
				<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
					{!! Form::text('keywords', isset($article->keywords) ? $article->keywords : old('keywords'), ['placeholder' => 'Ключевые слова']) !!}
				</div>
				<div class="msg-error"></div>
			</li>

			<li class="text-field">
				<label for="name-contact-us">
					<span class="label"> Мета описание: </span>
					<br />
					<span class="sublabel">Заголовок материала</span><br />
				</label>
				<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
					{!! Form::text('meta_desc', isset($article->meta_desc) ? $article->meta_desc : old('meta_desc'), ['placeholder' => 'Мета описание']) !!}
				</div>
				<div class="msg-error"></div>
			</li>

			<li class="text-field">
				<label for="name-contact-us">
					<span class="label"> Псевдоним: </span>
					<br />
					<span class="sublabel">введите псевдоним</span><br />
				</label>
				<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
					{!! Form::text('alias', isset($article->alias) ? $article->alias : old('alias'), ['placeholder' => 'введите псевдоним']) !!}
				</div>
				<div class="msg-error"></div>
			</li>

			<li class="textarea-field">
				<label for="name-contact-us">
					<span class="label"> Краткое описание: </span>
					<br />
				</label>
				<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
					{!! Form::textarea('desc', isset($article->desc) ? $article->desc : old('desc'), ['id'=>'editor2','placeholder' => 'введите краткое описание']) !!}
				</div>
				<div class="msg-error"></div>
			</li>
			
			<li class="textarea-field">
				<label for="name-contact-us">
					<span class="label"> Oписание: </span>
					<br />
				</label>
				<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
					{!! Form::textarea('text', isset($article->text) ? $article->text : old('text'), ['id'=>'editor','placeholder' => 'введите описание']) !!}
				</div>
				<div class="msg-error"></div>
			</li>

			@if(isset($article->img->path))
				<li class="textarea-field">
				<label for="name-contact-us">
					<span class="label"> Изображение материала: </span>
					<br />
				</label>
				
				{{ HTML::image(asset(env('THEME')).'/images/articles/'. $article->img->path, 'img', ['style' => 'width:300px'] )}}
				{!! Form::hidden('old_image', $article->img->path) !!}

			</li>
			@endif
			<li class="text-field">
				<label for="name-contact-us">
					<span class="label"> Изображение: </span>
					<br />
					<span class="sublabel">изображение материала: </span><br />
				</label>
				<div class="input-prepend">
					{!! Form::file('img', ['class'=>'filestyle', 'data-buttonText'=>'Выберите изображение', 'data-buttonName'=>'btn-primary', 'data-placeholder'=>'Файла нет']) !!}
				</div>
			</li>

			<li class="text-field">
				<label for="name-contact-us">
					<span class="label"> Категория: </span>
					<br />
					<span class="sublabel">категория материала: </span><br />
				</label>
				<div class="input-prepend">
					{!! Form::select('category_id', $categories, isset($atricle->category_id) ? $atricle->category_id : '') !!}
				</div>
			</li>

				@if(isset($article->id))
					<input type="hidden" name="_method" value="PUT">
				@endif

			<li class="submit-button">
				{!! Form::button('Сохранить', ['class' => 'btn btn-miss-piggy-loves-kermit-5','type'=>'submit']) !!}
			</li>
		</ul>

		{!! Form::close() !!}

		<script>
			CKEDITOR.replace('editor');
			CKEDITOR.replace('editor2');
		</script>
	</div>	
</div>