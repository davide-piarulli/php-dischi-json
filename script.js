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
    addNewDisk(){
      const data = new FormData();
      
    }
  },
  mounted() {
    this.getApi();
  },
}).mount("#app");
