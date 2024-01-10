<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Tasks' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .task-item {
            width: 100%;
            border-top: 1px solid #ccc;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .content-div {
            padding-top: 30px;
        }
    </style>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">Task Manager</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('projects') }}">Projects</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row content-div">
        @yield('content')
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    $(function() {
        $("#task-container").sortable({
            stop: function(){
                updateTaskOrder()
            }
        });
    });

    const updateTaskOrder = () => {
        let allTaskId = []
        let allTaskItems = document.getElementById('task-container').children;

        for (let i=0; i < allTaskItems.length; i++){
            allTaskId.push(allTaskItems[i].getAttribute('task-id'))
        }

        $.ajax({
            url: '/api/priority',
            type: 'PUT',
            contentType: 'application/json',
            data: JSON.stringify({data: allTaskId}),
            success: function (data, textStatus, xhr) {},
            error: function (xhr, textStatus, errorThrown) {
                alert("Oops! Error updating task priority")
            }
        });
    }
</script>
</body>
</html>
