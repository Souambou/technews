<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Page d'erreur</title>

@include('back.partials.style')

</head>

<body class="error-page">

<div class="main-wrapper">
<div class="error-box">
<h1>404</h1>
<h3 class="h2 mb-3"><i class="fas fa-exclamation-triangle"></i> Oops! Accès non autorisé!</h3>
<p class="h4 font-weight-normal">La page que vous cherchez est privée.</p>
<a href="/dashboard" class="btn btn-primary">Retounez a la page d'accueil</a>
</div>
</div>


 @include('back.partials.scripts')
</body>
</html>