<template>
  <div class="container">
    <!-- <input type="text" v-model="keyword"/>
        <ul v-if="products.length > 0">
            <li
                v-for="product in products"
                :key="product.id"
                v-text="product.name"
            ></li>
        </ul> -->
    <input type="text" v-model="keyword" />
    <h2></h2>
    <p></p>
    <div class="table-responsive">
      <table
        id="dataTableExample1"
        class="table table-bordered table-striped table-hover"
        v-if="products.length > 0"
      >
        <thead>
          <tr class="info">
            <th>Name</th>
            <th>Image</th>
            <th>detailes</th>
            <th>price</th>
          </tr>
        </thead>
        <tbody v-for="product in products" :key="product.id">
          <tr>
            <a :href="'/shop/' + product.id">
              <td v-text="product.name"></td>
            </a>
            <td><img class="rounded-circle" :src="'/storage/' + product.image" /></td>
            <td v-text="product.details"></td>
            <td v-text="product.price"></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      keyword: null,
      products: [],
    };
  },
  watch: {
    keyword(after, befor) {
      this.getRes();
    },
  },
  methods: {
    getRes() {
      axios
        .get("/searches", { params: { keyword: this.keyword } })
        .then((result) => (this.products = result.data))
        .catch((error) => console.log(error));
    },
  },
};
</script>

<style scoped>
img{
  width: 80px;
}
</style>
