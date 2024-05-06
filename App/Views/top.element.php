<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css?t=<? echo rand(1,2000); ?>" rel="stylesheet">
    <script src="/js/script.js?s=<? echo rand(1,2000); ?>"></script>
    <title><? echo $title; ?></title>
</head>
<body>
<content>
    <div id="menu">
        <ul>
            <li>
                <a href="/">Список закупок</a>
            </li>
            <li>
                <a href="/index.php?page=purchases&action=create">Додати закупку</a>
            </li>
        </ul>
    </div>
    <div class="page_title">
        <h3><? echo $title; ?></h3>
    </div>