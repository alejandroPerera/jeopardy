<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jeopardy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    <link href="styles/main.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include "./navbar.html" ?>

    <div class="container">
        <div class="row">
            <div class="col custom-col">
                <h1>My Games</h1>

                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Title</h5>
                            <small>Category</small>
                        </div>
                        <p class="mb-1">Description</p>
                        <small>Author</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">CS 4640 Final</h5>
                            <small class="text-muted">Computer Science</small>
                        </div>
                        <p class="mb-1">Review game for web programming languages. Mostly focuses on content after
                            mid-term 2.</p>
                        <small class="text-muted">Professor Foo, Fall 2022</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">APMA 3100 Quiz 2</h5>
                            <small class="text-muted">Math</small>
                        </div>
                        <p class="mb-1">Focuses on module 4 and 6. Only contains questions regarding discrete
                            probabilities.</p>
                        <small class="text-muted">Alejandro Perera, 05/30/2022</small>
                    </a>
                </div>

            </div>

            <div class="col vertical">
        
            </div>

            <div class="col custom-col">

                <div class="p-3">
                    <form class="d-flex" role="search">
                        <input class="form-control" type="search" placeholder="Search for Jeopardy Games"
                            aria-label="Search" autofocus>
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                </div>
                
                <h1>Favorites</h1>

                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Attack on Titan Jeopardy</h5>
                            <small>Anime</small>
                        </div>
                        <p class="mb-1">Questions are anime only, no spoilers!!!</p>
                        <small>Anonymous</small>
                    </a>
                </div>


            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous">
    </script>
    <script>
        (function () {
                var highlight = document.getElementById('homepage-tab'); //anonymous function
                highlight.classList.add('active')
            })();
    </script>
</body>
</html>