const { createApp } = Vue;

createApp({
  data() {
    return {
      title: "Dischi",
      apiUrl: "server.php",
      list: [],
    };
  },
  methods: {
    getApi() {
      axios.get(this.apiUrl).then((result) => {
        console.log(result.data);
        this.list = result.data;
        console.log(this.list);
      });
    },
  },
  mounted() {
    this.getApi();
  },
}).mount("#app");
