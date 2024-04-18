const { createApp } = Vue;

createApp({
  data() {
    return {
      title: "Dischi",
      apiUrl: "server.php",
      list: [],
      newDisk: {
        title: "",
        author: "",
        year: "",
        poster: "",
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
      });
    },
  },
  mounted() {
    this.getApi();
  },
}).mount("#app");
