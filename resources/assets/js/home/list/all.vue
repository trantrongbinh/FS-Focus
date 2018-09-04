<template>
  <div class="row">
    <vue-table :title="$t('page.comments')" :fields="fields" api-url="comment" show-paginate @table-action="tableActions"></vue-table>
  </div>
</template>