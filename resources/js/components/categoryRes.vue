<template>
  <!-- Start Shop Page  -->
  <div class="shop-box-inner">
    <div class="container">
      <div class="row">
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
                      <!-- @foreach ($categories as $category) -->
                      <a
                        :href="'/shop/?category=' +  category.slug"
                        class="list-group-item list-group-item-action"
                      >
                        {{ category.name }}
                        <small class="text-muted">(50)</small></a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <div class="col-12 col-sm-4 text-center text-sm-right">
              <ul class="nav nav-tabs ml-auto">
                <li>
                  <a
                    class="nav-link active"
                    href="#grid-view"
                    data-toggle="tab"
                  >
                    <i class="fa fa-th"></i>
                  </a>
                </li>
                <li>
                  <a class="nav-link" href="#list-view" data-toggle="tab">
                    <i class="fa fa-list-ul"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>

          <div class="row product-categorie-box">
            <div class="tab-content">
              <div
                role="tabpanel"
                class="tab-pane fade show active"
                id="grid-view"
              >
                <div class="row">
                  <!-- @foreach ($products as $product) -->
                  <div
                    class="col-sm-6 col-md-6 col-lg-4 col-xl-4"
                    v-for="product in products"
                    :key="product.id"
                  >
                    <div class="products-single fix">
                      <div class="box-img-hover">
                        <div class="type-lb">
                          <p class="sale">Sale</p>
                        </div>
                        <img
                          :src="'/storage/' + product.image"
                          class="img-fluid"
                          alt="Image"
                        />
                        <!-- <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="Image">  -->
                        <div class="mask-icon">
                          <ul>
                            <li>
                              <a
                                href="#"
                                data-toggle="tooltip"
                                data-placement="right"
                                title="View"
                                ><i class="fas fa-eye"></i
                              ></a>
                            </li>
                            <li>
                              <a
                                href="#"
                                data-toggle="tooltip"
                                data-placement="right"
                                title="Compare"
                                ><i class="fas fa-sync-alt"></i
                              ></a>
                            </li>
                            <li>
                              <a
                                href="#"
                                data-toggle="tooltip"
                                data-placement="right"
                                title="Add to Wishlist"
                                ><i class="far fa-heart"></i
                              ></a>
                            </li>
                          </ul>
                          <a class="cart" :href="'/shop/' + product.id">
                            details...
                          </a>
                        </div>
                      </div>
                      <div class="why-text">
                        <h4>{{ product.details }}</h4>
                        <h5>{{ product.price }}</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div style="text-align: center">
                <!-- {{ $products->appends(request()->query())->links() }} -->
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Shop Page -->
</template>

<script>

export default {
  name:'category',
  data() {
    return {};
  },
  mounted() {
    console.log("ok");
  },
  props: {
    products: {
      required: true,
      type: Array,
    },
    categories: {
      required: true,
      type: Array,
    },
    CategoryName: {
      required: true,
      type: Array,
    },
  },
};
</script>

<style scoped>
</style>
