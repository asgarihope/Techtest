<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield("base_title")</title>
	<base href="/">
	@yield("base_head")
</head>
<body dir="ltr" class="@yield('body_class')">
@yield("base_body")
@yield("base_script")

</body>
</html>
