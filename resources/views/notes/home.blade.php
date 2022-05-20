@extends('layouts.master')

@section('content')
    <div class="edit_profile_Page">
        <div class="container">
            <div class="link_page">

                @foreach($notes as $note)
                    <div class="row">
                        <div class="col-lg-3 margin-bottom-50px" style="margin-top: 10px;">
                            <img style="width: 100%; height: 90%;"
                                 src="{{asset($note->image)}}" class="card-img-top">
                        </div>

                        <div class="col-lg-6 margin-bottom-50px" style="margin-top: 5px;">
                            {{$note ->content}}
                        </div>

                        <div class="col-lg-3 margin-bottom-50px">
                            <div style="margin-top: 10px; ">
                                <a type="submit" onclick="copyToClipboard()">
                                    <i class="fa fa-share-alt"> </i>
                                    share</a>
                            </div>

                            <div class="header">

                                <!-- three dot menu -->
                                <div class="dropdown" style="margin-top: -25px; margin-left: 80px;">
                                    <!-- three dots -->
                                    <ul class="dropbtn icons btn-right showLeft" onclick="showDropdown">
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <!-- menu -->
                                    <div id="myDropdown" class="dropdown-content">

                                        <a type="submit"
                                           href="{{route('notes.show', ['note' => $note->id])}}"><i
                                                class="fa fa-info"> </i> Details</a>

                                        <a type="submit"
                                           href="{{route('notes.edit',['note'=> $note->id])}}"><i
                                                class="fa fa-edit"> </i> Edit</a>

                                        <form method="post"
                                              action="{{route('notes.delete',['note' => $note->id])}}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"
                                                    style="width: 100px; height: 45px;">
                                                <i class="fa fa-trash"> </i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
                <br/>
            </div>
        </div>

    </div>

    <br/>
    <div style="text-align: center;">
        <a type="button" class="btn btn-primary" href="{{route('notes.create')}}">
            <span class="fa fa-plus"></span>
            Add Note
        </a>
    </div>
    <br/>


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

    <script>
        $(function () {
            //Take the data from the TR during the event button
            $('myDropdown').on('click', 'button.editingTRbutton', function (ele) {
                //the <tr> variable is use to set the parentNode from "ele
                var tr = ele.target.parentNode.parentNode;

                //I get the value from the cells (td) using the parentNode (var tr)
                var id = tr.cells[0].textContent;
                var name = tr.cells[1].textContent;

                //Prefill the fields with the gathered information
                $('#editName').val(name);

                $('#editId').val(id);

                //If you need to update the form data and change the button link
                $("form#ModalForm").attr('action', window.location.href + '/update/' + id);
                $("a#saveModalButton").attr('href', window.location.href + '/update/' + id);
            });
        });
    </script>

    <script>
        function myFunction() {
            var x = document.getElementById("Demo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>

    <script>
        function changeLanguage(language) {
            var element = document.getElementById("url");
            element.value = language;
            element.innerHTML = language;
        }

        function showDropdown() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches(".dropbtn")) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains("show")) {
                        openDropdown.classList.remove("show");
                    }
                }
            }
        };
    </script>
@endsection
