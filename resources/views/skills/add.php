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

            <h1 class="w3-text-red">Portfolio Console</h1>

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

        <section class="w3-padding">

            <h2>Add skill</h2>

            <form method="post" action="/console/skills/add" novalidate class="w3-margin-bottom">

                <?= csrf_field() ?>

                <div class="w3-margin-bottom">
                    <label for="skill">skill:</label>
                    <input type="text" name="skill" id="skill" value="<?= old('skill') ?>" required>
                    
                    <?php if($errors->first('skill')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('skill'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="level">level:</label>
                    <input type="text" name="level" id="level" value="<?= old('level') ?>">

                    <?php if($errors->first('level')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('level'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="slug">Slug:</label>
                    <input type="text" name="slug" id="slug" value="<?= old('slug') ?>" required>

                    <?php if($errors->first('slug')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('slug'); ?></span>
                    <?php endif; ?>
                </div>

            


                <button type="submit" class="w3-button w3-green">Add skill</button>

            </form>

            <a href="/console/skills/list">Back to skill List</a>

        </section>

    </body>
</html>