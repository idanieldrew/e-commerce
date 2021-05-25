<template>
  <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
    <div class="product-categori">
      <div class="search-product">
        <form action="#">
          <input
            class="form-control"
            placeholder="Search here..."
            type="text"
          />
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
      <div class="filter-sidebar-left">
        <div class="title-left">
          <h3>Categories</h3>
        </div>
        <div
          class="list-group list-group-collapse list-group-sm list-group-tree"
          id="list-group-men"
          data-children=".sub-men"
        >
          <div class="list-group-collapse sub-men">
            <a
              class="list-group-item list-group-item-action"
              href="#sub-men1"
              data-toggle="collapse"
              aria-expanded="true"
              aria-controls="sub-men1"
              >Clothing
              <small class="text-muted">(100)</small>
            </a>
            <div
              class="collapse show"
              id="sub-men1"
              data-parent="#list-group-men"
            >
              <div
                class="list-group"
                v-for="category in categories"
                :key="category.id"
              >
                <a
                  :href="url"
                  class="list-group-item list-group-item-action"
                >
                  {{ category.name }}
                  </a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Shop Page -->
</template>
<script>
export default {
  name: "category",
  data() {
    return {};
  },
  computed:{
      url(){
          return `/shop/?category=${this.categories[0].id}`
      }
  },
  mounted() {
    console.log("ok");
  },
  props: {
    categories: {
      required: true,
      type: Array,
    },
  },
//   watch:{
//       this.switchCategory()
//   },
//   methods: {
//       switchCategory(){
//           axios.get('/shop',{
//               categories
//           })
//       }
//   },
};
</script>
<style scoped>
</style>
