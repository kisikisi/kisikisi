<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>kisikisi - {{ $news->title }}</title>
	<meta name="author" content="kisikisi" />
	<meta name="description" content="{{ substr($news->content, 0, 200) }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta property="og:image" content="{{ $files }}/news/cover/{{ $news->image_cover }}">
	<meta property="og:url" content="http://berita.kisikisi.id/{{ $news->id }}/{{ $news->slug }}">
	<meta property="og:title" content="{{ $news->title }}">
	<meta property="og:description" content="{{ substr($news->content, 0, 200) }}">
	<meta property="fb:app_id" content="607018229476252">
	<meta name="google-signin-client_id" content="13356134084-ij596q95of0e79k0qa592btnpo8uvang.apps.googleusercontent.com">
</head>
<body>
   <h3>{{ $news->title }}</h3>
   <img src="{{ $files }}/news/content/{{ $news->image_content }}" alt="">
	<article>{{ $news->content }}</article>
</body>
</html>
