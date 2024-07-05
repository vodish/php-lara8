<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My</title>
</head>

<body>
    <?= 'php code' ?>

    @foreach ([2, 2, 2, 2, 2] as $k => $v)
        <p>{{ $k }}: {!! $v !!}</p>
    @endforeach

    <x-alert> {{ __('алерт компонент3') }} </x-alert>

</body>

</html>
