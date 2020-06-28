<template>
  <nav class="is-centered is-rounded" role="navigation" aria-label="pagination">
    <ul class="pagination">
      <li
        v-for="(page, index) in pages"
        :class="isCurrentPage(page) ? 'page-item active' : 'page-item'"
        :key="index"
      >
        <a class="page-link" @click.prevent="changePage(page)">{{ page }}</a>
      </li>
    </ul>
  </nav>
</template>

<style>
.pagination {
  margin-top: 40px;
}
</style>

<script>
export default {
  props: ["pagination", "offset"],
  methods: {
    isCurrentPage(page) {
      return this.pagination.current_page === page;
    },
    changePage(page) {
      console.log("page ", page);
      if (page > this.pagination.last_page) {
        page = this.pagination.last_page;
      }
      this.pagination.current_page = page;
      this.$emit("paginate");
    }
  },
  computed: {
    pages() {
      let pages = [];
      let from = this.pagination.current_page - Math.floor(this.offset / 2);
      if (from < 1) {
        from = 1;
      }
      let to = from + this.offset - 1;
      if (to > this.pagination.last_page) {
        to = this.pagination.last_page;
      }
      while (from <= to) {
        pages.push(from);
        from++;
      }
      return pages;
    }
  }
};
</script>