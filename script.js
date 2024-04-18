const { createApp } = Vue;

createApp({
  data() {
    return {
      title: "La mia collezione dischi",
      newDiskTitle: "Aggiungi un nuovo disco",
      apiUrl: "server.php",
      list: [],
      newDisk: {
        title: "",
        author: "",
        year: "",
        poster:
          "https://images-na.ssl-images-amazon.com/images/I/51sBr4IWDwL.jpg",
        genre: "",
      },
    };
  },
  methods: {
    getApi() {
      axios.get(this.apiUrl).then((result) => {
        // qui prendo i dati dal Json
        this.list = result.data;
      });
    },
    addNewDisk() {
      const data = new FormData();
      data.append("newDiskTitle", this.newDisk.title);
      data.append("newDiskAuthor", this.newDisk.author);
      data.append("newDiskYear", this.newDisk.year);
      data.append("newDiskPoster", this.newDisk.poster);
      data.append("newDiskGenre", this.newDisk.genre);

      axios.post(this.apiUrl, data).then((result) => {
        console.log(result.data);
        this.list = result.data;
        this.newDisk.title = "";
        this.newDisk.author = "";
        this.newDisk.year = "";
        this.newDisk.genre = "";
      });
    },

    removeDisk(index) {
      const data = new FormData();
      data.append("indexToDelete", index);

      axios.post(this.apiUrl, data).then((result) => {
        this.list = result.data;
      });
    },
  },
  mounted() {
    this.getApi();
  },
}).mount("#app");
