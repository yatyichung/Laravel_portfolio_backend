<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Portfolio</title>

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="/app.css">

        <script src="/app.js"></script>
        
    </head>
    <body>

        <header class="w3-padding">

            <h1 class="w3-text-red">Skill Console</h1>

            <?php if(Auth::check()): ?>
                You are logged in as <?= auth()->user()->first ?> <?= auth()->user()->last ?> | 
                <a href="/console/logout">Log Out</a> | 
                <a href="/console/dashboard">Dashboard</a> | 
                <a href="/">Website Home Page</a>
            <?php else: ?>
                <a href="/">Return to My Skill</a>
            <?php endif; ?>

        </header>

        <hr>

        <?php if(session()->has('message')): ?>
            <div class="w3-padding w3-margin-top w3-margin-bottom">
                <div class="w3-red w3-center w3-padding"><?= session()->get('message') ?></div>
            </div>
        <?php endif; ?>

        <section class="w3-padding">

            <h2>Manage Skill</h2>

            <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
                <tr class="w3-red">
                    <th></th>
                    <th>Skill</th>
                    <th>Level</th>
                    <th>Slug</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach($skills as $skill): ?>
                    <tr>
                       
                        <td><?= $skill->skill ?></td>
                        <td>
                            <a href="/skill/<?= $skill->slug ?>">
                                <?= $skill->slug ?>
                            </a>
                        </td>
                        <td><?= $skill->skill ?></td>
            
                        <td><a href="/console/skills/edit/<?= $skill->id ?>">Edit</a></td>
                        <td><a href="/console/skills/delete/<?= $skill->id ?>">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <a href="/console/skills/add" class="w3-button w3-green">New skill</a>

        </section>

    </body>
</html>