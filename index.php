<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- VUE -->
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

  <!-- AXIOS -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <!-- FONTAWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- STYLE CSS -->
  <link rel="stylesheet" href="style.css">

  <title>Dischi</title>
</head>

<body>

  <div id="app">
    <div class="container">
      <h1 class="text-center">{{ newDiskTitle }}</h1>
      <div class="row">
        <div class="d-flex  my-3">
          <input v-model.trim="newDisk.title" placeholder="Inserisci il titolo del disco" class="form-control" type="text">
          <input v-model.trim="newDisk.author" placeholder="Inserisci l'autore del disco" class="form-control" type="text">
          <input v-model.trim="newDisk.year" placeholder="Inserisci l'anno del disco" class="form-control" type="number">
          <input v-model.trim="newDisk.poster" placeholder="URL immagine di copertina" class="form-control" type="text">

          <select v-model.trim="newDisk.genre" class="form-select">
            <option selected>Seleziona il genere</option>
            <option value="pop">Pop</option>
            <option value="rock">Rock</option>
          </select>

          <button @click.stop="addNewDisk" class="btn btn-outline-danger" type="button">Aggiungi</button>
        </div>
      </div>
      <h1 class="text-center">{{ title }}</h1>
      <div class="row row-cols-3 ">

        <div class="col" v-for="(item, index) in list" :key="index">

          <div class="card">
            <img :src="item.poster" :alt="item.title">
            <div class="content text-center ">
              <h4>{{ item.title }}</h4>
              <span>{{ item.author }}</span>
              <h5>{{ item.year }}</h5>
              <h5>{{ item.genre }}</h5>
            </div>
            <button class="btn loved">
              <i class="fa-solid fa-heart"></i>
            </button>
            <button @click.stop="removeDisk(index)" class="btn btn-danger">
              <i class="fa-solid fa-trash-can"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="script.js"></script>
</body>

</html>