<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Insert title here</title>
</head>
    <body>
    <div class="container">
    <div id="header">
    	@include("layout.header")
    </div>
    <div id="title">
    	<h1>@yield("title")</h1>
    </div>
    <div id="content">
    	@yield("content")
    </div>
    <div id="footer">
    	@include("layout.footer")
    </div>
    </div>
    </body>
</html>