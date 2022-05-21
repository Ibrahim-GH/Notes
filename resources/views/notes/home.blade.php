@extends('layouts.master')

@section('content')
    <div class="edit_profile_Page">
        <div class="container">
            <div class="link_page">

                @foreach ($notes as $note)
                    <div class="row">
                        <div class="col-lg-3 margin-bottom-50px" style="margin-top: 10px;">
                            <img style="width: 100%; height: 90%;" src="{{ asset($note->image) }}" class="card-img-top">
                        </div>

                        <div class="col-lg-6 margin-bottom-50px" style="margin-top: 5px;">
                            {{ $note->content }}
                        </div>


                        <div class="col-lg-3 margin-bottom-50px">


                            <nav class="navbar navbar-expand-lg">

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav ml-auto">

                                        <li class="nav-item">
                                            <a type="submit" onclick="copyToClipboard()">
                                                <i class="fa fa-share-alt"> </i> share</a>
                                            <input id="momo" type="hidden" value="{{ $note->id }}">
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Actions
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown"
                                                style="margin-top: -30px; margin-left: -10px; height: 75px;">

                                                <a type="submit" class="dropdown-item"
                                                    href="{{ route('notes.show', ['note' => $note->id]) }}"><i
                                                        class="fa fa-info"> </i> Details</a>

                                                <a type="submit" class="dropdown-item"
                                                    href="{{ route('notes.edit', ['note' => $note->id]) }}"><i
                                                        class="fa fa-edit"> </i> Edit</a>

                                                    <form method="post"
                                                        action="{{ route('notes.delete', ['note' => $note->id]) }}">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="dropdown-item">
                                                        <i class="fa fa-trash" > </i>  Delete
                                                        </button>
                                                    </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </nav>

                        </div>
                    </div>
                @endforeach
                <br />
            </div>
        </div>

    </div>

    <br />
    <div style="text-align: center;">
        <a type="button" class="btn btn-primary" href="{{ route('notes.create') }}">
            <span class="fa fa-plus"></span>
            Add Note
        </a>
    </div>
    <br />


    <link rel="stylesheet" href="css/home.css">

    <body class="w3-container">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


        <style>
            .nav-item {
                margin-left: 50px;
                margin-top: -30px;
            }

            .share {
                text-align: left;
            }

            .row {
                margin-top: 30px;
                border: 1px solid blue;
                border-radius: 4px;
                padding-top: 10px;
            }

            .btm a {
                margin-top: 10px;
            }

            .image {
                margin-top: 5px;
            }

            /* dropdown-menu */
            .dropdown-item {
                height: 25px;
                background-color: rgb(134, 77, 77);
                color: white;
            }

            .dropdown-item i {
                color: green;
                margin-left: 15px;
            }

        </style>

        <script>
            function copyToClipboard(text) {
                var inputc = document.body.appendChild(document.createElement("input"));
                var element = document.getElementById("momo").value;
                inputc.value = window.location.href + element;
                inputc.focus();
                inputc.select();
                document.execCommand('copy');
                inputc.parentNode.removeChild(inputc);
                alert("URL Collection Copied.");
            }
        </script>
    @endsection
