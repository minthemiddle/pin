<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@tailwindcss/custom-forms@0.2.1/dist/custom-forms.min.css">
</head>
<body class="p-8">

@if(session('access'))
<div class="p-2 border border-1 border-red-700 bg-red-500">{{ session('access') }}</div>
@endif

<form action="{{ route('pin.store') }}" method="POST">
    @csrf
<label for="">
    <p>PIN</p>
<input type="text" class="form-input" name="pin">

<div class="mt-8">

</div>

<label for="" >
    <input type="submit" value="Send">
</label>

</label>
</form>

    
</body>
</html>
