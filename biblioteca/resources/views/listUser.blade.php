@extends('layouts.app')

@section('content')
<div class="class='dashboard-content'">
  <div class="col-11 m-5">
    <h1 class="display-4 align-middle mt-5 text-dark">Busca Livro Via ISBN</h1>
  </div>
<div class="row col-12">
  <div class="col-11 m-5">
      <div class="card col-12 text-white bg-dark shadow-lg">
          <div class="card-body">
            <h4 class="card-title">Insira o codigo ISBN</h4>
            <input type="text" class="form-control isbn" placeholder="Insira o ISBN">
            <button class="btn btn-primary mt-2 mb-2">Ler</button>
            <button class="btn btn-light auto">Auto Rolagem</button>
            <p class="card-text">Insira o Codigo ISBN para poder ter acesso ao Livro Digialmente</p>
          </div>
        </div>
  </div>

  <div class="card col-11 m-5" id="viewerCanvas" style="width: 800px; height: 800px" ></div>
</div>
</div>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script type="text/javascript" src="https://www.google.com/books/jsapi.js"></script>

  <script>
    const button = document.querySelector(".btn-primary");
    const isbn = document.querySelector(".isbn");
    const auto = document.querySelector(".auto");

    button.addEventListener("click",initialiase);

    google.books.load({"language":"pt-BR"});

    function nextStep(viewer){
      window.setTimeout(function(){
        viewer.nextPage()
        nextStep(viewer);
      },3000)
    }

    function alertNotFound(){
      alert("Book not found!");
    }

    function initialiase(){
      var viewer = new google.books.DefaultViewer(document.getElementById("viewerCanvas"));
      viewer.load("ISBN:"+isbn.value,alertNotFound);
      auto.addEventListener("click",nextStep(viewer));
    }

    google.books.setOnLoadCallback(initialiase);

  </script>
@endsection