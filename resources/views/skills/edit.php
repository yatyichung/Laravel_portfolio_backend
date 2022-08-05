<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="/app.css">

        <script src="/app.js"></script>
        
    </head>
    <body>


        <header class="w3-padding">

            <h1 class="w3-text-red">Education Console</h1>

            <?php if(Auth::check()): ?>
                You are logged in as <?= auth()->user()->first ?> <?= auth()->user()->last ?> | 
                <a href="/console/logout">Log Out</a> | 
                <a href="/console/dashboard">Dashboard</a> | 
                <a href="/">Website Home Page</a>
            <?php else: ?>
                <a href="/">Return to My Portfolio</a>
            <?php endif; ?>

        </header>

        <hr>

        <section class="w3-padding">

            <h2>Edit skill</h2>

            <form method="post" action="/console/skills/edit/<?= $skill->id ?>" novalidate class="w3-margin-bottom">

                <?= csrf_field() ?>

                <div class="w3-margin-bottom">
                    <label for="skill">skill:</label>
                    <input type="text" name="skill" id="skill" value="<?= old('skill', $skill->skill) ?>" required>
                    
                    <?php if($errors->first('skill')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('skill'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="level">level:</label>
                    <input type="text" name="level" id="level" value="<?= old('level', $skill->level) ?>">

                    <?php if($errors->first('level')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('level'); ?></span>
                    <?php endif; ?>
                </div>

                <div class="w3-margin-bottom">
                    <label for="slug">Slug:</label>
                    <input type="text" name="slug" id="slug" value="<?= old('slug', $skill->slug) ?>" required>

                    <?php if($errors->first('slug')): ?>
                        <br>
                        <span class="w3-text-red"><?= $errors->first('slug'); ?></span>
                    <?php endif; ?>
                </div>


                <button type="submit" class="w3-button w3-green">Edit skill</button>

            </form>

            <a href="/console/skills/list">Back to skill List</a>

        </section>

    </body>
</html>